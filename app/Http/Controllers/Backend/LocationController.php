<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = location::with(['province','city','country'])->get();
        return view('backend/pages/location/index',compact('location'));
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
        $location = new location();
        $location->name = $request->name;
        $location->country_code = $request->country_code;
        $location->province_code = $request->province_code;
        $location->city_code = $request->city_code;
        $location->address = $request->address;
        $location->zip_code = $request->zip_code;
        $location->phone = $request->phone;
        $location->fax = $request->fax;
        $location->note = $request->note;
        $location->save();
        $location['country_code'] = country::where('id',$location->country_code)->first();
        $location['city_code'] = city::where('id',$location->city_code)->first();
        return response()->json($location);
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
        $location = location::find($id);
        $location['country_code'] = country::where('id',$location->country_code)->first();
        $location['city_code'] = city::where('id',$location->city_code)->first();
        $location['province_code'] = province::where('id',$location->province_code)->first();
        $location['all_city'] = city::all();
        $location['all_province'] = province::all();
        $location['all_country'] = country::all();
        return response()->json($location);
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
        $location = location::findOrFail($id);
        $location->name = $request->name;
        $location->country_code = $request->country_code;
        $location->province_code = $request->province_code;
        $location->city_code = $request->city_code;
        $location->address = $request->address;
        $location->zip_code = $request->zip_code;
        $location->phone = $request->phone;
        $location->fax = $request->fax;
        $location->note = $request->note;
        $location->save();
        $location['country_code'] = country::where('id',$location->country_code)->first();
        $location['city_code'] = city::where('id',$location->city_code)->first();
        return response()->json($location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = location::find($id);
        $location->delete();
        return response()->json($location);
    }
}
