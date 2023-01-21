<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBankDetails;
use App\Models\VendorsBusinessDetails;
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
    public function updateVendorDetails($slug, Request $request){
        if($slug=="personal"){
            if($request->isMethod('post')){
                $data = $request->all();

                // echo "<pre>"; print_r($data); die;

                $rules =[
                    'shop_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_mobile' => 'required|numeric',
                ];
    
                $customMessages = [
                    'shop_name.required' => 'Name is required',
                    'shop_name.regex' => 'Valid Name Is required',
                    'shop_mobile.numeric' => 'Valid number Is required',
                ];
    
                $this->validate($request,$rules,$customMessages);
    
                // Upload Admin Photo
    
                if($request->hasFile('vendor_image')){
                    $image_tmp = $request->file('vendor_image');
                    if($image_tmp->isValid()){
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName = rand(111,99999).'.'.$extension;
                        $imagePath = 'admin/images/photos/'.$imageName;
                        //upload the image
                        Image::make($image_tmp)->save($imagePath);
                    }
                }elseif(!empty($data['current_vendor_image'])){
                    $imageName = $data['current_vendor_image'];
                }else{
                    $imageName ="";
                }
                //update in Admin table
    
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name'=>$data['vendor_name'], 'mobile'=>$data['vendor_mobile'], 'image'=>$imageName]);

                //update in vendor table

                Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->update(['name'=>$data['vendor_name'],'address'=>$data['vendor_address'],'city'=>$data['vendor_city'],'state'=>$data['vendor_state'],'country'=>$data['vendor_country'],'pincode'=>$data['vendor_pincode'],'mobile'=>$data['vendor_mobile']]);
    
                return redirect()->back()->with('success_message', 'Vendor details updated successfully');
            }
            $vendorDetails = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
               
        }elseif($slug=="business"){
            //business

            if($request->isMethod('post')){
                $data = $request->all();

                // echo "<pre>"; print_r($data); die;

                $rules =[
                    'shop_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_mobile' => 'required|numeric',
                    'address_proof' => 'required'
                ];
    
                $customMessages = [
                    'shop_name.required' => 'Name is required',
                    'shop_name.regex' => 'Valid Name Is required',
                    'shop_city.required' => 'Valid number Is required',
                    'shop_mobile.required' => 'Valid number Is required',
                    'shop_mobile.numeric' => 'Vali Address Proof Image Is required',
                ];
    
                $this->validate($request,$rules,$customMessages);
    
                // Upload Admin Photo
    
                if($request->hasFile('address_proof_image')){
                    $image_tmp = $request->file('address_proof_image');
                    if($image_tmp->isValid()){
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName = rand(111,99999).'.'.$extension;
                        $imagePath = 'admin/images/proofs/'.$imageName;
                        //upload the image
                        Image::make($image_tmp)->save($imagePath);
                    }
                }elseif(!empty($data['current_address_proof'])){
                    $imageName = $data['current_address_proof'];
                }else{
                    $imageName ="";
                }
                

                //update in vendors business details table

                VendorsBusinessDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update(['shop_name'=>$data['shop_name'],'shop_address'=>$data['shop_address'],'shop_city'=>$data['shop_city'],'shop_state'=>$data['shop_state'],'shop_country'=>$data['shop_country'],'shop_pincode'=>$data['shop_pincode'],'shop_mobile'=>$data['shop_mobile'],
                'shop_website'=>$data['shop_website'],
                'address_proof'=>$data['address_proof'],
                'address_proof_image'=>$imageName,
                'business_license_number'=>$data['business_license_number'],
                'gst_number'=>$data['gst_number'],
                'pan_number'=>$data['pan_number']]);
    
                return redirect()->back()->with('success_message', 'Vendor details updated successfully');
            }

            $vendorDetails = VendorsBusinessDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }elseif($slug=="bank"){
            //bank

            if($request->isMethod('post')){
                $data = $request->all();

                // echo "<pre>"; print_r($data); die;

                $rules =[
                    'account_holder_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'bank_name' => 'required',
                    'account_number' => 'required|numeric',
                    'bank_ifsc_code' => 'required'
                ];
    
                $customMessages = [
                    'account_holder_name.required' => 'Account Holder Name Is required',
                    'account_holder_name.regex' => 'Valid Account Holder Name Is required',
                    'bank_name.required' => 'Bank Name Is required',
                    'account_number.numeric' => 'Valid Account number Is required',
                    'bank_ifsc_code.require' => 'Bank Ifsc Code Is required',
                ];
    
                $this->validate($request,$rules,$customMessages);
                
                //update in vendors bank details table

                VendorsBankDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update(['account_holder_name'=>$data['account_holder_name'],'bank_name'=>$data['bank_name'],'account_number'=>$data['account_number'],'bank_ifsc_code'=>$data['bank_ifsc_code']]);
    
                return redirect()->back()->with('success_message', 'Vendor details updated successfully');
            }

            $vendorDetails = VendorsBankDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        }

        return view('admin.settings.update_vendor_details')->with(compact('slug','vendorDetails'));
        
    }

    public function admins($type=null){
        
        $admins = Admin::query();
        if(!empty($type)){
            $admins = $admins->where('type',$type);
            $title = ucfirst($type).'s';
        }else{
            $title = " All Admins/Subadmins/Vendors";
        }
        $admins = $admins->get()->toArray();
        // dd($admins);
        return view('admin.admins.admins')->with(compact('admins','title'));
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
