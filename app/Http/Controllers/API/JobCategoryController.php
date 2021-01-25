<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\JobCategory;
class JobCategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobCategory = JobCategory::all();
        return $this->sendResponse($jobCategory->toArray(), 'JobCategory retrieved successfully.');
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
        $jobCategory = JobCategory::create([
                'admin_id' => $request->admin_id,
                'name' =>  $request->name,
                ]);
         return $this->sendResponse($jobCategory->toArray(), 'JobCategory created successfully.');
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
//     return response()->json([
//         'name' => $request->name,
//     ]);
         $jobCategory = JobCategory::where("id",$id)->update([
                       'admin_id' => 1,
                       'name' =>  $request->name,
                       ]);
         return $this->sendResponse($jobCategory->toArray(), 'JobCategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $jobCategory = JobCategory::findOrFail($id);
       $jobCategory->delete();
       return $this->sendResponse($jobCategory->toArray(), 'JobCategory deleted successfully.');
    }
}
