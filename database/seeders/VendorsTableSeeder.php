<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
use Faker\Factory as Faker;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        for ($i=1; $i <= 10; $i++) { 
            $vendor = new Vendor;
            $vendor->name = $faker->name;
            $vendor->address = $faker->address;
            $vendor->city = $faker->city;
            $vendor->state = $faker->state;
            $vendor->country = $faker->country;
            $vendor->pincode = $faker->numberBetween(10000, 99999);
            $vendor->mobile = $faker->phoneNumber;
            $vendor->email = $faker->unique()->email;
            $vendor->save();
        }
    }
}
