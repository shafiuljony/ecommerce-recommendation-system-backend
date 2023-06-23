<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\OrdersProduct;
use App\Models\Product;
use App\Models\Rating;
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



         //recommended product
        if(auth()->check()) {
            $orderProducts = OrdersProduct::where('user_id',auth()->id())->pluck('product_id');
            $categoryId = Product::whereIn('id', $orderProducts)->pluck('category_id')->unique();
            $categoryProducts = Product::whereIn('category_id', $categoryId)->whereNotIN('id',$orderProducts)->pluck('id');
            $ratingProducts = Rating::pluck('product_id');

            $mergedProducts = $categoryProducts->merge($ratingProducts);
            $countedProducts = $mergedProducts->countBy()->sortDesc();
            $sortedProducts = collect();
            foreach ($countedProducts as $productId => $count) {
                $sortedProducts->push($productId);
            }
            $topProducts = $sortedProducts->take(20);


            $recommendedProducts = Product::whereIn('id', $topProducts)
                ->where('status', 1)
                ->orderByRaw("FIELD(id, " . implode(',', $topProducts->toArray()) . ") ASC")
                ->get()
                ->toArray();

            //recommended product
        }else{
            $recommendedProducts = [];
        }


        return view('front.index')->with(compact('sliderBanners','fixBanners','newProducts','bestSellers','discounterProducts','isfeatured','recommendedProducts'));
    }
}
