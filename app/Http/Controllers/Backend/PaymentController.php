<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Model\payment;
use App\Model\pricing;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payment = payment::where('admin_id',auth()->guard('admin')->user()->id)->get();
        return view('backend/pages/admin/payment/index',compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = pricing::all();
        return view('backend/pages/admin/payment/create',compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pricing = pricing::find($request->package_id);
        $Payer = auth()->guard('admin')->user();
        $payment = new payment();
        $payment->name = $Payer->name;
        $payment->email = $Payer->email;
        $payment->admin_id = $Payer->id;
        $payment->package_id = $request->package_id;
        $payment->amount = $pricing->price;
        $payment->account_number = $request->account_number;
        $payment->bank_swift_code = $request->swift_code;
        $payment->branch_name = $request->branch_name;
        $payment->branch_address = $request->branch_address;
        $payment->account_name = $request->account_name;
        if($Payer->role_id == 1){
            $payment->status = "success";
        }else{
            $payment->status = "pending";
        }
        $payment->save();
        return response::json($payment);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        if ( ! $id){
            abort(404);
        }
        $title = __('app.checkout');
        $package = pricing::find($id);
        return view('backend/pages/admin/payment/checkout',compact('title', 'package'));
    }
    public function confirmPayment($id)
    {
        return view('backend/pages/admin/payment/confirm_payment');
    }
    public function invoice($id)
    {
        $package = pricing::find($id);
        // dd($packages);
        return view('backend/pages/admin/payment/invoice',compact('package'));
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
        $payment = payment::find($id);
        return view('backend/pages/admin/payment/show',compact('payment'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = payment::find($id);
        $payment->delete();
        return response::json($payment);
    }
}
