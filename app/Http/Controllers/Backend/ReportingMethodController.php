<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\jobTitle;
use App\Model\ReportingMethod;
use App\Model\terminationResons;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class ReportingMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reason = terminationResons::all();
        $method = ReportingMethod::all();
        return view('backend/pages/pim/config/reporting_method',compact('reason','method'));
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
        $method = new ReportingMethod();
        $method->admin_id = auth()->guard('admin')->user()->id;
        $method->name = $request->name;
        $method->save();
        return response::json($method);
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
        $method  =  ReportingMethod::find($id);
        return response::json($method );
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
        $method =  ReportingMethod::find($id);
        $method->admin_id = auth()->guard('admin')->user()->id;
        $method->name = $request->name;
        $method->save();
        return response::json($method);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $method =  ReportingMethod::find($id);
        $method->delete();
        return response::json($method);
    }
}
