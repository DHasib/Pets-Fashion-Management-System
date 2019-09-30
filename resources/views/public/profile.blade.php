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
                            <div class="col-md-10 justify-center" Style="margin:20px;">
                                <p>
                                    {{ $upost->blog_content }}
                                </p>

                                <br>
                                <hr><br>
                            </div>

                            @endif
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