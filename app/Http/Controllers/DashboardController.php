<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalOrders = Ticket::count();
        $totalSales = Ticket::sum('total_price');

        $salesData = Ticket::selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $deals = Product::paginate(6);

        return view('index', compact('totalUsers', 'totalOrders', 'totalSales', 'salesData', 'deals'));
    }
}

