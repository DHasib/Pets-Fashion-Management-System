@extends("layouts.admin_master")

@section("title","Panding  Blogs | Pet Fashion Administration" )


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
                      <h2 class="card-title text-uppercase">Panding Blogs List</h2>
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
                          </tr>
                        </thead>
                        <tbody>
                   
                 @if(isset($panding))
                          <?php  $i=1; ?>
                        @forelse ($panding as $post)
                                @if($post->status == 1)       
                                          <tr>
                                              <td>{{ $i++ }}</td>
                                              <td>{{ $post->category->name }}</td>
                                              <td>{{ $post->user->name }}</td>
                                              <td>{{ $post->blog_title }}</td>
                                              <td>{{ str_limit($post->blog_content,89) }}<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Read More</button></td>
                                              <td><img src="{{ url($post->blog_image) }}" class="img-rounded" style="width:80px; height:50px;"></td>
                                              <td><button class="btn btn-success btn-sm" ><a href="{{url('admin/active/'.$post->id)}}" style="color:White;">Panding</a></button> </td>
                                              
                                          </tr>
                                          <!-- Start Modal -->
                                          <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title ">Blog Content</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                 
                                                </div>
                                                <div class="modal-body">
                                                  <p>{{$post->blog_content }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      <!-- EndModal -->
                                  @endif
                          @empty
                             <div class="alert alert-info">No Panding Blogs Yet..... </div>
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