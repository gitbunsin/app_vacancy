<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\employeeSkill;
use App\Model\skill;
use Illuminate\Support\Facades\Response;

class EmployeeSkillController extends Controller
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
       $s = new employeeSkill();
       $s->employee_id = $request->employee_id;
       $s->skill_id = $request->skill_id;
       $s->year = $request->year;
       $s->comments = $request->comments;
       $s->save();
       $s['skill'] = skill::where('id',$s->skill_id)->first();
       return response::json($s);
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
        $s = employeeSkill::find($id);
        $s['all_skill'] = skill::all();
        return response::json($s);
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
       $s = employeeSkill::find($id);
       $s->employee_id = $request->employee_id;
       $s->skill_id = $request->skill_id;
       $s->year = $request->year;
       $s->comments = $request->comments;
       $s->save();
       $s['skill'] = skill::where('id',$s->skill_id)->first();
       return response::json($s);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = employeeSkill::find($id);
        $s->delete();
        return response::json($s);
    }
}
