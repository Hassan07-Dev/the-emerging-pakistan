@extends('layout.admin-app-layout', ['title'=>"Users Blogs"])


@section('content')
    <style>
        #description_data img{
            width: 100%;
        }
    </style>
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
                                <th>Blog Title</th>
                                <th>Category</th>
                                <th>Tag List</th>
                                <th>Arthur</th>
                                <th>Blog Image</th>
                                <th>Description</th>
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
                                <th>Blog Title</th>
                                <th>Category</th>
                                <th>Tag List</th>
                                <th>Arthur</th>
                                <th>Blog Image</th>
                                <th>Description</th>
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
        <div class="modal fade" id="blog_modal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="blog_modal_form" onsubmit="return false;" action="" method="POST">
                        @csrf
                        <input name="id" type="hidden">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option selected disabled="disabled"> -- Select Category -- </option>
                                    @foreach($categorys as $category)
                                        <option value="{{ $category->id }}" data-name="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tags</label>
                                <select class="form-control js-example-basic-multiple" name="tag_id[]" id="tag_id" multiple="multiple">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->tag_name }}" data-name="{{ $tag->tag_name }}">{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Blog Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter title...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Blog Image</label>
                                <input type="file" name="blog_image" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arthur</label>
                                <input type="text" name="arthur" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter arthur...">
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
        function getdata() {
            $('#example1').DataTable().clear().destroy();
            var table = $('#example1').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.blog.list.users') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'get_user.username', name: 'get_user.username'},
                    {data: 'get_user.email', name: 'get_user.email'},
                    {data: 'title', name: 'title'},
                    {data: 'category.category_name', name: 'category.category_name'},
                    {
                        data: 'get_tags',
                        name: 'get_tags',
                        render: function (data, type, full, meta) {
                            // console.log(data);
                            let output = '';
                            data.forEach(function(element) {
                                output+='<button type="button" data-id="'+element.id+'" class="btn btn-outline-secondary btn-sm disabled">'+element.tag_name+'</button>';
                            });
                            return output;
                        },
                        searchable: true
                    },
                    {data: 'arthur', name: 'arthur'},
                    {
                        data: 'blog_image',
                        name: 'blog_image',
                        render: function (data, type, full, meta) {
                            // path = window.location.protocol + '//' + window.location.hostname + '/digital-agency-pakistan/public/';
                            path = "{{ env('APP_URL') }}/public/"
                            return '<img src="'+path+data+'" width="150px" />';
                        }
                    },
                    {
                        data: 'description',
                        name: 'description',
                        render: function (data, type, full, meta) {
                            return '<button type="submit" data-description="'+data+'" class="btn btn-warning btn-sm view_description">Description</button>';
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
                var href = "{{ route ('admin.blog.delete') }}";
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

            $(document).on('click', 'a.change_status_data', function (e) {
                e.preventDefault();
                var href = "{{ route ('admin.blog.users.status') }}";
                var id	 = $(this).data('id');
                var val	 = $(this).data('val');
                var text = val == '1'? 'Approve':'Disable';
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
                        toastr.error('Your imaginary row is safe :)');
                    }
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
