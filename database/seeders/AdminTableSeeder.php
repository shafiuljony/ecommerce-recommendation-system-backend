<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            [
                'name'=>'admin',
                'type'=>'superadmin',
                'vendor_id'=>0,
                'mobile'=>'01558947938',
                'email'=>'admin@anon.com',
                'password'=> Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'shafiul',
                'type'=>'admin',
                'vendor_id'=>0,
                'mobile'=>'01558947938',
                'email'=>'shafiuladmin@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'Mr.Paul',
                'type'=>'vendor',
                'vendor_id'=>1,
                'mobile'=>'01866702189',
                'email'=>'arup@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'Sowrab Hasan',
                'type'=>'vendor',
                'vendor_id'=>2,
                'mobile'=>'01611769787',
                'email'=>'sowrab@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'Mohammad Munir',
                'type'=>'vendor',
                'vendor_id'=>3,
                'mobile'=>'01822604285',
                'email'=>'munir@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'Mohammad Sadekul Islam',
                'type'=>'vendor',
                'vendor_id'=>4,
                'mobile'=>'01839673550',
                'email'=>'sadekul@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'Md.Shafiul Islam',
                'type'=>'vendor',
                'vendor_id'=>5,
                'mobile'=>'01558947938',
                'email'=>'shafiul@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'Naruto Uzumaki',
                'type'=>'vendor',
                'vendor_id'=>6,
                'mobile'=>'01558947938',
                'email'=>'naruto@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'Monkey D Luffy',
                'type'=>'vendor',
                'vendor_id'=>7,
                'mobile'=>'01558947938',
                'email'=>'luffy@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'Asta',
                'type'=>'vendor',
                'vendor_id'=>8,
                'mobile'=>'01558947938',
                'email'=>'asta@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'Ichigo Kurosaki',
                'type'=>'vendor',
                'vendor_id'=>9,
                'mobile'=>'01558947938',
                'email'=>'icigo@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'Roronoa Zoro',
                'type'=>'vendor',
                'vendor_id'=>10,
                'mobile'=>'01558947938',
                'email'=>'zoro@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ]
            ];
            Admin::insert($adminRecords);
    }
}
