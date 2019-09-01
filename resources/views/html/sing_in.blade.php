@extends("layouts.master")

@section("title","Sing-in | Pet Fashion Management System" )

@section("sing_in")

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
                                <h4>User Log-in From </h4>
                            </div>
                            <div class="panel-body">
                                <form action="#" method="#">
                                    <div class="form-group row">
                                        <label for="email_address" class="col-md-4 text-right">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input type="text" id="email_address" class="form-control"
                                                name="email-address">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 text-right">Password</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">
                                            Sing-in
                                        </button>
                                    </div><br>
                                </form> <br><br>
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-warning btn-lg btn-block">
                                        <a href="sing-in.html" class="text-danger">Don't Have an Account </a>
                                    </button>
                                </div>   
                                <div class="col-md-6 col-md-offset-6">
                                    <br>    <a href="#" class="text-primary"> <b><i>Forgot Password?</i></b> </a>  <br>
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