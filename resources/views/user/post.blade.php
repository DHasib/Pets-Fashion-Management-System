@extends("layouts.app")

@section("title","Post a Blog | Pet Fashion Management System" )

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
                        <h5>Post a Blog</h5>
                    </div><!-- /.card-header -->
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                @elseif (Session::has('error'))
                    <div class="alert alert-danger">
                        <strong>{{ Session::get('error') }}</strong>
                    </div>
                 @endif
                    <div class="panel-body">    <!-- My Blogs -->
                                  <form action="{{url('user/blogPost')}}" method="POST"  enctype="multipart/form-data">
                                    {{ csrf_field() }}
              
                                    <div class="form-group {{ $errors->has('blog_title') ? 'has-error' : '' }}">
                                        <label for="wname">Blog Title:</label>
                                        <input type="text" class="form-control" id="blog_title" placeholder="Blog Title " name="blog_title" value="{{ old('blog_title') }}">
                
                                            @if ($errors->has('blog_title'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('blog_title') }}</strong>
                                                </span>
                                            @endif
                
                                    </div>
              
                                       <div class="form-group  {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                          <label for="category">Select a Category</label>
                                              <select name="category_id"  class="form-control">
                                                     @foreach ($categories as $category)
                                                         
                                                           <option value="{{  $category->id }}">{{ $category->name }}</option>
              
                                                     @endforeach
                                                              
                                                    
                                              </select>
              
                                                    @if ($errors->has('category_id'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('category_id') }}</strong>
                                                        </span>
                                                    @endif
                
                                        </div>
                                        <div class="form-group {{ $errors->has('blog_image') ? ' has-error' : '' }}">
                                                <label for="img">select Image for Blog:</label>
                                                <input type="file" class="form-control"  name="blog_image"  value="{{ old('blog_image') }}">
                
                                                        @if ($errors->has('blog_image'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('blog_image') }}</strong>
                                                            </span>
                                                        @endif
                                            </div>
              
                                            <div class="form-group {{ $errors->has('blog_content') ? ' has-error' : '' }}">
                                              <label for="bcontent">Write Blog Content:</label>
                                             <textarea name="blog_content" id="blog_content"  class="form-control"  cols="1" rows="1" value="{{ old('blog_content') }}">{{ old('blog_content') }}</textarea> 
                                             
                    
                                                      @if ($errors->has('blog_content'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('blog_content') }}</strong>
                                                          </span>
                                                      @endif
                      
                                          </div>
                                           <div class="text-center">
                                              <button type="submit" class="btn btn-info btn-lg">Post Blog</button>
                                           </div>
                                    
                                </form>  
                      
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>







</div>
<!-- User Profile area -->
@endsection