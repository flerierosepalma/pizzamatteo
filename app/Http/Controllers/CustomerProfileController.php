<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ResellerInformation;
use Illuminate\Validation\ValidationException;

class CustomerProfileController extends Controller
{
    public function showUser()
    {
        $userId = Auth::id();

        // Fetch the user details with their associated store information
        $userDetails = DB::table('customer_information')
            ->join('users', 'users.user_id', '=', 'customer_information.user_id')
            ->join('reseller_information', 'reseller_information.reseller_id', '=', 'customer_information.customer_store')
            ->select('customer_information.*', 'users.*', 'reseller_information.store_name')
            ->where('customer_information.user_id', $userId)
            ->first();
    
        if (!$userDetails) {
            return redirect()->back()->with('error', 'User details not found.');
        }
    
         
        $customerOrders = DB::table('customer_order')
        ->join('customer_information', 'customer_order.user_id', '=', 'customer_information.user_id')
        ->join('reseller_information', 'customer_order.reseller_id', '=', 'reseller_information.reseller_id')
        ->select('customer_order.*', 'customer_information.customer_name', 'reseller_information.store_name')
        ->where('customer_order.user_id', $userId)
        ->get();

        $orderInformation = DB::table('customer_order_information')
        ->join('menu', 'customer_order_information.menu_id', '=', 'menu.menu_id')
        ->select('customer_order_information.*', 'menu.menu_name')
        ->whereIn('customer_order_information.order_id', $customerOrders->pluck('order_id'))
        ->get();

      

        // Fetch distinct provinces and stores for selection
        $province = DB::table('reseller_information')
            ->distinct()
            ->pluck('store_province')
            ->all();
    
        $store = DB::table('reseller_information')
            ->whereIn('store_status', ['online', 'offline'])
            ->get();
    
        return view('customer_profile', compact('userDetails', 'store', 'province', 'customerOrders', 'orderInformation', ));
}

}