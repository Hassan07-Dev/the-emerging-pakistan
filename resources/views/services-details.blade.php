@extends('layout.web-app', ['title'=>"Services Details"])


@section('content')
    <main>
        <section class="page-title-area breadcrumb-spacing" data-background="{{ asset ('assets/img/bg/breadcrumb-bg.jpg') }}" style="background-image: url(&quot;assets/img/bg/breadcrumb-bg.jpg&quot;);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-9">
                        <div class="page-title-wrapper text-center">
                            <h3 class="page-title mb-25">{{ $service_details->service_name }}</h3>
                            <div class="breadcrumb-menu">
                                <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin"><a href="{{ route ('home.index') }}"><span>Home</span></a></li>
                                        <li class="trail-item trail-end"><span>{{ $service_details->service_name }}</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="service-detals pt-120 pb-100 fix">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8">
                        <div class="develop-wrapper">
                            <div class="develop-thumb">
                                <img src="{{ asset ($service_details->service_image) }}" alt="" width="100%">
                            </div>
                            <div class="develop-content">
                                <h3 class="service-title">{{ $service_details->service_name }}</h3>
                                <p>{!! html_entity_decode ($service_details->description) !!}</p>
                            </div>
                        </div>

{{--                        <div class="planning-wrapper pt-50">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-xxl-6 col-xl-6 col-lg-6">--}}
{{--                                    <div class="plan-thumb mb-md-40 mb-xs-40">--}}
{{--                                        <img src="assets/img/service/service-img-6.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xxl-6 col-xl-6 col-lg-6">--}}
{{--                                    <div class="plan-content">--}}
{{--                                        <h4>planning &amp; strategy</h4>--}}
{{--                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
{{--                                        <ul>--}}
{{--                                            <li>Research beyond the business plan</li>--}}
{{--                                            <li>Marketing options and rates</li>--}}
{{--                                            <li>The ability to turnaround consulting</li>--}}
{{--                                            <li>Customer engagement matters</li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-xxl-12">--}}
{{--                                    <div class="plan-content pr-10 pt-50 pt-xs-30 pt-md-30 pb-15">--}}
{{--                                        <p>Need something changed or is there something not quite working the way you envisaged? Is your van a little old and tired and need refreshing? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="choose-right aos-init" data-aos="fade-left" data-aos-duration="1000">--}}
{{--                            <div class="accordion" id="accordionExample">--}}
{{--                                <div class="accordion-item">--}}
{{--                                    <h2 class="accordion-header" id="headingOne">--}}
{{--                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">--}}
{{--                                            How to process the funtion for development?--}}
{{--                                        </button>--}}
{{--                                    </h2>--}}
{{--                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">--}}
{{--                                        <div class="accordion-body">--}}
{{--                                            <p>There are many variations of passages of available but the majority have suffered alteration in that some form by injected randomised words which don’t look even as slightly believable.</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="accordion-item">--}}
{{--                                    <h2 class="accordion-header" id="headingTwo">--}}
{{--                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
{{--                                            Where should I incorporate my business?--}}
{{--                                        </button>--}}
{{--                                    </h2>--}}
{{--                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">--}}
{{--                                        <div class="accordion-body">--}}
{{--                                            <p>Web fonts are often terrible for web performance and none of the font loading strategies are particularly effective to address that. Upcoming font options may finally deliver on the promise.</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="accordion-item">--}}
{{--                                    <h2 class="accordion-header" id="headingThree">--}}
{{--                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--                                            How there are many variations of passages--}}
{{--                                        </button>--}}
{{--                                    </h2>--}}
{{--                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">--}}
{{--                                        <div class="accordion-body">--}}
{{--                                            <p>Front-end and design are remarkably complex these days. That’s why we invite kind, smart folks from the community to run online workshops for all of us to learn together. And we have new ones.</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="sidebar-wrap">
                            <div class="widget_categories grey-bg">
                                <h4 class="bs-widget-title pl-20">Categories</h4>
                                <ul>
                                    @foreach($categories as $category)
                                        <li><a href="#">{{ $category->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget-btn mt-30">
                                <a href="{{ route ('about.index') }}" class="theme-btn border-btn">get a free estimate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="cta-area mb--60 z-index aos-init fix aos-animate" data-aos="fade-up">
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
    </main>
@endsection
