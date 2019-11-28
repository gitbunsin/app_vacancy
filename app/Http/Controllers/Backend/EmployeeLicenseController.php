<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Model\license;
use App\Model\employeeLicense;
class EmployeeLicenseController extends Controller
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
       $s = new employeeLicense();
       $s->employee_id = $request->employee_id;
       $s->licenses_id = $request->licenses_id;
       $s->license_no = $request->license_no;
       $s->issued_date = $request->issued_date;
       $s->expiry_date = $request->expiry_date;
       $s->save();
       $s['license'] = license::where('id',$s->licenses_id)->first();
       return response::json($s);
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
        $s =  employeeLicense::find($id);
        $s['license'] = license::all();
       return response::json($s);
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
        $s =  employeeLicense::find($id);
        $s->employee_id = $request->employee_id;
        $s->licenses_id = $request->licenses_id;
        $s->license_no = $request->license_no;
        $s->issued_date = $request->issued_date;
        $s->expiry_date = $request->expiry_date;
        $s->save();
        $s['license'] = license::where('id',$s->licenses_id)->first();
        return response::json($s);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s =  employeeLicense::find($id);
        $s->delete();
        return response::json($s);
    }
}
