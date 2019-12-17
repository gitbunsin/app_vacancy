<?php

namespace App\Http\Controllers\Backend;
use App\Model\userCv;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

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
    public function updateUserProfile($id){

        return response::json('success');
    }
    public function userCV(Request $request ,$id)
    {
       // dd('hello');
        // $extension = $request->file('file');

        // return response::json($extension);
        // $filename = $request->file('resume_id')->getClientOriginalName();
        // $user = userCv::find($id);
        // if($user){

        //     $isCheck = userCv::findOrFail($id);
        //     $isCheck->file_name = $filename ;
        //     $isCheck->attachment_type = $request->file('file')->getMimeType();
        //     $isCheck->file_size =  $request->file('file')->getSize();
        //     $isCheck->file_type = $request->file('file')->getType();
        //     $isCheck->file_content = $request->file('file')->getPathname();
        //     $isCheck->user()->associate(auth()->user()->id);
        //     $dir = 'uploads/userCvs';

        //     $request->file('file')->move($dir, $filename);
        //     $isCheck->save();

        //     return response()->json("exit");

        // }else{

        //     $notCheck = new userCv();
        //     $notCheck->file_name  = $filename;
        //     $notCheck->attachment_type = $request->file('file')->getMimeType();
        //     $notCheck->file_size =  $request->file('file')->getSize();
        //     $notCheck->file_type = $request->file('file')->getType();
        //     $notCheck->file_content = $request->file('file')->getPathname();
        //     $notCheck->user()->associate(auth()->user()->id);
        //     $dir = 'uploads/userCvs';
        //     $request->file('file')->move($dir, $filename);
        //     $notCheck->save();
        //     return response()->json("add");

        // }
        // $file = $request->file('filename');
        // $data = new userCv();
        // $data->user_id = auth()->user()->id;
        // $data->file_name = $file->getClientOriginalName();
        // $data->attachment_type = $file->getMimeType();
        // $data->file_size =  $file->getSize();
        // $data->file_type = $file->getType();
        // $data->file_content = $file->getPathname();
        // $file->move(public_path().'/UserCV/', $file->getClientOriginalName());
        // $data->save();
        // return redirect('/user-profile');

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
