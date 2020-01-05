<?php

namespace App\Http\Controllers\Auth;
use App\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Mail\SendAdminMail;

class AdminRegisterController extends Controller
{
    //
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
    protected $redirectTo = '/admin/app';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLoginForm(){

        return view('backend.auth.register');
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

    public function register(Request $request)
    {
        $email = $request->admin_email;
        $emailcheck = DB::table('admins')->where('email',$email)->count();
        if($emailcheck > 0)
        {
            return response::json('error');   
        }else 
        {
            $user = new Admin();
            $user->name = $request->admin_username;
            $user->email = $request->admin_email;
            $user->verified = 0;
            $user->email_token = str_random(40);
            $user->password = Hash::make($request->admin_password);
            $user->save();
            $admin_mail= Admin::where('id',$user->id)->first();
            // $name = 'Bunsin';
            Mail::to($admin_mail->email)->send(new SendAdminMail($admin_mail));
            return response::json('success'); 
        }
    }

    public function checkAdminMail(Request $request)
    {
        $email = $request->email;
        $emailcheck = DB::table('admins')->where('email',$email)->count();
        if($emailcheck > 0)
        {
            return response::json('error');   
        }else {
            return response::json('success');   
        }
       
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
//     protected function create(array $data)
//     {
// //        dd('Register Admin');
//         return Admin::create([
//             'name' => $data['name'],
//             'email' => $data['email'],
//             'password' => Hash::make($data['password']),
//         ]);
//     }
}
