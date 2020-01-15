<?php

namespace App\Http\Controllers\Backend;

use App\Model\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $company = company::with(['city','country'])->where('admin_id',auth()->guard('admin')->user()->id)->orderBy('id' , 'DESC')->paginate(10);
      
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
        $filename = $request->file('file')->getClientOriginalName();
        $company = new Company();
        $company->company_name = $request->company_name;
        $company->admin_id =  auth()->guard('admin')->user()->id;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->zip_code = $request->zip_code;
        $company->state  = $request->state;
        $company->city_id = $request->city_id;
        $company->country_id = $request->country_id;
        $company->address = $request->address;
        $company->website_link = $request->website_link;
        $company->facebook_link = $request->facebook_link;
        $company->linkedIn_link = $request->linkedIn_link;
        $company->company_profile = $request->company_profile;
        $company->company_logo = $filename;
        $dir = 'uploads/UserCv';
        $request->file('file')->move($dir, $filename);
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
    public function updateCompany(Request $request, $id){

        $filename = $request->file('file')->getClientOriginalName();
        $company = company::find($id);
        $company->admin_id =  auth()->guard('admin')->user()->id;
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
        $company->linkedIn_link = $request->linkedIn_link;  
        $company->company_profile = $request->company_profile;
        $company->company_logo = $filename;
        $dir = 'uploads/UserCv';
        $request->file('file')->move($dir, $filename);
        $company->save();
        return response()->json($company);

    }

    public function update(Request $request, $id)
    {
        //
        $filename = $request->file('file')->getClientOriginalName();
        $company = company::find($id);
        $company->admin_id =  auth()->guard('admin')->user()->id;
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
        $company->linkedIn_link = $request->linkedIn_link;  
        $company->company_profile = $request->company_profile;
        $company->company_logo = $filename;
        $dir = 'uploads/UserCv';
        $request->file('file')->move($dir, $filename);
        $company->save();
        return response()->json($filename);
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
