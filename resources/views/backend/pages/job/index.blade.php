@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
<!-- /row -->
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
            <a href="{{url('admin/job/create')}}" class=" pull-right btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Add Attachment"> Add </a>
            <input type="text" class="form-control wide-width" placeholder="Search & type" />
        </div>
        <div class="card-body">
                <table class="table" id='company_id'>
                        <thead>
                            <tr>
                            <th scope="col">#No</th>
                            <th scope="col">Vacancy Name</th>
                            <th scope="col">Closing Date</th>
                            <th scope="col">Career Level</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>  
                        @foreach ($job as $key => $jobs)
                            <tr id="tbl_company">
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{$jobs->vacancy_name}}</td>
                                <td>{{$jobs->closingDate}}</td>
                                <td>{{$jobs->career_level}}</td>
                                <th>
                                    <a onclick="Edit();"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                    <a onclick="Delete();" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                </th>
                            </tr>
                            @endforeach                                
                        </tbody>
                        </table>
        </div>
    </div>
</div>
</div>
<!-- /row -->
</div>
</div>
<!-- Modal: modalPoll -->
<!-- Send Message -->
<div id="ModalAddVacacny" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <form method="POST" action="{{url('admin/job/')}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div class="modal-header theme-bg">
            <h4 class="modal-title">Vacancy</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
                <div class="card-body">
                        <div class="row">
                                <div class="col-lg-6">
                                        <label> Job Title </label>
                                        <input  name="education_name" id="education_name" type="text" class="form-control">
                                    </div>
                              <div class="col-lg-6">
                                  <label> Vacancy Name </label>
                                  <input  name="education_name" id="education_name" type="text" class="form-control">
                              </div>
                              <div class="col-lg-6">
                                    <label> Hiring Manager </label>
                                    <input  name="education_name" id="education_name" type="text" class="form-control">
                                </div>
                          <div class="col-lg-6">
                              <label> Number of Positions </label>
                              <input  name="education_name" id="education_name" type="text" class="form-control">
                          </div>
                          <div class="col-lg-12">
                                <label>Description</label>
                                <textarea  name="description" id="description" class="form-control" cols='5' rows='5'></textarea>
                            </div>
                            
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-danger" value="Save">
        </div>
    </form>
</div>
</div>
</div>
<!-- Modal: modalPoll -->
<!-- /#page-wrapper -->

@endsection
@section('scripts')
    <script src="{{asset('js/backend/vacancy.js')}}"></script>
@endsection