<header>
    <div class="transparent-header">
        <div class="container-fluid">
            <div class="header-space">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-8">
                        <div class="header-logo">
                            <a href="{{ route ('home.index') }}"><img src="{{ asset ($logo->logo_image) }}" class="img-fluid" alt="logo-img"></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-4">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="menu-item-has-children"><a href="{{ route ('home.index') }}">Home</a></li>
                                    <li class="menu-item-has-children"><a href="{{ route ('about.index') }}">About</a></li>
                                    <li class="menu-item-has-children"><a href="{{ route ('services.index') }}">Services</a></li>
                                    <li class="menu-item-has-children"><a href="{{ route ('blog.index') }}">Blog</a></li>
                                    <li class="menu-item-has-children"><a href="javascript:void(0)">More</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route ('faq.index') }}">Faq</a></li>
                                            <li><a href="{{ route ('contactUs.index') }}">Contact</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="side-menu-icon d-xl-none text-end">
                            <button class="side-toggle"><i class="far fa-bars"></i></button>
                        </div>
                    </div>
                    <div class="col-xl-4 d-none d-xl-block">
                        <div class="header-right text-end">
                            <div class="header-social">
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="header-search">
                                <a class="search-btn nav-search search-trigger" href="#"><i class="far fa-search"></i></a>
                            </div>
                            <div class="header-btn">
                                <a href="{{ route ('about.index') }}" class="theme-btn theme-btn-small">Free Estimate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="fix">
    <div class="side-info">
        <button class="side-info-close"><i class="fal fa-times"></i></button>
        <div class="side-info-content">
            <div class="mobile-menu"></div>
            <div class="contact-infos mb-30">
                <div class="contact-list mb-30">
                    <h4>Contact Info</h4>
                    <ul>
                        <li><img src="assets/img/icon/sidebar-icon-1.png" class="img-fluid" alt="icon-img">86 broklyn street road, New York</li>
                        <li><img src="assets/img/icon/footer-icon-1.png" class="img-fluid" alt="icon-img"><a href="mailto:info@sycho24.com">needhelp@company.com</a></li>
                        <li><img src="assets/img/icon/footer-icon-2.png" class="img-fluid" alt="icon-img"><a href="tel:926668880000">92 666 888 0000</a></li>
                    </ul>
                    <div class="sidebar__menu--social">
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas-overlay"></div>

<!-- Fullscreen search -->
<div class="search-wrap">
    <div class="search-inner">
        <i class="fal fa-times search-close" id="search-close"></i>
        <div class="search-cell">
            <form method="get">
                <div class="search-field-holder">
                    <input type="search" class="main-search-input" placeholder="Search Entire Store...">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end fullscreen search -->

