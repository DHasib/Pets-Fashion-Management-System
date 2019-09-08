@extends('layouts.app')

@section("title","Log-in | Pet Fashion Management System" )

@section('content')


    <!-- Start Sing-in page layout Area -->
    <div class="panel panel-primary ourPro"><br>
        <div class="panel-heading text-uppercase  pnlheading">
            <h3>User Log-in </h3>
        </div><br>

            <main class="my-form col-offset-6">
            <div class="cotainer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>{{ __('Login') }} </h4>
                            </div>
                            <div class="panel-body">
                                    @if (session('message'))  
                                    <div class="alert alert-danger">
                                            <strong> {{ session('message') }}</strong>
                                    </div>   
                                   
                                     @endif 
                                <form action="{{ route('login') }}" method="POST">

                                    {{ csrf_field() }}

                                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 text-right">{{ __('E-Mail Address') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} " >

                                                        <!-- For Error Messages Show  -->
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                    @enderror

                                        </div>
                                    </div>
                                    <div class="form-group row  {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 text-right">{{ __('Password') }}</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                                        <!-- For Error Messages Show  -->
                                                        @error('password')
                                                        <span class="invalid-feedback has-error" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                                <div class="form-check col-md-offset-4">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                        </div>

                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">
                                                {{ __('Login') }}
                                        </button>
                                    </div><br>
                                </form> <br><br>
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-warning btn-lg btn-block">
                                        <a href="{{ url('register') }}" class="text-danger">Don't Have an Account </a>
                                    </button>
                                </div>   
                                <div class="col-md-6 col-md-offset-6">
                                
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div> 
    <!-- End Sing-in page layout Area -->

@endsection
