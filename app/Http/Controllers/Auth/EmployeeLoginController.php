<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\userEmployee;
class EmployeeLoginController extends Controller
{
    //
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



    protected $guard = 'employee';



    /**

     * Where to redirect users after login.

     *

     * @var string

     */

    protected $redirectTo = '/admin/profile';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // public function getLogin($token , $id)
    // {
    //     $user = userEmployee::where('employee_id',$id)->first();
    //     return view('frontend/pages/employee/login',compact('user'));
    // }
    public function showEmployeeLoginForm($token , $id)
    {
        $user = userEmployee::where('employee_id',$id)->first();
        return view('auth/login_employee',compact('user'));
    }

    public function login(Request $request)
    { 
        if (Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json("success")->withCookie(cookie('employee', $request->email, 3600));;
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
