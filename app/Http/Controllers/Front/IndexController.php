<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $sliderBanners =  Banner::where('type','Slider')->where('status',1)->get()->toArray();
        $fixBanners =  Banner::where('type','Fix')->where('status',1)->get()->toArray();
        $newProducts = Product::orderBy('id','Desc')->where('status',1)->limit(8)->get()->toArray();
        $bestSellers = Product::where(['is_bestseller'=>'Yes','status'=>1])->inRandomOrder()->get()->toArray();
        $discounterProducts = Product::where('product_discount','>',0)->where('status',1)->limit(6)->inRandomOrder()->get()->toArray();
        $isfeatured = Product::where(['is_featured'=>'Yes','status'=>1])->inRandomOrder()->get()->toArray();
        // dd($discounterProducts);
        return view('front.index')->with(compact('sliderBanners','fixBanners','newProducts','bestSellers','discounterProducts','isfeatured'));
    }
}
