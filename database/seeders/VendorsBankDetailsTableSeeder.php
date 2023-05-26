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
                'id'=>1,
                'vendor_id'=>1,
                'account_holder_name'=>'Paul Organic House',
                'bank_name'=>'City Bank Limited',
                'account_number'=>'117217865',
                'bank_ifsc_code'=>'1121231',
            ],
            [
                'id'=>2,
                'vendor_id'=>2,
                'account_holder_name'=>'SH Electronics',
                'bank_name'=>'City Bank Limited',
                'account_number'=>'127217865',
                'bank_ifsc_code'=>'1221231',
            ],
            [
                'id'=>3,
                'vendor_id'=>3,
                'account_holder_name'=>'Raozan Groceries',
                'bank_name'=>'Al-Arafah_Islami-Bank',
                'account_number'=>'137217865',
                'bank_ifsc_code'=>'1321231',
            ],
            [
                'id'=>4,
                'vendor_id'=>4,
                'account_holder_name'=>'OAS Tea',
                'bank_name'=>'Cox-Bazar Bank Limited',
                'account_number'=>'147217865',
                'bank_ifsc_code'=>'1421231',
            ],
            [
                'id'=>5,
                'vendor_id'=>5,
                'account_holder_name'=>'Banu Appeal',
                'bank_name'=>'Al-Arafah_Islami-Bank',
                'account_number'=>'157217865',
                'bank_ifsc_code'=>'1521231',
            ],
            [
                'id'=>6,
                'vendor_id'=>6,
                'account_holder_name'=>'Leaf',
                'bank_name'=>'Al-Arafah_Islami-Bank',
                'account_number'=>'167217865',
                'bank_ifsc_code'=>'1621231',
            ],
            [
                'id'=>7,
                'vendor_id'=>7,
                'account_holder_name'=>'One Piece',
                'bank_name'=>'Al-Arafah_Islami-Bank',
                'account_number'=>'177217865',
                'bank_ifsc_code'=>'1721231',
            ],
            [
                'id'=>8,
                'vendor_id'=>8,
                'account_holder_name'=>'Black Bull',
                'bank_name'=>'Al-Arafah_Islami-Bank',
                'account_number'=>'187217865',
                'bank_ifsc_code'=>'1821231',
            ],
            [
                'id'=>9,
                'vendor_id'=>9,
                'account_holder_name'=>'Ishina',
                'bank_name'=>'Al-Arafah_Islami-Bank',
                'account_number'=>'197217865',
                'bank_ifsc_code'=>'1921231',
            ],
            [
                'id'=>10,
                'vendor_id'=>10,
                'account_holder_name'=>'Lost Again',
                'bank_name'=>'Al-Arafah_Islami-Bank',
                'account_number'=>'110217865',
                'bank_ifsc_code'=>'1101231',
            ],
        ];
        VendorsBankDetails::insert($vendorBankRecords);
    }
}
