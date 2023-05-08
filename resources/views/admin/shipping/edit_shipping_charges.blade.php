@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h4 class="card-title">Shipping Charges</h4>
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
                  <form class="forms-sample" action="{{ url('admin/edit-shipping-charges/'.$shippingDetails['id']) }}" method="post" >@csrf
                  <div class="form-group">
                      <label for="country">Country</label>
                      <input type="text" class="form-control" value="{{ $shippingDetails['country'] }}"  readonly="">
                    </div>
                    <div class="form-group">
                        <label for="0_500g">Rate (0-500g)</label>
                        <input type="text" class="form-control" id="0_500g" placeholder="Enter Shipping 0_500g" name="0_500g" value="{{ $shippingDetails['0_500g'] }}">
                    </div>
                    <div class="form-group">
                        <label for="501_1000g">Rate (501-1000g)</label>
                        <input type="text" class="form-control" id="501_1000g" placeholder="Enter Shipping 501_1000g" name="501_1000g" value="{{ $shippingDetails['501_1000g'] }}">
                    </div>
                    <div class="form-group">
                        <label for="1001_2000g">Rate (1001-2000g)</label>
                        <input type="text" class="form-control" id="1001_2000g" placeholder="Enter Shipping 1001_2000g" name="1001_2000g" value="{{ $shippingDetails['1001_2000g'] }}">
                    </div>
                    <div class="form-group">
                        <label for="2001_5000g">Rate (2001-5000g)</label>
                        <input type="text" class="form-control" id="2001_5000g" placeholder="Enter Shipping 2001_5000g" name="2001_5000g" value="{{ $shippingDetails['2001_5000g'] }}">
                    </div>
                    <div class="form-group">
                        <label for="above_5000g">Rate (above 5000g)</label>
                        <input type="text" class="form-control" id="above_5000g" placeholder="Enter Shipping above_5000g" name="above_5000g" value="{{ $shippingDetails['above_5000g'] }}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection