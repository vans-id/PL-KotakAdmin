<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KosntrakTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            DB::table('kosntraks')->insert([
                'type' => "kos",
                'name' => "Kos dekat " . $faker->streetName,
                'address' => $faker->address(),
                'maps' => 'maps',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'price' => 1500000,
                'bedroom' => "Single",
                'bathroom' => "Dalam"
            ]);
        }
    }
}
