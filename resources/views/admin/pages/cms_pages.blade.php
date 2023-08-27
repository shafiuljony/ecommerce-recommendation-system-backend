@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cms Pages</h4>
                        <a href="{{ url('admin/add-edit-cms-page')}}" class="btn btn-block btn-primary add-btn mt-10">Add Pages</a>
                        @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success: </strong> {{ Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="cmsPages">
                                <thead>
                                    <tr> 
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            URL
                                        </th>
                                        <th>
                                            Created On
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
                                    @foreach($CmsPages as $page)
                                    <tr>
                                        <td>
                                            {{ $page['id'] }}
                                        </td>
                                        <td>
                                            {{ $page['title'] }}
                                        </td>
                                        <td>
                                            {{ $page['url']}}
                                        </td>
                                        <td>
                                            {{ date("F j, Y, g:i a", strtotime($page['created_at'])); }}
                                        </td>
                                        <td>
                                            @if($page['status']==1)
                                                <a  class="updateCmsPageStatus" id="page-{{ $page['id'] }}" page_id="{{ $page['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-check" style="font-size: 25px;" status="Active"></i></a>
                                            @else
                                            <a  class="updateCmsPageStatus" id="page-{{ $page['id'] }}" page_id="{{ $page['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-outline" style="font-size: 25px;" status="Inactive"></i></a>
                                            @endif        
                                        </td>
                                        <td>
                                            <a title="Edit page" href="{{ url('admin/add-edit-cms-page/'.$page['id']) }}">
                                                 <i style="font-size: 25px;" class="mdi mdi-pencil-box"></i>
                                            </a>
                                            <a title="Delete Page" class="confirmDelete" href="javascript:void(0)" module="page" moduleid="{{ $page['id'] }}">
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