<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRecords = [
            ['id'=>1,'section_id'=>1,'category_id'=>7,'brand_id'=>4,'vendor_id'=>1,'admin_id'=>0,'admin_type'=>'vendor','product_name'=>'Samsung Galaxy M33','product_code'=>'SGM33','product_color'=>'Blue','product_price'=>36000,'product_discount'=>10,'product_weight'=>500,'product_image'=>'',"product_video"=>'','meta_title'=>'','meta_keywords'=>'','meta_description'=>'','is_featured'=>'Yes','status'=>1],
            ['id'=>2,'section_id'=>2,'category_id'=>9,'brand_id'=>1,'vendor_id'=>0,'admin_id'=>0,'admin_type'=>'superadmin','product_name'=>'Richman Basic Full Sleeve T-shirt','product_code'=>'RMBFSTS','product_color'=>'Navy-Blue','product_price'=>1600,'product_discount'=>20,'product_weight'=>200,'product_image'=>'',"product_video"=>'','meta_title'=>'','meta_keyword'=>'','meta_description'=>'','is_featured'=>'Yes','status'=>1],
        ];
        Product::insert($productRecords);
    }
}
