@extends("layouts.app")

@section("title","Pet Categories|| Pet Fashion Management System" )

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
                                            <img src="{{asset('images/cns-1.jpg')}}" alt="">
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
                                            <img src="{{asset('images/cns-1.jpg')}}" alt="">
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
                                            <img src="{{asset('images/cns-1.jpg')}}" alt="">
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
                                            <img src="{{asset('images/cns-1.jpg')}}" alt="">
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
                            <a href="{{ url('pets/category',$categorymanu->id ) }}" class="list-group-item"> <i class="fa fa-chevron-right"></i> {{$categorymanu->name}}</a>
                           @endforeach
                           @endif
                            <br>    
                            <div class="panel-heading text-center pnlheading">
                                <h6>Search Products</h6>
                            </div>
                            <form class="example" action="/action_page.php">
                                <input type="text" placeholder="Search.." name="search2">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form><br><br><br><br>
                        </div>
                    </div><!-- End Sidebar Column -->
                    <!-- Start Content Column -->
                    <div class="col-lg-9 md-8">
                            <section class="our_team_area">
                                <div class="container resizecon">
                                    <div class="row team_row">
                                            @php
                                            //DD($category);
                                        @endphp
                                       @if(isset($category))
                                            @foreach($category->pets as $pet)
                                            @php
                                              //  DD($pet);
                                            @endphp
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInUp ">
                                                <div class="team_membar"  style="background-color:#f8b81d;">
                                                   
                                                    <img src="{{asset($pet->image)}}" alt="" style="width:100%; height:252.5px;">
                                                   
                                                    <div class="team_content">
                                                        <ul>
                                                            <a href="{{url('about/pet/'.$pet->slug)}}" class="btn btn-success ">View Details</a>
                                                        </ul>
                                                        <a href="{{url('about/pet/'.$pet->slug)}}" class="name">
                                                            <h4>{{$pet->title}}</h4>
                                                        </a>
                                                        <p>{{$pet->category->name}} 
                                                        </p>
                                                        <span class="backcolor"> <b>{{$pet->price}}</b> <i> taka</i> @if($pet->discount != null)<span class="offerD"> <b> {{$pet->discount}}% off</b> </span>@endif </span>
                                                        <span class="btn btn-info btn-sm btnorder"> <a href="#"> <b>add to cart</b></a> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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