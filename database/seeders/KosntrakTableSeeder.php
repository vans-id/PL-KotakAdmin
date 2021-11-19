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

        for ($i = 1; $i <= 3; $i++) {
            DB::table('kosntraks')->insert([
                'user_id' => $i,
                'jenis' => "kos",
                'nama_tempat' => "Kos dekat Jl. " . $faker->streetName,
                'alamat' => $faker->address(),
                'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1017.1549948962072!2d110.49697877460572!3d-7.3188456339724235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a781552706799%3A0x85d7fc433e885dae!2sUnihouse!5e1!3m2!1sen!2sid!4v1636966918875!5m2!1sen!2sid',
                'keterangan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'harga_sewa' => 1500000,
                'status_kamar' => "Single",
                'status_kamarmandi' => "Dalam",
                'wifi' => "100 Mbps",
                'laundry' => "Ada",
                'warung_makan' => 3,
                'peraturan' => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
            ]);
        }
    }
}
