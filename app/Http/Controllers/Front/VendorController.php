<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class VendorController extends Controller
{
    public function loginRegister(){
        echo "test"; die;
        return view('front.vendors.login_register');
    }
}
