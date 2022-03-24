<?php

namespace App\Http\Controllers;

use App\Services\ExpenseCreator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExpensesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(): View
    {
        $title = 'Add Expense';
        $actionUrl = '/expenses/create';
        return view('operations.create', compact('title', 'actionUrl'));
    }

    public function store(Request $request, ExpenseCreator $incomeCreator): RedirectResponse
    {
        $request->validate([
            'description' => 'required',
            'amount' => 'required'
        ]);

        $income = $incomeCreator->createExpense(
            $request->description,
            $request->amount
        );

        return redirect('/');
    }
}
