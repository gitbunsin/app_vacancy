@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\company;
    use App\Model\vacancy;
    $user = auth()->guard('admin')->user();
@endphp
<style>
    .error{
        color:red !important;
    }
    .select2-container {
        width: 100% !important;
        padding: 0;
    }
</style>
<div class="container-fluid">
    <!-- /row -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                            @if ($user->role_id == 1)
                            {{-- <a onclick="AddCandidate();" class=" pull-right btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Add Attachment"> Add </a> --}}
                                <a onclick="AddCandidate();" class="btn btn-primary"  title="Payment"><i class="ti-plus"></i> Add Candidate</a>
                            @endif
                        </div>
                    <input type="text" class="form-control wide-width" placeholder="Search & type" />
                </div>
                <table class="table" id='tbl_canidate'>
                        <thead>
                          <tr>
                            <th scope="col">#No</th>
                            <th scope="col">Candidate</th>
                            <th scope="col">Vacancy</th>
                            <th scope="col">Apply Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>  
                            @foreach ($candidate as $key => $candidates)
                                 @foreach($candidates->vacancy as $vacancies)
                                <tr id="tr_candidate{{$candidates->id}}">
                                    <th>{{$key + 1}}</th>
                                    <td><a href="{{url('admin/candidate/'.$candidates->id.'/edit')}}"> <strong>{{$candidates->first_name .' '. $candidates->last_name}}</strong></a></td>
                                    <td>{{$vacancies->vacancy_name}}</td>
                                    <td>{{$vacancies->pivot->applied_date}}</td>
                                    <td><b class="badge bg-success">{{$vacancies->pivot->status}}</b></td>
                                    <th>
                                        <a onclick="Edit(this);" data-candidate_id="{{$candidates->id}}" data-vacancy_id={{$vacancies->id}}  class="btn btn-primary" ><i class="icon-edit"></i></a>
                                        <a onclick="Delete({{$candidates->id}});" class="btn btn-danger"><i class="ti-trash"></i></a>
                                    </th>                            
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                      </table>
                <div class="flexbox padd-10">
                    <ul class="pagination">
                        {{-- {{ $candidate->links() }} --}}
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
</div>
     
    <!-- /#//Edit-->

    <div id="ModalEditCandidate" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="frmEditCandidate">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" name="id" id="candidate_id_edit" value=""/>
                        <div class="modal-header theme-bg">
                            <h4 class="modal-title">Candidate </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                        <div class="col-sm-4">
                                            <label>First Name</label>
                                            <input required name="first_name_edit" id="first_name_edit" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Middle Name .</label>
                                            <input  name="middle_name_edit" id="middle_name_edit" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Last Name</label>
                                            <input required required name="last_name_edit" id="last_name_edit" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Email</label>
                                            <input required  name="email_edit" id="email_edit" required  type="email" class="form-control">
        
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Contact Number</label>
                                            <input required  name="phone_edit" id="phone_edit" required  type="number" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Vacancy Name</label>
                                            <?php $vacancy  = vacancy::all(); ?>
                                            <select name="vacancy_edit"  id="vacancy_edit" class="form-control" required>
                                                    <option value=""> -- please select vacancy -- </option>
                                                @foreach($vacancy as $vacancies)
                                                    <option value="{{$vacancies->id}}"> {{$vacancies->vacancy_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Company Name</label>
                                            <?php $company  = company::all(); ?>
                                            <select name="company_edit" id="company_edit" class="form-control" required>
                                                <option value=""> -- please select company -- </option>
                                                @foreach($company as $companies)
                                                    <option value="{{$companies->id}}"> {{$companies->company_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4 m-clear">
                                            <label>Date of Application</label>
                                            <input name="date_application_edit" id="date_application_edit" type="text" data-toggle="datepicker" class="form-control">
                                        </div>
                                        <div class="col-sm-4 m-clear">
                                            <label> Resume </label>
                                            <input name="file_name_edit" id="file_name_edit" type="file" class="form-control">
                                        </div>
                                        <div class="col-sm-12">
                                                <label>Candidate Status</label>
                                                @php $statuses = array("Application Initiated"," Shortlisted","Interview");@endphp
                                                <select name="candidate_status" id="candidate_status" class="form-control" required>
                                                    <option value=""> -- please select status -- </option>
                                                    @foreach($statuses as $status)
                                                        <option value="{{$status}}"> {{$status}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="col-sm-4" id="div_name">
                                                <label>Interview Name</label>
                                                <input  name="interview_name" id="interview_name" type="text" class="form-control">
                                            </div>
                                        <div class="col-sm-4" id="div_date">
                                            <label>Date.</label>
                                            <input type="date" name="interview_date" id="interview_date" data-toggle="datepicker" class="form-control" id="date">
                                        </div>
                                        <div class="col-sm-4" id="div_time">
                                            <label>Time</label>
                                            <input type="time" name="interview_time"  class="form-control" id="interview_time">
                                        </div>

                                        <div class="col-sm-12 m-clear">
                                                <label> Old Resume </label>
                                                <input required name="resume_edit" id="resume_edit" type="text" disabled class="form-control">
                                            </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Comment</label>
                                                <textarea name="comment_edit" id="comment_edit" type="text" rows="5" class="form-control"></textarea>
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

    
    <!-- /#//Delete-->
<div id="DeleteCandidate" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmDeleteCandidate">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="candidate_id" value=""/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Candidate </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to reject this candidate <b></b> ?</label>
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


    <!-- /#//Create-->
<div id="ModalAddCandidate" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmAddCandidate">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="candidate_id" value=""/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Candidate </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                    <div class="col-sm-4">
                                        <label>First Name</label>
                                        <input required name="first_name" id="first_name" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Middle Name .</label>
                                        <input required name="middle_name" id="middle_name" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Last Name</label>
                                        <input required required name="last_name" id="last_name" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Email</label>
                                        <input required  name="email" id="email" required  type="email" class="form-control">
    
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Contact Number</label>
                                        <input required  name="phone" id="phone" required  type="number" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Vacancy Name</label>
                                        <?php $vacancy  = vacancy::all(); ?>
                                        <select name="vacancy"  id="vacancy" class="form-control" required>
                                                <option value=""> -- please select vacancy -- </option>
                                            @foreach($vacancy as $vacancies)
                                                <option value="{{$vacancies->id}}"> {{$vacancies->vacancy_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Company Name</label>
                                        <?php $company  = company::all(); ?>
                                        <select name="company" id="company" class="form-control" required>
                                            <option value=""> -- please select company -- </option>
                                            @foreach($company as $companies)
                                                <option value="{{$companies->id}}"> {{$companies->company_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 m-clear">
                                        <label>Date of Application</label>
                                        <input required id="date_application" name="date_application" type="date" class="form-control">
                                    </div>
                                    <div class="col-sm-4 m-clear">
                                        <label> Resume </label>
                                        <input required name="file_name" id="file_name" type="file" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                            <label>Status</label>
                                            <select class="form-control"  name="CandidateStatus" id="CandidateStatus">
                                                    <option value="" required > -- plz select status -- </option>
                                                    @php $status = array("Application Initiated"," Shortlisted","Interview");@endphp
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


<div id="SendMessage" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="#" id="frmSendCandidateMail">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="modal-header theme-bg">
                    <h4 class="modal-title">Send Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>To : </label>
                        <input disabled type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Subject : </label>
                        <textarea class="form-control big-height" id="subject" name="subject"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-send" value="Send">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /#Sending Message Success -->
<div id="SendingMessageSuccess" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="#">
                <div class="modal-header theme-bg success">
                    <h4 class="modal-title">Candidate </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Message has been sent to Candidate email  <b><span  id="email_to"></span></b> !</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Yes">
                </div>
            </form>
        </div>
    </div>
</div>


<div id="CheckStatus" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="#"  id="frmCandidate">
                    <input type="hidden" value="" id="candidateId"/>
                    <input type="hidden" value="" id="jobId"/>
                <div class="modal-header theme-bg">
                    <h4 class="modal-title">Candidate </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Status  </label>
                        <select class="form-control"  name="CandidateStatus" id="CandidateStatus">
                            <option value="" required > -- plz select status -- </option>
                            @php $status = array("Application Initiated"," Shortlisted","Interview");@endphp
                            @foreach($status as $statuses)
                                 <option value="{{$statuses}}"> {{$statuses}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="Date">
                        <label>Date</label>
                        <input type="date" name="Date" data-toggle="datepicker" class="form-control" id="date">
                    </div>
                    <div class="form-group" id="Time">
                        <label>Time</label>
                        <input type="time" name="Time"  class="form-control" id="time">
                    </div>
                    <div class="form-group" id="employeeDiv">
                        <label> Employee  </label>
                        <select class="form-control select2" multiple="multiple"  name="employee" id="employee">
                            <option value="" required > -- plz select employee  -- </option>
                            @php use App\Model\employee;$employee = Employee::all();@endphp
                            @foreach($employee as $employees)
                                <option value="{{$employees->id}}">{{$employees->first_name}}  {{$employees->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="Note" class="form-group">
                        <label>Note  </label>
                        <textarea id="note" class="form-control big-height "></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                   <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="StatusMessage" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="#">
                <div class="modal-header theme-bg">
                    <h4 class="modal-title">Candidate </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Candidate has been assigned  <strong  id="assignStatus"> </strong> ?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input  id="btn_close" type="button" class="btn btn-default" data-dismiss="modal" value="Yes">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="/js/backend/candidate.js"></script>
@endsection
