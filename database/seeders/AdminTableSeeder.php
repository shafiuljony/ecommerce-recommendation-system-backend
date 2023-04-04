<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Vendor;

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
                'password'=>'$2y$10$1IYwHMurZZCh84Xml42KbOiAO6TQ.gsg4WVanDUbDMAW8Np.P3lj6',
                'image'=>'',
                'status'=> 1
            ]
            ];
            Admin::insert($adminRecords);
    }
}
