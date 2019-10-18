@extends("layouts.app")

@section("title","Doctor Appoinment Details | Pet Fashion Management System" )

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
                        <h5>Doctor Appoinment Details</h5>
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
                      <!-- Doctor chamber details -->
                    <div class="panel-body">
                      <h3 class="text-center"> Doctor Chember Details</h3><br>
                      <div class="col-md-6">
                            <span class="list-group-item"> <b>Location:</b>  Mirpur 32A lal goli gobba tower</span>
                            <span class="list-group-item"> <b>laboratory:</b> All kinf of Digital Facality Available</span>
                            <br>
                      </div>
                      <div class="col-md-6  pull-right">
                        <span class="list-group-item"> <b>Fees:</b> 300 taka</span>
                        <br>
                    
                            @if(isset($doctor) && $doctor->count() > 0)
                                @foreach ($doctor as $dprofile)
                                    <button class="btn btn-small btn-info"><a href="{{url('selected/user/profile',$dprofile->id )}}">Doctor Profile</a></button>
                                @endforeach
                            @endif
                  
                    </div>
                    </div>
                    <hr>

                    @if(Auth::User &&  auth::user()->role == 0 )
                    <div class="panel-body">
                        <!-- Recent Get Doctgor Appoinment Details -->
                        <div class="well well-sm" style="background-color:#f8b81d;">
                            <h5>Recent Doctor Appoinment </h5>
                        </div>
                        <div class="card-body table-responsive p-0" style="height:300px;" id="result">

                            @if(isset($recent_appoinments) && ($recent_appoinments->count() > 0) )

                            <table class="table table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>My Pet Category</th>
                                        <th>Pet Problems </th>
                                        <th>Pet Problem Noticed Date</th>
                                        <th>Pet Age</th>
                                        <th>Doctor visite date</th>
                                        <th>Cancel Appoinment</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($recent_appoinments as $appoinment)
                                    <tr>
                                        <td>{{$appoinment->category->name }}</td>
                                        <td>{{$appoinment->pet_problem }}</td>
                                        <td>{{$appoinment->problem_notice_date}} </td>
                                        <td>{{$appoinment->pet_age }}</td>
                                        <td> {{$appoinment->doctor_visit_date }} </td>
                                        <td> <button class="btn btn-danger btn-sm"><a
                                            href="{{url('user/appoinment/cancel',$appoinment->id )}}"
                                            style="color:White;">Cancel</a></button></td>
                                    </tr>

                                    @endforeach
                                </tbody>
                                @else
                                <div class="alert alert-danger">Recently You Did't Get Any Doctor Appoinment.... </div>
                                @endif

                            </table>
                        </div><br>
                        <hr><br>
                        <!-- Past Doctor appoinment  Details -->


                        <div class="well well-sm" style="background-color:deepskyblue;">
                            <h5>Previous Doctor Appoinment </h5>
                        </div>
                        <div class="card-body table-responsive p-0" style="height:500px;" id="result">
                            @if(isset($previous_appoinments) && $previous_appoinments->count() > 0)
                            <table class="table table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>My Pet Category</th>
                                        <th>Pet Problems </th>
                                        <th>Pet Problem Noticed Date</th>
                                        <th>Pet Age</th>
                                        <th>Doctor visite date</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($previous_appoinments as $prevappoinment)
                                    <tr>
                                        <td>{{$prevappoinment->category->name }}</td>
                                        <td>{{$prevappoinment->pet_problem }}</td>
                                        <td>{{$prevappoinment->problem_notice_date}} </td>
                                        <td>{{$prevappoinment->pet_age }}</td>
                                        <td>{{$prevappoinment->doctor_visit_date }} </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                                @else
                                <div class="alert alert-danger"> You Did't Get Any Doctor Appoinment Yet.... </div>
                                @endif


                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div> <!-- panel body -->
                    @else
                    <div class="panel-body">
                        <!-- Doctor Paitent List -->
                        <div class="well well-sm" style="background-color:#f8b81d;">
                            <h5> Patient Appoinment List</h5>
                        </div>
                        <div class="card-body table-responsive p-0" style="height:800px;" id="result">

                            @if(isset($appoinments_details) && ($appoinments_details->count() > 0) )

                            <table class="table table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Pet Category</th>
                                        <th>Pet Problems </th>
                                        <th>Pet Problem Noticed Date</th>
                                        <th>Pet Age</th>
                                        <th>Doctor visite date</th>
                                        <th>Mark as Visited </th>
                                        <th>Cancel Appoinment</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($appoinments_details as $docappoinment)
                                    <tr>
                                        <td>{{$docappoinment->user->name }}</td>
                                        <td>{{$docappoinment->category->name }}</td>
                                        <td>{{$docappoinment->pet_problem }}</td>
                                        <td>{{$docappoinment->problem_notice_date}} </td>
                                        <td>{{$docappoinment->pet_age }}</td>
                                        <td>{{$docappoinment->doctor_visit_date }} </td>
                                        <td> <button class="btn btn-success btn-sm"><a
                                                    href="{{url('doctor/visited',$docappoinment->id )}}"
                                                    style="color:White;">Visited</a></button></td>
                                        <td> <button class="btn btn-danger btn-sm"><a
                                            href="{{url('doctor/appoinment/cancel',$docappoinment->id )}}"
                                            style="color:White;">Cancel</a></button></td>
                                    </tr>

                                    @endforeach
                                </tbody>
                                @else
                                <div class="alert alert-danger">Recently Patient Did't Get Any Doctor Appoinment.... </div>
                                @endif

                            </table>
                        </div><br>
                        <hr><br>
                        <!-- Past Order Details -->

                    </div> <!-- panel body -->

                    @endif

                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>


</div>
<!-- User Profile area -->
@endsection