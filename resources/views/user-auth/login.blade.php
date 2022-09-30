@extends('layout.web-app', ['title'=>"Login"])


@section('content')
    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Login -->
                    <div class="card mx-auto" style="max-width: 380px;">

                        <div class="card-body">
                            @if( session()->has('error') )
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Error!</strong> {{ session()->get('error') }}
                                </div>
                            @endif

                            @if( session()->has('success') )
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Success!</strong> {{ session()->get('success') }}
                                </div>
                            @endif

                            <h4 class="card-title mb-4">Sign in</h4>
                            <form method="POST" action="{{ route('user.login.post') }}">
                                <a href="#" class="btn btn-facebook btn-block mb-2 text-white"> <i class="fa fa-facebook"></i> &nbsp;
                                    Sign in with Facebook
                                </a>
                                <a href="#" class="btn btn-primary btn-block mb-4"> <i class="fa fa-google"></i> &nbsp;
                                    Sign in with Google
                                </a>
                                <div class="form-group">
                                    <input id="username" placeholder="Enter Username/Email" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="off" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> <!-- form-group// -->

                                <div class="form-group">
                                    <a href="#" class="float-right">Forgot password?</a>
                                    <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="custom-control-label"> Remember </span>
                                    </label>
                                </div> <!-- form-group form-check .// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Login</button>
                                </div> <!-- form-group// -->
                            </form>
                        </div> <!-- card-body.// -->
                    </div> <!-- card .// -->

                    <p class="text-center mt-4">Don't have account? <a href="#">Sign up</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
