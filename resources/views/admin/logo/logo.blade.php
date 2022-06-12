@extends('layout.admin-app-layout', ['title'=>"Blogs"])


@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
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
                <div class="row">
                    <div class="col-12">
                        <form id="logo_form" onsubmit="return false;" action="{{ route ('admin.logo.update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Blog Image</label>
                                <input type="file" name="logo_image" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group" id="thisdiv">
                                <img src="{{ env ('APP_URL').'/public/'.$data->logo_image }}" width="200px" height="100px">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary submit_btn">Update Logo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', 'form#logo_form', function (e) {
                e.preventDefault();
                var form = this;
                axios.post($(form).attr('action'),
                    new FormData(form),
                    buttonDisable('submit_btn')
                )
                    .then(function (response) {
                        data = response.data;
                        if(data.status == false){
                            toastr.error(data.message);
                        } else if(data.status == true){
                            $('#logo_form').trigger('reset');
                            $('#thisdiv').load(document.URL +  ' #thisdiv');
                            toastr.success(data.message);
                        }
                        buttonEnabled('submit_btn', 'Update Logo');
                    })
                    .catch(function (error) {
                        if (error.response.data.status == false) {
                            buttonEnabled('submit_btn', 'Update Logo');
                            toastr.error(error.response.data.message);
                        }
                    });
            });
        });
    </script>
@endsection
