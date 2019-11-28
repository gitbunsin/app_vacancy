<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\employeeLanguage;
use App\Model\language;
use Illuminate\Support\Facades\Response;
class EmployeeLanguageController extends Controller
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
       $l = new employeeLanguage();
       $l->employee_id = $request->employee_id;
       $l->language_id = $request->language_id;
       $l->fluency = $request->fluency_id;
       $l->competency = $request->competency_id;
       $l->competency = $request->competency_id;
       $l->comments = $request->comments;
       $l->save();
       $l['language'] = language::where('id',$l->language_id)->first();
       return response::json($l);
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
        $l = employeeLanguage::find($id);
        $l['all_language'] = language::all();
        return response::json($l);   
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
       $l = employeeLanguage::find($id);
       $l->employee_id = $request->employee_id;
       $l->language_id = $request->language_id;
       $l->fluency = $request->fluency_id;
       $l->competency = $request->competency_id;
       $l->competency = $request->competency_id;
       $l->comments = $request->comments;
       $l->save();
       $l['language'] = language::where('id',$l->language_id)->first();
       return response::json($l);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $l = employeeLanguage::find($id);
        $l->delete();
        return response::json($l);
    }
}
