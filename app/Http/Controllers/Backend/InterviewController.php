<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Model\candidate_vacancy;
use App\Model\candidate;
use DB;
use App\Model\vacancy;
use App\Model\employee_interview;
use App\Model\employee;
use App\Model\interview;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviews = interview::with(['employee','candidate','vacancy'])->get();
        // dd($interviews);
        return view('Backend/pages/interview/index',compact('interviews'));
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
        $interview = new interview();
        $interview->candidate_id = $request->candidate_id;
        $interview->vacancy_id = $request->vacancy_id;
        $interview->interview_name = $request->interview_name;
        $interview->interview_time= $request->interview_time;
        $interview->interview_date = $request->interview_date;
        $interview->status = $request->interview_status;
        $interview->note = $request->note;
        $interview->save();
 
        $employee = employee::find($request->interviewer_id);
        $interview->employee()->attach($employee);
        $interview['employee'] = employee::select(DB::raw("CONCAT(employees.first_name,' ',employees.last_name) as interviewer"))->whereIn('id', $request->interviewer_id)->get();
                
        $interview['vacancy'] = vacancy::find($interview->vacancy_id);
        $interview['candidate'] = candidate::find($interview->candidate_id);
        return response::json($interview);
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
        $interview = interview::find($id);
        $interview['vacancy'] = vacancy::find($interview->vacancy_id);
        $interview['candidate'] = candidate::find($interview->candidate_id);
        return response::json($interview);
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
        $interview = interview::find($id);
        $interview->interview_name = $request->interview_name;
        $interview->interview_time= $request->interview_time;
        $interview->interview_date = $request->interview_date;
        $interview->status = $request->interview_status;
        $interview->note = $request->note;
        $interview->save();
        $employee = employee::find($request->employee_id);
        $interview->employee()->sync($employee);
        $interview['employee'] = employee_interview::where('employee_id',$request->employee_id)->first();
        
        $interview['vacancy'] = vacancy::find($interview->vacancy_id);
        $interview['candidate'] = candidate::find($interview->candidate_id);
        return response::json($interview);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interview = interview::find($id);
        $interview->delete();
        return response::json($interview);
    }
}
