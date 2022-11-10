@extends('layout.web-app', ['title'=>"About us"])


@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- breadcrumb -->
                    <!-- Breadcrumb -->
                    <ul class="breadcrumbs bg-light mb-4">
                        <li class="breadcrumbs__item">
                            <a href="{{ route('home.index') }}" class="breadcrumbs__url">
                                <i class="fa fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumbs__item breadcrumbs__item--current">
                            about-us
                        </li>
                    </ul>
                    <!-- End breadcrumb -->

                    <div class="wrap__about-us">
                        <h2>Our Mission</h2>
                        <h4>It is a long established fact that a reader will be distracted</h4>
                        <p>

                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley
                            of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions
                            of
                            Lorem Ipsum.
                        </p>

                        <figure class="float-left mr-3">
                            <img src="{{ asset('assets/images/placeholder/500x400.jpg') }}" alt="" class="img-fluid">
                        </figure>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since when an unknown printer took a galley of
                            type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.
                        </p>




                        <p>

                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley
                            of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions
                            of
                            Lorem Ipsum.
                        </p>
                        <div class="clearfix"></div>
                        <h2>Our Valuable Team Members</h2>
                        <!-- team member -->
                        <div class="team-member row">
                            <div class="col-md-3">
                                <figure class="member"> <img src="{{ asset('assets/images/placeholder/600x600.jpg') }}" class="img-fluid" alt="Image">
                                    <figcaption>
                                        <h4>Debora Hilton</h4>
                                        <small>Editor</small>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-3">
                                <figure class="member"> <img src="{{ asset('assets/images/placeholder/600x600.jpg') }}" class="img-fluid" alt="Image">
                                    <figcaption>
                                        <h4>Debora Hilton</h4>
                                        <small>Editor</small>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-3">
                                <figure class="member"> <img src="{{ asset('assets/images/placeholder/600x600.jpg') }}" class="img-fluid" alt="Image">
                                    <figcaption>
                                        <h4>Debora Hilton</h4>
                                        <small>Publisher</small>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-3">
                                <figure class="member"> <img src="{{ asset('assets/images/placeholder/600x600.jpg') }}" class="img-fluid" alt="Image">
                                    <figcaption>
                                        <h4>Debora Hilton</h4>
                                        <small>Project Manager</small>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.
                        </p>

                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
