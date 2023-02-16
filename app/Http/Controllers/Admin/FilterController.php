<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductsFilter;
use App\Models\ProductsFiltersValues;
use App\Models\Section;
use Illuminate\Http\Request;
use DB;
use Session;

class FilterController extends Controller
{
    public function filters(){
        Session::put('page','filters');
        $filters = ProductsFilter::get()->toArray();
        // dd($filters);
        return view('admin.filters.filters')->with(compact('filters'));
    }
    public function filtersValues(){
        Session::put('page','filters');
        $filters_values = ProductsFiltersValues::get()->toArray();
        // dd($filters);
        return view('admin.filters.filters_values')->with(compact('filters_values'));
    }
    public function updateFilterStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            ProductsFilter::where('id',$data['filter_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'filter_id'=>$data['filter_id']]);
        }
    }
    public function updateFilterValueStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            ProductsFiltersValues::where('id',$data['filter_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'filter_id'=>$data['filter_id']]);
        }
    }
    public function addEditFilter(Request $request,$id=null){
        Session::put('page','filters');
        if($id==""){
            $title="Add Filter Columns";
            $filter = new ProductsFilter;
            $message = "Filter Added Successfully!";
        }else{
            $title="Edit Filter Columns";
            $filter = ProductsFilter::find($id);
            $message = "Filter Updated Successfully!";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $cat_ids = implode(',',$data['cat_ids']);

            //Save Filter Column Details In Products Filters Table
            $filter->cat_ids = $cat_ids;
            $filter->filter_name = $data['filter_name'];
            $filter->filter_column = $data['filter_column'];
            $filter->status = 1;
            $filter->save();

            //Add FIlter Column in Products Table
            DB::statement('Alter table products add '.$data['filter_column'].' varchar(255) after description');

            return redirect('admin/filters')->with('success_message',$message);
        }

        //Get sections with categories and subcategories
        $categories = Section::with('categories')->get()->toArray();

        return view('admin.filters.add_edit_filter')->with(compact('title','categories','filter'));
    }
}
