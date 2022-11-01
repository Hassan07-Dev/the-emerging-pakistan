<div class="bg-white">
    <!-- Trending News Start -->
    <div class="trending-news pt-4 border-tranding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="trending-news-inner">
                        <div class="title">
                            <i class="fa fa-bolt"></i>
                            <strong>trending news</strong>
                        </div>
                        <div class="trending-news-slider">
                            @isset($trending_news)
                                @foreach ($trending_news as $trending_new)
                                    <div class="item-single">
                                        <a href="javascript:void(0)">{{ $trending_new['news_text'] }}</a>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending News End -->
</div>
