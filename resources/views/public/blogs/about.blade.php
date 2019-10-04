@extends("layouts.app")

@section("title","Blog Read || Pet Fashion Management System" )

@section("content")

<!-- Start OUR products and pet OFFER  -->
@include('includes.hot_offers')
<!--  End OUR products and pet OFFER-->



<!--  Single Blog Start here -->

<div class="panel panel-primary ourPro">
        <div class="panel-heading text-uppercase  pnlheading">
            <h3>{{ $post->blog_title }}</h3>
        </div><br>
                    
        <div class="container">
            @if(isset($post))
                        <div class="row medium-padding120">
                            <main class="main">
                                    <div class="col-lg-10 col-lg-offset-1">
                                    <article class="hentry post post-standard-details">

                                        <div class="post-thumb">
                                                <img src="{{ url($post->blog_image) }}" alt="seo">
                                        </div>

                                        <div class="post__content">
                

                                                <div class="post-additional-info">

                                                    <div class="post__author author vcard">
                                                            Posted by

                                                            <div class="post__author-name fn">
                                                                <a href="{{url('selected/user/profile',$post->user->id )}}" class="post__author-link">{{$post->user->name }}</a>
                                                            </div>

                                                    </div>

                                                    <span class="post__date">

                                                            <i class="seoicon-clock"></i>

                                                            <time class="published" datetime="2016-03-20 12:00:00">
                                                                {{ $post->created_at->toFormattedDateString() }}
                                                            </time>

                                                    </span>

                                                    <span class="category">
                                                            <i class="seoicon-tags"></i>
                                                            <a href="{{ url('blog/category', $post->category->id) }}">{{ $post->category->name }}</a>
                                                    </span>

                                                </div>

                                                <!--  Blog Content Show Here-->
                                                <div class="post__content-info">

                                                        {!! $post->blog_content !!}
                                                </div>

                                        </div>
                
                                    </article>
                                     <span> <h4>About Blog Writter </h4><br></span>
                                    <div class="blog-details-author"> 
                                           
                                        <div class="blog-details-author-thumb">
                                                <img src="{{asset ($post->user->profile->user_img) }}" style="width:100px; height:100px; border-radius:100%;" alt="Author">
                                        </div>

                                        <div class="blog-details-author-content">
                                                <div class="author-info">
                                                <h5 class="author-name"><a href="{{url('selected/user/profile',$post->user->id )}}">{{ $post->user->name }}</a></h5>
                                                </div>
                                                <p class="text">{{ $post->user->profile->about }}
                                                </p>
                                                <div class="socials">

                                                <a href="{{ $post->user->profile->facebook }}" class="social__item" target="_blank">
                                                    <img src="{{ asset('app/svg/circle-facebook.svg') }}" alt="facebook">
                                                </a>

                                                <a href="{{ $post->user->profile->youtube }}" class="social__item" target="_blank">
                                                    <img src="{{ asset('app/svg/youtube.svg') }}" alt="youtube">
                                                </a>

                                                </div>
                                        </div>
                                    </div>
                               <!-- This section for arrow paginate  -->
                                    <div class="pagination-arrow">

                                        @if($prev)
                                                <a href="{{ url('post', ['slug' => $prev->slug ]) }}" class="btn-next-wrap">
                                                    <div class="btn-content">
                                                    <div class="btn-content-title">Next Post</div>
                                                    <p class="btn-content-subtitle">{{ $prev->blog_title }}</p>
                                                    </div>
                                                    <svg class="btn-next">
                                                    <use xlink:href="#arrow-right"></use>
                                                    </svg>
                                                </a>
                                        @endif

                                        @if($next)
                                                <a href="{{ url('post', ['slug' => $next->slug ]) }}" class="btn-prev-wrap">
                                                    <svg class="btn-prev">
                                                    <use xlink:href="#arrow-left"></use>
                                                    </svg>
                                                    <div class="btn-content">
                                                    <div class="btn-content-title">Previous Post</div>
                                                    <p class="btn-content-subtitle">{{ $next->blog_title }}</p>
                                                    </div>
                                                </a>
                                        @endif

                                    </div>

                                    <div class="comments">

                                        <div class="heading text-center">
                                                <h4 class="h1 heading-title">Comments</h4>
                                                <div class="heading-line">
                                                <span class="short-line"></span>
                                                <span class="long-line"></span>
                                                </div>
                                        </div>

                                        
                                    </div>

                                    </div>

                                    <!-- End Post Details -->
                            </main>
                        </div>
            </div>
            @endif

</div>
 


@endsection