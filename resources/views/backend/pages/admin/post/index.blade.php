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
                        <div class="pull-right">
                            <a href="{{url('/admin/post/create')}}" class="btn btn-primary"  data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-plus"></i></a>
                        </div>
                        <input type="text" class="form-control wide-width" placeholder="Search & type" />
                    </div>
                    <div class="card-body">
                        @if($posts->count())

                <table class="table">
                        <thead>
                            <th>No</th>
                            <th>@lang('app.title')</th>
                            <th>@lang('app.thumb')</th>
                            <th>#</th>
                        </thead>
                    @foreach($posts  as $key => $post) 
                            <tr id="post_id{{$post->id}}">
                                <td>{{$key + 1 }}</td>
                                <td>{{$post->title}}</td>
                                <td width="50">
                                    <img src="{{asset('storage/uploads/images/blog/thumb/'.$post->feature_image)}}" class="card-img" />
                                </td>
                                <td>
                                    <a  href="{{url('/admin/post/'.$post->id.'/edit')}}" class="btn btn-primary"><i class="icon-edit"></i></a>
                                    <a onclick="DeletePost({{$post->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                    {{-- <a href="{{url('/admin/post/'.$post->id.'/edit')}}" class="btn btn-primary"><i class="la la-pencil-square"></i> @lang('app.edit')</a> --}}
                                </td>
                            </tr>
                    @endforeach

                </table>

                {!! $posts->links() !!}
            @endif
                        <div class="flexbox padd-10">
                            <ul class="pagination">
                                <li class="page-item">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    </div>
    <div id="frmDeleteVacancy" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmPost">
                    <input type="hidden" id="post_id" value="">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="modal-header theme-bg">
                            <h4 class="modal-title">posts</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Are You Sure to Delete this post?</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
 <!-- /#Delete -->
 
    @endsection
    @section('scripts')
        <script>
            function DeletePost(id) {
    $('#frmDeleteVacancy').modal('show');
    $('#post_id').val(id);
}
            $('#frmPost').validate({
    submitHandler: function (form) {
        var id = $('#post_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/post" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#frmDeleteVacancy').modal('hide');
                $('#post_id'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
});
        </script>
    @endsection