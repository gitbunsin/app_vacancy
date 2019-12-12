<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Model\workShift;
use App\Model\employee;
use DB;
use App\Model\employee_work_shift;
use App\Http\Controllers\Controller;

class WorkShiftController extends Controller
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
        //
        $workShift = new WorkShift();
        $workShift->name = $request->name;
        $workShift->start_time = $request->start_time;
        $workShift->end_time = $request->end_time;
        $workShift->hours_per_day  = $request->duration;
        $workShift->save();
        $e_id  = $request->employee;
        $employee = employee::find($e_id);
        $workShift->employee()->attach($employee);
        return response::json($workShift);
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
        $workShift = WorkShift::find($id);
        $workShift['all_employee'] = employee::all();
        $workShift['employee_work_shift'] = employee_work_shift::where('work_shift_id',$id)->get(); 
      
        return response::json($workShift);
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
        $workShift = WorkShift::find($id);
        $workShift->name = $request->name;
        $workShift->start_time = $request->start_time;
        $workShift->end_time = $request->end_time;
        $workShift->hours_per_day  = $request->duration;
        $workShift->save();
        $e_id  = $request->employee;
        $employee = employee::find($e_id);
        $workShift->employee()->sync($employee);
        return response::json($workShift);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workShift = WorkShift::find($id);
        $workShift->delete();
        return response::json($workShift);
    }
}
