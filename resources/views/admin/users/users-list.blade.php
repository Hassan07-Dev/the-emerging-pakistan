@extends('layout.admin-app-layout', ['title'=>"Users List"])


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
{{--                        <button type="button" id="add_button" class="btn btn-outline-primary float-right"> + Add Blogs--}}
{{--                        </button>--}}
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Verified</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sr. No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Verified</th>
                                <th>Details</th>
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
{{--        <div class="modal fade" id="blog_modal">--}}
{{--            <div class="modal-dialog modal-xl">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h4 class="modal-title"></h4>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <form id="blog_modal_form" onsubmit="return false;" action="" method="POST">--}}
{{--                        @csrf--}}
{{--                        <input name="id" type="hidden">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Category</label>--}}
{{--                                <select class="form-control" name="category_id" id="category_id">--}}
{{--                                    <option selected disabled="disabled"> -- Select Category -- </option>--}}
{{--                                    @foreach($categorys as $category)--}}
{{--                                        <option value="{{ $category->id }}" data-name="{{ $category->category_name }}">{{ $category->category_name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Tags</label>--}}
{{--                                <select class="form-control js-example-basic-multiple" name="tag_id[]" id="tag_id" multiple="multiple">--}}
{{--                                    @foreach($tags as $tag)--}}
{{--                                        <option value="{{ $tag->tag_name }}" data-name="{{ $tag->tag_name }}">{{ $tag->tag_name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Blog Title</label>--}}
{{--                                <input type="text" name="title" class="form-control" id="exampleInputEmail1"--}}
{{--                                       placeholder="Enter title...">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Blog Image</label>--}}
{{--                                <input type="file" name="blog_image" class="form-control" id="exampleInputEmail1">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Arthur</label>--}}
{{--                                <input type="text" name="arthur" class="form-control" id="exampleInputEmail1"--}}
{{--                                       placeholder="Enter arthur...">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Description</label>--}}
{{--                                <textarea name="description" class="form-control" id="description_summernote"></textarea>--}}
{{--                            </div>--}}
{{--                            <div class="form-group active_status">--}}
{{--                                <label for="exampleInputEmail1">Status</label><br>--}}
{{--                                <input type="radio" name="status" value="1" id="option_a1" autocomplete="off"> Active--}}
{{--                                <input type="radio" name="status" value="0" id="option_a2" autocomplete="off"> De-Active--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer justify-content-between">--}}
{{--                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--                            <button type="submit" class="btn btn-primary submit_btn">Save changes</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="modal fade" id="description_modal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">User Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div>
                            <table style="width:100%" class="table table-bordered table-hover" id="description_data">
                            </table>
                        </div>
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
        function getdata() {
            $('#example1').DataTable().clear().destroy();
            var table = $('#example1').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.users.list') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'gender', name: 'gender'},
                    {
                        data: 'email_verified_at',
                        name: 'email_verified_at',
                        render: function (data, type, full, meta) {
                            return data == null ? '<button type="button" class="btn bg-gradient-danger btn-sm disabled">Not Verified</button>' : '<button type="button" class="btn bg-gradient-success btn-sm disabled">Verified</button>';
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render: function (data, type, full, meta) {
                            return '<button type="submit" data-id="'+data+'" class="btn btn-dark btn-sm view_description">View Details</button>';
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function (data, type, full, meta) {
                            return data == 1 ? '<button type="button" class="btn bg-gradient-success btn-sm disabled">Active</button>' : '<button type="button" class="btn bg-gradient-info btn-sm disabled">Blocked</button>';
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

            $(document).on('click', 'a#delete_data', function (e) {
                e.preventDefault();
                var href = "{{ route ('admin.users.delete') }}";
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

            $(document).on('click', 'a#block_data', function (e) {
                e.preventDefault();
                var href = "{{ route ('admin.users.block') }}";
                var id	 = $(this).data('id');
                var val	 = $(this).data('val');
                var text = val == '1'? 'Un-blocked':'Blocked';
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You want to "+text+" this user.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: text,
                    reverseButtons: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post(href,{
                                id: id,
                                val:val,
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

            $(document).on('click', 'button.view_description', function (e) {
                e.preventDefault();
                var href = "{{ route ('admin.users.show') }}";
                var id = $(this).data('id');
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
                        var view_data = data.data.user;
                        console.log(view_data);
                        var output = '';
                        for (const key in view_data) {
                            output += '<tr>'
                                            +'<td class="text-black font-weight-bold">'+key+'</td>'
                                            +'<td>'+view_data[key]+'</td>'
                                        +'</tr>'
                        }
                        $('#description_modal #description_data').html(output);
                        $('#description_modal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            });

            $(document).on('click', 'a#view_data', function (e) {
                e.preventDefault();
                var href = "{{ route ('admin.users.view.status') }}";
                var id	 = $(this).data('id');
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
                        setTimeout(function() {location.reload();}, 1000);
                    }
                })
                .catch(function (error) {
                    if (error.response.data.status == false) {
                        toastr.error(error.response.data.message);
                    }
                });
            });
        });
    </script>
@endsection
