<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Session;

class BannersController extends Controller
{
    public function banners(){
        Session::put('page','banners');
        $banners = Banner::get()->toArray();
        // dd($banners); die;
        return view('admin.banners.banners')->with(compact('banners'));
    }
    public function updateBannerStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Banner::where('id',$data['banner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'banner_id'=>$data['banner_id']]);
        }
    }
    public function deleteBanner($id){
        //Get Banner Image
        $bannerImage = Banner::where('id',$id)->first();
        
        // Get Banner Image Path 
        $banner_iamge_path = 'front/images/banner_images/';
        
        //Delete Banner Images if not exists in folder 
        if(file_exists($banner_iamge_path.$bannerImage->imagr)){
            unlink($banner_iamge_path.$bannerImage->image);
        }

        //Delete Banner Image from banner table
        Banner::where('id',$id)->delete();

        $message ="Banner Deleted Succefully";
        return redirect('admin/banners')->with('success_message',$message);
     }
     public function addEditBanner(Request $request,$id=null){
        Session::put('page','banners');
        if($id==''){
            //Add Banner
            $banner = new Banner;
            $title = "Add Banner Image";
            $message = "Banner Created Successfully!";
        }else{
            //Update Banner
            $banner = Banner::find($id);
            $title = "Edit Banner";
            $message = "Banner Updated Successfully";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            echo "<pre>"; print_r($data); die;
        }
        return view('admin.banners.add_edit_banner')->with(compact('title','banner'));
     }
}
