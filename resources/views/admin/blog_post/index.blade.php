
@extends("layouts.admin_master")

@section("title","All Blogs | Pet Fashion Administration" )


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
                      <h2 class="card-title text-uppercase">Blogs List</h2>

                      <div class="card-tools">
                        
                          <div class="btn btn-primary float-right" style="margin-left:20px; margin-right:20px;"><a href="{{url('admin/blogPost')}}" style="color:White;">Refresh</a></div>
                            <div class="input-group input-group-sm  {{ $errors->has('search_user') ? 'has-error' : '' }}" style="width: 150px;">
                               <form class="form-inline" action="{{url('admin/search/blog')}}" method="POST">
                                {{ csrf_field() }}
                                      <div class="input-group-append">
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
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                   
                    @if(isset($posts))
                          <?php  $i=1; ?>
                          @forelse ($posts as $post)
                               <tr>
                                      <td>{{ $i++ }}</td>
                                      <td>{{ $post->category->name }}</td>
                                      <td>{{ $post->user->name }}</td>
                                      <td>{{ $post->blog_title }}</td>
                                      <td>{{ $post->blog_content }}</td>
                                      <td><img src="{{ url($post->blog_image) }}" class="img-rounded" style="width:80px; height:50px;"></td>
                             
                                       @if($post->status == 0)
                                            <td><button class="btn btn-info btn-sm" >Active</button> </td>
                                       @else
                                           <td><button class="btn btn-success btn-sm" >Panding</button> </td>
                                      @endif
                                  <!-- Edit Define     -->
                                 
                                  @if($post->user_id == Auth::id())
                                            <td> <button class="btn btn-warning btn-sm" ><a href="{{url('admin/blogPost/'.$post->id .'/edit')}}" style="color:White;">Edit</a></button></td> 
                                          
                                            <td> <button method="delete"  class="btn btn-danger btn-sm" ><a href="{{asset('admin/trash/'.$post->id)}}" style="color:White;">Trash</a></button></td> 
                                           
                                  @endif
                                
                               
                                     
                                  </tr>
                          @empty
                              <div class="alert alert-danger">No Result Found!! Empty Blog List </div>
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