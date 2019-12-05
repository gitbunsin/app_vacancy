<?php

namespace App\Http\Controllers\Backend;

use App\Model\vacancy;
use App\Model\jobAttachment;
use App\Model\skill;
use App\Model\jobType;
use App\Model\userCv;
use App\Model\UserJob;
use App\Model\location;
use App\User;
use App\Model\Admin;
use Carbon\Carbon;
use App\Model\jobCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
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
         
        return view('backend.pages.job.index',compact('job'));
    }
    public function job()
    {
        $job = vacancy::with(['category','jobType','company'])->get();
        // dd($job);
        return view('frontend/pages/job',compact('job'));
    }

    public function vacancyDetails($id)
    {
        $vacancy = vacancy::with(['location','category','jobType','company','skill'])->where('id',$id)->first();
        // dd($vacancy);
        // $file = jobAttachment::with(['job'])->where('job_id',$id)->first();
        return view('frontend.pages.job-apply-detail',compact('vacancy','file'));
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
            $user->email = $request->user_email;
            $user->phone = $request->phone;
            $user->zip = $request->zip;
            $user->address = $request->address;
            $user->save();

        }else{

            $user->profile =" ";
            $user->name = $request->name;
            $user->email = $request->user_email;
            $user->phone = $request->phone;
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
     public function CheckUserLogin()
    {
        if(Auth::user())
        {
            return response::json('success');
        }else
        {
            return response::json('success');
        }
    }
    // public function jobApply($job_id){
    //     if(Auth::user()){
            
    //         return response::json('success');

    //     }else{

    //         return response::json('success');
    //     }
        //     $user_id = auth::user()->id;
        //     $hasCv = userCv::where('user_id',$user_id)->first();
        //     if($hasCv){
        //         $userJob = new UserJob();
        //         $userJob->user_id = $user_id;
        //         $userJob->job_id = $job_id;
        //         $userJob->applied_date = Carbon::now();
        //         $userJob->status = "Application Initiated";
        //         $userJob->save();
        //         return  redirect('job-apply-details/')->with(['job_id'=>$job_id]);
        //         //dd('User already has CV ');
        //     }else{

        //         //dd('has not CV plz upload ur cv');
        //         return redirect('/user-profile');
        //     }

        // }else{

        //     return redirect('login');
        // }
    // }

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
        $v = new Vacancy();
        $v->admin_id = auth()->guard('admin')->user()->id;
        $v->company_id = $request->company_id;
        $v->category_id = $request->job_category_vacancy_id;
        $v->job_type_id = $request->job_type_id;
        $v->status = "Active"; 
        $v->location_id = $request->location_id;
        $v->vacancy_name = $request->vacancy_name;
        $v->job_description = $request->job_description;
        $v->closingDate = $request->closingDate;
        $v->save();
        $idAreas_skill = skill::find($request->skill_id);
        $v->skill()->sync($idAreas_skill);
        return response::json($v);
       // dd($request->all());
        // $files = $request->file('filename');
       // dd($files);
        // $data = request()->except(['skill','filename','salary']);
        // $job =  vacancy::create($data);
        // $job->admin_id = auth()->guard('admin')->user()->id;
        // $job->category()->associate($request->category_id);
        // $job->location()->associate($request->location_id);
        // $job->jobType()->associate($request->job_type_id);
        // $job->company()->associate($request->company_id);
        // $salary = $request->salary;
        // if($salary == "Negotiate"){
        //     $job->offer_salary = "Negotiate";
        // }else{
        //     $offer_salary = $request->offer_salary;
        //    // dd($offer_salary);
        //     $job->offer_salary = $offer_salary;
        // }
       // dd($salary);
        // $job->save();
        // $areas = $request->input('skill');
        // $idAreas = skill::find($areas);
        // $job->skill()->sync($idAreas);
        // if ($files) {
        //     $destinationPath = 'public/JobUpload/'; // upload path
        //     $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //     $files->move($destinationPath, $profileImage);
        //     $insert['filename'] = "$profileImage";
        //     $hasFile = new jobAttachment();
        //     $hasFile->file_name =  $insert['filename'];
        //     $hasFile->job_id = $job->id;
        //     $hasFile->save();
        // }
        // return redirect('admin/job');
        return response::json('success');
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
        return response::json($job);


        // $all_skill = DB::table('job_skill')->where("job_id",$id)->get();
        // $job_attachment = DB::table('job_attachments')->where("job_id",$id)->first();
        // //dd( $job_attachment);
        // return view('backend.pages.job.edit',compact('job','all_skill','job_attachment'));
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

        $v = vacancy::find($id);
        $v->admin_id = auth()->guard('admin')->user()->id;
        $v->company_id = $request->company_id;
        $v->category_id = $request->job_category_vacancy_id;
        $v->job_type_id = $request->job_type_id;
        $v->status = "Active"; 
        $v->location_id = $request->location_id;
        $v->vacancy_name = $request->vacancy_name;
        $v->job_description = $request->job_description;
        $v->closingDate = $request->closingDate;
        $v->save();
        $idAreas_skill = skill::find($request->skill_id);
        $v->skill()->sync($idAreas_skill);
        return response::json($v);

//         $file = $request->file('filename');
//         $job = vacancy::whereId($id)->first();
//         $data = request()->except(['skill','filename']);
//         $job->update($data);
//         $job->admin_id = $request->admin_id;
//         $job->category()->associate($request->category_id);
//         $job->location()->associate($request->location_id);
//         $job->jobType()->associate($request->job_type_id);
//         $job->company()->associate($request->company_id);
//         $job->save();
//         $areas = $request->input('skill');
//         $idAreas = skill::find($areas);
//         $job->skill()->sync($idAreas);
//         if($file){
//             if(file_exists(public_path().'/JobUpload/'.$file->getClientOriginalName()))
//             {
//                // File::delete(public_path('JobUpload/'.$file->getClientOriginalName()));
//                 //dd('File is exists.');
//             }else{
// //            $data = DB::table('job_attachments')->where('job_id',$job->id)->first();
//                 // File::delete(public_path().'/JobUpload/'.$file->getClientOriginalName());
//                 $data = new jobAttachment();
//                 $data->job_id = $job->id;
//                 $data->file_name = $file->getClientOriginalName();
//                 $data->attachment_type = $file->getMimeType();
//                 $data->file_size =  $file->getSize();
//                 $data->file_type = $file->getType();
//                 $data->file_content = $file->getPathname();
//                 $file->move(public_path().'/JobUpload/', $file->getClientOriginalName());
//                 $data->save();
//                 //  dd('File is not exists.');
//             }
//         }else{

//         }
//         return redirect('/admin/job');
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
