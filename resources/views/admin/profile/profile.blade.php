@extends("layouts.admin_master")

@section("title","Admin Profile | Pet Fashion Administration" )


<!-- Bootstrap CSS -->

@section("content")

<!-- Content Wrapper. Contains page content -->
@if(isset($user))


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Profile</h1>
                
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Profile Side Word card -->
            <div class="col-md-3">
                <!-- Profile Image card -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="@if ($user->profile->user_img != null) {{asset($user->profile->user_img)}} @else {{url('images/avater.jpg')}} @endif"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">

                                <b><i class="fas fa-map-marker-alt "></i> Location</b>
                                <p class="text-muted">{{$user->location}}</p>
                            </li>
                            <li class="list-group-item">
                                <b> <i class="fa fa-phone"></i> Contact Number</b>
                                <p class="text-muted">
                                    <span class="tag tag-danger">{{$user->PhoneNum}}</span>
                                </p>
                            </li>
                            <li class="list-group-item">
                                <b> <i class="fa fa-envelope "></i> Email</b>
                                <p class="text-muted">
                                    <span class="tag tag-danger">{{$user->email}}</span>
                                </p>
                            </li>
                        </ul>

                        <a href="{{$user->profile->facebook}}" class="btn btn-primary btn-block" target="_blank"><b>Follow on Facebook
                            </b></a>
                        <a href="{{$user->profile->youtube}}" class="btn btn-danger btn-block" target="_blank"><b>Follow on
                                Youtube</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <p class="text-muted text-justify">{{$user->profile->about}}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- Menu Top  -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">My
                                    Blogs</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                           <!-- My Blogs -->
                            <div class="active tab-pane" id="activity">
                                 <!-- Post -->
                                    @if(isset($posts))   
                                    @forelse ($posts as $post)
                                        <div class="post">
                                                <div class="user-block col-md-12">
                                                    <img class="img-circle img-bordered-sm" src="{{asset($user->profile->user_img)}}" alt="user image">
                                                
                                                    <span class="username">
                                                        <a href="#">{{$user->name}}</a>
                                                    
                                                    </span>
                                                    <span class="description">    {{ $post->created_at->toFormattedDateString() }}</span>
                                                </div>
                                                <!-- Blog Image -->
                                                <div class="col-md-10">
                                                        <img class="mx-auto d-block" src="{{asset($post->blog_image)}}" alt="user image" style="width:50%;">
                                                </div><br>
                                                <!-- Blog Content -->
                                                <div class="col-md-10 justify-center" Style="margin:10px;">
                                                <p>
                                                        {{ $post->blog_content }}
                                                </p>
                                                </div><br><hr>
                                        </div>
                                        @empty
                                             <span class="btn btn-info"><h3>You Do not Post Any Blog Yet........... </h3></span>
                                    @endforelse  
                                    @endif
                                 <!-- /.post -->
                            </div>
                            <!-- End My Blogs-->
                            
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</section>


@endif


@endsection