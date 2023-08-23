<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DeliveryAddress;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user',
            'address' => 'user address', 
            'city' => 'user city',
            'state' => 'user state',
            'country' => 'user country',
            'pincode' => 'user pincode',
            'mobile' => '01866666666',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 1,
            'email_verified_at' => now(),
        ]);

        $this->call(AdminTableSeeder::class);
        $this->call(VendorsTableSeeder::class);
        $this->call(VendorsBusinessDetailsTableSeeder::class);
        $this->call(VendorsBankDetailsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call([ProductsTableSeeder::class]);
        $this->call([ProductsAttributesTableSeeder::class]);
        $this->call([UserTableSeeder::class]);
        $this->call(BannersTableSeeder::class);
        $this->call(FiltersTableSeeder::class);
        $this->call(FiltersValuesTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(DeliveryAddressTableSeeder::class);
    $this->call([RatingsTableSeeder::class]);
        $this->call([OrdersTableSeeder::class]);
         $this->call(OrderStatusTableSeeder::class);

         $this->call(CountrySeeder::class);
         $this->call(ShippingChargeTableSeeder::class);
    }
}
