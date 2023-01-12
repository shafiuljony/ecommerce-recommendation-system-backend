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
                'id'=>2,
                'name'=>'sadequl',
                'type'=>'vendor',
                'vendor_id'=>1,
                'mobile'=>'01558947938',
                'email'=>'sadeq@admin.com',
                'password'=>'$2y$10$tEIpd9ycboqkcpTSd.5qce3j3Q8cpWRRsHeG5Hd6lhNJQgFEwBkFy',
                'image'=>'',
                'status'=> 0
            ]
            ];
            Admin::insert($adminRecords);
    }
}
