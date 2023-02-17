<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannerRecords = [
            ['id'=>1,'image'=>'banner-1.jpg','type' => 'banner','link'=>'tranding-glasses','title'=>'Tranding Glasses','alt'=>'Tranding Glasses','status'=>1],
            ['id'=>2,'image'=>'banner-2.jpg','type' => 'banner','link'=>'tops','title'=>'Tops','alt'=>'Tops','status'=>1],
        ];
        Banner::insert($bannerRecords);
    }
}
