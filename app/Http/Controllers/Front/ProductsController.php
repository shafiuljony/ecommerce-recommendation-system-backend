<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductsController extends Controller
{
    public function listing(){
        $url = Route::getFacadeRoot()->current()->uri();
    }
}
