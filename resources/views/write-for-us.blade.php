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
                                <form id="blog_modal_form" onsubmit="return false;"
                                      action="http://localhost/digital-agency-pakistan/admin/blog/blog/create"
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
                                            <option selected="" disabled="disabled"> -- Select Category -- </option>
                                            <option value="4" data-name="Computer Science">Computer Science</option>
                                            <option value="5" data-name="SEO">SEO</option>
                                            <option value="6" data-name="Digital Marketing">Digital Marketing
                                            </option>
                                            <option value="7" data-name="Mobile Development">Mobile Development
                                            </option>
                                            <option value="8" data-name="Graphics Design">Graphics Design</option>
                                            <option value="9" data-name="iOS Development">iOS Development</option>
                                            <option value="10" data-name="Q/A Automations">Q/A Automations</option>
                                            <option value="11" data-name="Wordpress Development">Wordpress
                                                Development</option>
                                            <option value="12" data-name="Backend Developer">Backend Developer
                                            </option>
                                            <option value="13" data-name="SEO Services">SEO Services</option>
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
                                        <textarea name="description" class="form-control"
                                                  id=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tags <span class="text-danger">*</span></label>
                                        <select class="form-control" name="tag_id[]" id="tag_id" multiple=""
                                                tabindex="-1" aria-hidden="true" data-select2-id="tag_id">
                                            <option value="27" data-name="Graphics">Graphics</option>
                                            <option value="28" data-name="Web">Web</option>
                                            <option value="29" data-name="UI/UX">UI/UX</option>
                                            <option value="30" data-name="Computer">Computer</option>
                                            <option value="31" data-name="Development">Development</option>
                                            <option value="32" data-name="Design">Design</option>
                                            <option value="33" data-name="Business">Business</option>
                                            <option value="34" data-name="Technology">Technology</option>
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
        $(document).ready(function () {
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
        });
    </script>
@endsection
