
@extends("layouts.admin_master")

@section("title","Pet Category | Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")

<div class="container">
   
        <div class="col-12">
                <div class="card card-warning">
                  <div class="card-header ">
                    <h2 class="card-title text-uppercase">Users Management Table</h2>

                    <div class="card-tools">
                        <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{url('admin/petCategory')}}" style="color:White;">Refresh</a></div>
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
                  <div class="card-body table-responsive p-0" style="height:250px;" id="result">
                    <table class="table table-head-fixed">
                      <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Categories Name</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                 
                   
                    @if(isset($categories))
                        <?php $i=1; ?>
                        @forelse ($categories as $cate)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $cate->categories_name }}</td>
                                    <td><a href="{{url('admin/petCategory/'.$cate->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a></td>
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
                  <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href=" {{url('admin/petCategory')}}" style="color:White;">Refresh</a></div>
                </div>
                @if (Session::has('message'))
                      <div class="alert alert-success">
                          <strong>{{ Session::get('message') }}</strong>
                      </div>
                  @elseif (Session::has('error'))
                      <div class="alert alert-danger">
                          <strong>{{ Session::get('error') }}</strong>
                      </div>
                   @endif
                <div class="card-body">
                    <form action=" @if(isset($category)) {{url('/admin/petCategory/'.$category->id)}} @else {{url('/admin/petCategory') }}@endif"  method=" @if(isset($category)) PUT  @else POST @endif">
                      {{ csrf_field() }}
                    
                      <div class="form-group {{ $errors->has('categories_name') ? 'has-error' : '' }}">
                          <label for="cat-name">Enter Category Name:</label>
                          <input type="text" class="form-control" placeholder="Slider Title" name="categories_name" value="@if(isset($category)){{$category->categories_name}}@endif">
  
                              @if ($errors->has('categories_name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('categories_name') }}</strong>
                                  </span>
                              @endif
                      </div>
                              @if(isset($eslider))
                              <input type="hidden" name="id" value="{{$eslider->id}}">
                             @endif
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