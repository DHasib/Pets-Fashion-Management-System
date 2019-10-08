
@extends("layouts.admin_master")

@section("title","Pets List | Pet Fashion Administration" )


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
                      <h2 class="card-title text-uppercase">Pets List</h2>

                      <div class="card-tools">
                        
                          <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{url('admin/pet')}}" style="color:White;">Refresh</a></div>
                            <div class="input-group input-group-sm  {{ $errors->has('search') ? 'has-error' : '' }}" style="width: 150px;">
                               <form class="form-inline" action="{{url('admin/pet/search')}}" method="POST">
                                {{ csrf_field() }}
                                      <div class="input-group-append">
                                          <input type="text" name="search" value="{{ old('search') }}" class="form-control" size="8" placeholder="Search" >
                                        <button type="submit" class="form-control btn btn-default"><i class="fas fa-search"></i></button>
                                      </div>
                                      
                                      @if ($errors->has('search'))
                                      <span class="help-block">
                                        <strong>  {{ $errors->first('search') }}</strong>
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
                            <th>List No</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Stock (Quentity)</th>
                            <th>Discount</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th colspan="2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                   
                    @if(isset($pets))
                          <?php  $i=1; ?>
                          @forelse ($pets as $pet)
                               <tr>
                                      <td>{{ $i++ }}</td>
                                      <td>{{ $pet->category->name }}</td>
                                      <td>{{ $pet->title }}</td>
                                      <td>{{ $pet->price }}</td>
                                      <td>{{ $pet->stock }}</td>
                                 @if($pet->discount == null)
                                      <td><h5>No discount Set Yet...</h5></td>
                                 @else
                                        <td><strong class="badge badge-warning">{{$pet->discount }}%Off</strong></td>
                                    @endif
                                      <td>{{ str_limit($pet->description,50) }}<a href="{{url('about/pet/'.$pet->slug)}}" target="_blank"><b>More</b></a></td>
                                      <td><img src="{{ url($pet->image) }}" class="img-rounded" style="width:80px; height:50px;"></td>

                                      <td> <button class="btn btn-warning btn-sm" ><a href="{{url('admin/pet/'.$pet->id .'/edit')}}" style="color:White;">Edit</a></button></td> 
                                      <td> <button method="delete"  class="btn btn-danger btn-sm" ><a href="{{asset('admin/trash/'.$pet->id.'/pet')}}" style="color:White;">Trash</a></button></td> 

                                </tr>
                          @empty
                              <div class="alert alert-danger">No Result Found!! Empty Pets List </div>
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