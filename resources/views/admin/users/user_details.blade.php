
@extends("layouts.admin_master")

@section("title","Edit Top Header | Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")

<div class="container">
                    

<!-- Start Slider Show Form -->
        <div class="container">
               <!-- /.row -->
        <div class="row" id="result">
                <div class="col-12">
                  <div class="card card-warning">
                    <div class="card-header ">
                      <h2 class="card-title text-uppercase">Users Management Table</h2>

                      <div class="card-tools">
                          <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{url('admin/users/table')}}" style="color:White;">Refresh</a></div>
                            <div class="input-group input-group-sm" style="width: 150px;">
                               <form class="form-inline" action="{{url('admin/search/user')}}" method="POST">
                                {{ csrf_field() }}
                                      <div class="input-group-append">
                                          <input type="text" name="search_user"  value="{{ old('search_user') }}" class="form-control" size="8" placeholder="Search" >
                                        <button type="submit" class="form-control btn btn-default"><i class="fas fa-search"></i></button>
                                      </div>
                              </form>
                            </div>
                      </div>

                    </div>
                    <br>

                      @if (Session('message'))
                        <div class="alert alert-success">
                            <strong>{{ Session('message') }}</strong>
                        </div>
                        @elseif (Session('error'))
                            <div class="alert alert-danger">
                                <strong>{{ Session('error') }}</strong>
                            </div>
                            @elseif ($errors->has('search_user'))
                              <div class="alert alert-danger">
                                <strong>  {{ $errors->first('search_user') }}</strong>
                              </div>
                    
                      @endif

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height:400px;" id="result">
                      <table class="table table-head-fixed">
                        <thead>
                          <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Phone Number</th>
                            <th>User Location</th>
                            <th>User Image</th>
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
                                    @php if(!empty($user->user_img))
                                      { @endphp
                                                <img src="{{ url('images/Slider_img',$user->user_img) }}" class="img-rounded" style="width:80px; height:50px;">
                                      @php } else{ @endphp
                                                <h5>Image Not Set Yet ..</h5>
                                        @php  }@endphp
                                      </td>
                                      <td>
                                  <!-- Dk Functinaly     -->
                                  @if($user->role != 1 )
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
                                                        </div>
                                                        <input type="hidden" name="id" value="{{$user->id}}">
                                                    <button type="submit" class="btn btn-danger btn-sm"> Block </button>
                                                    
                                                @else 
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                  <button type="submit" class="btn btn-success btn-sm"> Un-blocked </button>
                                                  <label for="message show">{{$user->name}} Blocked</label>
                                                
                                                  @endif
                                        </form>
                                    @else 
                                          <label class="help-block text-primary">You Are The Boss</label>
                                  @endif

                                      </td> 
                                  </tr>
                          @empty
                              <div class="alert alert-danger">No Result Found!! Search Value Does not Match <strong> {{ request()->query('search') }} </strong></div>
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