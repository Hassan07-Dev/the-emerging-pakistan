<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset ('admin-logo.png') }}" alt="AdminLTE Logo" style="max-width: 100%;">
{{--        <span class="brand-text font-weight-light">AdminLTE 3</span>--}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="display: flex !important;justify-content: center;">
{{--            <div class="image">--}}
{{--                <img src="{{ asset ('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">--}}
{{--            </div>--}}
            <div class="info">
                <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::guard ('admin')->user ()->username }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar nav-flat nav-legacy nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item {{ (Request::segment(2) == 'dashboard') ? 'menu-open' : '' }}">
                    <a href="{{ route ('admin.dashboard') }}" class="nav-link {{ (Request::segment(2) == 'dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ (Request::segment(2) == 'logo') ? 'menu-open' : '' }}">
                    <a href="{{ route ('admin.logo') }}" class="nav-link {{ (Request::segment(2) == 'logo') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Logo Change
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ (Request::segment(2) == 'news') ? 'menu-open' : '' }}">
                    <a href="{{ route ('admin.news') }}" class="nav-link {{ (Request::segment(2) == 'news') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Trending News
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ (Request::segment(2) == 'users') ? 'menu-open' : '' }}">
                    <a href="{{ route ('admin.users') }}" class="nav-link {{ (Request::segment(2) == 'users') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Users Lists <span class="custom-style-count">{{ isset($userCount) ? $userCount:'0' }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ (Request::segment(3) == 'blogs') ? 'menu-open' : '' }}">
                    <a href="{{ route ('admin.users.blogs') }}" class="nav-link {{ (Request::segment(2) == 'users') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Users Blogs <span class="custom-style-count">{{ isset($bogCount) ? $bogCount:'0' }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ (Request::segment(3) == 'comments') ? 'menu-open' : '' }}">
                    <a href="{{ route ('admin.users.comments.index') }}" class="nav-link {{ (Request::segment(2) == 'users') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Users Comments <span class="custom-style-count">{{ isset($commentCount) ? $commentCount:'0' }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ (Request::segment(2) == 'blog') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (Request::segment(2) == 'blog') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-blog"></i>
                        <p>
                            Blog Managments
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route ('admin.tags') }}" class="nav-link {{ (Request::segment(3) == 'tags') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tags listings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route ('admin.blogCategory') }}" class="nav-link {{ (Request::segment(3) == 'category') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category listings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route ('admin.list') }}" class="nav-link {{ (Request::segment(3) == 'list') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog listings</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route ('admin.pages') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>
                            Pages Data
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route ('admin.logout') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
