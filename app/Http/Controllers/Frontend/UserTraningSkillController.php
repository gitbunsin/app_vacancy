<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\userTraningSkill;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Model\Country;
use App\Model\City;

class UserTraningSkillController extends Controller
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
        $skill = new userTraningSkill();
        $skill->user_id = Auth::user()->id;
        $skill->school  = $request->school;
        $skill->study = $request->study;
        $skill->degree = $request->degree;
        $skill->country_id  = $request->country;
        $skill->city_id = $request->city;
        $skill->year = $request->year;
        $skill->year_to = $request->year_to;
        $skill->description = $request->description;
        $skill->save();
        return response::json($skill);
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
        $skill =  userTraningSkill::find($id);
        $skill['all_country'] = Country::all();
        $skill['all_city'] = City::all();
        return response::json($skill);
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
        $skill = userTraningSkill::find($id);
        $skill->user_id = Auth::user()->id;
        $skill->school  = $request->school;
        $skill->study = $request->study;
        $skill->degree = $request->degree;
        $skill->country_id  = $request->country;
        $skill->city_id = $request->city;
        $skill->year = $request->year;
        $skill->year_to = $request->year_to;
        $skill->description = $request->description;
        $skill->save();
        return response::json($skill);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill =  userTraningSkill::find($id);
        $skill->delete();
        return response::json($skill);
    }
}
