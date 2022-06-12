@extends('layout.admin-app-layout', ['title'=>"Services"])


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
                        <button type="button" id="add_button" class="btn btn-outline-primary float-right"> + Add Service
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Service Name</th>
                                    <th>Service logo</th>
                                    <th>Service Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Service Name</th>
                                    <th>Service logo</th>
                                    <th>Service Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
        {{-- Modal --}}
        <div class="modal fade" id="services_modal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="services_modal_form" onsubmit="return false;" action="" method="POST">
                        @csrf
                        <input name="id" type="hidden">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service Title</label>
                                <input type="text" name="service_name" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter title...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service Logo</label>
                                <input type="text" name="service_logo" class="form-control" id="exampleInputEmail1" placeholder="Enter Icon Class">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service Image</label>
                                <input type="file" name="service_image" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="description" class="form-control" id="description_summernote"></textarea>
                            </div>
                            <div class="form-group active_status">
                                <label for="exampleInputEmail1">Status</label><br>
                                <input type="radio" name="status" value="1" id="option_a1" autocomplete="off"> Active
                                <input type="radio" name="status" value="0" id="option_a2" autocomplete="off"> De-Active
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary submit_btn">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="description_modal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Description</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="description_data"></div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('script')
    <script>
        $('#description_summernote').summernote({
            height: 400,
            minHeight: null,
            maxHeight: null,
            focus: true,
            fontSizeUnits: ['px', 'pt'],
            dialogsInBody: false,
            dialogsFade: false,
            tooltip: false,
            onInit : function(){
                $('.note-editor [data-name="ul"]').tooltip('disable');
            },
            toolbar: [
                ['para', ['ul']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript','fontname','fontsize','fontsizeunit','color','forecolor','backcolor','italic','underline','clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['Insert', ['picture','link','video','table','hr']],
                ['Other', ['fullscreen', 'codeview']],
            ],
        });
        $('.js-example-basic-multiple').select2();

        function getdata() {
            $('#example1').DataTable().clear().destroy();
            var table = $('#example1').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.services.edit') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'service_name', name: 'service_name'},
                    {
                        data: 'service_logo',
                        name: 'service_logo',
                        render: function (data, type, full, meta) {
                            return '<i class="'+data+'" style="font-size: 60px;color: #ff4040;"></i>';
                        }
                    },
                    {
                        data: 'service_image',
                        name: 'service_image',
                        render: function (data, type, full, meta) {
                            path = window.location.protocol + '//' + window.location.hostname + '/digital-agency-pakistan/public/';
                            return '<img src="'+path+data+'" width="150px" />';
                        }
                    },
                    {
                        data: 'description',
                        name: 'description',
                        render: function (data, type, full, meta) {
                            return '<button type="submit" data-description="'+data+'" class="btn btn-warning btn-sm view_description">View Description</button>';
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function (data, type, full, meta) {
                            return data == 1 ? '<button type="button" class="btn bg-gradient-success btn-sm disabled">Active</button>' : '<button type="button" class="btn bg-gradient-info btn-sm disabled">De-Active</button>';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }

        $(document).ready(function () {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            getdata();

            $(document).on('click', '#add_button', function (e) {
                e.preventDefault();
                $('#services_modal').find('.modal-title').text('Add Services Modal');
                $('#services_modal .submit_btn').text('Add Services');
                $('#services_modal_form').attr("action", "{{ route ('admin.services.create') }}");
                $('#services_modal_form').trigger('reset');
                $('#description_summernote').summernote('code', '');
                $('#services_modal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('.active_status').addClass('d-none');
                $('#services_modal_form .active_status').find('input').removeAttr('name');
            });

            $(document).on('submit', 'form#services_modal_form', function (e) {
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
                            getdata();
                            $('#services_modal').modal('hide');
                            toastr.success(data.message);

                        }
                        buttonEnabled('submit_btn', 'Add Service');
                    })
                    .catch(function (error) {
                        if (error.response.data.status == false) {
                            buttonEnabled('submit_btn', 'Add Service');
                            toastr.error(error.response.data.message);
                        }
                    });
            });

            $(document).on('click', 'a#delete_data', function (e) {
                e.preventDefault();
                var href = "{{ route ('admin.services.delete') }}";
                var id	 = $(this).data('id');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post(href,{
                                id: id,
                            },
                        )
                            .then(function (response) {
                                data = response.data;
                                if(data.status == false){
                                    toastr.error(data.message);
                                } else if(data.status == true){
                                    getdata();
                                    toastr.success(data.message);
                                }
                            })
                            .catch(function (error) {
                                if (error.response.data.status == false) {
                                    toastr.error(error.response.data.message);
                                }
                            });
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        toastr.error('Your imaginary file is safe :)');
                    }
                });
            });

            $(document).on('click', '#edit_data', function (e) {
                e.preventDefault();
                var href = "{{ route ('admin.services.show') }}";
                var id	 = $(this).data('id');
                axios.post(href, {
                        id: id
                    },
                )
                    .then(function (response) {
                        var data = response.data;
                        console.log(data);
                        if(data.status == false){
                            toastr.error(data.message);
                        } else if(data.status == true){
                            $('#services_modal').find('.modal-title').text('Update Service Modal');
                            $('#services_modal .submit_btn').text('Update Service');
                            $('#services_modal_form').attr("action", "{{ route ('admin.services.update') }}");
                            $('.active_status').removeClass('d-none');
                            $('#services_modal_form .active_status').find('input').attr('name', 'status');
                            var services = data.data.services;
                            console.log(services);
                            $('#services_modal_form input[name="id"]').val(services.id);
                            $('#services_modal_form input[name="service_name"]').val(services.service_name);
                            $('#services_modal_form input[name="service_logo"]').val(services.service_logo);
                            $('#description_summernote').summernote('code', services.description);
                            $('.active_status input[name="status"][value="'+services.status+'"]').prop('checked', true);
                            $('#services_modal').modal({
                                backdrop: 'static',
                                keyboard: false
                            });
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });

            $(document).on('click', 'button.view_description', function (e) {
                e.preventDefault();
                $('#description_modal #description_data').html($(this).data('description'));
                $('#description_modal').modal('show');
            });
        });
    </script>
@endsection

