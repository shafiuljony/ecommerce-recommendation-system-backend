<?php

namespace Database\Seeders;

use App\Models\NewsletterSubscriber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsletterSubscriberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscriberRecords = [
            ['id'=>1,'email'=>'sadekul333@gmail.com','status'=>1],
            ['id'=>2,'email'=>'sadekul334@gmail.com','status'=>1]
        ];
        NewsletterSubscriber::insert($subscriberRecords);
    }
}
