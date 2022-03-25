<?php

namespace App\Services;

use App\Models\Expense;
use Illuminate\Support\Facades\DB;

class ExpenseCreator
{
    public function createExpense(string $description, float $amount, int $user_id): Expense
    {
        DB::beginTransaction();
        $expense = Expense::create(['user_id' => $user_id, 'description' => $description, 'amount' => $amount]);
        DB::commit();

        return $expense;
    }
}
