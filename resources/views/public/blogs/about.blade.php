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
                                        <a href="{{url('selected/user/profile',$post->user->id )}}"
                                            class="post__author-link">{{$post->user->name }}</a>
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
                                    <a
                                        href="{{ url('blog/category', $post->category->id) }}">{{ $post->category->name }}</a>
                                </span>

                            </div>

                            <!--  Blog Content Show Here-->
                            <div class="post__content-info">

                                {!! $post->blog_content !!}
                            </div><br>
                            <div class="panel-footer">
                                    <span class="pull-right text-muted">
                                           11 Comments
                                    </span>
                                       <span> <a href="#" class=" btn btn-success btn-xs">Like</a></span>
                                    
                          </div>
                        </div>

                    </article>
                    <span>
                        <h4>About Blog Writter </h4><br>
                    </span>
                    <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            <img src="{{asset ($post->user->profile->user_img) }}"
                                style="width:100px; height:100px; border-radius:100%;" alt="Author">
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name"><a
                                        href="{{url('selected/user/profile',$post->user->id )}}">{{ $post->user->name }}</a>
                                </h5>
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

                    <div class="panel panel-default">

                        <div class="text-center panel-heading">
                            <h4 class="heading-title">Write Down Your Comments</h4>
                        </div>
                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            <strong>{{ Session::get('success') }}</strong>
                        </div>{{ Session::get('error') }}</strong>
                        @endif
                        <div class="blog-details-author">
                            <!-- Start Comment to Blogs Area -->

                            <div class="panel-body">
                                <div class="blog-details-author-thumb">
                                    <img src="@if (isset($authUser) && $authUser->count() > 0){{asset ($authUser->profile->user_img) }} @else # @endif"
                                        style="width:55px; height:55px; border-radius:100%;" alt="Author">
                                </div>

                                <div class="blog-details-author-content">
                                    <div class="author-info">
                                        <h5 class="author-name"><a href="@if (isset($authUser) && $authUser->count() > 0) {{url('selected/user/profile',$authUser->id )}} @else # @endif">@if(isset($authUser) && $authUser->count() > 0){{ $authUser->name }} @else
                                                User Name @endif</a></h5> <br>
                                        <span class="text-muted">{{now()->toFormattedDateString()}}</span>
                                    </div><br>
                                    <form action="{{ url ('blog/comment')}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
                                            <textarea name="comment" id="content" cols="7" rows="3"
                                                class="form-control"></textarea>

                                            @if ($errors->has('comment'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('comment') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <input type="text" name="user_id" value="{{$authUser->id}}" hidden>
                                        <input type="text" name="blog_id" value="{{$post->id}}" hidden>
                                        <div class="form-group">
                                            @if(auth::user())
                                            <button class="btn btn-success pull-right" type="submit">Submit a
                                                comment</button>
                                            @else
                                            <a class="btn btn-danger pull-right" href="{{url('login')}}">Log in to Post
                                                a comment</a>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Comment to Blogs Area -->

                            <!-- Start Show user Comment  Area -->
                            @if(isset($comments) && $comments->count() > 0 )
                            @foreach ($comments as $comment)
                            <div class="panel panel-default">
                                <div class="panel-heading overflow-auto">
                                    <div class="blog-details-author-thumb">
                                        <img src="{{asset ($comment->user->profile->user_img) }}"
                                            style="width:55px; height:55px; border-radius:100%;" alt="Author">
                                    </div>

                                    <div class="blog-details-author-content">
                                        <div class="author-info">
                                            <h6 class="author-name"><a
                                                    href="{{url('selected/user/profile',$comment->user->id )}}">{{ $comment->user->name }}</a>
                                            </h6> <br>
                                            <span class="text-muted">{{$comment->created_at->diffForHumans() }}</span>
                                        </div><br>
                                        <span class="panel-body">
                                            <p> {{$comment->comment}} </p>
                                        </span>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    
                                </div>
                            </div>
                            @endforeach
                            
                            @endif
                            <!-- End Show user Comment Area -->

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