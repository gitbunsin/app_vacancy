<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController as fc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Model\post;

class PostController extends fc
{
    // var $path = ""
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = trans('app.posts');
        $posts = Post::whereType('post')->paginate(10);
        return view('backend/pages/admin/post/index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/pages/admin/post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $rules = [
            'title'     => 'required',
            'post_content'   => 'required',
        ];
        $this->validate($request, $rules);

        // $slug = unique_slug($request->title, 'Post');
        $data = [
            'admin_id'               => $user->id,
            'title'                 => $request->title,
            // 'slug'                  => $slug,
            'post_content'          => $request->post_content,
            'type'                  => 'post',
            'status'                => '1',
        ];

        $post_created = Post::create($data);

        if ($post_created){
            $feature_image = $this->uploadFeatureImage($request);

            if ($feature_image){
                $post_created->feature_image = $feature_image;
                $post_created->save();
            }

            return redirect('/admin/post')->with('success', trans('app.post_has_been_created'));
        }
        return redirect()->back()->with('error', trans('app.error_msg'));
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
        $title = trans('app.post_edit');
        $post = Post::find($id);
        return view('backend/pages/admin/post/edit',compact('title','post'));
        // return view('admin.post_edit', compact('title', 'post'));
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
        $rules = [
            'title'         => 'required',
            'post_content'  => 'required',
        ];
        $this->validate($request, $rules);
        $post = Post::find($id);
        // $show_in_header_menu = $request->show_in_header_menu ? 1:0;
        // $show_in_footer_menu = $request->show_in_footer_menu ? 1:0;
        $data = [
            'title'                 => $request->title,
            'post_content'          => $request->post_content,
            'status'                => 1,
        ];

        $post_update = $post->update($data);
        if ($post_update){
            $old_feature_imgae = $post->feature_image;

            $feature_image = $this->uploadFeatureImage($request);
            if ($feature_image){
                if ($old_feature_imgae){
                    $this->deleteFeatureImage($old_feature_imgae);
                }

                $post->feature_image = $feature_image;
                $post->save();
            }

            return redirect('/admin/post')->with('success', trans('app.page_has_been_updated'));
        }
        return redirect()->back()->with('error', trans('app.error_msg'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        $post->delete();
        $this->deleteFeatureImage($post->feature_image);
        return response()->json($post);
    }
}
