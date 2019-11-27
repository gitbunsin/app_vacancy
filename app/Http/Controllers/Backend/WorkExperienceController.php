<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\employeeWorkExperience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Model\jobTitle;

class WorkExperienceController extends Controller
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
        $w = new employeeWorkExperience();
        $w->company_name = $request->company_name;
        $w->job_title_id = $request->job_title_id;
        $w->employee_id =  $request->employee_id;
        $w->from = $request->from_date;
        $w->to = $request->to_date;
        $w->comments = $request->comments;
        $w->save();
        $w['jobTtitle'] = jobTitle::where('id',$w->job_title_id)->first();
        return response::json($w);
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
        $w = employeeWorkExperience::find($id);
        $w['all_job_title'] = jobTitle::all();
        return response::json($w);
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
        $w = employeeWorkExperience::find($id);
        $w->company_name = $request->company_name;
        $w->job_title_id = $request->job_title_id;
        $w->employee_id =  $request->employee_id;
        $w->from = $request->from_date;
        $w->to = $request->to_date;
        $w->comments = $request->comments;
        $w->save();
        $w['jobTtitle'] = jobTitle::where('id',$w->job_title_id)->first();
        return response::json($w);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $w = employeeWorkExperience::find($id);
        $w->delete();
        return response::json($w);
    }
}
