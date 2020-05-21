<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetCandidatePassword;
use App\Mail\ResetAdminPassword;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('frontend/auth/passwords/email');
    }
    public function updateLinkRequestForm(Request $request){

        $email = $request->email;
        $rcm = DB::table('users')->where('email',$email)->first();
        if($rcm)
        {
            Mail::to($rcm->email)->send(new ResetCandidatePassword($rcm));
            return response::json('success');   
        }else {
            return response::json('error');   
        }
    }
    public function showFromCandidateResetPassword(Request $request)
    {
        $cdEmail = request()->segment(4);
        return view('frontend/auth/passwords/cd-reset',compact('cdEmail'));
    }
    public function cdResetPassword(Request $request , $emil)
    {
        $cdResetPassword = User::where('email',$request->email)->first();
        if($cdResetPassword)
        {
            $cdResetPassword->password = Hash::make($request->password);
            $cdResetPassword->save();
            return response::json('success');   
        }else {
            return response::json('error');   
        }    
    }

    //Ad Reset Password Form
    public function showFormAdminReset(Request $request)
    {
        return view('backend/auth/passwords/admin_password');
    }

    public function updateAdLinkRequestForm(Request $request){

        $email = $request->email;
        $adResetFrm = DB::table('admins')->where('email',$email)->first();
        if($adResetFrm)
        {
            Mail::to($adResetFrm->email)->send(new ResetAdminPassword($adResetFrm));
            return response::json('success');   
        }else {
            return response::json('error');   
        }
    }
    public function adResetPassword(Request $request){
        $adEmail = request()->segment(3);
        // dd($adEmail);
        return view('backend/auth/passwords/ad-reset',compact('adEmail'));
    }
    public function adReset(Request $request , $emil)
    {
        $adResetPassword = Admin::where('email',$request->email)->first();
        if($adResetPassword)
        {
            $adResetPassword->password = Hash::make($request->password);
            $adResetPassword->save();
            return response::json('success');   
        }else {
            return response::json('error');   
        }    
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
