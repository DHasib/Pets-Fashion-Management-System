@extends("layouts.app")

@section("title","Product Categories|| Pet Fashion Management System" )

@section("content")

<!-- Start OUR products and pet OFFER  -->
@include('includes.hot_offers')
<!--  End OUR products and pet OFFER-->
                                     

<!--  Single Blog Start here -->
    
           <!-- Start Our Pets area  -->
    <div class="panel panel-primary ourPro">
            <div class="panel-heading text-uppercase  pnlheading">
                <h3>{{$title}}  </h3>
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
                            @foreach ($categories as $categorymanu)
                            <a href="{{ url('products/category',$categorymanu->id ) }}" class="list-group-item"> <i class="fa fa-chevron-right"></i> {{$categorymanu->name}}</a>
                           @endforeach
                           @endif
                            <br>    
                            <div class="panel-heading text-center pnlheading">
                                <h6>Search Product by Name</h6>
                            </div>
                            <form class="example" action="{{url('products/search')}}" method="post">
                                {{csrf_field()}}
                                <input type="text" placeholder="Search.." name="search_products">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form><br>
                        </div>
                    </div><!-- End Sidebar Column -->
                    <!-- Start Content Column -->
                    <div class="col-lg-9 md-8">
                        
                            @if (Session::has('success'))
                            <div class="alert alert-success">
                                <strong>{{ Session::get('success') }}</strong>
                            </div>
                        @elseif (Session::has('error'))
                            <div class="alert alert-danger">
                                <strong>{{ Session::get('error') }}</strong>
                            </div>
                         @endif
                            <section class="our_team_area">
                                <div class="container resizecon">
                                    <div class="row team_row">
                                            @php
                                            //DD($category);
                                        @endphp
                                       @if(isset($category))
                                       @php
                                           $ctgry = $category->products()->paginate(6);
                                       @endphp
                                            @foreach( $ctgry  as $product)
                                            @php
                                              //  DD($pet);
                                            @endphp
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
                                                        <span class="btn btn-info btn-sm btnorder"> <a href="{{url('product/add/cart',$product->id)}}"> <b>add to cart @if($product->stock == 0) <small class="badge badge-light" style="color: red; font-size:11px;">Out Of Stock</small> @endif </b></a> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="row pb120 align-center">
                
                                                <div class="col-lg-12">{{ $ctgry->links()  }}</div>
                        
                                       </div>
                                        @endif
                                     </div>
                                   </div>
                            </section>
                        </div> <!-- End Content Column -->
                </div> <!-- /.row 
                <div class="row pb120 align-center">
                
                        <div class="col-lg-12">//{//{ //$category->links() // }}</div>

            </div>-->
    
              
            </div>   <!-- /.container -->
        </div>
        <!-- End Our Pets Area -->


@endsection