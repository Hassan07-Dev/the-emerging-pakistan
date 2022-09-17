@extends('layout.web-app', ['title'=>"Blog Details"])


@section('content')
    <div class="page-content bg-white">
        <div class="content-block">
            <!-- About Us -->
            <div class="section-full content-inner bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-7 col-sm-12 col-12">
                            <div class="blog-post blog-single blog-post-style-2 sidebar">
                                <div class="dlab-post-info">
                                    <div class="dlab-post-meta">
                                        <div class="date">
                                            {{ \Carbon\Carbon::parse ($blog_details->created_at)->format ('d') }}<span></span>{{ \Carbon\Carbon::parse ($blog_details->created_at)->format ('m') }}<span></span>{{ \Carbon\Carbon::parse ($blog_details->created_at)->format ('Y') }}
                                        </div>
                                    </div>
                                    <div class="dlab-post-title">
                                        <h2 class="post-title" id="post-title" data-id="{{ $blog_details->id }}">{{ $blog_details->title }}</h2>
                                        <!-- <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu mauris eget
                                            velit blandit pulvinar. Etiam tempus aliquet lectus tortor.</h4> -->
                                    </div>
                                    <div class="dlab-divider divider-2px bg-gray-dark"><i class="icon-dot c-square"></i>
                                    </div>
                                    <div class="dlab-post-text text">
                                        <div class="wp-block-image alignwide">
                                            <figure class="aligncenter">
                                                <img src="{{ asset($blog_details->blog_image) }}" alt="Featured Image">
                                            </figure>
                                        </div>
                                        {!! html_entity_decode ($blog_details->description) !!}

                                    </div>
                                    <div class="dlab-post-tags d-flex">
                                        <div class="post-tags">
                                            <a href="javascript:void(0);">Creative</a>
                                            <a href="javascript:void(0);">Media</a>
                                            <a href="javascript:void(0);">Fashion</a>
                                            <a href="javascript:void(0);">Photography</a>
                                        </div>
                                        <div class="share-post ml-auto">
                                            <ul class="slide-social">
                                                <li>Share:</li>
                                                <li><a href="https://api.whatsapp.com/send?text={{ url('blog/details').'/'.$blog_details->slug }}" target="_blank" class="btn-link"><i class="fa fa-whatsapp"></i></a></li>
                                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url('blog/details').'/'.$blog_details->slug }}" target="_blank" class="btn-link"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url={{ url('blog/details').'/'.$blog_details->slug }}" target="_blank" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="https://www.instagram.com/?url={{ url('blog/details').'/'.$blog_details->slug }}" target="_blank" class="btn-link"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="http://twitter.com/share?text=&url={{ url('blog/details').'/'.$blog_details->slug }}&hashtags=" target="_blank" class="btn-link"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="javascript:void(0);" data-href="{{ url('blog/details').'/'.$blog_details->slug }}" class="btn-link embeded_link"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="min-container">
{{--                               <div class="post-btn">--}}
{{--                                    <div class="prev-post">--}}
{{--                                        <img src="images/blog/recent-blog/pic2.jpg" alt="" />--}}
{{--                                        <h6 class="title"><a href="post-standart">All Time for Christmas and Beyond</a></h6>--}}
{{--                                    </div>--}}
{{--                                    <div class="next-post">--}}
{{--                                        <h6 class="title"><a href="post-standart-alternative">Best Beauty Instagrams of the--}}
{{--                                                Week</a></h6>--}}
{{--                                        <img src="images/blog/recent-blog/pic1.jpg" alt="" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="author-box blog-user m-b60">--}}
{{--								<div class="author-profile-info">--}}
{{--									<div class="author-profile-pic">--}}
{{--										<img src="images/testimonials/pic1.jpg" alt="">--}}
{{--									</div>--}}
{{--									<div class="author-profile-content">--}}
{{--										<h6>Kelsey Holmes</h6>--}}
{{--										<p>Aenean sollicitudin, lorem quis biber idum auctor anisi elit consequat happ--}}
{{--											quam vel enim augue. Donec efficitur eget ligula mauris eleifend magna.</p>--}}
{{--										<ul class="list-inline m-b0">--}}
{{--											<li><a href="javascript:void(0);" class="btn-link"><i--}}
{{--														class="fa fa-facebook"></i></a></li>--}}
{{--											<li><a href="javascript:void(0);" class="btn-link"><i--}}
{{--														class="fa fa-google-plus"></i></a></li>--}}
{{--											<li><a href="javascript:void(0);" class="btn-link"><i--}}
{{--														class="fa fa-instagram"></i></a></li>--}}
{{--											<li><a href="javascript:void(0);" class="btn-link"><i--}}
{{--														class="fa fa-twitter"></i></a></li>--}}
{{--										</ul>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--                                <div class="">--}}
                                    {{--								<h6 class="widget-title">You Might Also Like</h6>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">--}}
{{--                                            <div class="category-box overlay m-b30">--}}
{{--                                                <div class="category-media">--}}
{{--                                                    <img src="images/category/pic1.jpg" alt="">--}}
{{--                                                </div>--}}
{{--                                                <div class="category-info">--}}
{{--                                                    <h6 class="title m-b0"><a href="post-standart">Dress Like a--}}
{{--                                                            Parisian</a>--}}
{{--                                                    </h6>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">--}}
{{--                                            <div class="category-box overlay m-b30">--}}
{{--                                                <div class="category-media">--}}
{{--                                                    <img src="images/category/pic2.jpg" alt="">--}}
{{--                                                </div>--}}
{{--                                                <div class="category-info">--}}
{{--                                                    <h6 class="title m-b0"><a href="post-standart">Night Look--}}
{{--                                                            Holiday</a>--}}
{{--                                                    </h6>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">--}}
{{--                                            <div class="category-box overlay m-b30">--}}
{{--                                                <div class="category-media">--}}
{{--                                                    <img src="images/category/pic3.jpg" alt="">--}}
{{--                                                </div>--}}
{{--                                                <div class="category-info">--}}
{{--                                                    <h6 class="title m-b0"><a href="post-standart">The Best Warm--}}
{{--                                                            Coats</a></h6>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="clear m-b30" id="comment-list">
                                    <div class="comments-area" id="comments">
                                        <h6 class="comments-title" id="comment_count"></h6>
                                        <div>
                                            <ol class="comment-list">

                                            </ol>
                                            <!-- Form -->
                                            <div class="comment-respond" id="respond">
                                                <h3 class="comment-reply-title" id="reply-title">Leave a Reply <small> <a
                                                            style="display:none;" href="#" id="cancel-comment-reply-link"
                                                            rel="nofollow">Cancel reply</a> </small> </h3>
                                                <form class="comment-form" id="commentform" method="POST">
                                                    <input type="hidden" name="blog_id" id="put_id" value="">
                                                    <input type="hidden" name="comment_id" id="put_comment_id" value="">
                                                    <p class="comment-form-author">
                                                        <label for="author">Name <span class="required">*</span></label>
                                                        <input type="text" value="" placeholder="Author" id="author" name="name">
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <label for="email">Email <span class="required">*</span></label>
                                                        <input type="text" value="" placeholder="Email" id="email" name="email">
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">Comment</label>
                                                        <textarea rows="8" name="comment" placeholder="Add a Comment"
                                                                  id="comment"></textarea>
                                                    </p>
                                                    <p class="form-submit">
                                                        <input type="submit" value="Post Comment" class="submit"
                                                               id="submit">
                                                    </p>
                                                </form>
                                            </div>
                                            <!-- Form END -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-12 col-12">
                            <div class="side-bar p-l30 sticky-top">
                                <x-right-sidebar />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Us End -->
        </div>
        <!-- contact area END -->
    </div>
@endsection

@section('script')
    <script>
        var imageUrl = "@php env ('IMAGE_URL') @endphp"
        var SITEURL = "{{ route('comments.list') }}";
        var page = 1; //track user scroll as page number, right now page number is 1
        loadComments();

        function loadComments(){
            var blog_id = $('#post-title').data('id');
            axios.post(SITEURL, {
                blog_id:blog_id,
            })
            .then(function (response) {
                console.log(response.data);
                data = response.data;
                if(data.status == false){
                    toastr.error(data.message);
                } else if(data.status == true){
                    var arr = data.data;
                    $("#comment_count").html(arr.length +" Comments");
                    var value = dataRender(arr);
                    $('.comment-list').html(value);
                }
            })
            .catch(function (error) {
                console.log(error);
                if (error.response.data.status == false) {
                    toastr.error(error.response.data.message);
                }
            });
        }

        function dataRender(res) {
            var output = '';
            var replies = '';
            if(res.length>0) {
                res.forEach(function (element) {
                    output += '<li class="comment">'
                        + '<div class="comment-body">'
                        + '<div class="comment-author vcard"> <img class="avatar photo" src="{{ asset ('images/single_comment.png') }}" alt=""> <cite class="fn">' + element.name + '</cite> <span class="says">says:</span> </div>'
                        + '<div class="comment-meta"> <a href="javascript:void(0);">'+moment(element.created_at).format('MMMM Do YYYY')+' at '+moment(element.created_at).format('h:mm a')+'</a> </div>'
                        + '<p>' + element.comment_text + '</p>'
                        + '<div class="reply"> <a href="javascript:void(0);" class="comment-reply-link reply_click" data-id="' + element.id + '">Reply</a> </div>'
                        + '</div>'
                        + '<ol class="children">';
                    replies = element.comment_replies;
                    if (replies.length > 0) {
                        replies.forEach(function (reply) {
                            output += '<li class="comment odd parent">'
                                + '<div class="comment-body">'
                                + '<div class="comment-author vcard"> <img class="avatar photo" src="{{ asset ('images/reply_comment.png') }}" alt=""> <cite class="fn">' + reply.name + '</cite> <span class="says">says:</span> </div>'
                                + '<div class="comment-meta"> <a href="javascript:void(0);">October 6, 2020 at 7:15 am</a> </div>'
                                + '<p>'+reply.comment_text+'</p>'
                                + '</div>'
                                + '</li>';
                        });
                    }
                    output += '</ol>'
                        + '</li>';
                });
            }
            return output;
        }

        $(document).ready(function () {
            $(document).on('submit', '#commentform', function (e) {
                e.preventDefault();
                var blog_id = $('#post-title').data('id');
                $("#put_id").val(blog_id);
                var href = "{{ route ('add_comments.index') }}"
                axios({
                    method: 'POST',
                    url: href,
                    data: $(this).serialize()
                })
                .then(function (response) {
                    console.log(response.data);
                    data = response.data;
                    if(data.status == false){
                        toastr.error(data.message);
                    } else if(data.status == true){
                        toastr.success(data.message);
                        loadComments();
                        $('#commentform').trigger("reset");
                    }
                })
                .catch(function (error) {
                    console.log(error);
                    if (error.response.data.status == false) {
                        toastr.error(error.response.data.message);
                    }
                });
            });

            $(document).on('click', '.reply_click', function () {
                var comment_id = $(this).data('id');
                $("#put_comment_id").val(comment_id);
                $('html,body').animate({ scrollTop: $('#respond').offset().top}, 1000);
            });

            $(document).ready(function () {
                $(document).on('click', '#load_more_btn', function (e) {
                    e.preventDefault();
                    page++; //page number increment
                    load_more(page); //load content
                });

                $(document).on('click', '.embeded_link', function (e) {
                    e.preventDefault();
                    var url_d = $(this).data('href');
                    navigator.clipboard.writeText(url_d).then(function() {
                        toastr.success("Copied to clipboard!");
                        console.log('Async: Copying to clipboard was successful!');
                    }, function(err) {
                        toastr.error("Error while copying!");
                        console.error('Async: Could not copy text: ', err);
                    });
                })
            });
        });
    </script>
@endsection
