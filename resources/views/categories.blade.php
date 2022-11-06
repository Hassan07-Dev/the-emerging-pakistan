@extends('layout.web-app', ['title'=>"Categories"])


@section('content')
    <section class="bg-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Category news -->
                    <div class="wrapper__list__article">
                        <h4 class="border_section">All Categories</h4>
                        <div class="widget widget__category">
                            <ul class="list-unstyled">
                                @isset($categories)
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('blog.index', [strtolower(str_replace(' ', '-', $category->category_name))]) }}">
                                                {{ $category->category_name }}
                                                <span class="badge">{{ $category->blog_count }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Category news -->

                <!-- Call Here  -->
                <x-right-sidebar />
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
@endsection
