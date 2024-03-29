<?php

namespace App\Http\Controllers\Backend;

use App\Model\vacancy;
use App\Model\jobAttachment;
use App\Model\skill;
use App\Admin;
// use App\Model\Admin;;
use App\Model\jobType;
use App\Model\userCv;
use App\Model\UserJob;
use App\Model\location;
use App\Model\company;
use App\Model\jobTitle;
use App\Model\province;
use App\User;
use App\Model\UserVacancy;
use App\Model\candidateHistory;
use App\Model\employee;
use App\Model\candidate;    
use Carbon\Carbon;
use App\Model\candidateAttachment;
use App\Model\jobCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use App\Model\candidate_vacancy;
use App\Model\userBookmark;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = vacancy::with(['employee','category','jobType'])->where('admin_id',auth()->guard('admin')->user()->id)->orderBy('created_at')->paginate('9');
        return view('backend/pages/job/index',compact('job'));
    }
    public function listAllVacancy(){

        $job = vacancy::with(['employee','category','jobType'])->where('admin_id','!=',auth()->guard('admin')->user()->id)->orderBy('created_at')->paginate('9');
        return view('backend/pages/job/list_all_job',compact('job'));

    }
    public function job()
    {
        $id = '';
        $job = vacancy::with(['company','province','category','jobType','company'])->orderBy('id','desc')->where('status','approved')->paginate(10);
        // dd($job);
        $popularJob = vacancy::with(['company','province','category','jobType','company'])->where('status','approved')->take(11)->get();
        // dd($job);
        return view('frontend/pages/job',compact('job','popularJob','id'));
    }


    public function vacancyDetails($id)
    {
        $check = vacancy::where('id',$id)->first();
        if ( !$check){
            abort(404);
        }
        // dd($id);
        $vacancy = vacancy::with(['admin','employee','province','jobTitle','category','jobType','company','skill'])->where('id',$id)->first();
        $relatedVacancy = vacancy::with(['admin','employee','province','jobTitle','category','jobType','company','skill'])->where('company_id',$vacancy->company_id)->get();
        // dd($relatedVacancy);   
        // $file = jobAttachment::with(['job'])->where('job_id',$id)->first();
        return view('frontend/pages/job-apply-detail',compact('vacancy','relatedVacancy'));
    }

    //public function profileDetails

    public function profileDetails($id)
    {
        $user_cv = userCv::where('user_id',$id)->first();
        $user = User::with(['hobby','reference','skill','language','traning','experience','education'])->where('id',$id)->first();
        dd($user);
        $user_bookmark = userBookmark::where('user_id',Auth::user()->id)->get();
        // dd($user_bookmark);
        // foreach ($user_bookmark as $key => $value) {
        //     $user_bookmark 
            
        // }
        // dd( $value->vacancy_id);
        return view('frontend.pages.user-profile',compact('user_cv','user','user_bookmark'));

    }
    public function jobsListing(Request $request)
    {
        // $id ='';
        if($request->job_title){
            $job = vacancy::where('job_title_id','=',$request->job_title)->paginate('10');
            $id = $request->id;
        }
        if($request->category){
            $job = vacancy::where('category_id','=',$request->category)->paginate('10');
            $id = $request->id;
        }
        if($request->province){
            $job = vacancy::where('province_id','=',$request->province)->paginate('10');
            $id = $request->id;
        }
       
        return view('frontend/pages/job',compact('job','id'));
    }

    public function searchSalaryRange(Request $request)
    {
        // dd($request->salary_Range);
        if ($request->minSalary){
            $job = vacancy::where('maxSalary', 'like', "%{$request->maxSalary}%")
            ->where('minSalary', 'like', "%{$request->minSalary}%")->get();
        }
        // dd($request->search_job);
        if($request->salary_Range){
            $job =  vacancy::whereIn('maxSalary', $request->salary_Range)
      
            ->paginate('10'); 
        }
        if($request->search_job){
            $job =  vacancy::whereIn('job_title_id',$request->search_job)->paginate('10'); 
        }
        return view('frontend/pages/job',compact('job'));
    }
    public function approveVacancy($id)
    {
        $vacancy = vacancy::find($id);
        $vacancy->status = "approved";
        $vacancy->save();
        return response()->json($vacancy);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userAttachement(Request $request , $id)
    {

        $filename = $request->file('file')->getClientOriginalName();
        $user = new userCv();
        $user->user_id = $id;
        $user->file_name = $filename ;
        $user->attachment_type = $request->file('file')->getMimeType();
        $user->file_size =  $request->file('file')->getSize();
        $user->file_type = $request->file('file')->getType();
        $user->file_content = $request->file('file')->getPathname();
        $dir = 'uploads/UserCv';
        $request->file('file')->move($dir, $filename);
        $user->save();
        return response()->json($user);

    }

    public function userAttachementDelete($id)
    {
        $user = userCv::find($id);
        $user->delete();
        return response()->json($user);
    }

    public function userAttachementEdit($id)
    {
        $user = userCv::find($id);
        return response()->json($user);
    }

    public function userAttachementUpdate(Request $request , $id){
        
        $filename = $request->file('file_name')->getClientOriginalName();
        $user = userCv::find($id);
        $user->user_id = Auth::user()->id;
        $user->file_name = $filename ;
        $user->attachment_type = $request->file('file_name')->getMimeType();
        $user->file_size =  $request->file('file_name')->getSize();
        $user->file_type = $request->file('file_name')->getType();
        $user->file_content = $request->file('file_name')->getPathname();
        $dir = 'uploads/UserCv';
        $request->file('file_name')->move($dir, $filename);
        $user->save();
        return response()->json($user);
     
    }


    public function ajaxImage(Request $request,$id)
    {
       
        $user = User::find($id);
        if($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $dir = 'uploads/UserCv';
            $request->file('file')->move($dir, $filename);
            $user->profile = $filename;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->zip = $request->zip;
            $user->address = $request->address;
            $user->save();

        }else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->zip = $request->zip;
            $user->address = $request->address;
            $user->save();

        }
        return response::json('success');
    }

    public function deleteImage($filename)
    {
        File::delete('uploads/' . $filename);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CheckUserLoginApplyJob()
    {
        if(Auth::user())
        {
            return response::json('success');
        }else
        {
            return response::json('error');
        }
    }
     public function CheckUserLogin()
    {
        if(Auth::user())
        {
            return response::json('error');
        }else
        {
            return response::json('success');
        }
    }
    //ApplyJob
    public function UserApplyJob(Request $request ,$vacancy_id , $candidate_id)
    {
        $UserCvCheck = DB::table('user_cvs')->where('user_id',$candidate_id)->count();
        if($UserCvCheck > 0)
        {
           
            $user_candidate = User::with('attachment')->where('id',$candidate_id)->first();
            $candidate = new candidate();
            $candidate->admin_id = $request->admin_id;
            $candidate->company_id = $request->company_id;
            $candidate->user_id = $candidate_id;
            $candidate->name = $user_candidate->name;
            $candidate->email =  $user_candidate->email;
            $candidate->first_name = $user_candidate->first_name;
            $candidate->last_name = $user_candidate->last_name;
            $candidate->middle_name = $user_candidate->middle_name;
            $candidate->phone = $user_candidate->phone;
            $candidate->save();
            $candidate_user_id = $candidate->user_id;

            // $candidate_vacancy = new candidate_vacancy();
            // $candidate_vacancy->candidate_vacancy
            $vacancy = vacancy::find($vacancy_id);
            $candidate->vacancy()->attach($vacancy,array('status'=>'Application Initiated','applied_date'=>Carbon::now()));



            // User Vacancy
            $userVacancy  = new UserVacancy();
            $userVacancy->user_id = $candidate_id;
            $userVacancy->vacancy_id = $vacancy_id;
            $userVacancy->status = 'Application Initiated';
            $userVacancy->applied_date = Carbon::now();
            $userVacancy->save();

            // $user = user::find($candidate_id);
            // $candidate->user()->attach($user,array('status'=>'Application Initiated','applied_date'=>Carbon::now()));
            // $candidate->vacancy()->attach($vacancy_id,array('status'=>'Application Initiated','applied_date'=>Carbon::now()));
            //candidate attachment
            $attachment = new candidateAttachment();
            $attachment->candidate_id = $candidate->id;
            $attachment->file_name =  $user_candidate->attachment[0]->file_name ;
            $attachment->attachment_type = $user_candidate->attachment[0]->file_type ;
            $attachment->file_size =  $user_candidate->attachment[0]->file_size;
            $attachment->file_type = $user_candidate->attachment[0]->file_type;
            $attachment->file_content = $user_candidate->attachment[0]->file_content;
            $dir = 'uploads/UserCv';
            $path = public_path('uploads/UserCv'.$attachment->file_name);
            $attachment->save();

           
            // $request->file('file')->move($dir, $user_candidate->attachment->file_name);
            // $attachment->save();

            $candidate['vacancy']= vacancy::where('id',$vacancy_id)->first();
            $candidate['candidate_vacancy'] = candidate_vacancy::where('vacancy_id',$vacancy_id)
                                                              ->where('candidate_id',$candidate_id)->first();
            $user_name = Admin::where('id',$candidate->admin_id)->first();

            $candidate_history = new candidateHistory();
            $candidate_history->admin_id = $candidate->admin_id;
            $candidate_history->employee_id = $candidate->vacancy->employee_id;
            $candidate_history->candidate_id = $candidate->id;
            $candidate_history->vacancy_id = $candidate->vacancy->id;
            $candidate_history->performed_date = Carbon::now();
            $candidate_history->name =  $user_name->name;
            $candidate_history->status = 'Application Initiated';
            $candidate_history->save();

            return response::json($candidate);  
            // return response::json(); 
        }else 
        {
            return response::json('error'); 
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.job.create');
    }
    public function profile(){


        return view('backend.pages.profile.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $User = auth()->guard('admin')->user();
        $v = new Vacancy();
        $v->admin_id =   $User->id;
        $v->company_id = $request->company_id;
        $v->category_id = $request->job_category_vacancy_id;
        $v->job_type_id = $request->job_type_id;
        if($User->role_id == 1){
            $v->status = "approved"; 
        }else{
            $v->status = "pending"; 
        }
        $v->employee_id = $request->hiring_manager_id;
        $v->province_id = $request->location_id;
        $v->vacancy_name = $request->vacancy_name;
        $v->job_description = $request->job_description;
        $v->job_requirement = $request->responsibilities;
        $v->closingDate = $request->closingDate;
        $v->job_title_id = $request->job_title_id;
        $v->salary_cycle = $request->salary_cycle;
        $v->exp_level = $request->exp_level;
        $v->maxSalary = $request->maxSalary;
        $v->minSalary = $request->minSalary;
        $v->negotiation = $request->checkSalary;
        $v->save();
        $idAreas_skill = skill::find($request->skill_id);
        $v->skill()->sync($idAreas_skill);
        $v['employee'] = employee::find($request->hiring_manager_id);
        return response::json($v);
       
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
        return view('frontend.pages.job-apply-detail');
    }
    public function details(){

        return view('frontend.pages.job-apply-detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = vacancy::find($id);
        $job['category'] = jobCategory::all();
        $job['jobType'] = jobType::all();
        $job['location'] = location::all();
        $job['vacancy_skill_id'] = DB::table('skill_vacancy')->where("vacancy_id",$id)->get();
        $job['all_skill'] = skill::all();
        $job['company'] = company::all();
        $job['employee'] = employee::all();
        $job['jobTitle'] = jobTitle::all();
        $job['province'] = province::all();
        return response::json($job);
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
        $User = auth()->guard('admin')->user();
        $v = vacancy::find($id);
        $v->admin_id =  $User->id;
        $v->company_id = $request->company_id;
        $v->category_id = $request->job_category_vacancy_id;
        $v->job_type_id = $request->job_type_id;
        if($User->role_id == 1){
            $v->status = "approved"; 
        }else{
            $v->status = "pending"; 
        }
        $v->employee_id = $request->hiring_manager_id;
        $v->province_id = $request->location_id;
        $v->vacancy_name = $request->vacancy_name;
        $v->job_description = $request->job_description;
        $v->job_requirement = $request->responsibilities;
        $v->closingDate = $request->closingDate;
        $v->job_title_id = $request->job_title_id;
        $v->salary_cycle = $request->salary_cycle;
        $v->exp_level = $request->exp_level;
        $v->maxSalary = $request->maxSalary;
        $v->minSalary = $request->minSalary;
        $v->negotiation = $request->checkSalary;
        $v->save();
        $idAreas_skill = skill::find($request->skill_id);
        $v->skill()->sync($idAreas_skill);
        $v['employee'] = employee::find($request->hiring_manager_id);
        return response::json($v);


    }
    public function getDownloadCompany($filename)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/JobUpload".'/'.$filename;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, 'filename.pdf', $headers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = vacancy::find($id);
        $job->status = 'blocked';
        $job->save();
        return response::json($job);
        //
    }
}
