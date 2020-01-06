@extends('backend.layouts.master')
@section('content')
<style>
        .interviewer_id_edit{
        width: 100% !important;
        padding: 0;
    }
    .interviewer_id{
        width: 100% !important;
        padding: 0; 
    }
    .select2-container {
        width: 100% !important;
        padding: 0;
    }
    </style>
@php
  
    use App\Model\employee;
    use App\Model\vacancy;
    use App\Model\company;
    use App\Model\JobCategory;
    use App\Model\interview;
    use App\Model\skill;
    
@endphp

        {{ csrf_field() }}
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <!-- General Company Information  -->
                <div class="card">
                    <div class="card-header">
                        <h4><i class="ti-gift "></i> Candidate Info : <strong>{{$candidate->last_name . ' ' . $candidate->first_name  }}</strong></h4>
                    </div>

                    <div class="card-body">
                            <div class="modal-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#info" aria-controls="home" role="tab" data-toggle="tab"> Candidate Info</a></li>
                                            <li role="presentation"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"> View Resume</a></li>

                                            <li role="presentation"><a href="#interview" aria-controls="messages" role="tab" data-toggle="tab">Schulde an Interview</a></li>
                                            <li role="presentation"><a href="#note" aria-controls="messages" role="tab" data-toggle="tab">Add a Note</a></li>
                                            <li role="presentation"><a href="#history" aria-controls="messages" role="tab" data-toggle="tab">Candidate History</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs">
                                
                                            <div role="tabpanel" class="tab-pane fade in active" id="info">
                                                    <form action="" id="frmEditCandidate">
                                                    <input type="hidden" value="{{$candidate->id}}" id="candidate_id_edit">
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <div class="card-body">
                                                            <div class="row">
                                                                   
                                                                    <div class="col-sm-4">
                                                                        <label>First Name</label>
                                                                        <input value="{{$candidate->first_name}}" name="first_name_edit" id="first_name_edit" type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>Middle Name .</label>
                                                                        <input value="{{$candidate->middle_name}}" name="middle_name_edit" id="middle_name_edit" type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>Last Name</label>
                                                                        <input value="{{$candidate->last_name}}" required required name="last_name_edit" id="last_name_edit" type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>Email</label>
                                                                        <input value="{{$candidate->email}}"   name="email_edit" id="email_edit" required  type="email" class="form-control">
                                    
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>Contact Number</label>
                                                                        <input value="{{$candidate->phone}}"   name="phone_edit" id="phone_edit" required  type="number" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>Vacancy Name</label>
                                                                        <?php $vacancy  = vacancy::all(); ?>
                                                                        <select name="vacancy_edit"  id="vacancy_edit" class="form-control" required>
                                                                                <option value=""> -- please select vacancy -- </option>
                                                                            @foreach($vacancy as $vacancies)
                                                                              <option value="{{ $vacancies->id }}" {{ $vacancies->id == $candidate->vacancy[0]->id ? 'selected' : '' }}>{{ $vacancies->vacancy_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>Company Name</label>
                                                                        <?php $company  = company::all(); ?>
                                                                        <select name="company_edit" id="company_edit" class="form-control" required>
                                                                            <option value=""> -- please select company -- </option>
                                                                            @foreach($company as $companies)
                                                                            <option value="{{ $companies->id }}" {{ $companies->id == $candidate->company_id ? 'selected' : '' }}>{{ $companies->company_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-4 m-clear">
                                                                        <label>Date of Application</label>
                                                                        <input required value="{{$candidate->vacancy[0]->pivot->applied_date}}" id="date_application_edit" name="date_application_edit" data-toggle="datepicker" type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <label>Status</label>
                                                                            <select class="form-control"  name="candidate_status" id="candidate_status">
                                                                                    <option value="" required > -- plz select status -- </option>
                                                                                    @php $status = array("Application Initiated","Shortlist","Interview","Pass","Fail","Reject","Offer");@endphp
                                                                                    @foreach($status as $statuses)
                                                                                    <option value="{{ $statuses }}" {{ $statuses == $candidate->vacancy[0]->pivot->status ? 'selected' : '' }}>{{ $statuses}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                    <div class="pull-right">
                                                            <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                                                            <input type="submit" class="btn btn-primary" value="Save">
                                                        </div>
                                                    </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fades" id="description">
                                                <form action="">
                                                    <div class="card-body">
                                                            <div class="row">
                                                                    {{-- @foreach ($candidate as $candidates) --}}
                                                                    @foreach ($candidate->candidateAttachment as $candidateAttachments)
                                                                    <div id="candidate_attachment" class="ul_id{{$candidateAttachments->id}} list" >
                                                                            <li class="manage-list-row clearfix">   
                                                                                    <div class="job-info">
                                                                                            <div class="job-details">
                                                                                                <small class="job-company"><i class="ti-time"></i><b>Resume</b> : <a href="">{{$candidateAttachments->file_name}}</a> </small>
                                                                                                <small class="job-company"><i class="ti-location-pin"></i><b>Attachment_type </b>: {{$candidateAttachments->attachment_type}}</small>         
                                                                                                <small class="job-company"><i class="ti-file"></i><b>File Size </b>: {{$candidateAttachments->file_size}}</small>                                                                            
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="job-buttons">
                                                                                            <a onclick="EditCandidateResume({{$candidate->id}});" class="btn btn-primary"><i class="icon-edit"></i></a>
                                                                                        </div>
                                                                                </li>
                                                                    </div>
                                                                    @endforeach
                                                                    {{-- @endforeach --}}
                                                    
                                                            </div>
                                                    </div>
                                                   
                                                    </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fades" id="note">
                                                    <form action="#" id="frmCandidateNote">
                                                        <input type="hidden" id="candidate_note_id" value="{{$candidate->id}}">
                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <div class="card-body">
                                                            <div class="row">
                                                                    <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Note</label>
                                                                                <textarea  name="candidate_note" id="candidate_note" type="text" rows="5" class="form-control">
                                                                                    {{$candidate->note}}      
                                                                                </textarea>
                                                                            </div>
                                                                        </div>
                                                            </div>
                                                    </div>
                                                    <div class="pull-right">
                                                            <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                                                            <input type="submit" class="btn btn-primary" value="Save">
                                                        </div>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fades" id="history">
                                                    <form action="">
                                                    <div class="card-body">
                                                        @foreach ($candidate->candidateHistory as $histories)
                                                        @php
                                                            $user_admin = DB::table('admins')->where('id',$histories->admin_id)->first();
                                                            // $user_admin = DB::table('admins')->where('id',$histories->admin_id)->get();
                                                        @endphp
                                                            <div class="list">
                                                                    <li class="manage-list-row clearfix">
                                                                            <div class="job-info">
                                                                                <div class="job-details">
                                                                                        <small class="job-company"><i class="ti-time"></i><b>Status : </b> {{$histories->status}}</small>
                                                                                    <small class="job-company"><i class="ti-time"></i><b>Date : </b> {{$histories->performed_date}}</small>
                                                                                    <small class="job-company"><i class="ti-location-pin"></i><b>Performance By :</b> {{$user_admin->name}} </small>            
                                                                                                                                            
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                  
                                                </form>
                                            </div>
                                           
                                            <div role="tabpanel" class="tab-pane fades" id="interview">
                                                    <div class="card-header">
                                                            <div class="pull-right">
                                                                <a onclick="assignInterview({{$candidate->id}});" class="btn btn-primary"  title="Payment"><i class="ti-plus"></i> Assign Interview</a> &nbsp;&nbsp;&nbsp;  
                                                            </div>
                                                            <input type="text" class="form-control wide-width" placeholder="Search & type" />
                                                        </div>
                                                    <form action="">
                                                    <div class="card-body">
                                                          
                                                            <table class="table" id='tbl_interview'>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#No</th>
                                                                            <th scope="col">Vacancy Name</th>
                                                                            <th scope="col">Interviewer</th>
                                                                            <th scope="col">Date</th>
                                                                            <th scope="col">Time</th>
                                                                            <th scope="col">Status</th>    
                                                                            <th scope="col">Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    @foreach ($candidate->interview as $key => $interviews)
                                                                        <tr id="tr_interview{{$interviews->id}}">
                                                                            <th scope="row">{{$key + 1}}</th>
                                                                            <td>
                                                                                {{$candidate->vacancy[0]->vacancy_name}}
                                                                            </td>
                                                                            @php
                                                                                 $interview = interview::with('employee')->where('id',$interviews->id)->get();
                                                                            @endphp
                                                                            <td>
                                                                                @foreach ( $interview as $item)
                                                                                          @foreach ($item->employee as $employees)
                                                                                              {{$employees->first_name .' '.$employees->last_name}} , 
                                                                                        @endforeach
                                                                                @endforeach
                                                                            </td>
                                                                        
                                                                            <td>{{$interviews->interview_date}}</td>
                                                                            <td>{{date('h:i A', strtotime($interviews->interview_time))}}</td>
                                                                            <td><b class="badge bg-success">{{$interviews->status}}</b></td>
                                                                            <th>
                                                                                <a onclick="EditInterview({{$interviews->id}});" class="btn btn-primary"  title="Edit"><i class="icon-edit"></i></a>
                                                                                <a onclick="DeleteInterview({{$interviews->id}});" class="btn btn-danger"  title="Delete"><i class="ti-trash"></i></a>
                                                                            </th>
                                                                        </tr>
                                                                    @endforeach    
                                                                    <tbody>  
                                                                    </tbody>
                                                            </table>
                                                    </div>
                                                </form>
                                            </div>
                                           
                                        </div>
                            </div>
                                   
                                 
                            </div>
                </div>
        
            </div>
        </div>
        <!-- /row -->
    </div>
    </div>  
    <!-- /Candidate Resume -->
    <div id="ModalCandidateEditResume" class="modal fade">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                    <form id="frmCandidateResume">
                        <input type="hidden" id="candidate_resume_id" value="">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="modal-header theme-bg">
                                <h4 class="modal-title">Candidate Resume</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                        <div class="row">
                                        <div class="col-sm-12">
                                                <label>Resume</label>
                                                <input  name="resume_file" id="resume_file" type="file" class="form-control">
                                            </div>
                                            <div class="col-sm-12">
                                                    <label>Old Resume</label>
                                                    <input disabled  name="old_resume" id="old_resume" type="text" class="form-control">
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


    <div id="ModalDeleteInterview" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="frmDeleteInterview">
                        <input type="hidden" id="interview_delete_id" value="">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="modal-header theme-bg">
                                <h4 class="modal-title">Interview</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Are You Sure to Delete this Interview?</label>
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
    {{-- //Add  --}}
    <div id="ModalAssignInterview" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="frmAddInterview">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" name="interview_id" id="interview_id" value=""/>
                        <input type="hidden" name="candidate_id" id="candidate_id" value=""/>
                        <input type="hidden" name="vacancy_id" id="vacancy_id" value="{{$candidate->vacancy[0]->id}}">
                        <div class="modal-header theme-bg">
                            <h4 class="modal-title">Interview </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                        <div class="col-sm-4">
                                            <label>Interview Name</label>
                                            <input  name="interview_name" id="interview_name" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Date.</label>
                                            <input type="date" name="interview_date" data-toggle="datepicker" class="form-control" id="interview_date">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Time</label>
                                            <input type="time" name="interview_time"  class="form-control" id="interview_time">
                                        </div>
                          
                                        <div class="col-lg-12">
                                                <label> Interviewer</label>
                                                <?php $employee = employee::all(); ?>
                                                <select class="multiple-skill form-control" id="interviewer_id" name="interviewer_id[]" multiple="multiple">
                                                    @foreach($employee as $employees)
                                                        <option value="{{$employees->id}}">{{$employees->first_name . ' ' . $employees->last_name}}</option>
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
        {{-- //Edit  --}}
    <div id="ModalUpdateInterview" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="frmUpdateInterview">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" name="interview_id_edit" id="interview_id_edit" value=""/>
                        <div class="modal-header theme-bg">
                            <h4 class="modal-title">Interview </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                        <div class="col-sm-4">
                                            <label>Interview Name</label>
                                            <input  name="interview_name_edit" id="interview_name_edit" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Date.</label>
                                            <input type="date" name="interview_date_edit" data-toggle="datepicker" class="form-control" id="interview_date_edit">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Time</label>
                                            <input type="time" name="interview_time_edit"  class="form-control" id="interview_time_edit">
                                        </div>
                                        <div class="col-lg-12">
                                                <label> Interviewer</label>
                                                <?php $employee = employee::all(); ?>
                                                <select class="multiple-skill form-control" id="interviewer_id_edit" name="interviewer_id_edit[]" multiple="multiple">
                                                    @foreach($employee as $employees)
                                                        <option value="{{$employees->id}}">{{$employees->last_name . ' ' . $employees->first_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        <div class="col-md-12">
                                                <label>Status</label>
                                                <select class="form-control"  name="interview_status_edit" id="interview_status_edit">
                                                        <option value="" required > -- plz select status -- </option>
                                                        @php $status = array("Interview","Pass","Fail","Reject","Offer");@endphp
                                                        @foreach($status as $statuses)
                                                             <option value="{{$statuses}}"> {{$statuses}}</option>
                                                        @endforeach
                                                    </select>
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
    <!-- /#page-wrapper -->
@endsection
@section('scripts')
    <script src="/js/backend/interview.js"></script>
    <script src="/js/backend/candidate.js"></script>
@endsection
