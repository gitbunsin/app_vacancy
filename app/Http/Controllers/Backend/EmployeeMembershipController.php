<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\membership;
use App\Model\currency;
use App\Model\employeeMembership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
class EmployeeMembershipController extends Controller
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
        $m = new EmployeeMembership();
        $m->employee_id = $request->employee_id;
        $m->currency_id = $request->currency_id;
        $m->membership_id = $request->membership_id;
        $m->amount = $request->subscription_amount;
        $m->paid_by = $request->membership_paid_by;
        $m->commence_date = $request->commence_date;
        $m->renewal_date = $request->renewal_date;
        $m->save();
        $m['currency'] = currency::where('id',$m->currency_id)->first();
        $m['membership'] = membership::where('id',$m->membership_id)->first();
        return response::json($m);
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
        $m =  EmployeeMembership::find($id);
        $m['all_currency'] = currency::all();
        $m['all_membership'] = membership::all();
        return response::json($m);
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
        $m =  EmployeeMembership::find($id);
        $m->employee_id = $request->employee_id;
        $m->currency_id = $request->currency_id;
        $m->membership_id = $request->membership_id;
        $m->amount = $request->subscription_amount;
        $m->paid_by = $request->membership_paid_by;
        $m->commence_date = $request->commence_date;
        $m->renewal_date = $request->renewal_date;
        $m->save();
        $m['currency'] = currency::where('id',$m->currency_id)->first();
        $m['membership'] = membership::where('id',$m->membership_id)->first();
        return response::json($m);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $m =  EmployeeMembership::find($id);
        $m->delete();
        return response::json($m);
    }
}
