<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryAddress;

class DeliveryAddressTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryRecords = [
            ['id'=>1,'user_id'=>1,'name'=>'Sadekul Islam','address'=>'KB Aman Ali Rd','city'=>'Chattogram','state'=>'Chattogram','country'=>'Bangladesh','pincode'=>'4203','mobile'=>'01812000000','status'=>1],
            ['id'=>2,'user_id'=>1,'name'=>'Sadekul Islam','address'=>'KB Aman Ali Rd','city'=>'Dhaka','state'=>'Dhaka','country'=>'Bangladesh','pincode'=>'4003','mobile'=>'01712000000','status'=>1]
        ];
        DeliveryAddress::insert($deliveryRecords);
    }
}
