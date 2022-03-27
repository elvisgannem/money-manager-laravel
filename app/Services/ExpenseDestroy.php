<?php

namespace App\Services;

use App\Models\Expense;
use Illuminate\Support\Facades\DB;

class ExpenseDestroy
{
    public function destroyExpense(int $id): int
    {
        DB::beginTransaction();
        $expense = Expense::where('id', $id)->delete();
        DB::commit();

        return $expense;
    }
}
