<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\pricing;
use App\User;
use App\Model\vacancy;
use Illuminate\Support\Facades\Response;


class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function PricingSettings()
    {
        $title = trans('app.pricing_settings');
        return view('backend/pages/admin/pricing/settings-pricing', compact('title'));
    }

    public function PricingSave(Request $request){
        foreach ($request->package as $id => $input){
            $package = pricing::firstOrCreate(['id' => $id]);
            $package->update($input);
        }
        return back()->with('success', __('app.operation_success'));
    }
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($email);
        $data = [
            'usersCount' => User::count(),
            // 'totalPayments' => Payment::success()->sum('amount'),
            // 'activeJobs' => Job::active()->count(),
            'totalJobs' => vacancy::count(),
            'employerCount' => User::count(),
            // 'agentCount' => User::agent()->count(),
            // 'totalApplicants' => JobApplication::count(),

        ];


        return view('backend/pages/content',$data);
    }
    public function about(){

        return view('frontend.pages.about');
    }
    
    public function manageJob(){

        return view('backend.pages.job.index');
    }

    public function login(){

        return view('backend.auth.login');
    }

    public function register(){

        return view('backend.auth.register');
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
        //
    }
}
