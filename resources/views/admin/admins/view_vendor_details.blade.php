@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Vendor Details</h3>
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
                      <input class="form-control" value="{{ $vendorDetails['vendor_personal']['email']}}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_name">Name</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['name']}}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_address">Address</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['address']}}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_city">City</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['city']}}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_state">State</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['state']}}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_country">Country</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['country']}}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_pincode">Pincode</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['pincode']}}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_mobile">Mobile Number</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['mobile']}} ">
                    </div>
                    <div class="form-group">
                      <label for="vendor_image">Photo</label>
                      <input type="file" class="form-control" id="vendor_image"  name="vendor_image">
                      @if(!empty($vendorDetails['image']))
                      <a target="_blank" href="{{ url('admin/images/photos/'.$vendorDetails['image'])}}">View Image</a>
                      <input type="hidden" name="current_vendor_image" value="{{
                        $vendorDetails['image']
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
</div>

@endsection