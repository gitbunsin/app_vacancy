<?php

namespace App\Http\Controllers\Backend;

use App\Model\candidate;
use App\Model\vacancy;
use App\Model\company;
use App\Model\candidate_vacancy;
use App\Model\candidateAttachment;
use Illuminate\Http\Request;
use App\Model\interview;
use DB; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $candidate = candidate::with('vacancy')->get();
        // dd($candidate);
        return view('Backend/pages/candidate/index',compact('candidate'));

    }
    public function createResume()
    {

       return view('backend/pages/candidate/create-resume');
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
        $filename = $request->file('file')->getClientOriginalName();
        $candidate = new candidate();
        $candidate->admin_id = auth()->guard('admin')->user()->id;
        $candidate->company_id = $request->company;
        $candidate->user_id = 1;
        $candidate->name = $request->first_name .' '. $request->last_name;
        $candidate->email = $request->email;
        $candidate->first_name = $request->first_name;
        $candidate->last_name = $request->last_name;
        $candidate->middle_name = $request->middle_name;
        $candidate->phone = $request->phone;
        $candidate->save();
        $candidate_id = $candidate->id;
        $candidate_vacancy = candidate::find($candidate->id);
        $candidate_vacancy->vacancy()->attach($request->vacancy_id,array('status'=>'Application Initiated','applied_date'=>Carbon::now()));
        //candidate attachment
        $attachment = new candidateAttachment();
        $attachment->candidate_id = $candidate_id;
        $attachment->file_name = $filename ;
        $attachment->attachment_type = $request->file('file')->getMimeType();
        $attachment->file_size =  $request->file('file')->getSize();
        $attachment->file_type = $request->file('file')->getType();
        $attachment->file_content = $request->file('file')->getPathname();
        $dir = 'uploads/UserCv';
        $request->file('file')->move($dir, $filename);
        $attachment->save();
        $candidate['vacancy']= vacancy::where('id',$request->vacancy_id)->first();
        $candidate['candidate_vacancy'] = candidate_vacancy::where('vacancy_id',$request->vacancy_id)
                                                          ->where('candidate_id',$candidate_id)->first();
        return response::json($candidate);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = candidate::with(['vacancy','interview','candidateAttachment'])->where('id',$id)->first();
        // dd($candidate->candidateAttachment);
        // $interviewer = employee_interview::where('interview_id',$candidate->interview)
        // return view('Backend/pages/candidate/edit');
        // $candidate =  candidate::find($id);
        // $candidate['all_company'] = company::all();
        // $candidate['all_vacancy'] = vacancy::all();
        // return response::json($candidate);
        return view('Backend/pages/candidate/edit',compact('candidate'));
    }

    public function editCandidateResume( $id)
    {
        # code...
        $candidate_attachment = candidateAttachment::where('candidate_id',$id)->first();
        return response::json( $candidate_attachment );
    }

    public function UpdateCandidateResume(Request $request ,$id)
    {
        $filename = $request->file('file')->getClientOriginalName();
        $attachment = candidateAttachment::where('candidate_id',$id)->first();
        $attachment->candidate_id = $id;
        $attachment->file_name = $filename ;
        $attachment->attachment_type = $request->file('file')->getMimeType();
        $attachment->file_size =  $request->file('file')->getSize();
        $attachment->file_type = $request->file('file')->getType();
        $attachment->file_content = $request->file('file')->getPathname();
        $dir = 'uploads/UserCv';
        $request->file('file')->move($dir, $filename);
        $attachment->save();
     
        return response::json($attachment);
    }

    public function EditCandidateVacancy($candidate_id , $vacancy_id){

        $candidate =  candidate::find($candidate_id);
        $candidate['all_company'] = company::all();
        $candidate['all_vacancy'] = vacancy::all();
        $candidate['candidate_vacancy'] = candidate_vacancy::where('vacancy_id',$vacancy_id)
        ->where('candidate_id',$candidate_id)->first();
        $candidate['resume'] = candidateAttachment::where('candidate_id',$candidate_id)->first();
        $candidate['interview'] = interview::where('vacancy_id',$vacancy_id)
        ->where('candidate_id',$candidate_id)->first();
        return response::json($candidate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCandidate(Request $request , $id)
    {
        
        // $filename = $request->file('file')->getClientOriginalName();
        $candidate = candidate::find($id);
        $candidate->admin_id = auth()->guard('admin')->user()->id;
        $candidate->company()->associate($request->company);
        $candidate->user_id = 1;
        $candidate->name = $request->first_name .' '. $request->last_name;
        $candidate->email = $request->email;
        $candidate->first_name = $request->first_name;
        $candidate->last_name = $request->last_name;
        $candidate->middle_name = $request->middle_name;
        $candidate->phone = $request->phone;
        $candidate->save();
        $candidate_id = $candidate->id;
                   
        return response::json($request->first_name);
        //candidate_vacancy 
        // $candidate_vacancy = DB::table('candidate_vacancy')->where('candidate_id', $candidate_id )->where('vacancy_id',$request->vacancy_id)->update(['status'=>$request->status,'applied_date'=>$request->date]);
        // check Status equal interview 
        // $candidate_vacancy = DB::table('interview')->where('candidate_id', $candidate_id )->where('vacancy_id',$request->vacancy_id)->first();
       

        // if($request->status == "Interview"){
        //     $interview = DB::table('interviews')->where('candidate_id', $candidate_id )->where('vacancy_id',$request->vacancy_id)->first();
        //     if($interview){
        //         $interview = interview::find($interview->id);
        //         $interview->candidate_id = $candidate_id ;
        //         $interview->vacancy_id = $request->vacancy_id;
        //         $interview->interview_name = $request->interview_name;
        //         $interview->interview_date = $request->interview_date;
        //         $interview->interview_time = $request->interview_time;
        //         $interview->status = $request->status;
        //         $interview->save();
        //     }else{
        //         $interview = new interview();
        //         $interview->candidate_id = $candidate_id ;
        //         $interview->vacancy_id = $request->vacancy_id;
        //         $interview->interview_name = $request->interview_name;
        //         $interview->interview_date = $request->interview_date;
        //         $interview->interview_time = $request->interview_time;
        //         $interview->status = $request->status;
        //         $interview->save();
        //     }
        // }

        // $attachment = candidateAttachment::where('candidate_id',$candidate_id)->first();
        // $attachment->candidate_id = $candidate_id;
        // $attachment->file_name = $filename ;
        // $attachment->attachment_type = $request->file('file')->getMimeType();
        // $attachment->file_size =  $request->file('file')->getSize();
        // $attachment->file_type = $request->file('file')->getType();
        // $attachment->file_content = $request->file('file')->getPathname();
        // $dir = 'uploads/UserCv';
        // $request->file('file')->move($dir, $filename);
        // $attachment->save();
        // $candidate['vacancy']= vacancy::where('id',$request->vacancy_id)->first();
        // $candidate['candidate_vacancy'] = candidate_vacancy::where('vacancy_id',$request->vacancy_id)
        //                                                   ->where('candidate_id',$candidate_id)->first();


        // $ObjInterview  = new interview();
        // $objInterview->candidate_id =  1;
        // $objInterview->vacancy_id = 18;
        // $objInterview->save();   
       

           
         

    }
    // public function update(Request $request, $id)
    // {
        
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = candidate::find($id);
        $candidate->delete();
        return response()->json($candidate);

    }
}
