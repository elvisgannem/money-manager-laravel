<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BalanceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $user_id = Auth::user()->id;
        $incomes = Income::where('user_id', $user_id)
            ->where('month', date('n'))
            ->orderBy('description')
            ->get();
        $expenses = Expense::where('user_id', $user_id)
            ->where('month', date('n'))
            ->orderBy('description')
            ->get();

        $balance = $this->getBalance($incomes, $expenses);

//        $months = [['month' => 'March', 'urlNumber' => 3], ['month' => 'April', 'urlNumber' => 4]];

        $months = $this->getMonths();

        return view('balance.index', compact('incomes', 'expenses', 'balance', 'months', 'months'));
    }

    public static function getBalance(Collection $incomes, Collection $expenses): float
    {
        $balance = 0;
        foreach ($incomes as $income) {
            $balance += $income['amount'];
        }

        foreach ($expenses as $expense) {
            $balance -= $expense['amount'];
        }
        return $balance;
    }

    private function getMonths()
    {
        $incomes = DB::table('incomes')
            ->join('months', 'incomes.month', '=', 'months.id')
            ->select('months.month', 'months.id')
            ->distinct()
            ->get();

        $expenses = DB::table('expenses')
            ->join('months', 'expenses.month', '=', 'months.id')
            ->select('months.month', 'months.id')
            ->distinct()
            ->get();

        $months = $incomes->merge($expenses);
        return $months;
    }
}
