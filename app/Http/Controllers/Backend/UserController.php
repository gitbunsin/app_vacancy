<?php

namespace App\Http\Controllers\Backend;
use App\Model\userCv;
use App\User;
use DB;
// use App\Model\Admin;;
use App\Model\employee;
use App\userEmployee;
use App\Model\userBookmark;
use App\Model\Country;
use App\Model\role;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;
use App\Model\City;
use App\Model\userEducation;
use App\Model\userSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
       // dd($user);
        return view('Backend/pages/candidate/index',compact('user'));
    }
    public function viewResume($id)
    {
        $user = User::with(['hobby','reference','skill','language','traning','experience','education'])->where('id',$id)->first();
        return view('frontend/pages/view-resume',compact('user'));
    }
    public function bookmark($vacancy_id)
    {
        $bookmark = new userBookmark();
        $bookmark->user_id = Auth::user()->id;
        $bookmark->vacancy_id = $vacancy_id;
        $bookmark->save();
        return response::json($bookmark);
    }
    public function bookmarkDelete(Request $request , $id)
    {
        $bookmark = userBookmark::find($id);
        $bookmark->delete();
        return response::json($bookmark);
    }
   public function resetUserPassword(Request $request , $id)
   {
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return response::json($user);
   }
   public function resetAdminPassword(Request $request , $id)
   {
        DB::table('admins')->where('id', $id)->update(
            array('password' => Hash::make($request->password),
            )
        );
        return response::json('success');
   }
    public function updateAdminProfile(Request $request , $id )
   {
    // $user =  Admin::findOrFail($id);
    if($request->hasFile('file')) {
        $filename = $request->file('file')->getClientOriginalName();
        $dir = 'uploads/UserCv';
        $request->file('file')->move($dir, $filename);
       $user =  DB::table('admins')->where('id', $id)->update(
            array('name' => $request->name,
                 'first_name' =>$request->first_name,
                 'last_name' => $request->last_name,
                 'email' =>$request->email,
                 'phone'=> $request->phone,
                 'zip' => $request->zip_code,
                 'address' => $request->address,
                 'profile' =>$filename,
                 'gender' => $request->gender,
                 'city_id' => $request->city,
                 'country_id' =>$request->country
            )
        );

    }else{

        $user = DB::table('admins')->where('id', $id)->update(
            array('name' => $request->name,
                 'first_name' =>$request->first_name,
                 'last_name' => $request->last_name,
                 'email' =>$request->email,
                 'phone'=> $request->phone,
                 'zip' => $request->zip_code,
                 'address' => $request->address,
                 'profile' => NuLL,
                 'gender' => $request->gender,
                 'city_id' => $request->city,
                 'country_id' =>$request->country
            )
        );

    }
    return response::json( $user );

   }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('hello');
        $user = userEmployee::all();
        // dd($user);
        return view('Backend/pages/admin/user/index',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new userEmployee();
        $user->username = $request->username;
        $user->email = $request->email;

        $user->verified = 0;
        $user->role_id = 3;
        $user->admin_id = auth()->guard('admin')->user()->id;
        $user->employee_id = $request->employee_id;
        $user->role_id = $request->role_id;
        $user->email_token = str_random(40);
        $user->password = Hash::make($request->password);
        $user->save();
        
        $user['employee'] = employee::where('id',$user->employee_id)->first();
        Mail::to($user->email)->send(new UserMail($user));
        return response::json($user); 
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
        $user = userEmployee::find($id);
        $user['employee'] = employee::where('id',$user->employee_id)->first();
        $user['all_employee'] = employee::all();
        $user['role'] = role::where('id',$user->role_id)->first();
        $user['all_role'] = role::all();
        return response::json($user); 
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

        $user = userEmployee::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->verified = 0;
        $user->role_id = $request->role_id;
        $user->admin_id = auth()->guard('admin')->user()->id;
        $user->employee_id = $request->employee_id;
        $user->role_id = $request->role_id;
        $user->email_token = str_random(40);
        $user->password = Hash::make($request->password);
        $user->save();
        // $admin_mail= Admin::where('id',$user->id)->first();
        // $name = 'Bunsin';
        // Mail::to($admin_mail->email)->send(new SendAdminMail($admin_mail));
        return response::json($user); 
        return response::json('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = userEmployee::find($id);
        $user->delete();
        return response::json($user);

    }
}
