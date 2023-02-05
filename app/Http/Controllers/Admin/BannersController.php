<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function banners(){
        $banners = Banner::get()->toArray();
        // dd($banners); die;
        return view('admin.banners.banners')->with(compact('banners'));
    }
}
