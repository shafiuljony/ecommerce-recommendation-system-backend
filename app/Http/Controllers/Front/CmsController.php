<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class CmsController extends Controller
{
   public function cmsPage(){
    $currentRoute = url()->current();
    $currentRoute = str_replace("http://127.0.0.1:8000/","",$currentRoute);
    $cmsRoutes = CmsPage::select('url')->where('status',1)->get()->pluck('url')->toArray();
    if(in_array($currentRoute,$cmsRoutes)){
        $cmsPageDetails = CmsPage::where('url',$currentRoute)->first()->toArray();
        return view('front.pages.cms_page')->with(compact('cmsPageDetails'));
    }else{
        abort(404);
    }
   }
   public function contact(Request $request){
    if($request->isMethod('post')){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
            $rules = [
                "name" => "required|string|max:100",
                "email" => "required|email|max:150",
                "subject" => "required",
                "message" => "required",
            ];
            $customMessage = [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
                'subject.required' => 'Subject is required',
                'message.required' => 'Message is required',
            ];
            $validator = Validator::make($data,$rules,$customMessage);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $email = "admin1000@gmail.com";
            $messageData = [
                'name'     => $data['name'],
                'email'     => $data['email'],
                'subject'     => $data['subject'],
                'comment'     => $data['message'],
            ];

            Mail::send('emails.enquiry',$messageData,function($message)use($email){
                $message->to($email)->subject("Enquiry from Anon");
            });
            $message = "Thanks for your query, we will get back to you soon.";
            return redirect()->back()->with('success_message', $message);
    }
    return view('front.pages.contact');
   }
}
