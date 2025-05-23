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
                      <!-- <input type="text" class="form-control" value="{{ $vendorDetails['country'] }}" id="vendor_country" placeholder="Enter your country Name" name="vendor_country" require> -->
                     <select id="vendor_country" class="form-control text-dark" name="vendor_country">
                      <option value="">Select Country</option>
                        @foreach($countries as $country)
                          <option value="{{ $country['country_name']}}" @if($country['country_name']==$vendorDetails['country']) selected @endif>{{ $country['country_name']}}</option>
                        @endforeach
                     </select>
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
                    <button type="reset" class="btn btn-light">Cancel</button>
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
                      <input type="text" class="form-control" @if(isset($vendorDetails['shop_name'])) value="{{ $vendorDetails['shop_name'] }}" @endif  id="shop_name" placeholder="Enter your  Shop name" name="shop_name" require>
                    </div>
                    <div class="form-group">
                      <label for="shop_address"> Shop Address</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['shop_address'])) value="{{ $vendorDetails['shop_address'] }}" @endif id="shop_address" placeholder="Enter your Shop  Address" name="shop_address" require>
                    </div>
                    <div class="form-group">
                      <label for="shop_city"> Shop City</label>
                      <input type="text" class="form-control"  @if(isset($vendorDetails['shop_city'])) value="{{ $vendorDetails['shop_city'] }}" @endif id="shop_city" placeholder="Enter your  Shop City" name="shop_city" require>
                    </div>
                    <div class="form-group">
                      <label for="shop_state"> Shop State</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['shop_state'])) value="{{ $vendorDetails['shop_state'] }}" @endif  id="shop_state" placeholder="Enter your  Shop State" name="shop_state" require>
                    </div>
                    <div class="form-group">
                      <label for="shop_country"> Shop Country</label>
                      <select id="shop_country" class="form-control text-dark" name="shop_country">
                      <option value="">Select Country</option>
                        @foreach($countries as $country)
                          <option value="{{ $country['country_name']}}" @if(isset($vendorDetails['shop_country'])  && $country['country_name']==$vendorDetails['shop_country']) selected @endif>{{ $country['country_name']}}</option>
                        @endforeach
                     </select>
                    </div>
                    <div class="form-group">
                      <label for="shop_pincode"> Shop Pincode</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['shop_pincode'])) value="{{ $vendorDetails['shop_pincode'] }}" @endif id="shop_pincode" placeholder="Enter your  Shop name" name="shop_pincode" require>
                    </div>
                    <div class="form-group">
                      <label for="shop_mobile"> Shop Mobile Number</label>
                      <input type="text" class="form-control"  @if(isset( $vendorDetails['shop_mobile'] )) value="{{ $vendorDetails['shop_mobile']  }}" @endif id="shop_mobile" placeholder="Enter your Shop  Mobile Number" name="shop_mobile" require maxlength="11" minlength="11" >
                    </div>
                    <div class="form-group">
                      <label for="business_license_number">Business License Number</label>
                      <input type="text" class="form-control"  @if(isset($vendorDetails['business_license_number'])) value="{{ $vendorDetails['business_license_number'] }}" @endif id="business_license_number" placeholder="Enter your Shop  Licence Number" name="business_license_number" require >
                    </div>
                    <div class="form-group">
                      <label for="gst_number"> Gst Number</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['gst_number'])) value="{{ $vendorDetails['gst_number'] }}" @endif id="gst_number" placeholder="Enter your Gst Number" name="gst_number" require>
                    </div>
                    <div class="form-group">
                      <label for="pan_number"> Pan Number</label>
                      <input type="text" class="form-control"  @if(isset($vendorDetails['pan_number'])) value="{{ $vendorDetails['pan_number'] }}" @endif id="pan_number" placeholder="Enter your Shop  Pan Number" name="pan_number" require maxlength="11" minlength="11" >
                    </div>
                    <div class="form-group">
                      <label for="shop_website"> Shop website</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['shop_website'])) value="{{ $vendorDetails['shop_website'] }}" @endif id="shop_website" placeholder="Enter your Shop  Website" name="shop_website">
                    </div>
                    <div class="form-group">
                      <label for="shop_email">Shop Email</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['shop_email'])) value="{{ $vendorDetails['shop_email'] }}" @endif id="shop_email" placeholder="Enter your Shop  Email" name="shop_email">
                    </div>
                    <div class="form-group">
                      <label for="address_proof">Address Proof</label>
                      <select name="address_proof" class="form-control text-dark" id="address_proof"> 
                        <option value="Passport" @if(isset($vendorDetails['address_proof']) && $vendorDetails['address_proof']=="Passport") selected @endif>Passport</option>
                        <option value="Nid" @if(isset($vendorDetails['address_proof']) && $vendorDetails['address_proof']=="National Id") selected @endif>National Id</option>
                        <option value="Tread lisence" @if(isset($vendorDetails['address_proof']) &&$vendorDetails['address_proof']=="Tread lisence") selected @endif>Tread lisence</option>
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
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
        </div>
    </div>
    @elseif($slug=="bank")

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Bank Information</h4>
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
                  <form class="forms-sample" action="{{ url('admin/update-vendor-details/bank') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                      <label>Vendor Username/Email</label>
                      <input class="form-control" readonly value="{{ Auth::guard('admin')->user()->email}}" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="account_holder_name">Account Holde Name</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['account_holder_name'])) value="{{ $vendorDetails['account_holder_name'] }}" @endif id="account_holder_name" placeholder="Enter Account Holde Name" name="account_holder_name" require>
                    </div>
                    <div class="form-group">
                      <label for="bank_name">Bank Name</label>
                      <input type="text" class="form-control"  @if(isset($vendorDetails['bank_name'])) value="{{ $vendorDetails['bank_name'] }}" @endif id="bank_name" placeholder="Enter Bank Name" name="bank_name" require>
                    </div>
                    <div class="form-group">
                      <label for="account_number">Account Number</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['account_number'])) value="{{ $vendorDetails['account_number'] }}" @endif id="account_number" placeholder="Enter your Shop Mobile Number" name="account_number" require maxlength="20" >
                    </div>
                    <div class="form-group">
                      <label for="bank_ifsc_code">Bank Ifsc Code</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['bank_ifsc_code'])) value="{{ $vendorDetails['bank_ifsc_code'] }}" @endif id="bank_ifsc_code" placeholder="Enter your Shop  Mobile Number" name="bank_ifsc_code" require maxlength="10" >
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
        </div>
    </div>
    @endif
</div>

@endsection