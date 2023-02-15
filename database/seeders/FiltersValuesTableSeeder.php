<?php

namespace Database\Seeders;

use App\Models\ProductsFiltersValues;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiltersValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filterValueRecords = [
            ['id'=>1,'filter_id'=>1,'filter_value'=>'4gb','status'=>1],
            ['id'=>2,'filter_id'=>1,'filter_value'=>'8gb','status'=>1],
            ['id'=>3,'filter_id'=>2,'filter_value'=>'cotton','status'=>1],
            ['id'=>4,'filter_id'=>2,'filter_value'=>'polyester','status'=>1]
        ];
        ProductsFiltersValues::insert($filterValueRecords);
    }
}
