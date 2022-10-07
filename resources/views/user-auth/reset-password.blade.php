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

                            <h4 class="card-title mb-4">Change Password</h4>
                            <form method="POST" action="{{ route('user.update.password') }}">
                                <div class="form-group">
                                    <input id="password" placeholder="Enter New Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="off" autofocus>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="confirm_password" placeholder="Enter Confirm Password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" value="{{ old('password') }}" autocomplete="off" autofocus>
                                    @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <span id="passwordcheck" style="color: red;">
                                        <small>**Password is required</small>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Change Password</button>
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

@section('script')
    <script>
        $(document).ready(function () {
            $("#passwordcheck").hide();
            $(document).on('keyup', '#password', function () {
                var passwordValue = $("#password").val();
                if (passwordValue.length == "") {
                    $("#passwordcheck").show();
                    $('#register_btn').attr('disabled','disabled');
                    return false;
                } else if (passwordValue.length < 6 || passwordValue.length > 20) {
                    $("#passwordcheck").show();
                    $("#passwordcheck").html("<small>**length of password must be greater than 6</small>");
                    $('#register_btn').attr('disabled','disabled');
                    return false;
                } else {
                    $("#passwordcheck").hide();
                    $('#register_btn').removeAttr('disabled','disabled');
                }
            });

            $(document).on('keyup', '#confirm_password', function () {
                var passwordValue = $("#confirm_password").val();
                if (passwordValue.length == "") {
                    $("#passwordcheck").show();
                    $('#register_btn').attr('disabled','disabled');
                    return false;
                } else if (document.getElementById('password').value != passwordValue) {
                    $("#passwordcheck").show();
                    $("#passwordcheck").html("<small>**password and confirm password is not match.</small>");
                    $('#register_btn').attr('disabled','disabled');
                } else {
                    $("#passwordcheck").hide();
                    $('#register_btn').removeAttr('disabled','disabled');
                }
            });
        });
    </script>
@endsection
