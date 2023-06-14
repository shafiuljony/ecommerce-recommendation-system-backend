@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Subscriber</h4>
                        @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success: </strong> {{ Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="subscribers">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Subscribed on
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
                                    @foreach($subscribers as $subscribers)
                                    <tr>
                                        <td>
                                            {{ $subscribers['id'] }}
                                        </td>
                                        <td>
                                            {{ $subscribers['email'] }}
                                        </td>
                                        <td>
                                            {{ $subscribers['created_at'] }}
                                        </td>
                                        <td>
                                            @if($subscribers['status']==1)
                                                <a  class="updateSubscriberStatus" id="subscribers-{{ $subscribers['id'] }}" subscribers_id="{{ $subscribers['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-check" style="font-size: 25px;" status="Active"></i></a>
                                            @else
                                            <a  class="updateSubscriberStatus" id="subscribers-{{ $subscribers['id'] }}" subscribers_id="{{ $subscribers['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-outline" style="font-size: 25px;" status="Inactive"></i></a>
                                            @endif        
                                        </td>
                                        <td>
                                            <a  class="confirmDelete" href="javascript:void(0)" module="subscribers" moduleid="{{ $subscribers['id'] }}">
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