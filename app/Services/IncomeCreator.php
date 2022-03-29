<?php

namespace App\Services;

use App\Models\Income;
use Illuminate\Support\Facades\DB;

class IncomeCreator
{
    public function createIncome(string $description, float $amount, int $user_id, int $month): Income
    {
        DB::beginTransaction();
        $income = Income::create(
            [
                'user_id' => $user_id,
                'description' => $description,
                'amount' => $amount,
                'month' => $month
            ]
        );
        DB::commit();

        return $income;
    }
}
