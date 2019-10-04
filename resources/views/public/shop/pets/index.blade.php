@extends("layouts.app")

@section("title","Pets Shop | Pet Fashion Management System" )

@section("content")

<!-- Start OUR products and pet OFFER  -->
@include('includes.hot_offers')
<!--  End OUR products and pet OFFER-->
                                    


    <!-- Start Our Pets area  -->
    <div class="panel panel-primary ourPro">
        <div class="panel-heading text-uppercase  pnlheading">
            <h4>Pets Shop  </h4>
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
                        <a href="{{ url('pets/category',$category->id ) }}" class="list-group-item"> <i class="fa fa-chevron-right"></i> {{$category->name}}</a>
                       @endforeach
                       @endif
                        <br>
                        <div class="panel-heading text-center pnlheading">
                            <h6>Search Pet By Name/Title</h6>
                        </div>
                        <form class="example" action="{{url('pets/search')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" placeholder="Search.." name="search_pets">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form><br><br><br><br>
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
                                    @forelse($pets as $pet)
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
                                                     <a href="{{url('pet/add/cart',$pet->id)}}" class="btn btn-info btn-sm btnorder"> <b style="color:black;">add to cart @if($pet->stock == 0) <small class="badge badge-light" style="color: red; font-size:11px;">Out Of Stock</small> @endif </b></a> 
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
                
                            <div class="col-lg-12">{{ $pets->links()  }}</div>
    
                </div>
        </div>   <!-- /.container -->
    </div>
    <!-- End Our Pets Area -->

@endsection