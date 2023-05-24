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
                'vendor_id'=>1,
                'mobile'=>'01558947938',
                'email'=>'admin@anon.com',
                'password'=> Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'shafiul',
                'type'=>'vendor',
                'vendor_id'=>3,
                'mobile'=>'01558947938',
                'email'=>'shafiul@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ],
            [
                'name'=>'shafiul',
                'type'=>'admin',
                'vendor_id'=>2,
                'mobile'=>'01558947938',
                'email'=>'shafiuladmin@anon.com',
                'password'=>Hash::make('123456'),
                'image'=>'',
                'status'=> 1
            ]
            ];
            Admin::insert($adminRecords);
    }
}
