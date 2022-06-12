@extends('layout.web-app', ['title'=>"Blog Details"])


@section('content')
    <main>
        <!-- page title area  -->
        <section class="page-title-area breadcrumb-spacing" data-background="{{ asset ('assets/img/bg/breadcrumb-bg.jpg') }}" style="background-image: url(&quot;assets/img/bg/breadcrumb-bg.jpg&quot;);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-9">
                        <div class="page-title-wrapper text-center">
                            <h3 class="page-title mb-25">{{ $blog_details->title }}</h3>
                            <div class="breadcrumb-menu">
                                <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin"><a href="{{ route ('home.index') }}"><span>Home</span></a></li>
                                        <li class="trail-item trail-end"><span>{{ $blog_details->title }}</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- blog details area -->
        <section class="blog-details-area  pt-120 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12">
                        <div class="kblog">
                            <div class="kblog-img">
                                <a href="#"><img src="{{ asset ($blog_details->blog_image) }}" class="img-fluid" alt="blog-img"></a>
                                <span>{{ Carbon\Carbon::parse ($blog_details->created_at)->format('d M') }}</span>
                            </div>
                            <div class="kblog-text kblog-text2">
                                <div class="kblog-meta">
                                    <a href="blog-details.html"><i class="fal fa-user-circle"></i> {{ $blog_details->arthur }}</a>
                                    <a href="blog-details.html"><i class="fal fa-comments"></i> 2 Comments</a>
                                </div>
                                <h3 class="kblog-text-title2 mb-40"><a href="blog-details.html">{{ $blog_details->title }}</a></h3>
                                {!! html_entity_decode ($blog_details->description) !!}
                            </div>
                        </div>
                        <div class="row pt-30 pb-20">
                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                <div class="tag_cloud">
                                    <span>Tags: </span>
                                    @foreach($blog_details->tag_id as $tag)
                                        <a href="#" class="tag-cloud-link">{{ $tag->tag_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                <div class="blog-social text-md-end ">
                                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                                    <a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="row pr-15 pl-15">
                            <div class="blog-comment-box">
                                <div class="comment-title">
                                    <h3 class="comment-box-title"><a href="blog-details.html">2 Comments</a></h3>
                                </div>
                                <div class="blog-single-comment d-flex">
                                    <div class="blog-comment-img">
                                        <a href="#"><img src="assets/img/blog/blog-img-author2.png" alt="blog-img"></a>
                                    </div>
                                    <div class="blog-comment-text">
                                        <h4>Kevin Martin</h4>
                                        <p>A step-by-step tutorial on adding authentication and authorization to your Next.js apps, with Auth0. We’ll be using a Next.js SDK to connect our application. </p>
                                    </div>
                                    <div class="reply-btn">
                                        <a href="#" class="comment-btn">reply</a>
                                    </div>
                                </div>
                                <div class="blog-single-comment no-pt d-flex">
                                    <div class="blog-comment-img">
                                        <a href="#"><img src="assets/img/blog/blog-img-author3.png" alt="blog-img"></a>
                                    </div>
                                    <div class="blog-comment-text">
                                        <h4>Jessica Brown</h4>
                                        <p>Everything to keep in mind when designing and building a mega-dropdown, common pitfalls, hover entry/exit delays, trajectory triangle technique. </p>
                                    </div>
                                    <div class="reply-btn">
                                        <a href="#" class="comment-btn">reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="blog-comment-form">
                            <div class="comment-title2">
                                <h3 class="comment-box-title"><a href="#">Leave a Comment</a></h3>
                            </div>
                            <form action="https://www.devsnews.com/template/kimox/kimox/mail.php" id="contact-form" method="POST">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-20">
                                        <input name="name" type="text" placeholder="Your Name">
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-20">
                                        <input name="email" type="text" placeholder="Your Email">
                                    </div>
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 mb-20">
                                        <textarea name="message" placeholder="Write Massage"></textarea>
                                    </div>
                                    <div class="col-xxl-12 col-xl-12 mb-20">
                                        <button type="submit" class="theme-btn border-btn">Submit comment</button>
                                    </div>
                                </div>
                            </form>
                            <p class="ajax-response"></p>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 mt-md-40 mt-xs-40">
                        <div class="sidebar-wrap">
                            <div class="sidebar-search-from mb-30">
                                <form action="#" _lpchecked="1">
                                    <input type="text" placeholder="Search here">
                                    <button type="submit"> <i class="fal fa-search"></i> </button>
                                </form>
                            </div>

                            <div class="widget_-latest-posts mb-30">
                                <h4 class="bs-widget-title mb-25"> Latest Posts </h4>
                                <div class="sidebar__widget-content">
                                    @foreach($latest_blogs as $latest_blog)
                                        <div class="rc-post d-flex mb-15">
                                            <div class="rc-thumb">
                                                <a href="{{ route ('blog.details', [$latest_blog->slug]) }}"><img src="{{ asset ($latest_blog->blog_image) }}" alt="blog-img"></a>
                                            </div>
                                            <div class="rc-text" style="width: 89%;">
                                                <div class="kblog-meta">
                                                    <a href="{{ route ('blog.details', [$latest_blog->slug]) }}"><i class="fal fa-user-circle"></i> {{ $latest_blog->arthur }}</a>
                                                </div>
                                                <h5>
                                                    <a href="{{ route ('blog.details', [$latest_blog->slug]) }}">{{ $latest_blog->title }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="widget_categories grey-bg mb-30">
                                <h4 class="bs-widget-title pl-15">Categories</h4>
                                <ul>
                                    @foreach($categories as $category)
                                        <li><a href="#">{{ $category->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="widget_tag_cloud">
                                <h4 class="bs-widget-title mb-25"> Tags </h4>
                                <div class="tagcloud">
                                    @foreach($tags as $tag)
                                        <a href="#" class="tag-cloud-link">{{ $tag->tag_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog details area end  -->
    </main>
@endsection
