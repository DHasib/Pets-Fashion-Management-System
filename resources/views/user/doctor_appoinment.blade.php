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

                    @if(auth::user()->role == 0 )
                    <div class="panel-body">
                        <!-- Recent Order Details -->
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
                                    </tr>

                                    @endforeach
                                </tbody>
                                @else
                                <div class="alert alert-danger">Recently You Did't Get Any Doctor Appoinment.... </div>
                                @endif

                            </table>
                        </div><br>
                        <hr><br>
                        <!-- Past Order Details -->


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
                        <!-- Recent Order Details -->
                        <div class="well well-sm" style="background-color:#f8b81d;">
                            <h5> Doctor Appoinment List</h5>
                        </div>
                        <div class="card-body table-responsive p-0" style="height:800px;" id="result">

                            @if(isset($appoinments_details) && ($appoinments_details->count() > 0) )

                            <table class="table table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>Patient Owner Name</th>
                                        <th>My Pet Category</th>
                                        <th>Pet Problems </th>
                                        <th>Pet Problem Noticed Date</th>
                                        <th>Pet Age</th>
                                        <th>Doctor visite date</th>
                                        <th>Mark as Visited </th>

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
                                                    href="{{url('user/visited/doctor',$docappoinment->id )}}"
                                                    style="color:White;">Visited</a></button></td>
                                    </tr>

                                    @endforeach
                                </tbody>
                                @else
                                <div class="alert alert-danger">Recently You Did't Get Any Doctor Appoinment.... </div>
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