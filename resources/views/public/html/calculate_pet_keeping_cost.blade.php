@extends("layouts.app")

@section("title","Calculate Pet Keeping Cost | Pet Fashion Management System" )

@section("content")

    <!-- OUR OFFER [ SLIDE-BAR ] -->
    <section class="our_partners_area offerpage1">
        <div class="panel panel-primary offerpagebdr">
            <div class="panel-heading text-uppercase text-center pnlheading ">
                <h3>HOT OFFERS</h3>
            </div>
            <div class="container">
                <div class="panel-body">
                    <div class="partners offerpage">
                        <div class="item">
                            <div class="row construction_iner offerpage2">
                                <div class="col-md-6 col-sm-4 construction">
                                    <div class="cns-img">
                                        <img src="images/cns-1.jpg" alt="">
                                    </div>
                                    <div class="cns-content">
                                        <i aria-hidden="true"><b>70%off</b></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row construction_iner offerpage2">
                                <div class="col-md-6 col-sm-4 construction">
                                    <div class="cns-img">
                                        <img src="images/cns-1.jpg" alt="">
                                    </div>
                                    <div class="cns-content">
                                        <i aria-hidden="true"><b>70%off</b></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row construction_iner offerpage2">
                                <div class="col-md-6 col-sm-4 construction">
                                    <div class="cns-img">
                                        <img src="images/cns-1.jpg" alt="">
                                    </div>
                                    <div class="cns-content">
                                        <i aria-hidden="true"><b>70%off</b></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row construction_iner offerpage2">
                                <div class="col-md-6 col-sm-4 construction">
                                    <div class="cns-img">
                                        <img src="images/cns-1.jpg" alt="">
                                    </div>
                                    <div class="cns-content">
                                        <i aria-hidden="true"><b>70%off</b></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End Our OFFER Area -->


    <!-- Pet Calcutation area  -->
    <div class="panel panel-primary ourPro">
        <div class="panel-heading text-uppercase  pnlheading">
            <h3>calculate yearly pets keeping cost </h3>
        </div><br>
        <div class="container">
            <!-- Content Row -->
            <div class="row">
                <!-- Sidebar Column -->
                <div class="col-lg-3 mb-4">
                    <div class="list-group">
                        <br>
                        <div class="panel-heading text-center pnlheading">
                            <h5>Categories</h5>
                        </div>
                        <a href="index.html" class="list-group-item"> <i class="fa fa-chevron-right"></i> DOG
                            Products</a>
                        <a href="about.html" class="list-group-item"> <i class="fa fa-chevron-right"></i> Birds
                            Products</a>
                        <a href="services.html" class="list-group-item"> <i class="fa fa-chevron-right"></i> Cat
                            Products</a>
                        <a href="contact.html" class="list-group-item"> <i class="fa fa-chevron-right"></i> Rabbit
                            Products</a>
                        <a href="portfolio-1-col.html" class="list-group-item"> <i class="fa fa-chevron-right"></i> Rat
                            Products</a>
                        <br>
                        <div class="panel-heading text-center pnlheading">
                            <h6></h6>
                        </div>
                    </div>
                </div>
                <!-- Content Column -->
                <div class="col-lg-9 md-8">
                        <br>
                        <div class="panel-heading pnlheading">
                            <h4>Select Your Pet </h4>
                        </div>
                    <section class="col-md-12 calculate"><br>
                            <form  action="" method="">
                                <div class="col-md-6 col-sm-3">
                                    <!-- for diveded section1 -->
                                    <label for="sel2">Select Your Pet Category</label>
                                    <select class="form-control" id="sel2">
                                        <option class="disable">--Select--</option>
                                        <option>Dog</option>
                                        <option>Cat</option>
                                        <option>Birds</option>
                                        <option>Rabbit</option>
                                    </select><br>
                                    <label for="sel2">Pet Medical</label>
                                    <div class="chkbox form-control form-checkbox">
                                        <span class="col-sm-2 float-right"><input type="checkbox" name="a"
                                                value=""></span>
                                        <strong class="col-sm-10 text-uppercase ">Option </strong>
                                        <strong class="col-sm-10 "> 250 taka</strong>
                                    </div>
                                    <div class="chkbox form-control">
                                        <span class="col-sm-2 float-right"><input type="checkbox" value=""></span>
                                        <strong class="col-sm-10 text-uppercase">Option </strong>
                                        <strong class="col-sm-10 "> 250 taka</strong>
                                    </div>
                                    <div class="chkbox form-control">
                                        <span class="col-sm-2 float-right"><input type="checkbox" value=""></span>
                                        <strong class="col-sm-10 text-uppercase">Option </strong>
                                        <strong class="col-sm-10 "> 250 taka</strong>
                                    </div>
                                    <label for="sel2">Pet Food</label>
                                    <div class="chkbox2 form-control">
                                        <span class="col-sm-2 float-right"><input type="radio" name="a" value=""></span>
                                        <strong class="col-sm-10 text-uppercase">Option </strong>
                                        <strong class="col-sm-10 "> 250 taka</strong>
                                        <hr>
                                        <span class="col-sm-2 float-right"><input type="radio" name="a" value=""></span>
                                        <strong class="col-sm-10 text-uppercase">Option </strong>
                                        <strong class="col-sm-10 "> 250 taka</strong>
                                    </div>
                                </div>
                                <!-- for diveded section1 -->
                                <div class="col-md-6 col-sm-3">
                                    <!--  for diveded section1  -->
                                    <label for="sel2">Equipment</label>
                                    <div class="chkbox form-group">
                                        <span class="col-sm-2 float-right"><input type="checkbox" value=""></span>
                                        <strong class="col-sm-10 text-uppercase">Toys </strong>
                                        <strong class="col-sm-10 "> 250 taka</strong>
                                    </div>
                                    <div class="chkbox form-group">
                                        <span class="col-sm-2 float-right"><input type="checkbox" value=""></span>
                                        <strong class="col-sm-10 text-uppercase">Fenced Backyard </strong>
                                        <strong class="col-sm-10 "> 250 taka</strong>
                                    </div>
                                    <div class="chkbox form-group">
                                        <span class="col-sm-2 float-right"><input type="checkbox" value=""></span>
                                        <strong class="col-sm-10 text-uppercase">Carte </strong>
                                        <strong class="col-sm-10 "> 250 taka</strong>
                                    </div>
                                    <div class="chkbox form-group">
                                        <span class="col-sm-2 float-right"><input type="checkbox" value=""></span>
                                        <strong class="col-sm-10 text-uppercase">Bowls, collar </strong>
                                        <strong class="col-sm-10 "> 250 taka</strong>
                                    </div>
                                    <div class="chkboxttl form-group">
                                        <label for="sel2">Total Yearly Cost</label>
                                        <strong class="col-sm-10 totalyc"> 250 taka</strong>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-lg col-md-6 col-md-offset-2">Submit </button>
                                <!--  for diveded section1 -->
                            </form> 
                     </section>
                </div>
            </div><!-- .Row --> 
        </div><!-- .Container -->
    </div>
    <!-- End Our Team Area -->
   


@endsection