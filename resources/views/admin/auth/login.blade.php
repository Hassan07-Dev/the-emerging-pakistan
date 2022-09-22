@extends('layout.admin-login', ['title'=>"Admin Login"])


@section('content')
    <div class="login-box" style="width: 460px !important;">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>The Emerging</b>Pakistan</a>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
                        {{ Session::get('success')     }}
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
                        {{ Session::get('error')     }}
                    </div>
                @endif
                <p class="login-box-msg">Sign in to start your session</p>
                    <form action="{{ route('admin.login') }}"  method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="e.g abc@example.com">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" id="login-btn" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

{{--                <div class="social-auth-links text-center mt-2 mb-3">--}}
{{--                    <a href="#" class="btn btn-block btn-primary">--}}
{{--                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
{{--                    </a>--}}
{{--                    <a href="#" class="btn btn-block btn-danger">--}}
{{--                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+--}}
{{--                    </a>--}}
{{--                </div>--}}
                <!-- /.social-auth-links -->

{{--                <p class="mb-1">--}}
{{--                    <a href="forgot-password.html">I forgot my password</a>--}}
{{--                </p>--}}
{{--                <p class="mb-0">--}}
{{--                    <a href="register.html" class="text-center">Register a new membership</a>--}}
{{--                </p>--}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
