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
                            <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Supervisor</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                            @php $id = ""; $name = "";@endphp
                                            @if(!empty($employee))
                                            @foreach($employee as $key =>  $employees)
                                                    @php $id = $employees->id;@endphp
                                      <tr>
                                        <td scope="row">
                                            {{$key + 1}}
                                        </td>
                                        <td><strong><a href="{{url('admin/employee/'.$employees->id.'/edit')}}"> {{$employees->first_name}} {{$employees->last_name}}</a></strong></td>
                                        @if ($employees->jobTitle)
                                                <td>{{$employees->jobTitle->name}}</td>
                                        @else
                                                <td></td>
                                        @endif
                                        <td>{{$employees->mobile}}</td>
                                        <td>{{$employees->work_email}}</td>
                                        <td></td>
                                      
                                        <td>
                                                <a href="{{url('admin/employee/'.$employees->id.'/edit')}}"  class="btn btn-primary"  title="Edit"><i class="icon-edit"></i></a>
                                                <a data-id="{{$employees->id}}" onclick="deleteEmployee(this);" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                        </td>
                                      </tr>
                                      @endforeach
                        @endif
                                    </tbody>
                                  </table>
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


