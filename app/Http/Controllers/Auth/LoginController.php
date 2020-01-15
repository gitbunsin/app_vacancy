<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user-profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Create a new controller instance.
     *
     * login page users
     */
    public function login(Request $request)
    {
        // $credentials = [
        //     'username' => $request['username'],
        //     'password' => $request['password'],
        // ];
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'verified'=> 1])) {

            return response()->json("success");
        }else {
            return response()->json("error");
        }
    }

    public function logout() {

        Auth::logout();
        Auth::guard('admin')->logout();
        return redirect('/home');

    }
}
