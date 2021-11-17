<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
            $data = [
                'name' => $faker->name,
                'email' => $faker->email(),
                'password' => $faker->password(),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber()
            ];

            $user = User::create($data);
            $user->attachRole('owner');
        }

        for ($i = 1; $i <= 9; $i++) {
            $data = [
                'name' => $faker->name,
                'email' => $faker->email(),
                'password' => $faker->password(),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber()
            ];

            $user = User::create($data);
            $user->attachRole('user');
        }

        $data = [
            'name' => 'Admin Evan',
            'email' => 'test@test.com',
            'password' => bcrypt('test1234'),
        ];
        $user = User::create($data);
        $user->attachRole('admin');
    }
}
