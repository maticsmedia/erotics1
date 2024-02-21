@extends('layouts.master')

@section('title')
        Dashboard
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Owner @endslot
@endcomponent



<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body" style="background-color: #9FE2BF; " >
                <div class="row" >
                    <div class="col-lg-4" >
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                @php
                                $id = Auth::user()->id;
                                $adminData = App\Models\User::find($id);
                                @endphp
                                <img src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}" alt="" class="avatar-md rounded-circle img-thumbnail">
                            </div>
                            <div class="flex-grow-1 align-self-center">
                                <div class="text-muted">
                                    <h3 class="mb-1" style="color: black">{{$adminData->name}}</h3>
                                    <p class="mb-0" style="color: black">{{$adminData->phone}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
<!-- end row -->



    <div class="col-xl-12">
        <div class="row">
            <div class="col-sm-3">
                <div class="card" style="background-color: #5bc0de" >
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary-subtle text-white font-size-18">
                                    <i class="dripicons-user-group"></i>
                                </span>
                            </div>
                            <h5 class="font-size-20 text-white mb-0">Total Users</h5>
                        </div>
                        <div class="text-white mt-4">
                            @php
                                $totalUsers = App\Models\Member::count();
                            @endphp
                            <h3>{{$totalUsers}}</h3>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-sm-3">
            <div class="card" style="background-color: #f0ad4e " >
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="avatar-xs me-3">
                            <span class="avatar-title rounded-circle bg-primary-subtle text-white font-size-18">
                                <i class="bx bx-user-check"></i>
                            </span>
                        </div>
                        <h5 class="font-size-20 text-white mb-0">Verified Users</h5>
                    </div>
                    <div class="text-white mt-4">
                        @php
                            $vipUsers = App\Models\Member::where('verified', true)->count();
                        @endphp
                        <h3>{{$vipUsers}}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card" style="background-color: #22bb33 " >
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="avatar-xs me-3">
                            <span class="avatar-title rounded-circle bg-primary-subtle text-white font-size-18">
                                <i class="bx bx-user-check"></i>
                            </span>
                        </div>
                        <h5 class="font-size-20 text-white mb-0">VIP Users</h5>
                    </div>
                    <div class="text-white mt-4">
                        @php
                            $totalUsers = App\Models\Member::where('vip', true)->count();
                        @endphp
                        <h3>{{$totalUsers}}</h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-3">
            <div class="card" style="background-color: #bb2124 " >
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="avatar-xs me-3">
                            <span class="avatar-title rounded-circle bg-primary-subtle text-white font-size-18">
                                <i class="bx bx-user-check"></i>
                            </span>
                        </div>
                        <h5 class="font-size-20 text-white mb-0">Disabled Users</h5>
                    </div>
                    <div class="text-white mt-4">
                        @php
                            $totalUsers = App\Models\Member::count();
                        @endphp
                        <h3>{{$totalUsers}}</h3>
                    </div>
                </div>
            </div>
        </div>


        </div>
        <!-- end row -->
    </div>
{{-- </div> --}}

<!-- end row -->

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Saas dashboard init -->
<script src="{{ asset('build/js/pages/saas-dashboard.init.js') }}"></script>

@endsection
