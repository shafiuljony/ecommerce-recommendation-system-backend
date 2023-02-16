@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Filters</h4>

                        <a href="{{ url('admin/add-edit-filter')}}" class="btn btn-block btn-primary add-btn">Add Filter</a>
                        @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success: </strong> {{ Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="filters">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Filter Name
                                        </th>
                                        <th>
                                            Filter Column
                                        </th>
                                        <th>
                                            Categories
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
                                    @foreach($filters as $filter)
                                    <tr>
                                        <td>
                                            {{ $filter['id'] }}
                                        </td>
                                        <td>
                                            {{ $filter['filter_name'] }}
                                        </td>
                                        <td>
                                            {{ $filter['filter_column'] }}
                                        </td>
                                        <td>
                                            {{ $filter['cat_ids'] }}
                                        </td>
                                        <td>
                                            @if($filter['status']==1)
                                                <a  class="updateFilterStatus" id="filter-{{ $filter['id'] }}" filter_id="{{ $filter['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-check" style="font-size: 25px;" status="Active"></i></a>
                                            @else
                                            <a  class="updateFilterStatus" id="filter-{{ $filter['id'] }}" filter_id="{{ $filter['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-outline" style="font-size: 25px;" status="Inactive"></i></a>
                                            @endif        
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-filter/'.$filter['id']) }}">
                                                 <i style="font-size: 25px;" class="mdi mdi-pencil-box"></i>
                                            </a>
                                            <a  class="confirmDelete" href="javascript:void(0)" module="filter" moduleid="{{ $filter['id'] }}">
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