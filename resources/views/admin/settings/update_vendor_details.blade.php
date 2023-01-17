@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Update Vendor Details</h3>
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
    @if($slug=="personal")
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Personal Information</h4>
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
                  <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                      <label>Vendor Username/Email</label>
                      <input class="form-control" readonly value="{{ Auth::guard('admin')->user()->email}}" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="vendor_name">Name</label>
                      <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->name}}" id="vendor_name" placeholder="Enter your name" name="vendor_name" require>
                    </div>
                    <div class="form-group">
                      <label for="vendor_address">Address</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['address'] }}" id="vendor_address" placeholder="Enter your Address" name="vendor_address" require>
                    </div>
                    <div class="form-group">
                      <label for="vendor_city">City</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['city'] }}" id="vendor_city" placeholder="Enter your City" name="vendor_city" require>
                    </div>
                    <div class="form-group">
                      <label for="vendor_state">State</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['state'] }}" id="vendor_state" placeholder="Enter your State" name="vendor_state" require>
                    </div>
                    <div class="form-group">
                      <label for="vendor_country">Country</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['country'] }}" id="vendor_country" placeholder="Enter your country Name" name="vendor_country" require>
                    </div>
                    <div class="form-group">
                      <label for="vendor_pincode">Pincode</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['pincode'] }}" id="vendor_pincode" placeholder="Enter your name" name="vendor_pincode" require>
                    </div>
                    <div class="form-group">
                      <label for="vendor_mobile">Mobile Number</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['mobile'] }}" id="vendor_mobile" placeholder="Enter your Mobile Number" name="vendor_mobile" require maxlength="11" minlength="11" >
                    </div>
                    <div class="form-group">
                      <label for="vendor_image">Photo</label>
                      <input type="file" class="form-control" id="vendor_image"  name="vendor_image">
                      @if(!empty(Auth::guard('admin')->user()->image))
                      <a target="_blank" href="{{ url('admin/images/photos/'.Auth::guard('admin')->user()->image)}}">View Image</a>
                      <input type="hidden" name="current_vendor_image" value="{{
                        Auth::guard('admin')->user()->image
                      }}">
                      @endif
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
        </div>
    </div>
    @elseif($slug=="business")
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Business Information</h4>
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
                  <form class="forms-sample" action="{{ url('admin/update-vendor-details/business') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                      <label>Vendor Username/Email</label>
                      <input class="form-control" readonly value="{{ Auth::guard('admin')->user()->email}}" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="shop_name">Shop Name</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['shop_name']}}" id="shop_name" placeholder="Enter your  Shop name" name="shop_name" require>
                    </div>
                    <div class="form-group">
                      <label for="shop_address"> Shop Address</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['shop_address'] }}" id="shop_address" placeholder="Enter your Shop  Address" name="shop_address" require>
                    </div>
                    <div class="form-group">
                      <label for="shop_city"> Shop City</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['shop_city'] }}" id="shop_city" placeholder="Enter your  Shop City" name="shop_city" require>
                    </div>
                    <div class="form-group">
                      <label for="shop_state"> Shop State</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['shop_state'] }}" id="shop_state" placeholder="Enter your  Shop State" name="shop_state" require>
                    </div>
                    <div class="form-group">
                      <label for="shop_country"> Shop Country</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['shop_country'] }}" id="shop_country" placeholder="Enter your  Shop country Name" name="shop_country" require>
                    </div>
                    <div class="form-group">
                      <label for="shop_pincode"> Shop Pincode</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['shop_pincode'] }}" id="shop_pincode" placeholder="Enter your  Shop name" name="shop_pincode" require>
                    </div>
                    <div class="form-group">
                      <label for="business_license_number">Business License Number</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['business_license_number'] }}" id="business_license_number" placeholder="Enter your Shop  Licence Number" name="business_license_number" require >
                    </div>
                    <div class="form-group">
                      <label for="gst_number"> Gst Number</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['gst_number'] }}" id="gst_number" placeholder="Enter your Gst Number" name="gst_number" require>
                    </div>
                    <div class="form-group">
                      <label for="pan_number"> Pan Number</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['pan_number'] }}" id="pan_number" placeholder="Enter your Shop  Pan Number" name="pan_number" require maxlength="11" minlength="11" >
                    </div>
                    <div class="form-group">
                      <label for="shop_mobile"> Shop Mobile Number</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['shop_mobile'] }}" id="shop_mobile" placeholder="Enter your Shop  Mobile Number" name="shop_mobile" require maxlength="11" minlength="11" >
                    </div>
                    <div class="form-group">
                      <label for="shop_website"> Shop website</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['shop_website'] }}" id="	shop_website" placeholder="Enter your Shop  Mobile Number" name="shop_website">
                    </div>
                    <div class="form-group">
                      <label for="address_proof">Address Proof</label>
                      <select name="address_proof" class="form-control" id="address_proof">
                        <option value="Passport">Passport</option>
                        <option value="Nid">National Id</option>
                        <option value="Tread lisence">Tread lisence</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="address_proof_image"> Address Proof Image</label>
                      <input type="file" class="form-control" id="address_proof_image"  name="address_proof_image">
                      @if(!empty($vendorDetails['address_proof_image']))
                      <a target="_blank" href="{{ url('admin/images/proofs/'.$vendorDetails['address_proof_image'])}}">View Image</a>
                      <input type="hidden" name="current_address_proof" value="{{
                        $vendorDetails['address_proof_image']
                      }}">
                      @endif
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
        </div>
    </div>
    @elseif($slug=="bank")
    @endif
</div>

@endsection