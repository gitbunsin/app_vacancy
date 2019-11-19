@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <div class="pull-right">
                            <select class="form-control">
                                <option>Short By</option>
                                <option>Premium Job</option>
                                <option>Ascending</option>
                                <option>Descending</option>
                                <option>Most Popular</option>
                            </select>
                        </div>
                        <input type="text" class="form-control wide-width" placeholder="Search & type" />
                    </div>
                    <div class="card-body">
                        @php $id = ""; $name = "";@endphp
                        @if(!empty($employee))
                        @foreach($employee as $employees)
                                @php $id = $employees->id;@endphp
                        <ul id="tbl_company{{$id}}" class="list">
                                <li class="manage-list-row clearfix">
                                    <div class="job-info">
                                        <div class="job-img">

                                            @if($employees->photo != " ")
                                                <img src="{{asset('uploads/employee/'.$employees->photo)}}" class="attachment-thumbnail" alt="Academy Pro Theme">
                                            @else

                                                <img width="100%" height="100%" id="preview_image" src="{{asset('images/noimage.jpg')}}"/>
                                            @endif
                                        </div>
                                        <div class="job-details">
                                            <h3 class="job-name"><strong><a href="{{url('admin/employee/'.$employees->id.'/edit')}}"> {{$employees->first_name}} {{$employees->last_name}}</a></strong></h3>
                                            <small class="job-company"><i class="ti-mobile"></i> Mobile : {{$employees->mobile}}</small>
                                            <small class="job-company"><i class="ti-github "></i> Gender : {{$employees->gender}}</small>
                                            <small class="job-company"><i class="ti-server "></i> Supervisor : {{$employees->gender}}</small>
                                            <span class="j-type part-time">Employee ID : {{$employees->employee_id}}</span>
                                        </div>
                                    </div>
                                    <div class="job-buttons">
                                        <a href="{{url('admin/employee/'.$employees->id.'/edit')}}" class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                        <a href="#" data-id="{{$employees->id}}" onclick="deleteEmployee(this);" class="btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                    </div>
                                </li>
                        </ul>
                        @endforeach
                        @endif
                        <div class="flexbox padd-10">
                            <ul class="pagination">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="Delete" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmDeleteEmployee">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="{{$id}}" id="employee_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title"> Employee </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to delete this <b> employee</b> ?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                        <input type="submit" class="btn btn-danger" value="Yes">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">


        function deleteEmployee(x){

            let id = $(x).data("id");
            $('#Delete').modal('show');
            $('#employee_id').val(id);


        }
        $(document).ready(function () {

            $('#frmDeleteEmployee').validate({ // initialize the plugin

                submitHandler: function (form) { // for demo

                    let token = $("meta[name='csrf-token']").attr("content");

                    let id = $('#employee_id').val();

                    $.ajax(
                        {
                            url: "{{url('admin/employee')}}" +"/"+ id,
                            type: 'DELETE',
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function (data)
                            {
                                if(data == "success"){

                                    $('#tbl_company' + id).remove();
                                    $('#Delete').modal('hide');
                                    toastr.success('Employee Delete success !.', 'Success ', {timeOut: 5000})
                                }

                            },error : function (err) {

                                console.log(err);
                            }
                    });
                }
            });
        });
    </script>
@endsection


