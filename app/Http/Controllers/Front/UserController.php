<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    public function loginRegister(){
        return view('front.users.login_register');
    }

    public function userRegister(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre"; print_r($data); die;

            // $validator = Validator::make($request->all(),[
            //     'name' => 'required|string|max:100',
            //     'mobile' => 'required|numeric|digits:11',
            //     'email' => 'required|email|max:150|unique:users',
            //     'password' => 'required|min:6',
            //     'accept' => 'required'
            // ],
            // [

            //     'accept.required'=>'Please accept our Terms $ Conditions'
            // ]
            


                //Register the User
                $user = new User;
                $user->name = $data['name'];
                $user->mobile = $data['mobile'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->status = 1;
                $user->save();

                // Send Register Email
                $email = $data['email'];
                $messageData = ['name'=>$data['name'],'mobile'=>$data['mobile'],'email'=>$data['email']];
                Mail::send('emails.register',$messageData,function($message)use($email){
                    $message->to($email)->subject('Welcome to Anon!');
                });

                // Send Register SMS
                $message = "Dear Customer, you have been successfully registered with Anon. Login to your account to access orders, addresses & available offers.";
                $mobile = $data['mobile'];
                Sms:sendsSms($message,$mobile);
    
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    $redirectTo = url('cart');
                    return response()->json(['url'=>$redirectTo]);
                }
            //else{
                //return response()->json(['type'=>'error','error'=>$validator->messages()]);
            
            
        }
    }

    public function userLogout(){
        Auth::logout();
        return redirect('/');
    }
}
