<?php

namespace App\Http\Controllers\Backend;
use App\Model\userCv;
use App\User;
use DB;
use App\Model\userBookmark;
use App\Model\Country;
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
    public function resetAdminPassword(Request $request , $id)
   {
        DB::table('admins')->where('id', $id)->update(
            array('password' => Hash::make($request->password),
            )
        );
        return response::json('success');
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
//        dd(auth()->user()->id);

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
        //dd($request->all());

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
        //
    }
}
