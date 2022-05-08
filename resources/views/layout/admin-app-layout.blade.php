<!DOCTYPE html>
<html lang="en">
    <!-- Head Place -->
    <x-admin-head :title="$title" />
    @yield('css')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <x-admin-pre-loader />

        <!-- Navbar -->
        <x-admin-nav />

        <!-- Main Sidebar Container -->
        <x-admin-sidebar />

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Page header -->
            <x-admin-header :title="$title" />

            <!-- Main content -->
                @yield('content')
            <!-- /.content -->
        </div>

            <!-- Footer -->
            <x-admin-footer />

    </div>
    <!-- script -->
    <x-admin-script />
        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            });
            //Btn disable function
            function buttonDisable(name) {
                $("." + name).html('<i class="fas fa-circle-notch fa-spin"></i>&nbsp;Please wait...');
                $("." + name).attr('disabled', 'disabled');
            }

            //Btn enable function
            function buttonEnabled(name, message) {
                $("." + name).html(message);
                $("." + name).removeAttr('disabled');
            }

            //Loader Start Function
            function loader() {
                Swal.fire({
                    html: "Loading Data",
                    didOpen: () => {
                        Swal.showLoading()
                    },
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            }

            //Loader Close Function
            function closeLoader() {
                Swal.close();
            }
        </script>
        @yield('script')
</body>
</html>


