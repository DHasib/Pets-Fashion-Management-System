@extends("layouts.app")

@section("title","Profile Settings | Pet Fashion Management System" )

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
                       <h5>Profile Setting <a href="{{url('user/profile/setting')}}"
                                style="color:White;" class="btn btn-primary btn-sm pull-right">Refresh</a></h5>
                    </div><!-- /.card-header -->
                    <div class="panel-body">
                        <!-- /.card-body -->
                        <div class="row">
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
                                            <form action="{{url('user/profile/update') }}" method="post">
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
                                                    class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email_address"
                                                        class="col-md-4 text-right text-xs">E-Mail:</label>
                                                    <div class="col-md-8">
                                                        <input type="email" id="email_address" class="form-control"
                                                            name="email" value="{{$user->email}}">

                                                        @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
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
                                                        </span>
                                                        @endif

                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('location') ? ' has-error' : '' }}">
                                                    <label for="location" class="col-md-4 text-right">Location:</label>
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
                                                <br>
                                                <button type="submit" class="btn btn-warning btn-md btn-block">
                                                    Update Profile
                                                </button><br><br><br>

                                            </form>
                                        </div>
                                        <!-- ------------------------------------------- Save  Profile Detrails-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->

                                        <br><br><br>
                                        
                                        <div class="col-md-10">
                                            <form action="{{ url('user/profile/save') }}" method="POST">
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
                                                    <textarea name="your_self" cols="5" rows="3" class="form-control"
                                                        placeholder="Write About Your Self"
                                                        value="{{ old('your_self') }}">@if( $user->profile->about != null){{$user->profile->about}}@endif</textarea>
                                                    @if ($errors->has('your_self'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('your_self') }}</strong>
                                                    </span>
                                                    @endif

                                                </div>
                                                <button type="submit" class="btn btn-warning btn-md btn-block">
                                                    Save Profile Details
                                                </button><br><br><br>
                                            </form>
                                        </div>
                                    </div>
                                    <!--col-md-6-->

                                    <br><br>

                                    <!-- ------------------------------------------- Upload Profile Picture-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->

                                    <div class="col-md-6  {{ $errors->has('slider_image') ? ' has-error' : '' }}">
                                        <br>
                                        <div class="col-md-10 {{ $errors->has('profile_pic') ? ' has-error' : '' }}">
                                            <form action="{{ url('user/profile/image/upload') }}" method="POST"
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
                                            <form action="{{url('user/account/password/change')}}" method="POST">
                                                @csrf
                                                <div
                                                    class="form-group row {{ $errors->has('old_pass') ? ' has-error' : '' }}">
                                                    <label for="old-password" class="col-md-4 text-right">Old
                                                        Password</label>
                                                    <div class="col-md-8">
                                                        <input type="password" id="old_pass" class="form-control"
                                                            name="old_pass" value="{{ old('old_pass') }}">
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
                                                        <input type="password" id="new_pass" class="form-control"
                                                            name="new_pass" value="{{ old('new_pass') }}">
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
                                        </div>

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

</div>
<!-- /.card -->



</div>
</div>
</div><!-- /.container-fluid -->
</div>
</section>







</div>
<!-- User Profile area -->
@endsection