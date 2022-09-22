<x-web-head :title="$title" />

<!-- Pre_loader -->
<x-web-preloader />

    <!-- header -->
    <x-web-header />

    <!-- content -->
    @yield('content')

    <!-- footer -->
    <x-web-footer />

<!-- Optional JavaScript -->
<x-web-scripts />
@yield('script')
