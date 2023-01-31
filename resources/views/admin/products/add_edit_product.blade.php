@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h4 class="card-title">Products</h3>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                <a class="dropdown-item" href="#">January - March</a>
                                <a class="dropdown-item" href="#">March - June</a>
                                <a class="dropdown-item" href="#">June - August</a>
                                <a class="dropdown-item" href="#">August - November</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $title }}</h4>
                  @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                  @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Success: </strong> {{ Session::get('success_message')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif
                  <form class="forms-sample" @if(empty($product['id'])) action="{{ url('admin/add-edit-product') }}" @else action="{{ url('admin/add-edit-product/'.$product['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                  <div class="form-group">
                      <label for="category_id">Select Category</label>
                      <select name="category_id" id="category_id" class="form-control select-color">
                        <option value="">Select</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="product_name">Product Name</label>
                      <input type="text" class="form-control" @if(!empty($product['product_name'])) value="{{ $product['product_name'] }}" @else value="{{ old('product_name')}}" @endif id="product_name" placeholder="Enter your product Name" name="product_name" require>
                    </div>
                    <div class="form-group">
                      <label for="product_image">Product Image</label>
                      <input type="file" class="form-control" id="product_image"  name="product_image">
                      @if(!empty($product['product_image']))
                        <a target="_blank" href="{{ url('front/images/product_images/'.$product['product_image'])}}">View Image</a>&nbsp;|&nbsp;
                        <a  class="confirmDelete" href="javascript:void(0)" module="product-image" moduleid="{{ $product['id'] }}">
                          Delete Image
                        </a> 
                      @endif  
                    </div>
                    <div class="form-group">
                      <label for="product_discount">Product Discount</label>
                      <input type="text" class="form-control" @if(!empty($product['product_discount'])) value="{{ $product['product_discount'] }}" @else value="{{ old('product_discount')}}" @endif id="product_discount" placeholder="Enter your product Discount" name="product_discount" require>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="url">product URL</label>
                      <input type="text" class="form-control" @if(!empty($product['url'])) value="{{ $product['url'] }}" @else value="{{ old('url')}}" @endif id="url" placeholder="Enter product URL" name="url" require>
                    </div>
                    <div class="form-group">
                      <label for="meta_title">product Meta Title</label>
                      <input type="text" class="form-control" @if(!empty($product['meta_title'])) value="{{ $product['meta_title'] }}" @else value="{{ old('meta_title')}}" @endif id="meta_title" placeholder="product Meta Title" name="meta_title" require>
                    </div>
                    <div class="form-group">
                      <label for="meta_description">product Meta Description</label>
                      <input type="text" class="form-control" @if(!empty($product['meta_description'])) value="{{ $product['meta_description'] }}" @else value="{{ old('meta_description')}}" @endif id="meta_description" placeholder="product Meta Description" name="meta_description" require>
                    </div>
                    <div class="form-group">
                      <label for="meta_keywords">product Meta Keywords</label>
                      <input type="text" class="form-control" @if(!empty($product['meta_keywords'])) value="{{ $product['meta_keywords'] }}" @else value="{{ old('meta_keywords')}}" @endif id="meta_keywords" placeholder="product Meta Keywords" name="meta_keywords" require>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection