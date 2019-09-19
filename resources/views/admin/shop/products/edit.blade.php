
@extends("layouts.admin_master")

@section("title","Edit Products Information | Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")
   
<!-- Start Post Blog Show Form -->
        <div class="container">

            <!-- Form Element sizes -->
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"> Edit And Update a Products Information </h3>
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
                   @if(isset($product))
                <div class="card-body">
                    <form action="{{url('admin/product/'.$product->id)}}" method="POST"  enctype="multipart/form-data">
                      {{ csrf_field() }}
                      {{method_field('Put')}}

                      <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                          <label for="wname">Products Title:</label>
                          <input type="text" class="form-control" id="title" placeholder="Products Title " name="title" value="@if (isset($product)){{$product->title }}@else{{ old('title') }} @endif">
  
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

                                                    @if($product->category->id == $category->id)
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
                          <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                  <label for="img">select Image for Product:</label>
                                  <input type="file" class="form-control"  name="image"  value="@if(isset($product)){{$product->image}}@else{{ old('image') }} @endif">
  
                                          @if ($errors->has('image'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('image') }}</strong>
                                              </span>
                                          @endif
                              </div>

                              <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="bcontent">Descrip Product:</label>
                               <textarea name="description" id="description"  class="form-control"  cols="30" rows="10" value="{{ old('description') }}"> @if(isset($product)){{$product->description}}@endif</textarea> 
                               
      
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                            </div>

                            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                <label for="price">Product Price:</label>
                                <input type="text" class="form-control" id="price" placeholder="Pet Price " name="price"
                                    value="@if(isset($product)){{$product->price}}@else{{ old('price') }} @endif">
            
                                @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
            
                            </div>
                            <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
                                <label for="stock">Product Stock:</label>
                                <input type="text" class="form-control" id="stock" placeholder="Pet Stock " name="stock"
                                    value="@if(isset($product)){{$product->stock}}@else{{ old('stock') }} @endif"> 
            
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
                                <input type="text" class="form-control" id="discount" placeholder="Pet Discount " name="discount" value="@if(isset($product)){{$product->discount}}@else{{ old('discount') }} @endif">
            
                                @if ($errors->has('discount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('discount') }}</strong>
                                </span>
                                @endif
                            </div>
                             <div class="text-center">
                                <button type="submit" class="btn btn-info btn-lg">Update Product Information</button>
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