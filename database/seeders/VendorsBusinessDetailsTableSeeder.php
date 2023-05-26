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
            ['id'=>1,'vendor_id'=>1,'shop_name'=>'Paul Organic House','shop_address'=>'shitakundo','shop_city'=>'Chattogram','shop_state'=>'Chattogram','shop_country'=>'Bangladesh','shop_pincode'=>'4310','shop_mobile'=>'01866702189','shop_website'=>'examplesie.bd',
                'shop_email'=>'arup@anon.com',
                'address_proof'=>'Voter ID',
                'address_proof_image'=>'voterid.jpg',
                'business_license_number'=>'3155432412',
                'gst_number'=>'3144234243',
                'pan_number'=>'21344242',
            ],
            ['id'=>2,'vendor_id'=>2,'shop_name'=>'SH Electronics','shop_address'=>'Chandgoan residential area','shop_city'=>'Chattogram','shop_state'=>'Chattogram','shop_country'=>'Bangladesh','shop_pincode'=>'4212','shop_mobile'=>'01611769787','shop_website'=>'examplesie.bd',
                'shop_email'=>'sowrab@anon.com',
                'address_proof'=>'Voter ID',
                'address_proof_image'=>'voterid.jpg',
                'business_license_number'=>'3255432412',
                'gst_number'=>'3244234243',
                'pan_number'=>'22344242',
            ],
            ['id'=>3,'vendor_id'=>3,'shop_name'=>'Raozan Groceries','shop_address'=>'Raozan','shop_city'=>'Chattogram','shop_state'=>'Chattogram','shop_country'=>'Bangladesh','shop_pincode'=>'4340','shop_mobile'=>'01822604285','shop_website'=>'examplesie.bd',
                'shop_email'=>'munir@anon.com',
                'address_proof'=>'Voter ID',
                'address_proof_image'=>'voterid.jpg',
                'business_license_number'=>'3355432412',
                'gst_number'=>'3344234243',
                'pan_number'=>'23344242',
            ],
            ['id'=>4,'vendor_id'=>4,'shop_name'=>'OAS Tea','shop_address'=>'Banshkhali','shop_city'=>'Chattogram','shop_state'=>'Chattogram','shop_country'=>'Bangladesh','shop_pincode'=>'4393','shop_mobile'=>'01839673550','shop_website'=>'examplesie.bd',
                'shop_email'=>'sadekul@anon.com',
                'address_proof'=>'Voter ID',
                'address_proof_image'=>'voterid.jpg',
                'business_license_number'=>'3455432412',
                'gst_number'=>'3444234243',
                'pan_number'=>'24344242',
            ],
            ['id'=>5,'vendor_id'=>5,'shop_name'=>'Banu Appeal','shop_address'=>'Biponi Bitan (New Market), Chattogram','shop_city'=>'Chattogram','shop_state'=>'Chattogram','shop_country'=>'Bangladesh','shop_pincode'=>'4000','shop_mobile'=>'01558947938','shop_website'=>'examplesie.bd',
                'shop_email'=>'shafiul@anon.com',
                'address_proof'=>'Voter ID',
                'address_proof_image'=>'voterid.jpg',
                'business_license_number'=>'3555432412',
                'gst_number'=>'3544234243',
                'pan_number'=>'25344242',
            ],
            ['id'=>6,'vendor_id'=>6,'shop_name'=>'Leaf','shop_address'=>'Konoha','shop_city'=>'tokyo','shop_state'=>'tokyo','shop_country'=>'Japan','shop_pincode'=>'4003','shop_mobile'=>'01558947938','shop_website'=>'examplesie.bd',
                'shop_email'=>'naruto@anon.com',
                'address_proof'=>'Voter ID',
                'address_proof_image'=>'voterid.jpg',
                'business_license_number'=>'3655432412',
                'gst_number'=>'3644234243',
                'pan_number'=>'26344242',
            ],
            ['id'=>7,'vendor_id'=>7,'shop_name'=>'One Piece','shop_address'=>'Foosha Village','shop_city'=>'Dawn Island','shop_state'=>'Dawn Island','shop_country'=>'Goa Kingdom','shop_pincode'=>'277612','shop_mobile'=>'01558947938','shop_website'=>'examplesie.bd',
                'shop_email'=>'luffy@anon.com',
                'address_proof'=>'Voter ID',
                'address_proof_image'=>'voterid.jpg',
                'business_license_number'=>'3755432412',
                'gst_number'=>'3744234243',
                'pan_number'=>'27344242',
            ],
            ['id'=>8,'vendor_id'=>8,'shop_name'=>'Black Bull','shop_address'=>'Hage Village','shop_city'=>'Forsaken Realm','shop_state'=>'Forsaken Realm','shop_country'=>'Clover Kingdom','shop_pincode'=>'8972372','shop_mobile'=>'01558947938','shop_website'=>'examplesie.bd',
                'shop_email'=>'asta@anon.com',
                'address_proof'=>'Voter ID',
                'address_proof_image'=>'voterid.jpg',
                'business_license_number'=>'3855432412',
                'gst_number'=>'3844234243',
                'pan_number'=>'28344242',
            ],
            ['id'=>9,'vendor_id'=>9,'shop_name'=>'Ishina','shop_address'=>'Karakura Town','shop_city'=>'Western Tokyo','shop_state'=>'Western Tokyo','shop_country'=>'Japan','shop_pincode'=>'4003','shop_mobile'=>'65476373','shop_website'=>'examplesie.bd',
                'shop_email'=>'icigo@anon.com',
                'address_proof'=>'Voter ID',
                'address_proof_image'=>'voterid.jpg',
                'business_license_number'=>'3955432412',
                'gst_number'=>'3944234243',
                'pan_number'=>'29344242',
            ],
            ['id'=>10,'vendor_id'=>10,'shop_name'=>'Lost Again','shop_address'=>'Shimotsuki Village','shop_city'=>'East Blue','shop_state'=>'East Blue','shop_country'=>'Goa Kingdom','shop_pincode'=>'27862786','shop_mobile'=>'01558947938','shop_website'=>'examplesie.bd',
                'shop_email'=>'zoro@anon.com',
                'address_proof'=>'Voter ID',
                'address_proof_image'=>'voterid.jpg',
                'business_license_number'=>'31055432412',
                'gst_number'=>'31044234243',
                'pan_number'=>'210344242',
            ],
        ];
        VendorsBusinessDetails::insert($vendorRecords);
    }
}
