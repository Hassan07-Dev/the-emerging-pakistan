@extends('layout.web-app', ['title'=>"Home"])


@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Slider Banner -->
		<div class="main-slide p-t30">
			<div class="row">
				<div class="col-lg-12">
					<div class="post-standart no-radius m-b0">
						<div class="post-slide2 owl-carousel owl-none">
                            @foreach($categories as $key => $category)
								<div class="item">
									<div class="blog-card overlay">
										<div class="blog-card-media blog-card-media-hieght">
											<img src="{{ asset($category['category_image']) }}" alt="">
										</div>
										<div class="blog-card-info">
											<h2 class="title"><a href="#" data-id="">{{ $category['category_name'] }}</a></h2>
											<!-- <div class="date">
												29 <span></span> 2022
											</div> -->
											<a href="#" class="btn-link readmore" data-id=""><i class="la la-arrow-right"></i></a>
										</div>
									</div>
								</div>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Slider Banner -->
		<div class="content-block">
            <!-- About Us -->
            <!-- <div class="section-full bg-white content-inner-1">
                <div class="container">
                    <div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 col-6">
							<div class="category-box overlay m-b30">
								<div class="category-media">
									<img src="images/category/pic1.jpg" alt=""/>
								</div>
								<div class="category-info">
									<a href="javascript:void(0);" class="category-title">Lifestyle</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-6">
							<div class="category-box overlay m-b30">
								<div class="category-media">
									<img src="images/category/pic2.jpg" alt=""/>
								</div>
								<div class="category-info">
									<a href="javascript:void(0);" class="category-title">Beauty</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-6">
							<div class="category-box overlay m-b30">
								<div class="category-media">
									<img src="images/category/pic3.jpg" alt=""/>
								</div>
								<div class="category-info">
									<a href="javascript:void(0);" class="category-title">Fashion</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-6">
							<div class="category-box overlay m-b30">
								<div class="category-media">
									<img src="images/category/pic4.jpg" alt=""/>
								</div>
								<div class="category-info">
									<a href="javascript:void(0);" class="category-title">Travel</a>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div> -->
			<div class="section-full bg-white content-inner-2 content-inner-b0">
                <div class="container">
                    <div class="row">
						<div class="col-lg-8 col-md-7 col-sm-12 col-12">
							<div class="row loadmore-content">

							</div>
							<div class="row">
								<div class="col-lg-12 m-t10">
									<div class="text-center m-b30">
										<a href="javascript:;" rel="#" id="load_more_btn" class="btn black radius-xl loadmore-btn">Load More</a>
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
    <!-- Content END-->
@endsection

@section('script')
    <script>
        var imageUrl = "@php env ('IMAGE_URL') @endphp"
        var SITEURL = "{{ route('blog_list') }}";
        var page = 1; //track user scroll as page number, right now page number is 1
        load_more(page);

        function load_more(page){
            axios.post(SITEURL, {
                page_no:page,
            })
            .then(function (response) {
                console.log(response.data);
                data = response.data;
                if(data.status == false){
                    toastr.error(data.message);
                } else if(data.status == true){
                    var arr = data.data;
                    var value = dataRender(arr);
                    $('.loadmore-content').append(value);
                }
            })
            .catch(function (error) {
                console.log(error);
                if (error.response.data.status == false) {
                    toastr.error(error.response.data.message);
                }
            });
        }

        function truncate(str, no_words) {
            return str.split(" ").splice(0,no_words).join(" ");
        }
        function countWords(str) {
            str = str.replace(/(^\s*)|(\s*$)/gi,"");
            str = str.replace(/[ ]{2,}/gi," ");
            str = str.replace(/\n /,"\n");
            return str.split(' ').length;
        }

        function dataRender(res) {
            var output = '';
            res.forEach(function(element){
                var url_encode = "{{ url ('blog/details') }}/"+element.slug;
                url_encode = encodeURI(url_encode);
                output += '<div class="col-lg-12">'
                    +'<div class="blog-card blog-md">'
                    +'<div class="blog-card-media blog-border-radius">'
                    +'<img src="'+imageUrl+element.blog_image+'" alt=""/>'
                    +'</div>'
                    +'<div class="blog-card-info">'
                    +'<h4 class="title"><a href="{{ url ('blog/details') }}/'+element.slug+'">'+element.title+'</a></h4>'
                    +'<div class="date">'+moment(element.created_at).format('DD')+'<span></span>'+moment(element.created_at).format('MM')+'<span></span>'+moment(element.created_at).format('YYYY')
                    +'</div>'
                    +'<p>'+element.excerpt+'...</p>'
                    +'<ul class="list-inline m-b0 icon_c">'
                        +'<li><a href="https://api.whatsapp.com/send?text='+url_encode+'" target="_blank" class="btn-link"><i class="fa fa-whatsapp"></i></a></li>'
                        +'<li><a href="https://www.facebook.com/sharer/sharer.php?u='+url_encode+'" target="_blank" class="btn-link"><i class="fa fa-facebook"></i></a></li>'
                        +'<li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url='+url_encode+'" target="_blank" class="btn-link"><i class="fa fa-linkedin"></i></a></li>'
                        +'<li><a href="https://www.instagram.com/?url='+url_encode+'" target="_blank" class="btn-link"><i class="fa fa-instagram"></i></a></li>'
                        +'<li><a href="http://twitter.com/share?text=&url='+url_encode+'&hashtags=" target="_blank" class="btn-link"><i class="fa fa-twitter"></i></a></li>'
                        +'<li><a href="javascript:void(0);" data-href="'+url_encode+'" class="btn-link embeded_link"><i class="fa fa-link"></i></a></li>'
                    +'</ul>'
                    +'<a href="{{ url ('blog/details') }}/'+element.slug+'" class="btn-link readmore"><i class="la la-arrow-right"></i></a>'
                    +'</div>'
                    +'</div>'
                    +'</div>';
            });
            return output;
        }

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

    </script>
@endsection
