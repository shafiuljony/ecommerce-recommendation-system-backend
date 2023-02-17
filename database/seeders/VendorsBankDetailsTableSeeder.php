<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetails;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorBankRecords =[
            [
                'id'=>2,
                'vendor_id'=>2,
                'account_holder_name'=>'sawrab Electronics store',
                'bank_name'=>'Al-arafa_islami-Bank',
                'account_number'=>'127217865',
                'bank_ifsc_code'=>'1221231',
            ]
        ];
        VendorsBankDetails::insert($vendorBankRecords);
    }
}
