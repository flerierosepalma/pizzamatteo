<?php
namespace App\Http\Controllers;
use App\Models\ResellerInformation;
use App\Models\ResellerInventory;
use App\Models\CustomerInformation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;


class MenuController extends Controller
{
    public function index()
    {
        $menuItems = Menu::all();
        return view('index', compact('menuItems'));
    }

    public function customerHome(Request $request)
    {
        $userId = Auth::id();
        $customer = CustomerInformation::where('user_id', $userId)->first();
    
        if ($customer) {
            $storeNames = ResellerInformation::where('reseller_id', $customer->customer_store)->value('store_name');
        } else {
            $storeNames = 'N/A';
        }
    
        $customerProvince = CustomerInformation::where('user_id', $userId)->value('customer_province');

        $stores = DB::table('reseller_information')
            ->where('reseller_information.store_province', $customerProvince)
            ->pluck('store_name', 'reseller_id');
    
        $menuItems = Menu::all();
        $stock = [];
    
        foreach ($menuItems as $menu) {
            $stock[$menu->menu_id] = ResellerInventory::where('menu_id', $menu->menu_id)
                ->where('reseller_id', $customer->customer_store)
                ->value('inventory_stock');
    
            if ($stock[$menu->menu_id] === null) {
                $stock[$menu->menu_id] = 0;
            }
        }
    
        $status = DB::table('reseller_information')
            ->where('reseller_id', $customer->customer_store)
            ->value('store_status');
    
        $isOffline = ($status === 'offline');

        $customerStore = CustomerInformation::where('user_id', $userId)->value('customer_store');
    
        return view('customer_home', compact('storeNames', 'menuItems', 'stores', 'stock', 'isOffline', 'customerStore'));
    }
    
    
    public function updateStore(Request $request)
    {
        $request->validate([
            'updateStore' => 'required|string|max:255',
        ]);

        $userId = Auth::id();

        DB::table('customer_information')
            ->where('user_id', $userId)
            ->update(['customer_store' => $request->updateStore]);

        return redirect()->route('customer.home')->with('status', 'Store name updated successfully!');
    }

    public function ownerMenu()
    {
        $menuItems = DB::table('menu')
                        ->orderBy('menu_name') 
                        ->get()
                        ->map(function ($menu) {
                            $menu->has_references = DB::table('owner_stock')->where('menu_id', $menu->menu_id)->exists() ||
                                                    DB::table('reseller_stock')->where('menu_id', $menu->menu_id)->exists();
                            return $menu;
                        });
    
        return view('owner_menu', compact('menuItems'));
    }

    public function addMenu(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_price' => 'required|numeric',
            'menu_base_price' => 'required|numeric',
            'menu_description' => 'required|string',
            'menu_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $menu_picture = null;
        if ($request->hasFile('menu_picture')) {
            $menu_picture = $request->file('menu_picture')->storeAs($request->file('menu_picture')->getClientOriginalName());

        }
    
        DB::table('menu')->insert([
            'menu_name' => $request->menu_name,
            'menu_price' => $request->menu_price,
            'menu_base_price' => $request->menu_base_price,
            'menu_description' => $request->menu_description,
            'menu_picture' => $menu_picture,
            'menu_status' => 'Available',  // Default value, adjust as necessary
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect()->route('owner.menu')->with('success', 'Product added successfully.');
    }

    public function deleteMenu($id)
    {
        $inventoryItems = DB::table('reseller_stock')->where('menu_id', $id)->exists();
    
        if ($inventoryItems) {
            return redirect()->back()->with('error', 'Product cannot be deleted because it is referenced in other records.');
        }
    
        // Proceed with deletion if no references found
        $menu = DB::table('menu')->where('menu_id', $id)->first();
        // if ($menu->menu_picture) {
        //     Storage::delete('public/' . $menu->menu_picture);
        // }
        DB::table('menu')->where('menu_id', $id)->delete();
    
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }


    public function update(Request $request)
    {
        $request->validate([
            'menu_name' => 'required',
            'menu_description' => 'required',
            'menu_price' => 'required|numeric',
            'menu_base_price' => 'required|numeric',
            'menu_status' => 'required',
            'menu_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $menu = Menu::find($request->input('menu_id'));
        $menu->menu_name = $request->input('menu_name');
        $menu->menu_description = $request->input('menu_description');
        $menu->menu_price = $request->input('menu_price');
        $menu->menu_base_price = $request->input('menu_base_price');
        $menu->menu_status = $request->input('menu_status');
    
        if ($request->hasFile('menu_picture')) {
            $menu->menu_picture = $request->file('menu_picture')->store('menu', 'public');
        }
    
        $menu->save();
    
        return redirect()->back()->with('success', 'Menu item updated successfully.');
    }
    
    
}

