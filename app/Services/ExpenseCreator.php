<?php

namespace App\Services;

use App\Models\Expense;
use Illuminate\Support\Facades\DB;

class ExpenseCreator
{
    public function createExpense(string $description, float $amount, int $user_id, int $month): Expense
    {
        DB::beginTransaction();
        $expense = Expense::create(
            [
                'user_id' => $user_id,
                'description' => $description,
                'amount' => $amount,
                'month' => $month,
            ]
        );
        DB::commit();

        return $expense;
    }
}
