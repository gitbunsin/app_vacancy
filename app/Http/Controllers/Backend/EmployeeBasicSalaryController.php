<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\employeeBasicSalary;
use Illuminate\Support\Facades\Auth;
use App\Model\payGrade;
use App\Model\currency;
use App\Model\payPeriod;

class EmployeeBasicSalaryController extends Controller
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
        $basicSalary = new employeeBasicSalary();
        $basicSalary->admin_id = auth()->guard('admin')->user()->id;
        $basicSalary->employee_id = 3;
        $basicSalary->pay_grade_id = $request->pay_grade_id;
        $basicSalary->salary_component = $request->salary_component;
        $basicSalary->basic_salary = $request->amount;
        $basicSalary->comments = $request->comments;
        $basicSalary->payperiod_id = $request->pay_periods_id;
        $basicSalary->currency_id = $request->currency_id;
        $basicSalary->save();
        //Paygrade 
        $basicSalary['payGrade'] = payGrade::where('id',$request->pay_grade_id)->first();
        $basicSalary['currency'] = currency::where('id',$request->currency_id)->first();
        $basicSalary['payPeriod'] = payPeriod::where('id',$request->pay_periods_id)->first();
        return response()->json($basicSalary);
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
        $basicSalary =  employeeBasicSalary::find($id);
        return response()->json($basicSalary);
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
        $basicSalary =  employeeBasicSalary::find($id);
        $basicSalary->admin_id = auth()->guard('admin')->user()->id;
        $basicSalary->employee_id = 1;
        $basicSalary->pay_grade_id = $request->pay_grade_id;
        $basicSalary->salary_component = $request->salary_component;
        $basicSalary->basic_salary = $request->amount;
        $basicSalary->payperiod_id = $request->pay_periods_id;
        $basicSalary->comments = $request->comment;
        $basicSalary->currency_id = $request->currency_id;
        $basicSalary->save();
        return response()->json($basicSalary);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $basicSalary =  employeeBasicSalary::find($id);
        $basicSalary->delete();
        return response()->json($basicSalary);
    }
}
