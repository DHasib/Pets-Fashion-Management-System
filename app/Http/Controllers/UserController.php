<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\control_users;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //to fetch table data and show form code....
        $udata = control_users::orderBy("id","desc")->get();
        return view("html.admin_pannel", compact("user_data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view("html/form.registrationform");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_data =  Validator::make($request->all(),[
            "name"              =>"required|max:8|alpha",
            "email"             =>"required|email|unique:users",
            "Cnumber"           =>"required",
            "location"          =>"required",
            "password"          =>"required"
        ],[
            "name.required"          =>"Name Must be Fill",
            "name.alpha"             =>"Name Must be alphabatic",
            "name.max"               =>"Name Must be under  8 charecter",
            "email.required"         =>"Email Must be Fill",
            "email.email"            =>"Email Must be a valid e-mail address",
            "Cnumber.required"       =>"Contact Number Must be Fill",
            "location.required"      =>"Location Must be Fill",
            "password.required"      =>"password  Must be Fill",
        ])->validate();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
