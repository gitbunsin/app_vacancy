<?php

function uploadFeatureImage($request){
    $imageName = null;
    if ($request->hasFile('feature_image')){
        $image = $request->file('feature_image');

        $valid_extensions = ['jpg','jpeg','png'];
        if ( ! in_array(strtolower($image->getClientOriginalExtension()), $valid_extensions) ){
            return redirect()->back()->withInput($request->input())->with('error', 'Only .jpg, .jpeg and .png is allowed extension') ;
        }
        $file_base_name = str_replace('.'.$image->getClientOriginalExtension(), '', $image->getClientOriginalName());
        $resized_thumb = Image::make($image)->resize(null, 150, function ($constraint) {
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
