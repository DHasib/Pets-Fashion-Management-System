@extends("layouts.app")

@section("title","Blogs | Pet Fashion Management System" )

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
                    <div class="panel-body">
                        <!-- My Blogs -->
                        @if(isset($posts))
                        @forelse ($posts as $post)
                        <hr>
                        <div class="post">
                            <div class="user-block col-md-12 col-sm-12">
                                @if(Auth::user()->id == $post->user_id)
                                <span class="pull-right">
                                    <a href="{{url('user/blog/edit/'.$post->id)}}"
                                        class="btn btn-warning btn-xs">edit</a>
                                    <a class="btn btn-danger btn-xs" href="{{url('user/trash/'. $post->id)}}">Trash</a>
                                    @if ($post->status == 1)
                                        <a class="text-muted" title="Waiting for admin Approval to Post">Panding Post</a>
                                    @endif
                                </span>
                                @endif
                                <img class="img-circle img-bordered-sm"
                                    src="@if ($user->profile->user_img != null) {{asset($user->profile->user_img)}} @else {{url('images/avater.jpg')}} @endif"
                                    alt="user image" style="width:7%;">


                                <span><a href="#">{{$user->name}}</a> <span>

                                        <span class="text-muted">{{ $post->created_at->toFormattedDateString() }}</span>
                            </div>
                            <!-- Blog Image -->
                            <div class="col-md-10 text-center" style="padding:5%;">
                                <img class="mx-auto d-block" src="{{asset($post->blog_image)}}" alt="user image"
                                    style="width:55%;">
                            </div><br>
                            <!-- Blog Content -->
                            <div class="col-md-10 justify-center" Style="margin:20px;">
                                <p>
                                    {{ $post->blog_content }}
                                </p>
                            </div>
                        @empty
                        <span class="btn btn-info">
                            <h3>You Do not Post Any Blog Yet........... </h3>
                        </span>
                        @endforelse
                        @endif
                        <!-- End My Blogs-->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>







</div>
<!-- User Profile area -->
@endsection