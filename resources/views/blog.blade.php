@extends('layout.web-app', ['title'=>"Blog"])


@section('content')
        <section class="bg-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Category news -->
                        <div class="wrapper__list__article">
                            <h1 class="border_section">Latest Blog</h1>
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
