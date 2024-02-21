@extends('layouts.master-without-nav')

@section('title')
        ERO
@endsection

@section('css')
<!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('build/libs/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/libs/owl.carousel/assets/owl.theme.default.min.css') }}">
@endsection

@section('body')
    <body>
    @endsection
    @section('content')
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden" style="border: 2px solid #d0dddf ">
                            <div class="text-center" style="background-color: #d0dddf ">
                                <div class="row">
                                    <div class="col-xs-12">
                                    <div class="text-primary p-3">
                                        <img src="{{ asset('build/images/profile-img.png') }}" height="100" alt="" />
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter username" autofocus>
                                            @error('email')
                                            <span class="text-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup @error('password') is-invald @enderror">
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter password">
                                                <button class="btn btn-light " type="button"  id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                @error('password')
                                            <span class="text-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="mt-3 d-grid">
                                            <button class="btn waves-light" type="submit" style="background-color: #17a2b8 ; color: white;">Log In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <div class="mt-2 text-center">
                                <div>
                                    <p>© <script>
                                            document.write(new Date().getFullYear())
                                        </script>
                                        Ero
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->
@endsection
