@extends('layout.web-app', ['title'=>"Services"])


@section('content')
    <main>
        <!-- page title area  -->
        <section class="page-title-area breadcrumb-spacing" data-background="assets/img/bg/breadcrumb-bg.jpg" style="background-image: url(&quot;assets/img/bg/breadcrumb-bg.jpg&quot;);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-9">
                        <div class="page-title-wrapper text-center">
                            <h3 class="page-title mb-25">Services</h3>
                            <div class="breadcrumb-menu">
                                <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin"><a href="{{ route ('home.index') }}l"><span>Home</span></a></li>
                                        <li class="trail-item trail-end"><span>Services</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- service area start here -->
        <section class="service-2 pt-120 pb-90">
            <div class="container">
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-xl-3 col-lg-3 col-sm-6">
                            <div class="kservice-2 mb-30 wow fadeInUp" data-wow-duration=".3s" style="visibility: hidden; animation-duration: 0.3s; animation-name: none;">
                                <div class="kservice-text-2">
                                    <span>Services</span>
                                    <h4 class="kservice-title-2"><a href="{{ route ('services.details', [$service->slug]) }}">{{ $service->service_name }}</a></h4>
                                    <i class="{{ $service->service_logo }}"></i>
                                </div>
                                <div class="kservice-img-2">
                                    <img src="{{ asset ($service->service_image) }}" class="img-fluid" alt="service-img">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- service area end here -->

        <!-- about area start here -->
        <section class="why-we bg-grey pt-120 pb-125 pb-md-110 position-relative">
            <div class="common-shape-wrapper wow slideInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: hidden; animation-duration: 1500ms; animation-delay: 0ms; animation-name: none;">
                <div class="common-shape-inner wow slideInleft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: hidden; animation-duration: 1500ms; animation-delay: 0ms; animation-name: none;"></div>
            </div>
            <div class="container z-index">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="provide-thumb">
                            <img src="assets/img/about/about-img-7.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="provide-content">
                            <div class="section-title-wrapper mb-25">
                                <h5 class="section-subtitle mb-20">All Categories List</h5>
                                <h2 class="section-title mb-35">We provide a best <br>
                                    services
                                </h2>
                                <p>There are many variations of pass of lorem ipsum available but the majority have suffered alteration in some form.</p>
                            </div>
                            <p>Injected humour randomised words which don't look even slightly believable you need to be sure there isn't anything embarrassing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end here -->

        <!-- service area start here -->
        <section class="service-area service-area2 pt-115 pb-100" data-background="assets/img/service/service-bg.jpg" style="background-image: url(&quot;assets/img/service/service-bg.jpg&quot;);">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xxl-6 col-lg-6">
                        <div class="kservice-text mb-50 aos-init" data-aos="fade-right" data-aos-duration="1000">
                            <h5 class="kservice-text-subtitle mb-15">All Categories List</h5>
                            <h2 class="kservice-text-title mb-40">The Services <br>We’re Offering</h2>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-lg-6">
                        <div class="kservice-text mb-50 aos-init" data-aos="fade-right" data-aos-duration="1000">
                            <p class="mb-45 mt-35 mt-md-0 mt-xs-0">There are many variations of passages of lorem ipsum available but the majority have suffered alteration in some form by injected humour.</p>
                        </div>
                    </div>
                </div>

                <div class="row custom-mar-20 aos-init" data-aos="fade-down" data-aos-duration="1000">
                    @foreach($services as $service)
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-sm-6 custom-pad-20">
                            <div class="kservice text-center mb-20">
                                <div class="kservice-icon">
                                    <i class="{{ $service->service_logo }}"></i>
                                </div>
                                <div class="kservice-content">
                                    <h5 class="kservice-content-title"><a href="{{ route ('services.details', [$service->slug]) }}">{{ $service->service_name }}</a></h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- service area end here -->

        <!-- brand area end here -->
        <div class="brand-area3  pt-100 pb-100">
            <div class="container">
                <div class="brand-active swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                    <div class="swiper-wrapper align-items-center" style="transform: translate3d(-1200px, 0px, 0px); transition-duration: 0ms;" id="swiper-wrapper-79e15152bce3f75f" aria-live="off"><div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate swiper-slide-duplicate-next" data-wow-delay=".6s" data-swiper-autoplay="10000" data-swiper-slide-index="1" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 0.6s; animation-name: none;" role="group" aria-label="1 / 16">
                            <a href="#"><img src="assets/img/brand/brand-2.png" class="img-fluid" alt="img"></a>
                        </div><div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate" data-wow-delay=".9s" data-swiper-autoplay="10000" data-swiper-slide-index="2" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 0.9s; animation-name: none;" role="group" aria-label="2 / 16">
                            <a href="#"><img src="assets/img/brand/brand-3.png" class="img-fluid" alt="img"></a>
                        </div><div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate" data-wow-delay="1.2s" data-swiper-autoplay="10000" data-swiper-slide-index="3" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 1.2s; animation-name: none;" role="group" aria-label="3 / 16">
                            <a href="#"><img src="assets/img/brand/brand-4.png" class="img-fluid" alt="img"></a>
                        </div><div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate" data-wow-delay="1.5s" data-swiper-autoplay="10000" data-swiper-slide-index="4" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 1.5s; animation-name: none;" role="group" aria-label="4 / 16">
                            <a href="#"><img src="assets/img/brand/brand-5.png" class="img-fluid" alt="img"></a>
                        </div><div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate swiper-slide-prev" data-wow-delay="1.8s" data-swiper-autoplay="10000" data-swiper-slide-index="5" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 1.8s; animation-name: none;" role="group" aria-label="5 / 16">
                            <a href="#"><img src="assets/img/brand/brand-1.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-active" data-wow-delay=".3s" data-swiper-autoplay="10000" data-swiper-slide-index="0" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 0.3s; animation-name: none;" role="group" aria-label="6 / 16">
                            <a href="#"><img src="assets/img/brand/brand-1.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-next" data-wow-delay=".6s" data-swiper-autoplay="10000" data-swiper-slide-index="1" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 0.6s; animation-name: none;" role="group" aria-label="7 / 16">
                            <a href="#"><img src="assets/img/brand/brand-2.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp" data-wow-delay=".9s" data-swiper-autoplay="10000" data-swiper-slide-index="2" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 0.9s; animation-name: none;" role="group" aria-label="8 / 16">
                            <a href="#"><img src="assets/img/brand/brand-3.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp" data-wow-delay="1.2s" data-swiper-autoplay="10000" data-swiper-slide-index="3" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 1.2s; animation-name: none;" role="group" aria-label="9 / 16">
                            <a href="#"><img src="assets/img/brand/brand-4.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp" data-wow-delay="1.5s" data-swiper-autoplay="10000" data-swiper-slide-index="4" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 1.5s; animation-name: none;" role="group" aria-label="10 / 16">
                            <a href="#"><img src="assets/img/brand/brand-5.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate-prev" data-wow-delay="1.8s" data-swiper-autoplay="10000" data-swiper-slide-index="5" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 1.8s; animation-name: none;" role="group" aria-label="11 / 16">
                            <a href="#"><img src="assets/img/brand/brand-1.png" class="img-fluid" alt="img"></a>
                        </div>
                        <div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate swiper-slide-duplicate-active" data-wow-delay=".3s" data-swiper-autoplay="10000" data-swiper-slide-index="0" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 0.3s; animation-name: none;" role="group" aria-label="12 / 16">
                            <a href="#"><img src="assets/img/brand/brand-1.png" class="img-fluid" alt="img"></a>
                        </div><div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate swiper-slide-duplicate-next" data-wow-delay=".6s" data-swiper-autoplay="10000" data-swiper-slide-index="1" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 0.6s; animation-name: none;" role="group" aria-label="13 / 16">
                            <a href="#"><img src="assets/img/brand/brand-2.png" class="img-fluid" alt="img"></a>
                        </div><div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate" data-wow-delay=".9s" data-swiper-autoplay="10000" data-swiper-slide-index="2" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 0.9s; animation-name: none;" role="group" aria-label="14 / 16">
                            <a href="#"><img src="assets/img/brand/brand-3.png" class="img-fluid" alt="img"></a>
                        </div><div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate" data-wow-delay="1.2s" data-swiper-autoplay="10000" data-swiper-slide-index="3" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 1.2s; animation-name: none;" role="group" aria-label="15 / 16">
                            <a href="#"><img src="assets/img/brand/brand-4.png" class="img-fluid" alt="img"></a>
                        </div><div class="brand-wrapper swiper-slide wow fadeInUp swiper-slide-duplicate" data-wow-delay="1.5s" data-swiper-autoplay="10000" data-swiper-slide-index="4" style="width: 210px; margin-right: 30px; visibility: hidden; animation-delay: 1.5s; animation-name: none;" role="group" aria-label="16 / 16">
                            <a href="#"><img src="assets/img/brand/brand-5.png" class="img-fluid" alt="img"></a>
                        </div></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            </div>
        </div>
        <!-- service area end-->

        <!-- quality area start here -->
        <section class="quality-area pt-120 pb-90 fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-9">
                        <div class="kquality mb-30 aos-init" data-aos="zoom-in-right">
                            <div class="kquality-icon">
                                <i class="flaticon-website"></i>
                            </div>
                            <div class="kquality-text fix">
                                <h3 class="mb-20 kquality-text-title">We Deliver the Best Quality</h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered in some form, by injected humour words.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3">
                        <div class="text-lg-end mb-30 aos-init" data-aos="zoom-in-left">
                            <div class="kquality-img">
                                <img src="assets/img/trust/cta-img.jpg" class="img-fluid" alt="cta-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- quality area start here -->
    </main>
@endsection
