<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Image;

use function PHPUnit\Framework\fileExists;

class ProductsController extends Controller
{
    public function products(){
        Session::put('page','products');
        $products = Product::with(['section'=>function($query){
            //subquery
            $query->select('id','name');
        },'category'=>function($query){
            $query->select('id','category_name');
        }])->get()->toArray();
        // dd($products);
        return view('admin.products.products')->with(compact('products'));
    }
    public function updateProductStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Product::where('id',$data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }
    }
    public function deleteProduct($id){
        //delete Product
        Product::where('id',$id)->delete();
        $message = 'Product has been deleted successfully!';
        return redirect()->back()->with('success_message',$message);
    }
    public function addEditProduct(Request $request,$id=null){
        if($id==""){
            $title= "Add Product";
            $product = new Product;
            $message ="Product Added Successfully!";
        }else{
            $title = "Edit Product";
            $product = Product::find($id);
            $message = "Product Updated Successfully!";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;   
            
            $rules =[
                'category_id' => 'required',
                'product_name' => 'required',
                'product_code' => 'required',
                'product_color' => 'required|regex:/^\w+$/',
                'product_price' => 'required',
            ];

            $customMessages = [
                'category_id.required' => 'Category is required',
                'product_name.required' => 'Product name is required',
                // 'product_name.regex' => 'Valid Product name is required',
                //'product_code.required' => 'Product Code is required',
                'product_code.regex' => 'Valid Product Code is required',
                'product_price.required' => 'Product Price is required',
                'product_price.numeric' => 'Valid Product Price is required',
                'product_color.required' => 'Product Color is required',
                'product_color.regex' => 'Valid Product Color is required',
            ];

            $this->validate($request,$rules,$customMessages);

            //upload image after resize Small: 250x250 Medium: 500x500 Large: 1000x1000

            if($request->hasFile('product_image')){
                $image_tmp = $request->file('product_image');
                if($image_tmp->isValid()){
                    
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    
                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $largeImagePath = 'front/images/product_images/large/'.$imageName;
                    $mediumImagePath = 'front/images/product_images/medium/'.$imageName;
                    $smallImagePath = 'front/images/product_images/small/'.$imageName;
                    
                    //Upload Large, Medium & small images after resize
                    Image::make($image_tmp)->resize(1000,1000)->save($largeImagePath);
                    Image::make($image_tmp)->resize(500,500)->save($mediumImagePath);
                    Image::make($image_tmp)->resize(250,250)->save($smallImagePath);
                    
                    //Insert image name in products table
                    $product->product_image = $imageName;
                }

                
            }

            //Upload Product Video

            if($request->hasFile('product_video')){
                $video_tmp = $request->file('product_video');

                if($video_tmp->isValid()){

                    //Upload Video in videos folder
                    $extension = $video_tmp->getClientOriginalExtension();
                    $videoName = rand(111,99999).'.'.$extension;
                    $videoPath = 'front/videos/product_videos/';
                    $video_tmp->move($videoPath,$videoName);

                    //Insert video name in product table
                    $product->product_video = $videoName;
                }
            }

             //Save Product details in products table
            $categoryDetails = Category::find($data['category_id']);
            $product->section_id = $categoryDetails['section_id'];
            $product->category_id = $data['category_id'];
            $product->brand_id = $data['brand_id'];

            $adminType = Auth::guard('admin')->user()->type;
            $vendor_id = Auth::guard('admin')->user()->vendor_id;
            $admin_id = Auth::guard('admin')->user()->id;

            $product->admin_type = $adminType;
            $product->admin_id = $admin_id;

            if($adminType=="vendor"){
                $product->vendor_id = $vendor_id;
            }else{
                $product->vendor_id = 0;
            }

            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->product_price = $data['product_price'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->description = $data['description'];
            $product->meta_title = $data['meta_title'];
            $product->meta_keywords = $data['meta_keywords'];
            $product->meta_description = $data['meta_description'];
            if(!empty($data['is_featured'])){
                $product->is_featured = $data['is_featured'];
            }else{
                $product->is_featured = "No";
            }
            
            $product->status = 1;
            $product->save();
            return redirect('admin/products')->with('success_message',$message);

        }

       
        //Get sections with categories and subcategories
        $categories = Section::with('categories')->get()->toArray();

        //Get All the brand
        $brands = Brand::where('status',1)->get()->toArray();
        // dd($categories);

        return view('admin.products.add_edit_product')->with(compact('title','categories','brands','product'));
    }
    public function deleteProductImage($id)
    {
        //Get the Product Image
        $productImage = Product::select('product_image')->where('id',$id)->first();
        
        //Get Product Image Paths
        $small_image_path = 'front/images/product_images/small/';
        $medium_image_path = 'front/images/product_images/medium/';
        $large_image_path = 'front/images/product_images/large/';

        //Delete Small Product Image If Image exist in the folder

        if(file_Exists($small_image_path.$productImage->product_image)){
            unlink($small_image_path.$productImage->product_image);
        }

        //Delete Medium Product Image If Image exist in the folder
        if(file_Exists($medium_image_path.$productImage->product_image)){
            unlink($medium_image_path.$productImage->product_image);
        }

        //Delete Large Product Image If Image exist in the folder
        if(file_Exists($large_image_path.$productImage->product_image)){
            unlink($large_image_path.$productImage->product_image);
        }

        //Detete Product From Product Table
        Product::where('id',$id)->update(['product_image'=>'']);
        $message = 'Product Images has been deleted successfully!';
        return redirect()->back()->with('success_message',$message);
    }
    public function deleteProductVideo($id)
    {
        //Get the Product  Video
        $productVideo = Product::select('product_video')->where('id',$id)->first();
        
        //Get Product Video Paths
        $product_video_path = 'front/videos/product_videos/';

        //Delete Product Video If Video exist in the folder

        if(file_Exists($product_video_path.$productVideo->product_video)){
            unlink($product_video_path.$productVideo->product_video);
        }

        //Detete Product Video From Product Table
        Product::where('id',$id)->update(['product_video'=>'']);
        $message = 'Product Video has been deleted successfully!';
        return redirect()->back()->with('success_message',$message);
    }

    public function addAttributes(Request $request,$id)
    {
        $product = Product::find($id);

        if($request->isMethod('post')){
            $data = $request->all();
            echo "<pre>"; print_r($data); die;
        }
        return view('admin.attributes.add_edit_attributes')->with(compact('product'));


    }
}
