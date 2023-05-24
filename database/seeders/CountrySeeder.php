<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
         'country_code' => 'BD',
         'country_name' => 'Bangladesh',
         'status' => 1,
         'created_at' => now(),
         'updated_at' => now()
       ];

         Country::insert($data);
    }
}
