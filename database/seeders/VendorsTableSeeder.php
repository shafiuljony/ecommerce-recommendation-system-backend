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
            ['id'=>2,'name'=>'Sowrab','address'=>'Boddarhat-112','city'=>'Chattogram','state'=>'Chattogram','country'=>'Bangladesh','pincode'=>'4002','mobile'=>'01558947938','email'=>'sowrab@admin.com','status'=>1]
        ];
        Vendor::insert($vendorRecords);
    }
}
