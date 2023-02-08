<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductsController extends Controller
{
    public function listing(){
        $url = Route::getFacadeRoot()->current()->uri();
        $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();

        if($categoryCount >0){
            //Get Category Details
            $categoryDetails = Category::categoryDetails($url);
            $categoryProducts = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);

            //Check for Sort
            if(isset($_GET['sort']) && !empty($_GET['sort'])){
                if($_GET['sort'] == "product_latest"){
                    $categoryProducts->orderby('products.id','Desc');
                }else if($_GET['sort']=="price_lowest"){
                    $categoryProducts->orderby('products.product_price','Asc');
                }else if($_GET['sort']=="price_height"){
                    $categoryProducts->orderby('products.product_price','Desc');
                }else if($_GET['sort']=="name_a_z"){
                    $categoryProducts->orderby('products.product_name','Asc');
                }else if($_GET['sort']=="name_z_a"){
                    $categoryProducts->orderby('products.product_name','Desc');
                }
            }

             $categoryProducts = $categoryProducts->paginate(3);
            // dd($categoryDetails);
            // echo "category existis"; die;
            //Checking for sort

            return view('front.products.listing')->with(compact('categoryDetails','categoryProducts'));

        }else{
            abort(404);
        }
    }
}
