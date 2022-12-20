<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

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
                'id'=>1,
                'name'=>'Super Admin',
                'type'=>'superAdmin',
                'vendor_id'=>0,
                'mobile'=>'01558947938',
                'email'=>'admin@eduadmin.com',
                'password'=>'$2y$10$tEIpd9ycboqkcpTSd.5qce3j3Q8cpWRRsHeG5Hd6lhNJQgFEwBkFy',
                'image'=>'',
                'status'=> 1
            ]
            ];
            Admin::insert($adminRecords);
    }
}
