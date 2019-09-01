@extends("layouts.master")

@section("title","Sing-up | Pet Fashion Management System" )

@section("sing_up")

    <!-- Start Sing-up page layout Area -->
    <div class="panel panel-primary ourPro"><br>
        <div class="panel-heading text-uppercase  pnlheading">
            <h3>Get Register Here </h3>
        </div><br>


        <main class="my-form col-offset-6">
            <div class="cotainer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Pets Fashion Registration Form </h4>
                            </div>
                            <div class="panel-body">
                                <form action="#" method="#">
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 text-right">Name</label>
                                        <div class="col-md-6">
                                            <input type="text" id="name" class="form-control " name="name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email_address" class="col-md-4 text-right">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input type="text" id="email_address" class="form-control"
                                                name="email-address">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone_number" class="col-md-4 text-right">Phone Number</label>
                                        <div class="col-md-6">
                                            <input type="text" id="phone_number" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Location" class="col-md-4 text-right">Location</label>
                                        <div class="col-md-6">
                                            <input type="text" id="Location" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 text-right">Password</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control" name="password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="c_password" class="col-md-4 text-right">Confirm Password</label>
                                        <div class="col-md-6">
                                            <input type="password" id="c_password" class="form-control"
                                                name="c_password">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">
                                            Register
                                        </button>
                                    </div><br>

                                </form> <br><br>

                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-warning btn-lg btn-block">
                                        <a href="sing-in.html" class="text-danger">Already Have an Account </a>
                                    </button>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- End Sing-up page layout Area -->


@endsection