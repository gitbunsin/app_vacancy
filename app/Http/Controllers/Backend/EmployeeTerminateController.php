<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Model\employeeterminate;
use App\Model\terminationResons;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class EmployeeTerminateController extends Controller
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
        $terminate = new employeeTerminate();
        $terminate->termination_id = $request->reason_id;
        $terminate->employee_id = $request->employee_terminate_id;
        $terminate->date = $request->date;
        $terminate->note = $request->note;
        $terminate->save();
        $terminate['reason'] = terminationResons::find($terminate->termination_id);
        return response::json($terminate);
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
        $terminate =  employeeTerminate::find($id);
        $terminate['reason'] = terminationResons::find($terminate->termination_id);
        $terminate['all_reason'] = terminationResons::all();
        return response::json($terminate);
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
        $terminate = employeeTerminate::find($id);
        $terminate->termination_id = $request->reason_id;
        $terminate->employee_id = $request->employee_terminate_id;
        $terminate->date = $request->date;
        $terminate->note = $request->note;
        $terminate->save();
        $terminate['reason'] = terminationResons::find($terminate->termination_id);
        return response::json($terminate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terminate = employeeTerminate::find($id);
        $terminate->delete();
        return response::json($terminate);
    }
}
