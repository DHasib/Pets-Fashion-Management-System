@extends("layouts.app")

@section("title","Products Shop | Pet Fashion Management System" )

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
                 @forelse($discountProduct as $disproduct)
                    @if($disproduct->discount != null) 
                        <div class="item">
                            <div class="row construction_iner offerpage2">
                                <div class="col-md-6 col-sm-4 construction">
                                    <div class="cns-img">
                                        <img src="{{asset($disproduct->image)}}" alt="{{$disproduct->title}}" style="width:100%; height:252.5px;">
                                    </div>
                                    <div class="cns-content">
                                        <a href="{{url('about/product/'.$disproduct->slug)}}"><i aria-hidden="true"><b>{{$disproduct->discount}}%off</b></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End Our pets OFFER Area -->


    <!-- Start Our Product area  -->
    <div class="panel panel-primary ourPro">
        <div class="panel-heading text-uppercase  pnlheading">
            <h4>Product List  </h4>
        </div><br>
        <div class="container">
            <!-- Content Row -->
            <div class="row">
                <!-- Start Sidebar Column -->
                <div class="col-lg-3 mb-4">
                    <div class="list-group ">
                        <br>
                        <div class="panel-heading text-center pnlheading">
                            <h5>Categories</h5>
                        </div>
                        @if(isset($categories))
                        @foreach ($categories as $category)
                        <a href="{{ url('products/category',$category->id ) }}" class="list-group-item"> <i class="fa fa-chevron-right"></i> {{$category->name}}</a>
                       @endforeach
                       @endif
                        <br>
                        <div class="panel-heading text-center pnlheading">
                            <h6>Search Products</h6>
                        </div>
                        <form class="example" action="{{url('products/search')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" placeholder="Search.." name="search_products">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form><br><br><br><br>
                    </div>
                </div><!-- End Sidebar Column -->
                <!-- Start Content Column -->
                <div class="col-lg-9 md-8">
                        <section class="our_team_area">
                            <div class="container resizecon">
                                <div class="row team_row">
                                    @forelse($products as $product)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInUp ">
                                            <div class="team_membar"  style="background-color:#f8b81d;">
                                               
                                                <img src="{{asset($product->image)}}" alt="" style="width:100%; height:252.5px;">
                                               
                                                <div class="team_content">
                                                    <ul>
                                                        <a href="{{url('about/product/'.$product->slug)}}" class="btn btn-success ">View Details</a>
                                                    </ul>
                                                    <a href="{{url('about/product/'.$product->slug)}}" class="name">
                                                        <h4>{{$product->title}}</h4>
                                                    </a>
                                                    <p>{{$product->category->name}} 
                                                    </p>
                                                    <span class="backcolor"> <b>{{$product->price}}</b> <i> taka</i> @if($product->discount != null)<span class="offerD"> <b> {{$product->discount}}% off</b> </span>@endif </span>
                                                    <span class="btn btn-info btn-sm btnorder"> <a href="#"> <b>add to cart</b></a> </span>
                                                </div>
                                            </div>
                                        </div>

                                    @empty 
                                    <div>
                                        <h2>No Search Found!!! Invailed Input.............</h2>
                                    </div>
                                    @endforelse
                                    
                                 </div>
                               </div>
                        </section>
                    </div> <!-- End Content Column -->
            </div> <!-- /.row -->


            <div class="row pb120 align-center">
                
                            <div class="col-lg-12">{{ $products->links()  }}</div>
    
                </div>
        </div>   <!-- /.container -->
    </div>
    <!-- End Our Pets Area -->

@endsection