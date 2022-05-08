<!doctype html>
<html lang="en">
    <x-web-head :title="$title" />
    @yield('css')
<body>
    <!-- Preloader -->
    <x-web-pre-loader />

    <!-- header -->
    <x-web-header />

    <!-- content -->
    @yield('content')

    <!-- footer -->
    <x-web-footer />

    <!-- Optional JavaScript -->
    <x-web-scripts />
    @yield('script')

</body>
</html>
