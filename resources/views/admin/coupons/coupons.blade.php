@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Coupons</h4>

                        <a href="{{ url('admin/add-edit-coupon')}}" class="btn btn-block btn-primary add-btn">Add Coupon</a>
                        @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success: </strong> {{ Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="coupons">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Coupon Code
                                        </th>
                                        <th>
                                            Coupon Type
                                        </th>
                                        <th>
                                            Amount
                                        </th>
                                        <th>
                                            Expiry Date
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupons as $coupon)
                                    <tr>
                                        <td>
                                            {{ $coupon['id'] }}
                                        </td>
                                        <td>
                                            {{ $coupon['coupon_code'] }}
                                        </td>
                                        <td>
                                            {{ $coupon['coupon_type'] }}
                                        </td>
                                        <td>
                                            {{ $coupon['amount'] }}
                                            @if($coupon['amount_type']=='Percentage')
                                                %
                                            @else
                                                BDT
                                            @endif        
                                        </td>
                                        <td>{{ $coupon['expiry_date'] }}</td>
                                        <td>
                                            @if($coupon['status']==1)
                                                <a  class="updateCouponStatus" id="coupon-{{ $coupon['id'] }}" brand_id="{{ $coupon['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-check" style="font-size: 25px;" status="Active"></i></a>
                                            @else
                                            <a  class="updateCouponStatus" id="coupon-{{ $coupon['id'] }}" brand_id="{{ $coupon['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-outline" style="font-size: 25px;" status="Inactive"></i></a>
                                            @endif        
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-coupon/'.$coupon['id']) }}">
                                                 <i style="font-size: 25px;" class="mdi mdi-pencil-box"></i>
                                            </a> 
                                            <!-- <a title="coupon" class="confirmDelete" href="{{ url('admin/delete-coupon/'.$coupon['id']) }}">
                                                 <i style="font-size: 25px;" class="mdi mdi-delete"></i>
                                            </a>  -->
                                            <a  class="confirmDelete" href="javascript:void(0)" module="coupon" moduleid="{{ $coupon['id'] }}">
                                                 <i style="font-size: 25px;" class="mdi mdi-delete"></i>
                                            </a> 
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
    </div>
    <!-- content-wrapper ends -->
@endsection