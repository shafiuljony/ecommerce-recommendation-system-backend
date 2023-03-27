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
            ['id'=>2,'vendor_id'=>2,'shop_name'=>'Sawrab Electronics Store','shop_address'=>'BoddarHat cda-124','shop_city'=>'Chattogram','shop_state'=>'Chattogram','shop_country'=>'Bangladesh','shop_pincode'=>'4001','shop_mobile'=>'01558947938','shop_website'=>'examplesw.in',
            'shop_email'=>'sowrab@admin.com',
            'address_proof'=>'Voter ID',
            'address_proof_image'=>'voterid.jpg',
            'business_license_number'=>'3255432412',
            'gst_number'=>'3244234243',
            'pan_number'=>'23344242',
            ]
        ];
        VendorsBusinessDetails::insert($vendorRecords);
    }
}
