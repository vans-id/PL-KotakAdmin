<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('transactions')->insert([
                'kosntrak_id' => $i,
                'user_id' => $i + 5,
                'payment_status' => 0,
                'start_date' => date("Y-m-d"),
                'end_date' => date("Y-m-d")
            ]);
        }
    }
}
