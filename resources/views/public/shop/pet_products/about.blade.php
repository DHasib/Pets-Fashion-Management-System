@extends("layouts.app")

@section("title","About Product | Pet Fashion Management System" )

@section("content")

    <!-- OUR products OFFER [ SLIDE-BAR ] -->
    <section class="our_partners_area offerpage1">
            <div class="panel panel-primary offerpagebdr">
                <div class="panel-heading text-uppercase text-center pnlheading ">
                    <h3>HOT OFFERS</h3>
                </div>
                <div class="container">
                    <div class="panel-body">
                        <div class="partners offerpage">
                @if(isset($discountProduct))
                    @foreach($discountProduct as $disproduct)
                        @if($disproduct->discount != null) 
                            <div class="item">
                                <div class="row construction_iner offerpage2">
                                    <div class="col-md-6 col-sm-4 construction">
                                        <div class="cns-img">
                                                <img src="{{asset($disproduct->image)}}" alt="{{$disproduct->title}}" style="width:100%; height:252.5px;">
                                        </div>
                                        <div class="cns-content">
                                           <a href="{{url('about/product/'.$disproduct->slug)}}"> <i aria-hidden="true"><b>{{$disproduct->discount}}%off</b></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                        </div>
                    </div>
                </div>
            </div>
    
        </section>
        <!-- End Our pets OFFER Area -->
                                     

<!--  Single Blog Start here -->

<!-- Show More Details For Items Area -->
<div class="panel panel-primary ourPro">
    <div class="panel-heading text-uppercase  pnlheading">
        <h3>{{$title}} </h3>
    </div>
    <section class="building_construction_area">
        <div class="container">
                @if (Session::has('success'))
                <div class="alert alert-success">
                    <strong>{{ Session::get('success') }}</strong>
                </div>
            @elseif (Session::has('error'))
                <div class="alert alert-danger">
                    <strong>{{ Session::get('error') }}</strong>
                </div>
             @endif
            <div class="row building_construction_row">
                @if(isset($product))
                <div class="col-lg-8 clo-md-8 col-sm-8 col-xs-12 constructing_laft">
                    <img src="{{asset($product->image)}}" alt="{{$product->title}}">
                    <a href="#">{{$product->title}}</a>
                    <p>{{$product->description}}</p>
                </div>

                <div class="col-lg-4 clo-md-4 col-sm-4 col-xs-12 constructing_right">

                    <ul class="painting">
                        <li><br>
                            <h4> <strong> {{$product->title}} </strong>
                                <h4>
                                    <hr>
                        </li>
                        <li>
                            <h5>Price: <strong> {{$product->price}} Taka @if($product->discount != null)/<small style="font-size:12px;">After Discount</small>@endif </strong> </h5>
                            <hr>
                        </li>
                        <li>
                            <h5>Available : <strong> @if($product->stock == 0) <small style="color: red; font-size:16px;">Out Of Stock</small> @else {{$product->stock}} Pices @endif </b></strong> </strong> </h5>
                            <hr>
                        </li>
                        @if($product->discount != null)
                        <li>
                            <h5>Discount: <strong style="color:red;"> {{$product->discount}}% </strong> </h5>
                            <hr>
                        </li>
                        @endif
                        <br>
                    </ul>
                        <span class=" col-sm-2">
                            <a href="{{url('product/add/cart',$product->id)}}" class="btn btn-medium btn-primary">
                                <span class="text">Add to Cart</span>
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </span><br><br>

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
            <a href="{{ url('about/product', ['slug' => $prev->slug ]) }}" class="btn-next-wrap">
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
            <a href="{{ url('about/product', ['slug' => $next->slug ]) }}" class="btn-prev-wrap">
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