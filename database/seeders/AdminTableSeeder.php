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
                'id'=>3,
                'name'=>'sowrab',
                'type'=>'vendor',
                'vendor_id'=>2,
                'mobile'=>'01558947938',
                'email'=>'sowrab@admin.com',
                'password'=>'$2a$12$I59aps/86B/mZgYaZXGuOe6UL5BxSG73XSpxr6bLO/RymkCOjnW.C',
                'image'=>'',
                'status'=> 0
            ]
            ];
            Admin::insert($adminRecords);
    }
}
