<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\vacancy;
use App\Model\jobAttachment;
use App\Model\skill;
use App\Admin;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use App\Model\candidate_vacancy;
use App\Model\userBookmark;
class HomeUserController extends Controller
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
    public function myProfile(){
        return view('frontend.pages.candidate.my-profile');
    }
    public function myDashboard(){
        return view('frontend.pages.candidate.my-dashboard'); 
    }
    public function viewProfile(){
        $user = User::with(['hobby','reference','skill','language','traning','experience','education'])->where('id',Auth::user()->id)->first();
        // dd($user);
        return view('frontend.pages.candidate.view-profile',compact('user')); 
    }
    public function accountSetting()
    { 
        return view('frontend.pages.candidate.account_setting'); 
    }
    public function uploadResume()
    { 
        $user_cv = userCv::where('user_id',Auth::user()->id)->first();
        return view('frontend.pages.candidate.upload-resume',compact('user_cv')); 
    }
    public function myBookmark()
    {
        $bookmarks = userBookmark::with(['user','vacancy'])->where('user_id',Auth::user()->id)->get();
        // dd($bookmarks);
        return view('frontend/pages/candidate/bookmark',compact('bookmarks')); 
    }
    public function myResume(){
        $id = Auth::user()->id;
        $user_cv = userCv::where('user_id',$id)->first();
        $user = User::with(['hobby','reference','skill','language','traning','experience','education'])->where('id',$id)->first();
        // $user_bookmark = userBookmark::where('user_id',Auth::user()->id)->get();
        return view('frontend.pages.candidate.my-resume'); 
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
        //
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
