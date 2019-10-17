<!-- Profile Side Word card -->
<div class="col-md-3">
    <!-- Profile Image card -->
    <div class="panel panel-default">
        <div class="panel heading-primary">

        </div>
        <div class="panel-body">
            <div class="text-center">
                <img class="img-fluid img-circle" style="width:50%;"
                    src="@if ($user->profile->user_img != null) {{asset($user->profile->user_img)}} @else {{asset('images/avater.jpg')}} @endif"
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
                        <span class="tag tag-danger text-capitalize">{{$user->email}}</span>
                    </p>
                </li>
                <li class="list-group-item">
                        <b> <i class="fa fa-mars-stroke-v"></i> Gender</b>
                        <p class="text-muted">
                            <span class="tag tag-danger">{{$user->gender}}</span>
                        </p>
                    </li>
            </ul>

            <a href="@if ($user->profile->facebook != null) {{$user->profile->facebook}} @else # @endif" class="btn btn-primary btn-block" target="_blank"><b>Follow on
                    Facebook
                </b></a><hr>
            <a href="@if ($user->profile->youtube != null) {{$user->profile->youtube}}@else # @endif" class="btn btn-danger btn-block" target="_blank"><b>Follow on
                    Youtube</b></a>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
   @if($user->role == 2)
   <!-- Doctor-->
   <div class="panel panel-default">
        <div class="well well-sm" style="background-color:#f8b81d;">
            <h4>About</h4>
        </div>
        <!-- /.card-header -->
        <div class="panel-body">

            <p class="text-muted text-justify">
                <span class="list-group-item"> <b>Graduate</b>: Doctorate, Master</span>
                <span class="list-group-item"> <b>Undergraduate</b>: Bachelor</span>
                <span class="list-group-item"> <b>Medical and Health Professions</b>:
                    <ul>
                        <li> Clinical Laboratory Science Professions </li>
                        <li> Communication Disorders Sciences </li>
                        <li> Health and Fitness </li>
                        <li> Medical Assisting </li>
                    </ul>
                </span>
                <br>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    @else

    <!-- About Me Box -->
    <div class="panel panel-default">
        <div class="well well-sm" style="background-color:#f8b81d;">
            <h4>About</h4>
        </div>
        <!-- /.card-header -->
        <div class="panel-body">

            <p class="text-muted text-justify">{{$user->profile->about}}</p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    @endif
</div>
<!-- Menu Top  -->