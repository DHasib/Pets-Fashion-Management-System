<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield("title") </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/images/petsfashion.png')}} " type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="{{ asset('vendors/animate/animate.css')}} " rel="stylesheet">
    <!-- Icon CSS-->
    <link rel="stylesheet" href=" {{ asset('vendors/font-awesome/css/font-awesome.min.css')}} ">
    <!-- Camera Slider -->
    <link rel="stylesheet" href=" {{ asset('vendors/camera-slider/camera.css')}} ">
    <!-- Owlcarousel CSS-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('vendors/owl_carousel/owl.carousel.css')}} " media="all">
    <!--Theme Styles CSS-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/style.css')}} " media="all" />

    <!--Plugins for Blog page-->

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/styles.css')}}">
    <!--Plugins styles-->
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/magnific-popup.css')}}">




</head>

<body>
    <div id="app">
        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Top Header_Area -->
        <section class="top_header_area">
            <div class="container">
                @if(isset($link))
                @foreach ($link as $data)
                <ul class="nav navbar-nav top_nav">
                    <li><a href="#"><i class="fa fa-phone"></i>{{$data->shop_contact_number}}</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i>{{$data->shop_email}}</a></li>
                    <li><a href="#"><i class="fa fa-clock-o"></i>{{$data->shop_open_details}}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right social_nav">
                    <li><a href="{{$data->shop_fb_link}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="{{$data->shop_tw_link}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="{{$data->shop_glg_link}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="{{$data->shop_instrsg_link}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="{{$data->shop_pint_link}}"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="{{$data->shop_lnkd_link}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
                @endforeach
                @endif
            </div>
        </section>
        <!-- End Top Header_Area -->


        <!-- Header_Area -->
        <nav class="navbar navbar-default header_aera" id="main_navbar">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="col-md-2 p0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#min_navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}"><b style="color:Green;">Pets<strong
                                    style="color:Red;">Fashion</strong></b></a>
                    </div>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="col-md-10 p0">
                    <div class="collapse navbar-collapse" id="min_navbar">
                        <ul class="nav navbar-nav navbar-right">

                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/products') }}">Pet Products</a></li>
                            <li><a href="{{ url('/pets') }}">Pets</a></li>
                            <li class="dropdown submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                        class="fa fa-chevron-circle-down"> Services </i> </a>
                                <ul class="dropdown-menu other_dropdwn">
                                    <li><a href="{{ url('/pet_keeping_cost') }}">Pet keeping cost</a></li>
                                    <li><a href="{{ url('doctor_appoinment') }}">Get Doctor Appoinment</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/blog') }}">Blog</a></li>
                            <li><a href="{{ url('/contact_us') }}">Contact Us</a></li>

                            <li class="dropdown submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                        class="fa fa-chevron-circle-down"> Account </i> </a>
                                <!-- Authentication Links -->
                                <ul class="dropdown-menu other_dropdwn">

                                    @guest

                                    <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"> Login</i></a></li>

                                    @if (Route::has('register'))

                                    <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"> Register </i></a>
                                    </li>
                                    @endif
                                    @else
                                    @if(Auth::user()->role == 1 )
                                    <li><a href="{{url('admin/dashboard/show')}}"> <i class="fa fa-user">
                                                {{ Auth::user()->name }} </i></a></li>
                                    @else
                                    <li><a href="{{url('user/profile/show')}}"> <i class="fa fa-user">
                                                {{ Auth::user()->name }} </i></a></li>
                                    @endif

                                    <li> <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"> Log-out</i> </a> </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    @endguest
                                </ul>
                            </li>
                            <li><a href="{{ url('shopping/cart') }}"><i class="fa fa-shopping-cart"> </i> Cart
                                    @if(Cart::instance('pet')->content()->count() > 0 ||
                                    Cart::instance('product')->content()->count() > 0 )
                                    <span class="badge badge-light"
                                        style="background-color:Green;">{{(Cart::instance('pet')->content()->count() + Cart::instance('product')->content()->count())}}</span></a>
                            </li>
                            @else
                            <span class="badge badge-light">0</span></a></li>
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container -->
        </nav>
        <!-- ============================================================================= End Header_Area  ========================================================================================================================================================================================================= -->


        <!-- Extend All page content Here   16-->
        @section("content")
        @show



        <!--  ============================================================================= Footer Area  ========================================================================================================================================================================================================= -->
        <footer class="footer_area">
            <div class="container">
                <div class="footer_row row">
                    <div class="col-md-5 col-sm-6 footer_about">
                        <h2>ABOUT OUR Shop</h2>
                        <a href="{{url('/')}}"><b style="color:Green;">Pets<strong
                                    style="color:Red;">Fashion</strong></b></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                        @if(isset($link))
                        @foreach ($link as $data)
                        <ul class="socail_icon">
                            <li><a href="{{$data->shop_fb_link}}" target="_blank"><i class="fa fa-facebook"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="{{$data->shop_tw_link}}" target="_blank"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="{{$data->shop_glg_link}}" target="_blank"><i class="fa fa-google-plus"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="{{$data->shop_lnkd_link}}" target="_blank"><i class="fa fa-linkedin"
                                        aria-hidden="true"></i></a></li>
                        </ul>
                        @endforeach
                        @endif
                    </div>
                    <div class="col-md-4 col-sm-6 footer_about quick">
                        <h2>Quick links</h2>
                        <ul class="quick_link">
                            <li><a href="{{url('pets')}}"><i class="fa fa-chevron-right"></i>Our Pets and the Hot
                                    Offer</a></li>
                            <li><a href="{{url('products')}}"><i class="fa fa-chevron-right"></i>Our Pet Products and
                                    the Hot Offer</a></li>
                            <li><a href="{{url('blog')}}"><i class="fa fa-chevron-right"></i>Our Latest Helpful
                                    Blogs</a></li>
                            <li><a href="{{url('pet_keeping_cost')}}"><i
                                        class="fa fa-chevron-right"></i>Tools</a></li>
                            <li><a href="{{url('doctor_appoinment')}}"><i
                                            class="fa fa-chevron-right"></i>Get Doctor Appoinment</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 footer_about">
                        <h2>CONTACT US</h2>
                        <address>
                            <ul class="my_address">
                                @if(isset($link))
                                @foreach ($link as $data)
                                <li><a><i class="fa fa-phone"></i>{{$data->shop_contact_number}}</a></li>
                                <li><a><i class="fa fa-envelope-o"></i>{{$data->shop_email}}</a></li>
                                @endforeach
                                @endif
                                <li><a href="{{url('contact_us')}}" target="_blank"><i class="fa fa-map-marker"
                                            aria-hidden="true"></i><span> Road #
                                            05, Shop # 31, Katabon, Dhaka 1230 </span></a></li>
                            </ul>
                        </address>
                    </div>
                </div>
            </div>
            <div class="copyright_area">
                Copyright 2019 All rights reserved.<a href="{{url('/')}}">Pets Fashion Online Shop.</a>
            </div>
        </footer>
        <!-- End Footer Area -->




        <!-- jQuery JS -->
        <script src="{{ asset('js/jquery-1.12.0.min.js')}} "></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('js/bootstrap.min.js')}} "></script>
        <!-- Animate JS -->
        <script src=" {{ asset('vendors/animate/wow.min.js')}} "></script>
        <!-- Camera Slider -->
        <script src=" {{ asset('vendors/camera-slider/jquery.easing.1.3.js')}} "></script>
        <script src=" {{ asset('vendors/camera-slider/camera.min.js')}} "></script>
        <!-- Isotope JS -->
        <script src=" {{ asset('vendors/isotope/imagesloaded.pkgd.min.js')}} "></script>
        <script src=" {{ asset('vendors/isotope/isotope.pkgd.min.js')}} "></script>
        <!-- Progress JS -->
        <script src=" {{ asset('vendors/Counter-Up/jquery.counterup.min.js')}} "></script>
        <script src=" {{ asset('vendors/Counter-Up/waypoints.min.js')}} "></script>
        <!-- Owlcarousel JS -->
        <script src=" {{ asset('vendors/owl_carousel/owl.carousel.min.js')}} "></script>
        <!-- Stellar JS -->
        <script src=" {{ asset('vendors/stellar/jquery.stellar.js')}} "></script>
        <!-- Blog Image Popup Js -->
        <script src="app/js/crum-mega-menu.js"></script>
        <script src="app/js/theme-plugins.js"></script>
        <script src="app/js/main.js"></script>
        <!-- Theme JS -->
        <script src=" {{ asset('js/theme.js')}}"></script>



    </div>
</body>

</html>