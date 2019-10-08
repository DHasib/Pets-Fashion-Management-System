
@extends("layouts.admin_master")

@section("title","Trashed Blogs | Pet Fashion Administration" )


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
                      <h2 class="card-title text-uppercase">Trashed Blogs</h2>

                      <div class="card-tools">
                          <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{url('admin/trashed')}}" style="color:White;">Refresh</a></div>
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
                    <div class="card-body table-responsive p-0" style="height:2000px;" id="result">
                      <table class="table table-head-fixed">
                        <thead>
                          <tr>
                            <th>List No</th>
                            <th>Category</th>
                            <th>Writer Name</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                   
                    @if(isset($trashed))
                          <?php  $i=1; ?>
                          @forelse ($trashed as $trash)
                               <tr>
                                      <td>{{ $i++ }}</td>
                                      <td>{{ $trash->category->name }}</td>
                                      <td>{{ $trash->user->name }}</td>
                                      <td>{{ $trash->blog_title }}</td>
                                      <td>{{ str_limit($trash->blog_content,201) }}</td>
                                      <td><img src="{{ url($trash->blog_image) }}" class="img-rounded" style="width:80px; height:50px;"></td>
                               
                                      <td> <button method="delete"  class="btn btn-success btn-sm" ><a href="{{asset('admin/restore/'.$trash->id)}}" style="color:White;">Restoe</a></button></td> 
                                      <td> <button method="delete"  class="btn btn-danger btn-sm" ><a href="{{asset('admin/killed/'.$trash->id)}}" style="color:White;">Delete</a></button></td> 

                                  </tr>
                          @empty
                              <div class="alert alert-danger">No Result Found!! Empty Trash List </div>
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