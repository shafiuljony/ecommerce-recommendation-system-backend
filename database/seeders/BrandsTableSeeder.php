<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandRecords = [
            ['id'=>1,'name'=>'Rich Man','status'=>1],
            ['id'=>2,'name'=>'Shoilpik','status'=>1],
            ['id'=>3,'name'=>'Pret A Porter','status'=>1],
            ['id'=>4,'name'=>'Samsung','status'=>1],
            ['id'=>5,'name'=>'MI','status'=>1],
            ['id'=>6,'name'=>'HP','status'=>1],
            ['id'=>7,'name'=>'LG','status'=>1],
        ];
        Brand::insert($brandRecords);
    }

}
