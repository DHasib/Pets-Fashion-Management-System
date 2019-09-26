<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">

  <!--  For Defining Dynamic Title -->
  <title> @yield("title") </title>

  <!-- All Css  links Includes here -->
  @include('includes.them2_css_link')

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('home')}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('admin/profile/show')}}" class="nav-link">Profile</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('admin/profile/setting')}}" class="nav-link">setting</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault();  document.getElementById('logout-form').submit();" class="nav-link"> <i
              class="fa fa-sign-out"> Log-out</i> </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Start Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- Message Start -->
            <a href="#" class="dropdown-item">
              <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
            </a> <!-- Message End -->
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li> <!-- END Messages Dropdown Menu -->


        <!-- Start Notifications Dropdown Menu -->
        @if(isset($panding_order))
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">{{$panding_order}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"><strong style="color:red;">{{$panding_order}}</strong> New Order / Delivery Panding</span>
            <div class="dropdown-divider"></div>
            <a  class="dropdown-item">
              <span>Total Pets</span> 
              <span class="float-right text-muted text-sm"><strong style="color:red;"> @foreach ($total_panding_pet as $pet)
                {{$pet->total_pet_type}}
            @endforeach</strong></span>
            </a>
            <div class="dropdown-divider"></div>
            <a  class="dropdown-item">
              <span>Total Products</span> 
              <span class="float-right text-muted text-sm"><strong style="color:red;">@foreach ($total_panding_product as $product)
                  {{$product->total_product_type}}
              @endforeach
                
              </strong></span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{url('admin/order/panding')}}" class="dropdown-item dropdown-footer ">See All Panding Order / Delivery</a>
          </div>
        </li><!-- Start Notifications Dropdown Menu -->
        @endif
      </ul>
    </nav>
    <!--==================================== END Navbar ====================================================================================================================================================================================== -->

    <!-- Start Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{url('home')}}" class="brand-link">
        <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light text-uppercase">Pets Fashion</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (isset($authUser))
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img
              src="@if($authUser->profile->user_img != null ) {{asset($authUser->profile->user_img)}} @else {{url('dist/img/user2-160x160.jpg')}} @endif"
              class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="{{ url('admin/profile/show') }}" class="d-block text-uppercase">{{$authUser->name}} </a>
          </div>
        </div>

        @endif

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview ">
              <a href="{{  url('admin/dashboard/show') }}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/users/table')}}" class="nav-link">
                <i class="nav-icon fas fa-users "></i>
                <p>
                  User Management
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder  fa-fw"></i>
                <p>
                  Items
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-product-hunt nav-icon"></i>
                    <p>Products</p>
                    <i class="fas fa-angle-left right"></i>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{url('/admin/product/create')}}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Add Product</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('admin/product')}}" class="nav-link">
                        <i class="fa  fa-list  nav-icon"></i>
                        <p>Products List</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('admin/trashed/product')}}" class="nav-link">
                        <i class="fa fa-trash nav-icon"></i>
                        <p>Trashed Products</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fa fa-paw nav-icon"></i>
                    <p>Pets</p>
                    <i class="fas fa-angle-left right"></i>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{url('/admin/pet/create')}}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Add Pet</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('admin/pet')}}" class="nav-link">
                        <i class="fa  fa-list  nav-icon"></i>
                        <p>Pets List</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('admin/trashed/pet')}}" class="nav-link">
                        <i class="fa fa-trash nav-icon"></i>
                        <p>Trashed Pets</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog fa-fw"></i>
                <p>
                  Settings
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/topHeader/show')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit Header Link </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/admin/slider/show') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit Slider</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Order Details
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('admin/order/panding')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Order Panding  </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/order/list') }}" class="nav-link">
                    <i class="fa fa-list nav-icon"></i>
                    <p>Order List </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-rss-square "></i>
                <p>
                  Blog
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('admin/blogPost/create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Post Blog </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/blogPost')}}" class="nav-link">
                    <i class="fa fa-list nav-icon"></i>
                    <p>Blog List </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/trashed')}}" class="nav-link">
                    <i class="fa fa-trash nav-icon"></i>
                    <p>Trashed Blogs </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/show/panding') }}" class="nav-link">
                    <i class="fa fa-pause-circle  nav-icon"></i>
                    <p>Panding Blogs</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/category/show') }}" class="nav-link">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                  Pet Category
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                  Live Chat
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-smile-o"></i>
                <p>
                  Extra Feature
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>add Boosks </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-list nav-icon"></i>
                    <p>Pet Tips </p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- End Main Sidebar Container -->


    <!-- Start Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


      @if (Session::has('info'))
      <div class="alert alert-info">
        <strong>{{ Session::get('info') }}</strong>
      </div>
      @endif
      <!-- Extend All page content Here   16-->
      @section("content")
      @show



    </div> <!-- END Content Wrapper. Contains page content -->


    <!-- ==================== Start Main Footer ======================================================================================================================================================================== -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="{{url('home')}}}">PETS FASHION MANAGEMENT SYSTEM</a>.</strong>
      All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- ==================== End Main Footer ======================================================================================================================================================================== -->



  <!-- ==================== Start REQUIRED SCRIPTS ======================================================================================================================================================================== -->

  <!-- All Java Jquery links Includes here -->
  @include('includes.them2_jss_link')


  <script>
            function discountShow() {
              document.getElementById("discount").disabled = false;
            }
            
            function discountChange() {
              document.getElementById("discount").disabled = true;
            }


  </script>

</body>

</html>