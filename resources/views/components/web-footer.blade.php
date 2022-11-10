<section class="wrapper__section p-0">
    <div class="wrapper__section__components">
        <!-- Footer  -->
        <footer>
            <div class="wrapper__footer bg__footer ">
                <div class=" container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget__footer">
                                <!-- <h4 class="footer-title">company info</h4> -->
                                <figure>
                                    @isset($logo)
                                        <img src="{{ asset ($logo->logo_image_footer) }}" alt="logo-footer" class="logo-footer">
                                    @endisset
                                </figure>
                                <p>
                                    Retnews is a premium magazine template based on Bootstrap 4.
                                    We bring you the best Premium Themes that perfect for news, magazine, personal
                                    blog, etc.
                                    <br>
                                    <!-- <a href=" #" class="btn btn-primary mt-4 text-white">About us</a> -->
                                </p>
                            </div>
                            <div class="border-line"></div>
                            <div class="widget__footer">
                                <h4 class="footer-title">follow us </h4>
                                <!-- <p>
                        Follow us and stay in touch to get the latest news
                    </p> -->
                                <p>
                                    <button class="btn btn-social btn-social-o facebook mr-1">
                                        <i class="fa fa-facebook-f"></i>
                                    </button>
                                    <button class="btn btn-social btn-social-o twitter mr-1">
                                        <i class="fa fa-twitter"></i>
                                    </button>

                                    <button class="btn btn-social btn-social-o linkedin mr-1">
                                        <i class="fa fa-linkedin"></i>
                                    </button>
                                    <button class="btn btn-social btn-social-o instagram mr-1">
                                        <i class="fa fa-instagram"></i>
                                    </button>

                                    <button class="btn btn-social btn-social-o youtube mr-1">
                                        <i class="fa fa-youtube"></i>
                                    </button>
                                </p>
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="col-md-4">
                            <div class="widget__footer">
                                <h4 class="footer-title">category</h4>
                                <div class="link__category">
                                    <ul class="list-unstyled ">
                                        @isset($categorys)
                                            @foreach($categorys as $category)
                                                <li class="list-inline-item"><a href="{{ route('blog.index', [strtolower(str_replace(' ', '-', $category->category_name))]) }}"> {{ $category->category_name }} </a></li>
                                            @endforeach
                                        @endisset
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="widget__footer">
                                <h4 class="footer-title">newsletter</h4>
                                <!-- Form Newsletter -->

                                <div class="widget__form-newsletter ">
                                    <p>

                                        Don’t miss to subscribe to our news feeds, kindly fill the form below
                                    </p>
                                    <div class="mt-3">
                                        <input type="text" class="form-control mb-2"
                                               placeholder="Your email address">

                                        <button class="btn btn-primary btn-block" type="button">subscribe

                                        </button>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="bg__footer-bottom ">
                <div class="container">
                    <div class="row flex-column-reverse flex-md-row">
                        <div class="col-md-6">
                                <span>
                                    © 2020
                                    <a href="{{ route('home.index') }}">theemergingpakistan.com</a>
                                </span>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-inline ">
{{--                                <li class="list-inline-item">--}}
{{--                                    <a href="#">--}}
{{--                                        privacy--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li class="list-inline-item">
                                    <a href="{{ route ('contactUs.index') }}">
                                        contact
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ route ('about.index') }}">
                                        about
                                    </a>
                                </li>
{{--                                <li class="list-inline-item">--}}
{{--                                    <a href="#">--}}
{{--                                        faq--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer  -->
    </div>
</section>


<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
