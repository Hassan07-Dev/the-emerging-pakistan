<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="footer-title text-center"><span>Trending Stories</span></h4>
                </div>
                <div class="col-12">
                    <div class="trending-stories owl-loaded owl-theme owl-carousel owl-btn-center-lr owl-btn-2">
                        @if(count($blog_list)>0)
                            @foreach($blog_list as $val)
                                <div class="item">
                                    <div class="blog-card blog-grid no-gap">
                                        <div class="blog-card-media">
                                            <img src="{{ asset($val->blog_image) }}" alt=""/>
                                        </div>
                                        <div class="blog-card-info blog-card-height">
                                            <h4 class="title"><a href="{{ route ('blog.details', [$val->slug]) }}">{{ $val->title }}</a></h4>
                                            <div class="date">
                                                <?php
                                                    // $time_input = strtotime($blog_data[$val]['date_publish']);
                                                    // $date_input = getDate($time_input);
                                                ?>
                                                {{ \Carbon\Carbon::parse ($val['created_at'])->format ('d') }}<span></span>{{ \Carbon\Carbon::parse ($val['created_at'])->format ('m') }}<span></span>{{ \Carbon\Carbon::parse ($val['created_at'])->format ('Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="footer-bottom">
                        <div class="footer-logo">
                            @isset($logo)
                                <a href="{{ route ('home.index') }}"><img src="{{ asset ($logo->logo_image) }}" alt=""/></a>
                            @endisset
                        </div>
                        <div class="footer-copy">
                            <span>©2019. All Rights Reserved.</span>
                        </div>
                        <div class="footer-social">
                            <ul class="icon_c">
                                <li><a href="https://www.instagram.com/daddy_magz/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/daddy-magz/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://www.facebook.com/daddymagz" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/daddy_magz" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
