<?php

namespace App\Http\Controllers;

use App\Services\ExpenseCreator;
use App\Services\ExpenseDestroy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $request->amount,
            Auth::user()->id,
            date('n')
        );

        return redirect('/');
    }

    public function destroy(Request $request, ExpenseDestroy $expenseDestroy): bool
    {
        return $expenseDestroy->destroyExpense($request->id);
    }
}
