@extends('layout.admin-app-layout', ['title'=>"Users Comments"])


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
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Blog Title</th>
                                    <th>Username</th>
                                    <th>Comment</th>
                                    <th>Is Reply</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Blog Title</th>
                                    <th>Username</th>
                                    <th>Comment</th>
                                    <th>Is Reply</th>
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
                ajax: "{{ route('admin.users.comments.list') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'get_blog.title', name: 'get_blog.title'},
                    {data: 'get_user.username', name: 'get_user.username'},
                    {data: 'comment_text', name: 'comment_text'},
                    {
                        data: 'comment_id',
                        name: 'comment_id',
                        render: function (data, type, full, meta) {
                            return data == null ? '<button type="button" class="btn bg-gradient-success btn-sm disabled">No</button>' : '<button type="button" class="btn bg-gradient-info btn-sm disabled">Yes</button>';
                        }
                    },
                    {
                        data: 'approval',
                        name: 'approval',
                        render: function (data, type, full, meta) {
                            return data == 1 ? '<button type="button" class="btn bg-gradient-success btn-sm disabled">Approved</button>' : '<button type="button" class="btn bg-gradient-info btn-sm disabled">Non-Approved</button>';
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
                var href = "{{ route ('admin.users.comments.delete') }}";
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
                var href = "{{ route ('admin.users.comments.status') }}";
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
                    text: "You want to "+text+" this comment.",
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
