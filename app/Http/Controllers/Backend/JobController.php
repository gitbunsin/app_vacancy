<?php

namespace App\Http\Controllers\Backend;

use App\Model\vacancy;
use App\Model\jobAttachment;
use App\Model\skill;
use App\Model\userCv;
use App\Model\UserJob;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = vacancy::with(['category','jobType'])->orderBy('created_at')->paginate('10');
       // dd($job);
        return view('backend.pages.job.index',compact('job'));
    }
    public function job()
    {
        $job = vacancy::with(['category','jobType','company'])->get();
        return view('frontend/pages/job',compact('job'));
    }

    public function jobDetails($id)
    {
        $job = vacancy::with(['category','jobType','company','admin','skill'])->where('id',$id)->first();
        $file = jobAttachment::with(['job'])->where('job_id',$id)->first();
        return view('frontend.pages.job-apply-detail',compact('job','file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobApply($job_id){
        if(Auth::user()){
            $user_id = auth::user()->id;
            $hasCv = userCv::where('user_id',$user_id)->first();
            if($hasCv){
                $userJob = new UserJob();
                $userJob->user_id = $user_id;
                $userJob->job_id = $job_id;
                $userJob->applied_date = Carbon::now();
                $userJob->status = "Application Initiated";
                $userJob->save();
                return  redirect('job-apply-details/')->with(['job_id'=>$job_id]);
                //dd('User already has CV ');
            }else{

                //dd('has not CV plz upload ur cv');
                return redirect('/user-profile');
            }

        }else{

            return redirect('login');
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
       // dd($request->all());
        $files = $request->file('filename');
       // dd($files);
        $data = request()->except(['skill','filename','salary']);
        $job =  vacancy::create($data);
        $job->admin_id = auth()->guard('admin')->user()->id;
        $job->category()->associate($request->category_id);
        $job->location()->associate($request->location_id);
        $job->jobType()->associate($request->job_type_id);
        $job->company()->associate($request->company_id);
        $salary = $request->salary;
        if($salary == "Negotiate"){
            $job->offer_salary = "Negotiate";
        }else{
            $offer_salary = $request->offer_salary;
           // dd($offer_salary);
            $job->offer_salary = $offer_salary;
        }
       // dd($salary);
        $job->save();
        $areas = $request->input('skill');
        $idAreas = skill::find($areas);
        $job->skill()->sync($idAreas);
        if ($files) {
            $destinationPath = 'public/JobUpload/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert['filename'] = "$profileImage";
            $hasFile = new jobAttachment();
            $hasFile->file_name =  $insert['filename'];
            $hasFile->job_id = $job->id;
            $hasFile->save();
        }
        return redirect('admin/job');
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
        $all_skill = DB::table('job_skill')->where("job_id",$id)->get();
        $job_attachment = DB::table('job_attachments')->where("job_id",$id)->first();
        //dd( $job_attachment);
        return view('backend.pages.job.edit',compact('job','all_skill','job_attachment'));
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

        $file = $request->file('filename');
        $job = vacancy::whereId($id)->first();
        $data = request()->except(['skill','filename']);
        $job->update($data);
        $job->admin_id = $request->admin_id;
        $job->category()->associate($request->category_id);
        $job->location()->associate($request->location_id);
        $job->jobType()->associate($request->job_type_id);
        $job->company()->associate($request->company_id);
        $job->save();
        $areas = $request->input('skill');
        $idAreas = skill::find($areas);
        $job->skill()->sync($idAreas);
        if($file){
            if(file_exists(public_path().'/JobUpload/'.$file->getClientOriginalName()))
            {
               // File::delete(public_path('JobUpload/'.$file->getClientOriginalName()));
                //dd('File is exists.');
            }else{
//            $data = DB::table('job_attachments')->where('job_id',$job->id)->first();
                // File::delete(public_path().'/JobUpload/'.$file->getClientOriginalName());
                $data = new jobAttachment();
                $data->job_id = $job->id;
                $data->file_name = $file->getClientOriginalName();
                $data->attachment_type = $file->getMimeType();
                $data->file_size =  $file->getSize();
                $data->file_type = $file->getType();
                $data->file_content = $file->getPathname();
                $file->move(public_path().'/JobUpload/', $file->getClientOriginalName());
                $data->save();
                //  dd('File is not exists.');
            }
        }else{

        }
        return redirect('/admin/job');
    }
    public function getDownloadCompany($filename)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/JobUpload/".$filename;
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
        $job->delete();
        return response::json($job);
        //
    }
}
