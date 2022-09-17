<header class="site-header mo-left header-full header">
    <!-- main header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix ">
            <div class="container-fluid">
                <div class="header-content-bx">
                    <!-- website logo -->
                    <div class="logo-header">
                        @isset($logo)
                            <a href="{{ route ('home.index') }}"><img src="{{ asset ($logo->logo_image) }}" alt=""/></a>
                        @endisset
                    </div>
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end kk" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!-- extra nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <ul>
                                <li class="search-btn"><a id="quik-search-btn" href="javascript:;" class="btn radius-xl gray">Search</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Quik search -->
                    <div class="dlab-quik-search">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="enter your keyword ...">
                            <span  id="quik-search-remove"><i class="ti-close"></i></span>
                        </form>
                    </div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-center nav-dark" id="navbarNavDropdown">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="{{ route ('home.index') }}">Home</a>
                                <!-- <ul class="sub-menu">
                                    <li><a href="index">Home 01</a></li>
                                    <li><a href="index-2">Home 02</a></li>
                                    <li><a href="index-3">Home 03</a></li>
                                    <li><a href="index-4">Home 04</a></li>
                                    <li><a href="index-5">Home 05</a></li>
                                </ul>	 -->
                            </li>
                            <!-- <li>
                                <a href="#">Blog</a>
                            </li> -->
                            <li class="has-mega-menu post-slider life-style">
                                <a href="#">Categories<i class="fa fa-chevron-down"></i></a>
                                <div class="mega-menu">
                                    <div class="life-style-bx">
                                        <div class="life-style-tabs">
                                            <ul>
                                                <li><a href="javascript:void(0);" id="st-all" class="post-tabs active">All</a></li>
                                                <?php
                                                    //$data1 = array_rand($json_data, 6);
                                                    // if(count($data1)>0){
                                                    //     foreach($json_data as $key => $category){
                                                    //         if(array_search($key, $data1)){
                                                ?>
                                                            <li><a href="javascript:void(0);" id="st-beauty" data-slug="" class="post-tabs"><?php //echo $category['category_name']; ?></a></li>
                                                <?php
                                                    //         }
                                                    //     }
                                                    // }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="life-style-post">
                                            <div id="all" class="life-style-post-bx show">
                                                <div class="header-blog-carousel owl-carousel owl-btn-center-lr">
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/pic1.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Oh Christmas Tree</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/pic2.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Winter Looks Revolve</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/pic3.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Dress Like a Parisian</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/pic4.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Night Look Holiday</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="beauty" class="life-style-post-bx">
                                                <div class="header-blog-carousel owl-carousel owl-btn-center-lr">
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/beauty/pic1.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Oh Christmas Tree</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/beauty/pic2.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Winter Looks Revolve</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/beauty/pic3.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Dress Like a Parisian</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/beauty/pic4.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Night Look Holiday</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="lifestyle" class="life-style-post-bx">
                                                <div class="header-blog-carousel owl-carousel owl-btn-center-lr">
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/lifestyle/pic1.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Oh Christmas Tree</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/lifestyle/pic2.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Winter Looks Revolve</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/lifestyle/pic3.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Dress Like a Parisian</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/lifestyle/pic4.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Night Look Holiday</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="fashion" class="life-style-post-bx">
                                                <div class="header-blog-carousel owl-carousel owl-btn-center-lr">
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/fashion/pic1.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Oh Christmas Tree</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/fashion/pic2.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Winter Looks Revolve</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/fashion/pic3.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Dress Like a Parisian</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/fashion/pic4.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Night Look Holiday</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="travel" class="life-style-post-bx">
                                                <div class="header-blog-carousel owl-carousel owl-btn-center-lr">
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/travel/pic1.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Oh Christmas Tree</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/travel/pic2.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Winter Looks Revolve</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/travel/pic3.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Dress Like a Parisian</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="blog-post blog-sm">
                                                            <div class="dlab-post-media">
                                                                <a href="post-standart"><img src="{{ asset('images/category/travel/pic4.jpg') }}" alt=""></a>
                                                            </div>
                                                            <div class="dlab-post-info">
                                                                <div class="dlab-post-title ">
                                                                    <h5 class="post-title"><a href="post-standart">Night Look Holiday</a></h5>
                                                                </div>
                                                                <div class="date">
                                                                    02 <span></span> 2020
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="{{ route ('about.index') }}">About</a></li>
                            <li><a href="{{ route ('contactUs.index') }}">Contact</a></li>
                        </ul>
                        <ul class="social-icon-c">
                            <li><a href="https://www.facebook.com/daddymagz" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/daddy_magz/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/daddy-magz/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://twitter.com/daddy_magz" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                        <div class="social-menu">
                            <ul>
                                <li><a href="https://www.facebook.com/daddymagz" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/daddy_magz/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/daddy-magz/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://twitter.com/daddy_magz" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>
