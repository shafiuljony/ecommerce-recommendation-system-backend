<?php
use App\Models\Cart;
// echo "test"; die;
    function totalCartItems(){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $totalCartItems = Cart::where('user_id',$user_id)->sum('quantity');
        }else{
            $session_id = Session::get('session_id');
            $totalCartItems = Cart::where('session_id',$session_id)->sum('quantity');
        }
        return $totalCartItems;
    }

function getCartItems(){
    if(Auth::check()){
        //If user logged in /Pick auth id of the user
        $getCartItems = Cart::with(['product'=>function($query){
            $query->select('id','category_id','product_image','product_code','product_color','product_name');
        }])->orderby('id','Desc')->where('user_id',Auth::user()->id)->get()->toArray();
    }else{
        //If user not logged in / pick seasion id of the user
        $getCartItems = Cart::with(['product'=>function($query){
            $query->select('id','category_id','product_image','product_code','product_color','product_name');
        }])->orderby('id','Desc')->where('session_id',Session::get('session_id'))->get()->toArray();

    }
    return $getCartItems;
}
