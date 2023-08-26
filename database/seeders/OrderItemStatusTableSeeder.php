<?php

namespace Database\Seeders;

use App\Models\OrderItemStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderItemStatusRecords = [
            ['id'=>1,'name'=>'Pending','status'=>1],
            ['id'=>2,'name'=>'In Progress','status'=>1],
            ['id'=>3,'name'=>'Delivered To Office','status'=>1],
        ];
        OrderItemStatus::insert($orderItemStatusRecords);
    }
}
