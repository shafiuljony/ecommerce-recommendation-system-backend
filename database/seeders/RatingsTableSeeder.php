<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;
use App\Models\User;
use Faker\Factory as Faker;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        $users = User::pluck('id')->toArray();
        $products = Product::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $rating = $faker->numberBetween(1, 5);

            if ($rating > 3) {
                $review = $faker->randomElement(['Very Good Product', 'Excellent Product']);
            } else {
                $review = $faker->randomElement(['Not A Good Product', 'More Upgrading']);
            }

            $randomUser = $faker->randomElement($users);
            $randomProduct = $faker->randomElement($products);

            $rating = new Rating([
                'user_id' => $randomUser,
                'product_id' => $randomProduct,
                'review' => $review,
                'rating' => $rating,
                'status'=> 1
            ]);

            $rating->save();
        }
        // $ratingRecords = [
        //     ['id'=>1,'user_id'=>11,'product_id'=>1,'review'=>'Very Good Product','rating'=>4,'status'=>0],
        //     ['id'=>2,'user_id'=>11,'product_id'=>2,'review'=>'Excellent Product','rating'=>5,'status'=>0],
        //     ['id'=>3,'user_id'=>2,'product_id'=>1,'review'=>'Not Good at all','rating'=>1,'status'=>0],
        // ];
        // Rating::insert($ratingRecords);
    }
}
