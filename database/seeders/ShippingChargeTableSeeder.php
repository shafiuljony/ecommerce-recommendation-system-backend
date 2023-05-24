<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingChargeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
           'country' => 'Bangladesh',
           'rate' => 50,
           'status' => 1,
           '0_500g' => 50,
           '501_1000g' => 100,
           '1001_2000g' => 150,
           '2001_5000g' => 200,
           'above_5000g' => 300,
       ];

         \App\Models\ShippingCharge::insert($data);
    }
}
