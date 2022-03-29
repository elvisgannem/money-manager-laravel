<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HistoricalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request): View
    {
        $user_id = Auth::user()->id;
        $incomes = Income::where('user_id', $user_id)
            ->where('month', $request->id)
            ->orderBy('description')
            ->get();
        $expenses = Expense::where('user_id', $user_id)
            ->where('month', $request->id)
            ->orderBy('description')
            ->get();

        $balance = BalanceController::getBalance($incomes, $expenses);

        return view('balance.historical', compact('incomes', 'expenses', 'balance'));
    }
}
