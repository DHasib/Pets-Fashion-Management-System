
@extends("layouts.admin_master")

@section("title","Pet Category | Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")

<div class="container">
   
        <div class="col-12">
                <div class="card card-warning">
                  <div class="card-header ">
                    <h2 class="card-title text-uppercase">Categories List</h2>

                    <div class="card-tools">
                        <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{url('admin/pet/category')}}" style="color:White;">Refresh</a></div>
                    </div>

                  </div>
                  <br>


                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="height:250px;" id="result">
                    <table class="table table-head-fixed">
                      <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Categories Name</th>
                            <th >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                 
                   
                    @if(isset($categories))
                        <?php $i=1; ?>
                        @forelse ($categories as $cate)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $cate->name }}</td>
                                    <td><a href="{{url('admin/edit/pet/category/'.$cate->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                                    <td><a href="{{url('admin/delete/pet/category/'.$cate->id ) }}" class="btn btn-danger btn-sm">Delete</a></td>
                                <td> 
                        @empty
                            <div class="alert alert-danger">No Result Found!! Pet Category are not Add Yet!! <strong></strong></div>
                        @endforelse
                   @endif
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>

            <!-- Form Element sizes -->
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"> Add Pet Categories </h3>
                  <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href=" {{url('admin/pet/category')}}" style="color:White;">Refresh</a></div>
                </div>
                @if (Session::has('success'))
                      <div class="alert alert-success">
                          <strong>{{ Session::get('success') }}</strong>
                      </div>
                  @elseif (Session::has('error'))
                      <div class="alert alert-danger">
                          <strong>{{ Session::get('error') }}</strong>
                      </div>
                   @endif
                <div class="card-body">

                    <form action=" @if(isset($category)) {{asset ('admin/update/pet/category/'.$category->id) }} @else {{asset ('admin/create/pet/category')}}  @endif"  method="post">
                      {{ csrf_field() }}
                    
                      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                          <label for="name">Enter Category Name:</label>
                          <input type="text" class="form-control" placeholder="Category Name" id="name" name="name" value="@if(!isset($category)){{old('name')}}@else{{$category->name }}@endif">
  
                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                      </div>
                      <button type="submit" class="btn btn-info"> @if(isset($category)) Update Category @else Add Category @endif</button>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
                
        </div>
<!-- END Slider Show Form -->





</div>
@endsection