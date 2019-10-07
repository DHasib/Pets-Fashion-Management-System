@extends("layouts.app")

@section("title","Profile | Pet Fashion Management System" )

@section("content")

<!-- User Profile area -->
<div class="panel panel-default ourPro">
    @include('includes.profile_navbar')
    <!-- Main content -->
    <section class="container">
        <div class="row">
            @include('includes.profile_card')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="well">
                        <h5>My Blogs</h5>
                    </div><!-- /.card-header -->
                    
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <strong>{{ Session::get('success') }}</strong>
                        </div>{{ Session::get('error') }}</strong>
                    @endif
                    <div class="panel-body">
                        <!-- My Blogs -->
                        @if(isset($uposts))
                        @forelse ($uposts as $upost)
                        @if ($upost->status == 0)
                        <div class="post">
                            <div class="user-block col-md-12 col-sm-12">
                                @if(Auth::user())
                                    @if(Auth::user()->id == $upost->user_id)
                                        <span class="pull-right">
                                                <a href="{{url('user/blog/edit/',$upost->id)}}"
                                                    class="btn btn-warning btn-xs">edit</a>
                                                <a class="btn btn-danger btn-xs" href="{{url('user/trash/', $upost->id)}}">Trash</a>
                                            @if ($upost->status == 1)
                                               <a class="text-muted" title="Waiting for admin Approval to Post">Panding Post</a>
                                            @endif
                                        </span>
                                    @endif
                         @endif
                                <img class="img-circle img-bordered-sm"
                                    src="@if ($user->profile->user_img != null) {{asset($user->profile->user_img)}} @else {{url('images/avater.jpg')}} @endif"
                                    alt="user image" style="width:7%;">


                                <span><a class="text-uppercase">{{$user->name}}</a> <span>

                                        <span
                                            class="text-muted">{{ $upost->created_at->toFormattedDateString() }}</span>
                            </div>
                            <!-- Blog Image -->
                            <div class="col-md-10 text-center" style="padding:5%;">
                                <img class="mx-auto d-block" src="{{asset($upost->blog_image)}}" alt="Blog image"
                                    style="width:55%;">
                            </div><br>
                            <!-- Blog Content -->
                            <div class="col-md-11 justify-center" Style="margin:20px;">
                                <p>
                                    {{ $upost->blog_content }}
                                </p>
                                <br>
                                 <!--  Start Blog Comment and Like  Show Here-->
                            <div class="col-md-12" Style="padding:20px; background-color:#f5f5f5;">
                                <!--show  Like -->
                                 <span> 
                                      @if(isset($LikeBlog) && auth::user() && ($LikeBlog->where('blog_id', $upost->id)->where('user_id' , Auth::user()->id)->count() > 0))
                                          <a href="{{ url('user/blog/unlike', $upost->id ) }}" class="btn btn-danger btn-xs">Unlike </a> <span class=" text-muted">{{ $LikeBlog->where('blog_id', $upost->id)->count() }} Likes</span>
                                      @else
                                          <a href="{{ url('user/blog/like', $upost->id ) }}" class="btn btn-success btn-xs">Like</a> <span class=" text-muted">{{ $LikeBlog->where('blog_id', $upost->id)->count() }} Likes</span>
                                      @endif
                                 </span>   
                              <!--show  Total Comment -->
                                 @if(isset($BlogComment))
                                 <span class="pull-right text-muted">
                                      {{ $BlogComment->where('blog_id', $upost->id)->count() }} Comments
                                 </span>
                                 @endif
                                 <hr>
                            <!--Write Comment   -->
                                 <form class="form-horizontal" action="{{ url ('user/blog/comment')}}" method="post">
                                         {{ csrf_field() }}
                                     <label for="comment"> Wirte Down Your Comments</label>
                                         <div class="col-md-12 {{ $errors->has('comment') ? 'has-error' : '' }}">
                                             <input type="text" name="comment"  class="form-control">
                                             @if ($errors->has('comment'))
                                             <span class="help-block">
                                                 <strong>{{ $errors->first('comment') }}</strong>
                                             </span>
                                             @endif

                                             <input type="text" name="user_id" value="{{$user->id}}" hidden>
                                             <input type="text" name="blog_id" value="{{$upost->id}}" hidden>

                                             <button type="submit" class="btn btn-danger">Send</button><br>
                                            </div>
                                 </form>
                            <!--show  Others Comment list -->
                            @if(isset($BlogComment) && ($BlogComment->where('blog_id', $upost->id)->count() > 0))
                            <label for="comment"> Other Comments</label>
                            <div class="col-md-12 pre-scrollable" style="margin:20px; padding:10px; height:200px; background-color:#dedede;">
                             <!-- Start Show user Comment  Area -->
                                         
                                         @foreach ($BlogComment->where('blog_id', $upost->id) as $comment)
                                         <div class="panel panel-default">
                                             <div class="panel-heading overflow-auto">
                                                 <div class="col-md-1 blog-details-author-thumb">
                                                     <img src="{{asset ($comment->user->profile->user_img) }}"
                                                         style="width:31px; height:31px; border-radius:100%;" alt="Author">
                                                 </div>

                                                 <div class="blog-details-author-content">
                                                     <div class=" col-md-11  author-info">
                                                         <h6 class="author-name"><a
                                                                 href="{{url('selected/user/profile',$comment->user->id )}}">{{ $comment->user->name }}</a>
                                                         </h6>
                                                         @if(auth::user() && $comment->user_id == Auth::user()->id)
                                                         <span class="pull-right btn btn-danger btn-xs"><a href="{{url('user/delete/comment',$comment->id)}}">Delete</a></span>
                                                         @endif
                                                         <span class="text-muted">{{$comment->created_at->diffForHumans() }}</span>
                                                     </div>
                                                     <span class="panel-body">
                                                          <p class="col-sm-10">{{$comment->comment}}</p>
                                                     </span>
                                                 </div>
                                             </div>
                                         </div>
                                         @endforeach
                                         
                                        
                         <!-- End Show user Comment Area -->
                            </div>
                            @endif
                            <br><hr><br>
                         </div>
                        <!--  End Blog Comment and Like  Show Here-->
                       
                            </div> 

                            @endif
                            
                            <!-- End My Blogs-->
                           
                        </div>
                        @empty
                        <span class="btn btn-info">
                            <h3>You Do not Post Any Blog Yet........... </h3>
                        </span>
                        @endforelse
                        @endif
                    </div>
                </div><!-- /.container-fluid -->
            </div>
    </section>







</div>
<!-- User Profile area -->
@endsection