<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>1,'name'=>'sadequl','address'=>'rattarpol-112','city'=>'chattogram','state'=>'chattogram','country'=>'Bangladesh','pincode'=>'4005','mobile'=>'01558947938','email'=>'sadeq@admin.com','status'=>0]
        ];
        Vendor::insert($vendorRecords);
    }
}
