<!-- Profile Navbar (Page header) -->
<section class="navbar navbar-default bg-warning" style="background-color:#f6b60b;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="col-md-2 p0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#min2_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand test-uppercase">
                    <h4> Profile </h4>
                </div>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="col-md-10 ">
            <div class="collapse navbar-collapse" id="min2_navbar">
                <ul class="nav navbar-nav navbar-right" style="font-weight: bold;">
                    <li class="nav-item"><a class="nav-link active" href="{{url('user/profile/show')}}" >Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('user/profile/setting')}}">settings</a>
                    </li>
                    <li class="dropdown submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="fa fa-chevron-circle-down"> Blog </i> </a>
                        <ul class="dropdown-menu other_dropdwn">
                            <li class="nav-item"><a class="nav-link" href="{{url('user/trashed')}}">Trashed Blog  </a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('user/show/blog')}}" >Post a Blog </a></li>
                        </ul>
                    </li>
                    
                        <li class="nav-item"><a class="nav-link" href="{{url('user/order/details')}}" >Order Details </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('user/read/books')}}" >Read Books</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div><!-- /.container-fluid -->
</section>