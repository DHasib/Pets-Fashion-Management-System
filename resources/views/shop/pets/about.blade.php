@extends("layouts.app")

@section("title","About Pet | Pet Fashion Management System" )

@section("content")

<!-- OUR OFFER [ SLIDE-BAR ] -->
<section class="our_partners_area offerpage1">
    <div class="panel panel-primary offerpagebdr">
        <div class="panel-heading text-uppercase text-center pnlheading ">
            <h3>HOT OFFERS</h3>
        </div>
        <div class="container">
            <div class="panel-body">
                <div class="partners offerpage">
                    <div class="item">
                        <div class="row construction_iner offerpage2">
                            <div class="col-md-6 col-sm-4 construction">
                                <div class="cns-img">
                                    <img src="images/cns-1.jpg" alt="">
                                </div>
                                <div class="cns-content">
                                    <i aria-hidden="true"><b>70%off</b></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row construction_iner offerpage2">
                            <div class="col-md-6 col-sm-4 construction">
                                <div class="cns-img">
                                    <img src="images/cns-1.jpg" alt="">
                                </div>
                                <div class="cns-content">
                                    <i aria-hidden="true"><b>70%off</b></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row construction_iner offerpage2">
                            <div class="col-md-6 col-sm-4 construction">
                                <div class="cns-img">
                                    <img src="images/cns-1.jpg" alt="">
                                </div>
                                <div class="cns-content">
                                    <i aria-hidden="true"><b>70%off</b></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row construction_iner offerpage2">
                            <div class="col-md-6 col-sm-4 construction">
                                <div class="cns-img">
                                    <img src="images/cns-1.jpg" alt="">
                                </div>
                                <div class="cns-content">
                                    <i aria-hidden="true"><b>70%off</b></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
<!-- End Our OFFER Area -->

<!-- Show More Details For Items Area -->
<div class="panel panel-primary ourPro">
    <div class="panel-heading text-uppercase  pnlheading">
        <h3>{{$title}} </h3>
    </div>
    <section class="building_construction_area">
        <div class="container">
            <div class="row building_construction_row">



                @if(isset($pet))
                <div class="col-lg-8 clo-md-8 col-sm-8 col-xs-12 constructing_laft">


                    <img src="{{asset($pet->image)}}" alt="{{$pet->title}}">
                    <a href="#">{{$pet->title}}</a>
                    <p>{{$pet->description}}</p>
                </div>

                <div class="col-lg-4 clo-md-4 col-sm-4 col-xs-12 constructing_right">

                    <ul class="painting">
                        <li><br>
                            <h4> <strong> {{$pet->title}} </strong>
                                <h4>
                                    <hr>
                        </li>
                        <li>
                            <h5>Price: <strong> {{$pet->price}} Taka </strong> </h5>
                            <hr>
                        </li>
                        <li>
                            <h5>Available : <strong> {{$pet->stock}} Pices </strong> </h5>
                            <hr>
                        </li>
                        @if($pet->discount != null)
                        <li>
                            <h5>Discount: <strong class="color:red"> {{$pet->discount}}% </strong> </h5>
                            <hr>
                        </li>
                        @endif
                        <br>
                    </ul>
                    <form action="#" method="post">
                        {{ csrf_field() }}
                        <label for="quentity">Select Quentity</label>
                        <div class="quantity">
                            <a href="#" class="quantity-minus quantity-minus-d">-</a>
                            <input title="Qty" class="email input-text qty text" name="qty" type="text" value="1"
                                disabled>
                            <a href="#" class="quantity-plus quantity-plus-d">+</a>
                        </div><br>

                        <input type="hidden" name="pdt_id" value="">
                        <span class=" col-sm-2">
                            <a class="btn btn-medium btn-primary">
                                <span class="text">Add to Cart</span>
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </span><br><br>
                    </form>

                    <br> <br> <br>
                    <div class="contact_us">
                        <h2>Contact Us</h2>
                        @foreach ($link as $data)
                        <a class="contac_namber">{{$data->shop_email}}</a>
                        <a class="contac_namber">{{$data->shop_contact_number}}</a>
                        @endforeach
                        <p>We know about your need...we always provide the best products and pets for you.....</p>
                        <a href="{{$data->shop_fb_link}}" target="_blank" class="button_all btn-primary">
                            Facebook</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- This section for arrow paginate  -->
        <div class="pagination-arrow">

            @if($prev)
            <a href="{{ url('about/pet', ['slug' => $prev->slug ]) }}" class="btn-next-wrap">
                <div class="btn-content">
                    <div class="btn-content-title">Next Post</div>
                    <p class="btn-content-subtitle">{{ $prev->title }}</p>
                </div>
                <svg class="btn-next">
                    <use xlink:href="arrow-right"></use>
                </svg>
            </a>
            @endif

            @if($next)
            <a href="{{ url('about/pet', ['slug' => $next->slug ]) }}" class="btn-prev-wrap">
                <svg class="btn-prev">
                    <use xlink:href="arrow-left"></use>
                </svg>
                <div class="btn-content">
                    <div class="btn-content-title">Previous Post</div>
                    <p class="btn-content-subtitle">{{ $next->title }}</p>
                </div>
            </a>
            @endif

        </div>
        @endif
    </section>


</div>
<!-- End Show More Details For Items Area -->

@endsection