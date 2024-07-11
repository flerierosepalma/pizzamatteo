<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerCart;
use App\Models\ResellerInventory;
use App\Models\CustomerInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerCartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'toasted' => 'required|string',
        ]);
    
        $userId = Auth::id();
        $menuId = $request->menu_id;
        $toast = $request->toasted;
        $quantity = $request->quantity;
    
        // Check if item already exists in cart for the user with the same toast and menu_id
        $existingCartItem = CustomerCart::where('user_id', $userId)
                                        ->where('menu_id', $menuId)
                                        ->where('toast', $toast)
                                        ->first();
    
        if ($existingCartItem) {
            // Item exists, increment the quantity
            $existingCartItem->quantity += $quantity;
            $existingCartItem->save();
            return response()->json(['message' => 'Quantity updated in cart successfully!']);
        } else {
            // Item does not exist, create a new cart item
            $cartItem = new CustomerCart();
            $cartItem->user_id = $userId;
            $cartItem->menu_id = $menuId;
            $cartItem->toast = $toast;
            $cartItem->quantity = $quantity;
    
            if ($cartItem->save()) {
                return response()->json(['message' => 'Item added to cart successfully!']);
            } else {
                return response()->json(['message' => 'Error adding item to cart'], 500);
            }
        }
    }


//     public function updateCartOnInventoryChange($menuId)
// {
//     // Get current available stock in inventory
//     $availableStock = DB::table('reseller_inventory')
//                         ->where('menu_id', $menuId)
//                         ->value('inventory_stock');

//     // Update cart quantities where necessary
//     DB::table('customer_cart')
//         ->where('menu_id', $menuId)
//         ->where('quantity', '>', $availableStock)
//         ->update(['quantity' => $availableStock]);
// }
    

    public function goToHome(Request $request)
    {
        return redirect()->route('back.customer.home');
    }

    public function showCart()
    {
        $userId = Auth::id();

        $menuItems = DB::table('menu')->get();

        $cartItems = DB::table('customer_cart')
            ->join('menu', 'customer_cart.menu_id', '=', 'menu.menu_id')
            ->where('customer_cart.user_id', $userId)
            ->select('customer_cart.*', 'menu.menu_name', 'menu.menu_picture', 'menu.menu_price')
            ->get();

        $totalAmount = $cartItems->sum(function ($item) {
            return $item->quantity * $item->menu_price;
        });

        $cartItemCount = DB::table('customer_cart')
            ->where('user_id', $userId)
            ->count();

        $customer = DB::table('customer_information')
            ->where('user_id', $userId)
            ->first();

        $customer = DB::table('customer_information')
            ->join('users', 'customer_information.user_id', '=', 'users.user_id')
            ->where('customer_information.user_id', $userId)
            ->select('customer_information.*', 'users.user_email')
            ->first();

        $reseller = DB::table('reseller_information')
            ->join('customer_information', 'customer_information.customer_store', '=', 'reseller_information.reseller_id')
            ->join('users', 'customer_information.user_id', '=', 'users.user_id')
            ->where('customer_information.user_id', $userId)
            ->select('customer_information.*', 'users.user_email', 'reseller_information.store_name', 'reseller_information.store_gcash_number', 'reseller_information.store_gcash_name')
            ->first();
        
        $customerStore = CustomerInformation::where('user_id', $userId)->value('customer_store');


        return view('customer_cart_checkout', [
            'menuItems' => $menuItems,
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount,
            'cartItemCount' => $cartItemCount,
            'customer' => $customer,
            'reseller' => $reseller,
        ]);

    }
    public function getStock(Request $request)
    {
        $menuId = $request->input('menu_id');
        $userId = Auth::id();
    
        // Get the customer's store
        $customerStore = CustomerInformation::where('user_id', $userId)->value('customer_store');
    
        // Calculate the total stock for the given menu_id, excluding expired stock
        $stock = ResellerInventory::where('menu_id', $menuId)
            ->where('reseller_id', $customerStore)
            ->where('expiry_date', '>', now()) // Exclude expired stock
            ->sum('inventory_stock');
    
        return response()->json(['stock' => $stock ?? 'N/A']);
    }

    public function clearCart()
    {
        $userId = Auth::id();
        DB::table('customer_cart')->where('user_id', $userId)->delete();

        return response()->json(['message' => 'Cart cleared successfully']);
    }

    public function removeItem($itemId)
    {
        DB::table('customer_cart')->where('cart_item_id', $itemId)->delete();

        return response()->json(['message' => 'Item removed successfully']);
    }


}
