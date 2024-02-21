@extends('layouts.master')
@section('title')
All User
@endsection
@section('css')
<!-- Sweet Alert-->
<link href="{{asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
User
@endslot
@slot('title')
All User
@endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">

                    <div class="col-sm-4">
                        <div class="search-box me-2 mb-2 d-inline-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" id="searchTableList" placeholder="Search...">
                                <i class="bx bx-search-alt search-icon"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <a href="{{ route('add.user') }}" class="btn btn-rounded" id="addProject-btn"
                                style="background-color: #17a2b8; color: white;"><i class="mdi mdi-plus me-1"></i> Add
                                User </a>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <!-- TABLE -->
                <div class="">
                    <div class="table-responsive">
                        <div id="projectList-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table
                                        class="table project-list-table align-middle table-nowrap dt-responsive nowrap w-100 table-borderless dataTable no-footer dtr-inline"
                                        id="projectList-table" aria-describedby="projectList-table_info"
                                        style="width: 1560px;">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 100px">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col"  class="text-wrap" style="width: 6rem;">About</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Age</th>
                                                <th scope="col" class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 135px;" aria-label="Action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($member) && $member->count())
                                            @foreach ($member as $key=> $item)
                                            <tr>
                                                <td> {{ $key+1}} </td>
                                                <td> <img src="{{ asset($item->image) }}"
                                                        style="width:50px; height: 40px;"> </td>
                                                <td> {{ $item->name }} </td>
                                                <td> {{ $item->about }} </td>
                                                <td> {{ $item->phone }} </td>
                                                <td> {{ $item->address }} </td>
                                                <td> {{ $item->age }} </td>
                                                <td>
                                                    <a href="{{ route('edit.user',$item->id) }}"
                                                        class="btn btn-info sm" title="Edit User"> <i
                                                            class="fas fa-edit"></i> </a>
                                                    <a href="{{ route('delete.user',$item->id) }}"
                                                        class="btn btn-danger sm" title="Delete User"> <i
                                                            class="fas fa-trash-alt"></i> </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="6">There are no data. </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{ $member->links() }}
                <!-- Display pagination links -->
                <!-- END TABLE -->
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->
@endsection
