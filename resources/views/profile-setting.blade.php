@extends('layout.web-app', ['title'=>"Profile Settings"])

@section('content')
    <section class="bg-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
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
                                <div class="text-center setting-top">
                                    <h1>My Profile</h1>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="nav flex-column nav-pills tabing" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#user-setting" role="tab" aria-controls="v-pills-home" aria-selected="true">User Settings</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#change-password" role="tab" aria-controls="v-pills-profile" aria-selected="false">Change Password</a>
                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#blog-settings" role="tab" aria-controls="v-pills-messages" aria-selected="false">Story I Wrote</a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="user-setting" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="heading-title">
                                                <div class="heading-title-content">
                                                    <label class="heading-title-text">
                                                        Basic Profile
                                                    </label>
                                                    <span class="heading-title-info">Change your basic profile</span>
                                                </div>
                                            </div>
                                            <div class="svq-section-settings">
                                                <div class="form-group">
                                                    <div class="settings-item col-md-12">
                                                        <label class="settings-label">
                                                            Email
                                                        </label>
                                                        <div class="form-action">
                                                            <input disabled class="form-control" name="email" type="email" value="{{ auth()->user()->email ?? '' }}" placeholder="email@example.com">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="svq-section-settings">
                                                <div class="form-group">
                                                    <div class="settings-item col-md-12">
                                                        <label class="settings-label">
                                                            Username
                                                        </label>
                                                        <div class="form-action">
                                                            <input class="form-control" name="username" type="text" value="{{ auth()->user()->username ?? '' }}" placeholder="Enter Username">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-12">
                                                        <label class="settings-label">
                                                            First Name
                                                        </label>
                                                        <input class="form-control" name="firstname" type="text" value="{{ auth()->user()->first_name ?? '' }}" placeholder="Ex: John" accept="">
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <div class="col-12">
                                                        <label class="settings-label">
                                                            Last Name
                                                        </label>
                                                        <input class="form-control" name="lastname" type="text" value="{{ auth()->user()->last_name ?? '' }}" placeholder="Ex: Doe" accept="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="settings-item col-md-12">
                                                        <label class="settings-label">
                                                            Website
                                                        </label>
                                                        <div class="form-action">
                                                            <input class="form-control" name="website" type="text" value="{{ auth()->user()->website ?? '' }}" placeholder="http(s)://your-website.com" accept="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="settings-item col-md-12">
        <label class="settings-label">
        Bio                            </label>
                                                        <div class="form-action">
                                                            <textarea class="form-control" name="bio" rows="3" placeholder="Write something about you" cols="50">{{ auth()->user()->bio ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row scss-empty">
                                                    <div class="col-md-6">
                                                        <label class="settings-label">
                                                            Country
                                                        </label>
                                                        <select disabled id="country" name="country" class="form-control  @error('country') is-invalid @enderror">
                                                            <option disabled="disabled" selected> -- Select Country --</option>
                                                            @if(isset($countries) && $countries)
                                                                @foreach($countries as $country)
                                                                    <option value="{{ $country->id }}" {{ auth()->user()->country_id==$country->id?'selected':'' }} data-id="{{ $country->name }}">{{ $country->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="settings-label">
                                                            City
                                                        </label>
                                                        <input disabled class="form-control" name="city" type="text" value="{{ auth()->user()->getCity->name ?? '' }}" placeholder="In what city do you live?" accept="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="svq-section-settings">
                                                <div class="heading-title">
                                                    <div class="heading-title-content">
                                                        <label class="heading-title-text">
                                                            Social
                                                        </label>
                                                        <span class="heading-title-info">Change your social links</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="settings-item col-md-12">
        <label class="settings-label">
        Facebook URL                            </label>
                                                        <div class="form-action">
                                                            <input class="form-control" name="facebook" type="text" value="{{ auth()->user()->facebook_url ?? '' }}" placeholder="https://facebook.com/USERNAME" accept="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="settings-item col-md-12">
        <label class="settings-label">
        Instagram URL                            </label>
                                                        <div class="form-action">
                                                            <input class="form-control" name="instagram" type="text" value="{{ auth()->user()->instagram_url ?? '' }}" placeholder="https://instagram.com/USERNAME" accept="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="settings-item col-md-12">
        <label class="settings-label">
        Twitter URL                            </label>
                                                        <div class="form-action">
                                                            <input class="form-control" name="twitter" type="text" value="{{ auth()->user()->twitter_url ?? '' }}" placeholder="https://twitter.com/USERNAME" accept="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="settings-item col-md-12">
        <label class="settings-label">
        Linkedin URL                            </label>
                                                        <div class="form-action">
                                                            <input class="form-control" name="linkedin" type="text" value="{{ auth()->user()->linkedin_url ?? '' }}" placeholder="https://www.linkedin.com/in/USERNAME" accept="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="button-align">
                                                <button type="submit" class="btn btn-primary ">
                                                    Save settings
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <form action="{{ route('user.update.password') }}" method="post">
                                            <div class="svq-section-settings">
                                                <div class="heading-title">
                                                    <div class="heading-title-content">
                                                        <label class="heading-title-text">
                                                            <span class="svq-icon icon-shield-check icon--x24"></span>
                                                            Security                    </label>
                                                        <span class="heading-title-info">Change your password</span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Old password</label>
                                                    <input class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password" type="password" placeholder="Enter old password">
                                                    @error('old_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>New password</label>
                                                    <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Enter new password">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Repeat password</label>
                                                    <input class="form-control @error('password') is-invalid @enderror" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm password">
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
                                            <div class="button-align">
                                                <button type="submit" class="btn btn-primary" id="register_btn">
                                                    Change Password
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="blog-settings" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <div class="wrapper__list__article">
                                            <h4 class="border_section">Your Guest Posts</h4>
                                            <div class="wrapp__list__article-responsive">
                                                @isset($blogs)
                                                    @foreach($blogs as $blog)
                                                        <!-- Post Article List -->
                                                        <div class="card__post card__post-list card__post__transition mt-30">
                                                            <div class="row ">
                                                                <div class="col-md-5">
                                                                    <div class="card__post__transition">
                                                                        <a href="{{ route ('blog.details', [$blog['slug']]) }}">
                                                                            <img src="{{ asset($blog['blog_image']) }}" class="img-fluid w-100"
                                                                                 alt="Latest Blog Image">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-7 my-auto pl-0">
                                                                    <div class="card__post__body ">
                                                                        <div class="card__post__content  ">
                                                                            <div class="card__post__category ">
                                                                                {{ $blog['category']->category_name }}
                                                                            </div>
                                                                            <div class="card__post__author-info mb-2">
                                                                                <ul class="list-inline">
                                                                                    <li class="list-inline-item">
                                                                    <span class="text-primary">
                                                                        by {{ $blog['arthur'] }}
                                                                    </span>
                                                                                    </li>
                                                                                    <li class="list-inline-item">
                                                                    <span class="text-dark text-capitalize">
                                                                        {{ Carbon\Carbon::parse($blog['created_at'])->format('M d, Y') }}
                                                                    </span>
                                                                                    </li>

                                                                                </ul>
                                                                            </div>
                                                                            <div class="card__post__title">
                                                                                <h5>
                                                                                    <a href="{{ route ('blog.details', [$blog['slug']]) }}">
                                                                                        {{ $blog['title'] }}
                                                                                    </a>
                                                                                </h5>
                                                                                <p class="d-none d-lg-block d-xl-block mb-0">
                                                                                    {{ \Illuminate\Support\Str::of($blog['excerpt'])->words(25) }}
                                                                                </p>

                                                                            </div>

                                                                            <div class="delete-edit-links">
                                                                                <a onclick="confirm()" href="{{ route('blog.delete', [$blog['id']]) }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                                    </svg>
                                                                                </a>
                                                                                <a href="{{ route('blog.writeBlog', [$blog['id']]) }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                                                    </svg>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    @endisset
                                                </div>
                                            </div>
                                            <div class="mx-auto">
                                                <!-- Pagination -->
                                                <div class="pagination-area">
                                                    <div class="pagination wow fadeIn animated" data-wow-duration="2s" data-wow-delay="0.5s"
                                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.5s; animation-name: fadeIn;">
                                                        {{ $blogs->links('vendor.pagination.bootstrap-4') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script>
        $(document).ready(function () {

            function confirm(){
                alert("Are you sure that you want delete this blog!")
            }
            $("#passwordcheck").hide();
            $('#register_btn').attr('disabled','disabled');
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
