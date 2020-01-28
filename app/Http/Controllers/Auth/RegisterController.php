<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Admin;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/app';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    //check mail 
    public function Checkemail(Request $request)
    {
        $email = $request->email;
        $emailcheck = DB::table('users')->where('email',$email)->count();
        if($emailcheck > 0)
        {
            return response::json('error');   
        }else {
            return response::json('success');   
        }
       
    }
    //Register 
    public function register(Request $request)
    {
        $email = $request->seeker_email;
        $emailcheck = DB::table('users')->where('email',$email)->count();
        if($emailcheck > 0)
        {
            return response::json('error');   
        }else 
        {
            $user = new User();
            $user->first_name = $request->seeker_first_name;
            $user->last_name = $request->seeker_last_name;
            $user->name = $request->seeker_last_name.' ' .$request->seeker_last_name;
            $user->email = $request->seeker_email;
            $user->verified = 0;
            $user->email_token = str_random(40);
            $user->password = Hash::make($request->seeker_password);
            $user->save();
            $user_mail = User::where('id',$user->id)->first();
            // $name = 'Bunsin';
            Mail::to($user_mail->email)->send(new SendMailable($user_mail));
            return response::json('success'); 
        }
    }
    public function verifyUserMail($id , $token)
    {
        $user = User::find($id);
        $user->verified = 1;
        $user->save();
        return view('frontend/pages/notification')->with('success', 'Login Successfully!');
    }

    public function verifyAdminMail($id , $token)
    {
        $user = Admin::find($id);
        $user->verified = 1;
        $user->save();
        return view('frontend/pages/notification')->with('success', 'Login Successfully!');
    }
}
