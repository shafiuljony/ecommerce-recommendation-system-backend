<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories(){
        $categories = Category::get()->toArray();
        // dd($categories);
        return view('admin.categories.categories')->with(compact('categories'));
    }
}
