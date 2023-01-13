<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function updateAdminPassword(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            //check if current password entered by admin is correct
            if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
                //check if new password is matching with confirm password
                if($data['confirm_password'] == $data['new_password']){
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=> bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message', 'Password has been updated successfully!');
                }else{
                    return redirect()->back()->with('error_message', 'New Password  does not matching with confirm password');
                }
            }else{
                return redirect()->back()->with('error_message', 'Your current Password is incorrect');
            }
        }

        // echo "<pre>"; print_r(Auth::guard('admin')->user()); die;
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }
    public function checkAdminPassword(Request $request){
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;

        if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        };
    }
    public function updateAdminDetails(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules =[
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric',
            ];

            $customMessages = [
                'admin_name.required' => 'Name is required',
                'admin_name.regex' => 'Valid Name Is required',
                'admin_mobile.numeric' => 'Valid number Is required',
            ];

            $this->validate($request,$rules,$customMessages);

            // Upload Admin Photo

            if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'admin/images/photos/'.$imageName;
                    //upload the image
                    Image::make($image_tmp)->save($imagePath);
                }
            }elseif(!empty($data['current_admin_image'])){
                $imageName = $data['current_admin_image'];
            }else{
                $imageName ="";
            }
            //update Admin details

            Admin::where('id', Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'], 'mobile'=>$data['admin_mobile'], 'image'=>$imageName]);

            return redirect()->back()->with('success_message', 'Admin details updated');
        }
        return view('admin.settings.update_admin_details');
    }
    public function updateVendorDetails($slug){
        if($slug=="personal"){
            return view('admin.settings.update_vendor_details')->with(compact('slug'));
        }elseif($slug=="business"){
            return view('admin.settings.update_vendor_details')->with(compact('slug'));
        }elseif($slug=="bank"){
            return view('admin.settings.update_vendor_details')->with(compact('slug'));
        }
    }
    public function login(Request  $request){
        // echo $password = Hash::make('12345678'); die;

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // $validated = $request->validate([

            //     // larabel error message
            //     'email' => 'required|email|max:255', 
            //     'password' => 'required',
            // ]);
    
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];
    
            $customMessages =[
                // adding custom message 
                'email.required' => 'Email is Address required!',
                'email.email' => 'Valid Email is Address required',
                'password.required' => 'Password is required',
            ];
    
            $this->validate($request,$rules,$customMessages);


            // auth guard attempt 

            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password'],'status'=> 1])){
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error_message', 'Invalid Email or Password');
            }
        }
        return view('admin.login');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/logout');
    }
}
