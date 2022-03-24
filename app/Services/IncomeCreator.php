<?php

namespace App\Services;

use App\Models\Income;
use Illuminate\Support\Facades\DB;

class IncomeCreator
{
    public function createIncome(string $description, float $amount): Income
    {
        DB::beginTransaction();
        $income = Income::create(['description' => $description, 'amount' => $amount]);
        DB::commit();

        return $income;
    }
}
