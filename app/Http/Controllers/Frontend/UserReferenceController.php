<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Model\userLanguage;
use App\Model\userReference;
use Illuminate\Support\Facades\Auth;
class UserReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $reference = new userReference();
        $reference->user_id = Auth::user()->id;
        $reference->name = $request->name;
        $reference->email = $request->email;
        $reference->phone  = $request->phone;
        $reference->position = $request->position;
        $reference->save();
        return response::json($reference);
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
        $reference = userReference::find($id);
        return response::json($reference);
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
        $reference = userReference::find($id);
        $reference->user_id = Auth::user()->id;
        $reference->name = $request->name;
        $reference->email = $request->email;
        $reference->phone  = $request->phone;
        $reference->position = $request->position;
        $reference->save();
        return response::json($reference);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reference = userReference::find($id);
        $reference->delete();
        return response::json($reference);
    }
}
