<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\LaratrustSeeder;
use Database\Seeders\SewaTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\KosntrakTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(KosntrakTableSeeder::class);
        $this->call(SewaTableSeeder::class);
    }
}
