@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h4 class="card-title">Attributes</h3>
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
                  <h4 class="card-title">Add Attributes</h4>
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
                  <form class="forms-sample" action="{{ url('admin/add-edit-attributes/'.$product['id']) }}" method="post">@csrf
                    <div class="form-group">
                      <label for="product_name">Product Name</label>
                      &nbsp; {{ $product['product_name']}}
                    </div>
                    <div class="form-group">
                      <label for="product_code">Product Code</label>
                      &nbsp; {{ $product['product_code']}}
                    </div>
                    <div class="form-group">
                      <label for="product_color">Product Color</label>
                      &nbsp; {{ $product['product_color']}}
                    </div>
                    <div class="form-group">
                      <label for="product_price">Product Price</label>
                      &nbsp; {{ $product['product_price']}}
                    </div>
                    <div class="form-group">
                      @if(!empty($product['product_image']))
                        <img class="product-image-size" src="{{ url('front/images/product_images/large/'.$product['product_image'])}}">
                      @else
                        <img class="product-image-size" src="{{ url('front/images/product_images/small/no-image.png')}}">
                      @endif  
                    </div>
                    <div class="form-group">
                      <div class="field_wrapper">
                          <div>
                              <input type="text" name="size[]" placeholder="Size" class="attributes-input" require/>
                              <input type="text" name="sku[]" placeholder="SKU" class="attributes-input" require/>
                              <input type="text" name="price[]" placeholder="Price" class="attributes-input" require/>
                              <input type="text" name="stock[]" placeholder="Stock" class="attributes-input" require/>
                              <a href="javascript:void(0);" class="add_button" title="Add Attributes">Add</a>
                          </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  <br> <h4 class="card-title">Product Attributes</h4> <br>
                  <table class="table table-bordered" id="products">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Size
                                        </th>
                                        <th>
                                            SKU
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Stock
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product['attributes'] as $attribute)
                                    <tr>
                                        <td>
                                            {{ $attribute['id'] }}
                                        </td>
                                        <td>
                                            {{ $attribute['size'] }}
                                        </td>
                                        <td>
                                            {{ $attribute['sku']}}
                                        </td>
                                        <td>
                                            {{ $attribute['price'] }}
                                        </td>
                                        <td>
                                            {{ $attribute['stock'] }}
                                        </td>
                                        <td>
                                            @if($product['status']==1)
                                                <a  class="updateProductStatus" id="product-{{ $product['id'] }}" product_id="{{ $product['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-check" style="font-size: 25px;" status="Active"></i></a>
                                            @else
                                            <a  class="updateproductStatus" id="product-{{ $product['id'] }}" product_id="{{ $product['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-outline" style="font-size: 25px;" status="Inactive"></i></a>
                                            @endif        
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection