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

        $vendorRecords =[
            [
                'id'=>1,
                'name'=>'Mr.Paul',
                'address'=>'shitakundo',
                'city'=>'chattogram',
                'state'=>'chattogram',
                'country'=>'Bangladesh',
                'pincode'=> '4310',
                'mobile'=> '01866702189',
                'email'=> 'arup@anon.com',
                'status'=>1
            ],
            [
                'id'=>2,
                'name'=>'Sowrab Hasan',
                'address'=>'Chandgoan residential area',
                'city'=>'chattogram',
                'state'=>'chattogram',
                'country'=>'Bangladesh',
                'pincode'=> '4212',
                'mobile'=> '01611769787',
                'email'=> 'sowrab@anon.com',
                'status'=>1
            ],
            [
                'id'=>3,
                'name'=>'Mohammad Munir',
                'address'=>'Raozan',
                'city'=>'chattogram',
                'state'=>'chattogram',
                'country'=>'Bangladesh',
                'pincode'=> '4340',
                'mobile'=> '01822604285',
                'email'=> 'munir@anon.com',
                'status'=>1
            ],
            [
                'id'=>4,
                'name'=>'Mohammad Sadekul Islam',
                'address'=>'Banshkhali',
                'city'=>'chattogram',
                'state'=>'chattogram',
                'country'=>'Bangladesh',
                'pincode'=> '4393',
                'mobile'=> '01839673550',
                'email'=> 'sadekul@anon.com',
                'status'=>1
            ],
            [
                'id'=>5,
                'name'=>'Md.Shafiul Islam',
                'address'=>'Biponi Bitan (New Market), Chattogram',
                'city'=>'chattogram',
                'state'=>'chattogram',
                'country'=>'Bangladesh',
                'pincode'=> '4000',
                'mobile'=> '01556391725',
                'email'=> 'shafiul@anon.com',
                'status'=>1
            ],
            [
                'id'=>6,
                'name'=>'Naruto Uzumaki',
                'address'=>'Konoha',
                'city'=>'tokyo',
                'state'=>'tokyo',
                'country'=>'Japan',
                'pincode'=> '110-0006',
                'mobile'=> '080-1234-5678',
                'email'=> 'naruto@anon.com',
                'status'=>1
            ],
            [
                'id'=>7,
                'name'=>'Monkey D Luffy',
                'address'=>'Foosha Village',
                'city'=>'Dawn Island',
                'state'=>'Dawn Island',
                'country'=>'Goa Kingdom',
                'pincode'=> '277612',
                'mobile'=> '01558947938',
                'email'=> 'luffy@anon.com',
                'status'=>1
            ],
            [
                'id'=>8,
                'name'=>'Asta',
                'address'=>'Hage Village',
                'city'=>'Forsaken Realm',
                'state'=>'Forsaken Realm',
                'country'=>'Clover Kingdom',
                'pincode'=> '8972372',
                'mobile'=> '01558947938',
                'email'=> 'asta@anon.com',
                'status'=>1
            ],
            [
                'id'=>9,
                'name'=>'Ichigo Kurosaki',
                'address'=>'Karakura Town',
                'city'=>'Western Tokyo',
                'state'=>'Western Tokyo',
                'country'=>'Japan',
                'pincode'=> '65476373',
                'mobile'=> '01558947938',
                'email'=> 'icigo@anon.com',
                'status'=>1
            ],
            [
                'id'=>10,
                'name'=>'Roronoa Zoro',
                'address'=>'Shimotsuki Village',
                'city'=>'East Blue',
                'state'=>'East Blue',
                'country'=>'Goa Kingdom',
                'pincode'=> '27862786',
                'mobile'=> '01558947938',
                'email'=> 'zoro@anon.com',
                'status'=>1
            ],
        ];
        Vendor::insert($vendorRecords);
    }
}
