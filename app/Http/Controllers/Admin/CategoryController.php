<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Session;
use Image;

class CategoryController extends Controller
{
    public function categories(){
        Session::put('page','categories');
        $categories = Category::with(['section','parentcategory'])->get()->toArray();
        // dd($categories);
        return view('admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }

    public function addEditCategory(Request $request,$id=null){
        Session::put('page','categories');
        if($id==""){
            //add Category function
            $title = "Add Category";
            $category = new Category;
            $getCategories = array();
            $message = "Category added successfully";
        }else{
            //Edit Category function
            $title = "Edit Category";
            $category = Category::find($id);
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$category['section_id']])->get();
            $message = "Category Updated successfully";


        }

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules =[
                'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'section_id' => 'required',
                'url' => 'required',
            ];

            $customMessages = [
                'category_name.required' => 'Category Name is Required',
                'category_name.regex' => 'Valid Category Name Is Required',
                'section_id.required' => 'Section Is Required',
                'url.required' => 'Category URL Is Required',
            ];

            $this->validate($request,$rules,$customMessages);

            if($data['category_discount']==""){
                $data['category_discount'] =0;
            }

            // Upload Category Image

            if($request->hasFile('category_image')){
                $image_tmp = $request->file('category_image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'front/images/category_images/'.$imageName;
                    //upload the image
                    Image::make($image_tmp)->save($imagePath);
                    $category->category_image = $imageName;
                }
            }else{
                $category->category_image = "";
            }
            $category->section_id = $data['section_id'];
            $category->parent_id = $data['parent_id'];
            $category->category_name = $data['category_name'];
            $category->category_discount = $data['category_discount'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status = 1;
            $category->save();

            return redirect('admin/categories')->with('success_message',$message);
        }

        // Get all the section function
        $getSections = Section::get()->toArray();

        return view('admin.categories.add_edit_category')->with(compact('title','category','getSections','getCategories'));
    }
     public function appendCategoryLevel(Request $request){
        if($request->ajax()){
            $data = $request->all();
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$data['section_id']])->get()->toArray();

            return view('admin.categories.append_categories_level')->with(compact('getCategories'));
        }    
     }
     public function deleteCategory($id){
        //delete category
        Category::where('id',$id)->delete();
        $message = 'Category has been deleted successfully!';
        return redirect()->back()->with('success_message',$message);
     }

     public function deleteCategoryImage($id){
        //Get Category Image
        $categoryImage = Category::select('category_image')->where('id',$id)->first();


        //Get Path of the Category Image
        $category_image_path = "front/images/category_images/";

        //Delete Category Image from the category_image folder if its exists
        if(file_exists($category_image_path.$categoryImage->category_image)){
            unlink($category_image_path.$categoryImage->category_image);
        }

        //Delete Category Image from the categories folder
        Category::where('id',$id)->update(['category_image'=>""]);

        $message = "Category Image has been deleted succssfully!";

        return redirect()->back()->with('success_message',$message);

     }
}
