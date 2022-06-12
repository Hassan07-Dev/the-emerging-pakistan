@extends('layout.web-app', ['title'=>"Home"])


@section('content')
    <main>
        <!-- slider area start here -->
        <section class="slider-area fix position-relative">
            <div class="slider-active swiper-container">
                <div class="swiper-wrapper">
                    <div class="single-slider slider-height swiper-slide" data-swiper-autoplay="10000">
                        <div class="slide-bg" data-background="assets/img/slider/futuristic-smart-city-with-5g-global-network-technology.jpg"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="kslider z-index">
                                        <h5 class="kslider--subtitle mb-25" data-animation="fadeInUp" data-delay="0.3s">Welcome to digital agency</h5>
                                        <h2 class="kslider--title mb-40" data-animation="fadeInUp" data-delay="0.5s">Web Design <br>Agency</h2>
                                        <div class="kslider--btn" data-animation="fadeInUp" data-delay="0.7s">
                                            <a href="{{ route ('about.index') }}" class="theme-btn">Discover more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-shape shape-1"><img src="assets/img/slider/slider-shape-1.png" class="img-fluid" alt="shape-img"></div>
                        <div class="slide-shape shape-2"><img src="assets/img/slider/slider-shape-2.png" class="img-fluid" alt="shape-img"></div>
                    </div>
                    <div class="single-slider slider-height swiper-slide" data-swiper-autoplay="10000">
                        <div class="slide-bg" data-background="assets/img/slider/aerial-view-business-team.jpg" style="-webkit-transform: scaleX(-1);transform: scaleX(-1);"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="kslider z-index">
                                        <h5 class="kslider--subtitle mb-25" data-animation="fadeInUp" data-delay="0.3s">Welcome to digital agency</h5>
                                        <h2 class="kslider--title mb-40" data-animation="fadeInUp" data-delay="0.5s">Web Design <br>Agency</h2>
                                        <div class="kslider--btn" data-animation="fadeInUp" data-delay="0.7s">
                                            <a href="{{ route ('about.index') }}" class="theme-btn">Discover more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-shape shape-1"><img src="assets/img/slider/slider-shape-1.png" class="img-fluid" alt="shape-img"></div>
                        <div class="slide-shape shape-2"><img src="assets/img/slider/slider-shape-2.png" class="img-fluid" alt="shape-img"></div>
                    </div>
{{--                    <div class="single-slider slider-height swiper-slide" data-swiper-autoplay="10000">--}}
{{--                        <div class="slide-bg" data-background="assets/img/slider/slider-3.jpg"></div>--}}
{{--                        <div class="container">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="kslider z-index">--}}
{{--                                        <h5 class="kslider--subtitle mb-25" data-animation="fadeInUp" data-delay="0.3s">Welcome to digital agency</h5>--}}
{{--                                        <h2 class="kslider--title mb-40" data-animation="fadeInUp" data-delay="0.5s">Web Design <br>Agency</h2>--}}
{{--                                        <div class="kslider--btn" data-animation="fadeInUp" data-delay="0.7s">--}}
{{--                                            <a href="service.html" class="theme-btn">Discover more</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="slide-shape shape-1"><img src="assets/img/slider/slider-shape-1.png" class="img-fluid" alt="shape-img"></div>--}}
{{--                        <div class="slide-shape shape-2"><img src="assets/img/slider/slider-shape-2.png" class="img-fluid" alt="shape-img"></div>--}}
{{--                    </div>--}}
                </div>
                <!-- If we need pagination -->
                <div class="slider-paginations slide-dots"></div>
            </div>
        </section>
        <!-- slider area end here -->

        <!-- service area start here -->
        <section class="service-area pt-120 pb-130" data-background="assets/img/service/service-bg.jpg">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xxl-5 col-lg-6">
                        <div class="kservice-text mb-50" data-aos="fade-right" data-aos-duration="1000">
                            <h5 class="kservice-text-subtitle mb-15">All Categories List</h5>
                            <h2 class="kservice-text-title mb-40">The Services <br>We’re Offering</h2>
                            <p class="mb-45">There are many variations of passages of lorem ipsum available but the majority have suffered alteration in some form by injected humour.</p>
                            <div class="kservice-author">
                                <div class="kservice-author-img mr-30">
                                    <img src="assets/img/service/service-author.png" class="img-fluid" alt="author-img">
                                </div>
                                <div class="kservice-author-sign">
                                    <span>Jessica Brown</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="row custom-mar-20" data-aos="fade-down" data-aos-duration="1000">
                            @foreach($services as $service)
                                <div class="col-sm-6 custom-pad-20">
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
                </div>
            </div>
        </section>
        <!-- service area end here -->

        <!-- cta area start here -->
        <section class="cta-area mt--60 z-index" data-aos="fade-up">
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
                        <a href="{{ route ('contactUs.index') }}" class="theme-btn black-btn">Discover more</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta area end here -->

        <!-- about area start here -->
        <section class="about-area pt-120 pb-70 fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="kabout-img mb-50 mr-70" data-aos="zoom-out-up" data-swiper-autoplay="10000">
                            <div class="kabout-img-shape"></div>
                            <img src="assets/img/about/about-img-1.jpg" class="img-fluid z-index" alt="about-img">
                            <div class="kabout-img-small">
                                <img src="assets/img/about/about-img-2.jpg" class="img-fluid" alt="about-img">
                                <div class="kabout-img-small-icon play_btn">
                                    <span>
                                        <i class="flaticon-idea"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="kabout mb-50" data-aos="zoom-out-down" data-swiper-autoplay="10000">
                            <div class="section-title-wrapper mb-45">
                                <h5 class="section-subtitle mb-20">get to know us</h5>
                                <h2 class="section-title mb-35">Welcome to digital <br>agency</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the when an unknown was popularised.</p>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="kabout-service mb-30">
                                        <h4 class="kabout-service-title">The Best Services</h4>
                                        <p>Lorem ipsum dolor sited amet, consectetur notted.</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="kabout-service mb-30">
                                        <h4 class="kabout-service-title">Expert Designers</h4>
                                        <p>Lorem ipsum dolor sited amet, consectetur notted.</p>
                                    </div>
                                </div>
                            </div>
                            <ul class="mt-20 mb-55">
                                <li><i class="fal fa-check"></i> Entum estibulum dignissim posuere.</li>
                                <li><i class="fal fa-check"></i> If you are going to use a passage.</li>
                                <li><i class="fal fa-check"></i> Lorem Ipsum generators on the tend to repeat.</li>
                            </ul>
                            <div class="kabout-btn">
                                <a href="{{ route ('services.index') }}" class="theme-btn border-btn">Discover more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end here -->

        <!-- project area strat here -->
{{--        <section class="project-area bg-grey pt-115 pb-400 fix" >--}}
{{--            <div class="common-shape-wrapper wow slideInRight animated" data-wow-delay="0ms" data-wow-duration="1500ms">--}}
{{--                <div class="common-shape-inner"></div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <!-- project area end here -->

        <!-- video area start here -->
{{--        <section class="video-area z-index">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="section-title-wrapper mb-45 text-center">--}}
{{--                            <h5 class="section-subtitle mb-20">one minute video</h5>--}}
{{--                            <h2 class="section-title mb-35">Watch video work</h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="kvideo-wrapper" data-aos="zoom-in" data-aos-duration="1000">--}}
{{--                            <div class="kvideo" data-background="assets/img/bg/video-bg.jpg">--}}
{{--                                <div class="kvideo-sign text-center">--}}
{{--                                    <a class="venobox" data-autoplay="true" data-vbtype="video" href="https://youtu.be/KgWzysP29Vg"><i class="fas fa-play"></i></a>--}}
{{--                                    <h2>Watch Video</h2>--}}
{{--                                </div>--}}
{{--                                <div class="kvideo-number">--}}
{{--                                    <span>get estimate</span>--}}
{{--                                    <a href="tel:6668880000">666 888 0000</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <!-- video area end here -->

        <!-- testimonial area start here -->
        <section class="testimonial-area pt-115 pb-85">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-wrapper text-center mb-45">
                            <h5 class="section-subtitle mb-20">client testimonials</h5>
                            <h2 class="section-title mb-35">What they say?</h2>
                        </div>
                    </div>
                </div>

                <div class="testimonial-active swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                            <div class="ktestimonial mb-30 swiper-slide">
                                <div class="ktestimonial-text">
                                    <p>{{ $testimonial->short_comment }}</p>
                                </div>
                                <div class="ktestimonial-author">
                                    <div class="ktestimonial-author-img">
                                        <img src="{{ asset ($testimonial->client_image) }}" class="img-fluid" alt="client-img">
                                    </div>
                                    <div class="ktestimonial-author-text">
                                        <h5 class="uppercase">{{ $testimonial->client_name }}</h5>
                                        <span class="uppercase">{{ $testimonial->designation }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial area end here -->

        <!-- brand area end here -->
{{--        <div class="brand-area pt-100 pb-100">--}}
{{--            <div class="container">--}}
{{--                <div class="brand-active swiper-container">--}}
{{--                    <div class="swiper-wrapper align-items-center">--}}
{{--                        <div class="brand-wrapper swiper-slide wow fadeInUp" data-wow-delay=".3s" data-swiper-autoplay="10000">--}}
{{--                            <a href="#"><img src="assets/img/brand/brand-1.png" class="img-fluid" alt="img"></a>--}}
{{--                        </div>--}}
{{--                        <div class="brand-wrapper swiper-slide wow fadeInUp" data-wow-delay=".6s" data-swiper-autoplay="10000">--}}
{{--                            <a href="#"><img src="assets/img/brand/brand-2.png" class="img-fluid" alt="img"></a>--}}
{{--                        </div>--}}
{{--                        <div class="brand-wrapper swiper-slide wow fadeInUp" data-wow-delay=".9s" data-swiper-autoplay="10000">--}}
{{--                            <a href="#"><img src="assets/img/brand/brand-3.png" class="img-fluid" alt="img"></a>--}}
{{--                        </div>--}}
{{--                        <div class="brand-wrapper swiper-slide wow fadeInUp" data-wow-delay="1.2s" data-swiper-autoplay="10000">--}}
{{--                            <a href="#"><img src="assets/img/brand/brand-4.png" class="img-fluid" alt="img"></a>--}}
{{--                        </div>--}}
{{--                        <div class="brand-wrapper swiper-slide wow fadeInUp" data-wow-delay="1.5s" data-swiper-autoplay="10000">--}}
{{--                            <a href="#"><img src="assets/img/brand/brand-5.png" class="img-fluid" alt="img"></a>--}}
{{--                        </div>--}}
{{--                        <div class="brand-wrapper swiper-slide wow fadeInUp" data-wow-delay="1.8s" data-swiper-autoplay="10000">--}}
{{--                            <a href="#"><img src="assets/img/brand/brand-1.png" class="img-fluid" alt="img"></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- brand area start here -->

        <!-- trust area start here -->
        <section class="trust-area pt-105 pb-120">
            <div class="trust-bg" data-background="assets/img/trust/trust-bg.jpg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ktrust text-center z-index">
                            <h2 class="ktrust-title mb-45 wow fadeInUp" data-wow-delay=".2s">Trust the Experts for All <br>Your business Needs</h2>
                            <div class="ktrust-btn">
                                <a href="{{ route ('about.index') }}" class="theme-btn">Discover more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- trust area end here -->

        <!-- blog area start here -->
        <section class="blog-area pt-120" data-background="assets/img/blog/blog-bg-1.jpg">
            <div class="blog-space pb-120">
                <div class="blog-text pt-60" data-aos="zoom-in">
                    <div class="section-title-wrapper pr-25 mb-50">
                        <h5 class="section-subtitle mb-20">recent blog posts</h5>
                        <h2 class="section-title mb-35">Latest News & Articles</h2>
                        <p class="pr-50">Lorem ipsum onts persp unde omnis iste natus errluptatem acc usantium demque laudantium totam.</p>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="kblog-arrow">
                        <div class="blog-button-prev slide-prev"><i class="far fa-long-arrow-left"></i></div>
                        <div class="blog-button-next slide-next"><i class="far fa-long-arrow-right"></i></div>
                    </div>
                </div>
                <div class="blog-active swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($blogs as $blog)
                            <div class="kblog swiper-slide">
                                <div class="kblog-img">
                                    <a href="{{ route ('blog.details', [$blog->slug]) }}"><img style="max-height: 300px;" src="{{ asset ($blog->blog_image) }}" class="img-fluid" alt="blog-img"></a>
                                    <span>{{ Carbon\Carbon::parse ($blog->created_at)->format('d M') }}</span>
                                </div>
                                <div class="kblog-text">
                                    <div class="kblog-meta">
                                        <a href="{{ route ('blog.details', [$blog->slug]) }}"><i class="fal fa-user-circle"></i> {{ $blog->arthur }}</a>
                                        <a href="{{ route ('blog.details', [$blog->slug]) }}"><i class="fal fa-comments"></i> 2 Comments</a>
                                    </div>
                                    <h3 class="kblog-text-title mb-20" style="height: 100px;"><a href="{{ route ('blog.details', [$blog->slug]) }}">{{ $blog->title }}</a></h3>
                                    <div class="kblog-text-link">
                                        <a href="{{ route ('blog.details', [$blog->slug]) }}">Read more <i class="far fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- blog area end here -->

        <!-- quality area start here -->
        <section class="quality-area pt-120 pb-90 fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="kquality mb-30" data-aos="zoom-in-right">
                            <div class="kquality-icon">
                                <i class="flaticon-website"></i>
                            </div>
                            <div class="kquality-text fix">
                                <h3 class="mb-20 kquality-text-title">We Deliver the Best Quality</h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered in some form, by injected humour words.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-lg-end mb-30" data-aos="zoom-in-left">
                            <div class="kquality-img">
                                <img src="assets/img/trust/cta-img.jpg" class="img-fluid" alt="cta-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- quality area end here -->

        <!-- map area start here -->
{{--        <div class="map-area">--}}
{{--            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.91477055202!2d-74.11976321327155!3d40.69740344214894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1621333292938!5m2!1sen!2sbd" loading="lazy"></iframe>--}}
{{--        </div>--}}
        <!-- map area end here -->

    </main>
@endsection
