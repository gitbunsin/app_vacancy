@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\vacancy;
    use App\Model\Company;
@endphp
<style>
    .skill_id_edit{
    width: 100% !important;
    padding: 0;
}
.select2-container {
    width: 100% !important;
    padding: 0;
}
</style>
@php
    use App\Model\JobCategory;
    use App\Model\employee;
    use App\Model\JobType;
    use App\Model\skill;
    use App\Model\location;
@endphp

<div class="container-fluid">
<!-- /row -->
<div class="row">
<div class="col-md-12 col-sm-12">
    <div class="card">

        <div class="card-header">
            <div class="pull-right">
                    <a onclick="AddVacancy();" class="btn btn-primary"  title="Payment"><i class="ti-plus"></i> Add Vacancy</a> &nbsp;&nbsp;&nbsp;
               
            </div>
            {{-- <a onclick="AddVacancy();" class=" pull-right btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Add Attachment"> Add </a> --}}
            {{-- <a href="{{url('admin/job/create')}}" class=" pull-right btn btn-cancel manage-btn" title="Add Attachment"> <i class="ti-plus"></i> Add </a> --}}
           
            <input type="text" class="form-control wide-width" placeholder="Search & type" />
        </div>
        <div class="card-body">
                <table class="table" id='tbl_interview'>
                        <thead>
                            <tr>
                                <th scope="col">#No</th>
                                <th scope="col">Vacancy Name</th>
                                <th scope="col">Candidate</th>
                                <th scope="col">Interviewer</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Status</th>    
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($interviews as $key => $interview)
                            <tr id="tr_interview{{$interview->id}}">
                                <th scope="row">{{$key + 1}}</th>
                                <td>
                                    {{$interview->vacancy->vacancy_name}}
                                </td>
                                <td>
                                    {{$interview->candidate->first_name .' '.$interview->candidate->last_name}}
                                </td>
                                <td></td>
                                <td>{{$interview->interview_date}}</td>
                                <td>{{date('h:i A', strtotime($interview->interview_time))}}</td>
                                <td style="color:cadetblue;">{{$interview->status}}</td>
                                <th>
                                    <a onclick="EditInterview({{$interview->id}});" class="btn btn-primary"  title="Edit"><i class="icon-edit"></i></a>
                                    <a onclick="DeleteInterview({{$interview->id}});" class="btn btn-danger"  title="Delete"><i class="ti-trash"></i></a>
                                </th>
                            </tr>
                        @endforeach      
                        <tbody>  
                        </tbody>
                </table>
        </div>
    </div>
</div>
</div>
</div>
<div id="ModalAddInterview" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmUpdateInterview">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="interview_id" id="interview_id" value=""/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Interview </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                    <div class="col-sm-4">
                                        <label>Interview Name</label>
                                        <input required name="interview_name" id="interview_name" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Date.</label>
                                        <input type="date" name="interview_date" data-toggle="datepicker" class="form-control" id="interview_date">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Time</label>
                                        <input type="time" name="interview_time"  class="form-control" id="interview_time">
                                    </div>
                      
                                    <div class="col-md-12">
                                            <label>Interviewer</label>
                                            <select class="form-control"  name="employee_id" id="employee_id">
                                                    <option value="" required > -- plz select interviewer -- </option>
                                                    @php $employees = employee::all();@endphp
                                                    @foreach($employees as $employee)
                                                         <option value="{{$employee->id}}"> {{$employee->first_name .' '.$employee->last_name}}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                    <div class="col-md-12">
                                            <label>Status</label>
                                            <select class="form-control"  name="interview_status" id="interview_status">
                                                    <option value="" required > -- plz select status -- </option>
                                                    @php $status = array("Interview","Pass","Fail","Reject","Offer");@endphp
                                                    @foreach($status as $statuses)
                                                         <option value="{{$statuses}}"> {{$statuses}}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Note</label>
                                            <textarea name="note" id="note" type="text" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="/js/backend/interview.js"></script>
@endsection