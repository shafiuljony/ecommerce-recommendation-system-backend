<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryAddress;

class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryRecords = [
            ['id'=>1,'user_id'=>1,'name'=>'Sadekul Islam','address'=>'KB Aman Ali RD', 'city'=>'Chattogram','state'=>'Chattogram','country'=>'Bangladesh','pincode'=>'4203','mobile'=>'01919001122','status'=>1],
            ['id'=>2,'user_id'=>1,'name'=>'Sadekul Islam','address'=>'OR Nizam RD', 'city'=>'Chattogram','state'=>'Chattogram','country'=>'Bangladesh','pincode'=>'4205','mobile'=>'01919001133','status'=>1]
        ];
        DeliveryAddress::insert($deliveryRecords);
    }
}
