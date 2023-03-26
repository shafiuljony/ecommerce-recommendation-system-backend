<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsAttributes;
use App\Models\ProductsFilter;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Session;
use DB;

class ProductsController extends Controller
{
    public function listing(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $url = $data['url'];
            $_GET['sort'] = $data['sort'];
            $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
    
            if($categoryCount >0){
                //Get Category Details
                $categoryDetails = Category::categoryDetails($url);
                $categoryProducts = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);

                //Checking for Dynamic Filters
                $productFilters = ProductsFilter::productFilters();
                foreach($productFilters as $key => $filter){
                    //If filter is selected
                    if(isset($filter['filter_column']) && isset($data[$filter['filter_column']]) && !empty($filter['filter_column']) && !empty($data[$filter['filter_column']])){
                        $categoryProducts->whereIn($filter['filter_column'],$data[$filter['filter_column']]);
                    }
                }
    
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

                //Checking for size 
                if(isset($data['size']) && !empty($data['size'])){
                    $productIds = ProductsAttributes::select('product_id')->whereIn('size',$data['size'])->pluck('product_id')->toArray();
                    $categoryProducts->whereIn('id',$productIds);
                }
                //Checking for color 
                if(isset($data['color']) && !empty($data['color'])){
                    $productIds = Product::select('id')->whereIn('product_color',$data['color'])->pluck('id')->toArray();
                    $categoryProducts->whereIn('id',$productIds);
                }

                //Checking for Price

                if(isset($data['price']) && !empty($data['price'])){
                    foreach($data['price'] as $key => $price ){
                        $priceArr = explode("-",$price);
                        $productIds[] = Product::select('id')->whereBetween('product_price',[$priceArr[0],$priceArr[1]])->pluck('id')->toArray();
                    }
                    $productIds = call_user_func_array('array_merge',$productIds);
                    // echo "<pre>"; print_r($productIds); die;
                    $categoryProducts->whereIn('products.id',$productIds);
                }
                //Checking for Brand 
                if(isset($data['brand']) && !empty($data['brand'])){
                    $productIds = Product::select('id')->whereIn('brand_id',$data['brand'])->pluck('id')->toArray();
                    $categoryProducts->whereIn('id',$productIds);
                }
    
                 $categoryProducts = $categoryProducts->paginate(30);
                // dd($categoryDetails);
                // echo "category existis"; die;
                //Checking for sort
    
                return view('front.products.ajax_products_listing')->with(compact('categoryDetails','categoryProducts','url'));
    
            }else{
                abort(404);
            }
        }else{
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
    
                 $categoryProducts = $categoryProducts->paginate(30);
                // dd($categoryDetails);
                // echo "category existis"; die;
                //Checking for sort
    
                return view('front.products.listing')->with(compact('categoryDetails','categoryProducts','url'));
    
            }else{
                abort(404);
            }
        }
       
    }
    public function vendorListing($vendorid){
        //Get Vendor Shop Name

       $getVendorShop = Vendor::getVendorShop($vendorid); 

       //Get Vendor Products 
       $vendorProducts = Product::with('brand')->where('vendor_id',$vendorid)->where('status',1);
       $vendorProducts =$vendorProducts->paginate(30);
    //    dd($vendorProducts);
    return view('front.products.vendor_listing')->with(compact('getVendorShop','vendorProducts'));
    }
    public function detail($id){
        $productDetails = Product::with(['section','category','vendor','brand','attributes'=>function($query){$query->where('stock','>',0)->where('status', 1);},'images'])->find($id)->toArray();


        $categoryDetails = Category::categoryDetails($productDetails['category']['url']);

        //Get Similer Products
        $similarProducts = Product::with('brand')->where('category_id',$productDetails['category']['id'])->where('id','!=',$id)->limit(6)->inRandomOrder()->get()->toArray();
        // dd($similarProducts);

        //Set Session For Recently Viewd Products 
        if(empty(Session::get('session_id'))){
            $session_id = md5(uniqid(rand(), true));
        }else{
            $session_id = Session::get('session_id');
        }
        Session::put('session_id',$session_id);
        //Insert Product in Table If not already Exists
        $countRecentlyViewedProducts = DB::table('recently_viewed_products')->where(['product_id'=>$id,'session_id'=>$session_id])->count();
        if($countRecentlyViewedProducts==0){
            DB::table('recently_viewed_products')->insert(['product_id'=>$id,'session_id'=>$session_id]);
        }

        // Get Recently Viewed Products

        $recentProductsIds = DB::table('recently_viewed_products')->select('product_id')->where('product_id','!=',$id)->where('session_id',$session_id)->inRandomOrder()->get()->take(4)->pluck('product_id');
        // dd($recentProductsIds);

        
        $totalStock = ProductsAttributes::where('product_id', $id)->sum('stock'); 
        return view('front.products.detail')->with(compact('productDetails','categoryDetails','totalStock','similarProducts'));
    }
    public function getProductPrice(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $getDiscountAttributePrice = Product::getDiscountAttributePrice($data['product_id'],$data['size']);

            return $getDiscountAttributePrice;
        }
    }
}
