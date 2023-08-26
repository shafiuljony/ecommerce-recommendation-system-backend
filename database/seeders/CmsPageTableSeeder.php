<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CmsPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cmsPagesRecords = [
            ['id'=>1, 'title'=>'About Us','description'=>'Content is coming soon','url'=>'about-us','meta_title'=> 'About Us','meta_description'=>'about us content','meta_keywords'=>'about us, about', 'status'=> 1],
            ['id'=>2, 'title'=>'Terms  & Conditions','description'=>'Content is coming soon','url'=>'terms-condition','meta_title'=> 'Terms  & Conditions','meta_description'=>'terms  & conditions content','meta_keywords'=>'terms  & conditions, conditions', 'status'=> 1],
            ['id'=>3, 'title'=>'Privacy Policy','description'=>'Privacy Policy Content is coming soon','url'=>'privacy-policy','meta_title'=> 'Privacy Policy','meta_description'=>'privacy policy content','meta_keywords'=>'privacy policy, privacy', 'status'=> 1],
        ];
        CmsPage::insert($cmsPagesRecords);
    }
}
