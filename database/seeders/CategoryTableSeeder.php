<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecords = [
            ['id'=>1,'parent_id'=>0,'section_id'=>2,'category_name'=>'Desktop','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'desktop','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>2,'parent_id'=>0,'section_id'=>2,'category_name'=>'Laptop','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'laptop','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>3,'parent_id'=>0,'section_id'=>2,'category_name'=>'Mobile','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'mobile','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>4,'parent_id'=>0,'section_id'=>1,'category_name'=>"Men's",'category_image'=>'','category_discount'=>0,'description'=>'','url'=>'men','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>5,'parent_id'=>0,'section_id'=>1,'category_name'=>"Women",'category_image'=>'','category_discount'=>0,'description'=>'','url'=>'women','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>6,'parent_id'=>0,'section_id'=>1,'category_name'=>"Kid's",'category_image'=>'','category_discount'=>0,'description'=>'','url'=>'kid','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>7,'parent_id'=>0,'section_id'=>3,'category_name'=>'Air Condition','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'ac','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>8,'parent_id'=>0,'section_id'=>3,'category_name'=>'Television','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'television','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1]
        ];
        Category::insert($categoryRecords);
    }
}
