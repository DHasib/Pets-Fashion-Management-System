<!-- Profile Side Word card -->
<div class="col-md-3">
    <!-- Profile Image card -->
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="text-center">
                <img class="img-fluid img-circle" style="width:50%;"
                    src="@if ($user->profile->user_img != null) {{asset($user->profile->user_img)}} @else {{url('images/avater.jpg')}} @endif"
                    alt="User profile picture">
            </div><br>

            <h3 class="text-center text-uppercase">{{$user->name}}</h3><hr>

            <ul class="list-group">
                <li class="list-group-item">
                    <b><i class="fa fa-map-marker"></i> Location</b>
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

            <a href="{{$user->profile->facebook}}" class="btn btn-primary btn-block" target="_blank"><b>Follow on
                    Facebook
                </b></a><hr>
            <a href="{{$user->profile->youtube}}" class="btn btn-danger btn-block" target="_blank"><b>Follow on
                    Youtube</b></a>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- About Me Box -->
    <div class="panel panel-default">
        <div class="well well-sm" style="background-color:#f8b81d;">
            <h4>About Me</h4>
        </div>
        <!-- /.card-header -->
        <div class="panel-body">

            <p class="text-muted text-justify">{{$user->profile->about}}</p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- Menu Top  -->