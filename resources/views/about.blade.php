@extends('layout.web-app', ['title'=>"About us"])


@section('content')
    <main>
        <!-- page title area  -->
        <section class="page-title-area breadcrumb-spacing" data-background="assets/img/bg/breadcrumb-bg.jpg"
                 style="background-image: url(&quot;assets/img/bg/breadcrumb-bg.jpg&quot;);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-9">
                        <div class="page-title-wrapper text-center">
                            <h3 class="page-title mb-25">About Us</h3>
                            <div class="breadcrumb-menu">
                                <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin"><a href="{{ route ('home.index') }}"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item trail-end"><span>About Us</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- mission area  -->
        <section class="mission-area pt-120 fix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="kintro-text mr-xs-0 mr-md-0 mr-lg-0 mr-70 mb-30 aos-init" data-aos="fade-left"
                             data-aos-duration="1000">
                            <div class="section-title-wrapper mb-25">
                                <h5 class="section-subtitle mb-20">get to know us</h5>
                                <h2 class="section-title mb-35">Our Mission is to
                                    become the best
                                    agency</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing available in the market for free
                                    uses.</p>
                            </div>
                            <p class="mb-45">Lorem ipsum dolor sit amet nsectetur cing elit. Suspe ndisse suscipit
                                sagittis leo
                                sit met entum is not estibulum dignissim posuere cubilia durae. Leo sit met entum
                                cubilia crae.
                                but also the leap into electronic typesetting.
                            </p>
                            <div class="ktrust-btn">
                                <a href="service.html" class="theme-btn border-btn">Discover more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="kintro-img mb-30 aos-init" data-aos="fade-right" data-aos-duration="1000">
                            <img src="assets/img/about/about-img-6.jpg" class="img-fluid" alt="about-img">
                            <div class="mission-img-text">
                                <h4>We’re committed to
                                    trusted Agency
                                </h4>
                                <a href="project.html">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- mission area end  -->

        <!-- fact area start here -->
        {{--        <section class="fact-area pb-85" data-background="assets/img/bg/fact-bg.jpg" style="background-image: url(&quot;assets/img/bg/fact-bg.jpg&quot;);">--}}
        {{--            <div class="container">--}}
        {{--                <div class="fun-fact text-center pb-80">--}}
        {{--                    <span>Our fun facts</span>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="container">--}}
        {{--                <div class="row gx-0">--}}
        {{--                    <div class="col-lg-3 col-sm-6">--}}
        {{--                        <div class="kfact text-center mb-30 wow fadeInUp" data-wow-duration=".3s" style="visibility: hidden; animation-duration: 0.3s; animation-name: none;">--}}
        {{--                            <div class="kfact-icon">--}}
        {{--                                <i class="flaticon-goal"></i>--}}
        {{--                            </div>--}}
        {{--                            <h2 class="kfact-title counter">3456</h2>--}}
        {{--                            <span>Project completed</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-lg-3 col-sm-6">--}}
        {{--                        <div class="kfact text-center mb-30 wow fadeInUp" data-wow-duration=".6s" style="visibility: hidden; animation-duration: 0.6s; animation-name: none;">--}}
        {{--                            <div class="kfact-icon">--}}
        {{--                                <i class="flaticon-team"></i>--}}
        {{--                            </div>--}}
        {{--                            <h2 class="kfact-title counter">2842</h2>--}}
        {{--                            <span>Happy Client</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-lg-3 col-sm-6">--}}
        {{--                        <div class="kfact text-center mb-30 wow fadeInUp" data-wow-duration=".9s" style="visibility: hidden; animation-duration: 0.9s; animation-name: none;">--}}
        {{--                            <div class="kfact-icon">--}}
        {{--                                <i class="flaticon-talent"></i>--}}
        {{--                            </div>--}}
        {{--                            <h2 class="kfact-title counter">3178</h2>--}}
        {{--                            <span>Total Project</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-lg-3 col-sm-6">--}}
        {{--                        <div class="kfact kfact-last-child text-center mb-30 wow fadeInUp" data-wow-duration="1s" style="visibility: hidden; animation-duration: 1s; animation-name: none;">--}}
        {{--                            <div class="kfact-icon">--}}
        {{--                                <i class="flaticon-group"></i>--}}
        {{--                            </div>--}}
        {{--                            <h2 class="kfact-title counter">1845</h2>--}}
        {{--                            <span>Our Employee</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}
        <!-- fact area end here -->

        <!-- about area start here -->
        <section class="why-we bg-grey pt-125 pb-75 position-relative fix">
            <div class="common-shape-wrapper wow slideInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms"
                 style="visibility: hidden; animation-duration: 1500ms; animation-delay: 0ms; animation-name: none;">
                <div class="common-shape-inner"></div>
            </div>
            <div class="container z-index">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="choose-left mb-40 mr-xs-0 mr-md-0 mr-lg-0 mr-90 aos-init" data-aos="fade-up-right"
                             data-aos-duration="1000">
                            <div class="section-title-wrapper">
                                <h5 class="section-subtitle mb-20">All Categories List</h5>
                                <h2 class="section-title mb-35">Why Choose our agency</h2>
                            </div>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration.
                            </p>
                            <div class="why-tab-list">
                                <ul>
                                    <li><i class="fal fa-check"></i>Refresing to get such a personal touch.</li>
                                    <li><i class="fal fa-check"></i>Duis aute irure dolor in reprehenderit in voluptate.
                                    </li>
                                    <li><i class="fal fa-check"></i>Velit esse cillum dolore eu fugiat nulla pariatur.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="choose-right aos-init" data-aos="fade-left" data-aos-duration="1000">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                            How to process the funtion for development?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                         aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>There are many variations of passages of available but the majority have
                                                suffered alteration in that some form by injected randomised words which
                                                don’t look even as slightly believable.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                            Where should I incorporate my business?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                         aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Web fonts are often terrible for web performance and none of the font
                                                loading strategies are particularly effective to address that. Upcoming
                                                font options may finally deliver on the promise.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                            How there are many variations of passages
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                         aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Front-end and design are remarkably complex these days. That’s why we
                                                invite kind, smart folks from the community to run online workshops for
                                                all of us to learn together. And we have new ones.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end here -->

        <!-- team area start here -->
        {{--        <section class="team-area pt-115 pb-90">--}}
        {{--            <div class="container">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-12">--}}
        {{--                        <div class="section-title-wrapper text-center mb-50">--}}
        {{--                            <h5 class="section-subtitle mb-20">professional people</h5>--}}
        {{--                            <h2 class="section-title mb-35">Meet the team</h2>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="container">--}}
        {{--                <div class="team-active2 swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">--}}
        {{--                    <div class="swiper-wrapper" style="transform: translate3d(-800px, 0px, 0px); transition-duration: 0ms;" id="swiper-wrapper-8c5ba5cd8e515fbf" aria-live="off">--}}
        {{--                        <div class="kteam swiper-slide mb-30" style="width: 370px; margin-right: 30px;" role="group" aria-label="1 / 5">--}}
        {{--                            <div class="kteam-img">--}}
        {{--                                <img src="assets/img/team/team-img-1.jpg" class="img-fluid" alt="team-img">--}}
        {{--                                <div class="kteam-img-social">--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="kteam-text text-center">--}}
        {{--                                <h4 class="kteam-title">sarah albert</h4>--}}
        {{--                                <span class="uppercase">designer</span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="kteam swiper-slide mb-30 swiper-slide-prev" style="width: 370px; margin-right: 30px;" role="group" aria-label="2 / 5">--}}
        {{--                            <div class="kteam-img">--}}
        {{--                                <img src="assets/img/team/team-img-2.jpg" class="img-fluid" alt="team-img">--}}
        {{--                                <div class="kteam-img-social">--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="kteam-text text-center">--}}
        {{--                                <h4 class="kteam-title">Mike Hardson</h4>--}}
        {{--                                <span class="uppercase">developer</span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="kteam swiper-slide mb-30 swiper-slide-active" style="width: 370px; margin-right: 30px;" role="group" aria-label="3 / 5">--}}
        {{--                            <div class="kteam-img">--}}
        {{--                                <img src="assets/img/team/team-img-3.jpg" class="img-fluid" alt="team-img">--}}
        {{--                                <div class="kteam-img-social">--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="kteam-text text-center">--}}
        {{--                                <h4 class="kteam-title">Christine eve</h4>--}}
        {{--                                <span class="uppercase">Programmer</span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="kteam swiper-slide mb-30 swiper-slide-next" style="width: 370px; margin-right: 30px;" role="group" aria-label="4 / 5">--}}
        {{--                            <div class="kteam-img">--}}
        {{--                                <img src="assets/img/team/team-img-4.jpg" class="img-fluid" alt="team-img">--}}
        {{--                                <div class="kteam-img-social">--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="kteam-text text-center">--}}
        {{--                                <h4 class="kteam-title">John Smith</h4>--}}
        {{--                                <span class="uppercase">artist</span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="kteam swiper-slide mb-30" style="width: 370px; margin-right: 30px;" role="group" aria-label="5 / 5">--}}
        {{--                            <div class="kteam-img">--}}
        {{--                                <img src="assets/img/team/team-img-5.jpg" class="img-fluid" alt="team-img">--}}
        {{--                                <div class="kteam-img-social">--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>--}}
        {{--                                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="kteam-text text-center">--}}
        {{--                                <h4 class="kteam-title">melinda albert</h4>--}}
        {{--                                <span class="uppercase">writter</span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>--}}
        {{--            </div>--}}
        {{--        </section>--}}
        <!-- team area end here -->

        <!-- brand area end here -->
        <div class="brand-area2 bg-grey pt-100 pb-100">
            <div class="container">
                <div
                    class="brand-active swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                    <div class="swiper-wrapper align-items-center"
                         style="transform: translate3d(-1200px, 0px, 0px); transition-duration: 0ms;"
                         id="swiper-wrapper-f7a3105f5d952daa1" aria-live="off">
                        <div
                            class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate swiper-slide-duplicate-next"
                            data-wow-delay=".6s" data-swiper-autoplay="10000" data-swiper-slide-index="1"
                            style="width: 210px; visibility: hidden; animation-delay: 0.6s; animation-name: none; margin-right: 30px;"
                            role="group" aria-label="1 / 16">
                            <a href="#"><img src="assets/img/brand/brand-2.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate" data-wow-delay=".9s"
                             data-swiper-autoplay="10000" data-swiper-slide-index="2"
                             style="width: 210px; visibility: hidden; animation-delay: 0.9s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="2 / 16">
                            <a href="#"><img src="assets/img/brand/brand-3.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate"
                             data-wow-delay="1.2s" data-swiper-autoplay="10000" data-swiper-slide-index="3"
                             style="width: 210px; visibility: hidden; animation-delay: 1.2s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="3 / 16">
                            <a href="#"><img src="assets/img/brand/brand-4.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate"
                             data-wow-delay="1.5s" data-swiper-autoplay="10000" data-swiper-slide-index="4"
                             style="width: 210px; visibility: hidden; animation-delay: 1.5s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="4 / 16">
                            <a href="#"><img src="assets/img/brand/brand-5.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate swiper-slide-prev"
                             data-wow-delay="1.8s" data-swiper-autoplay="10000" data-swiper-slide-index="5"
                             style="width: 210px; visibility: hidden; animation-delay: 1.8s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="5 / 16">
                            <a href="#"><img src="assets/img/brand/brand-1.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-active" data-wow-delay=".3s"
                             data-swiper-autoplay="10000" data-swiper-slide-index="0"
                             style="width: 210px; visibility: hidden; animation-delay: 0.3s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="6 / 16">
                            <a href="#"><img src="assets/img/brand/brand-1.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-next" data-wow-delay=".6s"
                             data-swiper-autoplay="10000" data-swiper-slide-index="1"
                             style="width: 210px; visibility: hidden; animation-delay: 0.6s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="7 / 16">
                            <a href="#"><img src="assets/img/brand/brand-2.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp" data-wow-delay=".9s"
                             data-swiper-autoplay="10000" data-swiper-slide-index="2"
                             style="width: 210px; visibility: hidden; animation-delay: 0.9s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="8 / 16">
                            <a href="#"><img src="assets/img/brand/brand-3.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp" data-wow-delay="1.2s"
                             data-swiper-autoplay="10000" data-swiper-slide-index="3"
                             style="width: 210px; visibility: hidden; animation-delay: 1.2s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="9 / 16">
                            <a href="#"><img src="assets/img/brand/brand-4.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp" data-wow-delay="1.5s"
                             data-swiper-autoplay="10000" data-swiper-slide-index="4"
                             style="width: 210px; visibility: hidden; animation-delay: 1.5s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="10 / 16">
                            <a href="#"><img src="assets/img/brand/brand-5.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate-prev"
                             data-wow-delay="1.8s" data-swiper-autoplay="10000" data-swiper-slide-index="5"
                             style="width: 210px; visibility: hidden; animation-delay: 1.8s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="11 / 16">
                            <a href="#"><img src="assets/img/brand/brand-1.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div
                            class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate swiper-slide-duplicate-active"
                            data-wow-delay=".3s" data-swiper-autoplay="10000" data-swiper-slide-index="0"
                            style="width: 210px; visibility: hidden; animation-delay: 0.3s; animation-name: none; margin-right: 30px;"
                            role="group" aria-label="12 / 16">
                            <a href="#"><img src="assets/img/brand/brand-1.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div
                            class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate swiper-slide-duplicate-next"
                            data-wow-delay=".6s" data-swiper-autoplay="10000" data-swiper-slide-index="1"
                            style="width: 210px; visibility: hidden; animation-delay: 0.6s; animation-name: none; margin-right: 30px;"
                            role="group" aria-label="13 / 16">
                            <a href="#"><img src="assets/img/brand/brand-2.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate" data-wow-delay=".9s"
                             data-swiper-autoplay="10000" data-swiper-slide-index="2"
                             style="width: 210px; visibility: hidden; animation-delay: 0.9s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="14 / 16">
                            <a href="#"><img src="assets/img/brand/brand-3.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate"
                             data-wow-delay="1.2s" data-swiper-autoplay="10000" data-swiper-slide-index="3"
                             style="width: 210px; visibility: hidden; animation-delay: 1.2s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="15 / 16">
                            <a href="#"><img src="assets/img/brand/brand-4.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate"
                             data-wow-delay="1.5s" data-swiper-autoplay="10000" data-swiper-slide-index="4"
                             style="width: 210px; visibility: hidden; animation-delay: 1.5s; animation-name: none; margin-right: 30px;"
                             role="group" aria-label="16 / 16">
                            <a href="#"><img src="assets/img/brand/brand-5.png" class="img-fluid" alt="img"></a>
                        </div>
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            </div>
        </div>
        <!-- brand area start here -->
    </main>
@endsection
