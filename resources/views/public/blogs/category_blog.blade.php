@extends("layouts.app")

@section("title","Blog Read || Pet Fashion Management System" )

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


<!--  Single Blog Start here -->
    
                <div class="panel panel-primary ourPro">
                            <div class="panel-heading text-uppercase  pnlheading">
                                <h3>{{ $title }}</h3>
                            </div>
                            <div class="container">
                                @if(isset($categories))
                                  <!-- Category wise navbar and search area  -->
                                  <div class="col-lg-12" style="margin-bottom:100px; background-color:aliceblue">
                                        <div class="subscribe scrollme">
                                        <!--Category List  -->
                                        <ul class="primary-menu-menu" style="overflow: hidden;">
                                            @foreach ($categories as $navcategory)
                                            <li>
                                                <a href="{{ url('blog/category',$navcategory->id ) }}">{{$navcategory->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                               @if(isset($category))
                                    <div class="row medium-padding120">
                                          <main class="main">
                                                      <div class="row">
                                                                  <div class="case-item-wrap">
                                                                        @forelse($category->blogPosts()->where('status',0)->get() as $post)
                                                                       
                                                                    
                                                                              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                                                    <div class="case-item">
                                                                                          <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="">
                                                                                          <img src="{{ url($post->blog_image) }}" alt="our case">
                                                                                          </div>
                                                                                        
                                                                                          <div class="post-additional-info col-sm-12 text-small">

                                                                                                <span class="post__comments text-uppercase float-left col-sm-6 small">
                                                                                                        <a href="{{url('selected/user/profile',$post->user->id )}}"><i class="fa fa-user" aria-hidden="true"></i></a>
                                                                                                        {{ $post->user->name }}
                                                                                                    </span>
                                                                                            <span class="float-right col-sm-6 small">
                                                                                                <i class="seoicon-clock"></i>
                                                                                                <time class="published" datetime="2016-04-17 12:00:00">
                                                                                                        {{ $post->created_at->toFormattedDateString() }}
                                                                                                </time>
                                                                                            </span>
                                                                                    </div><br>
                                                                                    <a href="{{ url('post',$post->slug ) }}"><h6 class="case-item__title">{{ $post->blog_title }}</h6></a>
                                                                                    </div>
                                                                              </div>
                                                                          @empty
                                                                          <h5>This Category Blogsd Are not Available.......or Panding</h5>
                                                                        @endforelse
                                                                  </div>
                                                      </div>
                        
                                                </main>
                                    </div>
                                    @endif
                              </div>
                        
                    
                </div>
        


@endsection