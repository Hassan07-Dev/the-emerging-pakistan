@extends('layout.admin-app-layout', ['title'=>"Blog Category"])


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
                        <button type="button" id="add_button" class="btn btn-outline-primary float-right"> + Add Category
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sr. No</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
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
        <div class="modal fade" id="category_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="category_modal_form" onsubmit="return false;" action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input name="id" type="hidden">
                                <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter Tag Name...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Image</label>
                                <input type="file" name="category_image" class="form-control" id="exampleInputEmail1">
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

    </section>
@endsection

@section('script')
    <script>
        function getdata() {
            $('#example1').DataTable().clear().destroy();
            var table = $('#example1').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.category.list') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'category_name', name: 'category_name'},
                    {
                        data: 'category_image',
                        name: 'category_image',
                        render: function (data, type, full, meta) {
                            path = "{{ env('APP_URL') }}/public/"
                            return '<img src="'+path+data+'" width="150px" alt="No-Images" />';
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
                $('#category_modal').find('.modal-title').text('Add Category Modal');
                $('#category_modal .submit_btn').text('Add Category');
                $('#category_modal_form').attr("action", "{{ route ('admin.category.create') }}");
                $('#category_modal_form').trigger('reset');
                $('#category_modal').modal('show');
                $('.active_status').addClass('d-none');
                $('#category_modal_form .active_status').find('input').removeAttr('name');
            });

            $(document).on('submit', 'form#category_modal_form', function (e) {
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
                            $('#category_modal').modal('hide');
                            toastr.success(data.message);

                        }
                        buttonEnabled('submit_btn', 'Add Category');
                    })
                    .catch(function (error) {
                        if (error.response.data.status == false) {
                            buttonEnabled('submit_btn', 'Add Category');
                            toastr.error(error.response.data.message);
                        }
                    });
            });

            $(document).on('click', 'a#delete_data', function (e) {
                e.preventDefault();
                var href = "{{ route ('admin.category.delete') }}";
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
                var href = "{{ route ('admin.category.show') }}";
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
                            $('#category_modal').find('.modal-title').text('Update Category Modal');
                            $('#category_modal .submit_btn').text('Update Category');
                            $('#category_modal_form').attr("action", "{{ route ('admin.category.update') }}");
                            $('.active_status').removeClass('d-none');
                            $('#category_modal_form .active_status').find('input').attr('name', 'status');
                            var category = data.data.category;
                            $('#category_modal_form input[name="id"]').val(category.id);
                            $('#category_modal_form input[name="category_name"]').val(category.category_name);
                            $('.active_status input[name="status"][value="'+category.status+'"]').prop('checked', true);
                            $('#category_modal').modal('show');
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
        });
    </script>
@endsection
