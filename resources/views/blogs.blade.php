@extends("layouts.app")

@section("title","Blogs | Pet Fashion Management System" )

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

    <!-- blog area -->
    <div class="panel panel-primary ourPro">
            <div class="panel-heading text-uppercase  pnlheading">
                <h3>Our Blog </h3>
            </div><br>

            <div class="container">
                @if(isset($categories))   <!-- Category wise navbar and search area  -->
                <div class="col-lg-12" style="margin-bottom:100px; background-color:aliceblue"> 
                               <div class="subscribe scrollme">
                                    <div class="col-xs-12 {{ $errors->has('search_user') ? 'has-error' : '' }}">
                                        <form class="subscribe-form" method="post" action="">
                                            <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Search by Category Name" type="email">
                                            <button class="subscr-btn">Search
                                                <span class="semicircle--right"></span>
                                            </button>
                                        </form>
                                        @if ($errors->has('search_user'))
                                        <span class="help-block">
                                          <strong>  {{ $errors->first('search_user') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                </div>
                        <!--Category List  -->
                        <ul class="primary-menu-menu" style="overflow: hidden;">

                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ url('category',$category->id ) }}">{{$category->name}}</a>
                                    </li>
                                @endforeach
                        </ul>
                </div>
                    @endif

                    <div class="row"><!-- Get the first Post area 1.1 -->
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                      @if(isset( $first_post))
                            <article class="hentry post post-standard has-post-thumbnail sticky">
                                    <div class="post-thumb">
                                        <img src="{{ $first_post->blog_image }}" alt="{{ $first_post->blog_title }}">
                                        <div class="overlay"></div>
                                        <a href="{{ $first_post->blog_image }}" class="link-image js-zoom-image">
                                            <i class="seoicon-zoom"></i>
                                        </a>
                                        <a href="{{url ('post',['slug' => $first_post->slug ]) }}" class="link-post">
                                            <i class="seoicon-link-bold"></i>
                                        </a>
                                    </div>
            
                                    <div class="post__content">
            
                                        <div class="post__content-info">
            
                                                <h2 class="post__title entry-title ">
                                                <a href="{{url ('post',['slug' => $first_post->slug ]) }}">{{ $first_post->blog_title }}</a>
                                                </h2>
            
                                                <div class="post-additional-info">
            
                                                    <span class="post__date">
            
                                                        <i class="seoicon-clock"></i>
            
                                                        <time class="published" datetime="2016-04-17 12:00:00">
                                                                {{ $first_post->created_at->diffForHumans() }}
                                                        </time>
            
                                                    </span>
            
                                                    <span class="category">
                                                        <i class="seoicon-tags"></i>
                                                        <a href="{{url('category',$first_post->category->id)}}">{{ $first_post->category->name }}</a>
                                                    </span>
            
                                                    <span class="post__comments text-uppercase">
                                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                                                            {{ $first_post->user->name }}
                                                        </span>
            
                                                </div>
                                        </div>
                                    </div>
            
                            </article>
                            @endif
                        </div>
                        <div class="col-lg-2"></div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-6"><!-- Get the first Post area 1.2 -->
                                @if(isset($second_post))
                            <article class="hentry post post-standard has-post-thumbnail sticky">
            
                                    <div class="post-thumb">
                                        <img src="{{ $second_post->blog_image }}" alt="{{ $second_post->blog_title }}">
                                        <div class="overlay"></div>
                                        <a href="{{ $second_post->blog_image }}" class="link-image js-zoom-image">
                                            <i class="seoicon-zoom"></i>
                                        </a>
                                        <a href="{{url ('post',['slug' => $second_post->slug ]) }}" class="link-post">
                                            <i class="seoicon-link-bold"></i>
                                        </a>
                                    </div>
            
                                    <div class="post__content">
            
                                        <div class="post__content-info">
            
                                                <h2 class="post__title entry-title ">
                                                    <a href="{{url ('post',['slug' => $second_post->slug ]) }}">{{ $second_post->blog_title }}</a>
                                                </h2>
            
                                                <div class="post-additional-info">
            
                                                    <span class="post__date">
            
                                                        <i class="seoicon-clock"></i>
            
                                                        <time class="published" datetime="2016-04-17 12:00:00">
                                                                {{ $second_post->created_at->diffForHumans() }}
                                                        </time>
            
                                                    </span>
            
                                                    <span class="category">
                                                        <i class="seoicon-tags"></i>
                                                        <a href="#">{{ $second_post->category->name }}</a>
                                                    </span>
            
                                                    <span class="post__comments text-uppercase">
                                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                                                            {{ $second_post->user->name }}
                                                        </span>
            
                                                </div>
                                        </div>
                                    </div>
            
                            </article>
                            @endif
                        </div>
                        <div class="col-lg-6"><!-- Get the first Post area 1.3 -->
                            @if(isset($third_post))
                            <article class="hentry post post-standard has-post-thumbnail sticky">
            
                                    <div class="post-thumb">
                                        <img src="{{ $third_post->blog_image }}" alt="{{ $third_post->blog_title }}">
                                        <div class="overlay"></div>
                                        <a href="{{ $third_post->blog_image }}" class="link-image js-zoom-image">
                                            <i class="seoicon-zoom"></i>
                                        </a>
                                        <a href="{{url ('post',['slug' => $third_post->slug ]) }}" class="link-post">
                                            <i class="seoicon-link-bold"></i>
                                        </a>
                                    </div>
            
                                    <div class="post__content">
            
                                        <div class="post__content-info">
            
                                                <h2 class="post__title entry-title ">
                                                    <a href="{{url ('post',['slug' => $third_post->slug ]) }}">{{ $third_post->blog_title }}</a>
                                                </h2>
            
                                                <div class="post-additional-info">
            
                                                    <span class="post__date">
            
                                                        <i class="seoicon-clock"></i>
            
                                                        <time class="published" datetime="2016-04-17 12:00:00">
                                                                {{ $third_post->created_at->diffForHumans() }}
                                                        </time>
            
                                                    </span>
            
                                                    <span class="category">
                                                        <i class="seoicon-tags"></i>
                                                        <a href="#">{{ $third_post->category->name }}</a>
                                                    </span>
            
                                                    <span class="post__comments text-uppercase">
                                                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                                                        {{ $third_post->user->name }}
                                                    </span>
            
                                                </div>
                                        </div>
                                    </div>
            
                            </article>
                            @endif
                        </div>
                    </div>
            </div>

    <!-- Category wise slide 1  -->
 
    <div class="container-fluid">
            <div class="row medium-padding120 bg-border-color">
                <div class="container">
                    <div class="col-lg-12">
                    <div class="offers">
                @if(isset( $dog))
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    <h4 class="h1 heading-title">{{ $dog->name }}</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="case-item-wrap">
                                @foreach($dog->blogPosts()->orderBy('created_at', 'desc')->take(10)->where('status',0)->get() as $post)
                                @php
                                    //dd($post);
                                @endphp
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{ $post->blog_image }}" alt="{{ $post->blog_title }}" >
                                            </div>
                                            <div class="post-additional-info col-sm-12 text-small">

                                                    <span class="post__comments text-uppercase col-sm-6 small">
                                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                                                            {{ $post->user->name }}
                                                    </span>
                                                <span class="col-sm-6 small">
                                                    <i class="seoicon-clock"></i>
                                                    <time class="published" datetime="2016-04-17 12:00:00">
                                                            {{ $post->created_at->toFormattedDateString() }}
                                                    </time>
                                                </span>
                                        </div><br>
                                        <h6 class="case-item__title"><a href="{{url ('post',['slug' => $post->slug ]) }}">{{ $post->blog_title }}</a></h6>
                                                
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="padded-50"></div>
                    
                    <!-- Category wise slide 2  -->
                    <div class="offers">
                        @if(isset( $cat))
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    <div class="heading">
                                        <h4 class="h1 heading-title">{{ $cat->name }}</h4>
                                        <div class="heading-line">
                                            <span class="short-line"></span>
                                            <span class="long-line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="case-item-wrap">
                                    @foreach($cat->blogPosts()->orderBy('created_at', 'desc')->take(10)->where('status',0)->get() as $post)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="case-item">
                                                <div class="case-item__thumb">
                                                    <img src="{{ $post->blog_image }}" alt="our case">
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
                                            <h6 class="case-item__title"><a href="{{url ('post',['slug' => $post->slug ]) }}">{{ $post->blog_title }}</a></h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                         @endif
                        </div>
                        <div class="padded-50"></div>
                   

                    <!-- Category wise slide 3  -->
                        <div class="offers">
                             @if(isset( $birds))
                                <div class="row">
                                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                        <div class="heading">
                                            <h4 class="h1 heading-title">{{ $birds->name }}</h4>
                                            <div class="heading-line">
                                                <span class="short-line"></span>
                                                <span class="long-line"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="case-item-wrap">
                                        @foreach($birds->blogPosts()->orderBy('created_at', 'desc')->take(10)->where('status',0)->get() as $post)
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="case-item">
                                                    <div class="case-item__thumb">
                                                        <img src="{{ $post->blog_image }}" alt="our case">
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
                                                <h6 class="case-item__title "><a href="{{url ('post',['slug' => $post->slug ]) }}">{{ $post->blog_title }}</a></h6>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            </div>
                            <div class="padded-50"></div>
                    

                        <!-- Category wise slide 4  -->
                            <div class="offers">
                                    @if(isset( $rabbit))
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                            <div class="heading">
                                                <h4 class="h1 heading-title">{{ $rabbit->name }}</h4>
                                                <div class="heading-line">
                                                    <span class="short-line"></span>
                                                    <span class="long-line"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="case-item-wrap">
                                            @foreach($rabbit->blogPosts()->orderBy('created_at', 'desc')->take(10)->where('status',0)->get() as $post)
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <div class="case-item">
                                                        <div class="case-item__thumb">
                                                            <img src="{{ $post->blog_image }}" alt="our case">
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
                                                    <h6 class="case-item__title"><a href="{{url ('post',['slug' => $post->slug ]) }}">{{ $post->blog_title }}</a></h6>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                 @endif
                                </div>
                                <div class="padded-50"></div><br><br><br>
                       
                      


                </div>
            </div>
         




  


@endsection