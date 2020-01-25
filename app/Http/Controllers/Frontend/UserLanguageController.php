<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Model\userLanguage;
use App\Model\Language;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserLanguageController extends Controller
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
        $language = new userLanguage();
        $language->user_id = Auth::user()->id;
        $language->language_id = $request->language_id;
        $language->level  = $request->level_id;
        $language->save();
        $language["lang"] = language::where('id',$language->language_id)->first();
        return response::json($language);
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
        $language =  userLanguage::find($id);
        $language["all_lang"] = language::all();
        return response::json($language);
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
        $language = userLanguage::find($id);
        $language->user_id = Auth::user()->id;
        $language->language_id = $request->language_id;
        $language->level  = $request->level_id;
        $language->save();
        $language["lang"] = language::where('id',$language->language_id)->first();
        return response::json($language);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = userLanguage::find($id);
        $language->delete();
        return response::json($language);
    }
}
