<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PayGrade;
use App\Model\currency;
use Illuminate\Support\Facades\Response;

class PayGradeController extends Controller
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
        $payGrade = new payGrade();
        $payGrade->name = $request->name;
        $payGrade->admin_id = auth()->guard('admin')->user()->id;
        $payGrade->save();
        $currency_id = currency::find($request->currency_id);
        $payGrade->currency()->attach($currency_id, [
            'max_salary' => $request->max_salary , 
            'min_salary' => $request->min_salary
            ]);
        $payGrade['currency'] = currency::find($currency_id);
        $payGrade['payGrade'] = payGrade::with('currency')->where('id',$payGrade->id)->first();
        return response::json($payGrade);
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
        //
        $payGrade = payGrade::with('currency')->where('id',$id)->first();
        $payGrade['all_currency'] = currency::all();
        return response::json($payGrade);

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
        
       $payGrade = PayGrade::find($id);
       $payGrade->name = $request->name;
       $payGrade->save();
       $currency_id = currency::find($request->currency_id);
       $payGrade->currency()->updateExistingPivot($currency_id, array(
           'max_salary' => $request->max_salary,
           'min_salary' => $request->min_salary
           )
        
        );

       return response::json($payGrade);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $payGrade = PayGrade::find($id);
        $payGrade->delete();
        return response::json($payGrade);
    }
}
