@extends('layout.web-app', ['title'=>"Contact us"])


@section('content')
    <main>
        <!-- page title area  -->
        <section class="page-title-area breadcrumb-spacing" data-background="assets/img/bg/breadcrumb-bg.jpg" style="background-image: url(&quot;assets/img/bg/breadcrumb-bg.jpg&quot;);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-9">
                        <div class="page-title-wrapper text-center">
                            <h3 class="page-title mb-25">Contact</h3>
                            <div class="breadcrumb-menu">
                                <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin"><a href="{{ route ('home.index') }}"><span>Home</span></a></li>
                                        <li class="trail-item trail-end"><span>Contact</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- contact area  -->
        <section class="contact-area pt-120 pb-80 fix">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-5 col-xl-6 col-lg-6">
                        <div class="section-title-wrapper mb-15">
                            <h5 class="section-subtitle mb-20">contact with us</h5>
                            <h2 class="section-title">Speak with our
                                consultant</h2>
                        </div>
                        <div class="contact-info mr-50 mr-xs-0  mr-md-0">
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-info-icon">
                                    <a href="#"><i class="fad fa-comments"></i></a>
                                </div>
                                <div class="contact-info-text mt-10">
                                    <span>Call Anytime</span>
                                    <h5><a href="tell:926668880000">92 666 888 0000</a></h5>
                                </div>
                            </div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-info-icon">
                                    <a href="#"><i class="fal fa-envelope"></i></a>
                                </div>
                                <div class="contact-info-text mt-10">
                                    <span>send email</span>
                                    <h5><a href="mailto:needhelp@company.com">needhelp@company.com</a> </h5>
                                </div>
                            </div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-info-icon">
                                    <a href="#"><i class="fal fa-map-marker-alt"></i></a>
                                </div>
                                <div class="contact-info-text mt-10">
                                    <span>visit office</span>
                                    <h5><a href="#">86 Road Broklyn Street, New York</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-6 col-lg-6">
                        <div class="contact-form">
                            <form action="https://www.devsnews.com/template/kimox/kimox/mail.php" id="contact-form" method="POST">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-20">
                                        <input name="name" type="text" placeholder="Your Name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-20">
                                        <input name="email" type="email" placeholder="Email Adress">
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-20">
                                        <input name="phone" type="text" placeholder="Phone">
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-20">
                                        <input name="subject" type="text" placeholder="Subject">
                                    </div>
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 mb-20">
                                        <textarea placeholder="Write Massage" name="massage"></textarea>
                                    </div>
                                    <div class="col-xxl-12 col-xl-12 mb-20">
                                        <button type="submit" class="theme-btn border-btn">Send a message</button>
                                    </div>
                                </div>
                            </form>
                            <p class="ajax-response"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact area end -->

        <!-- cta area  -->
        <section class="cta-area mb--60 z-index aos-init fix" data-aos="fade-up">
            <div class="container">
                <div class="cta-bg bg-theme">
                    <div class="cta-number">
                        <div class="cta-number-icon mr-30">
                            <i class="flaticon-reaction"></i>
                        </div>
                        <div class="cta-number-text fix">
                            <span class="uppercase">Get a Free Consultation</span>
                            <h3><a href="tell:6668880000">666 888 0000</a></h3>
                        </div>
                    </div>
                    <div class="cta-description">
                        <p>Lorem ipsum dolor sit amet nsectetur
                            cing elituspe ndisse suscipit.</p>
                    </div>
                    <div class="cta-btn text-lg-end text-start">
                        <a href="service.html" class="theme-btn black-btn">Discover more</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta area end  -->

        <!-- contact map area  -->
{{--        <div class="contact-map">--}}
{{--            <div id="contact-map">--}}
{{--                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14596.901068434778!2d90.3654296!3d23.8461333!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1625139542728!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- contact map area end  -->
    </main>
@endsection
