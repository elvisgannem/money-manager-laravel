<?php

namespace App\Http\Controllers;

use App\Services\IncomeCreator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IncomesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(): View
    {
        $title = 'Add Income';
        $actionUrl = '/incomes/create';
        return view('operations.create', compact('title', 'actionUrl'));
    }

    public function store(Request $request, IncomeCreator $incomeCreator): RedirectResponse
    {
        $request->validate([
            'description' => 'required',
            'amount' => 'required'
        ]);

        $income = $incomeCreator->createIncome(
            $request->description,
            $request->amount
        );

        return redirect('/');
    }
}
