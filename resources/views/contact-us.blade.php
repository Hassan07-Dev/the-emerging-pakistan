@extends('layout.web-app', ['title'=>"Contact us"])


@section('content')
    <div class="page-content bg-white">
        <div class="content-block">
            <!-- About Us -->
            <div class="section-full bg-white content-inner-2 contact-form">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <h1 class="contact-title text-center">Contact Us</h1>
                            <div class="banner-map">
                                <div id="map3" class="m-b30" style="width:100%;height:600px; border-radius:15px;"></div>
                            </div>
                            <div class="max-w700 m-auto">
                                <p class="first-content">A usce sed ligula velit. Aliquam viver ultricies  molestie ultricies. Donec etn turpis consectet aliquam non nisiassa lobortis quis sagittis porttitor. Vivamus tempus vulputate miquis hendrerit. Nunc fringilla scelerisque commodo. Donec quis erat diam. Proin magna sapien, lobortis quis pulvinar vitae, iaculis at diam. Etiam id orci quis mi fermentum feugiat. at diam. Etiam id orci quis mi fermentum feugiat. Viverra ultricies diam molestie ultricies.</p>
                                <div class="dzFormMsg"></div>
                                <form method="post" class="dzForm" action="script/contact.php">
                                    <input type="hidden" value="Contact" name="dzToDo">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input name="dzName" type="text" required class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input name="dzEmail" type="email" class="form-control" required  placeholder="Email" >
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <textarea name="dzMessage" rows="4" class="form-control" required placeholder="Add Your Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="<!-- Put reCaptcha Site Key -->" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                                <input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <button name="submit" type="submit" value="Submit" class="btn radius-xl">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Us End -->
        </div>
        <!-- contact area END -->
    </div>
@endsection
