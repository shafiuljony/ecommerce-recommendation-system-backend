<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function orders(){
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('id','Desc')->get()->toArray();
        dd($orders);
    }
}
