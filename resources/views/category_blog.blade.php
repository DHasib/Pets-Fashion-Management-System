@extends("layouts.app")

@section("title","Blog Read || Pet Fashion Management System" )

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
    
                <div class="panel panel-primary ourPro">
                            <div class="panel-heading text-uppercase  pnlheading">
                                <h3>Blog Category:  {{ $title }}</h3>
                            </div><br> 
                            <div class="container">
                               @if(isset($category))
                                    <div class="row medium-padding120">
                                          <main class="main">
                                                      <div class="row">
                                                                  <div class="case-item-wrap">
                                                                        @foreach($category->blogPosts()->where('status',0)->get() as $post)
                                                                       
                                                                    
                                                                              <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                                                                    <div class="case-item">
                                                                                          <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                                                                          <img src="{{ url($post->blog_image) }}" alt="our case">
                                                                                          </div>
                                                                                        
                                                                                          <div class="post-additional-info col-sm-12 text-small">

                                                                                                <span class="post__comments text-uppercase float-left col-sm-6 small">
                                                                                                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
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
                        
                                                                        @endforeach
                                                                  </div>
                                                      </div>
                        
                                                </main>
                                    </div>
                                    @endif
                              </div>
                        
                    
                </div>
        


@endsection