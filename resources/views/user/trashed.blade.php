@extends("layouts.app")

@section("title","My trash Blogs | Pet Fashion Management System" )

@section("content")

<!-- User Profile area -->
<div class="panel panel-default ourPro">
    @include('includes.profile_navbar')
    <!-- Main content -->
    <section class="container">
        <div class="row">
            @include('includes.profile_card')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="well">
                        <h5>Trashed Blogs
                                <div class="btn btn-primary pull-right"><a href="{{url('user/trashed')}}" style="color:White;">Refresh</a></div></h5>
                    </div><!-- /.card-header -->
                        <div class="panel-body">
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
                                                <td>{{ $trash->blog_content }}</td>
                                                <td><img src="{{ url($trash->blog_image) }}" class="img-rounded" style="width:80px; height:50px;"></td>
                                        
                                                <td> <button method="delete"  class="btn btn-success btn-sm" ><a href="{{asset('user/restore/'.$trash->id)}}" style="color:White;">Restoe</a></button></td> 
                                                <td> <button method="delete"  class="btn btn-danger btn-sm" ><a href="{{asset('user/killed/'.$trash->id)}}" style="color:White;">Delete</a></button></td> 

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
            </div><!-- /.container-fluid -->
        </div>
    </section>







</div>
<!-- User Profile area -->
@endsection