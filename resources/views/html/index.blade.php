@extends("layouts.app")

@section("title","Home Page | Pet Fashion Management System" )

@section("content")

    <!-- Slider area -->
    
    <section class="slider_area row m0">
        <div class="slider_inner">
                @foreach ($sdata as $slider)
            <div data-thumb="images/Slider_img/{{$slider->slider_image}}" data-src="images/Slider_img/{{$slider->slider_image}}">
                <div class="camera_caption">
                    <div class="container">
                        <h5 class=" wow fadeInUp animated">{{ $slider->slider_title}}</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s">{{ $slider->slider_heading}}</h3>
                        <p class=" wow fadeInUp animated" data-wow-delay="0.8s">{{ $slider->slider_desc}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- End Slider area -->

    <!-- Our Features Area [ WHY CHOSE US ]-->
    <section class="our_feature_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Features</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="feature_row row">
                <div class="col-md-6 feature_img">
                    <img src="images/feature-man.jpg" alt="">
                </div>
                <div class="col-md-6 feature_content">
                    <div class="subtittle">
                        <h2>WHY CHOOSE US</h2>
                        <h5>There are many variations of passages of Lorem Ipsum available.</h5>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">30+ YEARS OF EXPERIENCE</a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting indus-try. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-rocket" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">QUALIFIED EXPERTS</a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting indus-try. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Best Customer Services</a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting indus-try. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Features Area -->

    <!-- Our Featured Works Area [ our collections ]-->
    <section class="featured_works row" data-stellar-background-ratio="0.3">
        <div class="tittle wow fadeInUp">
            <h2>our collections</h2>
            <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
        </div>
        <div class="featured_gallery">
            <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/gallery/gl-1.jpg" alt="">
                <div class="gallery_hover">
                    <h4>Bolt Apartments</h4>
                    <a href="#">VIEW PROJECT</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/gallery/gl-2.jpg" alt="">
                <div class="gallery_hover">
                    <h4>Bolt Apartments</h4>
                    <a href="#">VIEW PROJECT</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/gallery/gl-3.jpg" alt="">
                <div class="gallery_hover">
                    <h4>Bolt Apartments</h4>
                    <a href="#">VIEW PROJECT</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/gallery/gl-4.jpg" alt="">
                <div class="gallery_hover">
                    <h4>Bolt Apartments</h4>
                    <a href="#">VIEW PROJECT</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/gallery/gl-5.jpg" alt="">
                <div class="gallery_hover">
                    <h4>Bolt Apartments</h4>
                    <a href="#">VIEW PROJECT</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/gallery/gl-6.jpg" alt="">
                <div class="gallery_hover">
                    <h4>Bolt Apartments</h4>
                    <a href="#">VIEW PROJECT</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/gallery/gl-7.jpg" alt="">
                <div class="gallery_hover">
                    <h4>Bolt Apartments</h4>
                    <a href="#">VIEW PROJECT</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/gallery/gl-8.jpg" alt="">
                <div class="gallery_hover">
                    <h4>Bolt Apartments</h4>
                    <a href="#">VIEW PROJECT</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Featured Works Area -->

    <!-- OUR OFFER [ SLIDE-BAR ] -->
    <section class="our_partners_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Offers</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="partners">
                <div class="item">
                    <div class="row construction_iner">
                        <div class="col-md-6 col-sm-4 construction">
                            <div class="cns-img">
                                <img src="images/cns-1.jpg" alt="">
                            </div>
                            <div class="cns-content">
                                <i aria-hidden="true"><b>70%off</b></i>
                                <a href="#">BUILDING--1 CONSTRUCTION</a>
                                <p>Lorem Ipsum is simply dummy text of the print-ing and typesetting industry.Lorem
                                    Ipsum is simply dummy text of the print-ing </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row construction_iner">
                        <div class="col-md-6 col-sm-4 construction">
                            <div class="cns-img">
                                <img src="images/cns-1.jpg" alt="">
                            </div>
                            <div class="cns-content">
                                <i aria-hidden="true"><b>70%off</b></i>
                                <a href="#">BUILDING--2 CONSTRUCTION</a>
                                <p>Lorem Ipsum is simply dummy text of the print-ing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row construction_iner">
                        <div class="col-md-6 col-sm-4 construction">
                            <div class="cns-img">
                                <img src="images/cns-1.jpg" alt="">
                            </div>
                            <div class="cns-content">
                                <i aria-hidden="true"><b>70%off</b></i>
                                <a href="#">BUILDING--3 CONSTRUCTION</a>
                                <p class="text-center">Lorem Ipsum is simply dummy text of the print-ing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row construction_iner">
                        <div class="col-md-6 col-sm-4 construction">
                            <div class="cns-img">
                                <img src="images/cns-1.jpg" alt="">
                            </div>
                            <div class="cns-content">
                                <i aria-hidden="true"><b>70%off</b></i>
                                <a href="#">BUILDING--4 CONSTRUCTION</a>
                                <p>Lorem Ipsum is simply dummy text of the print-ing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- End Our OFFER Area -->

    <!-- Our Achievments Area -->
    <section class="our_achievments_area" data-stellar-background-ratio="0.3">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Achievments</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="achievments_row row">
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    <span class="counter">3</span>
                    <h6>Animals Saving Awards</h6>
                </div>
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    <span class="counter">5</span>
                    <h6>Budgies Winning Contest</h6>
                </div>
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    <span class="counter">11</span>
                    <h6>Best Customer Service Awards</h6>
                </div>
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    <span class="counter">25</span>
                    <h6>Dog Care Awards</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Achievments Area -->

    <!-- Our Latest Blog Area -->
    <section class="latest_blog_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Latest Blog</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="row latest_blog">
                <div class="col-md-4 col-sm-6 blog_content">
                    <img src="images/blog/lb-1.jpg" alt="">
                    <a href="#" class="blog_heading">Our Latest Project</a>
                    <h4><small>by </small><a href="#">Emran Khan</a><span>/</span><small>ON </small> October 15, 2016
                    </h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sagittis iaculis velit in
                        tristique. Curabitur ac urna urna. Sed sollicitudin at nisi sed accumsan... <a href="#">Read
                            More</a></p>
                </div>
                <div class="col-md-4 col-sm-6 blog_content">
                    <img src="images/blog/lb-2.jpg" alt="">
                    <a href="#" class="blog_heading">Our Latest Project</a>
                    <h4><small>by </small><a href="#">Prodip Ghosh</a><span>/</span><small>ON </small> October 15, 2016
                    </h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sagittis iaculis velit in
                        tristique. Curabitur ac urna urna. Sed sollicitudin at nisi sed accumsan... <a href="#">Read
                            More</a></p>
                </div>
                <div class="col-md-4 col-sm-6 blog_content">
                    <img src="images/blog/lb-3.jpg" alt="">
                    <a href="#" class="blog_heading">Our Latest Project</a>
                    <h4><small>by </small><a href="#">Prodip Ghosh</a><span>/</span><small>ON </small> October 15, 2016
                    </h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sagittis iaculis velit in
                        tristique. Curabitur ac urna urna. Sed sollicitudin at nisi sed accumsan... <a href="#">Read
                            More</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Latest Blog Area -->


@endsection