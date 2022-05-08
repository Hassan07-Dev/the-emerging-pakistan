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
                        <button type="button" id="add_button" class="btn btn-outline-primary float-right"> + Add Blogs
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Blog Title</th>
                                <th>Category</th>
                                <th>Tag List</th>
                                <th>Arthur</th>
                                <th>Blog Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--                                @foreach($tags as $tag)--}}
                            {{--                                    <tr>--}}
                            {{--                                        <td>{{ $tag->id }}</td>--}}
                            {{--                                        <td>{{ $tag->tag_name }}</td>--}}
                            {{--                                        <td>--}}
                            {{--                                            @if($tag->status == 1)--}}
                            {{--                                                <button type="button" class="btn bg-gradient-success btn-sm disabled">Active</button>--}}
                            {{--                                            @else--}}
                            {{--                                                <button type="button" class="btn bg-gradient-info btn-sm disabled">De-Active</button>--}}
                            {{--                                            @endif--}}
                            {{--                                        </td>--}}
                            {{--                                        <td>--}}
                            {{--                                            <button type="button" id="edit_data" class="btn fa-solid fa-file-pen" data-id="{{ $tag->id }}" data-href="{{ route ('admin.blog.show') }}"></button>--}}
                            {{--                                            <button type="button" id="delete_data" class="btn fa-solid fa-trash-arrow-up " data-id="{{ $tag->id }}" data-href="{{ route ('admin.blog.delete') }}"></button>--}}
                            {{--                                        </td>--}}
                            {{--                                    </tr>--}}
                            {{--                                @endforeach--}}
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sr. No</th>
                                <th>Blog Title</th>
                                <th>Category</th>
                                <th>Tag List</th>
                                <th>Arthur</th>
                                <th>Blog Image</th>
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
                                        <option value="{{ $tag->id }}" data-name="{{ $tag->tag_name }}">{{ $tag->tag_name }}</option>
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
                            <button type="submit" class="btn btn-primary submit_btn">Save changes</button>
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
                ajax: "{{ route('admin.blog.list') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'category.category_name', name: 'category.category_name'},
                    {
                        data: 'tag_id',
                        name: 'tag_id',
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
                $('#blog_modal').find('.modal-title').text('Add Blog Modal');
                $('#blog_modal .submit_btn').text('Add Blog');
                $('#blog_modal_form').attr("action", "{{ route ('admin.blog.create') }}");
                $('#blog_modal_form').trigger('reset');
                $('.js-example-basic-multiple').select2('destroy').find('option').prop('selected', false).end().select2();
                $('#description_summernote').summernote('code', '');
                $('#blog_modal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('.active_status').addClass('d-none');
                $('#blog_modal_form .active_status').find('input').removeAttr('name');
            });

            $(document).on('submit', 'form#blog_modal_form', function (e) {
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
                            $('#blog_modal').modal('hide');
                            toastr.success(data.message);

                        }
                        buttonEnabled('submit_btn', 'Add Tag');
                    })
                    .catch(function (error) {
                        if (error.response.data.status == false) {
                            buttonEnabled('submit_btn', 'Add Tag');
                            toastr.error(error.response.data.message);
                        }
                    });
            });

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

            $(document).on('click', '#edit_data', function (e) {
                e.preventDefault();
                var href = "{{ route ('admin.blog.show') }}";
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
                        $('#blog_modal').find('.modal-title').text('Update Blog Modal');
                        $('#blog_modal .submit_btn').text('Update Blog');
                        $('#blog_modal_form').attr("action", "{{ route ('admin.blog.update') }}");
                        $('.active_status').removeClass('d-none');
                        $('#blog_modal_form .active_status').find('input').attr('name', 'status');
                        var blog = data.data.blog;
                        console.log(blog);
                        $('#blog_modal_form input[name="id"]').val(blog.id);
                        $('#blog_modal_form input[name="arthur"]').val(blog.arthur);
                        $('#blog_modal_form input[name="title"]').val(blog.title);
                        $('#description_summernote').summernote('code', blog.description);
                        $('#blog_modal_form select[name="category_id"] option[value="'+blog.category.id+'"]').prop('selected', true);
                        tags = [];
                        tag = blog.tag_id;
                        tag.forEach(function(element) {
                            tags.push(element.id);
                        });
                        $('.js-example-basic-multiple').select2().val(tags).trigger('change');
                        $('.active_status input[name="status"][value="'+blog.status+'"]').prop('checked', true);
                        $('#blog_modal').modal({
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
