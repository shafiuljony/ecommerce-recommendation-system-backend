<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');
        for ($i=1; $i <= 25; $i++) {
            $user = new User([
                'name' => $faker->name,
                'address' => $faker->address,
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => $faker->country,
                'pincode' => $faker->numberBetween(1000, 10000),
                'mobile' => $faker->phoneNumber,
                'email' => 'user'.$i.'@gmail.com',
                'password' => Hash::make('123456'),
                'status' => 1,
                'email_verified_at' => now(),
            ]);

            $user->save();
        }


    }
}
