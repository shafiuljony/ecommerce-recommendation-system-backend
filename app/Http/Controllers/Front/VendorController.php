<?php

<<<<<<< HEAD
namespace App\Http\Controllers\front;
=======
namespace App\Http\Controllers\Front;
>>>>>>> 51b15c5b38e7ce1cd61b16370660860b278bc22b

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

<<<<<<< HEAD

class VendorController extends Controller
{
    public function loginRegister(){
        echo "test"; die;
=======
class VendorController extends Controller
{

    Public function loginRegister(){
        // echo "test"; die;
>>>>>>> 51b15c5b38e7ce1cd61b16370660860b278bc22b
        return view('front.vendors.login_register');
    }
}
