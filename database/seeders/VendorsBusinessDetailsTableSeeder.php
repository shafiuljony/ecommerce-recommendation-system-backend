<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetails;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords =[
            ['id'=>1,'vendor_id'=>1,'shop_name'=>'saad Electronics store','shop_address'=>'rattarpol cda-124','shop_city'=>'Chattogram','shop_state'=>'chattogram','shop_country'=>'Bangladesh','shop_pincode'=>'4002','shop_mobile'=>'01558947938','shop_website'=>'example.in',
            'shop_email'=>'sadeq@admin.com',
            'address_proof'=>'Voter ID',
            'address_proof_image'=>'voterid.jpg',
            'business_license_number'=>'325543241',
            'gst_number'=>'324423424',
            'pan_number'=>'2334424',
            ]
        ];
        VendorsBusinessDetails::insert($vendorRecords);
    }
}
