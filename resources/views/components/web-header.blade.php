<header>
    @if(\Illuminate\Support\Facades\Request::segment (1) != 'login' && \Illuminate\Support\Facades\Request::segment (1) != 'register' && \Illuminate\Support\Facades\Request::segment (1) != 'forgot' && \Illuminate\Support\Facades\Request::segment (1) != 'verify')
    <!-- Navbar  -->
    <div class="topbar d-none d-sm-block">
        <div class="container ">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="topbar-left">
                        <div class="topbar-text">
                            {{ \Carbon\Carbon::now()->format('D, M d, Y') }}
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="list-unstyled topbar-right">
                        <ul class="topbar-link">
                            <li><a href="#" title="">Contact Us</a></li>
                            @if(\Illuminate\Support\Facades\Auth::check ())
                                <li><a href="{{ route ('user.logout') }}" title="">Logout</a></li>
                            @else
                                <li><a href="{{ route ('user.login') }}" title="">Login</a>/<a href="{{ route ('user.signup') }}" title="">Register</a></li>
                            @endif
                        </ul>
                        <ul class="topbar-sosmed">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- logo -->
    <div class="bg-white ">
        <div class="container">
            <div class="row">
                <div class=" col-sm-12 col-md-4 my-auto d-none d-sm-block ">
                    <figure class="mb-0">
                        <a href="{{ route ('home.index') }}">
                            @isset($logo)
                                <img src="{{ asset ($logo->logo_image_header) }}" alt="Logo" class="img-fluid logo">
                            @endisset
                        </a>
                    </figure>
                </div>
                <div class="col-md-8 d-none d-sm-block ">
                    <figure class="mt-3 ">
                        <a href="#">
                            <img src="{{ asset('assets/images/placeholder/950x150.jpg') }}" alt="" class="img-fluid">
                        </a>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo -->
    @endif
    <!-- navbar -->
    <div class="navigation-wrap navigation-shadow bg-white">
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft  ">
            <div class="container">
                <div class="offcanvas-header">
                    <div data-toggle="modal" data-target="#modal_aside_right" class="btn-md">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                </div>
                <figure class="mb-0 mx-auto d-block d-sm-none sticky-logo">
                    <a href="{{ route ('home.index') }}">
                        @isset($logo)
                            <img src="{{ asset ($logo->logo_image_header) }}" alt="Logo" class="img-fluid logo">
                        @endisset
                    </a>
                </figure>
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
            <span class="navbar-toggler-icon"></span>
        </button> -->
                <div class="collapse navbar-collapse justify-content-between" id="main_nav99">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link active" href="{{ route ('home.index') }}"> Home </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route ('blog.index') }}"> Blogs </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route ('about.index') }}"> About </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Categories </a>
                            <ul class="dropdown-menu animate fade-up">
                                @isset($categorys)
                                    @foreach($categorys as $category)
                                        <a class="dropdown-item" href="{{ route('blog.index', [strtolower(str_replace(' ', '-', $category->category_name))]) }}"> {{ $category->category_name }} </a>
                                    @endforeach
                                @endisset
                                <a class="dropdown-item" href="{{ route('blog.categoryList') }}">
                                    All Categories
                                </a>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route ('contactUs.index') }}"> Contact </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('blog.writeBlog') }}"> Submit Guest Post </a></li>
                        @isset(Auth::user()->id)
                            <li class="nav-item"><a class="nav-link" href="{{ route('profile.setting') }}"> My Profile </a></li>
                        @endif
                    </ul>


                    <!-- Search bar.// -->
                    <ul class="navbar-nav ">
                        <li class="nav-item search hidden-xs hidden-sm "><a class="nav-link" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- Search content bar.// -->
                    <div class="top-search navigation-shadow">
                        <div class="container">
                            <div class="input-group ">
                                <form action="#">
                                    <div class="row no-gutters mt-3">
                                        <div class="col">
                                            <input class="form-control border-secondary border-right-0 rounded-0"
                                                   type="search" value="" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <a class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                               href="/search-result.html">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Search content bar.// -->


                </div> <!-- navbar-collapse.// -->
            </div>
        </nav>

    </div>

    <div id="modal_aside_right" class="modal fixed-left fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-aside" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="widget__form-search-bar  ">
                        <div class="row no-gutters">
                            <div class="col">
                                <input class="form-control border-secondary border-right-0 rounded-0" value=""
                                       placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav class="list-group list-group-flush">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle text-dark" href="#"
                                   data-toggle="dropdown"> Home
                                </a>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li><a class="dropdown-item text-dark" href="/homepage-v1.html"> Home version
                                            one </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link  text-dark" href="/contact.html"> contact </a> </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link active text-dark" href="{{ route ('home.index') }}"> Home </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark" href="{{ route ('blog.index') }}"> Blogs </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-dark active" href="{{ route ('about.index') }}"> About </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark dropdown-toggle" href="#" data-toggle="dropdown"> Categories </a>
                                <ul class="dropdown-menu animate fade-up">
                                    @isset($categorys)
                                        @foreach($categorys as $category)
                                            <a class="dropdown-item" href="{{ route('blog.index', [strtolower(str_replace(' ', '-', $category->category_name))]) }}"> {{ $category->category_name }} </a>
                                        @endforeach
                                    @endisset
                                    <a class="dropdown-item" href="{{ route('blog.categoryList') }}">
                                        All Categories
                                    </a>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link text-dark" href="{{ route ('contactUs.index') }}"> Contact </a></li>
                            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('blog.writeBlog') }}"> Submit Guest Post </a></li>
                            @isset(Auth::user()->id)
                                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('profile.setting') }}"> My Profile </a></li>
                            @endif
                        </ul>

                    </nav>
                </div>
                <div class="modal-footer">


                    <p>© 2020 <a href="http://retenvi.com"
                                 title="Premium WordPress news &amp; magazine theme">Magzrenvi</a>
                        -
                        Premium template news, blog & magazine &amp;
                        magazine theme by <a href="http://retenvi.com" title="retenvi">RETENVI.COM</a>.</p>

                </div>

            </div>
        </div>
    </div>
    <!-- End Navbar  -->

    <!-- Tranding News -->
    @if(\Illuminate\Support\Facades\Request::segment (1) == 'index' or \Illuminate\Support\Facades\Request::segment (1) == '')
        <x-web-trending/>
    @endif
    <!-- End Tranding News -->
</header>
