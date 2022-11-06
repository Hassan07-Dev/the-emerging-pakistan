@extends('layout.web-app', ['title'=>"Blog Details"])


@section('content')
    <section class="bg-white pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Breadcrumb -->
                    <ul class="breadcrumbs bg-light mb-4">
                        <li class="breadcrumbs__item">
                            <a href="{{ route('home.index') }}" class="breadcrumbs__url">
                                <i class="fa fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a href="{{ route('blog.index', [strtolower(str_replace(' ', '-', $blog_details->category->category_name))]) }}" class="breadcrumbs__url">{{ $blog_details->category->category_name }}</a>
                        </li>
                        <li class="breadcrumbs__item breadcrumbs__item--current">
                            {{ $blog_details->title }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <!-- Social media animation -->
                    <div class="social__media__animation ">
                        <ul class="menu topLeft bg__card-shadow">
                            <li class="share bottom">
                                <i class="fa fa-share-alt"></i>
                                <ul class="list__submenu">
{{--                                    <li><a href="https://api.whatsapp.com/send?text={{ url('blog/details').'/'.$blog_details->slug }}" target="_blank" class="btn-link"><i class="fa fa-whatsapp"></i></a></li>--}}
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url('blog/details').'/'.$blog_details->slug }}" target="_blank" class="btn-link"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url={{ url('blog/details').'/'.$blog_details->slug }}" target="_blank" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="https://www.instagram.com/?url={{ url('blog/details').'/'.$blog_details->slug }}" target="_blank" class="btn-link"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="http://twitter.com/share?text=&url={{ url('blog/details').'/'.$blog_details->slug }}&hashtags=" target="_blank" class="btn-link"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="javascript:void(0);" data-href="{{ url('blog/details').'/'.$blog_details->slug }}" class="btn-link embeded_link"><i class="fa fa-link"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Article detail -->
                    <div class="wrap__article-detail">
                        <div class="wrap__article-detail-image">
                            <figure>
                                <img src="{{ asset($blog_details->blog_image) }}" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="wrap__article-detail-title" id="post-title" data-id="{{ $blog_details->id }}">
                            <h1>
                                {{ $blog_details->title }}
                            </h1>
                        </div>
                        <hr>
                        <div class="wrap__article-detail-info">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <figure class="image-profile">
                                        <img src="images/placeholder/80x80.jpg" alt="" class="img-fluid img-circle">
                                    </figure>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                    by
                                    </span>
                                    <a href="#">
                                        {{ $blog_details->arthur }},
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize ml-1">
                                        {{ Carbon\Carbon::parse($blog_details->created_at)->format('M d, Y') }}
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize">
                                    in
                                    </span>
                                    <a href="#">
                                        {{ $blog_details->category->category_name }},
                                    </a>
                                    ,
                                </li>
                                <li class="list-inline-item">
                                   <a href="#comments" class="text-dark">
                                       <i class="fa fa-comment"></i>
                                       <span id="comment_count"></span>
                                   </a>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <div class="wrap__article-detail-content content_styling">
                            {!! html_entity_decode ($blog_details->description) !!}
                        </div>
                    </div>
                    <!-- News Tags -->
                    <div class="blog-tags">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <i class="fa fa-tags">
                                </i>
                            </li>
                            @isset($blog_details->getTags)
                                @foreach($blog_details->getTags as $tag)
                                    <li class="list-inline-item">
                                        <a href="javascript:void(0)">
                                            #{{ $tag->tag_name }}
                                        </a>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>
                    @isset($blog_details->getUser)
                        <div class="wrap__profile">
                            <div class="wrap__profile-author">
                                <figure>
                                    <img src="{{ !$blog_details->getUser->profile_pic ? asset ('images/single_comment.png') : asset($blog_details->getUser->profile_pic) }}" alt="Profile-Image" class="img-fluid rounded-circle">
                                </figure>
                                <div class="wrap__profile-author-detail">
                                    <div class="wrap__profile-author-detail-name">author</div>
                                    <h4>{{ $blog_details->getUser->first_name.' '.$blog_details->getUser->last_name }}</h4>
                                    <p style="height: 80px;">
                                        {!! html_entity_decode ($blog_details->getUser->bio) !!}
                                    </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="{{ $blog_details->getUser->facebook_url }}" class="btn btn-social btn-social-o facebook ">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ $blog_details->getUser->twitter_url }}" class="btn btn-social btn-social-o twitter ">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ $blog_details->getUser->instagram_url }}" class="btn btn-social btn-social-o instagram ">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ $blog_details->getUser->linkedin_url }}" class="btn btn-social btn-social-o linkedin ">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endisset
                    <!-- Comment  -->
                    <div id="comments" class="comments-area">
                        <h3 class="comments-title" id="comment_count"></h3>
                        <ol class="comment-list">
                        </ol>
                        @if(auth()->user())
                            <div class="comment-respond" id="respond">
                            <h3 class="comment-reply-title">Leave a Reply</h3>
                            <form class="comment-form" id="commentform" method="POST">
                                <input type="hidden" name="blog_id" id="put_id" value="{{ $blog_details->id }}">
                                <input type="hidden" name="comment_id" id="put_comment_id" value="">
                                <p class="comment-form-comment">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" id="comment" cols="45" rows="8" maxlength="65525"
                                              required="required" placeholder="Add a Comment"></textarea>
                                </p>
                                <p class="form-submit">
                                    <input type="submit" name="submit" id="submit" class="submit" value="Post Comment">
                                </p>
                            </form>
                        </div>
                        @else
                            <div class="comment-respond text-danger">* Please login to comment on the post!</div>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
                <x-right-sidebar />
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
{{--    <div class="page-content bg-white">--}}
{{--        <div class="content-block">--}}
{{--            <!-- About Us -->--}}
{{--            <div class="section-full content-inner bg-white">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-8 col-md-7 col-sm-12 col-12">--}}
{{--                            <div class="blog-post blog-single blog-post-style-2 sidebar">--}}
{{--                                <div class="dlab-post-info">--}}
{{--                                    <div class="dlab-post-meta">--}}
{{--                                        <div class="date">--}}
{{--                                            {{ \Carbon\Carbon::parse ($blog_details->created_at)->format ('d') }}<span></span>{{ \Carbon\Carbon::parse ($blog_details->created_at)->format ('m') }}<span></span>{{ \Carbon\Carbon::parse ($blog_details->created_at)->format ('Y') }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="dlab-post-title">--}}
{{--                                        <h2 class="post-title" id="post-title" data-id="{{ $blog_details->id }}">{{ $blog_details->title }}</h2>--}}
{{--                                        <!-- <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu mauris eget--}}
{{--                                            velit blandit pulvinar. Etiam tempus aliquet lectus tortor.</h4> -->--}}
{{--                                    </div>--}}
{{--                                    <div class="dlab-divider divider-2px bg-gray-dark"><i class="icon-dot c-square"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="dlab-post-text text">--}}
{{--                                        <div class="wp-block-image alignwide">--}}
{{--                                            <figure class="aligncenter">--}}
{{--                                                <img src="{{ asset($blog_details->blog_image) }}" alt="Featured Image">--}}
{{--                                            </figure>--}}
{{--                                        </div>--}}
{{--                                        {!! html_entity_decode ($blog_details->description) !!}--}}

{{--                                    </div>--}}
{{--                                    <div class="dlab-post-tags d-flex">--}}
{{--                                        <div class="post-tags">--}}
{{--                                            <a href="javascript:void(0);">Creative</a>--}}
{{--                                            <a href="javascript:void(0);">Media</a>--}}
{{--                                            <a href="javascript:void(0);">Fashion</a>--}}
{{--                                            <a href="javascript:void(0);">Photography</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="share-post ml-auto">--}}
{{--                                            <ul class="slide-social">--}}
{{--                                                <li>Share:</li>--}}
{{--                                                <li><a href="https://api.whatsapp.com/send?text={{ url('blog/details').'/'.$blog_details->slug }}" target="_blank" class="btn-link"><i class="fa fa-whatsapp"></i></a></li>--}}
{{--                                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url('blog/details').'/'.$blog_details->slug }}" target="_blank" class="btn-link"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                                <li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url={{ url('blog/details').'/'.$blog_details->slug }}" target="_blank" class="btn-link"><i class="fa fa-linkedin"></i></a></li>--}}
{{--                                                <li><a href="https://www.instagram.com/?url={{ url('blog/details').'/'.$blog_details->slug }}" target="_blank" class="btn-link"><i class="fa fa-instagram"></i></a></li>--}}
{{--                                                <li><a href="http://twitter.com/share?text=&url={{ url('blog/details').'/'.$blog_details->slug }}&hashtags=" target="_blank" class="btn-link"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                                <li><a href="javascript:void(0);" data-href="{{ url('blog/details').'/'.$blog_details->slug }}" class="btn-link embeded_link"><i class="fa fa-link"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="min-container">--}}
{{--                                <div class="clear m-b30" id="comment-list">--}}
{{--                                    <div class="comments-area" id="comments">--}}
{{--                                        <h6 class="comments-title" id="comment_count"></h6>--}}
{{--                                        <div>--}}
{{--                                            <ol class="comment-list">--}}

{{--                                            </ol>--}}
{{--                                            <!-- Form -->--}}
{{--                                            <div class="comment-respond" id="respond">--}}
{{--                                                <h3 class="comment-reply-title" id="reply-title">Leave a Reply <small> <a--}}
{{--                                                            style="display:none;" href="#" id="cancel-comment-reply-link"--}}
{{--                                                            rel="nofollow">Cancel reply</a> </small> </h3>--}}
{{--                                                <form class="comment-form" id="commentform" method="POST">--}}
{{--                                                    <input type="hidden" name="blog_id" id="put_id" value="">--}}
{{--                                                    <input type="hidden" name="comment_id" id="put_comment_id" value="">--}}
{{--                                                    <p class="comment-form-author">--}}
{{--                                                        <label for="author">Name <span class="required">*</span></label>--}}
{{--                                                        <input type="text" value="" placeholder="Author" id="author" name="name">--}}
{{--                                                    </p>--}}
{{--                                                    <p class="comment-form-email">--}}
{{--                                                        <label for="email">Email <span class="required">*</span></label>--}}
{{--                                                        <input type="text" value="" placeholder="Email" id="email" name="email">--}}
{{--                                                    </p>--}}
{{--                                                    <p class="comment-form-comment">--}}
{{--                                                        <label for="comment">Comment</label>--}}
{{--                                                        <textarea rows="8" name="comment" placeholder="Add a Comment"--}}
{{--                                                                  id="comment"></textarea>--}}
{{--                                                    </p>--}}
{{--                                                    <p class="form-submit">--}}
{{--                                                        <input type="submit" value="Post Comment" class="submit"--}}
{{--                                                               id="submit">--}}
{{--                                                    </p>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                            <!-- Form END -->--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-md-5 col-sm-12 col-12">--}}
{{--                            <div class="side-bar p-l30 sticky-top">--}}
{{--                                <x-right-sidebar />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- About Us End -->--}}
{{--        </div>--}}
{{--        <!-- contact area END -->--}}
{{--    </div>--}}
@endsection

@section('script')
    <script>
        var imageUrl = "@php env ('IMAGE_URL') @endphp"
        var SITEURL = "{{ route('comments.list') }}";
        {{--var page = 1; //track user scroll as page number, right now page number is 1--}}
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
                    $("#comment_count").html(arr.length +" Comments:");
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
                        + '<aside class="comment-body">'
                        + '<div class="comment-meta">'
                        + '<div class="comment-author vcard">';
                    if (element.get_user.profile_pic == null || element.get_user.profile_pic == ''){
                        output += '<img src="{{ asset ('images/single_comment.png') }}" class="avatar" alt="comment_dummy_image">';
                    } else {
                        output += '<img src="'+imageUrl+element.get_user.profile_pic+'" class="avatar" alt="Profile_image">';
                    }
                    output += '<b class="fn">' + element.get_user.username + '</b>'
                                        + '<span class="says">says:</span>'
                                + '</div>'
                                + '<div class="comment-metadata">'
                                    + '<a href="javascript:void(0)">'
                                        + '<span>'+moment(element.created_at).format('MMMM Do YYYY')+' at '+moment(element.created_at).format('h:mm a')+'</span>'
                                    + '</a>'
                                + '</div>'
                            + '</div>'
                            + '<div class="comment-content">'
                                + '<p>' + element.comment_text + '</p>'
                            + '</div>'
                            + '<div class="reply">'
                                + '<a href="javascript:void(0);" class="comment-reply-link reply_click" data-id="' + element.id + '">Reply</a>'
                            + '</div>'
                        + '</aside>'
                    replies = element.comment_replies;
                    if (replies.length > 0) {
                        output += '<ol class="children">'
                        replies.forEach(function (reply) {

                            output += '<li class="comment">'
                                        + '<aside class="comment-body">'
                                            + '<div class="comment-meta">'
                                                + '<div class="comment-author vcard">';
                            if (reply.get_user.profile_pic == null || reply.get_user.profile_pic == ''){
                                output += '<img src="{{ asset ('images/reply_comment.png') }}" class="avatar" alt="reply_dummy_image">';
                            } else {
                                output += '<img src="'+imageUrl+reply.get_user.profile_pic+'" class="avatar" alt="Profile_image">';
                            }
                            output += '<b class="fn">' + element.get_user.username + '</b>'
                                                + '<span class="says">says:</span>'
                                            + '</div>'
                                            + '<div class="comment-metadata">'
                                                + '<a href="javascript:void(0)">'
                                                    + '<span>'+moment(reply.created_at).format('MMMM Do YYYY')+' at '+moment(reply.created_at).format('h:mm a')+'</span>'
                                                + '</a>'
                                            + '</div>'
                                        + '</div>'
                                        + '<div class="comment-content">'
                                            + '<p>'+reply.comment_text+'</p>'
                                        + '</div>'
                                    + '</aside>'
                                + '</li>'
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

            // $(document).on('click', '#load_more_btn', function (e) {
            //     e.preventDefault();
            //     page++; //page number increment
            //     load_more(page); //load content
            // });

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
    </script>
@endsection
