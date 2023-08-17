<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrdersProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all user IDs from the users table
        $userIds = DB::table('users')->pluck('id')->toArray();
        $productIds = DB::table('products')->pluck('id')->toArray();

        //Get Order Status

        for ($i = 1; $i <= 25; $i++) {
            // Randomly select a user ID from the array of user IDs
            $userId = $faker->randomElement($userIds);

            // Fetch user information from the users table based on the selected user ID
            $user = DB::table('users')->where('id', $userId)->first();

            // Create an order using Faker and user information
            $order = new Order([
                'user_id' => $user->id,
                'name' => $user->name,
                'address' => $user->address,
                'city' => $user->city,
                'state' => $user->state,
                'country' => $user->country,
                'pincode' => $user->pincode,
                'mobile' => $user->mobile,
                'email' => $user->email,
                'shipping_charges'=> $faker->randomElement([50,60,100,0]),/// can fech from shipping_charges
                'coupon_code'=> $faker->randomElement(['test10','newuser']),//can fech from coupon_code
                'coupon_amount'=> $faker->randomElement(['10','20']),//can fech from coupon_amount
                'order_status'=> $faker->randomElement(['Shipped','Delivered']),//can fech from order status
                'payment_method'=> $faker->randomElement(['Cash On delaviray','Paypal']),
                'payment_gateway'=> $faker->randomElement(['Cash On delaviray','Paypal']),
                'grand_total' => $faker->randomFloat(2, 10, 100),
                'courier_name'=> $faker->randomElement(['Shundorban','Bangladesh']),
                'tracking_number' => $faker->unique()->randomNumber(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $order->save();


            for ($j = 1; $j <= mt_rand(1,5); $j++) {
                // Randomly select a user ID from the array of user IDs
                $productId = $faker->randomElement($productIds);
                // Fetch user information from the users table based on the selected user ID
                $product = DB::table('products')->where('id', $productId)->first();
                OrdersProduct::create([
                    'order_id' => $order->id,
                    'user_id' => $order->user_id,
                    'vendor_id' => mt_rand(1,5),
                    'admin_id' => mt_rand(1,5),
                    'product_id' => $product->id,
                    'product_code' => $product->product_code,
                    'product_name' => $product->product_name,
                    'product_color' => $product->product_color,
                    'product_size' =>  $faker->randomElement(['Small','Medium','Large']),
                    'product_price' => $product->product_price,
                    'product_qty' => $faker->randomDigit,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
