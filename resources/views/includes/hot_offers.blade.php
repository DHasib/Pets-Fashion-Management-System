

    <!-- OUR products OFFER [ SLIDE-BAR ] -->
    <section class="our_partners_area offerpage1">
            <div class="panel panel-primary offerpagebdr">
                <div class="panel-heading text-uppercase text-center pnlheading ">
                    <h3>HOT OFFERS</h3>
                </div>
                <div class="container">
                    <div class="panel-body">
                        <div class="partners offerpage">
                            <!-- Show Pets Discount -->
                @if(isset($discountPet))
                    @foreach($discountPet as $dispet)
                        @if($dispet->discount != null) 
                            <div class="item">
                                <div class="row construction_iner offerpage2">
                                    <div class="col-md-6 col-sm-4 construction">
                                        <div class="cns-img">
                                                <img src="{{asset($dispet->image)}}" alt="{{$dispet->title}}" style="width:100%; height:252.5px;">
                                        </div>
                                        <div class="cns-content">
                                           <a href="{{url('about/pet/'.$dispet->slug)}}"> <i aria-hidden="true"><b>{{$dispet->discount}}%off</b></i></a>
                                           <a href="{{url('about/pet/'.$dispet->slug)}}">{{$dispet->title}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
           <!-- Show Products Discount -->
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
                                       <a href="{{url('about/pet/'.$disproduct->slug)}}"> <i aria-hidden="true"><b>{{$disproduct->discount}}%off</b></i></a>
                                       <a href="{{url('about/product/'.$disproduct->slug)}}">{{$disproduct->title}}</a>
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