@extends('layout.web-app', ['title'=>"Blog"])


@section('content')
    <main>
        <!-- page title area  -->
        <section class="page-title-area breadcrumb-spacing" data-background="assets/img/bg/breadcrumb-bg.jpg" style="background-image: url(&quot;assets/img/bg/breadcrumb-bg.jpg&quot;);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-9">
                        <div class="page-title-wrapper text-center">
                            <h3 class="page-title mb-25">Blog</h3>
                            <div class="breadcrumb-menu">
                                <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin"><a href="{{ route ('home.index') }}"><span>Home</span></a></li>
                                        <li class="trail-item trail-end"><span>Blog</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- blog area start  -->
        <section class="blog-2 pt-120 pb-115">
            <div class="container">
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 mb-30">
                            <div class="kblog">
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
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="basic-pagination mt-20 wow fadeInUp" data-wow-delay=".5s" style="visibility: hidden; animation-delay: 0.5s; animation-name: none;">
                            {{ $blogs->links('pagination::test') }}
{{--                            <ul>--}}
{{--                                <li><span aria-current="page" class="page-numbers current">1</span></li>--}}
{{--                                <li><a class="page-numbers" href="#">2</a></li>--}}
{{--                                <li><a class="page-numbers" href="#">3</a></li>--}}
{{--                                <li><a class="next page-numbers" href="#">--}}
{{--                                        <i class="fal fa-long-arrow-right"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog area end  -->
    </main>
@endsection
