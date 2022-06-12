@extends('layout.admin-app-layout', ['title'=>"Faq"])


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
                        <button type="button" id="add_button" class="btn btn-outline-primary float-right"> + Add Faq
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sr. No</th>
                                <th>Question</th>
                                <th>Answer</th>
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
        <div class="modal fade" id="faq_modal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="faq_modal_form" onsubmit="return false;" action="" method="POST">
                        @csrf
                        <input name="id" type="hidden">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Question</label>
                                <input type="text" name="faq_question" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter Question...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Answer</label>
                                <textarea name="faq_answer" class="form-control" id="description_summernote"></textarea>
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
                        <h4 class="modal-title">Answer</h4>
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
                ajax: "{{ route('admin.faq.edit') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'faq_question', name: 'faq_question'},
                    {
                        data: 'faq_answer',
                        name: 'faq_answer',
                        render: function (data, type, full, meta) {
                            return '<button type="submit" data-description="'+data+'" class="btn btn-warning btn-sm view_description">View Answer</button>';
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
                $('#faq_modal').find('.modal-title').text('Add Faq Modal');
                $('#faq_modal .submit_btn').text('Add Faq');
                $('#faq_modal_form').attr("action", "{{ route ('admin.faq.create') }}");
                $('#faq_modal_form').trigger('reset');
                $('#description_summernote').summernote('code', '');
                $('#faq_modal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('.active_status').addClass('d-none');
                $('#faq_modal_form .active_status').find('input').removeAttr('name');
            });

            $(document).on('submit', 'form#faq_modal_form', function (e) {
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
                            $('#faq_modal').modal('hide');
                            toastr.success(data.message);

                        }
                        buttonEnabled('submit_btn', 'Add Faq');
                    })
                    .catch(function (error) {
                        if (error.response.data.status == false) {
                            buttonEnabled('submit_btn', 'Add Faq');
                            toastr.error(error.response.data.message);
                        }
                    });
            });

            $(document).on('click', 'a#delete_data', function (e) {
                e.preventDefault();
                var href = "{{ route ('admin.faq.delete') }}";
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
                var href = "{{ route ('admin.faq.show') }}";
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
                            $('#faq_modal').find('.modal-title').text('Update Faq Modal');
                            $('#faq_modal .submit_btn').text('Update Faq');
                            $('#faq_modal_form').attr("action", "{{ route ('admin.faq.update') }}");
                            $('.active_status').removeClass('d-none');
                            $('#faq_modal_form .active_status').find('input').attr('name', 'status');
                            var faq = data.data.faq;
                            console.log(faq);
                            $('#faq_modal_form input[name="id"]').val(faq.id);
                            $('#faq_modal_form input[name="faq_question"]').val(faq.faq_question);
                            $('#description_summernote').summernote('code', faq.faq_answer);
                            $('.active_status input[name="status"][value="'+faq.status+'"]').prop('checked', true);
                            $('#faq_modal').modal({
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


