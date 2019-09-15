<!-- Profile Navbar (Page header) -->
<section class="navbar navbar-default bg-warning" style="background-color:#f6b60b; padding-left:20px;">
    <div class="container-fluid">
        <div class="navbar-header test-uppercase">
            <h3> Profile </h3>
        </div>
        <ul class="nav navbar-nav" style="padding-left:10%;">
            <li class="nav-item"><a class="nav-link active" href="{{url('user/profile/show')}}">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('user/profile/setting')}}">settings</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{url('user/trashed')}}">Trashed Blog
                </a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('user/show/blog')}}" >Post a Blog
                </a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('user/show/blog')}}" >Order Details
                </a></li>
        </ul>
    </div><!-- /.container-fluid -->
</section>