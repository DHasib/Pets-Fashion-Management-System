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
                            <li class="list-group-item">
                                    <b> <i class="fa fa-mars-stroke-v"></i> Gender</b>
                                    <p class="text-muted">
                                        <span class="tag tag-danger">{{$user->gender}}</span>
                                    </p>
                                </li>
                        </ul>

                        <a href="{{$user->profile->facebook}}" class="btn btn-primary btn-block"
                            target="_blank"><b>Follow on Facebook
                            </b></a>
                        <a href="{{$user->profile->youtube}}" class="btn btn-danger btn-block" target="_blank"><b>Follow
                                on
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
                    <div class="card-body">
                            <div class="card-header p-2">
                                    <h3>Profile Setting</h3>
                                </div><!-- /.card-header -->
                            <!-- Setting -->
                            <div class="tab-pane">
                                <div class="container-fluid">
                                    <div class="col-md-12">
                                        <!-- ------------------------------------------- Change Details-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->
                                        @if (Session::has('message'))
                                        <div class="alert alert-success">
                                            <strong>{{ Session::get('message') }}</strong>
                                        </div>
                                        @elseif (Session::has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ Session::get('error') }}</strong>
                                        </div>
                                        @endif
                                        @if(isset($user) && $user->count() > 0)

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- col-md-6 -->
                                                <br>
                                                <div class="col-md-10">
                                                    <form action="{{url('admin/profile/update') }}" method="post">
                                                        @csrf
                                                        <div
                                                            class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                                            <label for="name" class="col-md-4 text-right">Name:</label>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name"
                                                                    class="form-control  @error('name') is-invalid @enderror"
                                                                    name="name" value="{{ $user->name }}">


                                                                @if ($errors->has('name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                                @endif

                                                            </div>
                                                        </div>

                                                        <div
                                                            class="form-group row {{ $errors->has('location') ? ' has-error' : '' }}">
                                                            <label for="location"
                                                                class="col-md-4 text-right">Location:</label>
                                                            <div class="col-md-8">
                                                                <input type="text" id="location"
                                                                    class="form-control  @error('location') is-invalid @enderror"
                                                                    name="location" value="{{$user->location}}">

                                                                <!-- For Error Messages Show  -->
                                                                @if ($errors->has('location'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('location') }}</strong>
                                                                </span>
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <div class="form-group row {{ $errors->has('gender') ? ' has-error' : '' }}">
                                                                <label for="gender" class="col-md-4 text-right">Gender</label>
                                                            <div class="col-md-8">
                                                                <select name="gender" class="form-control">
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                </select>
                                            
                                                                @if ($errors->has('gender'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                                </span>
                                                                @endif
                                            
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button type="submit" class="btn btn-warning btn-md btn-block">
                                                            Update Profile
                                                        </button><br>

                                                    </form>
                        
                                                </div>
                                <!-- ------------------------------------------- Save  Profile Detrails-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->

                                                <br>
                                                <hr><br>
                                                <div class="col-md-10">
                                                    <form action="{{  url('admin/profile/save') }}" method="POST">
                                                        @csrf
                                                        <div
                                                            class="form-group row {{ $errors->has('user_fb_link') ? 'has-error' : '' }}">

                                                            <label for="fb" class="col-md-4 text-right">Facebook
                                                                (URL):</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Facebook Link" name="user_fb_link"
                                                                    value="@if($user->profile->facebook != null){{$user->profile->facebook}}@else{{ old('user_fb_link') }}@endif">

                                                                @if ($errors->has('user_fb_link'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('user_fb_link') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="form-group row {{ $errors->has('user_yt_link') ? 'has-error' : '' }}">
                                                            <label for="yt" class="col-md-4 text-right">Youtube
                                                                (URL):</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Youtube Link" name="user_yt_link"
                                                                    value="@if($user->profile->youtube != null){{$user->profile->youtube}}@else{{ old('user_yt_link') }}@endif">

                                                                @if ($errors->has('user_yt_link'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('user_yt_link') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="form-group {{ $errors->has('your_self') ? 'has-error' : '' }} ">
                                                            <label for="comment"> About your Self:</label>
                                                            <textarea name="your_self" cols="5" rows="3"
                                                                class="form-control" placeholder="Write About Your Self"
                                                                value="@if( $user->profile->about != null){{$user->profile->about}}@else{{ old('your_self') }}@endif"></textarea>
                                                            @if ($errors->has('your_self'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('your_self') }}</strong>
                                                            </span>
                                                            @endif

                                                        </div>
                                                        <button type="submit" class="btn btn-warning btn-md btn-block">
                                                            Save Profile Details
                                                        </button><br>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--col-md-6-->
                                            <br>
                                            <hr>

                                            <!-- ------------------------------------------- Upload Profile Picture-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->

                                            <div
                                                class="col-md-6  {{ $errors->has('slider_image') ? ' has-error' : '' }}">
                                                <br>
                                                <div
                                                    class="col-md-10 {{ $errors->has('profile_pic') ? ' has-error' : '' }}">
                                                    <form action="{{ url('admin/profile/image/upload') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <img src="@if($user->profile->user_img != null ){{url($user->profile->user_img)}}@else # @endif"
                                                            class="img-thumbnail mx-auto d-block"
                                                            style="width:300px; height:170px;">
                                                        <div class="col-md-8 ">
                                                            <label for="profile_pic">Upload Image:</label>
                                                            <input type="file" class="form-control" name="profile_pic"
                                                                value="@if($user->profile->user_img != null ){{$user->profile->user_img}}@else{{ old('profile_pic') }}@endif">

                                                            @if ($errors->has('profile_pic'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('profile_pic') }}</strong>
                                                            </span>
                                                            @endif
                                                            <br>
                                                        </div>
                                                        <button type="submit" class="btn btn-warning btn-md btn-block">
                                                            Upload Image
                                                        </button><br>
                                                    </form>
                                                    <hr><br><br>

                                                </div>
                                                <!-- ------------------------------------------- Change Password-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->
                                                <div class="col-md-10">
                                                    <form action="{{url('admin/account/password/change')}}"
                                                        method="POST">
                                                        @csrf
                                                        <div
                                                            class="form-group row {{ $errors->has('old_pass') ? ' has-error' : '' }}">
                                                            <label for="old-password" class="col-md-4 text-right">Old
                                                                Password</label>
                                                            <div class="col-md-8">
                                                                <input type="password" id="old_pass"
                                                                    class="form-control" name="old_pass"
                                                                    value="{{ old('old_pass') }}">
                                                                <!-- For Error Messages Show  -->
                                                                @if ($errors->has('old_pass'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('old_pass') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="form-group row {{ $errors->has('new_pass') ? ' has-error' : '' }}">
                                                            <label for="new_pass" class="col-md-4 text-right">New
                                                                Password</label>
                                                            <div class="col-md-8">
                                                                <input type="password" id="new_pass"
                                                                    class="form-control" name="new_pass"
                                                                    value="{{ old('new_pass') }}">
                                                                <!-- For Error Messages Show  -->
                                                                @if ($errors->has('new_pass'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('new_pass') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div><br>
                                                        <button type="submit" class="btn btn-warning btn-md btn-block">
                                                            Change Password
                                                        </button><br>
                                                    </form>

                                                    <br><br>


                          <!-- ------------------------------------------- Change User Email-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->

                                                       <form action="{{url('admin/change/email') }}" method="post">
                                                        @csrf
                                                    <div
                                                    class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email_address"
                                                        class="col-md-4 text-right text-xs">E-Mail:</label>
                                                    <div class="col-md-8">
                                                        <input type="email" id="email_address"
                                                            class="form-control" name="email"
                                                            value="{{$user->email}}">

                                                        @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                        <br>
                                                        @endif<br>
                                                        <button type="submit" class="btn btn-warning btn-xs btn-block">
                                                                Change Email
                                                            </button>
                                                    </div>
                                                </div>
                                               
                                            </form>
                          <!-- ------------------------------------------- Change User Phone Number-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->
                                                   <hr>
                                            <form action="{{url('admin/change/phonenumber') }}" method="post">
                                                @csrf
                                                <div
                                                    class="form-group row {{ $errors->has('PhoneNum') ? ' has-error' : '' }}">
                                                    <label for="PhoneNum" class="col-md-4 text-right">Phone
                                                        Number:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" id="PhoneNum"
                                                            class="form-control @error('PhoneNum') is-invalid @enderror"
                                                            name="PhoneNum" value="{{$user->PhoneNum}}">

                                                        <!-- For Error Messages Show  -->
                                                        @if ($errors->has('PhoneNum'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('PhoneNum') }}</strong>
                                                        </span><br>
                                                        @endif<br>
                                                        <button type="submit" class="btn btn-warning btn-xs btn-block">
                                                                Change Contact Number
                                                            </button>
                                                    </div>
                                                </div>
                                                </form>
                                             </div><br><br><br><br><br>

                                            </div><!-- col-6 -->

                                        </div>

                                        @endif
                                        <!-- col-12 -->
                                    </div>

                                </div>
                                <!-- End Setting -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                  
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


@endif


@endsection