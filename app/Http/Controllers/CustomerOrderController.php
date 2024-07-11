<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCustomerInvoice;
use Exception;


class CustomerOrderController extends Controller
{
    public function completeCheckout(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'gcashNumber' => 'required',
            'gcashName' => 'required',
            'amountPaid' => 'required|numeric',
            'paymentProof' => 'required|file',
        ]);

        $paymentProofPath = $request->file('paymentProof')->store('proofs', 'public');

        $earlierOrders = DB::table('customer_order')
            ->where('user_id', $userId)
            ->where('order_status', 'pending')
            ->where('order_expected_completion', '<', now())
            ->sum('order_total_amount');

        $expectedCompletion = now()->addMinutes($earlierOrders * 5);

        $cartItems = DB::table('customer_cart')
            ->join('menu', 'customer_cart.menu_id', '=', 'menu.menu_id')
            ->where('customer_cart.user_id', $userId)
            ->select('customer_cart.*', 'menu.menu_name', 'menu.menu_picture', 'menu.menu_price')
            ->get();

        $resellerId = DB::table('customer_information')
            ->where('user_id', $userId)
            ->value('customer_store');

        $totalAmount = $cartItems->sum(function ($item) {
            return $item->quantity * $item->menu_price;
        });

        $orderId = DB::table('customer_order')->insertGetId([
            'user_id' => $userId,
            'reseller_id' => $resellerId,
            'order_total_amount' => $totalAmount,
            'purchase_type' => 'Online',
            'payment_type' => 'Gcash',
            'amount_paid' => $request->input('amountPaid'),
            'payment_proof' => $paymentProofPath,
            'order_status' => 'pending',
            'gcash_name' => $request->input('gcashName'),
            'gcash_number' => $request->input('gcashNumber'),
            'order_timestamp' => now(),
            'order_expected_completion' => $expectedCompletion,
        ]);

        foreach ($cartItems as $item) {
            $quantityToDeduct = $item->quantity;
            $stocks = DB::table('reseller_stock')
                ->where('menu_id', $item->menu_id)
                ->where('reseller_id', $resellerId)
                ->whereDate('expiry_date', '>', now())
                ->orderBy('stock_item_id', 'asc')
                ->get();

            foreach ($stocks as $stock) {
                if ($quantityToDeduct <= 0) {
                    break;
                }

                $currentStock = $stock->inventory_stock;

                if ($currentStock >= $quantityToDeduct) {
                    DB::table('reseller_stock')
                        ->where('stock_item_id', $stock->stock_item_id)
                        ->update(['inventory_stock' => $currentStock - $quantityToDeduct]);

                    $quantityToDeduct = 0;
                } else {
                    DB::table('reseller_stock')
                        ->where('stock_item_id', $stock->stock_item_id)
                        ->update(['inventory_stock' => 0]);

                    $quantityToDeduct -= $currentStock;
                }
            }


            DB::table('customer_order_information')->insert([
                'order_id' => $orderId,
                'order_item_id' => $item->cart_item_id,
                'menu_id' => $item->menu_id,
                'toast' => $item->toast,
                'quantity' => $item->quantity,
                'amount' => $item->quantity * $item->menu_price,
                'status' => 'Pending',
            ]);
        }

        DB::table('customer_cart')->where('user_id', $userId)->delete();

        return redirect()->route('customer.home')->with('message', 'Order placed successfully!');
    }



    public function showCustomerOrder()
    {

        $userId = Auth::id();

        $resellerInfo = DB::table('reseller_information')->where('user_id', $userId)->first();

        $resellerId = $resellerInfo->reseller_id;
  
        $customerOrders = DB::table('customer_order')
        ->join('customer_information', 'customer_order.user_id', '=', 'customer_information.user_id')
        ->join('reseller_information', 'customer_order.reseller_id', '=', 'reseller_information.reseller_id')
        ->select('customer_order.*', 'customer_information.customer_name', 'reseller_information.store_name')
        ->where('customer_order.reseller_id', $resellerId)
        ->get();

        $orderInformation = DB::table('customer_order_information')
        ->join('menu', 'customer_order_information.menu_id', '=', 'menu.menu_id')
        ->select('customer_order_information.*', 'menu.menu_name')
        ->whereIn('customer_order_information.order_id', $customerOrders->pluck('order_id'))
        ->get();


        return view('reseller_active_orders', compact('customerOrders', 'orderInformation'));
    }


    public function getCustomerOrderSummary(Request $request)
    {
        $orderId = $request->orderId;

        // Fetch order details based on $orderId
        $orderDetails = DB::table('customer_order_information')
                        ->join('menu', 'customer_order_information.menu_id', '=', 'menu.menu_id')
                        ->select('menu.menu_name', 'customer_order_information.quantity', 'customer_order_information.amount')
                        ->where('customer_order_information.order_id', $orderId)
                        ->get();

        // Fetch total order amount
        $totalOrderAmount = DB::table('customer_order')
                            ->where('order_id', $orderId)
                            ->value('order_total_amount');

        // Return JSON response with order details and total order amount
        return response()->json([
            'orderDetails' => $orderDetails,
            'totalOrderAmount' => $totalOrderAmount,
        ]);
    }

    public function updateCustomerOrderStatus(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'orderId' => 'required|integer|exists:customer_order,order_id',
            'status' => 'required|string|max:50',
        ]);
    
        if ($validator->fails()) {
            Log::error('Validation failed', $validator->errors()->toArray());
            return response()->json(['message' => 'Invalid data provided.'], 400);
        }
    
        try {
            DB::beginTransaction();
    
            // Update the order status in the main orders table
            DB::table('customer_order')
                ->where('order_id', $request->orderId)
                ->update(['order_status' => $request->status, 'updated_at' => now()]);
    
            // Optionally update the order status in the detailed information table
            DB::table('customer_order_information')
                ->where('order_id', $request->orderId)
                ->update(['status' => $request->status, 'updated_at' => now()]);
    
            DB::commit();
    
            return response()->json(['message' => 'Order status updated successfully.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to update order status', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Failed to update order status.'], 500);
        }
    }
    










    // public function updateCustomerOrderStatus(Request $request)
    // {
    //     // Validate the request data
    //     $validator = Validator::make($request->all(), [
    //         'orderId' => 'required|integer|exists:customer_order,order_id',
    //         'status' => 'required|string|max:50',
    //     ]);
    
    //     if ($validator->fails()) {
    //         Log::error('Validation failed', $validator->errors()->toArray());
    //         return response()->json(['message' => 'Invalid data provided.'], 400);
    //     }
    
    //     try {
    //         DB::beginTransaction();
    
    //         // Update the order status in the main orders table
    //         DB::table('customer_order')
    //             ->where('order_id', $request->orderId)
    //             ->update(['order_status' => $request->status, 'updated_at' => now()]);
    
    //         // Optionally update the order status in detailed information table
    //         DB::table('customer_order_information')
    //             ->where('order_id', $request->orderId)
    //             ->update(['status' => $request->status, 'updated_at' => now()]);
    
    //         // If status is 'preparing', send the invoice email and create an invoice record
    //         if ($request->status === 'Preparing') {
    //             // Fetch order details for generating the invoice
    //             $orderCustomerDetails = $this->getOrderDetails($request->orderId); // Implement this method to fetch order details
    
    //             // Create an entry in the owner_invoice table
    //             DB::table('reseller_invoice')->insert([
    //                 'order_id' => $request->orderId,
    //                 'user_id' => $orderCustomerDetails->user_id,
    //                 'reseller_id' => $orderCustomerDetails->reseller_id,
    //                 'customer_name' => $orderCustomerDetails->customer_name,
    //                 'user_email' => $orderCustomerDetails->user_email,
    //                 'amount_paid' => $orderCustomerDetails->order_total_amount,
    //                 'date_sent' => now(),
    //                 'created_at' => now(),
    //                 'updated_at' => now()
    //             ]);
    
    //             // Send email with invoice
    //             Mail::to($orderCustomerDetails->user_email)->send(new SendCustomerInvoice($orderCustomerDetails));
    //         }
    
    //         DB::commit();
    
    //         return response()->json(['message' => 'Order status updated successfully.']);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         Log::error('Error updating order status', ['exception' => $e->getMessage()]);
    //         return response()->json(['message' => 'Error updating order status. Please try again.'], 500);
    //     }
    // }

    // protected function getOrderDetails($orderId)
    // {
    //     $orderCustomerDetails = DB::table('customer_order')
    //     ->join('customer_information', 'customer_order.user_id', '=', 'customer_information.user_id') // Corrected join
    //     ->join('reseller_information', 'customer_order.reseller_id', '=', 'reseller_information.reseller_id')
    //     ->join('users', 'customer_order.user_id', '=', 'users.user_id')
    //     ->join('reseller_invoice', 'reseller_invoice.order_id', '=', 'customer_order.order_id')
    //     ->select('customer_order.*' , 'reseller_information.store_name', 'customer_information.customer_name', 'users.user_email', 'reseller_invoice.invoice_id')
    //     ->where('customer_order.order_id', $orderId)
    //     ->first();
    
    //     // Fetch the order items
    //     $orderItems = DB::table('customer_order_information')
    //         ->join('menu', 'customer_order_information.menu_id', '=', 'menu.menu_id')
    //         ->select('customer_order_information.*', 'menu.menu_name', 'menu.menu_price')
    //         ->where('customer_order_information.order_id', $orderId)
    //         ->get();
    
    //     // Attach the order items to the order details
    //     $orderCustomerDetails->items = $orderItems;
    
    //     return $orderCustomerDetails;
    // }

}
