<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Hash;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function login(Request  $request){
        // echo $password = Hash::make('12345678'); die;

        // $validated = $request->validate([
        //     'email' => 'required|email|max:255',  larabel error message
        //     'password' => 'required',
        // ]);

        $rules = [
            'email' => 'requred|email|max:255',
            'password' => 'required',
        ];

        $customMessages =[
            // adding custom message 
            'email.required' => 'Email is Address required',
            'email.email' => 'Valid Email is Address required',
            'password.required' => 'Password is required',
        ];

        $this->validate($request,$rules,$customMessages);

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;


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
