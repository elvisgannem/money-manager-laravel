<?php

namespace App\Services;

use App\Models\Expense;
use Illuminate\Support\Facades\DB;

class ExpenseCreator
{
    public function createExpense(string $description, float $amount): Expense
    {
        DB::beginTransaction();
        $expense = Expense::create(['description' => $description, 'amount' => $amount]);
        DB::commit();

        return $expense;
    }
}
