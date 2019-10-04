@extends("layouts.app")

@section("title","About Pet | Pet Fashion Management System" )

@section("content")

<!-- Start OUR products and pet OFFER  -->
@include('includes.hot_offers')
<!--  End OUR products and pet OFFER-->
                                     

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
                            <h5>Price: <strong> {{$pet->price}} Taka </strong> @if($pet->discount != null)/<small style="font-size:12px;">After Discount</small>@endif </h5>
                            <hr>
                        </li>
                        <li>
                            <h5>Available : <strong> @if($pet->stock == 0) <small style="color: red; font-size:16px;">Out Of Stock</small> @else {{$pet->stock}} Pices @endif </b></strong> </h5>
                            <hr>
                        </li>
                        <li>
                            <h5>Gender : <strong> {{$pet->gender}}  </strong> </h5>
                            <hr>
                        </li>
                        @if($pet->discount != null)
                        <li>
                            <h5>Discount: <strong style="color:red;"> {{$pet->discount}}%off </strong> </h5>
                            <hr>
                        </li>
                        @endif
                        <br>
                    </ul>
                        <span class=" col-sm-2">
                            <a href="{{url('pet/add/cart',$pet->id)}}"  class="btn btn-medium btn-primary">
                                <span class="text"> <b>add to cart</b></span>
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