@extends('layouts.master')

@section('title') @lang('translation.Profile') @endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Profile @endslot
@slot('title') Admin @endslot
@endcomponent
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>




<div class="row">
    <div class="col-xl-5">
        <div class="card overflow-hidden">
            <div class="bg-primary-subtle">
                <div class="row">
                </div>
            </div>
            <div class="card-body pt-2">
                <div class="row">
                    <div class="mb-3" style="background-color: #17a2b8">
                        <img src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}" alt="profile-image" class="rounded-circle avatar-lg img-thumbnail">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Full Name :</th>
                                    <td>{{ $adminData->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">E-mail :</th>
                                    <td>{{ $adminData->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone:</th>
                                    <td>{{ $adminData->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Location :</th>
                                    <td>{{ $adminData->location }}</td>
                                </tr>
                            </tbody>

                        </table>
                        <div class="row">
                            <div class="col-6">
                                <a href="" class="btn waves-light" type="submit" style="background-color: #17a2b8 ; color: white;" btn-sm data-bs-toggle="modal" data-bs-target=".update-profile">Update Profile</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end card -->

    </div>
</div>
<!-- end row -->

<!--  Update Profile example -->
<div class="modal fade update-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">UpdateProfile</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data" id="update-profile">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $adminData->name }}" id="name" name="name" autofocus placeholder="Change name">
                    </div>

                    <div class="mb-3">
                        <label for="useremail" class="form-label">E-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail" value="{{  $adminData->email }}" name="email" placeholder="Change email" autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $adminData->phone }}" id="phone" name="phone" autofocus placeholder="Change phone">
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" value="{{ $adminData->location }}" id="location" name="location" autofocus placeholder="Change location">
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                                <label for="example-fileinput" class="form-label">Profile Image</label>
                                <input type="file" name="photo" id="image" class="form-control">
                            </div>
                        </div> <!-- end col -->


                        <div class="col-md-12">
                        <div class="mb-3">
                                <label for="example-fileinput" class="form-label"> </label>
                                <img id="showImage" src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">
                        </div>
                        </div> <!-- end col -->

                        <div class="mt-3 d-grid">
                            <button class="btn waves-light" type="submit" style="background-color: #17a2b8 ; color: white;" >Update Profile</button>
                        </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
