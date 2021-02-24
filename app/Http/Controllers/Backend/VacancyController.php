<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\JobTitle;
use App\Model\PayGrade;
use DB; 
use App\Model\vacancy;
use App\Model\vacancyAttachment;
use App\Model\EmploymentStatus;
use App\Model\Employee_work_shift;
use App\Model\JobCategory;
use App\Model\workShift;
class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobTitle = JobTitle::all();
        $payGrade = PayGrade::with('currency')->where('admin_id',auth()->guard('admin')->user()->id)->get();
        $status = EmploymentStatus::all();
        $category = JobCategory::all();
        $workShifts = WorkShift::with('employee')->get();
    
        return view('backend/pages/admin/vacancy/index',compact('workShifts','jobTitle','payGrade','status','category'));
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
        $vacancy_attachemnt = vacancyAttachment::find($id);
        return response()->json($vacancy_attachemnt);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy = vacancy::with(['skill','jobAttachment','province','company','employee','category','jobTitle','JobType'])->where('id',$id)->first();
        return view('backend/pages/job/edit',compact('vacancy'));
    }

    public function vacancyAttachment(Request $request , $id){

        $filename = $request->file('file_name')->getClientOriginalName();
        $user = new vacancyAttachment();
        $user->vacancy_id = $id;
        $user->file_name = $filename ;
        $user->attachment_type = $request->file('file_name')->getMimeType();
        $user->file_size =  $request->file('file_name')->getSize();
        $user->file_type = $request->file('file_name')->getType();
        $user->file_content = $request->file('file_name')->getPathname();
        $dir = 'uploads/UserCv';
        $request->file('file_name')->move($dir, $filename);
        $user->save();
        return response()->json($user);
        // return response::json('success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vacancyUpdateAttachment(Request $request, $attachment_id)
    {
        $filename = $request->file('file')->getClientOriginalName();
        $attachment = vacancyAttachment::find($attachment_id);
        $attachment->vacancy_id = $request->vacancy_id;
        $attachment->file_name = $filename ;
        $attachment->attachment_type = $request->file('file')->getMimeType();
        $attachment->file_size =  $request->file('file')->getSize();
        $attachment->file_type = $request->file('file')->getType();
        $attachment->file_content = $request->file('file')->getPathname();
        $dir = 'uploads/UserCv';
        $request->file('file')->move($dir, $filename);
        $attachment->save();
        return response()->json($attachment );

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancy_attachemnt = vacancyAttachment::find($id);
        $vacancy_attachemnt->delete();
        return response()->json($vacancy_attachemnt);
    }
}
