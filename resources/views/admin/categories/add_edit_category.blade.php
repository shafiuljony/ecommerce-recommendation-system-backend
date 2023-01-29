@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h4 class="card-title">Catalogue Management</h3>
                    <h6 class="font-weight-normal mb-0">Categories</h6>
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
                  <form class="forms-sample" @if(empty($category['id'])) action="{{ url('admin/add-edit-category') }}" @else action="{{ url('admin/add-edit-category/'.$category['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                      <label for="category_name">Category Name</label>
                      <input type="text" class="form-control" @if(!empty($category['category_name'])) value="{{ $category['category_name'] }}" @else value="{{ old('category_name')}}" @endif id="category_name" placeholder="Enter your category Name" name="category_name" require>
                    </div>
                    <div class="form-group">
                      <label for="section_id">Select Section</label>
                      <select name="section_id" id="section_id" class="form-control">
                        <option value="">Select</option>
                        @foreach($getSections as $section)
                        <option value="{{ $section['id'] }}" @if(!empty($category['section_id']) && $category['section_id'] ==$section['id']) selected @endif>{{ $section['name'] }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <div id="appendCategoriesLevel">
                        @include('admin.categories.append_categories_level')
                    </div>
                    <div class="form-group">
                      <label for="category_image">Category Image</label>
                      <input type="file" class="form-control" id="category_image"  name="category_image">
                    </div>
                    <div class="form-group">
                      <label for="category_discount">Category Discount</label>
                      <input type="text" class="form-control" @if(!empty($category['category_discount'])) value="{{ $category['category_discount'] }}" @else value="{{ old('category_discount')}}" @endif id="category_discount" placeholder="Enter your category Discount" name="category_discount" require>
                    </div>
                    <div class="form-group">
                      <label for="description">Category Description</label>
                      <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="url">Category URL</label>
                      <input type="text" class="form-control" @if(!empty($category['url'])) value="{{ $category['url'] }}" @else value="{{ old('url')}}" @endif id="url" placeholder="Enter Category URL" name="url" require>
                    </div>
                    <div class="form-group">
                      <label for="meta_title">Category Meta Title</label>
                      <input type="text" class="form-control" @if(!empty($category['meta_title'])) value="{{ $category['meta_title'] }}" @else value="{{ old('meta_title')}}" @endif id="meta_title" placeholder="Category Meta Title" name="meta_title" require>
                    </div>
                    <div class="form-group">
                      <label for="meta_description">Category Meta Description</label>
                      <input type="text" class="form-control" @if(!empty($category['meta_description'])) value="{{ $category['meta_description'] }}" @else value="{{ old('meta_description')}}" @endif id="meta_description" placeholder="Category Meta Description" name="meta_description" require>
                    </div>
                    <div class="form-group">
                      <label for="meta_keywords">Category Meta Keywords</label>
                      <input type="text" class="form-control" @if(!empty($category['meta_keywords'])) value="{{ $category['meta_keywords'] }}" @else value="{{ old('meta_keywords')}}" @endif id="meta_keywords" placeholder="Category Meta Keywords" name="meta_keywords" require>
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