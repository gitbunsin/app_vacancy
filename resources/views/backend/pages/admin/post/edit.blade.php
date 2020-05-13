@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\city;use App\Model\country;
@endphp
<style>
        .error {
            color : red;
        }
</style>
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            Edit Post
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="form-group {{ $errors->has('title')? 'has-error':'' }}">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" value="{{$post->title}}" name="title" placeholder="@lang('app.title')">
                                    {{-- {!! e_form_error('title', $errors) !!} --}}
                                </div>
                            </div>
            
                            <div class="form-group {{ $errors->has('post_content')? 'has-error':'' }}">
                                <div class="col-sm-12">
                                    <textarea name="post_content" id="post_content" class="form-control " rows="8">{{$post->post_content}}</textarea>
                                    {{-- {!! e_form_error('post_content', $errors) !!} --}}
                                </div>
                            </div>
            
                            <div class="form-group">
                                <div class="col-md-6">
                                    <p>@lang('app.feature_image')</p>
                                    @if($post->feature_image_thumb_uri)
                                        <div class="post-feature-image-preview-wrap mb-3 mt-3">
                                            <img src="{{asset('storage/uploads/images/blog/thumb/'.$post->feature_image)}}" />
                                        </div>
                                    @endif
                                    <input type="file" name="feature_image">
                                </div>
                            </div>
            
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">@lang('app.update_page')</button>
                                </div>
                            </div>
            
                        </form>
            
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    </div>
    <!-- /#page-wrapper -->
 <!-- /#Delete -->
 
    @endsection
    @section('scripts')
    {{-- <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}" defer></script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            CKEDITOR.replace( 'post_content' );
        });
    </script> --}}
            <script src="/js/backend/company.js"></script>
    @endsection