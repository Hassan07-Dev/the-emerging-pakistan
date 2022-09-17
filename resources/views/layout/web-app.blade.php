<x-web-head :title="$title" />

    <!-- header -->
    <x-web-header />

    <!-- content -->
    @yield('content')

    <!-- footer -->
    <x-web-footer />

<!-- Optional JavaScript -->
<x-web-scripts />
@yield('script')
