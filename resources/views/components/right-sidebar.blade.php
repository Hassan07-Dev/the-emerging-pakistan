{{--<div class="widget widget-author">--}}
{{--    <h6 class="widget-title">About Me</h6>--}}
{{--    <div class="author-blog">--}}
{{--        <div class="author-profile-info">--}}
{{--            <div class="author-profile-pic">--}}
{{--                <img src="images/testimonials/pic1.jpg" alt="">--}}
{{--            </div>--}}
{{--            <div class="author-profile-content">--}}
{{--                <p>Fusce id mauris auctor, sollicitudin amet gravida hendrerit--}}
{{--                    risus. </p>--}}
{{--                <ul class="list-inline m-b0">--}}
{{--                    <li><a href="javascript:void(0);" class="btn-link"><i--}}
{{--                                class="fa fa-facebook"></i></a></li>--}}
{{--                    <li><a href="javascript:void(0);" class="btn-link"><i--}}
{{--                                class="fa fa-google-plus"></i></a></li>--}}
{{--                    <li><a href="javascript:void(0);" class="btn-link"><i--}}
{{--                                class="fa fa-instagram"></i></a></li>--}}
{{--                    <li><a href="javascript:void(0);" class="btn-link"><i--}}
{{--                                class="fa fa-twitter"></i></a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="widget widget-newsletter">
    <div class="news-box text-white text-center">
        <form class="dzSubscribe dezPlaceAni" action="script/mailchamp.php" method="post">
            <img src="images/newslatter-bg.png" alt="" />
            <div class="news-back">
                <h6>Newsletter</h6>
                <input name="dzEmail" required="required" type="email" class="form-control"
                       placeholder="Your Email Address">
            </div>
            <div class="news-top">
                <img src="images/icon/newslatter.png" class="m-b20" alt="" />
                <p>Enter your email address below to subscribe to my newsletter</p>
                <button name="submit" value="Submit" type="submit"
                        class="btn radius-xl">SUBSCRIBE</button>
                <div class="dzSubscribeMsg"></div>
            </div>
        </form>
    </div>
</div>
<div class="widget widget-stories">
    <h6 class="widget-title">Latest Stories</h6>
    <div class="blog-card blog-grid">
        <div class="blog-card-media">
            <img src="{{ asset($blog_latest->blog_image) }}" alt="Blog Image">
        </div>
        <div class="blog-card-info">
            <h5 class="title"><a href="{{ route ('blog.details', [$blog_latest->slug]) }}">{{ $blog_latest->title }}</a></h5>
        </div>
    </div>
</div>
<div class="widget widget_categories">
    <h6 class="widget-title">Category</h6>
    <ul>
        @foreach($categories as $countData)
            @if($loop->iteration <= 5)
                <li><a href="javascript:void(0);">{{ $countData->category_name }} <span></span></a>
                    {{ $countData->blog_count }}</li>
            @endif
        @endforeach
    </ul>
</div>
{{--<div class="widget recent-posts-entry">--}}
{{--    <h5 class="widget-title">Featured Posts</h5>--}}
{{--    <div class="widget-post-bx">--}}
{{--        <div class="widget-post clearfix">--}}
{{--            <div class="dlab-post-media">--}}
{{--                <img src="images/blog/recent-blog/pic2.jpg" alt="" width="200" height="143">--}}
{{--            </div>--}}
{{--            <div class="dlab-post-info">--}}
{{--                <div class="dlab-post-header">--}}
{{--                    <h6 class="post-title"><a href="post-standart-alternative">Romantic--}}
{{--                            Weekend From New York City</a></h6>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="widget-post clearfix">--}}
{{--            <div class="dlab-post-media">--}}
{{--                <img src="images/blog/recent-blog/pic3.jpg" alt="" width="200" height="143">--}}
{{--            </div>--}}
{{--            <div class="dlab-post-info">--}}
{{--                <div class="dlab-post-header">--}}
{{--                    <h6 class="post-title"><a href="post-standart">Sincerely Jules x--}}
{{--                            Revolve Beauty Box</a></h6>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="widget-post clearfix">--}}
{{--            <div class="dlab-post-media">--}}
{{--                <img src="images/blog/recent-blog/pic4.jpg" alt="" width="200" height="143">--}}
{{--            </div>--}}
{{--            <div class="dlab-post-info">--}}
{{--                <div class="dlab-post-header">--}}
{{--                    <h6 class="post-title"><a href="post-standart">Meet the New Generation--}}
{{--                            of Red Carpet Stars</a></h6>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="clearfix"></div>
