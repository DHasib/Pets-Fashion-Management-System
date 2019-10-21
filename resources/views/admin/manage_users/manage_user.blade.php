@extends("layouts.admin_master")

@section("title","User Management | Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")

<div class="container">
                    

<!-- Start Slider Show Form -->
   <div class="container">
               <!-- /.row -->
        <div class="row">
                <div class="col-12">
                  <div class="card card-warning">
                    <div class="card-header ">
                      <h2 class="card-title text-uppercase">Users Management Table</h2>

                      <div class="card-tools">
                        
                          <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{url('admin/users/table')}}" style="color:White;">Refresh</a></div>
                            <div class="input-group input-group-sm  {{ $errors->has('search_user') ? 'has-error' : '' }}" style="width: 150px;">
                               <form class="form-inline" action="{{url('admin/users/table')}}" method="POST">
                                {{ csrf_field() }}
                                      <div class="input-group-append {{ $errors->has('search_user') ? 'has-error' : '' }}">
                                          <input type="text" name="search_user" value="{{ old('search_user') }}" class="form-control" size="8" placeholder="Search" >
                                          <button type="submit" class="form-control btn btn-default"><i class="fas fa-search"></i></button>
                                      </div>
                                      
                                      @if ($errors->has('search_user'))
                                      <span class="help-block">
                                        <strong>  {{ $errors->first('search_user') }}</strong>
                                      </span>
                                    @endif
                              </form>
                            </div>
                      </div>

                    </div>
                    <br>

                      @if (Session('success'))
                        <div class="alert alert-success">
                            <strong>{{ Session('success') }}</strong>
                        </div>
                        @elseif (Session('error'))
                            <div class="alert alert-danger">
                                <strong>{{ Session('error') }}</strong>
                            </div>
                      @endif

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height:600px;" id="result">
                      <table class="table table-head-fixed">
                        <thead>
                          <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Phone Number</th>
                            <th>User Location</th>
                            <th>User Image</th>
                            <th>Make a Doctor</th>
                            <th>Block Details</th>

                          </tr>
                        </thead>
                        <tbody>
                   
                    @if(isset($users))
                          <?php  $i=1; ?>
                          @forelse ($users as $user)
                                  <tr>
                                      <td>{{ $i++ }}</td>
                                      <td>{{ $user->name }}</td>
                                      <td>{{ $user->email }}</td>
                                      <td>{{ $user->PhoneNum }}</td>
                                      <td>{{ $user->location }}</td>
                                      <td> 
                                    @php if(!empty($user->profile->user_img))
                                      { @endphp
                                                <img src="{{ url($user->profile->user_img) }}" class="img-rounded" style="width:80px; height:50px;">
                                      @php } else{ @endphp
                                                <h5>Image Not Set Yet ..</h5>
                                        @php  }@endphp
                                      </td>
                                      
                                  <!-- Admin Define     -->
                                  <td>
                                  @if($user->role != 1 )
                                      <!--  Doctor Section  -->
                                            @if(isset($user) && ($user->role ==2))
                                                    <button class="btn btn-danger btn-sm" ><a href="{{url('admin/remove/doctor',$user->id)}}" style="color:White;">remove</a></button>
                                            @else
                                                    <button class="btn btn-primary btn-sm" ><a href="{{url('admin/make/doctor',$user->id)}}" style="color:White;">Doctor</a></button>
                                            @endif

                                    @else 
                                        <label class="help-block text-info">Admin</label>
                                      
                                  @endif
                                </td> 
                                <td>   
                                  @if($user->role != 1 )
                                          <section><!--  Block user section -->
                                                <form class="form-inline" action=" @if($user->blocked_date == null) {{url('admin/user/blocked')}} @else {{url('admin/user/unblocked')}}@endif" method="post">
                                                              {{ csrf_field() }}
                                                      
                                                        @if($user->blocked_date == null)
                                                                    <label for="message show"> 
                                                                        @if ($errors->has('block_days_user'.$user->id))
                                                                            <span class="help-block text-danger">
                                                                              <span class="small">  {{ $errors->first('block_days_user'.$user->id) }}</span>
                                                                            </span>
                                                                        @endif
                                                                    </label>
                                                            <div class="form-group {{ $errors->has('block_days_user'.$user->id) ? 'has-error' : '' }}">
                                                                <input type="date"  class="form-control" name="block_days_user{{$user->id}}"  size="1">
                                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                                <button type="submit" class="btn btn-danger btn-sm"> Block </button>
                                                            </div>
                                                                 
                                                        @else 
                                                              <input type="hidden" name="id" value="{{$user->id}}">
                                                              <button type="submit" class="btn btn-success btn-sm"> Un-blocked </button>
                                                              <label for="message show">{{$user->name}} Blocked</label>
                                                        
                                                        @endif
                                                  </form>
                                          </section>
                                    @else 
                                          <label class="help-block text-info">Admin</label>
                                     
                                  @endif
                                </td> 
                                     
                                  </tr>
                          @empty
                              <div class="alert alert-danger">No Result Found!! Search Value Does not Match <strong> {{ request('search_user') }} </strong></div>
                          @endforelse
                      
                          
                     @endif
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
        </div>
        <!-- /.row -->
                
    </div>
<!-- END Slider Show Form -->





</div>
@endsection