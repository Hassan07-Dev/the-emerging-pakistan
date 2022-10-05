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

                            <h4 class="card-title mb-4">Forgot Password</h4>
                            <form method="POST" action="{{ route('user.forgot.password.post') }}">
                                <div class="form-group">
                                    <input id="username" placeholder="Enter Username/Email" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="off" autofocus>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="text-center mt-4"><a href="{{ route ('user.login') }}">Login</a> / <a href="{{ route ('user.signup') }}">Register</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
