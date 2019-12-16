<?php

namespace App\Http\Controllers\Backend;

use App\Model\candidate;
use App\Model\vacancy;
use App\Model\company;
use App\Model\candidate_vacancy;
use App\Model\candidateAttachment;
use Illuminate\Http\Request;
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
        dd($candidate);
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
        $candidate =  candidate::find($id);
        $candidate['all_company'] = company::all();
        $candidate['all_vacancy'] = vacancy::all();


        return response::json($candidate);
    }

    public function EditCandidateVacancy($candidate_id , $vacancy_id){

        $candidate =  candidate::find($candidate_id);
        $candidate['all_company'] = company::all();
        $candidate['all_vacancy'] = vacancy::all();
        $candidate['candidate_vacancy'] = candidate_vacancy::where('vacancy_id',$vacancy_id)
        ->where('candidate_id',$candidate_id)->first();
        $candidate['resume'] = candidateAttachment::where('candidate_id',$candidate_id)->first();

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
        $filename = $request->file('file')->getClientOriginalName();
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
        $candidate_vacancy = candidate::find($candidate->id);
        $candidate_vacancy->vacancy()->sync($request->vacancy_id,array('status'=>'Application Initiated','applied_date'=>Carbon::now()));
        //candidate attachment
        $attachment = candidateAttachment::where('candidate_id',$candidate_id)->first();
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
