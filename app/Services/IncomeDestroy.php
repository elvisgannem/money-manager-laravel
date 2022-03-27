<?php

namespace App\Services;

use App\Models\Income;
use Illuminate\Support\Facades\DB;

class IncomeDestroy
{
    public function destroyIncome(int $id): int
    {
        DB::beginTransaction();
        $income = Income::where('id', $id)->delete();
        DB::commit();

        return $income;
    }
}
