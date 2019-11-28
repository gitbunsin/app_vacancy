<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\EmployeeEducation;

class EmployeeEductionController extends Controller
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
        $e = new employeeEducation();
        $e->employee_id = $request->employee_id;
        $e->education_id = $request->institute_id;
        $e->major= $request->major;
        $e->score = $request->score;
        $e->year = $request->year;
        $e->start_date = $request->start_date;
        $e->end_date = $request->end_date;
        $e->save();
        return response()->json($e);

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
        $e =  employeeEducation::find($id);
        return response()->json($e);
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
        $e =  employeeEducation::find($id);
        $e->employee_id = $request->employee_id;
        $e->education_id = $request->level_id;
        $e->institute= $request->institute_id;
        $e->major = $request->major;
        $e->year = $request->year;
        $e->score = $request->score;
        $e->start_date = $request->start_date;
        $e->end_date = $request->end_date;
        $e->save();
        return response()->json($e);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e =  employeeEducation::find($id);
        $e->delete();
        return response()->json($e);
    }
}
