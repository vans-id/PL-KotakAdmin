<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SewaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('sewas')->insert([
                'user_id' => $i + 5,
                'kosntrak_id' => $i,
                'tanggal' => date("Y-m-d"),
                'status_sewa' => '',
                'status_bayar' => '',
            ]);
        }
    }
}
