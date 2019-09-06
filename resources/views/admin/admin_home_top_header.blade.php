
@extends("layouts.admin_master")

@section("title","Edit Slider| Pet Fashion Administration" )


 <!-- Bootstrap CSS -->

@section("content")

<div class="container">
                    

<!-- Start Slider Show Form -->
        <div class="container">

            <!-- Form Element sizes -->
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"> <h2> Set Social and Conatct Link </h2></h3>

                 
                 
                  <h2>
                      @if (Session::has('message'))
                      <span class="alert-info">
                          <strong>{{ Session::get('message') }}</strong>
                      </span>
                      @endif
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/topHeader/update')}}" method="POST" >
                      {{ csrf_field() }}
                  @foreach ($link as $data)
                        <div class="form-group {{ $errors->has('shop_contact_number') ? 'has-error' : '' }}">
                            <label for="scn">Shop Contact Number:</label>
                            <input type="text" class="form-control"  placeholder="Shop Contact Number" name="shop_contact_number" value="@if(isset($data)){{$data->shop_contact_number}}@else{{ old('shop_contact_number') }}@endif">
        
                                    @if ($errors->has('shop_contact_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('shop_contact_number') }}</strong>
                                        </span>
                                    @endif
                        </div>

                        <div class="form-group {{ $errors->has('shop_email') ? 'has-error' : '' }}">
                                <label for="email">Shop Contact Email:</label>
                                <input type="email" class="form-control"  placeholder="Shop Contact Email" name="shop_email" value="{{$data->shop_email}}">
            
                                        @if ($errors->has('shop_email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('shop_email') }}</strong>
                                            </span>
                                        @endif
                            </div>
                            <div class="form-group {{ $errors->has('shop_open_details') ? 'has-error' : '' }}">
                                    <label for="sod">Shop Open Details :</label>
                                    <input type="text" class="form-control"  placeholder="Shop Open Details" name="shop_open_details" value="{{$data->shop_open_details}}">
                
                                            @if ($errors->has('shop_open_details'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('shop_open_details') }}</strong>
                                                </span>
                                            @endif
            
                                </div>
                                <div class="form-group {{ $errors->has('shop_fb_link') ? 'has-error' : '' }}">
                                        <label for="fb">Facebook Link  (URL):</label>
                                        <input type="text" class="form-control"  placeholder="Facebook Link" name="shop_fb_link" value="{{$data->shop_fb_link}}">
                    
                                                @if ($errors->has('shop_fb_link'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('shop_fb_link') }}</strong>
                                                    </span>
                                                @endif
                
                                    </div>
                                    <div class="form-group {{ $errors->has('shop_tw_link') ? 'has-error' : '' }}">
                                            <label for="twt">Twitter Link  (URL):</label>
                                            <input type="text" class="form-control"  placeholder="Twitter Link" name="shop_tw_link" value="{{$data->shop_tw_link}}">
                        
                                                    @if ($errors->has('shop_tw_link'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('shop_tw_link') }}</strong>
                                                        </span>
                                                    @endif
                    
                                        </div>
                                        <div class="form-group {{ $errors->has('shop_glg_link') ? 'has-error' : '' }}">
                                                <label for="g+">G+ Link  (URL):</label>
                                                <input type="text" class="form-control"  placeholder="G+ Link" name="shop_glg_link" value="{{$data->shop_glg_link}}">
                            
                                                        @if ($errors->has('shop_glg_link'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('shop_glg_link') }}</strong>
                                                            </span>
                                                        @endif
                        
                                            </div>
                                            <div class="form-group {{ $errors->has('shop_pint_link') ? 'has-error' : '' }}">
                                                    <label for="instg">Instragram Linkr  (URL):</label>
                                                    <input type="text" class="form-control"  placeholder="Printerest Linkr" name="shop_pint_link" value="{{$data->shop_pint_link}}">
                                
                                                            @if ($errors->has('shop_pint_link'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('shop_pint_link') }}</strong>
                                                                </span>
                                                            @endif
                            
                                                </div>
                                                <div class="form-group {{ $errors->has('shop_instrsg_link') ? 'has-error' : '' }}">
                                                        <label for="ptl">Printerest Link  (URL):</label>
                                                        <input type="text" class="form-control"  placeholder="Instragram Link" name="shop_instrsg_link" value="{{$data->shop_instrsg_link}}">
                                    
                                                                @if ($errors->has('shop_instrsg_link'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('shop_instrsg_link') }}</strong>
                                                                    </span>
                                                                @endif
                                
                                                    </div>
                                                    <div class="form-group {{ $errors->has('shop_lnkd_link') ? 'has-error' : '' }}">
                                                            <label for="scn">Linked Link  (URL):</label>
                                                            <input type="text" class="form-control"  placeholder="Linked Link" name="shop_lnkd_link" value="{{$data->shop_lnkd_link}}">
                                        
                                                                    @if ($errors->has('shop_lnkd_link'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('shop_lnkd_link') }}</strong>
                                                                        </span>
                                                                    @endif
                                    
                                                        </div>
                 @endforeach
  
                              @if(isset($data))
                              <input type="hidden" name="id" value="{{$data->id}}">
                             @endif
                      <button type="submit" class="btn btn-info">Save Edit</button>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
                
        </div>
<!-- END Slider Show Form -->





</div>
@endsection