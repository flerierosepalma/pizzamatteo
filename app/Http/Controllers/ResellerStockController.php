<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ResellerStockController extends Controller
{

    public function showStock()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        $resellerInfo = DB::table('reseller_information')->where('user_id', $userId)->first();

        $resellerId = $resellerInfo->reseller_id;
        // Fetch menu items
        $menuItems = DB::table('menu')->get();

        // Fetch inventory stocks based on reseller information
        $stocks = DB::table('reseller_stock')
                    ->join('reseller_information', 'reseller_stock.reseller_id', '=', 'reseller_information.reseller_id')
                    ->where('reseller_stock.inventory_stock', '!=', 0) // Added condition to filter out zero quantities
                    ->where('reseller_information.user_id', $userId) // Filter by current user's reseller information
                    ->get();

        $stockLog = DB::table('reseller_stock')
                    ->join('menu', 'reseller_stock.menu_id', '=', 'menu.menu_id')
                    ->where('reseller_stock.reseller_id', $resellerId)
                    ->select('reseller_stock.*', 'menu.menu_name', 'menu.menu_base_price')
                    ->get();

        $stockTransfers = DB::table('stock_transfer_log')
                    ->join('menu', 'stock_transfer_log.menu_id', '=', 'menu.menu_id')
                    ->join('users as source', 'stock_transfer_log.source_person', '=', 'source.user_id')
                    ->join('users as destination', 'stock_transfer_log.destination_person', '=', 'destination.user_id')
                    ->leftJoin('reseller_information', 'destination.user_id', '=', 'reseller_information.user_id')
                    ->where('stock_transfer_log.destination_person', $userId)
                    ->select(
                        'stock_transfer_log.stock_item_id',
                        'menu.menu_name',
                        'stock_transfer_log.transfer_quantity as quantity',
                        'stock_transfer_log.transfer_date',
                        DB::raw('CASE WHEN source.user_role = "owner" THEN "Owner" ELSE source.user_role END as source_person'),
                        DB::raw('COALESCE(reseller_information.store_name, "Owner") as destination_branch')
                    )
                    ->get();

        // Prepare data to pass to the view
        $data = [
            'menuItems' => $menuItems,
            'resellerInfo' => $resellerInfo,
            'stocks' => $stocks,
            'stockLog' => $stockLog,
            'stockTransfers' => $stockTransfers
        ];

        return view('reseller_inventory', $data);
    }
    public function showRestock()
    {
        $userId = Auth::id();
    
        $menuItems = DB::table('menu')->get();
    
        $resellerInfo = DB::table('reseller_information')->where('user_id', $userId)->first();
        
        if (!$resellerInfo) {
            return redirect()->back()->with('error', 'Reseller information not found.');
        }
    
        $resellerId = $resellerInfo->reseller_id;
        $requestSchedule = explode(',', $resellerInfo->store_request_schedule);
        $stockDeliverSchedule = explode(',', $resellerInfo->store_stock_deliver);
    
        // Check if today is a scheduled day
        $today = date('l'); // Get today's name
        $isScheduledDay = in_array($today, $requestSchedule) || in_array($today, $stockDeliverSchedule);
    
        $pendingOrders = DB::table('reseller_order')
            ->join('reseller_information', 'reseller_order.reseller_id', '=', 'reseller_information.reseller_id')
            ->join('reseller_order_information', 'reseller_order.order_id', '=', 'reseller_order_information.order_id')
            ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
            ->select('reseller_order.order_id', 'reseller_information.store_name', 'reseller_order.order_timestamp', 'reseller_order.order_total_amount', 'reseller_order.payment_proof')
            ->where('reseller_order.reseller_id', $resellerId)
            ->where('reseller_order.order_status', 'pending')
            ->distinct()
            ->get();
    
        $preparingOrders = DB::table('reseller_order')
            ->join('reseller_information', 'reseller_order.reseller_id', '=', 'reseller_information.reseller_id')
            ->join('reseller_order_information', 'reseller_order.order_id', '=', 'reseller_order_information.order_id')
            ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
            ->select('reseller_order.order_id', 'reseller_information.store_name', 'reseller_order.order_timestamp', 'reseller_order.order_total_amount', 'reseller_order.payment_proof')
            ->where('reseller_order.reseller_id', $resellerId)
            ->where('reseller_order.order_status', 'preparing')
            ->distinct()
            ->get();
    
        $completedOrders = DB::table('reseller_order')
            ->join('reseller_information', 'reseller_order.reseller_id', '=', 'reseller_information.reseller_id')
            ->join('reseller_order_information', 'reseller_order.order_id', '=', 'reseller_order_information.order_id')
            ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
            ->select('reseller_order.order_id', 'reseller_information.store_name', 'reseller_order.order_timestamp', 'reseller_order.order_total_amount', 'reseller_order.payment_proof', 'reseller_order.order_completed')
            ->where('reseller_order.reseller_id', $resellerId)
            ->where('reseller_order.order_status', 'completed')
            ->distinct()
            ->get();
    
        $cancelledOrders = DB::table('reseller_order')
            ->join('reseller_information', 'reseller_order.reseller_id', '=', 'reseller_information.reseller_id')
            ->join('reseller_order_information', 'reseller_order.order_id', '=', 'reseller_order_information.order_id')
            ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
            ->select('reseller_order.order_id', 'reseller_information.store_name', 'reseller_order.order_timestamp', 'reseller_order.order_total_amount', 'reseller_order.payment_proof', 'reseller_order.order_status')
            ->where('reseller_order.reseller_id', $resellerId)
            ->where(function($query) {
                $query->where('reseller_order.order_status', 'owner')
                      ->orWhere('reseller_order.order_status', 'reseller');
            })
            ->distinct()
            ->get();
    
        return view('reseller_restock_request', compact('menuItems', 'pendingOrders', 'preparingOrders', 'completedOrders', 'cancelledOrders', 'isScheduledDay', 'requestSchedule', 'stockDeliverSchedule'));
    }
    


    public function submitStockRequest(Request $request)
    {
        $userId = Auth::id();
    
        $resellerInfo = DB::table('reseller_information')->where('user_id', $userId)->first();
        $resellerId = $resellerInfo->reseller_id;
    
        $quantities = $request->input('quantities');
        $totalAmount = 0;
    
        foreach ($quantities as $menuId => $quantity) {
            $menuItem = DB::table('menu')->where('menu_id', $menuId)->first();
            $totalAmount += $menuItem->menu_base_price * $quantity;
        }
    
        // Handle the payment proof upload
        if ($request->hasFile('paymentProof')) {
            $paymentProof = $request->file('paymentProof');
            $filePath = $paymentProof->store('payment_proofs', 'public');
        } else {
            $filePath = null; // Handle cases where no file is uploaded
        }
    
        // Insert the order details
        $orderId = DB::table('reseller_order')->insertGetId([
            'reseller_id' => $resellerId,
            'order_total_amount' => $totalAmount,
            'order_status' => 'Pending',
            'amount_paid' => $request->amount_paid, // Insert the amount paid
            'payment_proof' => $filePath // Save the file path to the database
        ]);
    
        foreach ($quantities as $menuId => $quantity) {
            if ($quantity > 0) {
                $menuItem = DB::table('menu')->where('menu_id', $menuId)->first();
                DB::table('reseller_order_information')->insert([
                    'order_id' => $orderId,
                    'menu_id' => $menuId,
                    'quantity' => $quantity,
                    'amount' => $menuItem->menu_base_price * $quantity,
                    'status' => 'Pending'
                ]);
            }
        }
    
        return redirect()->back()->with('success', 'Order submitted successfully!');
    }


    public function updateResellerOrder(Request $request)
    {
        $orderId = $request->input('order_item_id');
        $newQuantity = $request->input('quantity');
        $newStatus = $request->input('status');

        // Update order item details using raw SQL query
        $query = "
            UPDATE reseller_order_information
            SET quantity = :quantity, status = :status
            WHERE order_item_id = :orderItemId
        ";

        $bindings = [
            'quantity' => $newQuantity,
            'status' => $newStatus,
            'orderItemId' => $orderId,
        ];

        try {
            DB::update($query, $bindings);

            return response()->json(['success' => true, 'message' => 'Order item details updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update order item details.'], 500);
        }
    }




    public function disposeResellerStock(Request $request)
    {   
        $userId = Auth::id();
        
        $resellerInfo = DB::table('reseller_information')->where('user_id', $userId)->first();

        $resellerId = $resellerInfo->reseller_id;

        $validatedData = $request->validate([
            'stock_item_id' => 'required|exists:reseller_stock,stock_item_id',
            'disposed_stock' => 'required|integer|min:1',
        ]);
    
        try {
            // Retrieve the stock item
            $stockItem = DB::table('reseller_stock')
                ->where('stock_item_id', $validatedData['stock_item_id'])
                ->first();
    
            if (!$stockItem) {
                return redirect()->back()->with('error', 'Stock item not found.');
            }
    
            // Calculate current inventory and disposed quantity
            $currentInventory = $stockItem->inventory_stock;
            $disposedQuantity = $validatedData['disposed_stock'];
    
            if ($disposedQuantity > $currentInventory) {
                return redirect()->back()->with('error', 'Cannot dispose more than available stock.');
            }
    
            // Update the database with the disposed stock
            DB::table('reseller_stock')
                ->where('stock_item_id', $validatedData['stock_item_id'])
                ->where('reseller_stock.reseller_id', $resellerId)
                ->update([
                    'disposed_stock' => $stockItem->disposed_stock + $disposedQuantity,
                    'inventory_stock' => $currentInventory - $disposedQuantity,
                ]);
    
            // Optionally, log the disposal action or trigger other related events
    
            return redirect()->back()->with('success', 'Stock disposed successfully.');
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to dispose stock: ' . $e->getMessage());
        }
    }
    
}
    
