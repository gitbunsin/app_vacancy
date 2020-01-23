<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Model\userExperience;
use App\Model\jobTitle;
use App\Model\Country;
use App\Model\City;
use Illuminate\Support\Facades\Auth;
class UserExperienceController extends Controller
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
        $experience = new userExperience();
        $experience->user_id = Auth::user()->id;
        $experience->company_name  = $request->company_name;
        $experience->job_title_id = $request->job_title_id;
        $experience->from_month = $request->from;
        $experience->from_month_to  = $request->to;
        $experience->city_id = $request->city;
        $experience->country_id = $request->country;
        $experience->year = $request->year;
        $experience->year_to = $request->year_to;
        $experience->description = $request->description;
        $experience->save();
        $experience['title'] = jobTitle::where('id',$experience->job_title_id)->first();
      
        return response::json($experience);
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
        $experience = userExperience::find($id);
        $experience['title'] = jobTitle::all();
        $experience['all_country'] = Country::all();
        $experience['all_city'] = City::all();
        return response::json($experience);
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
        $experience = userExperience::find($id);
        $experience->user_id = Auth::user()->id;
        $experience->company_name  = $request->company_name;
        $experience->job_title_id = $request->job_title_id;
        $experience->from_month = $request->from;
        $experience->from_month_to  = $request->to;
        $experience->city_id = $request->city;
        $experience->country_id = $request->country;
        $experience->year = $request->year;
        $experience->year_to = $request->year_to;
        $experience->description = $request->description;
        $experience->save();
        $experience['title'] = jobTitle::where('id',$experience->job_title_id)->first();
      
        return response::json($experience);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = userExperience::find($id);
        $experience->delete();
        return response::json($experience);
    }
}
