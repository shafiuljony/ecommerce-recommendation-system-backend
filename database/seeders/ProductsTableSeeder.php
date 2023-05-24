<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $vendors = Vendor::pluck('id');
        $admins = Admin::pluck('id')->toArray();
        $sections = Section::pluck('id')->toArray();
        $categorys = Category::pluck('id')->toArray();
        $brands = Brand::pluck('id')->toArray();
        $imagePath = public_path('front/images/product/');
        // $videoPath = public_path('images');
    
        for ($i = 0; $i < 50; $i++) {
            $productImage = $faker->randomElement(Storage::files($imagePath));
            // $productVideo = $faker->randomElement(Storage::files($videoPath));
            $product = new Product([
            'section_id' => $faker->randomElement($sections),
            'category_id' => $faker->randomElement($categorys),
            'brand_id' => $faker->randomElement($brands),
            'vendor_id' => $vendors->random(),
            'admin_id' => $faker->randomElement($admins),
            'admin_type' => 'vendor',
            'product_name' => $faker->randomElement(['T-shirt','Pants']),
            'product_code' => $faker->unique()->randomNumber(6),
            'product_color' => $faker->colorName,
            'product_price' => $faker->randomFloat(2, 10, 100),
            'product_discount' => $faker->numberBetween(5, 50),
            'product_weight' => $faker->numberBetween(100, 1000),
            'group_code' => $faker->randomLetter,
            'product_image' => $productImage,
            'product_video' => $faker->url,
            'meta_title' => $faker->sentence,
            'meta_keywords' => $faker->words(5, true),
            'meta_description' => $faker->sentence,
            'is_featured' => $faker->randomElement(['Yes', 'No']),
            'status' => 1,
        ]);
        $product->save();
        }   
    }
}
