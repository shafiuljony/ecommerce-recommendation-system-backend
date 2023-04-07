<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsAttributes;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productAttributesRecords = [
            ['id'=>1,'product_id'=>2,'size'=>'Small','price'=>800,'stock'=>10,'sku'=>'RMMRNTS-S','status'=>1],
            ['id'=>2,'product_id'=>2,'size'=>'Medium','price'=>900,'stock'=>20,'sku'=>'RMMRNTS-M','status'=>1],
            ['id'=>3,'product_id'=>2,'size'=>'Large','price'=>1000,'stock'=>15,'sku'=>'RMMRNTS-L','status'=>0]
        ];
        ProductsAttributes::insert($productAttributesRecords);
    }
}
