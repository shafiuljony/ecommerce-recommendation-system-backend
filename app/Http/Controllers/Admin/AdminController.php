<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Support\Facades\Mail;
use App\Models\VendorsBankDetails;
use App\Models\VendorsBusinessDetails;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Image;


class AdminController extends Controller
{
    public function dashboard(){
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }
    public function updateAdminPassword(Request $request){
        Session::put('page','update_admin_password');
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
        Session::put('page','update_admin_details');
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

            return redirect()->back()->with('success_message', 'Admin details updated successfully');
        }
        return view('admin.settings.update_admin_details');
    }
    public function updateVendorDetails($slug, Request $request){
        $vendorDetails ='';
       
        if($slug=="personal"){
            
            Session::put('page','update_personal_details');
            if($request->isMethod('post')){
                $data = $request->all();

                // echo "<pre>"; print_r($data); die;

                $rules =[
                    'vendor_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_mobile' => 'required|numeric',
                ];

                $customMessages = [
                    'vendor_name.required' => 'Name is required',
                    'vendor_name.regex' => 'Valid Name Is required',
                    'vendor_mobile.numeric' => 'Valid number Is required',
                ];

                $this->validate($request,$rules,$customMessages);

                // Upload Vendor Photo

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

                //update in Vendor table

                Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->update(['name'=>$data['vendor_name'],'address'=>$data['vendor_address'],'city'=>$data['vendor_city'],'state'=>$data['vendor_state'],'country'=>$data['vendor_country'],'pincode'=>$data['vendor_pincode'],'mobile'=>$data['vendor_mobile']]);

                return redirect()->back()->with('success_message', 'Vendor details updated successfully');
            }
            $vendorDetails = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            

        }else if($slug=="business"){
            
            //business
            Session::put('page','update_business_details');
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
                    'shop_mobile.numeric' => 'Valid Address Proof Image Is required',
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

                $vendorCount = VendorsBusinessDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->count();
                if($vendorCount>0){
                    VendorsBusinessDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update(['shop_name'=>$data['shop_name'],'shop_address'=>$data['shop_address'],'shop_city'=>$data['shop_city'],'shop_state'=>$data['shop_state'],'shop_country'=>$data['shop_country'],'shop_pincode'=>$data['shop_pincode'],'shop_mobile'=>$data['shop_mobile'],
                    'shop_website'=>$data['shop_website'],
                    'address_proof'=>$data['address_proof'],
                    'address_proof_image'=>$imageName,
                    'business_license_number'=>$data['business_license_number'],
                    'gst_number'=>$data['gst_number'],
                    'pan_number'=>$data['pan_number']]);
                }else{
                    //update in vendors business details table
                    VendorsBusinessDetails::insert(['vendor_id'=>Auth::guard('admin')->user()->vendor_id,'shop_name'=>$data['shop_name'],'shop_address'=>$data['shop_address'],'shop_city'=>$data['shop_city'],'shop_state'=>$data['shop_state'],'shop_country'=>$data['shop_country'],'shop_pincode'=>$data['shop_pincode'],'shop_mobile'=>$data['shop_mobile'],
                    'shop_website'=>$data['shop_website'],
                    'address_proof'=>$data['address_proof'],
                    'address_proof_image'=>$imageName,
                    'business_license_number'=>$data['business_license_number'],
                    'gst_number'=>$data['gst_number'],
                    'pan_number'=>$data['pan_number']]);
                }

                return redirect()->back()->with('success_message', 'Vendor details updated successfully');
            }
            $vendorCount = VendorsBusinessDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->count();
            if($vendorCount>0){

                $vendorDetails = VendorsBusinessDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            }else{
                $vendorDetails = array();
            }
            // dd($vendorDetails);
        }else if($slug=="bank"){
            //bank
            Session::put('page','update_bank_details');
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
                $vendorCount = VendorsBankDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->count();
                if($vendorCount>0){
                    VendorsBankDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update(['account_holder_name'=>$data['account_holder_name'],'bank_name'=>$data['bank_name'],'account_number'=>$data['account_number'],'bank_ifsc_code'=>$data['bank_ifsc_code']]);
                }else{

                    VendorsBankDetails::insert(['vendor_id'=>Auth::guard('admin')->user()->vendor_id,'account_holder_name'=>$data['account_holder_name'],'bank_name'=>$data['bank_name'],'account_number'=>$data['account_number'],'bank_ifsc_code'=>$data['bank_ifsc_code']]);
                }

                return redirect()->back()->with('success_message', 'Vendor details updated successfully');
            }
            $vendorCount = VendorsBankDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->count();
            if($vendorCount>0){

                $vendorDetails = VendorsBankDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            }else{
                $vendorDetails = array();
            }
            
        }

        
        $countries = Country::where('status',1)->get()->toArray();

        return view('admin.settings.update_vendor_details')->with(compact('slug','vendorDetails','countries'));

    }

    public function admins($type=null){

        $admins = Admin::query();
        if(!empty($type)){
            $admins = $admins->where('type',$type);
            $title = ucfirst($type).'s';
            Session::put('page','view_'.strtolower($title));
        }else{
            $title = " All Admins/Subadmins/Vendors";
            Session::put('page','view_all');
        }
        $admins = $admins->get()->toArray();
        // dd($admins);
        return view('admin.admins.admins')->with(compact('admins','title'));
    }
    public function viewVendorDetails($id){
        $vendorDetails = Admin::with('vendorPersonal','vendorBusiness','vendorBank')->where('id',$id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails),true);
        // dd($vendorDetails);

        return view('admin.admins.view_vendor_details')->with(compact('vendorDetails'));
    }

    public function updateAdminStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Admin::where('id',$data['admin_id'])->update(['status'=>$status]);
            $adminDetails = Admin::where('id',$data['admin_id'])->first()->toArray();
            if($adminDetails['type']=="vendor" && $status ==1){
                //Send Approval Email
                $email = $adminDetails['email'];
                $messageData = [
                    'email' => $adminDetails['email'],
                    'name' => $adminDetails['name'],
                    'mobile' => $adminDetails['mobile'],
            ];

            Mail::send('emails.vendor_approved', $messageData, function($message)use($email){$message->to($email)->subject('Vendor Account is Approved');
            });
            }
            return response()->json(['status'=>$status,'admin_id'=>$data['admin_id']]);
        }
    }
    public function login(Request  $request){
        // echo $password = Hash::make('12345678'); die;

        if($request->isMethod('post')){
            $data = $request->all();



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


            // if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
            //     if(Auth::guard('admin')->user()->type=="vendor" && Auth::guard('admin')->user()->confirm=="No"){
            //         return redirect()->back()->with('error_message', 'Please confirm your email to activate your Vendor Account');
            //     }  else if(Auth::guard('admin')->user()->type!="vendor" && Auth::guard('admin')->user()->status==0){
            //         return redirect()->back()->with('error_message','Your admin account is not active');
            //     }else{
            //         return redirect('admin/dashboard');
            //     }
            // }else{
            //     return redirect()->back()->with('error_message', 'Invalid Email or Password');
            // }
            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                if(Auth::guard('admin')->user()->type=="vendor" && Auth::guard('admin')->user()->confirm=="No"){
                    return redirect()->back()->with('error_message', 'Please confirm your email to activate your Vendor Account');
                }else if(Auth::guard('admin')->user()->type!="vendor" && Auth::guard('admin')->user()->status==0){
                    return redirect()->back()->with('error_message','Your admin account is not active');
                }else{
                    return redirect('admin/dashboard');
                }
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
