<?php

namespace App\Http\Controllers;

use App\Model\job;
use App\Model\jobAttachment;
use Illuminate\Http\Request;

class testController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('frontend.pages.job');
    }
    public function pricing()
    {

        return view('frontend.pages.pricing');
    }
    public function register()
    {
        return view('frontend.pages.register');
    }
    public function login()
    {

        return view('frontend.pages.login');
    }

    public function about(){

        return view('frontend.pages.about');
    }
    public function createResume(){

        return view('frontend.pages.create-resume');
    }
    public function mangeCandidate(){

        return view('frontend.pages.manage-candidate');
    }
    public function profileDetails()
    {

        return view('frontend.pages.user-profile');
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
