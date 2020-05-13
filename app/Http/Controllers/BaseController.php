<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class BaseController extends Controller
{

    public function uploadFeatureImage($request){

        $imageName = null;
        if ($request->hasFile('feature_image')){
            $image = $request->file('feature_image');

            $valid_extensions = ['jpg','jpeg','png'];
            if ( ! in_array(strtolower($image->getClientOriginalExtension()), $valid_extensions) ){
                return redirect()->back()->withInput($request->input())->with('error', 'Only .jpg, .jpeg and .png is allowed extension') ;
            }
            $file_base_name = str_replace('.'.$image->getClientOriginalExtension(), '', $image->getClientOriginalName());
            $resized_thumb = Image::make($image)->resize(null, 50, function ($constraint) {
                $constraint->aspectRatio();
            })->stream();

            $imageName = strtolower(time().str_random(5).'-'.str_slug($file_base_name)).'.' . $image->getClientOriginalExtension();

            try{
                Storage::disk('uploads')->putFileAs('uploads/images/blog/full/', $image, $imageName);
                Storage::disk('uploads')->put('uploads/images/blog/thumb/'.$imageName, $resized_thumb->__toString());
            } catch (\Exception $e){
                return redirect()->back()->withInput($request->input())->with('error', $e->getMessage()) ;
            }
        }

        return $imageName;
    }
    public function deleteFeatureImage($image = null){
        if ( ! $image){
            return;
        }
        Storage::disk('uploads')->delete('uploads/images/blog/full/'.$image);
        Storage::disk('uploads')->delete('uploads/images/blog/thumb/'.$image);
    }

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
