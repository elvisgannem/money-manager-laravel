<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BalanceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $incomes = Income::query()->orderBy('description')->get();
        $expenses = Expense::query()->orderBy('description')->get();

        $balance = $this->getBalance($incomes, $expenses);

        return view('balance.index', compact('incomes', 'expenses', 'balance'));
    }

    private function getBalance(Collection $incomes, Collection $expenses): float
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
}
