<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get transactions for the last 6 months
        $transactions = Transaction::where('user_id', $user->id)
            ->where('transaction_date', '>=', now()->subMonths(6)->startOfMonth())
            ->orderBy('transaction_date')
            ->get();

        // Get 5 latest transactions
        $recentTransactions = Transaction::where('user_id', $user->id)
            ->orderByDesc('transaction_date')
            ->take(5)
            ->get();

        // Prepare chart data
        $chartData = $this->prepareChartData($transactions);

        // Get category breakdown
        $incomeByCategory = $this->getCategoryBreakdown($user->id, 'income');
        $expenseByCategory = $this->getCategoryBreakdown($user->id, 'expense');

        return view('dashboard', [
            'user' => $user,
            'chartData' => $chartData,
            'transactions' => $recentTransactions,
            'incomeByCategory' => $incomeByCategory,
            'expenseByCategory' => $expenseByCategory,
        ]);
    }

    private function prepareChartData($transactions)
    {
        $data = [
            'labels' => [],
            'income' => [],
            'expense' => [],
        ];

        // Group by month
        $grouped = $transactions->groupBy(function ($item) {
            return Carbon::parse($item->transaction_date)->format('Y-m');
        });

        foreach ($grouped as $month => $items) {
            $data['labels'][] = Carbon::parse($items->first()->transaction_date)->format('M Y');
            $data['income'][] = $items->where('type', 'income')->sum('amount');
            $data['expense'][] = $items->where('type', 'expense')->sum('amount');
        }

        return $data;
    }

    private function getCategoryBreakdown($userId, $type)
    {
        return Transaction::where('user_id', $userId)
            ->where('type', $type)
            ->select('category', DB::raw('SUM(amount) as total'))
            ->groupBy('category')
            ->orderByDesc('total')
            ->limit(5)
            ->get()
            ->map(function ($item) {
                return [
                    'category' => $item->category,
                    'total' => $item->total
                ];
            })
            ->toArray();
    }
}
