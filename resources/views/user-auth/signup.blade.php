@extends('layout.web-app', ['title'=>"Home"])


@section('content')
    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- register -->
                    <!-- Form Register -->

                    <div class="card mx-auto" style="max-width:520px;">
                        <article class="card-body">
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
                            <header class="mb-4">
                                <h4 class="card-title">Sign up</h4>
                            </header>
                            <form method="POST" action="{{ route('user.signup.post') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control @error('usernames') is-invalid @enderror" name="username" value="{{ old('username') }}" id="usernames"
                                           placeholder="Enter username">
                                    <span id="usercheck" style="color: red;">
                                        <small>**Username is required</small>
                                    </span>
                                    @error('usernames')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>First name</label>
                                        <input type="text" name="first_name" class="form-control  @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="Enter first name">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col form-group">
                                        <label>Last name</label>
                                        <input type="text" name="last_name" class="form-control  @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="Enter last name">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Enter email">
                                    <small class="form-text text-muted">We'll never share your email with anyone
                                        else.</small>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input" checked="" type="radio" name="gender"
                                               value="Male" {{ old ('gender') == 'Male'?'checked':'' }}>
                                        <span class="custom-control-label"> Male </span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input" type="radio" name="gender" value="Female" {{ old ('gender') == 'Female'?'checked':'' }}>
                                        <span class="custom-control-label"> Female </span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input" type="radio" name="gender" value="Other" {{ old ('gender') == 'Other'?'checked':'' }}>
                                        <span class="custom-control-label"> Other </span>
                                    </label>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <select id="country" name="country" class="form-control  @error('country') is-invalid @enderror">
                                            <option disabled="disabled" selected> -- Select Country --</option>
                                            @if(isset($countries) && $countries)
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}" data-id="{{ $country->name }}">{{ $country->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <select id="city" name="city" class="form-control  @error('city') is-invalid @enderror">
                                            <option disabled="disabled" selected> -- Select City --</option>
                                        </select>
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Create password</label>
                                        <input class="form-control @error('usernames') is-invalid @enderror" id="password" name="password" type="password" placeholder="Enter password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Repeat password</label>
                                        <input class="form-control @error('usernames') is-invalid @enderror" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm password">
                                    </div>
                                    <span id="passwordcheck" style="color: red;">
                                        <small>**Password is required</small>
                                    </span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox"> <input type="checkbox" name="term_condition" class="custom-control-input @error('term_condition') is-invalid @enderror">
                                        <span class="custom-control-label"> I am agree with <a href="#">terms and contitions</a> </span>
                                    </label>
                                    @error('term_condition')
                                         <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="register_btn" class="btn btn-primary btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </article><!-- card-body.// -->
                    </div>
                    <p class="text-center mt-4">Already have account? <a href="{{ route ('user.login') }}">Log in</a></p>
                    <!-- end register -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#usercheck").hide();
            $("#passwordcheck").hide();
            $(document).on('keyup', '#usernames', function () {
                validateUsername();
            });

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

            function validateUsername() {
                let usernameValue = $("#usernames").val();
                if (usernameValue.length == "") {
                    $("#usercheck").show();
                    usernameError = false;
                    $('#register_btn').attr('disabled','disabled');
                    return false;
                } else if (usernameValue.length < 3 || usernameValue.length > 20) {
                    $("#usercheck").show();
                    $("#usercheck").html("<small>**length of username must be between 3 and 10</small>");
                    $('#register_btn').attr('disabled','disabled');
                    usernameError = false;
                    return false;
                } else if(/\s/.test(usernameValue)){
                    $("#usercheck").show();
                    $("#usercheck").html("<small>**username should be without space.</small>");
                    $('#register_btn').attr('disabled','disabled');
                    usernameError = false;
                    return false;
                }else if(!usernameValue.match(/^[A-Za-z0-9._]+$/)){
                    $("#usercheck").show();
                    $("#usercheck").html("<small>**username should be without any special characters.</small>");
                    $('#register_btn').attr('disabled','disabled');
                    usernameError = false;
                    return false;
                }else {
                    $("#usercheck").hide();
                    $('#register_btn').removeAttr('disabled','disabled');
                }
            }

            function check_pass() {
                let passwordValue = $("#usernames").val();
                if (passwordValue.length == "") {
                    $("#passwordcheck").show();
                    $('#register_btn').attr('disabled','disabled');
                    return false;
                } else if (passwordValue.length < 6 || passwordValue.length > 20) {
                    $("#passwordcheck").show();
                    $("#passwordcheck").html("<small>**length of password must be greater than 6</small>");
                    $('#register_btn').attr('disabled','disabled');
                    return false;
                }
                if(passwordValue.length > 3) {
                    if (document.getElementById('password').value == passwordValue) {
                        $("#passwordcheck").show();
                        $("#passwordcheck").html("<small>**password and confirm password is not match.</small>");
                        $('#register_btn').attr('disabled','disabled');
                    } else {
                        document.getElementById('submit').disabled = true;
                    }
                }
            }

            $(document).on('change', '#country', function () {
                var idCountry = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{ route('user.fetch.citiess')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (result) {

                        if(result.status == true) {
                            $('#city').html('<option value=""> -- Select City -- </option>');
                            if(result.data.length > 0){
                                $.each(result.data, function (key, value) {
                                    $("#city").append('<option value="' + value
                                        .id + '">' + value.name + '</option>');
                                });
                            } else {
                                toastr.error('Not found any city!');
                            }
                        } else{
                            toastr.error(result.message);
                        }
                    }
                });
            });
        });
    </script>
@endsection
