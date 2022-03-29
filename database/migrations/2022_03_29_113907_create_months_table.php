<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('months', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->string('short');
        });

        DB::table('months')->insert(
            array(
                [
                    'month' => 'January',
                    'short' => 'Jan'
                ],
                [
                    'month' => 'February',
                    'short' => 'Feb'
                ],
                [
                    'month' => 'March',
                    'short' => 'Mar'
                ],
                [
                    'month' => 'April',
                    'short' => 'Apr'
                ],
                [
                    'month' => 'May',
                    'short' => 'May'
                ],
                [
                    'month' => 'June',
                    'short' => 'Jun'
                ],
                [
                    'month' => 'July',
                    'short' => 'Jul'
                ],
                [
                    'month' => 'August',
                    'short' => 'Aug'
                ],
                [
                    'month' => 'September',
                    'short' => 'Sep'
                ],
                [
                    'month' => 'October',
                    'short' => 'Oct'
                ],
                [
                    'month' => 'November',
                    'short' => 'Nov'
                ],
                [
                    'month' => 'December',
                    'short' => 'Dec'
                ],

            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('months');
    }
};
