@extends('layout.admin-app-layout', ['title'=>"Pages Data"])


@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Page Data</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <select id="get_page_data" class="form-control">
                        <option selected disabled="disabled"> -- Select Page -- </option>
                        @foreach(\App\HelpersFunction\Constants::pages as $page)
                            <option value="{{ $page }}">{{ \Illuminate\Support\Str::title(str_replace('_', ' ', $page)) }}</option>
                        @endforeach
                        <option></option>
                    </select>
                </div>
                <div id="fetch_data" class="d-none">
                    <form id="meta_data_form" onsubmit="return false;" action="" method="POST">
                        @csrf
                        <input name="page_name" id="page_name" type="hidden">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control"
                                   placeholder="Enter title...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" class="form-control"
                                      placeholder="Enter description..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                                   placeholder="Enter title...">
                        </div>
                        <div class="modal-footer justify-content-end">
                            <button type="submit" class="btn btn-primary submit_btn">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection

@section('script')
    <script>
        $(document).on('change', '#get_page_data', function () {
            var page_name = this.value;
            if(page_name != ''){
                axios.post("{{ route('admin.pages.fetch')}}",
                    {
                        page_name: page_name,
                    }
                )
                    .then(function (response) {
                        console.log(response);
                        data = response.data;
                        if(data.status == false){
                            toastr.error(data.message);
                        } else if(data.status == true){
                            $("#page_name").val(data.data.page_name);
                            $("#meta_title").val(data.data.title);
                            $("#meta_description").val(data.data.description);
                            $("#meta_keywords").val(data.data.keywords);
                            $('#fetch_data').removeClass('d-none');
                            toastr.success(data.message);
                        }
                    })
                    .catch(function (error) {
                        if (error.response.data.status == false) {
                            toastr.error(error.response.data.message);
                        }
                    });
            } else {
                $('#fetch_data').addClass('d-none');
                $('#get_page_data').trigger('reset');
            }
        });
        $(document).on('submit', 'form#meta_data_form', function (e) {
            e.preventDefault();
            var formdata = new FormData(this);
            axios.post("{{ route('admin.pages.update')}}",
                formdata,
                buttonDisable('submit_btn')
            )
                .then(function (response) {
                    data = response.data;
                    if(data.status == false){
                        toastr.error(data.message);
                    } else if(data.status == true){
                        toastr.success(data.message);
                        buttonEnabled('submit_btn', 'Save Changes');
                    }
                })
                .catch(function (error) {
                    if (error.response.data.status == false) {
                        buttonEnabled('submit_btn', 'Save Changes');
                        toastr.error(error.response.data.message);
                    }
                });
        });
    </script>
@endsection

