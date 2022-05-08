<!DOCTYPE html>
<html lang="en">
<!-- Head Place -->
<x-admin-head :title="$title" />
@yield('css')
<body class="login-page" style="min-height: 466px;">

    <!-- Preloader -->
    <x-admin-pre-loader />
        @yield('content')
<!-- script -->
<x-admin-script />
@yield('script')
</body>
</html>
