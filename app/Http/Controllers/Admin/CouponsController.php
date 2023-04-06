<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Session;

class CouponsController extends Controller
{
    public function coupons(){
        Session::put('page','coupons');
        $coupons = Coupon::get()->toArray();
        // dd($coupons);
        return view('admin.coupons.coupons')->with(compact('coupons'));
    }
    public function updateCouponStatus(Request $request){
       
        //is not working
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Coupon::where('id',$data['coupon_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'coupon_id'=>$data['coupon_id']]);
        }
    }
    public function deleteCoupon($id){
       
        //delete coupon

        Coupon::where('id',$id)->delete();
        $message = 'Coupon has been deleted successfully!';
        return redirect()->back()->with('success_message',$message);
    }

    public function addEditCoupon(Request $request,$id=null){
        if($id==""){
            //Add Coupon
            $title = "Add Coupon";
            $coupon = new Coupon;
            $selCats = array();
            $selBrands = array();
            $selUsers = array();
            $message = "Coupon Added Successfully!";
        }else{
            //Update Coupon
            $title = "Edit Coupon";
            $coupon = Coupon::find($id);
            $selCats = explode(',',$coupon['categories']);
            $selBrands = explode(',',$coupon['brands']);
            $selUsers = explode(',',$coupon['users']);
            $message = "Coupon Updated Successfully!";
        }
        
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $rules =[
                'categories' => 'required',
                'brands' => 'required',
                'coupon_option' => 'required',
                'coupon_type' => 'required',
                'amount_type' => 'required',
                'amount'=>'required||numeric',
                'expiry_date'=>'required'
            ];

            $customMessages = [
                'categories.required' => 'Select Category is required',
                'brands.required' => 'Select Brands is required',
                'coupon_option.required' => 'Select Coupon option is required',
                'coupon_type.numeric' => 'Select Coupon type is required',
                'amount_type.required' => 'Select Amount Type is required',
                'amount.numeric' => 'Amount is Required',
                'amount.required' => 'Enter Valid Amount',
                'expiry_date.required' => 'Expiry Date is required',
            ];

            $this->validate($request,$rules,$customMessages);
            
            if(isset($data['categories'])){
                $categories =  implode(", ",$data['categories']);
            }else{
                $categories = "";
            }
            if(isset($data['brands'])){
                $brands =  implode(", ",$data['brands']);
            }else{
                $brands = "";
            }
            if(isset($data['users'])){
                $users =  implode(", ",$data['users']);
            }else{
                $users = "";
            }
            
            if($data['coupon_option'] == "Automatic"){
                $coupon_code = str_random(8);
            }else{
                $coupon_code = $data['coupon_code'];
            }
            
            $adminType = Auth::guard('admin')->user()->type;
            
            if($adminType == "vendor"){
                $coupon->vendor_id = Auth::guard('admin')->user()->vendor_id;
            }else{
                $coupon->vendor_id = 0;
            }
            // dd('okbro');

            $coupon->coupon_option = $data['coupon_option'];
            $coupon->coupon_code = $coupon_code;
            $coupon->categories = $categories;
            $coupon->brands = $brands;
            $coupon->users = $users;
            $coupon->coupon_type = $data['coupon_type'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->amount = $data['amount'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->status = 1;
            $coupon->save();

            return redirect('admin/coupons')->with('success_message',$message);
        }

        //Get sections with categories and subcategories
        $categories = Section::with('categories')->get()->toArray();

        //Get All the brand
        $brands = Brand::where('status',1)->get()->toArray();

        //Get All User Emails
        $users = User::select('email')->where('status',1)->get();

        return view('admin.coupons.add_edit_coupon')->with(compact('title','coupon','categories','brands','users','selCats','selBrands','selUsers'));
    }
}
