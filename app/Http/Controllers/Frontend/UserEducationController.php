<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\userEducation;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Model\Country;
use App\Model\City;
use App\User;
class UserEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    function aboutMeEdit($id)
    {
        $user = User::find($id);
        return response::json($user);
    }
    function aboutMeUpdate(Request $request , $id)
    {
        $user = User::find($id);
        $user->about_me = $request->about_me;
        $user->save();
        return response::json($user); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $education = new userEducation();
        $education->user_id = Auth::user()->id;
        $education->school  = $request->school;
        $education->study = $request->study;
        $education->degree = $request->degree;
        $education->country_id  = $request->country;
        $education->city_id = $request->city;
        $education->year = $request->year;
        $education->year_to = $request->year_to;
        $education->save();
        return response::json($education);
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
        $education =  userEducation::find($id);
        $education['all_country'] = Country::all();
        $education['all_city'] = City::all();
        return response::json($education);
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
        $education =  userEducation::find($id);
        $education->user_id = Auth::user()->id;
        $education->school  = $request->school;
        $education->study = $request->study;
        $education->degree = $request->degree;
        $education->country_id  = $request->country;
        $education->city_id = $request->city;
        $education->year = $request->year;
        $education->year_to = $request->year_to;
        $education->save();
        return response::json($education);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education =  userEducation::find($id);
        $education->delete();
        return response::json($education);
    }
}
