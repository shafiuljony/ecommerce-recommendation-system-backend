@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Vendor Details</h3>
                    <h6 class="font-weight-normal mb-0">
                      <a href="{{ url('admin/admins/vendor')}}">Back To Vendor</a>
                    </h6>
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
                  <h4 class="card-title">Personal Information</h4>
                    <div class="form-group">
                      <label>Email</label>
                      <input class="form-control" value="{{ $vendorDetails['vendor_personal']['email']}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="vendor_name">Name</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['name']}}"readonly>
                    </div>
                    <div class="form-group">
                      <label for="vendor_address">Address</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['address']}}"readonly>
                    </div>
                    <div class="form-group">
                      <label for="vendor_city">City</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['city']}}"readonly>
                    </div>
                    <div class="form-group">
                      <label for="vendor_state">State</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['state']}}"readonly>
                    </div>
                    <div class="form-group">
                      <label for="vendor_country">Country</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['country']}}"readonly>
                    </div>
                    <div class="form-group">
                      <label for="vendor_pincode">Pincode</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['pincode']}}"readonly>
                    </div>
                    <div class="form-group">
                      <label>Mobile Number</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['mobile']}} "readonly>
                    </div>
                    @if(!empty($vendorDetails['image']))
                      <div class="form-group">
                        <label for="vendor_image">Photo</label>
                        <br>
                        <img  style="width: 200px;" src="{{ url('admin/images/photos/'.$vendorDetails['image'])}}">
                      </div>
                    @endif
                </div>
              </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Business Information</h4>
                    <div class="form-group">
                      <label for="vendor_name">Shop Name</label>
                      <input  class="form-control" @if(isset($vendorDetails['shop_name'])) value="{{ $vendorDetails['shop_name'] }}" @endif readonly>
                    </div>
                    <div class="form-group">
                      <label for="vendor_address">Shop Address</label>
                      <input  class="form-control" @if(isset($vendorDetails['shop_address'])) value="{{ $vendorDetails['shop_address'] }}" @endif readonly>
                    </div>
                    <div class="form-group">
                      <label for="vendor_city">Shop City</label>
                      <input  class="form-control" @if(isset($vendorDetails['shop_city'])) value="{{ $vendorDetails['shop_city'] }}" @endif readonly>
                    </div>
                    <div class="form-group">
                      <label for="vendor_state">Shop State</label>
                      <input  class="form-control" @if(isset($vendorDetails['shop_state'])) value="{{ $vendorDetails['shop_state'] }}" @endif readonly>
                    </div>
                    <div class="form-group">
                      <label for="vendor_country">Shop Country</label>
                      <input  class="form-control" @if(isset($vendorDetails['shop_country'])  && $country['country_name']==$vendorDetails['shop_country']) selected @endif readonly>
                    </div>
                    <div class="form-group">
                      <label for="vendor_pincode">Shop Pincode</label>
                      <input  class="form-control" @if(isset($vendorDetails['shop_pincode'])) value="{{ $vendorDetails['shop_pincode'] }}" @endif readonly>
                    </div>
                    <div class="form-group">
                      <label>Shop Mobile Number</label>
                      <input  class="form-control" @if(isset( $vendorDetails['shop_mobile'] )) value="{{ $vendorDetails['shop_mobile']  }}" @endif readonly>
                    </div>
                    <div class="form-group">
                      <label>Shop Website</label>
                      <input  class="form-control" @if(isset($vendorDetails['shop_website'])) value="{{ $vendorDetails['shop_website'] }}" @endif readonly>
                    </div>
                    <div class="form-group">
                      <label>Shop Email</label>
                      <input class="form-control" @if(isset($vendorDetails['shop_email'])) value="{{ $vendorDetails['shop_email'] }}" @endif readonly>
                    </div>
                    <div class="form-group">
                      <label for="business_license_number">Business License Number</label>
                      <input type="text" class="form-control"  @if(isset($vendorDetails['business_license_number'])) value="{{ $vendorDetails['business_license_number'] }}" @endif id="business_license_number" readonly>
                    </div>
                    <div class="form-group">
                      <label for="gst_number"> Gst Number</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['gst_number'])) value="{{ $vendorDetails['gst_number'] }}" @endif id="gst_number" name="gst_number" readonly>
                    </div>
                    <div class="form-group">
                      <label for="pan_number"> Pan Number</label>
                      <input type="text" class="form-control"  @if(isset($vendorDetails['pan_number'])) value="{{ $vendorDetails['pan_number'] }}" @endif id="pan_number" name="pan_number" maxlength="11" minlength="11" readonly >
                    </div>
                    <div class="form-group">
                      <label>Address Proof</label>
                      <input class="form-control" @if(isset( $vendorDetails['vendor_business']['address_proof'])) value="{{  $vendorDetails['vendor_business']['address_proof'] }}" @endif readonly>
                    </div>
                    @if(!empty($vendorDetails['vendor_business']['address_proof_image']))
                      <div class="form-group">
                        <label>Photo</label>
                        <br>
                        <img  style="width: 200px;" src="{{ url('admin/images/proofs/'.$vendorDetails['vendor_business']['address_proof_image'])}}">
                      </div>
                    @endif
                </div>
              </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bank Information</h4>
                    <div class="form-group">
                      <label for="vendor_name">Account Holder Name</label>
                      <input  class="form-control" @if(isset($vendorDetails['account_holder_name'])) value="{{ $vendorDetails['account_holder_name'] }}" @endif  readonly>
                    </div>
                    <div class="form-group">
                      <label for="vendor_address">Bank Name</label>
                      <input  class="form-control" @if(isset($vendorDetails['bank_name'])) value="{{ $vendorDetails['bank_name'] }}" @endif readonly>
                    </div>
                    <div class="form-group">
                      <label>Account Number</label>
                      <input  class="form-control" @if(isset($vendorDetails['account_number'])) value="{{ $vendorDetails['account_number'] }}" @endif readonly>
                    </div>
                    <div class="form-group">
                      <label>Ifsc Code</label>
                      <input  class="form-control" @if(isset($vendorDetails['bank_ifsc_code'])) value="{{ $vendorDetails['bank_ifsc_code'] }}" @endif readonly>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection