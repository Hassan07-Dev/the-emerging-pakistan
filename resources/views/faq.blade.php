@extends('layout.web-app', ['title'=>"Faq's"])


@section('content')
    <main>
        <!-- page title area  -->
        <section class="page-title-area breadcrumb-spacing" data-background="assets/img/bg/breadcrumb-bg.jpg" style="background-image: url(&quot;assets/img/bg/breadcrumb-bg.jpg&quot;);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-9">
                        <div class="page-title-wrapper text-center">
                            <h3 class="page-title mb-25">Faq</h3>
                            <div class="breadcrumb-menu">
                                <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin"><a href="{{ route ('home.index') }}"><span>Home</span></a></li>
                                        <li class="trail-item trail-end"><span>Faq</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- faq area start -->
        <section class="faq-area pt-120 pb-100 bg-grey fix">
            <div class="container z-index">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="faq-wrapper">
                            <div class="choose-right aos-init aos-animate" data-aos="fade-left" data-aos-duration="1000">
                                <div class="accordion" id="accordionExample">
                                    @foreach($faqs as $faq)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapseOne">
                                                    {{ $faq->faq_question }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body">
                                                    <p>{{ $faq->faq_answer }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq area end -->

        <!-- faq form start -->
        <section class="faq-form pt-110 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="faq-form-title-wrapper text-center">
                            <h3 class="faq-form-title">Still stuck ask directly</h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <form action="https://www.devsnews.com/template/kimox/kimox/mail.php" id="contact-form" method="POST">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-md-6 mb-20">
                                        <input name="name" type="text" placeholder="Your Name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-md-6 mb-20">
                                        <input name="email" type="email" placeholder="Email Adress">
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-md-6 mb-20">
                                        <input name="phone" type="text" placeholder="Phone">
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-md-6 mb-20">
                                        <input name="subject" type="text" placeholder="Subject">
                                    </div>
                                    <div class="col-xxl-12 col-xl-12 col-md-12 mb-20">
                                        <textarea placeholder="Write Massage" name="massage" cols="30" rows="9"></textarea>
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
        <!-- faq form end -->

        <!-- cta area  -->
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
        <!-- cta area end  -->
    </main>
@endsection
