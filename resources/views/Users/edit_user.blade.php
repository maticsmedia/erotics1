@extends('layouts.master')

@section('title')
    Edit User
@endsection

@section('css')
    <!-- bootstrap datepicker -->
    <link href="{{ asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <!-- dropzone css -->
    <link href="{{ asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
        User
        @endslot
        @slot('title')
        Edit User
        @endslot
    @endcomponent

<div class="row">

<div class="col-lg-8 col-xl-12">
<div class="card">
    <div class="card-body">



    <!-- end timeline content-->

    <div class="tab-pane" id="settings">
        <form method="post" action="{{ route('user.update') }}" enctype="multipart/form-data">
        @csrf
            <input type="hidden" name="id" value="{{ $member->id }}">
            <div class="row">


                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $member->name }}" >
                            @error('name')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"  value="{{ $member->phone }}" >
                            @error('phone')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Location</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $member->address }}" >
                            @error('address')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">User Age</label>
                            <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ $member->age }}" >
                            @error('age')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">About User</label>
                            <textarea name="about" class="form-control @error('about') is-invalid @enderror" value="{{ $member->about }}"></textarea>
                            @error('about')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div> --}}


                <div class="col-md-6">
                    <div class="mb-3">
                            <label for="example-fileinput" class="form-label">User Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                    </div>
                </div> <!-- end col -->



                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="example-fileinput" class="form-label"> </label>
                        <img id="showImage" src="{{ (!empty($member->image)) ? url('upload/users/'.$member->image) : url('upload/no_image.png') }}" class="rounded-circle avatar-lg img-thumbnail"
                                alt="profile-image">
                </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <div class="text-end">
                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
            </div>
        </form>
    </div>
    <!-- end settings content-->

                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

<script type="text/javascript">

	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload =  function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});

</script>

@endsection
