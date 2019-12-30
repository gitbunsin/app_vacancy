<?php

namespace App\Http\Controllers\Backend;

use App\Model\company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $company = company::with(['city','country'])->orderBy('id' , 'DESC')->paginate(10);
        //dd($company);
        return view('backend/pages/company/index',compact('company'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.pages.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->company_name = $request->company_name;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->zip_code = $request->zip_code;
        $company->state  = $request->state;
        $company->city_id = $request->city_id;
        $company->country_id = $request->country_id;
        $company->address = $request->address;
        $company->website_link = $request->website_link;
        $company->facebook_link = $request->facebook_link;
        $company->google_link = $request->google_link;
        $company->twitter_link = $request->twitter_link;
        $company->linkedIn_link = $request->linkedIn_link;
        $company->pinterest_link = $request->pinterest_link;
        $company->instagram_link = $request->instagram_link;
        $company->save();
        return response()->json($company);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = company::find($id);
        return view('backend/pages/company/show',compact('company'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = company::find($id);
        return response()->json($company);
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
        $company = company::find($id);
        $company->company_name = $request->company_name;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->zip_code = $request->zip_code;
        $company->state  = $request->state;
        // $company->city_id = $request->city_id;
        // $company->country_id = $request->country_id;
        $company->address = $request->address;
        $company->website_link = $request->website_link;
        $company->facebook_link = $request->facebook_link;
        $company->google_link = $request->google_link;
        $company->twitter_link = $request->twitter_link;
        $company->linkedIn_link = $request->linkedIn_link;
        $company->pinterest_link = $request->pinterest_link;
        $company->instagram_link = $request->instagram_link;
        $company->save();
        return response()->json($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $company = company::find($id);
            $company->delete();
            return response()->json($company);
        //
    }
}
