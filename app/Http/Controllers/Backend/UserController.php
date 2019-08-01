<?php

namespace App\Http\Controllers\Backend;
use App\Model\userCv;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function userCV(Request $request ,$id)
    {

        $file = $request->file('filename');
        $data = new userCv();
        $data->user_id = auth()->user()->id;
        $data->file_name = $file->getClientOriginalName();
        $data->attachment_type = $file->getMimeType();
        $data->file_size =  $file->getSize();
        $data->file_type = $file->getType();
        $data->file_content = $file->getPathname();
        $file->move(public_path().'/UserCV/', $file->getClientOriginalName());
        $data->save();
        return redirect('/user-profile');

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

        $data = request()->except(['_token','_method']);
        User::where('id', '=', $id)->update($data);
        return redirect('/user-profile');
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
