@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\city;use App\Model\country;
@endphp
<style>
    .ck-editor__editable {
    min-height: 300px;
}
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
                            Add New Post
                        </div>
                    </div>
                    <div class="card-body">
                           
                        <form action="{{url('/admin/post')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('title')? 'has-error':'' }}">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title" placeholder="@lang('app.title')">
                                    {{-- {!! e_form_error('title', $errors) !!} --}}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('post_content')? 'has-error':'' }}">
                                <div class="col-sm-12">
                                    <textarea name="post_content" id="post_content" class="form-control" rows="8">{{ old('post_content') }}</textarea>
                                    {{-- {!! e_form_error('post_content', $errors) !!} --}}
                                </div>
                            </div>
        
                            <div class="form-group">
                                <div class="col-md-6">
                                    <p>@lang('app.feature_image')</p>
                                    <input type="file" name="feature_image">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">@lang('app.save_new_page')</button>
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
    <script>
         
    var jDadd;
        ClassicEditor
        .create( document.querySelector('#post_content') )
        .then( editor => {
            // console.log(editor );
            jDadd = editor;
        } )
        .catch( error => {
            console.error( error );
        } );
    </script>
    {{-- <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}" defer></script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            CKEDITOR.replace( 'post_content' );
        });
    </script> --}}
    
            <script src="/js/backend/company.js"></script>
    @endsection