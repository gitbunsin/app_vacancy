<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Model\candidate_vacancy;
use App\Model\candidate;
use DB;
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

        // $interviews = DB::table('interviews')
        //                 ->select("employee_interview.*","interviews.*",'interviews.id as interview_id','candidates.*','vacancies.*','interviews.status as interview_status')
        //                 ->join('candidates', 'candidates.id', '=', 'interviews.candidate_id')
        //                 ->join('vacancies','vacancies.id','=','interviews.vacancy_id')
        //                 // ->join('employee_interview','employee_interview.interview_id','=','interviews.id')
        //                 ->get();
        // $interviews = employee::with('interview')->get();
        $interviews = interview::with('employee')->get();
        dd($interviews);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
