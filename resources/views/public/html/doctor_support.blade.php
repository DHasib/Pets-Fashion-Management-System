@extends("layouts.app")

@section("title","Doctor Support | Pet Fashion Management System" )

@section("content")

 
<!-- Start OUR products and pet OFFER  -->
        @include('includes.hot_offers')
<!--  End OUR products and pet OFFER-->
    
    
    <!-- Start Doctor Support Area  -->
    <div class="panel panel-primary ourPro">
            <div class="panel-heading text-uppercase  pnlheading">
                <h3>Doctor Support Center </h3>
            </div><br>
        <div class="container">
            <!-- Content Row -->
            <div class="row">
                        <!-- Sidebar Column -->
                        <div class="col-lg-3 mb-4">
                            <div class="list-group ">
                                <br>
                                <div class="panel-heading text-center pnlheading">
                                    <h5>Categories</h5>
                                </div>
                                <a class="list-group-item tablinks" onclick="doctorSupport(event, 'DoctorDetails')"> <i
                                        class="fa fa-chevron-right"></i>About Our Doctor</a>
                                <a class="list-group-item tablinks" onclick="doctorSupport(event, 'DoctorAppoinment')"> <i
                                        class="fa fa-chevron-right"></i> Make an Doctor Appoinment </a>
                                <br>
                            </div>
                        </div>
                <!-- =====================  Content Column  ================ -->
                <div class="col-lg-9 md-8">
                    <!-- For About Doctor Section  One -->
                    <section class="col-md-12 tabcontent " id="DoctorDetails">
                        <br>
                            <div class="panel-heading pnlheading">
                                <h4>About Doctor</h4>
                            </div>
                            <div class="calculate scroll" style="padding:20px;"><br>
                                <div class="col-md-7">

                                    <span class="list-group-item"> <b>Doctor Name</b>: Kuddus Ali</span>
                                    <img style="width: 100%; height: 100%;" src="{{url('images/blog/blog_hed-1.jpg')}}" alt="">
                                </div>
                                <div class="col-md-5">
                                    <span class="list-group-item"> <b>Doctor Qualification</b></span>
                                    <span class="list-group-item"> <b>Graduate</b>: Doctorate, Master</span>
                                    <span class="list-group-item"> <b>Undergraduate</b>: Bachelor</span>
                                    <span class="list-group-item"> <b>Medical and Health Professions</b>:
                                        <ul>
                                            <li> Clinical Laboratory Science Professions </li>
                                            <li> Communication Disorders Sciences </li>
                                            <li> Health and Fitness </li>
                                            <li> Medical Assisting </li>
                                        </ul>
                                    </span>
                                    <br>
                                </div>
                                <div class="col-md-8">
                                    <h3>Doctor Details</h3>
                                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ducimus a at ad quo
                                        totam quis eaque repudiandae, aliquam ipsa tempore odit doloremque provident quae
                                        voluptatem necessitatibus ipsum omnis. Tenetur adipisci, voluptatum amet sed, dolor
                                        temporibus quaerat error animi neque excepturi ut eaque at repudiandae aspernatur
                                        architecto ullam. Aliquam quis laboriosam sequi repellat mollitia aut blanditiis
                                        aliquid optio, adipisci eligendi odit dicta qui, similique animi corporis doloribus
                                        natus, magni quibusdam tempora nisi? Sint minus, reprehenderit voluptatibus animi
                                        cum suscipit porro quidem facilis dignissimos vel ratione minima quaerat. Vel
                                        blanditiis consectetur est provident cum eaque ducimus deserunt consequuntur.
                                        Quibusdam, ullam, aperiam vitae iste magni itaque explicabo, dolorum blanditiis eos
                                        repellendus dignissimos officiis? Ducimus quasi voluptates qui ipsa possimus, quae
                                        nam repellendus quibusdam accusamus aliquam eligendi veritatis nihil aliquid quos
                                        beatae recusandae earum fugit doloribus quo. Earum voluptates, amet laborum esse,
                                        quia, similique possimus mollitia eum quis aliquid numquam! Voluptas quae vitae
                                        expedita doloremque, molestias similique animi eaque voluptate iste ipsa ipsum modi
                                        facere aliquam. Inventore commodi qui nulla possimus dolores temporibus voluptatibus
                                        quo dignissimos cumque culpa dicta sint nesciunt dolorum ullam eaque vitae alias
                                        fugit itaque aut, odit hic? Ipsam repellat, voluptas ipsa laudantium ut dicta
                                        aperiam sint amet error sunt. </p>
                                </div>

                                <div class="col-md-4">
                                    <span class="list-group-item"> <b>Doctor Chember</b></span>
                                    <span class="list-group-item"> <b> Sat-Thu at 10:00am to 5:00pm OPEN </b><br> <br>
                                        <ul>
                                            <li><b> Location:</b> Mirpur 32A lal goli gobba tower </li>
                                            <li><b> Fees:</b> 300 taka </li>
                                            <li><b> laboratory:</b> All kinf of Digital Facality </li>
                                        </ul>
                                    </span>
                                </div>
                                <!-- for diveded section1 -->
                            </div>
                    </section>

                    <!-- For Doctor Apoinment Section  Two -->
                    <section class="col-md-12  tabcontent hdn" id="DoctorAppoinment">
                        <br>
                        @if (Auth::user())    
                            <div class="panel-heading pnlheading">
                                <h4>Make an Doctor Appoinment </h4>
                            </div>
                        <div class="calculate scroll"><br><br>
                            <form action="#" method="#">
                                <div class="col-md-8 col-sm-4  col-md-offset-2">
                                    <!-- for diveded section1 -->
                                    <label for="sel2">Select Your Pet </label>
                                    <select class="form-control" id="sel2">
                                        <option class="disable">--Select--</option>
                                        <option>Dog</option>
                                        <option>Cat</option>
                                        <option>Birds</option>
                                        <option>Rabbit</option>
                                    </select><br>
                                    <div class="form-group">
                                        <label for="comment">Pet Owner Name :</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Descrip Pet Problem :</label>
                                        <textarea class="form-control" rows="5" id="comment"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Select Pet problem Notice Date :</label>
                                        <input class="form-control" type="date">
                                    </div>
                                    <label for="sel2">Select Pet Age </label>
                                    <select class="form-control" id="sel2">
                                        <option class="disable">--Select--</option>
                                        <option>1 to 6 Month</option>
                                        <option>6 to 12 Month</option>
                                        <option>1 to 2 Years</option>
                                        <option>3 to 5 Years</option>
                                    </select><br>
                                    <div class="form-group">
                                        <label for="comment">Select Doctor Visite Date :</label>
                                        <input class="form-control" type="date">
                                    </div>
                                    <label for="sel2">Select Your Location </label>
                                    <select class="form-control" id="sel2">
                                        <option class="disable">--Select--</option>
                                        <option>Lalbagh</option>
                                        <option>Dhanmondi</option>
                                        <option>Mirpur</option>
                                        <option>Savar</option>
                                    </select><br>

                                    <button class="btn btn-warning btn-lg btn-middle">Submit </button><br><br><br><br>

                                </div>
                                <!-- for diveded section1 -->
                            </form>
                        </div>   @else
                        <div class="text text-danger"> <h2>You Mush Have an Account/Login To Get the Doctor Appoinment. </h2><br>
                        <a href="{{route('login')}}" class="btn btn-warning "> Click Here to Login </a> <a href="{{route('register')}}" class="btn btn-info "> Click Here to Register </a>
                        </div>
                        @endif
                    </section>

               
                    <!-- For OnlineDoctor Section   Three -->
                    <section class="col-md-12  tabcontent hdn" id="OnlineDoctor">
                        <br>
                   
                            

                  
                   
                    <div class="clearfix"></div>
                </div>



            </div><!-- For Row -->
        </div><!-- For container -->
    </div>
    <!-- End Doctor Support Area -->

@endsection