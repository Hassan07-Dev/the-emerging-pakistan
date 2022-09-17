<!DOCTYPE html>
<html lang="en">
<!-- Head Place -->
<x-admin-head :title="$title" />
@yield('css')


<style>
    #login-btn.no-click {
        pointer-events: none;
    }
</style>


<body class="login-page" style="min-height: 466px;">

    <!-- Preloader -->
    <x-admin-pre-loader />
        @yield('content')
<!-- script -->
<x-admin-script />
@yield('script')
</body>
</html>
<script>
    $(document).ready(function () {
        $('#login-btn').click(function () {
            $(this).html('<div class="spinner-border text-white mr-2 align-self-center loader-sm"></div>Wait...');
            $(this).addClass('no-click');
        });
    })
</script>
