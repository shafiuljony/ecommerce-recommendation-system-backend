<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     public function section()
     {
        return $this->belongsTo('App\Models\Section','section_id');
     }
     public function category()
     {
        return $this->belongsTo('App\Models\Category','category_id');
     }
     public function brand(){
      return $this->belongsTo('App\Models\Brand','brand_id');
     }
     public function attributes(){
         return $this->hasMany('App\Models\ProductsAttributes');
     }

     public function images(){
      return $this->hasMany('App\Models\ProductsImage');
     }

     public function vendor(){
      return $this->belongsTo('App\Models\Vendor', 'vendor_id')->with('vendorbusinessdetails');
     }

     public static function discountPrice($product_id) {
    $proDetails = Product::select('product_price', 'product_discount', 'category_id')->where('id', $product_id)->first();

    if (!$proDetails) {
        // Product doesn't exist, you can choose either of the following options:
        // Return an error message, throw an exception, or handle it as needed.
        // For example:
        return "Product not found";
    }

    $proDetails = $proDetails->toArray();

    $catDetails = null;
    
    if ($proDetails['category_id']) {
        $catDetails = Category::select('category_discount')->where('id', $proDetails['category_id'])->first();
    }

    if ($catDetails) {
        $catDetails = $catDetails->toArray();
    } else {
        $catDetails = ['category_discount' => 0];
    }

    if ($proDetails['product_discount'] > 0) {
        $discounted_price = $proDetails['product_price'] - ($proDetails['product_price'] * $proDetails['product_discount'] / 100);
    } else if ($catDetails['category_discount'] > 0) {
        $discounted_price = $proDetails['product_price'] - ($proDetails['product_price'] * $catDetails['category_discount'] / 100);
    } else {
        $discounted_price = $proDetails['product_price'];
    }
    
    return $discounted_price;
}


public static function getDiscountAttributePrice($product_id, $size) {
    $proAttrPrice = ProductsAttributes::where(['product_id' => $product_id, 'size' => $size])->first();

    if (!$proAttrPrice) {
        // Handle the case where the product attribute doesn't exist
        return ['product_price' => 0, 'final_price' => 0, 'discount' => 0];
    }

    $proAttrPrice = $proAttrPrice->toArray();

    $proDetails = Product::select('product_discount', 'category_id')->where('id', $product_id)->first();

    if (!$proDetails) {
        // Handle the case where the product doesn't exist
        return ['product_price' => 0, 'final_price' => 0, 'discount' => 0];
    }

    $proDetails = $proDetails->toArray();

    $catDetails = Category::select('category_discount')->where('id', $proDetails['category_id'])->first();

    if ($catDetails) {
        $catDetails = $catDetails->toArray();
    } else {
        $catDetails = ['category_discount' => 0];
    }

    $final_price = $proAttrPrice['price'];
    $discount = 0;

    if ($proDetails['product_discount'] > 0) {
        $final_price = $proAttrPrice['price'] - ($proAttrPrice['price'] * $proDetails['product_discount'] / 100);
        $discount = $proAttrPrice['price'] - $final_price;
    } else if ($catDetails['category_discount'] > 0) {
        $final_price = $proAttrPrice['price'] - ($proAttrPrice['price'] * $catDetails['category_discount'] / 100);
        $discount = $proAttrPrice['price'] - $final_price;
    }

    return [
        'product_price' => $proAttrPrice['price'],
        'final_price' => $final_price,
        'discount' => $discount
    ];
}


     public static function isProductNew($product_id){
         //Get Last 3 Product Added by the Admin/vendor
         $productIds = Product::select('id')->where('status',1)->orderby('id','Desc')->limit(5)->pluck('id');
         $productIds = json_decode(json_encode($productIds),true);
         // dd($productIds);
         if(in_array($product_id,$productIds)){
            $isProductNew = "Yes";
         }else{
            $isProductNew = "No";
         }
         return $isProductNew;
     }

   //   public static function getProductImage($product_id){
   //    $getProductImage = Product::select('product_image')->where('id',$product_id)->first()->toArray();
   //    return $getProductImage['product_image'];
   //   }

   public static function getProductImage($product_id) {
      $product = Product::select('product_image')->where('id', $product_id)->first();
      if ($product) {
          $getProductImage = $product->toArray();
          return $getProductImage['product_image'];
      } else {
          // Handle case when product is not found, e.g. return a default image or show an error message
          return null; // or throw an exception, or return a default image path, etc.
      }
  }

  public static function getProductStatus($product_id){
      $getProductStatus = Product::select('status')->where('id',$product_id)->first();
      return $getProductStatus->status;
  }

  public static function deleteCartProduct($product_id){
   Cart::where('product_id',$product_id)->delete();
  }


}
