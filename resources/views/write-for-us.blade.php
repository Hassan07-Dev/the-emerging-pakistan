@extends('layout.web-app', ['title'=>"Home"])


@section('content')
    <section class="bg-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <h1>Submit Your Article</h1>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <form id="blog_modal_form"
                                      action="{{ route('blog.create') }}"
                                      method="POST">
                                    <input name="id" type="hidden">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Post Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter title...">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option selected disabled="disabled"> -- Select Category -- </option>
                                            @foreach($categorys as $category)
                                                <option value="{{ $category->id }}" data-name="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Featured Image <span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="blog_image" class="form-control"
                                               id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Post Content <span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" class="form-control"
                                                  id="description_summernote"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Excerpt <span
                                                class="text-danger">*</span></label>
                                        <textarea name="excerpt" class="form-control"
                                                  id=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tags <span class="text-danger">*</span></label>
                                        <select class="form-control" name="tag_id[]" id="tag_id" multiple=""
                                                tabindex="-1" aria-hidden="true" data-select2-id="tag_id">
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->tag_name }}" data-name="{{ $tag->tag_name }}">{{ $tag->tag_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary submit_btn">Add Post</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <div class="svq-sidebar-page primary-sidebar" id="primary-sidebar"
                                     style="margin-top: 4rem;">
                                    <div class="svq-sidebar-content widget-area " data-stick-to="primary-sidebar"
                                         data-top="80">
                                        <div id="custom_html-7" class="widget_text widget clearfix widget_custom_html">
                                            <h4>Posting Guidelines</h4>
                                            <div class="textwidget custom-html-widget">
                                                <p>We do <strong><span style="color:red;">NOT</span></strong> allow
                                                    posting of objectionable content on our website. </p>

                                                <p>1. Any kind of <strong><span style="color:red;"><u><a
                                                                    href="https://support.google.com/publisherpolicies/answer/10400657?hl=en&amp;amp;ref_topic=10741907"
                                                                    data-wpel-link="external" target="_blank"
                                                                    rel="nofollow external" class="extlink">sexual
                                                                    content</a></u></span></strong> ( eg. nudity,
                                                    escorts, sex toys, sexual enhancement pills etc.) will be
                                                    immediately deleted and the author disabled from further posting.
                                                </p>

                                                <p>2. <strong><span style="color:red;"><u><a
                                                                    href="https://developers.google.com/search/docs/advanced/guidelines/scraped-content"
                                                                    data-wpel-link="external" target="_blank"
                                                                    rel="nofollow external"
                                                                    class="extlink">Scraped</a></u></span></strong> /
                                                    copied content or content with no added value will be removed.</p>

                                                <p>3. Any content which talks of Market Analysis / Industry Analysis /
                                                    Market Trends etc. will be deleted.</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        $('#tag_id').select2({
            tags: true
        });

        $(document).ready(function () {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', 'form#blog_modal_form', function (e) {
                e.preventDefault();
                var formdata = new FormData(this);
                axios.post($(this).attr('action'),
                    formdata,
                    buttonDisable('submit_btn')
                )
                .then(function (response) {
                    data = response.data;
                    if(data.status == false){
                        toastr.error(data.message);
                    } else if(data.status == true){
                        toastr.success(data.message);
                        $('form#blog_modal_form').trigger('reset');
                        window.location = "{{ route('home.index') }}";
                    }
                    buttonEnabled('submit_btn', 'Add Post');
                })
                .catch(function (error) {
                    if (error.response.data.status == false) {
                        buttonEnabled('submit_btn', 'Add Blog');
                        toastr.error(error.response.data.message);
                    }
                });
            });
        });
    </script>
@endsection
