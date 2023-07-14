<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function registerUser(Request $request){
        if($request->isMethod("post")){
            $data = $request->input();
            // echo "<pre/>"; print_r($data); die;

            $rules = [
                'name' => 'required',
                'mobile' => 'required|numeric',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|max:20',
            ];

            $customMessages = [
                'name.required' => 'Name is required',
                'mobile.required' => 'Mobile is required',
                'mobile.numeric' => 'Mobile must be numeric',
                'email.required' => 'Email is required',
                'email.email' => 'Email must be valid',
                'email.unique' => 'Email already exists',
                'password.required' => 'Password is required',
                'password.min' => 'Password must be atleast 6 characters',
                'password.max' => 'Password must be less than 20 characters',
            ];

            $validator = Validator::make($data,$rules,$customMessages);

            if($validator->fails()){
                return response()->json($validator->errors(),433);
            }

            $user = new User;
            $user->name = $data['name'];
            $user->mobile = $data['mobile'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->status = 1;
            $user->save();

            return response()->json(['status'=>true,'message'=>'User Registered Successfully!'],201);
        }
    }

    public function loginUser(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();

            // echo "<pre/>"; print_r($data); die;

            //Verify User Email
            $userCount = User::where('email',$data['email'])->first();
            if($userCount > 0){
                 //Featch User Details
                $userDetails = User::where('email',$data['email'])->first();

                //Verify Password
                if(password_verify($data['password'],$userDetails->password)){
                    return response()->json(['status'=>true,
                    "message"=>"User Logged In Successfully!"],201);
                }else{
                    $message = "Password is Incorrect!";
                    return response()->json(['status'=>false,'message'=>$message],422);
                }
            }else{
                $message = "Email is Incorrect!";
                return response()->json(['status'=>false,'message'=>$message],422);
            }

           
        }
    }
}
