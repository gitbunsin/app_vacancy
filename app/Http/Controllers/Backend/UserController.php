<?php

namespace App\Http\Controllers\Backend;
use App\Model\userCv;
use App\User;
use DB;
use App\Model\Country;
use App\Model\City;
use App\Model\userEducation;
use App\Model\userSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;

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
    public function skill(Request $request)
    {
        $skill = new userTraningSkill();
        $skill->user_id = $request->user_id;
        $skill->school  = $request->school;
        $skill->study = $request->study;
        $skill->degree = $request->degree;
        $skill->country_id  = $request->country;
        $skill->city_id = $request->city;
        $skill->year = $request->year;
        $skill->year_to = $request->year_to;
        $skill->save();
        return response::json($skill);
    }
    public function skillDelete($id)
    {
        $skill =  userTraningSkill::find($id);
        $skill->delete();
        return response::json($skill);
    }
    public function skillEdit($id)
    {
        $skill =  userTraningSkill::find($id);
        $skill['all_country'] = Country::all();
        $skill['all_city'] = City::all();
        return response::json($skill);
    }

    public function skillUpdate(Request $request , $id)
    {
        $skill = userTraningSkill::find($id);
        $skill->user_id = $request->user_id;
        $skill->school  = $request->school;
        $skill->study = $request->study;
        $skill->degree = $request->degree;
        $skill->country_id  = $request->country;
        $skill->city_id = $request->city;
        $skill->year = $request->year;
        $skill->year_to = $request->year_to;
        $skill->save();
        return response::json($skill);
    }



    public function education(Request $request)
    {
        $education = new userEducation();
        $education->user_id = $request->user_id;
        $education->school  = $request->school;
        $education->study = $request->study;
        $education->degree = $request->degree;
        $education->country_id  = $request->country;
        $education->city_id = $request->city;
        $education->year = $request->year;
        $education->year_to = $request->year_to;
        $education->save();
        return response::json($education);
    }

    public function educationDelete($id)
    {
        $education =  userEducation::find($id);
        $education->delete();
        return response::json($education);
    }
    public function educationUpdate(Request $request , $id)
    {
        $education =  userEducation::find($id);
        $education->user_id = $request->user_id;
        $education->school  = $request->school;
        $education->study = $request->study;
        $education->degree = $request->degree;
        $education->country_id  = $request->country;
        $education->city_id = $request->city;
        $education->year = $request->year;
        $education->year_to = $request->year_to;
        $education->save();
        return response::json($education);
    }

    public function educationEdit($id)
    {
        $education =  userEducation::find($id);
        $education['all_country'] = Country::all();
        $education['all_city'] = City::all();
        return response::json($education);
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
