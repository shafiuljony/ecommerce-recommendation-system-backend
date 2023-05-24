<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsAttributes;
use Faker\Factory as Faker;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $productId = Product::pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {

            $productattribute = new ProductsAttributes([
                'product_id' => $faker->randomElement($productId),
                'size' => $faker->randomElement(['S', 'M', 'L']),
                'price' => $faker->randomFloat(2, 10, 100),
                'stock' => $faker->numberBetween(0, 100),
                'sku' => $faker->unique()->bothify('??-######'),
                'status' => 1,
            ]);
            $productattribute->save();
        }
    }
}
