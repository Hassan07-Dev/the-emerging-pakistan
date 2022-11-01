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
                            <a href="index.html" class="breadcrumbs__url">{{ $blog_details->category->category_name }}</a>
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
                        <div class="wrap__article-detail-title">
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
                                <li class="list-inline-item ">
                        <span class="mr-1 ml-1">
{{--                        <i class="fa fa-eye"></i>--}}
{{--                            220--}}
                        </span>
                                </li>
                                <!-- <li class="list-inline-item d-none d-md-block d-lg-none">
                                   <a href="#comments" class="text-dark">
                                       <i class="fa fa-comment"></i>
                                       3 comments
                                   </a>

                                   </li> -->
                            </ul>
                        </div>
                        <hr>
                        <div class="wrap__article-detail-content">
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
                                        <a href="#">
                                            #{{ $tag->tag_name }}
                                        </a>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>
                    <!-- Profile author -->
                    <div class="wrap__profile">
                        <div class="wrap__profile-author">
                            <figure>
                                <img src="images/placeholder/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <div class="wrap__profile-author-detail">
                                <div class="wrap__profile-author-detail-name">author</div>
                                <h4>jhon doe</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis laboriosam ad
                                    beatae itaque ea non
                                    placeat officia ipsum praesentium! Ullam?
                                </p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o facebook ">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o twitter ">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o instagram ">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o telegram ">
                                            <i class="fa fa-telegram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o linkedin ">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Comment  -->
                    <div id="comments" class="comments-area">
                        <h3 class="comments-title">2 Comments:</h3>
                        <ol class="comment-list">
                            <li class="comment">
                                <aside class="comment-body">
                                    <div class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img src="images/placeholder/80x80.jpg" class="avatar" alt="image">
                                            <b class="fn">Sinmun</b>
                                            <span class="says">says:</span>
                                        </div>
                                        <div class="comment-metadata">
                                            <a href="#">
                                                <span>April 24, 2019 at 10:59 am</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s,
                                            when an unknown
                                            printer took a galley of type and scrambled it to make a type specimen
                                            book.
                                        </p>
                                    </div>
                                    <div class="reply">
                                        <a href="#" class="comment-reply-link">Reply</a>
                                    </div>
                                </aside>
                                <ol class="children">
                                    <li class="comment">
                                        <aside class="comment-body">
                                            <div class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="images/placeholder/80x80.jpg" class="avatar" alt="image">
                                                    <b class="fn">Sinmun</b>
                                                    <span class="says">says:</span>
                                                </div>
                                                <div class="comment-metadata">
                                                    <a href="#">
                                                        <span>April 24, 2019 at 10:59 am</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="comment-content">
                                                <p>Lorem Ipsum has been the industry’s standard dummy text ever since
                                                    the 1500s, when an
                                                    unknown printer took a galley of type and scrambled it to make a
                                                    type specimen book.
                                                </p>
                                            </div>
                                            <div class="reply">
                                                <a href="#" class="comment-reply-link">Reply</a>
                                            </div>
                                        </aside>
                                    </li>
                                </ol>
                            </li>
                            <li class="comment">
                                <aside class="comment-body">
                                    <div class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img src="images/placeholder/80x80.jpg" class="avatar" alt="image">
                                            <b class="fn">Sinmun</b>
                                            <span class="says">says:</span>
                                        </div>
                                        <div class="comment-metadata">
                                            <a href="#">
                                                <span>April 24, 2019 at 10:59 am</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s,
                                            when an unknown
                                            printer took a galley of type and scrambled it to make a type specimen
                                            book.
                                        </p>
                                    </div>
                                    <div class="reply">
                                        <a href="#" class="comment-reply-link">Reply</a>
                                    </div>
                                </aside>
                            </li>
                        </ol>
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">Leave a Reply</h3>
                            <form class="comment-form">
                                <p class="comment-notes">
                                    <span id="email-notes">Your email address will not be published.</span>
                                    Required fields are marked
                                    <span class="required">*</span>
                                </p>
                                <p class="comment-form-comment">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525"
                                              required="required"></textarea>
                                </p>
                                <p class="comment-form-author">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" id="author" name="name" required="required">
                                </p>
                                <p class="comment-form-email">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="email" id="email" name="email" required="required">
                                </p>
                                <p class="comment-form-url">
                                    <label for="url">Website</label>
                                    <input type="url" id="url" name="url">
                                </p>
                                <p class="comment-form-cookies-consent">
                                    <input type="checkbox" value="yes" name="wp-comment-cookies-consent"
                                           id="wp-comment-cookies-consent">
                                    <label for="wp-comment-cookies-consent">Save my name, email, and website in this
                                        browser for the next
                                        span I comment.</label>
                                </p>
                                <p class="form-submit">
                                    <input type="submit" name="submit" id="submit" class="submit" value="Post Comment">
                                </p>
                            </form>
                        </div>
                    </div>
                    <!-- Comment -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single_navigation-prev">
                                <a href="#">
                                    <span>previous post</span>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem, similique.
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single_navigation-next text-left text-md-right">
                                <a href="#">
                                    <span>next post</span>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis, nesciunt.
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="related-article">
                        <h4>
                            you may also like
                        </h4>
                        <div class="article__entry-carousel-three">
                            <div class="item">
                                <!-- Post Article -->
                                <div class="article__entry">
                                    <div class="article__image">
                                        <a href="#">
                                            <img src="images/placeholder/500x400.jpg" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="article__content">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                 <span class="text-primary">
                                 by david hall
                                 </span>
                                            </li>
                                            <li class="list-inline-item">
                                 <span>
                                 descember 09, 2016
                                 </span>
                                            </li>
                                        </ul>
                                        <h5>
                                            <a href="#">
                                                Maecenas accumsan tortor ut velit pharetra mollis.
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- Post Article -->
                                <div class="article__entry">
                                    <div class="article__image">
                                        <a href="#">
                                            <img src="images/placeholder/500x400.jpg" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="article__content">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                 <span class="text-primary">
                                 by david hall
                                 </span>
                                            </li>
                                            <li class="list-inline-item">
                                 <span>
                                 descember 09, 2016
                                 </span>
                                            </li>
                                        </ul>
                                        <h5>
                                            <a href="#">
                                                Maecenas accumsan tortor ut velit pharetra mollis.
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- Post Article -->
                                <div class="article__entry">
                                    <div class="article__image">
                                        <a href="#">
                                            <img src="images/placeholder/500x400.jpg" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="article__content">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                 <span class="text-primary">
                                 by david hall
                                 </span>
                                            </li>
                                            <li class="list-inline-item">
                                 <span>
                                 descember 09, 2016
                                 </span>
                                            </li>
                                        </ul>
                                        <h5>
                                            <a href="#">
                                                Maecenas accumsan tortor ut velit pharetra mollis.
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- Post Article -->
                                <div class="article__entry">
                                    <div class="article__image">
                                        <a href="#">
                                            <img src="images/placeholder/500x400.jpg" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="article__content">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                 <span class="text-primary">
                                 by david hall
                                 </span>
                                            </li>
                                            <li class="list-inline-item">
                                 <span>
                                 descember 09, 2016
                                 </span>
                                            </li>
                                        </ul>
                                        <h5>
                                            <a href="#">
                                                Maecenas accumsan tortor ut velit pharetra mollis.
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- Post Article -->
                                <div class="article__entry">
                                    <div class="article__image">
                                        <a href="#">
                                            <img src="images/placeholder/500x400.jpg" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="article__content">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                 <span class="text-primary">
                                 by david hall
                                 </span>
                                            </li>
                                            <li class="list-inline-item">
                                 <span>
                                 descember 09, 2016
                                 </span>
                                            </li>
                                        </ul>
                                        <h5>
                                            <a href="#">
                                                Maecenas accumsan tortor ut velit pharetra mollis.
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        {{--var imageUrl = "@php env ('IMAGE_URL') @endphp"--}}
        {{--var SITEURL = "{{ route('comments.list') }}";--}}
        {{--var page = 1; //track user scroll as page number, right now page number is 1--}}
        {{--loadComments();--}}

        {{--function loadComments(){--}}
        {{--    var blog_id = $('#post-title').data('id');--}}
        {{--    axios.post(SITEURL, {--}}
        {{--        blog_id:blog_id,--}}
        {{--    })--}}
        {{--    .then(function (response) {--}}
        {{--        console.log(response.data);--}}
        {{--        data = response.data;--}}
        {{--        if(data.status == false){--}}
        {{--            toastr.error(data.message);--}}
        {{--        } else if(data.status == true){--}}
        {{--            var arr = data.data;--}}
        {{--            $("#comment_count").html(arr.length +" Comments");--}}
        {{--            var value = dataRender(arr);--}}
        {{--            $('.comment-list').html(value);--}}
        {{--        }--}}
        {{--    })--}}
        {{--    .catch(function (error) {--}}
        {{--        console.log(error);--}}
        {{--        if (error.response.data.status == false) {--}}
        {{--            toastr.error(error.response.data.message);--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}

        {{--function dataRender(res) {--}}
        {{--    var output = '';--}}
        {{--    var replies = '';--}}
        {{--    if(res.length>0) {--}}
        {{--        res.forEach(function (element) {--}}
        {{--            output += '<li class="comment">'--}}
        {{--                + '<div class="comment-body">'--}}
        {{--                + '<div class="comment-author vcard"> <img class="avatar photo" src="{{ asset ('images/single_comment.png') }}" alt=""> <cite class="fn">' + element.name + '</cite> <span class="says">says:</span> </div>'--}}
        {{--                + '<div class="comment-meta"> <a href="javascript:void(0);">'+moment(element.created_at).format('MMMM Do YYYY')+' at '+moment(element.created_at).format('h:mm a')+'</a> </div>'--}}
        {{--                + '<p>' + element.comment_text + '</p>'--}}
        {{--                + '<div class="reply"> <a href="javascript:void(0);" class="comment-reply-link reply_click" data-id="' + element.id + '">Reply</a> </div>'--}}
        {{--                + '</div>'--}}
        {{--                + '<ol class="children">';--}}
        {{--            replies = element.comment_replies;--}}
        {{--            if (replies.length > 0) {--}}
        {{--                replies.forEach(function (reply) {--}}
        {{--                    output += '<li class="comment odd parent">'--}}
        {{--                        + '<div class="comment-body">'--}}
        {{--                        + '<div class="comment-author vcard"> <img class="avatar photo" src="{{ asset ('images/reply_comment.png') }}" alt=""> <cite class="fn">' + reply.name + '</cite> <span class="says">says:</span> </div>'--}}
        {{--                        + '<div class="comment-meta"> <a href="javascript:void(0);">October 6, 2020 at 7:15 am</a> </div>'--}}
        {{--                        + '<p>'+reply.comment_text+'</p>'--}}
        {{--                        + '</div>'--}}
        {{--                        + '</li>';--}}
        {{--                });--}}
        {{--            }--}}
        {{--            output += '</ol>'--}}
        {{--                + '</li>';--}}
        {{--        });--}}
        {{--    }--}}
        {{--    return output;--}}
        {{--}--}}

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
