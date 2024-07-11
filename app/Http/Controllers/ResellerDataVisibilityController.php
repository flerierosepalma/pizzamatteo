<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class ResellerDataVisibilityController extends Controller
{

    public function getAllCategories(Request $request)
    {
        $timePeriod = $request->input('timePeriod', 'daily');
        $selectedDate = $request->input('selectedDate', now()->format('Y-m-d'));

        $allMenuItems = DB::table('menu')->pluck('menu_name');

        return response()->json([
            'onhandStocksChart' => $allMenuItems,
            'totalInventoryValueChart' => $allMenuItems,
            'lowStockItemsChart' => $allMenuItems,
            'productsSoldWithinFreshnessChart' => $allMenuItems,
            'outOfStockRateChart' => ['Out of Stock', 'In Stock'],
            'stockLevelsOvertimeChart' => $this->getDateRange($timePeriod, $selectedDate),
            'expiredStockRateChart' => ['Expired', 'Fresh'],
            'turnoverRateChart' => ['Turnover Rate']
        ]);
    }

private function getDateRange($timePeriod, $selectedDate)
{
    $endDate = Carbon::parse($selectedDate);
    $startDate = $this->getStartDate($timePeriod, $endDate);
    $dateRange = [];

    switch ($timePeriod) {
        case 'daily':
            $dateRange[] = $endDate->format('Y-m-d');
            break;
        case 'weekly':
            // Start from the beginning of the week for consistency
            $startDate = $endDate->copy()->startOfWeek();
            for ($i = 0; $i < 7; $i++) {
                $dateRange[] = $startDate->copy()->addDays($i)->format('Y-m-d');
            }
            break;
        case 'monthly':
            // Include dates up to the selected date within the month
            while ($startDate->month === $endDate->month && $startDate <= $endDate) {
                $dateRange[] = $startDate->format('Y-m-d');
                $startDate->addDay();
            }
            break;
        case 'yearly':
            // Include dates up to the selected date within the year
            while ($startDate->year === $endDate->year && $startDate <= $endDate) {
                $dateRange[] = $startDate->format('Y-m-d');
                $startDate->addDay();
            }
            break;
    }

    return $dateRange;
}

    public function index(Request $request)
    {
        $timePeriod = $request->input('timePeriod', 'daily');
        $selectedDate = $this->getSelectedDate($request->input('selectedDate'), $timePeriod);
        $maxDate = now()->format('Y-m-d');

        $data = [
            'onhandStocks' => $this->getOnhandStocks($timePeriod, $selectedDate),
            'totalInventoryValue' => $this->getTotalInventoryValue($timePeriod, $selectedDate),
            'lowStockItems' => $this->getLowStockItems($timePeriod, $selectedDate),
            'productsSoldWithinFreshness' => $this->getProductsSoldWithinFreshness($timePeriod, $selectedDate),
            'outOfStockRate' => $this->getOutOfStockRate($timePeriod, $selectedDate),
            'stockLevelsOvertime' => $this->getStockLevelsOvertime($timePeriod, $selectedDate),
            'expiredStockRate' => $this->getExpiredStockRate($timePeriod, $selectedDate),
            'turnoverRate' => $this->getTurnoverRate($timePeriod, $selectedDate),
        ];

        if ($request->ajax()) {
            return response()->json($data);
        }

        return view('reseller-data-visibility', array_merge($data, [
            'timePeriod' => $timePeriod,
            'selectedDate' => $selectedDate,
            'maxDate' => $maxDate,
        ]));
    }

    private function getSelectedDate($inputDate, $timePeriod)
    {
        $now = now();
        $date = $inputDate ? Carbon::parse($inputDate) : $now;
    
        switch ($timePeriod) {
            case 'daily':
                return $date->format('Y-m-d');
            case 'weekly':
                return $date->endOfWeek()->format('Y-m-d');
            case 'monthly':
                return min($date->endOfMonth(), $now)->format('Y-m-d');
            case 'yearly':
                return min($date->endOfYear(), $now)->format('Y-m-d');
            default:
                return $now->format('Y-m-d');
        }
    }

    private function getOnhandStocks(string $timePeriod, $selectedDate)
    {
        $dateRange = $this->getDateRange($timePeriod, $selectedDate);
        $endDate = end($dateRange);

        $allMenuItems = DB::table('menu')->pluck('menu_name', 'menu_id');

        $restockQuery = DB::table('reseller_stock')
            ->join('menu', 'reseller_stock.menu_id', '=', 'menu.menu_id')
            ->select(
                'menu.menu_id',
                'menu.menu_name',
                DB::raw('SUM(reseller_stock.inventory_stock) as restocked_stock')
            )
            ->where('reseller_stock.reseller_id', 1)
            ->where('reseller_stock.stock_date', '<=', $endDate)
            ->where('reseller_stock.expiry_date', '>=', $endDate)
            ->groupBy('menu.menu_id', 'menu.menu_name');

        $soldQuery = DB::table('customer_order_information')
            ->join('customer_order', 'customer_order_information.order_id', '=', 'customer_order.order_id')
            ->join('menu', 'customer_order_information.menu_id', '=', 'menu.menu_id')
            ->select(
                'menu.menu_id',
                'menu.menu_name',
                DB::raw('SUM(customer_order_information.quantity) as sold_stock')
            )
            ->where('customer_order.reseller_id', 1)
            ->where('customer_order.order_timestamp', '<=', $endDate)
            ->groupBy('menu.menu_id', 'menu.menu_name');

        $restockedStocks = $restockQuery->get()->keyBy('menu_id');
        $soldStocks = $soldQuery->get()->keyBy('menu_id');

        $onhandStocks = [];

        foreach ($allMenuItems as $menuId => $menuName) {
            $totalRestocked = $restockedStocks->get($menuId)->restocked_stock ?? 0;
            $totalSold = $soldStocks->get($menuId)->sold_stock ?? 0;
            $onhandStocks[$menuName] = max(0, $totalRestocked - $totalSold);
        }

        return [
            'labels' => array_keys($onhandStocks),
            'data' => array_values($onhandStocks),
        ];
    }

    private function getTotalInventoryValue(string $timePeriod, $selectedDate)
    {
        $date = Carbon::parse($selectedDate);

        $allMenuItems = DB::table('menu')->pluck('menu_price', 'menu_name');

        $restockQuery = DB::table('reseller_stock')
            ->join('menu', 'reseller_stock.menu_id', '=', 'menu.menu_id')
            ->select(
                'menu.menu_name',
                'menu.menu_price',
                'reseller_stock.stock_date',
                DB::raw('SUM(reseller_stock.inventory_stock) as restocked_stock')
            )
            ->where('reseller_stock.reseller_id', 1)
            ->where('reseller_stock.stock_date', '<=', $date)
            ->where('reseller_stock.expiry_date', '>', $date)
            ->groupBy('menu.menu_name', 'menu.menu_price', 'reseller_stock.stock_date');

        $soldQuery = DB::table('customer_order_information')
            ->join('customer_order', 'customer_order_information.order_id', '=', 'customer_order.order_id')
            ->join('menu', 'customer_order_information.menu_id', '=', 'menu.menu_id')
            ->select(
                'menu.menu_name',
                'menu.menu_price',
                'customer_order.order_timestamp',
                DB::raw('SUM(customer_order_information.quantity) as sold_stock')
            )
            ->where('customer_order.reseller_id', 1)
            ->where('customer_order.order_timestamp', '<=', $date)
            ->groupBy('menu.menu_name', 'menu.menu_price', 'customer_order.order_timestamp');

        $restockedValues = $restockQuery->get()->groupBy('menu_name');
        $soldValues = $soldQuery->get()->groupBy('menu_name');

        $inventoryValues = [];

        foreach ($allMenuItems as $menuName => $menuPrice) {
            $totalRestocked = $restockedValues->get($menuName, collect())->sum('restocked_stock');
            $totalSold = $soldValues->get($menuName, collect())->sum('sold_stock');
            $currentStock = max(0, $totalRestocked - $totalSold);
            $inventoryValues[$menuName] = $currentStock * $menuPrice;
        }

        $totalValue = array_sum($inventoryValues);

        return [
            'labels' => array_keys($inventoryValues),
            'data' => array_values($inventoryValues),
            'totalValue' => $totalValue,
        ];
    }

    private function getLowStockItems(string $timePeriod, $selectedDate)
    {
        $lowStockThreshold = 10;
        $date = Carbon::parse($selectedDate);
    
        $query = DB::table('reseller_stock')
            ->join('menu', 'reseller_stock.menu_id', '=', 'menu.menu_id')
            ->select('menu.menu_name', 'reseller_stock.inventory_stock')
            ->where('reseller_stock.reseller_id', 1)
            ->where('reseller_stock.inventory_stock', '<=', $lowStockThreshold);
    
        $this->applyDateFilter($query, $timePeriod, $date, 'reseller_stock.stock_date');
    
        $lowStockItems = $query->get();
    
        return [
            'labels' => $lowStockItems->pluck('menu_name'),
            'data' => $lowStockItems->pluck('inventory_stock'),
        ];
    }

    private function getProductsSoldWithinFreshness(string $timePeriod, $selectedDate)
    {
        $endDate = Carbon::parse($selectedDate)->endOfDay();
        $startDate = $this->getStartDate($timePeriod, $endDate);

        $query = DB::table('customer_order_information')
            ->join('customer_order', 'customer_order_information.order_id', '=', 'customer_order.order_id')
            ->join('menu', 'customer_order_information.menu_id', '=', 'menu.menu_id')
            ->join('reseller_stock', function ($join) {
                $join->on('menu.menu_id', '=', 'reseller_stock.menu_id')
                    ->on('customer_order.reseller_id', '=', 'reseller_stock.reseller_id');
            })
            ->select('menu.menu_name', DB::raw('SUM(customer_order_information.quantity) as sold_count'))
            ->where('customer_order.reseller_id', 1)
            ->whereBetween('customer_order.order_timestamp', [$startDate, $endDate])
            ->where('customer_order.order_timestamp', '<=', DB::raw('reseller_stock.expiry_date'))
            ->groupBy('menu.menu_name');

        $data = $query->get();

        return [
            'labels' => $data->pluck('menu_name'),
            'data' => $data->pluck('sold_count'),
        ];
    }

    private function getOutOfStockRate(string $timePeriod, $selectedDate)
    {
        $endDate = Carbon::parse($selectedDate);
        $startDate = $this->getStartDate($timePeriod, $endDate);

        $stockLevels = $this->getOnhandStocks($timePeriod, $selectedDate);

        $totalItems = count($stockLevels['data']);
        $outOfStockItems = count(array_filter($stockLevels['data'], function ($stock) {
            return $stock == 0; }));

        $rate = ($totalItems > 0) ? ($outOfStockItems / $totalItems) * 100 : 0;

        return [
            'labels' => ['Out of Stock', 'In Stock'],
            'data' => [$rate, 100 - $rate],
        ];
    }

    private function getStockLevelsOvertime(string $timePeriod, $selectedDate)
    {
        $endDate = Carbon::parse($selectedDate);
        $startDate = $this->getStartDate($timePeriod, $endDate);

        // Get initial stock level
        $initialStock = DB::table('reseller_stock')
            ->where('reseller_id', 1)
            ->where('stock_date', '<', $startDate)
            ->sum('inventory_stock');

        // Get restock events
        $restockEvents = DB::table('reseller_stock')
            ->where('reseller_id', 1)
            ->whereBetween('stock_date', [$startDate, $endDate])
            ->select(DB::raw('DATE(stock_date) as date'), DB::raw('SUM(inventory_stock) as stock_change'))
            ->groupBy('date')
            ->get();

        // Get sales events
        $salesEvents = DB::table('customer_order')
            ->join('customer_order_information', 'customer_order.order_id', '=', 'customer_order_information.order_id')
            ->where('customer_order.reseller_id', 1)
            ->whereBetween('customer_order.order_timestamp', [$startDate, $endDate])
            ->select(DB::raw('DATE(customer_order.order_timestamp) as date'), DB::raw('SUM(customer_order_information.quantity) as stock_change'))
            ->groupBy('date')
            ->get();

        // Combine and process events
        $stockLevels = [];
        $currentStock = $initialStock;
        $currentDate = $startDate->copy();

        while ($currentDate <= $endDate) {
            $dateString = $currentDate->format('Y-m-d');
            $restockToday = $restockEvents->firstWhere('date', $dateString);
            $salesToday = $salesEvents->firstWhere('date', $dateString);

            if ($restockToday) {
                $currentStock += $restockToday->stock_change;
            }
            if ($salesToday) {
                $currentStock -= $salesToday->stock_change;
            }

            $stockLevels[$dateString] = max(0, $currentStock);
            $currentDate->addDay();
        }

        return [
            'labels' => array_keys($stockLevels),
            'data' => array_values($stockLevels),
        ];
    }

    private function getStartDate($timePeriod, $endDate)
    {
        switch ($timePeriod) {
            case 'daily':
                return $endDate->copy()->startOfDay();
            case 'weekly':
                return $endDate->copy()->startOfWeek();
            case 'monthly':
                return $endDate->copy()->startOfMonth();
            case 'yearly':
                return $endDate->copy()->startOfYear();
            default:
                return $endDate->copy()->startOfDay();
        }
    }

    private function getExpiredStockRate(string $timePeriod, $selectedDate)
    {
        $date = Carbon::parse($selectedDate);

        $totalStockQuery = DB::table('reseller_stock')
            ->where('reseller_id', 1)
            ->where('stock_date', '<=', $date);

        $expiredStockQuery = DB::table('reseller_stock')
            ->where('reseller_id', 1)
            ->where('stock_date', '<=', $date)
            ->where('expiry_date', '<', $date);

        $totalStock = $totalStockQuery->sum('total_stock');
        $expiredStock = $expiredStockQuery->sum('total_stock');

        $rate = ($totalStock > 0) ? ($expiredStock / $totalStock) * 100 : 0;

        return [
            'labels' => ['Expired', 'Fresh'],
            'data' => [$rate, 100 - $rate],
        ];
    }

    private function getTurnoverRate(string $timePeriod, $selectedDate)
    {
        $date = Carbon::parse($selectedDate);

        $totalInventoryQuery = DB::table('reseller_stock')
            ->where('reseller_id', 1)
            ->where('stock_date', '<=', $date);

        $totalSalesQuery = DB::table('customer_order_information')
            ->join('customer_order', 'customer_order_information.order_id', '=', 'customer_order.order_id')
            ->where('customer_order.reseller_id', 1);

        $this->applyDateFilter($totalSalesQuery, $timePeriod, $date, 'customer_order.order_timestamp');

        $totalInventory = $totalInventoryQuery->sum('total_stock');
        $totalSales = $totalSalesQuery->sum('customer_order_information.quantity');

        $turnoverRate = ($totalInventory > 0) ? $totalSales / $totalInventory : 0;

        return [
            'labels' => ['Turnover Rate'],
            'data' => [$turnoverRate],
        ];
    }

    private function applyDateFilter($query, string $timePeriod, $selectedDate, $dateColumn)
    {
        $date = Carbon::parse($selectedDate);
    
        switch ($timePeriod) {
            case 'daily':
                $query->whereDate($dateColumn, '=', $date);
                break;
            case 'weekly':
                $query->whereBetween($dateColumn, [$date->startOfWeek(), $date->endOfWeek()]);
                break;
            case 'monthly':
                $query->whereMonth($dateColumn, '=', $date->month)
                      ->whereYear($dateColumn, '=', $date->year); 
                break;
            case 'yearly':
                $query->whereYear($dateColumn, '=', $date->year);
                break;
        }
    
        return $query;
    }
    
}