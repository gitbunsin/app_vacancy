<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\skill;
use App\Model\payGrade;
use App\Model\EmploymentStatus;
use App\Model\JobCategory;
use App\Model\educations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = skill::all();
        $education = educations::all();
        $status = EmploymentStatus::all();
        $category = JobCategory::all();
        return view('backend/pages/admin/vacancy/skill',compact('skill','education','status','category'));
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
        $skill = new skill();
        $skill->name = $request->name;
        $skill->description = $request->description;
        $skill->admin_id = auth()->guard('admin')->user()->id;
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
        $skill = skill::find($id);
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
        $skill = skill::find($id);
        $skill->name = $request->name;
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
        $skill = skill::find($id);
        $skill->delete();
        return response::json($skill);
    }
}
