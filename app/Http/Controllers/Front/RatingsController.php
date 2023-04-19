<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;
use Session;
use Auth;

class RatingsController extends Controller
{
    public function addRating(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if(!Auth::check()){
                $message = "Login to rating this Product";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
            if(!isset($data['rating'])){
                $message = "Your need to add Rating for this product"; 
                Session::flash('error_message',$message);
                return redirect()->back();
            }
            $ratingCount = Rating::where(['user_id'=>Auth::user()->id,'product_id'=>$data['product_id']])->count();
            if($ratingCount>0){
                $message = "Your Rating already Exists for this product"; 
                Session::flash('error_message',$message);
                return redirect()->back();
            }else{
                // echo "Add Rating"; die;
                $rating = new Rating;
                $rating->user_id = Auth::user()->id;
                $rating->product_id = $data['product_id'];
                $rating->review = $data['review'];
                $rating->rating = $data['rating'];
                $rating->status = 0;
                $rating->save();
                $message = "Thanks for rating this product! It will be shown once approved.";
                Session::flash('success_message',$message);
                return redirect()->back();
            }
        }
    }
}
