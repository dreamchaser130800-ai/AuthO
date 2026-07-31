<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Transaction::where('status', 'paid')->sum('total_price');
        $ticketsSold = Transaction::where('status', 'paid')->count();
        $activeEvents = Event::count();
        $pendingOrders = Transaction::where('status', 'pending')->count();

        $latestTransactions = Transaction::with('event')
            ->latest()
            ->take(5)
            ->get();

        // Chart Data
        $months = [];
        $userGrowthData = [];
        $eventGrowthData = [];
        $revenueData = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('M');

            // User Growth
            $userGrowthData[] = User::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();

            // Event Growth
            $eventGrowthData[] = Event::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();

            // Revenue Growth
            $revenueData[] = Transaction::where('status', 'paid')
                ->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->sum('total_price');
        }

        $chartData = [
            'months' => $months,
            'userGrowth' => $userGrowthData,
            'eventGrowth' => $eventGrowthData,
            'revenue' => $revenueData,
        ];

        return view('admin.dashboard', compact(
            'totalRevenue',
            'ticketsSold',
            'activeEvents',
            'pendingOrders',
            'latestTransactions',
            'chartData'
        ));
    }
}