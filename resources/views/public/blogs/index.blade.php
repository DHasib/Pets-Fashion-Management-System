@extends("layouts.app")

@section("title","Blogs | Pet Fashion Management System" )

@section("content")

<!-- Start OUR products and pet OFFER  -->
@include('includes.hot_offers')
<!--  End OUR products and pet OFFER-->

<!-- blog area -->
<div class="panel panel-primary ourPro">
        <div class="panel-heading text-uppercase  pnlheading">
            <h3>Our Blog </h3>
        </div><br>

        <div class="container">
            @if(isset($categories))
            <!-- Category wise navbar and search area  -->
            <div class="col-lg-12" style="margin-bottom:50px; background-color:aliceblue">
                <!--Category List  -->
                <ul class="primary-menu-menu" >
                    @foreach ($categories as $category)
                    <li>
                        <a href="{{ url('blog/category',$category->id ) }}">{{$category->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="heading">
                        <h4 class="h1 heading-title">Our latest Blogs</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>
                </div><br>
            </div>
            <div class="row">
                <!-- Get the first Post area 1.1 -->
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
                                    <a
                                        href="{{url ('post',['slug' => $first_post->slug ]) }}">{{ $first_post->blog_title }}</a>
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
                                        <a
                                            href="{{url('category',$first_post->category->id)}}">{{ $first_post->category->name }}</a>
                                    </span>

                                    <span class="post__comments text-uppercase">
                                        <a href="{{url('selected/user/profile',$first_post->user->id )}}"><i class="fa fa-user" aria-hidden="true"></i>
                                        {{ $first_post->user->name }}</a>
                                    </span><br><br>
                                    <span><p>{{str_limit($first_post->blog_content,300)}} <a href="{{url ('post',['slug' => $first_post->slug ]) }}"><b>Read
                                            More</b></a></p></span>
                                </div>
                            </div>
                        </div>

                    </article>
                    @endif
                </div>
                <div class="col-lg-2"></div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <!-- Get the first Post area 1.2 -->
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
                                    <a
                                        href="{{url ('post',['slug' => $second_post->slug ]) }}">{{ $second_post->blog_title }}</a>
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
                                        <a href="{{url('selected/user/profile',$second_post->user->id )}}"><i class="fa fa-user" aria-hidden="true"></i>
                                        {{ $second_post->user->name }}</a>
                                    </span><br><br>
                                    <span><p>{{str_limit($second_post->blog_content,200)}} <a href="{{url ('post',['slug' => $second_post->slug ]) }}"><b>Read
                                            More</b></a></p></span>

                                </div>
                            </div>
                        </div>

                    </article>
                    @endif
                </div>
                <div class="col-lg-6">
                    <!-- Get the first Post area 1.3 -->
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
                                    <a
                                        href="{{url ('post',['slug' => $third_post->slug ]) }}">{{ $third_post->blog_title }}</a>
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
                                        <a href="{{url('selected/user/profile',$third_post->user->id )}}"><i class="fa fa-user" aria-hidden="true"></i>
                                        {{ $third_post->user->name }}</a>
                                    </span><br><br>
                                    <span><p>{{str_limit($third_post->blog_content,200)}} <a href="{{url ('post',['slug' => $third_post->slug ]) }}"><b>Read
                                            More</b></a></p></span>

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
                                    @php
                                        $dogs = $dog->blogPosts()->orderBy('created_at', 'desc')->where('status',0)->paginate(3);
                                    @endphp
                                    @foreach( $dogs as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{ $post->blog_image }}" alt="{{ $post->blog_title }}">
                                            </div>
                                            <div class="post-additional-info col-sm-12 text-small">

                                                <span class="post__comments text-uppercase col-sm-6 small">
                                                    <a href="{{url('selected/user/profile',$post->user->id )}}"><i class="fa fa-user" aria-hidden="true"></i>
                                                    {{ $post->user->name }}</a>
                                                </span>
                                                <span class="col-sm-6 small">
                                                    <i class="seoicon-clock"></i>
                                                    <time class="published" datetime="2016-04-17 12:00:00">
                                                        {{ $post->created_at->toFormattedDateString() }}
                                                    </time>
                                                </span>
                                            </div><br><br>
                                            <span><h6 class="case-item__title"><a
                                                    href="{{url ('post',['slug' => $post->slug ]) }}">{{ $post->blog_title }}</a>
                                            </h6></span>
                                            <br>
                                            <span><p>{{str_limit($post->blog_content,101)}} <a href="{{url ('post',['slug' => $post->slug ]) }}"><b>Read
                                            More</b></a></p></span>

                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="row pb120 align-center">
                
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">{{ $dogs->links()  }}</div>
                                </div><br>
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
                                    @php
                                       $cats = $cat->blogPosts()->orderBy('created_at',
                                    'desc')->where('status',0)->paginate(3);
                                    @endphp
                                    @foreach($cats as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{ $post->blog_image }}" alt="our case">
                                            </div>
                                            <div class="post-additional-info col-sm-12 text-small">

                                                <span class="post__comments text-uppercase float-left col-sm-6 small">
                                                    <a href="{{url('selected/user/profile',$post->user->id )}}"><i class="fa fa-user" aria-hidden="true"></i>
                                                    {{ $post->user->name }}</a>
                                                </span>
                                                <span class="float-right col-sm-6 small">
                                                    <i class="seoicon-clock"></i>
                                                    <time class="published" datetime="2016-04-17 12:00:00">
                                                        {{ $post->created_at->toFormattedDateString() }}
                                                    </time>
                                                </span>
                                            </div><br><br>
                                            <span><h6 class="case-item__title"><a
                                                    href="{{url ('post',['slug' => $post->slug ]) }}">{{ $post->blog_title }}</a>
                                            </h6></span>
                                            <br>
                                            <span><p>{{str_limit($post->blog_content,115)}} <a href="{{url ('post',['slug' => $post->slug ]) }}"><b>Read
                                            More</b></a></p></span>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="row pb120 align-center">
                
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">{{ $cats->links()  }}</div>
                                   </div><br>

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
                                    @php
                                        $bird = $birds->blogPosts()->orderBy('created_at', 'desc')->where('status',0)->paginate(3);
                                    @endphp
                                    @foreach($bird as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{ $post->blog_image }}" alt="our case">
                                            </div>
                                            <div class="post-additional-info col-sm-12 text-small">

                                                <span class="post__comments text-uppercase float-left col-sm-6 small">
                                                    <a href="{{url('selected/user/profile',$post->user->id )}}"><i class="fa fa-user" aria-hidden="true"></i>
                                                    {{ $post->user->name }}</a>
                                                </span>
                                                <span class="float-right col-sm-6 small">
                                                    <i class="seoicon-clock"></i>
                                                    <time class="published" datetime="2016-04-17 12:00:00">
                                                        {{ $post->created_at->toFormattedDateString() }}
                                                    </time>
                                                </span>
                                            </div><br><br>
                                            <span><h6 class="case-item__title "><a
                                                    href="{{url ('post',['slug' => $post->slug ]) }}">{{ $post->blog_title }}</a>
                                            </h6></span>
                                            <br>
                                            <span><p>{{str_limit($post->blog_content,115)}} <a href="{{url ('post',['slug' => $post->slug ]) }}"><b>Read
                                            More</b></a></p></span>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="row pb120 align-center">
                
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">{{ $bird->links()  }}</div>
                                   </div><br>
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
                                    @php
                                        $rabbits = $rabbit->blogPosts()->orderBy('created_at', 'desc')->where('status',0)->paginate(3);
                                    @endphp
                                    @foreach($rabbits as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{ $post->blog_image }}" alt="our case">
                                            </div>
                                            <div class="post-additional-info col-sm-12 text-small">

                                                <span class="post__comments text-uppercase float-left col-sm-6 small">
                                                    <a href="{{url('selected/user/profile',$post->user->id )}}"><i class="fa fa-user" aria-hidden="true"></i>
                                                    {{ $post->user->name }}</a>
                                                </span>
                                                <span class="float-right col-sm-6 small">
                                                    <i class="seoicon-clock"></i>
                                                    <time class="published" datetime="2016-04-17 12:00:00">
                                                        {{ $post->created_at->toFormattedDateString() }}
                                                    </time>
                                                </span>
                                            </div><br><br>
                                           <span> <h6 class="case-item__title"><a
                                                    href="{{url ('post',['slug' => $post->slug ]) }}">{{ $post->blog_title }}</a>
                                            </h6></span>
                                            <br>
                                            <span><p>{{str_limit($post->blog_content,115)}} <a href="{{url ('post',['slug' => $post->slug ]) }}"><b>Read
                                            More</b></a></p></span>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="row pb120 align-center">
                
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">{{ $rabbits->links()  }}</div>
                                   </div><br>
                                   
                                </div>
                            @endif
                        </div>
                        <div class="padded-50"></div><br><br><br>

                    </div>
                </div>
            </div>
        </div>
</div> 
 @endsection