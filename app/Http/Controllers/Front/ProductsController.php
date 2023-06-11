<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsFilter;
use App\Models\ProductsAttributes;
use App\Models\Vendor;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\User;
use App\Models\DeliveryAddress;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrdersProduct;
use App\Models\ShippingCharge;
use Session;
use DB;
use Auth;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\VarDumper\Caster\RedisCaster;

use function Ramsey\Uuid\v1;

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

                // if(isset($data['price']) && !empty($data['price'])){
                //     foreach($data['price'] as $key => $price ){
                //         $priceArr = explode("-",$price);
                //         $productIds[] = Product::select('id')->whereBetween('product_price',[$priceArr[0],$priceArr[1]])->pluck('id')->toArray();
                //     }
                //     $productIds = call_user_func_array('array_merge',$productIds);
                //     // echo "<pre>"; print_r($productIds); die;
                //     $categoryProducts->whereIn('products.id',$productIds);
                // }

                    //Checking for Price
                $productIds = array();
                if(isset($data['price']) && !empty($data['price'])){
                    foreach($data['price'] as $key => $price) {
                        $priceArr = explode("-",$price);
                        if(isset($priceArr[0]) && isset($priceArr[1])){
                            $productIds[] = Product::select('id')->whereBetween('product_price',[$priceArr[0],$priceArr[1]])->pluck('id')->toArray();
                        }   
                    }
                    $productIds = call_user_func_array('array_merge',$productIds);
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
            if(isset($_REQUEST['search']) && !empty($_REQUEST['search'])){
                $search_product = $_REQUEST['search'];
                $categoryDetails['breadcrumbs'] = $search_product;
                $categoryDetails['categoryDetails']['category_name'] = $search_product;

                $categoryDetails['categoryDetails']['description'] = "Search Product for".$search_product;
                $categoryProducts = Product::with('brand')->join('categories','categories.id','=','products.category_id')->where(function($query)use($search_product){
                    $query->where('products.product_name','like','%'.$search_product.'%')
                    ->orWhere('products.product_code','like','%'.$search_product.'%')
                    ->orWhere('products.product_color','like','%'.$search_product.'%')
                    ->orWhere('products.description','like','%'.$search_product.'%')
                    ->orWhere('categories.category_name','like','%'.$search_product.'%');
                })->where('products.status',1);
                $categoryProducts = $categoryProducts->get();
                return view('front.products.listing')->with(compact('categoryDetails','categoryProducts'));
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

        // Get Recently Viewed Products ids

        $recentProductsIds = DB::table('recently_viewed_products')->select('product_id')->where('product_id','!=',$id)->where('session_id',$session_id)->inRandomOrder()->get()->take(4)->pluck('product_id');
        // dd($recentProductsIds);

        //Get Recently Viewed Products
        $recentlyViewedProducts = Product::with('brand')->whereIn('id',$recentProductsIds)->get()->toArray();
        // dd($recentlyViewedProducts);

        //Get Group Products (Products Colors)
        $groupProducts = array();
        if(!empty($productDetails['group_code'])){
            $groupProducts = Product::select('id','product_image')->where('id','!=',$id)->where(['group_code'=>$productDetails['group_code'],'status'=>1])->get()->toArray();
            // dd($groupProducts);
        }

        $totalStock = ProductsAttributes::where('product_id', $id)->sum('stock'); 
        return view('front.products.detail')->with(compact('productDetails','categoryDetails','totalStock','similarProducts','recentlyViewedProducts','groupProducts'));
    }
    public function getProductPrice(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $getDiscountAttributePrice = Product::getDiscountAttributePrice($data['product_id'],$data['size']);

            return $getDiscountAttributePrice;
        }
    }

    public function cartAdd(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // Forget the coupon session
            Session::forget('couponAmount');
            Session::forget('couponCode');

            if($data['quantity']<=0){
                $data['quantity']=1;
            }

            //Check Product Stock is available or not
            $getProductStock = ProductsAttributes::getProductStock($data['product_id'],$data['size']);
            if($getProductStock<$data['quantity']){
                return redirect()->back()->with('error_message','Required Quantity is not available');

            }

            //Genarate Session Id if it dose not exists
            $session_id = Session::get('session_id');
            if(empty($session_id)){
                $session_id = Session::getId();
                Session::put('session_id',$session_id);
            }

            //Check Product if already exists in the user cart 
            if(Auth::check()){
                //User is Logged In 
                $user_id = Auth::user()->id;
                $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'user_id'=>$user_id])->count();
            }else{
                //User is not Logged In
                $user_id = 0;
                $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'session_id'=>$session_id])->count();
            }

            if($countProducts>0){
                return redirect()->back()->with('error_message','Product already exists in Cart!');
            }

            //Save Product Cart table
            $item = new Cart;
            $item->session_id = $session_id;
            $item->user_id = $user_id;
            $item->product_id = $data['product_id'];
            $item->size = $data['size'];
            $item->quantity = $data['quantity'];
            $item->save();
            return redirect()->back()->with('success_message','Product has been Added in cart');
        }
    }

    public function cart(){
        $getCartItems = Cart::getCartItems();
        // dd($getCartItems);

        return view('front.products.cart')->with(compact('getCartItems'));
    }

    public function cartUpdate(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // Forget the coupon session
            Session::forget('couponAmount');
            Session::forget('couponCode');

            // Get Cart Details 
            $cartDetails = Cart::find($data['cartid']);

            //Get Available Product Stock
            $availableStock = ProductsAttributes::select('stock')->where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size']])->first()->toArray();
            // echo "<pre>"; print_r($availableStock); die;

            // Caheck the product stock available or not
            if($data['qty']>$availableStock['stock']){
                $getCartItems = Cart::getCartItems();
                return response()->json(['status'=>false,'message'=>'Product Stock is not Available','view'=>(string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerview'=>(string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
            ]);
            }

            //Check if size available or not
            $availableSize = ProductsAttributes::where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size'],'status'=>1])->count();
            if($availableSize==0){
                $getCartItems = Cart::getCartItems();
                return response()->json(['status'=>false,'message'=>'Product Size is not Available. Please remove this Product and Choose another one!','view'=>(string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerview'=>(string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
            ]);
            }

            //Update the qty
            Cart::where('id',$data['cartid'])->update(['quantity'=>$data['qty']]);
            $getCartItems = Cart::getCartItems();
            $totalCartItems = totalCartItems();
            Session::forget('couponAmount');
            Session::forget('couponCode');
            return response()->json([
                'status'=>true,
                'totalCartItems'=>$totalCartItems,
                'view'=>(string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerview'=>(string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))]);
        }
    }

    public function cartDelete(Request $request){
        if($request->ajax()){
            $data = $request->all();
            Session::forget('couponAmount');
            Session::forget('couponCode');
            // echo "<pre>"; print_r($data); die;

            // Forget the coupon session
            Session::forget('couponAmount');
            Session::forget('couponCode');

            Cart::where('id',$data['cartid'])->delete();
            $totalCartItems = totalCartItems();
            $getCartItems = Cart::getCartItems();
            return response()->json([
                'totalCartItems'=>$totalCartItems,
                'view'=>(string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerview'=>(string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
            ]);

        }

    }

    public function applyCoupon(Request $request){
        if($request->ajax()){
            $data = $request->all();
            Session::forget('couponAmount');
            Session::forget('couponCode');
            $getCartItems = Cart::getCartItems();
            // echo "<pre>"; print_r($getCartItems); die;
            $totalCartItems = totalCartItems();
            $couponCount = Coupon::where('coupon_code',$data['code'])->count();
            if($couponCount==0){
                return response()->json([
                    'status'=>'false',
                    'message'=>'The Coupon is not valid!',
                    'totalCartItems'=>$totalCartItems,
                    'view'=>(string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                    'headerview'=>(string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                ]);
            }else{
                // Check for other coupon conditions

                //Get COupon Details
                $couponDetails = Coupon::where('coupon_code',$data['code'])->first();

                
                //if Coupon is active
                if($couponDetails->status==0){
                    $message = "The Coupon is not active";
                }
                //Check coupon date expriy date
                $expiry_date = $couponDetails->expiry_date;
                $current_date = date('Y-m-d');
                if($expiry_date < $current_date){
                    $message = "The Coupon is Expired!";
                }

                // Check if coupon is single time
                if($couponDetails->coupon_type == "Single Time"){
                    // Check in orders table if coupon already availed by the user
                    $couponCount = Order::where(['coupon_code'=>$data['code'],'user_id'=>Auth::user()->id])->count();
                    if($couponCount>=1){
                        $message = "This coupon code is already availed by you!";
                    }
                }


                //Check if coupon is from seleted categories
                //Get All selected Category from coupon and convert to array
                $catArr = explode(",",$couponDetails->categories);
                $total_amount = 0;
                foreach ($getCartItems as $key => $item) {
                    if(!in_array($item['product']['category_id'],$catArr)){
                        $message = "This Coupon is not for one of the selected Products.";
                    }
                    $attrPrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                    $total_amount = $total_amount + ($attrPrice['final_price'] * $item['quantity']);
                    // echo "<pre>"; print_r($total_amount); die;
                }

                //Check if coupon is from seleted users
                // Get Selected Users and convert to array
                // if(isset($couponDetails->users)&&!empty($couponDetails->users)){
                //     $usersArr = explode(",",$couponDetails->users);
                //     if(count($usersArr)){
                //         // Get user id of all selected users
                //         foreach ($usersArr as $key => $user) {
                //             echo "<pre>"; print_r($user); die;
                //             $getUserId = User::select('id')->where('email',$user)->first()->toArray();
                //             $usersId[] = $getUserId['id'];
                //         }
                //         // Check if any cart item not belong to coupon user
                //         foreach ($getCartItems as $key => $item) {
                //             if(!in_array($item['user_id'],$usersId)){
                //                 $message = " Sorry! This Coupon is not for You Try Again!";
                //             }
                //         }
                //     }
                // }
                
                if($couponDetails->vendor_id>0){
                    echo $couponDetails->vendor_id; die;
                    $productIds = Product::select('id')->where('vendor_id',$couponDetails->vendor_id)->plunk('id')->toArray();
                    // echo "<pre>"; print_r($productIds); die;
                    // Check if Coupon belong to Vendor Products
                    foreach ($getCartItems as $key => $item) {
                        if(!in_array($item['product']['id'],$productIds)){
                            $message = "This Coupon is not for You Try Again!";
                        }
                    }

                }

                //If error message is_there
                if(isset($message)){
                    return response()->json([
                        'status'=>false,
                        'message'=>$message,
                        'totalCartItems'=>$totalCartItems,
                        'view'=>(string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                        'headerview'=>(string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                    ]);
                }else{
                    //Coupon Code is correct

                    //check if ammount type is fixed or percentage
                    if($couponDetails->amount_type=="Fixed"){
                        $couponAmount = $couponDetails->amount;
                    }else{
                        $couponAmount = $total_amount * ($couponDetails->amount/100);
                    }
                    // dd($couponDetails->amount_type,$total_amount);

                    $grand_total = $total_amount - $couponAmount;

                    //Add Coupon Code & amount in session Variable
                    Session::put('couponAmount',$couponAmount);
                    Session::put('couponCode',$data['code']);

                    $message = "Coupon Code Successfully Applied. You are  availing discount!";
                    return response()->json([
                        'status'=>true,
                        'message'=>$message,
                        'totalCartItems'=>$totalCartItems,
                        'couponAmount'=>$couponAmount,
                        'grand_total'=>$grand_total,
                        'view'=>(string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                        'headerview'=>(string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                    ]);
                }

                
            }
        }
    }

    public function checkout(Request $request){

        $countries = Country::where('status',1)->get()->toArray();
        $getCartItems = Cart::getCartItems();
        // dd($getCartItems);

        if(count($getCartItems)==0){
            $message = "Shopping Cart is empty! Please add products to checkout";
            return redirect('cart')->with('error_message',$message);
        }

        $total_price = 0;
        $total_weight = 0;
        foreach($getCartItems as $item){
            // echo "<pre>"; print_r($item); die;
            $attrPrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
            $total_price = $total_price + ($attrPrice['final_price']+$item['quantity']);
            $product_weight = $item['product']['product_weight'];
            $total_weight = $total_weight+$product_weight;
        }

        $deliveryAddresses = DeliveryAddress::DeliveryAddresses();
        foreach($deliveryAddresses as $key => $value){
            $shippingCharges = ShippingCharge::getShippingCharges($total_weight,$value['country']);
            $deliveryAddresses[$key]['shipping_charges'] = $shippingCharges;

            // COD pincode is available or not
            $deliveryAddresses[$key]['codpincodeCount'] = DB::table('cod_pincodes')->where('pincode',$value['pincode'])->count();
        }
        //dd($deliveryAddresses);

    
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            /// Website Seciruty
            foreach($getCartItems as $item){
                // Prevent Disabled Products to Order
                $product_status = Product::getProductStatus($item['product_id']);
                if($product_status==0){
                    $message = $item['product']['product_name']." with ".$item['size']." Size in not available. Please remove from cart and choose some other product.";
                    return redirect('/cart')->with('error_message',$message);
                }

                // Prevent Sold out product to order
                $getProductStock = ProductsAttributes::getProductStock($item['product_id'],$item['size']);
                if($getProductStock==0){
                    $message = $item['product']['product_name']." with ".$item['size']." Size in not available. Please remove from cart and choose some other product.";
                    return redirect('/cart')->with('error_message',$message);
                }

                // Prevent disable attribute to order
                $getAttributeStatus = ProductsAttributes::getAttributeStatus($item['product_id'],$item['size']);
                if($getAttributeStatus==0){
                    $message = $item['product']['product_name']." with ".$item['size']." Size in not available. Please remove from cart and choose some other product.";
                    return redirect('/cart')->with('error_message',$message);
                }

                // Prevent Disabled Category Products to Order
                $getCategoryStatus = Category::getCategoryStatus($item['product']['category_id']);
                if($getCategoryStatus==0){
                    //Product::deleteCartProduct($item['product_id']);
                    //$message = "One of the product is disabled! Please try again.";
                    $message = $item['product']['product_name']." with ".$item['size']." Size in not available. Please remove from cart and choose some other product.";
                    return redirect('/cart')->with('error_message',$message);
                }
            }


            // Delivery Address Validation
            if(empty($data['address_id'])){
                $message = "Please select Delivery Address!";
                return redirect()->back()->with('error_message',$message);
            }

            //Payment Method Validation
            if(empty($data['payment_gateway'])){
                $message = "Please select Payment Method!";
                return redirect()->back()->with('error_message',$message);
            }
            //T&C Validation
            if(empty($data['accept'])){
                $message = "Please agree to T&C!";
                return redirect()->back()->with('error_message',$message);
            }

            // echo "<pre>"; print_r($data); die;

            // Get Delivery Address from address_id
            $deliveryAddress = DeliveryAddress::where('id',$data['address_id'])->first()->toArray();
            // dd($deliveryAddress);

            // Set Payment Method as COD if COD is selected from user otherwise set prepaid
            if($data['payment_gateway']=="COD"){
                $payment_method = "COD";
                $order_status = "New";
            }else{
                $payment_method = "Prepaid";
                $order_status = "Pending";
            }

            DB::beginTransaction();

            // Calculate order total price
            $total_price = 0;
            foreach ($getCartItems as $item) {
                $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                $total_price = $total_price + ($getDiscountAttributePrice['final_price'] + $item['quantity']);
            }

            // Calculate Shipping Charges
            $shipping_charges = 0;

            // Get shipping charges
            $shipping_charges = ShippingCharge::getShippingCharges($total_weight,$deliveryAddress['country']);

            // Calculate Grand Total
            $grand_total = $total_price + $shipping_charges - Session::get('couponAmount');

            // Insert Grand Total in Session Variable
            Session::put('grand_total',$grand_total);
            
            //Insert Order Details
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->name = $deliveryAddress['name'];
            $order->address = $deliveryAddress['address'];
            $order->city = $deliveryAddress['city'];
            $order->state = $deliveryAddress['state'];
            $order->country = $deliveryAddress['country'];
            $order->pincode = $deliveryAddress['pincode'];
            $order->mobile = $deliveryAddress['mobile'];
            $order->email = Auth::user()->email;
            $order->shipping_charges = $shipping_charges;
            $order->coupon_code = Session::get('couponCode');
            $order->coupon_amount = Session::get('couponAmount');
            $order->order_status = $order_status;
            $order->payment_method = $payment_method;
            $order->payment_gateway = $data['payment_gateway'];
            $order->grand_total = $grand_total;
            $order->save();
            $order_id = DB::getPdo()->lastInsertId();

            foreach ($getCartItems as $item) {
                $getCartItems = new OrdersProduct();
                $getCartItems->order_id = $order_id;
                $getCartItems->user_id = Auth::user()->id;
                $getProductDetails = Product::select('product_code','product_name','product_color','admin_id','vendor_id')->where('id',$item['product_id'])->first()->toArray();
                // dd($getProductDetails);

                $getCartItems->admin_id = $getProductDetails['admin_id'];
                $getCartItems->vendor_id = $getProductDetails['vendor_id'];
                $getCartItems->product_id = $item['product_id'];
                $getCartItems->product_code = $getProductDetails['product_code'];
                $getCartItems->product_name = $getProductDetails['product_name'];
                $getCartItems->product_color = $getProductDetails['product_color'];
                $getCartItems->product_size = $item['size'];
                $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                $getCartItems->product_price = $getDiscountAttributePrice['final_price'];
                $getCartItems->product_qty = $item['quantity'];
                $getCartItems->save();

                // Reduce Stock Script Starts
                $getProductStock = ProductsAttributes::getProductStock($item['product_id'],$item['size']);
                $newStock = $getProductStock - $item['quantity'];
                ProductsAttributes::where(['product_id'=>$item['product_id'],'size'=>$item['size']])->update(['stock'=>$newStock]);
                // Reduce Stock Script ends
            }

            // Insert Order ID in Session variable
            Session::put('order_id',$order_id);

            DB::commit();

            $orderDetails = Order::with('orders_products')->where('id',$order_id)->first()->toArray();

            if($data['payment_gateway']=="COD"){
                // Send Order Email
                $email = Auth::user()->email;
                $messageData = [
                    'email' => $email,
                    'name' => Auth::user()->name,
                    'order_id' => $order_id,
                    'orderDetails' => $orderDetails
                ];
                Mail::Send('emails.order',$messageData,function($message)use($email){
                    $message->to($email)->subject('Order Placed - Anon.com');
                });
            }if($data['payment_gateway']=="Paypal"){
                // Paypal - Redirectuser to Paypal pageafter saving order
                return redirect('/paypal');
            }else{
                echo "Other Prepaid payment methods coming soon.";
            }

            return redirect('thanks');
        }

        return view('front.products.checkout')->with(compact('deliveryAddresses','countries','getCartItems','total_price'));
    }

    public function thanks(){
        if(Session::has('order_id')){
            // Empty the Cart
            Cart::where('user_id',Auth::user()->id)->delete();
            return view('front.products.thanks');
        }else{
            return redirect('cart');
        }
        
    }
}
