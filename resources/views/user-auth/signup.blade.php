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
                            <header class="mb-4">
                                <h4 class="card-title">Sign up</h4>
                            </header>
                            <form method="POST" action="{{ route('user.signup.post') }}">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control @error('usernames') is-invalid @enderror" name="usernames" value="{{ old('usernames') }}" id="usernames"
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
                                                    <option {{ old ('country') == $country->id?'selected':'' }} value="{{ $country->id }}" data-id="{{ $country->name }}">{{ $country->name }}</option>
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
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Create password</label>
                                        <input class="form-control  @error('usernames') is-invalid @enderror" name="password" type="password" placeholder="Enter password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Repeat password</label>
                                        <input class="form-control  @error('usernames') is-invalid @enderror" name="confirm_password" type="password" placeholder="Confirm password">
                                    </div>
                                    @error('password')
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
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox"> <input type="checkbox"
                                                                                          class="custom-control-input"
                                                                                          checked="">
                                        <span class="custom-control-label"> I am agree with <a href="#">terms and
                                                    contitions</a> </span>
                                    </label>
                                </div>
                            </form>
                        </article><!-- card-body.// -->
                    </div>
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
            let usernameError = true;
            $(document).on('keyup', '#usernames', function () {
                validateUsername();
            });

            function validateUsername() {
                let usernameValue = $("#usernames").val();
                if (usernameValue.length == "") {
                    $("#usercheck").show();
                    usernameError = false;
                    $('#register_btn').attr('disabled','disabled');
                    return false;
                } else if (usernameValue.length < 3 || usernameValue.length > 10) {
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

            $(document).on('change', '#country', function () {
                var idCountry = this.value;
                $("#city").html('');
                $.ajax({
                    {{--url: "{{ route('user.fetch.citiess')}}",--}}
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#city').html('<option value=""> -- Select City -- </option>');
                        $.each(result.states, function (key, value) {
                            $("#city").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
