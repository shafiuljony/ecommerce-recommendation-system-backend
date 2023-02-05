<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     public function section()
     {
        return $this->belongsTo('App\Models\section','section_id');
     }
     public function category()
     {
        return $this->belongsTo('App\Models\Category','category_id');
     }
     public function attributes(){
         return $this->hasMany('App\Models\ProductsAttributes');
     }

     public function images(){
      return $this->hasMany('App\Models\ProductsImage');
     }
}
