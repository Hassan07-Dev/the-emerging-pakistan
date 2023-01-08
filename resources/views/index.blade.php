@extends('layout.web-app')


@section('content')
    <section class="bg-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Popular news carousel -->
                    <div class="card__post-carousel">
                        @isset($latest_blogs)
                            @foreach($latest_blogs as $latest_blog)
                                    <div class="item">
                                        <!-- Post Article -->
                                        <div class="card__post">
                                            <div class="card__post__body">
                                                <a href="{{ route ('blog.details', [$latest_blog['slug']]) }}">
                                                    <img src="{{ asset($latest_blog['blog_image']) }}" class="img-fluid" alt="Latest New Image">
                                                </a>
                                                <div class="card__post__content bg__post-cover">
                                                    <div class="card__post__category">
                                                        latest news
                                                    </div>
                                                    <div class="card__post__title">
                                                        <h1>
                                                            <a class="text-white text-decoration-none" href="{{ route ('blog.details', [$latest_blog['slug']]) }}">
                                                                {{ $latest_blog['title'] }}
                                                            </a>
                                                        </h1>
                                                    </div>
                                                    <div class="card__post__author-info">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a href="{{ route ('blog.details', [$latest_blog['slug']]) }}">
                                                                    by {{ $latest_blog['arthur'] }}
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <span>
                                                                    {{ Carbon\Carbon::parse($latest_blog['created_at'])->format('M d, Y') }}
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        @endisset
                    </div>
                    <!-- End Popular news carousel -->
                    <!-- Banner ads -->
                    <figure class="mt-4 mb-4">
                        <a href="#">
                            <img src="{{asset('assets/images/placeholder/950x150.jpg')}}" alt="" class="img-fluid">
                        </a>
                    </figure>
                    <!-- End Banner ads -->

                    <!-- Popular news Category -->
                    <div class="wrapper__list__article">
                        <h4 class="border_section">Digital Marketing</h4>
                        <div class="row ">
                            @isset($digital_marketings)
                                @foreach($digital_marketings->blog as $digital_marketing)
                                    @if($loop->iteration == 1 or $loop->iteration == 4)
                                        <div class="col-lg-6 pd-0">
                                            <div class="article__entry">
                                                <div class="article__image">
                                                    <a href="{{ route ('blog.details', [$digital_marketing['slug']]) }}">
                                                        <img src="{{ asset($digital_marketing['blog_image']) }}" alt="Digital Marketing Image" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="article__content">
                                                    <div class="article__category">
                                                        {{ $digital_marketing['category']->category_name }}
                                                    </div>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            by {{ $digital_marketing['arthur'] }}
                                                        </span>
                                                        </li>
                                                        <li class="list-inline-item">
                                                        <span class="text-dark text-capitalize">
                                                            {{ Carbon\Carbon::parse($digital_marketing['created_at'])->format('M d, Y') }}
                                                        </span>
                                                        </li>

                                                    </ul>
                                                    <h5 style="height: 65px;">
                                                        <a href="{{ route ('blog.details', [$digital_marketing['slug']]) }}">
                                                            {{ $digital_marketing['title'] }}
                                                        </a>
                                                    </h5>
                                                    <p>
                                                        {{ \Illuminate\Support\Str::of($digital_marketing['excerpt'])->words(25) }}
                                                    </p>
                                                    <a href="{{ route ('blog.details', [$digital_marketing['slug']]) }}" class="btn btn-outline-primary mb-4 text-capitalize"> read more</a>
                                                </div>
                                            </div>
                                    @else
                                        <div class="mb-3">
                                            <!-- Post Article -->
                                            <div class="card__post card__post-list">
                                                <div class="image-sm">
                                                    <a href="{{ route ('blog.details', [$digital_marketing['slug']]) }}">
                                                        <img src="{{ asset($digital_marketing['blog_image']) }}" alt="Techonology Image" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="card__post__body ">
                                                    <div class="card__post__content">

                                                        <div class="card__post__author-info mb-2">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    <span class="text-primary">
                                                                        by {{ $digital_marketing['arthur'] }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span class="text-dark text-capitalize">
                                                                        {{ Carbon\Carbon::parse($digital_marketing['created_at'])->format('M d, Y') }}
                                                                    </span>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="card__post__title">
                                                            <h6>
                                                                <a href="{{ route ('blog.details', [$digital_marketing['slug']]) }}">
                                                                    {{ $digital_marketing['title'] }}
                                                                </a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($loop->iteration == 3 or $loop->iteration == 6)
                                        </div>
                                    @endif
                                @endforeach
                            @endisset
                        </div>
                    </div>
                    <!-- Popular news Category -->

                    <!-- Popular 3 news carousel -->
                    <div class="wrapper__list__article">
                        <h4 class="border_section">technology</h4>
                        <div class="row">
                            <div class="col-lg-12 pd-0">
                                <div class="article__entry-carousel-three">
                                    @isset($technologys)
                                        @foreach($technologys->blog as $technology)
                                            <div class="item">
                                                <!-- Post Article -->
                                                <div class="article__entry">
                                                    <div class="article__image">
                                                        <a href="{{ route ('blog.details', [$technology['slug']]) }}">
                                                            <img src="{{ asset($technology['blog_image']) }}" alt="Technology Image" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="article__content">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <span class="text-primary">
                                                                    by {{ $technology['arthur'] }}
                                                                </span>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <span>
                                                                    {{ Carbon\Carbon::parse($technology['created_at'])->format('M d, Y') }}
                                                                </span>
                                                            </li>

                                                        </ul>
                                                        <h5>
                                                            <a href="{{ route ('blog.details', [$technology['slug']]) }}">
                                                                {{ $technology['title'] }}
                                                            </a>
                                                        </h5>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper__list__article">
                        <h4 class="border_section">Fashion</h4>
                        <div class="row ">
                            <div class="col-lg-12 pd-0">
                                <div class="article__entry-carousel-three">
                                    @isset($fashions)
                                        @foreach($fashions->blog as $fashion)
                                            <div class="item">
                                                <!-- Post Article -->
                                                <div class="article__entry">
                                                    <div class="article__image">
                                                        <a href="{{ route ('blog.details', [$fashion['slug']]) }}">
                                                            <img src="{{ asset($fashion['blog_image']) }}" alt="Fashion Image" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="article__content">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <span class="text-primary">
                                                                    by {{ $fashion['arthur'] }}
                                                                </span>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <span>
                                                                    {{ Carbon\Carbon::parse($fashion['created_at'])->format('M d, Y') }}
                                                                </span>
                                                            </li>

                                                        </ul>
                                                        <h5>
                                                            <a href="{{ route ('blog.details', [$fashion['slug']]) }}">
                                                                {{ $fashion['title'] }}
                                                            </a>
                                                        </h5>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Popular 3 news carousel -->

                    <!-- Category news -->
                    <div class="wrapper__list__article">
                        <h4 class="border_section">Latest Blog</h4>
                        <div class="wrapp__list__article-responsive">
                            @isset($latest_blogs)
                                @foreach($latest_blogs as $latest_blog)
                                    <!-- Post Article List -->
                                    <div class="card__post card__post-list card__post__transition mt-30">
                                        <div class="row ">
                                            <div class="col-md-5">
                                                <div class="card__post__transition">
                                                    <a href="{{ route ('blog.details', [$latest_blog['slug']]) }}">
                                                        <img src="{{ asset($latest_blog['blog_image']) }}" class="img-fluid w-100"
                                                             alt="Latest Blog Image">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-7 my-auto pl-0">
                                                <div class="card__post__body ">
                                                    <div class="card__post__content  ">
                                                        <div class="card__post__category ">
                                                            {{ $latest_blog['category']->category_name }}
                                                        </div>
                                                        <div class="card__post__author-info mb-2">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    <span class="text-primary">
                                                                        by {{ $latest_blog['arthur'] }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span class="text-dark text-capitalize">
                                                                        {{ Carbon\Carbon::parse($latest_blog['created_at'])->format('M d, Y') }}
                                                                    </span>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="card__post__title">
                                                            <h5>
                                                                <a href="{{ route ('blog.details', [$latest_blog['slug']]) }}">
                                                                    {{ $latest_blog['title'] }}
                                                                </a>
                                                            </h5>
                                                            <p class="d-none d-lg-block d-xl-block mb-0">
                                                                {{ \Illuminate\Support\Str::of($latest_blog['excerpt'])->words(25) }}
                                                            </p>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @endisset

                        </div>
                    </div>
                </div>
                <!-- End Category news -->

                <!-- Call Here  -->
                <x-right-sidebar />

                <div class="mx-auto">
                    <!-- Pagination -->
                    <div class="pagination-area">
                        <div class="pagination wow fadeIn animated" data-wow-duration="2s" data-wow-delay="0.5s"
                             style="visibility: visible; animation-duration: 2s; animation-delay: 0.5s; animation-name: fadeIn;">
                            {{ $latest_blogs->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
@endsection

{{--@section('script')--}}
{{--    <script>--}}
{{--        var imageUrl = "@php env ('IMAGE_URL') @endphp"--}}
{{--        var SITEURL = "{{ route('blog_list') }}";--}}
{{--        var page = 1; //track user scroll as page number, right now page number is 1--}}
{{--        load_more(page);--}}

{{--        function load_more(page){--}}
{{--            axios.post(SITEURL, {--}}
{{--                page_no:page,--}}
{{--            })--}}
{{--            .then(function (response) {--}}
{{--                console.log(response.data);--}}
{{--                data = response.data;--}}
{{--                if(data.status == false){--}}
{{--                    toastr.error(data.message);--}}
{{--                } else if(data.status == true){--}}
{{--                    var arr = data.data;--}}
{{--                    var value = dataRender(arr);--}}
{{--                    $('.loadmore-content').append(value);--}}
{{--                }--}}
{{--            })--}}
{{--            .catch(function (error) {--}}
{{--                console.log(error);--}}
{{--                if (error.response.data.status == false) {--}}
{{--                    toastr.error(error.response.data.message);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        function truncate(str, no_words) {--}}
{{--            return str.split(" ").splice(0,no_words).join(" ");--}}
{{--        }--}}
{{--        function countWords(str) {--}}
{{--            str = str.replace(/(^\s*)|(\s*$)/gi,"");--}}
{{--            str = str.replace(/[ ]{2,}/gi," ");--}}
{{--            str = str.replace(/\n /,"\n");--}}
{{--            return str.split(' ').length;--}}
{{--        }--}}

{{--        function dataRender(res) {--}}
{{--            var output = '';--}}
{{--            res.forEach(function(element){--}}
{{--                var url_encode = "{{ url ('blog/details') }}/"+element.slug;--}}
{{--                url_encode = encodeURI(url_encode);--}}
{{--                output += '<div class="col-lg-12">'--}}
{{--                    +'<div class="blog-card blog-md">'--}}
{{--                    +'<div class="blog-card-media blog-border-radius">'--}}
{{--                    +'<img src="'+imageUrl+element.blog_image+'" alt=""/>'--}}
{{--                    +'</div>'--}}
{{--                    +'<div class="blog-card-info">'--}}
{{--                    +'<h4 class="title"><a href="{{ url ('blog/details') }}/'+element.slug+'">'+element.title+'</a></h4>'--}}
{{--                    +'<div class="date">'+moment(element.created_at).format('DD')+'<span></span>'+moment(element.created_at).format('MM')+'<span></span>'+moment(element.created_at).format('YYYY')--}}
{{--                    +'</div>'--}}
{{--                    +'<p>'+element.excerpt+'...</p>'--}}
{{--                    +'<ul class="list-inline m-b0 icon_c">'--}}
{{--                        +'<li><a href="https://api.whatsapp.com/send?text='+url_encode+'" target="_blank" class="btn-link"><i class="fa fa-whatsapp"></i></a></li>'--}}
{{--                        +'<li><a href="https://www.facebook.com/sharer/sharer.php?u='+url_encode+'" target="_blank" class="btn-link"><i class="fa fa-facebook"></i></a></li>'--}}
{{--                        +'<li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url='+url_encode+'" target="_blank" class="btn-link"><i class="fa fa-linkedin"></i></a></li>'--}}
{{--                        +'<li><a href="https://www.instagram.com/?url='+url_encode+'" target="_blank" class="btn-link"><i class="fa fa-instagram"></i></a></li>'--}}
{{--                        +'<li><a href="http://twitter.com/share?text=&url='+url_encode+'&hashtags=" target="_blank" class="btn-link"><i class="fa fa-twitter"></i></a></li>'--}}
{{--                        +'<li><a href="javascript:void(0);" data-href="'+url_encode+'" class="btn-link embeded_link"><i class="fa fa-link"></i></a></li>'--}}
{{--                    +'</ul>'--}}
{{--                    +'<a href="{{ url ('blog/details') }}/'+element.slug+'" class="btn-link readmore"><i class="la la-arrow-right"></i></a>'--}}
{{--                    +'</div>'--}}
{{--                    +'</div>'--}}
{{--                    +'</div>';--}}
{{--            });--}}
{{--            return output;--}}
{{--        }--}}

{{--        $(document).ready(function () {--}}
{{--            $(document).on('click', '#load_more_btn', function (e) {--}}
{{--                e.preventDefault();--}}
{{--                page++; //page number increment--}}
{{--                load_more(page); //load content--}}
{{--            });--}}

{{--            $(document).on('click', '.embeded_link', function (e) {--}}
{{--                e.preventDefault();--}}
{{--                var url_d = $(this).data('href');--}}
{{--                navigator.clipboard.writeText(url_d).then(function() {--}}
{{--                    toastr.success("Copied to clipboard!");--}}
{{--                    console.log('Async: Copying to clipboard was successful!');--}}
{{--                }, function(err) {--}}
{{--                    toastr.error("Error while copying!");--}}
{{--                    console.error('Async: Could not copy text: ', err);--}}
{{--                });--}}
{{--            })--}}
{{--        });--}}

{{--    </script>--}}
{{--@endsection--}}
