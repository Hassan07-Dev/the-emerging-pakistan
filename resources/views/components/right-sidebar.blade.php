<div class="col-md-4">
    <aside class="wrapper__list__article">
        <div class="wrapper__list__article-small">
            @isset($travels)
                @foreach($travels->blog as $travel)
                    @if($loop->iteration == 1)
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="{{ route ('blog.details', [$travel['slug']]) }}">
                                        <img src="{{ asset($travel['blog_image']) }}" alt="Techonology Image" class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <div class="article__category">
                                        {{ $travel['category']->category_name }}
                                    </div>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            by {{ $travel['arthur'] }}
                                                        </span>
                                        </li>
                                        <li class="list-inline-item">
                                                        <span class="text-dark text-capitalize">
                                                            {{ Carbon\Carbon::parse($travel['created_at'])->format('M d, Y') }}
                                                        </span>
                                        </li>

                                    </ul>
                                    <h5 style="height: 65px;">
                                        <a href="{{ route ('blog.details', [$travel['slug']]) }}">
                                            {{ $travel['title'] }}
                                        </a>
                                    </h5>
                                    <p>
                                        {{ \Illuminate\Support\Str::of($travel['excerpt'])->words(25) }}
                                    </p>
                                    <a href="{{ route ('blog.details', [$travel['slug']]) }}" class="btn btn-outline-primary mb-4 text-capitalize"> read more</a>
                                </div>
                            </div>

                    @else
                                <div class="mb-3">
                                    <!-- Post Article -->
                                    <div class="card__post card__post-list">
                                        <div class="image-sm">
                                            <a href="{{ route ('blog.details', [$travel['slug']]) }}">
                                                <img src="{{ asset($travel['blog_image']) }}" alt="Techonology Image" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="card__post__body ">
                                            <div class="card__post__content">

                                                <div class="card__post__author-info mb-2">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                                    <span class="text-primary">
                                                                        by {{ $travel['arthur'] }}
                                                                    </span>
                                                        </li>
                                                        <li class="list-inline-item">
                                                                    <span class="text-dark text-capitalize">
                                                                        {{ Carbon\Carbon::parse($travel['created_at'])->format('M d, Y') }}
                                                                    </span>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="card__post__title">
                                                    <h6>
                                                        <a href="{{ route ('blog.details', [$travel['slug']]) }}">
                                                            {{ $travel['title'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                @endforeach
            @endisset

        </div>
    </aside>

    <!-- social media -->
{{--    <aside class="wrapper__list__article">--}}
{{--        <h4 class="border_section">stay conected</h4>--}}
{{--        <!-- widget Social media -->--}}
{{--        <div class="wrap__social__media">--}}
{{--            <a href="#" target="_blank">--}}
{{--                <div class="social__media__widget facebook">--}}
{{--                                    <span class="social__media__widget-icon">--}}
{{--                                        <i class="fa fa-facebook"></i>--}}
{{--                                    </span>--}}
{{--                    <span class="social__media__widget-counter">--}}
{{--                                        19,243 fans--}}
{{--                                    </span>--}}
{{--                    <span class="social__media__widget-name">--}}
{{--                                        like--}}
{{--                                    </span>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a href="#" target="_blank">--}}
{{--                <div class="social__media__widget twitter">--}}
{{--                                    <span class="social__media__widget-icon">--}}
{{--                                        <i class="fa fa-twitter"></i>--}}
{{--                                    </span>--}}
{{--                    <span class="social__media__widget-counter">--}}
{{--                                        2.076 followers--}}
{{--                                    </span>--}}
{{--                    <span class="social__media__widget-name">--}}
{{--                                        follow--}}
{{--                                    </span>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a href="#" target="_blank">--}}
{{--                <div class="social__media__widget youtube">--}}
{{--                                    <span class="social__media__widget-icon">--}}
{{--                                        <i class="fa fa-youtube"></i>--}}
{{--                                    </span>--}}
{{--                    <span class="social__media__widget-counter">--}}
{{--                                        15,200 followers--}}
{{--                                    </span>--}}
{{--                    <span class="social__media__widget-name">--}}
{{--                                        subscribe--}}
{{--                                    </span>--}}
{{--                </div>--}}
{{--            </a>--}}

{{--        </div>--}}
{{--    </aside>--}}
    <!-- End social media -->

    <!-- Newsletter news -->
    <aside class="wrapper__list__article">
        <h4 class="border_section">newsletter</h4>
        <!-- Form Subscribe -->
        <div class="widget__form-subscribe bg__card-shadow">
            <h6>
                The most important world news and events of the day.
            </h6>
            <p><small>Get magzrenvi daily newsletter on your inbox.</small></p>
            <div class="input-group ">
                <input type="text" class="form-control" placeholder="Your email address">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">sign up</button>
                </div>
            </div>
        </div>
    </aside>
    <!-- End Newsletter news -->

    <div class="sidebar-section">
        <aside class="wrapper__list__article">
            <h4 class="border_section">trending sports</h4>
            @isset($sports)
                @foreach($sports->blog as $sport)
                    <!-- List Article -->
                    <div class="card__post__content p-3 card__post__body-border-all">
                        <div class="card__post__category text-capitalize">
                            travel
                        </div>
                        <div class="card__post__author-info mb-2">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                                    <span class="text-primary">
                                                        by {{ $sport['arthur'] }}
                                                    </span>
                                </li>
                                <li class="list-inline-item">
                                                    <span class="text-dark text-capitalize">
                                                        {{ Carbon\Carbon::parse($sport['created_at'])->format('M d, Y') }}
                                                    </span>
                                </li>

                            </ul>
                        </div>
                        <div class="card__post__title">
                            <h5>
                                <a href="{{ route ('blog.details', [$sport['slug']]) }}">
                                    {{ $sport['title'] }}
                                </a>
                            </h5>
                        </div>
                    </div>
                @endforeach
            @endisset
        </aside>

        <!-- Tags news -->
        <aside class="wrapper__list__article">
            <h4 class="border_section">tags</h4>
            <div class="blog-tags p-0">
                <ul class="list-inline">
                    @isset($tags)
                        @foreach($tags as $tag)
                            <li class="list-inline-item">
                                <a href="#">
                                    #{{ $tag->getTags->tag_name }}
                                </a>
                            </li>
                        @endforeach
                    @endisset
                </ul>
            </div>
        </aside>
        <!-- End Tags news -->

        <!-- Category news -->
        <aside class="wrapper__list__article">
            <h4 class="border_section">category</h4>
            <!-- Widget Category -->
            <div class="widget widget__category">
                <ul class="list-unstyled">
                    @isset($categories)
                        @foreach($categories as $category)
                            <li>
                                <a href="#">
                                    {{ $category->category_name }}
                                    <span class="badge">{{ $category->blog_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endisset
                </ul>
            </div>
        </aside>
        <!-- End Category news -->

        <!-- Banner news -->
        <aside class="wrapper__list__article">
            <h4 class="border_section">Advertise</h4>
            <a href="#">
                <figure>
                    <img src="{{asset('assets/images/placeholder/600x600.jpg')}}" alt="" class="img-fluid">
                </figure>
            </a>
        </aside>
        <!-- End Banner news -->
    </div>
</div>
