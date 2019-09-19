
@extends("layouts.admin_master")

@section("title","Edit Pets Information | Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")
   
<!-- Start Post Blog Show Form -->
        <div class="container">

            <!-- Form Element sizes -->
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"> Edit And Update a Pet Information </h3>
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
                   @if(isset($pet))
                <div class="card-body">
                    <form action="{{url('admin/pet/'.$pet->id)}}" method="POST"  enctype="multipart/form-data">
                      {{ csrf_field() }}
                      {{method_field('Put')}}

                      <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                          <label for="wname">Blog Title:</label>
                          <input type="text" class="form-control" id="title" placeholder="Tet Title " name="title" value="@if (isset($pet)){{$pet->title }}@else{{ old('title') }} @endif">
  
                              @if ($errors->has('title'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('title') }}</strong>
                                  </span>
                              @endif
  
                      </div>

                         <div class="form-group  {{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label for="category">Select a Category</label>
                                <select name="category_id"  class="form-control">
                                        @foreach($categories as $category)
                                             <option value="{{ $category->id }}" 

                                                    @if($pet->category->id == $category->id)
                                                        selected
                                                    @endif>
                                                
                                                {{ $category->name }}</option>
                                        @endforeach
                                                
                                </select>

                                      @if ($errors->has('category_id'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('category_id') }}</strong>
                                          </span>
                                      @endif
  
                          </div>

                          
                         <div class="form-group  {{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender">Select Pet Gender</label>
                                <select name="gender"  class="form-control">
                                            <option value="selected"> {{$pet->gender}}</option>
                                             <option value="male"> male</option>
                                                <option value="female">female</option>
                                </select>

                                      @if ($errors->has('gender'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('gender') }}</strong>
                                          </span>
                                      @endif
  
                          </div>

                          <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                  <label for="img">select Image for Pet:</label>
                                  <input type="file" class="form-control"  name="image"  value="@if(isset($pet)){{$pet->image}}@else{{ old('image') }} @endif">
  
                                          @if ($errors->has('image'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('image') }}</strong>
                                              </span>
                                          @endif
                              </div>

                              <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="bcontent">Descrip Pet:</label>
                               <textarea name="description" id="description"  class="form-control"  cols="30" rows="10" value="{{ old('description') }}"> @if(isset($pet)){{$pet->description}}@endif</textarea> 
                               
      
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                            </div>

                            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                <label for="price">Pet Price:</label>
                                <input type="text" class="form-control" id="price" placeholder="Pet Price " name="price"
                                    value="@if(isset($pet)){{$pet->price}}@else{{ old('price') }} @endif">
            
                                @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
            
                            </div>
                            <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
                                <label for="stock">Pet Stock:</label>
                                <input type="text" class="form-control" id="stock" placeholder="Pet Stock " name="stock"
                                    value="@if(isset($pet)){{$pet->stock}}@else{{ old('stock') }} @endif"> 
            
                                @if ($errors->has('stock'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('stock') }}</strong>
                                </span>
                                @endif
            
                            </div>
                            <a class="btn btn-danger btn-sm tablinks" onclick="discountChange()"> Want to Remove
                                Discount click here<br></a>
                            <div class="form-group tabcontent {{ $errors->has('discount') ? 'has-error' : '' }}" >
                                <label for="discount">Pet Discount:</label>
                                <input type="text" class="form-control" id="discount" placeholder="Pet Discount " name="discount" value="@if(isset($pet)){{$pet->discount}}@else{{ old('discount') }} @endif">
            
                                @if ($errors->has('discount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('discount') }}</strong>
                                </span>
                                @endif
                            </div>
                             <div class="text-center">
                                <button type="submit" class="btn btn-info btn-lg">Update Pet Information</button>
                             </div>
                      
                  </form>   
                </div>
                @endif
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
                
        </div>
<!-- END Slider Show Form -->





</div>
@endsection