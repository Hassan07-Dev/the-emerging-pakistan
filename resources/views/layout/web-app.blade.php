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
<script>
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
