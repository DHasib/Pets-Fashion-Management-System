@extends("layouts.app")

@section("title","Blog Read || Pet Fashion Management System" )

@section("content")

<!-- Start OUR products and pet OFFER  -->
     @include('includes.hot_offers')
<!--  End OUR products and pet OFFER-->


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
                                                      <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                  <div class="case-item-wrap">
                                                                      @php
                                                                          $ctgry = $category->blogPosts()->where('status',0)->paginate(6);
                                                                      @endphp
                                                                        @forelse($ctgry as $post)
                                                                       
                                                                    
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
                                                                                    </div><br><br>
                                                                                   <span> <a href="{{ url('post',$post->slug ) }}"><h6 class="case-item__title">{{ $post->blog_title }}</h6></a></span>
                                                                                   <br>
                                                                                   <span><p>{{str_limit($post->blog_content,105)}} <a href="{{url ('post',['slug' => $post->slug ]) }}"><b>Read
                                                                                             More</b></a></p></span>
                                          
                                                                                            <!--  Start Blog Comment and Like  Show Here-->
                                                                                            <hr>
                                                                                            <span>
                                                                                                    <span> 
                                                                                                        @if(isset($LikeBlog) && Auth::user() &&  ($LikeBlog->where('blog_id', $post->id)->where('user_id' , Auth::user()->id)->count() > 0))
                                                                                                            <a href="{{ url('user/blog/unlike', $post->id ) }}" class="btn btn-danger btn-xs">Unlike </a> <span class=" text-muted">{{ $LikeBlog->count() }} Likes</span>
                                                                                                        @else
                                                                                                            <a href="{{ url('user/blog/like', $post->id ) }}" class="btn btn-success btn-xs">Like</a> <span class=" text-muted">{{ $LikeBlog->where('blog_id', $post->id)->count() }} Likes</span>
                                                                                                        @endif
                                                                                                    </span>   

                                                                                                    @if(isset($BlogComment))
                                                                                                    <span class="pull-right text-muted">
                                                                                                          <a href="{{url ('post',['slug' => $post->slug ]) }}">  {{ $BlogComment->where('blog_id', $post->id)->count() }} Comments</a>
                                                                                                    </span>
                                                                                                    @endif
                                                                                                </span>
                                                                                        <!--  End Blog Comment and Like  Show Here-->

                                                                                    </div>
                                                                              </div>
                                                                          @empty
                                                                          <h5>This Category Blogs Are not Available.......or Panding</h5>
                                                                        @endforelse
                                                                  </div>

                                                                  <div class="row pbm20 align-center">
                
                                                                        <div class="col-lg-12">{{ $ctgry->links()  }}</div>
                                                
                                                            </div>
                                                      </div>
                        
                                                </main>
                                    </div>
                                    @endif
                              </div>
                        
                    
                </div>
        


@endsection