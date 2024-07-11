<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ResellerForecastingMenu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ResellerForecastingController extends Controller
{

    public function resellerForecasting()
{
    
    $weeklyData = $this->getWeeklyMenuSales();
    $monthlyData = $this->getMonthlyMenuSales();
    $quarterlyData = $this->getQuarterlyMenuSales();
    $yearlyData = $this->getYearlyMenuSales();

    // Ensure menu names are sorted by menu_id (ascending or alphabetical)
    $menuNames = ResellerForecastingMenu::orderBy('menu_name', 'asc')->pluck('menu_name', 'menu_id')->toArray();

    return view('reseller_forecasting', compact('weeklyData', 'monthlyData', 'quarterlyData', 'yearlyData', 'menuNames'));
}

private function getWeeklyMenuSales(): array

{
    $userId = Auth::id();
    
    $resellerInfo = DB::table('reseller_information')->where('user_id', $userId)->first();

    $resellerId = $resellerInfo->reseller_id;

    $oldestOrderTimestamp = DB::table('customer_order')->where('reseller_id', $resellerId)->min('order_timestamp');
    $currentTimestamp = Carbon::now();

    // Ensure starting week aligns with the oldest timestamp
    $weeklyStartDate = Carbon::parse($oldestOrderTimestamp)->startOfWeek();

    $weeklyData = [];

    while (true) {
        $endDate = $weeklyStartDate->clone()->endOfWeek();

        // Check if there's at least 1 day of data in the week
        $hasOrders = DB::table('customer_order')
            ->where('reseller_id', $resellerId)
            ->whereBetween('order_timestamp', [$weeklyStartDate, $endDate])
            ->exists();

        if (!$hasOrders) {
            break; // Exit the loop if there are no orders for the week
        }

        $orders = DB::table('customer_order')
            ->where('reseller_id', $resellerId)
            ->whereBetween('order_timestamp', [$weeklyStartDate, $endDate])
            ->join('customer_order_information', 'customer_order.order_id', '=', 'customer_order_information.order_id')
            ->select('customer_order_information.menu_id', DB::raw('SUM(customer_order_information.quantity) as quantity'))
            ->groupBy('customer_order_information.menu_id')
            ->get();

        $weeklyMenuQuantities = $this->processOrdersForMenuSales($orders);
        $dateRange = $weeklyStartDate->format('M d') . '-' . $endDate->format('d, Y');

        // Ensure menu quantities are indexed by menu_id (for alignment)
        $menuQuantitiesById = [];
        foreach ($weeklyMenuQuantities as $menuId => $quantity) {
            $menuQuantitiesById[$menuId] = $quantity;
        }

        $weeklyData[] = [
            'date_range' => $dateRange,
            'menu_quantities' => $menuQuantitiesById, // Use menu_id as index
        ];

        // Move to next week
        $weeklyStartDate = $weeklyStartDate->addWeek();
    }

    return $weeklyData;
}

private function getMonthlyMenuSales(): array
{
    $userId = Auth::id();
    
    $resellerInfo = DB::table('reseller_information')->where('user_id', $userId)->first();
    
    $resellerId = $resellerInfo->reseller_id;

    $oldestOrderTimestamp = DB::table('customer_order')->where('reseller_id', $resellerId)->min('order_timestamp');
    $currentTimestamp = Carbon::now();

    // Ensure starting month aligns with the oldest timestamp
    $monthlyStartDate = Carbon::parse($oldestOrderTimestamp)->startOfMonth();

    $monthlyData = []; // Create a new variable for monthly data
    $allMenuIds = ResellerForecastingMenu::pluck('menu_id')->toArray(); // Get all menu IDs

    while (true) {
        $endDate = $monthlyStartDate->clone()->endOfMonth();

        // Check if there's at least 1 day of data in the month
        $hasOrders = DB::table('customer_order')
            ->where('reseller_id', $resellerId)
            ->whereBetween('order_timestamp', [$monthlyStartDate, $endDate])
            ->exists();

        if (!$hasOrders) {
            break; // Exit the loop if there are no orders for the month
        }

        $orders = DB::table('customer_order')
            ->where('reseller_id', $resellerId)
            ->whereBetween('order_timestamp', [$monthlyStartDate, $endDate])
            ->join('customer_order_information', 'customer_order.order_id', '=', 'customer_order_information.order_id')
            ->select('customer_order_information.menu_id', DB::raw('SUM(customer_order_information.quantity) as quantity'))
            ->groupBy('customer_order_information.menu_id')
            ->get();

        $monthlyMenuQuantities = $this->processOrdersForMenuSales($orders);
        $dateRange = $monthlyStartDate->format('F Y');

        // Ensure menu quantities are indexed by menu_id (for alignment)
        $menuQuantitiesById = [];
        foreach ($allMenuIds as $menuId) {
            // Initialize with zero for each menu ID
            $menuQuantitiesById[$menuId] = 0;
        }

        // Update quantities based on actual orders
        foreach ($monthlyMenuQuantities as $menuId => $quantity) {
            $menuQuantitiesById[$menuId] = $quantity;
        }

        $monthlyData[] = [
            'date_range' => $dateRange,
            'menu_quantities' => $menuQuantitiesById, // Use menu_id as index
        ];

        // Move to next month
        $monthlyStartDate = $monthlyStartDate->addMonth();
    }

    return $monthlyData;
}
    
private function getQuarterlyMenuSales(): array
{
     $userId = Auth::id();
    
    $resellerInfo = DB::table('reseller_information')->where('user_id', $userId)->first();
    
    $resellerId = $resellerInfo->reseller_id;

    $oldestOrderTimestamp = DB::table('customer_order')->where('reseller_id', $resellerId)->min('order_timestamp');
    $currentTimestamp = Carbon::now();

    // Ensure starting quarter aligns with the oldest timestamp
    $quarterlyStartDate = Carbon::parse($oldestOrderTimestamp)->startOfQuarter();

    $quarterlyData = [];
    $allMenuIds = ResellerForecastingMenu::pluck('menu_id')->toArray(); // Get all menu IDs

    while (true) {
        $endDate = $quarterlyStartDate->clone()->endOfQuarter();

        // Check if there's at least 1 day of data in the quarter
        $hasOrders = DB::table('customer_order')
            ->where('reseller_id', $resellerId)
            ->whereBetween('order_timestamp', [$quarterlyStartDate, $endDate])
            ->exists();

        if (!$hasOrders) {
            break; // Exit the loop if there are no orders for the quarter
        }

        $orders = DB::table('customer_order')
            ->where('reseller_id', $resellerId)
            ->whereBetween('order_timestamp', [$quarterlyStartDate, $endDate])
            ->join('customer_order_information', 'customer_order.order_id', '=', 'customer_order_information.order_id')
            ->select('customer_order_information.menu_id', DB::raw('SUM(customer_order_information.quantity) as quantity'))
            ->groupBy('customer_order_information.menu_id')
            ->get();

        $quarterlyMenuQuantities = $this->processOrdersForMenuSales($orders);
        $dateRange = $quarterlyStartDate->format('F') . '-' . $endDate->format('F Y');

        // Ensure menu quantities are indexed by menu_id (for alignment)
        $menuQuantitiesById = [];
        foreach ($allMenuIds as $menuId) {
            // Initialize with zero for each menu ID
            $menuQuantitiesById[$menuId] = 0;
        }

        // Update quantities based on actual orders
        foreach ($quarterlyMenuQuantities as $menuId => $quantity) {
            $menuQuantitiesById[$menuId] = $quantity;
        }

        $quarterlyData[] = [
            'date_range' => $dateRange,
            'menu_quantities' => $menuQuantitiesById, // Use menu_id as index
        ];

        // Move to next quarter
        $quarterlyStartDate = $quarterlyStartDate->addQuarter();
    }

    return $quarterlyData;
}

private function getYearlyMenuSales(): array
{
    $userId = Auth::id();
    
    $resellerInfo = DB::table('reseller_information')->where('user_id', $userId)->first();
    
    $resellerId = $resellerInfo->reseller_id;

    $oldestOrderTimestamp = DB::table('customer_order')->where('reseller_id', $resellerId)->min('order_timestamp');
    $currentTimestamp = Carbon::now();

    // Ensure starting year aligns with the oldest timestamp
    $yearlyStartDate = Carbon::parse($oldestOrderTimestamp)->startOfYear();

    $yearlyData = [];
    $allMenuIds = ResellerForecastingMenu::pluck('menu_id')->toArray(); // Get all menu IDs

    while (true) {
        $endDate = $yearlyStartDate->clone()->endOfYear();

        // Check if there's at least 1 day of data in the year
        $hasOrders = DB::table('customer_order')
            ->where('reseller_id', $resellerId)
            ->whereBetween('order_timestamp', [$yearlyStartDate, $endDate])
            ->exists();

        if (!$hasOrders) {
            break; // Exit the loop if there are no orders for the year
        }

        $orders = DB::table('customer_order')
            ->where('reseller_id', $resellerId)
            ->whereBetween('order_timestamp', [$yearlyStartDate, $endDate])
            ->join('customer_order_information', 'customer_order.order_id', '=', 'customer_order_information.order_id')
            ->select('customer_order_information.menu_id', DB::raw('SUM(customer_order_information.quantity) as quantity'))
            ->groupBy('customer_order_information.menu_id')
            ->get();

        $yearlyMenuQuantities = $this->processOrdersForMenuSales($orders);
        $dateRange = $yearlyStartDate->format('Y');

        // Ensure menu quantities are indexed by menu_id (for alignment)
        $menuQuantitiesById = [];
        foreach ($allMenuIds as $menuId) {
            // Initialize with zero for each menu ID
            $menuQuantitiesById[$menuId] = 0;
        }

        // Update quantities based on actual orders
        foreach ($yearlyMenuQuantities as $menuId => $quantity) {
            $menuQuantitiesById[$menuId] = $quantity;
        }

        $yearlyData[] = [
            'date_range' => $dateRange,
            'menu_quantities' => $menuQuantitiesById, // Use menu_id as index
        ];

        // Move to next year
        $yearlyStartDate = $yearlyStartDate->addYear();
    }

    return $yearlyData;
}

    private function processOrdersForMenuSales($orders): array
    {
        $menuQuantities = [];
        foreach ($orders as $order) {
            $menuId = $order->menu_id;
            $quantity = $order->quantity;

            $menuQuantities[$menuId] = isset($menuQuantities[$menuId]) ? $menuQuantities[$menuId] + $quantity : $quantity;
        }

        return $menuQuantities;
    }
}