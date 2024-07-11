<?php

namespace App\Http\Controllers;

use App\Mail\SendInvoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Exception;


class OwnerStockController extends Controller
{
    public function showStock()
    {
        $userId = Auth::id();
    
        // Retrieve stocks with quantity not equal to 0
        $stocks = DB::table('owner_stock')
            ->where('user_id', $userId)
            ->where('inventory_stock', '!=', 0) // Updated to filter out zero quantities
            ->get();
    
        $menuItems = DB::table('menu')->get();
    
        // Retrieve stock logs, considering only non-zero stock quantities
        $stockLog = DB::table('owner_stock')
            ->join('menu', 'owner_stock.menu_id', '=', 'menu.menu_id')
            ->where('owner_stock.user_id', $userId)
            ->where('owner_stock.total_stock', '!=', 0) // Added condition to filter out zero quantities
            ->select('owner_stock.*', 'menu.menu_name', 'menu.menu_base_price')
            ->get();
    
        // Retrieve logs of stock updates
        $logs = DB::table('owner_stock_update_logs')
            ->join('menu as old_menu', 'owner_stock_update_logs.old_menu_id', '=', 'old_menu.menu_id')
            ->join('menu as new_menu', 'owner_stock_update_logs.new_menu_id', '=', 'new_menu.menu_id')
            ->select(
                'owner_stock_update_logs.*',
                'old_menu.menu_name as old_menu_name',
                'new_menu.menu_name as new_menu_name'
            )
            ->where('owner_stock_update_logs.user_id', $userId)
            ->get();


        $stockTransfers = DB::table('stock_transfer_log')
            ->join('menu', 'stock_transfer_log.menu_id', '=', 'menu.menu_id')
            ->join('users as source', 'stock_transfer_log.source_person', '=', 'source.user_id')
            ->join('users as destination', 'stock_transfer_log.destination_person', '=', 'destination.user_id')
            ->leftJoin('reseller_information', 'destination.user_id', '=', 'reseller_information.user_id')
            ->select(
                'stock_transfer_log.stock_item_id',
                'menu.menu_name',
                'stock_transfer_log.transfer_quantity as quantity',
                'stock_transfer_log.transfer_date',
                DB::raw('CASE WHEN source.user_role = "owner" THEN "Owner" ELSE source.user_role END as source_person'),
                DB::raw('COALESCE(reseller_information.store_name, "Owner") as destination_branch')
            )
            ->get();
        

        $data = [
            'menuItems' => $menuItems,
            'stockLog' => $stockLog,
            'logs' => $logs,
            'stocks' => $stocks,
            'stockTransfers' => $stockTransfers,
        ];
    
        return view('owner_inventory', $data);
    }
    


    public function submitOwnerStock(Request $request)
    {
        $userId = Auth::id(); 
        $quantities = $request->input('quantities');
        $expiry_dates = $request->input('expiry_dates');
        $today = now(); 
        
        try {
            DB::beginTransaction();
        
            foreach ($quantities as $menu_id => $quantity) {
                if ($quantity > 0) {
                    $menu = DB::table('menu')->where('menu_id', $menu_id)->first();
                    if ($menu) {
                        // Insert into owner_stock
                        $stockItemId = DB::table('owner_stock')->insertGetId([
                            'user_id' => $userId,
                            'menu_id' => $menu_id,
                            'total_stock' => $quantity,
                            'inventory_stock' => $quantity, // Added inventory_stock
                            'stock_date' => $today, 
                            'expiry_date' => $expiry_dates[$menu_id],
                            'disposed_stock' => 0,
                            'created_at' => $today,
                            'updated_at' => $today
                        ]);
                    } else {
                        continue; // Skip if menu not found
                    }
                }
            }
        
            DB::commit();
        
            return redirect()->back()->with('success', 'Stocks added successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to add stocks. Please try again.');
        }
    }
    

    
public function disposeOwnerStock(Request $request)
{
    // Validate request data
    $request->validate([
        'stock_item_id' => 'required|exists:owner_stock,stock_item_id',
        'disposed_stock' => 'required|integer|min:1',
    ]);

    // Get stock item
    $stockItem = DB::table('owner_stock')
        ->where('stock_item_id', $request->stock_item_id)
        ->first();

    $currentInventory = $stockItem->inventory_stock;
    $disposedQuantity = $request->disposed_stock;

    // Perform the update in the database
    DB::table('owner_stock')
        ->where('stock_item_id', $request->stock_item_id)
        ->update([
            'disposed_stock' => $stockItem->disposed_stock + $disposedQuantity,
            'inventory_stock' => $currentInventory - $disposedQuantity,
        ]);


        return redirect()->back()->with('message', 'Product deleted successfully.');
}

   

public function updateOwnerStock(Request $request)
{
    try {
        // Validate incoming request data
        $validatedData = $request->validate([
            'stock_item_id' => 'required|integer',
            'new_menu_name' => 'required|string',
            'new_total_stock' => 'required|integer|min:0',
            'new_expiry_date' => 'required|date',
        ]);

        // Retrieve authenticated user ID
        $user_id = Auth::id();

        // Find menu item by name to get menu_id
        $menu = DB::table('menu')->where('menu_name', $validatedData['new_menu_name'])->first();
        if (!$menu) {
            return redirect()->back()->with('error', 'Menu item not found');
        }
        $new_menu_id = $menu->menu_id;

        // Retrieve current stock data for logging
        $current_stock = DB::table('owner_stock')->where('stock_item_id', $validatedData['stock_item_id'])->first();
        if (!$current_stock) {
            return redirect()->back()->with('error', 'Stock item not found');
        }

        // Update data into owner_stock table based on stock_item_id
        $updated = DB::table('owner_stock')
            ->where('stock_item_id', $validatedData['stock_item_id'])
            ->update([
                'menu_id' => $new_menu_id,
                'total_stock' => $validatedData['new_total_stock'],
                'expiry_date' => $validatedData['new_expiry_date'],
                'updated_at' => now(),
            ]);

            if ($updated) {
                // Determine the type of update
                $updateActions = [];
                if ($current_stock->menu_id != $new_menu_id) {
                    $updateActions[] = 'Menu';
                }
                if ($current_stock->total_stock != $validatedData['new_total_stock']) {
                    $updateActions[] = 'Quantity';
                }
                if ($current_stock->expiry_date != $validatedData['new_expiry_date']) {
                    $updateActions[] = 'Expiry';
                }
    
                // Build the update_action string
                $changeCount = count($updateActions);
                if ($changeCount == 3) {
                    $update_action = 'all fields updated';
                } elseif ($changeCount == 2) {
                    $update_action = implode(' and ', $updateActions) . ' updated';
                } elseif ($changeCount == 1) {
                    $update_action = $updateActions[0] . ' updated';
                } else {
                    $update_action = 'no changes';  // This should generally not happen in the update scenario
                }

            // Log the update in owner_stock_update_logs
            DB::table('owner_stock_update_logs')->insert([
                'stock_item_id' => $validatedData['stock_item_id'],
                'user_id' => $user_id,
                'old_menu_id' => $current_stock->menu_id,
                'new_menu_id' => $new_menu_id,
                'old_total_stock' => $current_stock->total_stock,
                'new_total_stock' => $validatedData['new_total_stock'],
                'old_expiry_date' => $current_stock->expiry_date,
                'new_expiry_date' => $validatedData['new_expiry_date'],
                'update_action' => $update_action,
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Stock updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update stock');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating stock: ' . $e->getMessage());
    }
}

    
public function deleteOwnerStock($id)
{
    try {
        DB::beginTransaction();

        // Check if stock_item_id exists in reseller_stock table
        $hasResellerStock = DB::table('reseller_stock')->where('stock_item_id', $id)->exists();

        if ($hasResellerStock) {
            return redirect()->back()->with('error', 'Cannot delete stock item. It has been transferred to reseller inventory.');
        }

        // Delete related entries from owner_stock_update_logs
        DB::table('owner_stock_update_logs')->where('stock_item_id', $id)->delete();

        // Delete the owner_stock item
        DB::table('owner_stock')->where('stock_item_id', $id)->delete();

        DB::commit();

        return redirect()->back()->with('success', 'Stock item deleted successfully.');
    } catch (Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Failed to delete stock item.');
    }
}


public function updateResellerOrderStatus(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'orderId' => 'required|integer|exists:reseller_order,order_id',
        'status' => 'required|string|max:50',
    ]);

    if ($validator->fails()) {
        Log::error('Validation failed', $validator->errors()->toArray());
        return response()->json(['message' => 'Invalid data provided.'], 400);
    }

    try {
        DB::beginTransaction();

        // Update the order status in the main orders table
        DB::table('reseller_order')
            ->where('order_id', $request->orderId)
            ->update(['order_status' => $request->status, 'updated_at' => now()]);

        // Optionally update the order status in detailed information table
        DB::table('reseller_order_information')
            ->where('order_id', $request->orderId)
            ->update(['status' => $request->status, 'updated_at' => now()]);

        // If status is 'preparing', send the invoice email and create an invoice record
        if ($request->status === 'Preparing') {
            // Fetch order details for generating the invoice
            $orderResellerDetails = $this->getOrderDetails($request->orderId); // Implement this method to fetch order details

            // Create an entry in the owner_invoice table
            DB::table('owner_invoice')->insert([
                'order_id' => $request->orderId,
                'reseller_id' => $orderResellerDetails->reseller_id,
                'reseller_name' => $orderResellerDetails->reseller_name,
                'reseller_email' => $orderResellerDetails->user_email,
                'amount_paid' => $orderResellerDetails->order_total_amount,
                'date_sent' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Send email with invoice
            Mail::to($orderResellerDetails->user_email)->send(new SendInvoice($orderResellerDetails));
        }

        DB::commit();

        return response()->json(['message' => 'Order status updated successfully.']);
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error updating order status', ['exception' => $e->getMessage()]);
        return response()->json(['message' => 'Error updating order status. Please try again.'], 500);
    }
}

    
    
    

    protected function getOrderDetails($orderId)
    {
        $orderResellerDetails = DB::table('reseller_order')
            ->join('reseller_information', 'reseller_order.reseller_id', '=', 'reseller_information.reseller_id')
            ->join('users', 'reseller_information.user_id', '=', 'users.user_id')
            ->join('owner_invoice', 'owner_invoice.order_id', '=', 'reseller_order.order_id')
            ->select('reseller_order.*', 'reseller_information.reseller_name', 'users.user_email', 'owner_invoice.invoice_id')
            ->where('reseller_order.order_id', $orderId)
            ->first();
    
        // Fetch the order items
        $orderItems = DB::table('reseller_order_information')
            ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
            ->select('reseller_order_information.*', 'menu.menu_name', 'menu.menu_price')
            ->where('reseller_order_information.order_id', $orderId)
            ->get();
    
        // Attach the order items to the order details
        $orderResellerDetails->items = $orderItems;
    
        return $orderResellerDetails;
    }


    public function showResellerOrder()
    {
        $pendingOrders = DB::table('reseller_order')
            ->join('reseller_information', 'reseller_order.reseller_id', '=', 'reseller_information.reseller_id')
            ->join('reseller_order_information', 'reseller_order.order_id', '=', 'reseller_order_information.order_id')
            ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
            ->select('reseller_order.order_id', 'reseller_information.store_name', 'reseller_order.order_timestamp', 'reseller_order.order_total_amount', 'reseller_order.payment_proof' )
            ->where('reseller_order.order_status', 'pending')
            ->distinct()
            ->get();
    
        $preparingOrders = DB::table('reseller_order')
            ->join('reseller_information', 'reseller_order.reseller_id', '=', 'reseller_information.reseller_id')
            ->join('reseller_order_information', 'reseller_order.order_id', '=', 'reseller_order_information.order_id')
            ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
            ->select('reseller_order.order_id', 'reseller_information.store_name', 'reseller_order.order_timestamp', 'reseller_order.order_total_amount', 'reseller_order.payment_proof')
            ->where('reseller_order.order_status', 'preparing')
            ->distinct()
            ->get();

        $completedOrders = DB::table('reseller_order')
            ->join('reseller_information', 'reseller_order.reseller_id', '=', 'reseller_information.reseller_id')
            ->join('reseller_order_information', 'reseller_order.order_id', '=', 'reseller_order_information.order_id')
            ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
            ->select('reseller_order.order_id', 'reseller_information.store_name', 'reseller_order.order_timestamp', 'reseller_order.order_total_amount', 'reseller_order.payment_proof', 'reseller_order.order_completed')
            ->where('reseller_order.order_status', 'completed')
            ->distinct()
            ->get();

        $cancelledOrders = DB::table('reseller_order')
            ->join('reseller_information', 'reseller_order.reseller_id', '=', 'reseller_information.reseller_id')
            ->join('reseller_order_information', 'reseller_order.order_id', '=', 'reseller_order_information.order_id')
            ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
            ->select('reseller_order.order_id', 'reseller_information.store_name', 'reseller_order.order_timestamp', 'reseller_order.order_total_amount', 'reseller_order.payment_proof', 'reseller_order.order_status')
            ->where(function($query) {
                $query->where('reseller_order.order_status', 'owner')
                      ->orWhere('reseller_order.order_status', 'reseller');
            })
            ->distinct()
            ->get();

        $inventoryItems = DB::table('owner_stock')
            ->join('menu', 'owner_stock.menu_id', '=', 'menu.menu_id')
            ->select('owner_stock.stock_item_id', 'menu.menu_id', 'menu.menu_name', 'owner_stock.inventory_stock', 'owner_stock.expiry_date')
            ->orderBy('menu.menu_id')
            ->get();

            $groupedItems = [];

foreach ($inventoryItems as $item) {
    $menuId = $item->menu_id;

    if (!isset($groupedItems[$menuId])) {
        $groupedItems[$menuId] = [
            'menu_name' => $item->menu_name,
            'items' => []
        ];
    }

    $groupedItems[$menuId]['items'][] = [
        'stock_item_id' => $item->stock_item_id,
        'inventory_stock' => $item->inventory_stock,
        'expiry_date' => $item->expiry_date,
    ];
}

        return view('owner_stock_request', [
            'pendingOrders' => $pendingOrders,
            'preparingOrders' => $preparingOrders,
            'completedOrders' => $completedOrders,
            'cancelledOrders' => $cancelledOrders,
            'groupedItems' => $groupedItems,
        ]);
    }
    

    public function getOrderSummary(Request $request)
    {
        $orderId = $request->orderId;

        // Fetch order details based on $orderId
        $orderDetails = DB::table('reseller_order_information')
                        ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
                        ->select('menu.menu_name', 'reseller_order_information.quantity', 'reseller_order_information.amount')
                        ->where('reseller_order_information.order_id', $orderId)
                        ->get();

        // Fetch total order amount
        $totalOrderAmount = DB::table('reseller_order')
                            ->where('order_id', $orderId)
                            ->value('order_total_amount');

        // Return JSON response with order details and total order amount
        return response()->json([
            'orderDetails' => $orderDetails,
            'totalOrderAmount' => $totalOrderAmount,
        ]);
    }






    public function getOrderSummaryAndInventory(Request $request)
    {
        $orderId = $request->get('orderId');
    
        // Fetch order details and reseller_id using raw SQL query
        $orderDetails = DB::select('
            SELECT ro.reseller_id, roi.order_id, roi.order_item_id, roi.menu_id, m.menu_name, roi.quantity, roi.amount, ri.store_name
            FROM reseller_order_information roi
            JOIN menu m ON roi.menu_id = m.menu_id
            JOIN reseller_order ro ON roi.order_id = ro.order_id
            JOIN reseller_information ri ON ro.reseller_id = ri.reseller_id 
            WHERE roi.order_id = ?
        ', [$orderId]);
    
        // Fetch inventory data using raw SQL query
        $menuIds = array_map(function ($order) {
            return $order->menu_id;
        }, $orderDetails);
    
        $placeholders = implode(',', array_fill(0, count($menuIds), '?'));
    
        $inventoryData = DB::select("
            SELECT os.menu_id, os.stock_item_id, os.inventory_stock, os.stock_date, os.expiry_date
            FROM owner_stock os
            WHERE os.menu_id IN ($placeholders) AND os.inventory_stock != 0
        ", $menuIds);
    
        // Group inventory data by menu_id
        $groupedInventoryData = [];
        foreach ($inventoryData as $item) {
            $groupedInventoryData[$item->menu_id][] = $item;
        }
    
        // Calculate total order amount
        $totalOrderAmount = array_reduce($orderDetails, function ($carry, $order) {
            return $carry + $order->amount;
        }, 0);
    
        return response()->json([
            'orderDetails' => $orderDetails,
            'totalOrderAmount' => $totalOrderAmount,
            'inventoryData' => $groupedInventoryData
        ]);
    }
    
    
   
    public function sendStockDetails(Request $request)
{
    $userId = Auth::id();
    $orderId = $request->input('orderId');
    $stockDetails = $request->input('stockDetails');

    // Log the orderId to verify receipt
    Log::info('Received orderId:', ['orderId' => $orderId]);

    try {
        Log::info('Stock Details received:', ['details' => $stockDetails]);

        DB::beginTransaction();

        foreach ($stockDetails as $detail) {
            $requiredFields = ['order_item_id', 'stock_item_id', 'menu_id', 'total_stock', 'stock_date', 'expiry_date'];
            foreach ($requiredFields as $field) {
                if (!isset($detail[$field])) {
                    throw new Exception('Missing required field: ' . $field);
                }
            }

            // Insert into reseller_stock
            DB::table('reseller_stock')->insert([
                'order_id' => $detail['order_id'],
                'reseller_id' => $detail['reseller_id'],
                'order_item_id' => $detail['order_item_id'],
                'stock_item_id' => $detail['stock_item_id'],
                'menu_id' => $detail['menu_id'],
                'total_stock' => $detail['total_stock'],
                'stock_date' => $detail['stock_date'],
                'expiry_date' => $detail['expiry_date'],
                'inventory_stock' => $detail['total_stock'],
                'disposed_stock' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Update owner_stock
            DB::table('owner_stock')
                ->where('stock_item_id', $detail['stock_item_id'])
                ->update([
                    'inventory_stock' => DB::raw('inventory_stock - ' . $detail['total_stock']),
                    'updated_at' => now(),
                ]);

            // Log the stock transfer

            // Fetch the user_id for the given reseller_id
            $destinationUserId = DB::table('reseller_information')
                ->where('reseller_id', $detail['reseller_id'])
                ->value('user_id');

            // Log the stock transfer
            DB::table('stock_transfer_log')->insert([
                'stock_item_id' => $detail['stock_item_id'],
                'menu_id' => $detail['menu_id'],
                'transfer_quantity' => $detail['total_stock'],
                'transfer_date' => now(),
                'source_person' => $userId,  // Ensure this value is provided in the request
                'destination_person' => $destinationUserId,  // Using the fetched user_id
            ]);
        }

        // Update reseller_order
        DB::table('reseller_order')
            ->where('order_id', $detail['order_id'])
            ->update([
                'order_status' => 'Completed',
                'order_completed'=> now(),
                'updated_at' => now(),
            ]);

        // Update reseller_order_information
        DB::table('reseller_order_information')
            ->where('order_id', $detail['order_id'])
            ->update([
                'status' => 'Completed',
                'updated_at' => now(),
            ]);

        DB::commit();

        return response()->json(['success' => true, 'message' => 'Stock details sent successfully!']);
    } catch (Exception $e) {
        Log::error('Error in sendStockDetails:', ['error' => $e->getMessage()]);

        DB::rollBack();

        return response()->json(['success' => false, 'message' => 'Failed to send stock details. Please try again.']);
    }
}




public function getCompleteSummary(Request $request)
{
    $orderId = $request->orderId;

    // Fetch order details based on $orderId
    $orderDetails = DB::table('reseller_order_information')
        ->join('menu', 'reseller_order_information.menu_id', '=', 'menu.menu_id')
        ->leftJoin('reseller_stock', 'reseller_order_information.order_item_id', '=', 'reseller_stock.order_item_id')
        ->select(
            'menu.menu_name',
            'reseller_order_information.quantity',
            'reseller_order_information.amount',
            'reseller_stock.stock_item_id',
            'reseller_stock.total_stock',
            'reseller_stock.stock_date',
            'reseller_stock.expiry_date'
        )
        ->where('reseller_order_information.order_id', $orderId)
        ->get();

    // Fetch total order amount
    $totalOrderAmount = DB::table('reseller_order')
        ->where('order_id', $orderId)
        ->value('order_total_amount');

    // Return JSON response with order details and total order amount
    return response()->json([
        'orderDetails' => $orderDetails,
        'totalOrderAmount' => $totalOrderAmount,
    ]);
}








}

