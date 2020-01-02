@extends('backend.layouts.master')
@section('content')
@php
      use App\Model\payPeriod;
      use App\Model\educations ;
      use App\Model\skill;
      use App\Model\language; 
      use App\Model\license; 
      use App\Model\currency;
      use App\Model\membership;
      use App\Model\country;
      use App\Model\nationality;
      use App\Model\terminationResons;
@endphp
    <input type="hidden" value="{{$employee->id}}" id="employee_id">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 col-md-5 col-sm-8 col-xs-9">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item active text-center">
                            Personal Details
                        </a>
                        <a href="#" class="list-group-item text-center">
                             Contact Details
                        </a>
                        <a href="#" class="list-group-item text-center">
                             Emergency Contact
                        </a>
                        <a href="#" class="list-group-item text-center">
                             Job
                        </a>
                        <a href="#" class="list-group-item text-center">
                             Salary
                        </a>
                        <a href="#" class="list-group-item text-center">
                            Report To
                        </a>
                        <a href="#" class="list-group-item text-center">
                            Qualifications
                        </a>
                        <a href="#" class="list-group-item text-center">
                            Membership
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                    <!-- flight section -->
                    <div class="bhoechie-tab-content active">
                        <div class="card-header">
                            <h4><i class="fa fa-group " ></i> Info : <strong> {{$employee->first_name}} {{$employee->last_name}} </strong> </h4>
                        </div>
                        <form action="#" id="frmEmployeeDetails">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-md-4">
                                <div class="change-photo">
                                        <div class="user-image">
                                            @if($employee->photo)
                                                <img class="img-circle" id="preview" src="{{url('/uploads/employee/'.$employee->photo)}}" width="150px" height="150px"/><br/>
                                            @else
                                                <img class="img-circle" id="preview" src="{{asset('images/noimage.jpg')}}" width="150px" height="150px"/><br/>
                                            @endif
                                            <input type="file"id="image" style="display: none;"/>
                                        </div>
                                        <br/>
                                        <div class="upload-photo">
                                            <label class="btn btn-primary" for="upload-photo">
                                                    <a style="color:white;" id="upload-photo" href="javascript:changeProfile()">Change</a>
                                            </label>
                                            <label class="btn btn-danger" for="upload-photo">
                                                    <a style="color: white" href="javascript:removeImage()">Remove</a>
                                                </label>
                                            <span class="max-size">Max 20 MB</span>
                                        </div>
                                    </div></div><div class="col-md-4"></div><div class="col-md-4"></div>
                                    <div class="col-sm-4">
                                        <label>First Name</label>
                                        <input value="{{$employee->first_name}}" name="first_name" id="first_name"  type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Middle Name .</label>
                                        <input name="middle_name" id="middle_name" value="{{$employee->middle_name}}" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Last Name</label>
                                        <input name="last_name" id="last_name" value="{{$employee->last_name}}" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Employee ID </label>
                                        <input id="employee_id" readonly name="employee_id" type="text" value="{{str_pad($employee->employee_id, 1, '0', STR_PAD_LEFT)}}" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Other ID </label>
                                        <input name="other_id" id="other_id" value="{{$employee->other_id}}" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Gender </label>
                                            <select class="form-control" name="gender" id="gender">
                                                    <option value="" required > -- plz select Gender -- </option>
                                                    <option value="male" {{ $employee->gender == 'male' ? 'selected':'' }}>Male</option>
                                                    <option value="female" {{ $employee->gender == 'female' ? 'selected':'' }}>Female</option>     
                                            </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label> Marital Status </label>
                                        <select class="form-control" name="marital_status" id="marital_status">
                                                <option value="" required > -- plz select Status -- </option>
                                                <option value="single" {{ $employee->marital_status == 'single' ? 'selected':'' }}>Single</option>
                                                <option value="married" {{ $employee->marital_status == 'married' ? 'selected':'' }}>Married</option>     
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                            <label>BirthDay </label>
                                            <input name="birthday_id" id="birthday_id" value="{{$employee->birthday}}" type="date" class="form-control">
                                        </div>
                                    <div class="col-sm-4">
                                        <label> Nationality</label>
                                        <select class="form-control"  name="nationality_id" id="nationality_id">
                                            <option value="" required > -- plz select nationality -- </option>
                                            @php $nationality = nationality::all(); @endphp
                                            @foreach($nationality as $nationalities)
                                                 <option value="{{ $nationalities->id }}" {{ ( $nationalities->id == $employee->nationality_id) ? 'selected' : '' }}> {{ $nationalities->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br/>
                                <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ URL::previous() }}">Back</a>
                                        <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                        <br/>
                       
                    </div>
                    <!-- train section -->
                    <!-- Contact Details  -->
                    <div class="bhoechie-tab-content">
                        <div class="card-header">
                            <h4><i class="fa fa-send-o " ></i><strong> Contact Details </strong> </h4>
                        </div>
                        <form id="frmContactDetails" action="#">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Address Street 1</label>
                                        <input value="{{$employee->street1}}" name="street1" id="street1" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Address Street 2  .</label>
                                        <input name="street2" id="street2"  value="{{$employee->street2}}" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>City .</label>
                                        <input name="city_code" id="city_code" value="{{$employee->city_code}}" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>State/Province</label>
                                        <input value="{{$employee->province_code}}" name="province_code" id="province_code" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Zip/Postal Code .</label>
                                        <input name="zip_code" id="zip_code" value="{{$employee->zip_code}}" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Country .</label>
                                        <input name="country_code" id="country_code" value="{{$employee->country_code}}" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Home Telephone</label>
                                        <input value="{{$employee->telephone}}" name="telephone" id="telephone" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Mobile </label>
                                        <input value="{{$employee->mobile}}" name="mobile" id="mobile"  type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Work Telephone </label>
                                        <input  value="{{$employee->work_telephone}}" name="work_telephone" id="work_telephone"  type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Work Email</label>
                                        <input value="{{$employee->work_email}}" name="work_email" id="work_email" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Other Email.</label>
                                        <input value="{{$employee->other_email}}" name="other_email" id="other_email"  type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            {{-- </div> --}}
                            <div class="pull-right">
                                    <a href="{{ URL::previous() }}"><button class="btn btn-primary">Back</button></a>
                                    <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            <br/>
                            </div>
                        
                        </form>
                    </div>
                    <!-- hotel search -->
                    <div class="bhoechie-tab-content">
                        <div class="card-header">
                                <a onclick="ShowEmergencyContacts(this);" data-id="{{$employee->id}}"  onclick="AddCandidate();" class="btn btn-primary pull-right "  title="Payment"><i class="ti-plus"></i> Emergency Contacts</a>
                            <br>
                            <h4><i class="fa fa-group"></i> Assigned Emergency Contacts</h4>
                        </div>
                        <div class="card-body" id="body_emergency">
                            @foreach($employee->emergencyContact as $contact)
                                <ul id="ul_emergency_contact" class="ul_id{{$contact->id}} list">
                                    <li class="manage-list-row clearfix">
                                        <div class="job-info">
                                            <div class="job-details">
                                                <h3 class="job-name"></h3>
                                                <small class="job-company"><b>Name :</b>{{$contact->name}}</small>
                                                <small class="job-company"></i><b>Relationship :</b>{{$contact->relationship}}</small>
                                                <small class="job-update"><i class="ti-time"></i><b>Mobile : </b>{{$contact->mobile}}</small>
                                                <span class="j-type part-time"></span>
                                            </div>
                                        </div>
                                        <div class="job-buttons">
                                            <a href="#" onclick="EditEmergencyContact({{$contact->id}});"  class="btn btn-primary"  title="Edit"><i class="ti-pencil-alt"></i></a>
                                            <a href="#" onclick="DeleteEmergencyContact({{$contact->id}});" class="btn btn-danger"  title="Remove"><i class="ti-close"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="bhoechie-tab-content">
                            <div class="modal-body">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#job" aria-controls="home" role="tab" data-toggle="tab"> Job</a></li>
                                            <li role="presentation"><a href="#contract" aria-controls="description" role="tab" data-toggle="tab">  Employment Contract</a></li>
                                            <li role="presentation"><a href="#terminate" aria-controls="description" role="tab" data-toggle="tab">  Terminate</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs">
                                            <div role="tabpanel" class="tab-pane fade in active" id="job">
                                                   
                                                    <div class="card-body">
                                                            <div class="row">
                                                                    <form id="frmEmployeeJobDetails" action="#">
                                                                            <input type="hidden" value="{{$employee->id}}" id="employee_id_job">
                                                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label> Job Title  </label>
                                                                                        <select class="form-control"  name="employee_job_title_id" id="employee_job_title_id">
                                                                                            <option value="" required > -- plz select job titles -- </option>
                                                                                            @php use App\Model\jobTitle;$jobTitle = jobTitle::all();@endphp
                                                                                            @foreach($jobTitle as $jobTitles)
                                                                                                 <option value="{{ $jobTitles->id }}" {{ ( $jobTitles->id == $employee->job_title_id) ? 'selected' : '' }}> {{ $jobTitles->name }} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                  
                                                                                    <div class="col-sm-4">
                                                                                        <label> Employment Status  </label>
                                                                                        <select class="form-control"  name="employee_status_id" id="employee_status_id">
                                                                                            <option value="" required > -- plz select status -- </option>
                                                                                            @php use App\Model\EmploymentStatus;$status = EmploymentStatus::all();@endphp
                                                                                            @foreach($status as $statuses)
                                                                                                 <option value="{{ $statuses->id }}" {{ ( $statuses->id == $employee->emp_status) ? 'selected' : '' }}> {{ $statuses->name }} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label> Job Category  </label>
                                                                                        <select class="form-control"  name="employee_job_category_id" id="employee_job_category_id">
                                                                                            <option value="" required > -- plz select Category -- </option>
                                                                                            @php use App\Model\jobCategory;$jobCategory = jobCategory::all(); @endphp
                                                                                            @foreach($jobCategory as $jobCategories)
                                                                                                 <option value="{{ $jobCategories->id }}" {{ ( $jobCategories->id == $employee->job_category_id) ? 'selected' : '' }}> {{ $jobCategories->name }} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label>Joined Date</label>
                                                                                        <input name="join_date" value="{{$employee->joined_date}}" data-toggle="datepicker"  id="join_date" type="text" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label> Sub Unit</label>
                                                                                        <select class="form-control"  name="sub_unit_id" id="sub_unit_id">
                                                                                            <option value="" required > -- plz select Sub Unit -- </option>
                                                                                            @php $subUnit = array("IT Department ","Accounting");@endphp
                                                                                            @foreach($subUnit as $subUnits)
                                                                                                <option value="{{$subUnits}}"> {{$subUnits}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <label> Location </label>
                                                                                        <select class="form-control"  name="location_id" id="location_id">
                                                                                            <option value="" required > -- plz select Location -- </option>
                                                                                            @php use App\Model\location;$location = location::all();@endphp
                                                                                            @foreach($location as $locations)
                                                                                                 <option value="{{ $locations->id }}" {{ ( $locations->id == $employee->location_id) ? 'selected' : '' }}> {{ $locations    ->name }} </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                              
                                                                                <br/>
                                                                                <div class="pull-right">
                                                                                        <a href="{{ URL::previous() }}"><button class="btn btn-primary">Back</button></a>
                                                                                        <button type="submit" class="btn btn-success">Save</button>
                                                                                        
                                                                                </div>
                                                                                <br/>
                                                                            </div>
                                                                        </form>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="contract">
                                                    <form action="" id="frmEditCandidate">
                                                    <input type="hidden" value="" id="candidate_id_edit">
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <div class="card-body">
                                                           
                                                            <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label>Start Date </label>
                                                                        <input data-toggle="datepicker"  name="telephone" id="telephone" type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label>End Date </label>
                                                                        <input  data-toggle="datepicker"  name="mobile" id="mobile"  type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label> Contract Details  </label>
                                                                        <input name="work_telephone" id="work_telephone"  type="file" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="pull-right">
                                                                        <button type="submit" class="btn btn-success">Save</button>
                                                                </div>
                                                                <br/>   
                                                    </div>
                                                  
                                                   
                                                    </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="terminate">
                                                <div class="card-header">
                                                    {{-- <a href="#" onclick="ShowModalBasicSalary()" class=" pull-right btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Add Attachment"> Add </a> --}}
                                                    <a onclick="ShowTerminateReason()" class="btn btn-primary pull-right "  title="Payment"><i class="ti-plus"></i>Termnate Employment</a>
                                                    <br/> <br/>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="div_terminate">
                                                             @if ($employee->terminate)
                                                             @php
                                                                 $reason = terminationResons::find($employee->terminate->termination_id);
                                                             @endphp
                                                                <div id="candidate_attachment{{$employee->terminate->id}}" class="ul_id{{$employee->terminate->id}} list" >
                                                                        <li class="manage-list-row clearfix">   
                                                                                <div class="job-info">
                                                                                        <div class="job-details">
                                                                                            <small class="job-company"><i class="ti-time"></i><b>Reason</b> : {{ $reason->name}} </small>
                                                                                            <small class="job-company"><i class="ti-location-pin"></i><b>Date </b>: {{$employee->terminate->date}} </small>         
                                                                                            <small class="job-company"><i class="ti-file"></i><b>Note</b>: {{$employee->terminate->note}} </small>                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="job-buttons">
                                                                                        <a onclick="EditTerminateReason({{$employee->terminate->id}});" class="btn btn-primary"><i class="icon-edit"></i></a>
                                                                                        <a onclick="DeleteTerminateReason({{$employee->terminate->id}});" class="btn btn-danger"><i class="ti-trash"></i></a>
                                                                                    </div>
                                                                            </li>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        
                                                        </div>
                                                </div>
                                                  
                                                </div>
                                        </div>
                                        </div>
                            </div>   
                    </div>
                    <div class="bhoechie-tab-content">
                      <div class="card-header">
                            {{-- <a href="#" onclick="ShowModalBasicSalary()" class=" pull-right btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Add Attachment"> Add </a> --}}
                            <a onclick="ShowModalBasicSalary()"  onclick="AddCandidate();" class="btn btn-primary pull-right "  title="Payment"><i class="ti-plus"></i> Add Salary</a>
                            <br>
                            <h4><i class="fa fa-group"></i> Basic Salary</h4>
                        </div>
                        <table class="table" id="tbl_basic_salary">
                            <thead>
                              <tr>
                                <th scope="col">#No</th>
                                <th>Salary Component</th>
                                <th>Pay Frequency</th>
                                <th>Currency</th>
                                <th>Amount</th>
                                <th>Comments</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($employee->salary as $key => $salaries)
                            
                              <tr id="tr_basic_salary{{$salaries->id}}">
                                  <th scope="row">{{$key + 1}}</th>
                                  <td>{{$salaries->salary_component}}</td>
                                 
                                  @php
                                    $p = payPeriod::where('id',$salaries->payperiod_id)->first();
                                     @endphp
                                           <td>
                                                 {{$p ->name}}
                                          </td>
                                  <td>{{$basicSalary->currency->name}}</td>
                                  <td>{{$salaries->basic_salary}}</td>
                                  <td>{{$salaries->comments}}</td>
                                  <th>
                                        <a onclick="EditSalary({{$salaries->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                        <a onclick="DeleteEditSalary({{$salaries->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                  </th>
                                </tr>     
                                @endforeach                  
                            </tbody>
                          </table>
                    </div>
                    <div class="bhoechie-tab-content">
                            <div class="modal-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#info" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-group"></i> Assigned Supervisors</a></li>
                                            <li role="presentation"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"><i class="fa fa-group"></i> Assigned Subordinates</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs">
                                
                                            <div role="tabpanel" class="tab-pane fade in active" id="info">
                                                    <form action="" id="frmEditCandidate">
                                                    <input type="hidden" value="" id="candidate_id_edit">
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <div class="card-body">
                                                            <div class="card-header">
                                                                    <a onclick="ShowModalReporto()" onclick="AddCandidate();" class="btn btn-primary pull-right "  title="Payment"><i class="ti-plus"></i> Add Supervisors</a>
                                                                <br/> <br/>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                    <table class="table" id="tbl_assigned_supervisors">
                                                                            <thead>
                                                                              <tr>
                                                                                <th scope="col">#No</th>
                                                                                <th>Salary Component</th>
                                                                                <th>Pay Frequency</th>
                                                                                <th>Currency</th>
                                                                                <th>Amount</th>
                                                                                <th>Comments</th>
                                                                                <th>Action</th>
                                                                              </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                    <tr id="tr_basic_salary">
                                                                                        <th scope="row"></th>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <th>
                                                                                              <a onclick="EditSalary();"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                                              <a onclick="DeleteSalary();" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                                                        </th>
                                                                                      </tr>     
                                                                            </tbody>
                                                                          </table>
                                                            </div>
                                                    </div>
                                                    </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="description">
                                                    <form action="" id="frmEditCandidate">
                                                    <input type="hidden" value="" id="candidate_id_edit">
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <div class="card-body">
                                                            <div class="card-header">
                                                                    <a onclick="ShowModalReporto()" onclick="AddCandidate();" class="btn btn-primary pull-right "  title="Payment"><i class="ti-plus"></i> Add Subordinates</a>
                                                                {{-- <a href="#" onclick="ShowModalReporto()" class=" pull-right btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Add Attachment"> Add Subordinates</a> --}}
                                                                <br/> <br/>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                    <table class="table" id="tbl_assigned_supervisors">
                                                                            <thead>
                                                                              <tr>
                                                                                <th scope="col">#No</th>
                                                                                <th>Salary Component</th>
                                                                                <th>Pay Frequency</th>
                                                                                <th>Currency</th>
                                                                                <th>Amount</th>
                                                                                <th>Comments</th>
                                                                                <th>Action</th>
                                                                              </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                    <tr id="tr_basic_salary">
                                                                                        <th scope="row"></th>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <th>
                                                                                              <a onclick="EditSalary();"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                                              <a onclick="DeleteSalary();" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                                                        </th>
                                                                                      </tr>     
                                                                            </tbody>
                                                                          </table>
                                                            </div>
                                                    </div>
                                                    </form>
                                            </div>
                                        </div>
                            </div>        
                    </div>
                    <div class="bhoechie-tab-content">
                        <div class="demo">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tab" role="tabpanel">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Work Experience</a></li>
                                            <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Education</a></li>
                                            <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Skills</a></li>
                                            <li role="presentation"><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab">Languages</a></li>
                                            <li role="presentation"><a href="#License" aria-controls="messages" role="tab" data-toggle="tab">License</a></li>
                                            <li role="presentation"><a href="#attachments" aria-controls="messages" role="tab" data-toggle="tab">Document</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs">
                                            <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                                <div class="card-header">
                                                    <a onclick="ShowModalExpericen()" onclick="AddCandidate();" class="btn btn-primary pull-right "  title="Payment"><i class="ti-plus"></i> Add Experience</a><br/>
                                                    <br>
                                                </div>
                                                <table class="table" id="tbl_work_experience">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">#No</th>
                                                        <th>Company </th>
                                                        <th>Job title</th>
                                                        <th>From </th>
                                                        <th>To</th>
                                                        <th>Comments</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($employee->workexperience as $key => $item)
                
                                                      <tr id="tr_work_experience{{$item->id}}">
                                                          <th scope="row">{{$key + 1}}</th>
                                                          <td>{{$item->company_name}}</td>
                                                          @php
                                                                  $j = jobTitle::where('id',$item->job_title_id)->first();
                                                          @endphp
                                                          <td>
                                                                {{$j->name}}
                                                         </td>
                                                          <td>{{$item->from}}</td>
                                                          <td>{{$item->to}}</td>
                                                          <td>{{$item->comments}}</td>
                                                          <th>
                                                                <a onclick="EditExperience({{$item->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                <a onclick="DeleteExperience({{$item->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                          </th>
                                                        </tr>     
                                           
                                                        @endforeach
                                                    </tbody>
                                                  </table>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="Section2">
                                                <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                                    <div class="card-header">
                                                        <a onclick="ShowEmployeeEducation()"  class="btn btn-primary pull-right "  title="Payment"><i class="ti-plus"></i> Add Education</a><br/>
                                                        <br>
                                                    </div>
                                                    <table class="table" id="tbl_employee_education">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">#No</th>
                                                            <th>Level </th>
                                                            <th>Year </th>
                                                            <th>Score </th>
                                                            <th>Action</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($employee->employeeEducation as $key => $item)
                                                          <tr id="tr_employee_education{{$item->id}}">
                                                              <th scope="row">{{$key + 1}}</th>
                                                              @php
                                                              $edx = educations::where('id',$item->education_id)->first();
                                                              @endphp
                                                              <td>{{$edx->name}}</td>
                                                              <td>{{$item->year}}</td>
                                                              <td>{{$item->score}}</td>
                                                              <th>
                                                                    <a onclick="EditEmployeeEducation({{$item->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                    <a onclick="DeleteEmployeeEducation({{$item->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                              </th>
                                                            </tr>     
                                                            @endforeach
                                                        </tbody>
                                                      </table>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="Section3">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                                            <div class="card-header">
                                                        <a onclick="ShowEmployeeSkill()"  class="btn btn-primary pull-right "  title="Payment"><i class="ti-plus"></i> Add Skill</a><br/>
                                                               
                                                                <br>
                                                            </div>
                                                            <table class="table" id="tbl_employee_skill">
                                                                <thead>
                                                                  <tr>
                                                                    <th scope="col">#No</th>
                                                                    <th>Skill </th>
                                                                    <th>Year </th>
                                                                    <th>Comment </th>
                                                                    <th>Action</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($employee->employeeSkill as $key => $item)
                                                                  <tr id="tr_employee_skill{{$item->id}}">
                                                                      <th scope="row">{{$key + 1}}</th>
                                                                      @php
                                                                      $edx = skill::where('id',$item->skill_id)->first();
                                                                      @endphp
                                                                      <td>{{$edx->name}}</td>
                                                                      <td>{{$item->year}}</td>
                                                                      <td>{{$item->comments}}</td>
                                                                      <th>
                                                                            <a onclick="EditEmployeeSkill({{$item->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                            <a onclick="DeleteEmployeeSkill({{$item->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                                      </th>
                                                                    </tr>     
                                                                    @endforeach
                                                                </tbody>
                                                              </table>
                                                        </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="Section4">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                                            <div class="card-header">
                                                                <a onclick="ShowEmployeeLanguage()"  class="btn btn-primary pull-right "  title="Payment"><i class="ti-plus"></i> Add Language</a><br/><br/>
                                                            </div>
                                                            <table class="table" id="tbl_employee_language">
                                                                <thead>
                                                                  <tr>
                                                                    <th scope="col">#No</th>
                                                                    <th>Language </th>
                                                                    <th>Fluency </th>
                                                                    <th>Skills / Competencies </th>
                                                                    <th>Comments</th>
                                                                    <th>Action</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($employee->employeeLanguage as $key => $item)
                                                                  <tr id="tr_employee_language{{$item->id}}">
                                                                      <th scope="row">{{$key + 1}}</th>
                                                                      @php
                                                                            $edxx = language::where('id',$item->language_id)->first();
                                                                      @endphp
                                                                      <td>{{$edxx->name}}</td>
                                                                      <td>{{$item->fluency}}</td>
                                                                      <td>{{$item->competency}}</td>
                                                                      <td>{{$item->comments}}</td>
                                                                      <th>
                                                                            <a onclick="EditEmployeeLanguage({{$item->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                            <a onclick="DeleteEmployeeLanguage({{$item->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                                      </th>
                                                                    </tr>     
                                                                    @endforeach
                                                                </tbody>
                                                              </table>
                                                        </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="License">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                                            <div class="card-header">
                                                              
                                                                <a onclick="ShowEmployeeLicense()" class="btn btn-primary pull-right "  title="Payment"><i class="ti-plus"></i> Add License</a><br/><br/>
                                                            </div>
                                                            <table class="table" id="tbl_employee_license">
                                                                <thead>
                                                                  <tr>
                                                                    <th scope="col">#No</th>
                                                                    <th>Type of License </th>
                                                                    <th>Date of issue </th>
                                                                    <th>Due date </th>
                                                                    <th>Action</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($employee->employeeLicense as $key => $item)
                                                                  <tr id="tr_employee_license{{$item->id}}">
                                                                      <th scope="row">{{$key + 1}}</th>
                                                                      @php
                                                                            $edxx = license::where('id',$item->licenses_id)->first();
                                                                      @endphp
                                                                       <td>{{$edxx ->name}}</td>
                                                                      <td>{{$item->issued_date}}</td>
                                                                      <td>{{$item->expiry_date}}</td>
                                                                      <th>
                                                                            <a onclick="EditEmployeeLicense({{$item->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                            <a onclick="DeleteEmployeeLicense({{$item->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                                      </th>
                                                                    </tr>     
                                                                    @endforeach
                                                                </tbody>
                                                              </table>
                                                        </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="attachments">
                                                        <div class="card-header">
                                                                <a onclick="ShowEmployeeAttachment({{$employee->id}});" class="btn btn-primary pull-right "  title="Payment"><i class="ti-plus"></i> Add Attachment</a>
                                                            <br/>
                                                        </div>
                                                        <div class="card-body">
                                                            @foreach($employee->attachment as $employee_attachments)
                                                                <ul id="tbl_attachment{{$employee_attachments->id}}" class="list">
                                                                    <li class="manage-list-row clearfix">
                                                                        <div class="job-info">
                                                                            <div class="job-details">
                                                                                <h3 class="job-name"></h3>
                                                                                <small class="job-company"><i class="ti-file"></i>{{$employee_attachments->file_name}}</small>
                                                                                <small class="job-update"><i class="ti-time"></i>Attachment Type : {{$employee_attachments->attachment_type}}</small>
                                                                                <span class="j-type part-time"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="job-buttons">
                                                                            <a href="#" data-id="{{$employee_attachments->id}}"  onclick="DeleteVacancyAttachment(this);" class="btn btn-danger" data-toggle="modal" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                
                                                        </div>
                                                    </div>
                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <br/>
                    </div>
                    <div class="bhoechie-tab-content">
                            <div class="card-header">
                                    <a onclick="ShowModalMembership()" class="btn btn-primary pull-right "  title="Payment"><i class="ti-plus"></i> Add Memberships</a>
                                    <br>
                                    <h4><i class="fa fa-group"></i>Assigned Memberships</h4>
                                </div>
                                <table class="table" id="tbl_assigned_membership">
                                    <thead>
                                      <tr>
                                        <th scope="col">#No</th>
                                        <th>Membership</th>
                                        <th>Paid By</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Commence Date</th>
                                        <th>Renewal Date</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employee->employeeMembership as $key => $item)
                                            <tr id="tr_membership{{$item->id}}">
                                                <th scope="row">{{$key + 1}}</th>
                                                @php
                                                     $edxx = membership::where('id',$item->membership_id)->first();
                                               @endphp
                                                <td>{{$edxx->name}}</td>
                                                <td>{{$item->paid_by}}</td>
                                              
                                                <td>{{$item->amount}}</td>
                                                @php
                                                   $edxxx = currency::where('id',$item->currency_id)->first();
                                                @endphp
                                               <td>{{$edxxx->name }}</td>
                                                <td>{{$item->commence_date}}</td>   
                                                <td>{{$item->renewal_date}}</td>
                                                <th>
                                                      <a onclick="EditMembership({{$item->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                      <a onclick="DeleteMembership({{$item->id}})" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                </th>
                                              </tr>     
                                              @endforeach
                                          </tbody>
                                  </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



  {{-- //terminate Reason --}}
  <div id="ModalDeleteTermination" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmEmployeeDeleteTermination">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="employee_termination_delete_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title"> Deactivation Terminate</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to delete this <b></b>   ?</label>
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

  {{-- //Edit  --}}
    {{-- //terminate Reason --}}
    <div id="showModalReasonEdit" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="POST" action="#" id="frmEmployeeTerminateEdit">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" value="" id="emloyee_terminate_id_edit"/>
                        <input type="hidden" value="{{$employee->id}}" id="employee_termination_id">
                        <div class="modal-header theme-bg">
                            <h4 class="modal-title"> Terminate employee </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                   <label> Reason </label>
                                   <select class="form-control" required id="reason_id_edit" name="reason_id_edit">
                                        <option value="">  -- Pleae Select Reason -- </option>
                                        @php
                                          $ed = terminationResons::all();
                                        @endphp
                                        @foreach ($ed as $eds )
                                        <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label> Date </label>
                                    <input class="form-control" type="date" name="terminate_date_edit" id="terminate_date_edit">
                                 </div>
                                 <div class="col-sm-12">
                                    <label> Note </label>
                                    <textarea class="form-control" name="terminate_note_edit" id="terminate_note_edit" cols="10" rows="5"></textarea>
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


        {{-- ///end  --}}
  <div id="showModalReason" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="#" id="frmEmployeeTerminate">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" value="{{$employee->id}}" id="emloyee_terminate_id"/>
                <div class="modal-header theme-bg">
                    <h4 class="modal-title"> Terminate employee </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                           <label> Reason </label>
                           <select class="form-control" required id="reason_id" name="reason_id">
                                <option value="">  -- Pleae Select Reason -- </option>
                                @php
                                  $ed = terminationResons::all();
                                @endphp
                                @foreach ($ed as $eds )
                                <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label> Date </label>
                            <input class="form-control" type="date" name="terminate_date" id="terminate_date">
                         </div>
                         <div class="col-sm-12">
                            <label> Note </label>
                            <textarea class="form-control" name="terminate_note" id="terminate_note" cols="10" rows="5"></textarea>
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



  <!-- /# Employee Memembership -->
  <div id="ModalEditEmployeeMembership" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmEditEmployeeMembership">
                        <input type="hidden" value="" id="employee_membership_id_edit"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Employee Membership</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                               <label> Membership </label>
                               <select class="form-control" required id="membership_id_edit" name="membership_id_edit">
                                    <option value="">  -- Pleae Select Membership -- </option>
                                    @php
                                      $ed = membership::all();
                                    @endphp
                                    @foreach ($ed as $eds )
                                    <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                    <label>Subscription Paid By</label>
                                    <select class="form-control" required id="membership_paid_by_edit" name="membership_paid_by_edit">
                                            <option value="">  -- Pleae Select Subscription Paid By -- </option>
                                            @php
                                                $paid = array('company','individaul');
                                            @endphp
                                            @foreach ($paid as $paids )
                                            <option value="{{$paids}}"> {{$paids}}</option>                                     
                                            @endforeach
                                        </select>
                            </div>
                            <div class="col-sm-6">
                                    <label>Subscription Amount</label>
                                    <input value="" name="subscription_amount_edit" id="subscription_amount_edit" type="number" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                    <label>Currency</label>
                                    <select class="form-control" required id="currency_member_id_edit" name="currency_member_id_edit">
                                            <option value="">  -- Pleae Select Currency -- </option>
                                            @php
                                             $ed = currency::all();
                                            @endphp
                                            @foreach ($ed as $eds )
                                            <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                            @endforeach
                                        </select>
                            </div>
                            <div class="col-sm-6">
                                    <label>Subscription Commence Date</label>
                                    <input value="" name="commence_date_edit" id="commence_date_edit" type="date" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                    <label>Subscription Renewal Date</label>
                                    <input value="" name="renewal_date_edit" id="renewal_date_edit" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>


  
  <div id="ModalDeleteMembership" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmEmployeeMembership">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="employee_membership_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title"> Employee Membership  </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to delete this <b></b>   ?</label>
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



  <div id="ShowModalEditEmployeeMembership" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmAddEmployeeMembership">
                        <input type="hidden" value="" id="employee_membership_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Employee Membership</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                               <label> Membership </label>
                               <select class="form-control" required id="membership_id" name="membership_id">
                                    <option value="">  -- Pleae Select Membership -- </option>
                                    @php
                                      $ed = membership::all();
                                    @endphp
                                    @foreach ($ed as $eds )
                                    <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                    <label>Subscription Paid By</label>
                                    <select class="form-control" required id="membership_paid_by" name="membership_paid_by">
                                            <option value="">  -- Pleae Select Subscription Paid By -- </option>
                                            @php
                                                $paid = array('company','individaul');
                                            @endphp
                                            @foreach ($paid as $paids )
                                            <option value="{{$paids}}"> {{$paids}}</option>                                     
                                            @endforeach
                                        </select>
                            </div>
                            <div class="col-sm-6">
                                    <label>Subscription Amount</label>
                                    <input value="" name="subscription_amount" id="subscription_amount" type="number" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                    <label>Currency</label>
                                    <select class="form-control" required id="currency_member_id" name="currency_member_id">
                                            <option value="">  -- Pleae Select Currency -- </option>
                                            @php
                                             $ed = currency::all();
                                            @endphp
                                            @foreach ($ed as $eds )
                                            <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                            @endforeach
                                        </select>
                            </div>
                            <div class="col-sm-6">
                                    <label>Subscription Commence Date</label>
                                    <input value="" name="commence_date" id="commence_date" type="date" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                    <label>Subscription Renewal Date</label>
                                    <input value="" name="renewal_date" id="renewal_date" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>


  <!-- /# Employee License -->
  <div id="ShowModalEditEmployeeLicense" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmEditEmployeeLicense">
                        <input type="hidden" value="" id="employee_license_id_edit"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Employee License</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                               <label>License </label>
                               <select class="form-control" required id="licenses_id_edit" name="licenses_id_edit">
                                    <option value="">  -- Pleae Select License -- </option>
                                    @php
                                      $ed = license::all();
                                    @endphp
                                    @foreach ($ed as $eds )
                                    <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                    <label>License No</label>
                                    <input value="" name="license_no_edit" id="license_no_edit" type="number" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                    <label>Issued Date</label>
                                    <input value="" name="issued_date_edit" id="issued_date_edit" type="date" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                    <label>Expiry date</label>
                                    <input value="" name="expiry_date_edit" id="expiry_date_edit" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>



  <div id="ModalDeleteEmployeeLicense" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmEmployeeLicense">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="employee_license_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title"> Employee License  </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to delete this <b></b>   ?</label>
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

  <div id="ShowModalAddEmployeeLicense" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmAddEmployeeLicense">
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Employee License</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                               <label>License </label>
                               <select class="form-control" required id="licenses_id" name="licenses_id">
                                    <option value="">  -- Pleae Select License -- </option>
                                    @php
                                      $ed = license::all();
                                    @endphp
                                    @foreach ($ed as $eds )
                                    <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                    <label>License No</label>
                                    <input value="" name="license_no" id="license_no" type="number" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                    <label>Issued Date</label>
                                    <input value="" name="issued_date" id="issued_date" type="date" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                    <label>Expiry date</label>
                                    <input value="" name="expiry_date" id="expiry_date" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
 <!-- /# Employee Lauangue -->

 <div id="ShowModalEditEmployeeLanauge" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmEditEmployeeLanuage">
                    <input type="hidden" value="" id="employee_lanauge_id_edit"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Employee Languages</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                               <label>Lanauage </label>
                               <select class="form-control" required id="language_id_edit" name="language_id_edit">
                                    <option value="">  -- Pleae Select lanauage -- </option>
                                    @php
                                      $ed = language::all();
                                    @endphp
                                    @foreach ($ed as $eds )
                                    <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>fluency</label>
                                <select class="form-control" required id="fluency_id_edit" name="fluency_id_edit">
                                        <option value="">  -- Pleae Select fluency-- </option>
                                        @php
                                          $f = array('Poor','Basic','Good','Mother Tough'); 
                                        @endphp
                                        @foreach ($f as $fs)
                                        <option value="{{$fs}}"> {{$fs}}</option>                                     
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-sm-12">
                                    <label>Competency</label>
                                    <select class="form-control" required id="competency_id_edit" name="competency_id_edit">
                                            <option value="">  -- Pleae Select Competency-- </option>
                                            @php
                                              $c = array('Poor','Basic','Good','Mother Tough'); 
                                            @endphp
                                            @foreach ($c as $cs)
                                            <option value="{{$cs}}">{{$cs}}</option>                                     
                                            @endforeach
                                        </select>
                                </div>
                            <div class="col-sm-12">
                                    <label>Comment</label>
                                    <textarea class="form-control" name="comments_language_edit" id="comments_language_edit" cols="5" rows="5"></textarea>
                             </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>




 <div id="ShowModalAddEmployeeLanauge" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmAddEmployeeLanuage">
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Employee Languages</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                               <label>Lanauage </label>
                               <select class="form-control" required id="language_id" name="language_id">
                                    <option value="">  -- Pleae Select lanauage -- </option>
                                    @php
                                      $ed = language::all();
                                    @endphp
                                    @foreach ($ed as $eds )
                                    <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>fluency</label>
                                <select class="form-control" required id="fluency_id" name="fluency_id">
                                        <option value="">  -- Pleae Select fluency-- </option>
                                        @php
                                          $f = array('Poor','Basic','Good','Mother Tough'); 
                                        @endphp
                                        @foreach ($f as $fs)
                                        <option value="{{$fs}}"> {{$fs}}</option>                                     
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-sm-12">
                                    <label>Competency</label>
                                    <select class="form-control" required id="competency_id" name="competency_id">
                                            <option value="">  -- Pleae Select Competency-- </option>
                                            @php
                                              $c = array('Poor','Basic','Good','Mother Tough'); 
                                            @endphp
                                            @foreach ($c as $cs)
                                            <option value="{{$cs}}">{{$cs}}</option>                                     
                                            @endforeach
                                        </select>
                                </div>
                            <div class="col-sm-12">
                                    <label>Comment</label>
                                    <textarea class="form-control" name="comments_skill" id="comments_skill" cols="5" rows="5"></textarea>
                             </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
   <!-- /# Employee Skill -->
   <div id="ModalDeleteEmployeeLanguage" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmEmployeeLanauge">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="employee_lanauge_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title"> Employee Languages  </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to delete this <b></b>   ?</label>
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

   <div id="ShowModalEditEmployeeSkill" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmEditEmployeeSkill">
                    <input type="hidden" value="" id="skill_id_edits" />
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Employee Skill</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                               <label>Skill </label>
                                <select class="form-control" required id="skill_id_edit" name="skill_id_edit">
                                    <option value="">  -- Pleae Select skill -- </option>
                                    @php
                                      $ed = skill::all();
                                    @endphp
                                    @foreach ($ed as $eds )
                                    <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Year</label>
                                <input value="" name="year_edit" id="year_edit" type="text" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                    <label>Comment</label>
                                    <textarea class="form-control" name="comments_skill_edit" id="comments_skill_edit" cols="5" rows="5"></textarea>
                             </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    

   <div id="ModalDeleteEmployeeSkill" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmEmployeeSkill">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="emloyee_skill_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title"> Employee Skill </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to delete this <b></b>   ?</label>
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

   <div id="ShowModalAddEmployeeSkill" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmAddEmployeeSkill">
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Employee Skill</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                               <label>Skill </label>
                                <select class="form-control" required id="skill_id" name="skill_id">
                                    <option value="">  -- Pleae Select skill -- </option>
                                    @php
                                      $ed = skill::all();
                                    @endphp
                                    @foreach ($ed as $eds )
                                    <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Year</label>
                                <input value="" name="year" id="year" type="text" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                    <label>Comment</label>
                                    <textarea class="form-control" name="comments_skill" id="comments_skill" cols="5" rows="5"></textarea>
                             </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    

   <!-- /# Employee Education -->

   <div id="ShowModalEditEmployeeEducation" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmEditEmployeeEducation">
                        <input type="hidden" value="" id="emloyee_education_id_edit"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Employee Education</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Institute</label>
                                <input value="" name="institute_edit" id="institute_edit" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">
                               <label>Level </label>
                                <select class="form-control" required id="education_id_edit" name="education_id_edit">
                                    <option value="">  -- Pleae Select level -- </option>
                                    @php
                                      $ed = educations::all();
                                    @endphp
                                    @foreach ($ed as $eds )
                                    <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Major/Specialization</label>
                                <input value="" name="major_edit" id="major_edit" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>GPA/Score</label>
                                <input value="" name="score_edit" id="score_edit" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Year</label>
                                <input value="" name="year_edit" id="year_edit" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Start Date</label>
                                <input value="" name="start_date_edit" id="start_date_edit" type="date" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>End Date</label>
                                <input value="" name="end_date_edit" id="end_date_edit" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

   <div id="ModalDeleteEmployeeEducation" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmEmployeeEducation">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="emloyee_education_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title"> Employee Education </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to delete this <b></b>   ?</label>
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

   <div id="ShowModalEmployeeEducation" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="frmAddEmployeeEducation">
                <div class="modal-header theme-bg">
                    <h4 class="modal-title">Employee Education</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Institute</label>
                            <input value="" name="institute" id="institute" type="text" class="form-control">
                        </div>
                        <div class="col-sm-6">
                           <label>Level </label>
                            <select class="form-control" required id="education_id" name="education_id">
                                <option value="">  -- Pleae Select level -- </option>
                                @php
                                  $ed = educations::all();
                                @endphp
                                @foreach ($ed as $eds )
                                <option value="{{$eds->id}}"> {{$eds->name}}</option>                                     
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Major/Specialization</label>
                            <input value="" name="major" id="major" type="text" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label>GPA/Score</label>
                            <input value="" name="score" id="score" type="text" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label>Year</label>
                            <input value="" name="year" id="year" type="text" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label>Start Date</label>
                            <input value="" name="start_date" id="start_date" type="date" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label>End Date</label>
                            <input value="" name="end_date" id="end_date" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

   <!-- /# Work Experience -->

   <div id="EditModalWorkExperience" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmEditWorkExperience">
                    <input type="hidden" id="work_experience_id_edit" value="" />
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Work Experience</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                                <div class="col-sm-6">
                                    <label>Company Name</label>
                                    <input value="" name="company_name_edit" id="company_name_edit" type="text" class="form-control">                                       
                                </div>
                            <div class="col-sm-6">
                               <label>Job Title</label>
                                <select class="form-control" required id="job_title_id_edit" name="job_title_id_edit">
                                    <option value="">  -- Pleae Select job title -- </option>
                                    @php
                                        $j = jobTitle::all();
                                    @endphp
                                    @foreach ($j  as $js )
                                    <option value="{{$js ->id}}"> {{$js ->name}}</option>                                     
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>From Date</label>
                                <input value="" name="from_date_edit" id="from_date_edit" type="date" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>To Date</label>
                                <input value="" name="to_date_edit" id="to_date_edit" type="date" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label>Comment</label>
                                <textarea class="form-control" name="comments_edit" id="comments_edit" cols="5" rows="5"></textarea>
                            </div>
                    
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    


   <div id="ModalDeleteExperience" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmDeleteExperience">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="work_experience_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title"> Work Experience </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to delete this <b></b>   ?</label>
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


   <div id="ShowModalWorkExperience" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="frmShowWorkExperience">
                <input type="hidden" id="work_experience_id" value="" />
                <div class="modal-header theme-bg">
                    <h4 class="modal-title">Work Experience</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                            <div class="col-sm-6">
                                <label>Company Name</label>
                                <input value="" name="company_name" id="company_name" type="text" class="form-control">                                       
                            </div>
                        <div class="col-sm-6">
                           <label>Job Title</label>
                            <select class="form-control" required id="job_title_id" name="job_title_id">
                                <option value="">  -- Pleae Select job title -- </option>
                                @php
                                    $j = jobTitle::all();
                                @endphp
                                @foreach ($j  as $js )
                                <option value="{{$js ->id}}"> {{$js ->name}}</option>                                     
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>From Date</label>
                            <input value="" name="from_date" id="from_date" type="date" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label>To Date</label>
                            <input value="" name="to_date" id="to_date" type="date" class="form-control">
                        </div>
                        <div class="col-sm-12">
                            <label>Comment</label>
                            <textarea class="form-control" name="comments" id="comments" cols="5" rows="5"></textarea>
                        </div>
                
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- /# ShowBasic Salary-->
    <div id="ShowEditBasicSalary" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="frmEditBasicSalary">
                        <input type="hidden" id="basic_salary_id_edit" value="{{$employee->id}}" />
                        <div class="modal-header theme-bg">
                            <h4 class="modal-title">Basic Salary </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                    <div class="col-sm-6">
                                            <label>Salary Component</label>
                                        <input value="" name="salary_component_edit" id="salary_component_edit" type="text" class="form-control">                                       
                                        </div>
                               
                                <div class="col-sm-6">
                                   <label>Currency</label>
                                    <select class="form-control" required id="currency_id_edit" name="currency_id_edit">
                                        <option value="">  -- Pleae Select Currency -- </option>
                                        @php
                                            $currency = currency::all();
                                        @endphp
                                        @foreach ($currency as $currencies)
                                        <option value="{{$currencies->id}}"> {{$currencies->name}}</option>                                     
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Amount</label>
                                    <input value="" name="amount_edit" id="amount_edit" type="number" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                        <label>Pay Grade</label>
                                            <select class="form-control" required id="paygrade_id_edit" name="paygrade_id_edit">
                                                <option value="">  -- Pleae Select paygrade -- </option>
                                                @php
                                                    use App\Model\paygrade ;$paygrade = paygrade::all();
                                                @endphp
                                                @foreach ($paygrade as $paygrades)
                                                <option value="{{$paygrades->id}}"> {{$paygrades->name}}</option>                                     
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-sm-12">
                                            <label>Pay Periods </label>
                                                <select class="form-control" required id="pay_periods_id_edit" name="pay_periods_id_edit">
                                                    <option value="">  -- Pleae Select Pay Periods -- </option>
                                                    @php
                                                       $payPeriod = payPeriod::all();
                                                    @endphp
                                                    @foreach ($payPeriod as $payPeriods)
                                                    <option value="{{$payPeriods->id}}"> {{$payPeriods->name}}</option>                                     
                                                    @endforeach
                                                </select>
                            </div>
                                <div class="col-sm-12">
                                    <label>Comment</label>
                                    <textarea class="form-control" name="comments_salary_edit" id="comments_salary_edit" cols="5" rows="5"></textarea>
                                </div>
                        
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    

    <div id="ModalDeleteBasicSalary" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="#" id="frmDeleteBasicSalary">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" value="" id="basic_salary_id"/>
                        <div class="modal-header theme-bg">
                            <h4 class="modal-title">Basic Salary  </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Do u want to delete this <b></b>   ?</label>
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

    <div id="ShowBasicSalary" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="frmShowBasicSalary">
                        <input type="hidden" id="basic_salary_id_add" value="{{$employee->id}}" />
                        <div class="modal-header theme-bg">
                            <h4 class="modal-title">Basic Salary </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                    <div class="col-sm-6">
                                            <label>Salary Component</label>
                                        <input value="" name="salary_component" id="salary_component" type="text" class="form-control">                                       
                                        </div>
                               
                                <div class="col-sm-6">
                                   <label>Currency</label>
                                    <select class="form-control" required id="currency_id" name="currency_id">
                                        <option value="">  -- Pleae Select Currency -- </option>
                                        @php
                                            $currency = currency::all();
                                        @endphp
                                        @foreach ($currency as $currencies)
                                        <option value="{{$currencies->id}}"> {{$currencies->name}}</option>                                     
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Amount</label>
                                    <input value="" name="amount" id="amount" type="number" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                        <label>Pay Grade</label>
                                            <select class="form-control" required id="paygrade_id" name="paygrade_id">
                                                <option value="">  -- Pleae Select paygrade -- </option>
                                                @php
                                                    $paygrade = paygrade::all();
                                                @endphp
                                                @foreach ($paygrade as $paygrades)
                                                <option value="{{$paygrades->id}}"> {{$paygrades->name}}</option>                                     
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-sm-12">
                                            <label>Pay Periods </label>
                                                <select class="form-control" required id="pay_periods_id" name="pay_periods_id">
                                                    <option value="">  -- Pleae Select Pay Periods -- </option>
                                                    @php
                                                        $payPeriod = payPeriod::all();
                                                    @endphp
                                                    @foreach ($payPeriod as $payPeriods)
                                                    <option value="{{$payPeriods->id}}"> {{$payPeriods->name}}</option>                                     
                                                    @endforeach
                                                </select>
                            </div>
                                <div class="col-sm-12">
                                    <label>Comment</label>
                                    <textarea class="form-control" name="comments_salary" id="comments_salary" cols="5" rows="5"></textarea>
                                </div>
                        
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Add Attachment -->
    <!-- Delete Basic Salary -->
    <div id="Delete" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="#" id="frmDeleteJobAttachment">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" value="" id="attachment_id"/>
                        <div class="modal-header theme-bg">
                            <h4 class="modal-title">Job Attachment  </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Do u want to delete this <b></b>   ?</label>
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

    <div id="AddJobAttachment" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmJobAttachment" >
                    <input type="hidden" id="employee_attachment_id" value="" />
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Employee Attachment </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-2 col-sm-2"> Attachment:</label>
                            <div class="col-md-10 col-sm-10">
                                <label class="btn-bs-file btn">
                                    Browse
                                    <input type="file" id="file" name="file" accept="application/pdf,application/vnd.ms-excel" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- #page-wrapper -->
    <div id="Delete" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmDeleteJobAttachment">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="attachment_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Job Attachment  </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to delete this <b></b>   ?</label>
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

 
    <!-- /# ShowEmergencyContacts -->
    <div id="ShowEmergencyContacts" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmShowEmergencyContacts">
                    <input type="hidden" id="employee_assign_emergency_contacts" value="" />
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Assign Emergency Contacts </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Name</label>
                                <input value="" name="name" id="name" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Relationship</label>
                                <input value="" name="relationship" id="relationship" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Home Telephone</label>
                                <input value="" name="home_telephone" id="home_telephone" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">

                                <label>Mobile</label>
                                <input value="" name="mobile" id="mobile" type="text" class="form-control">

                            </div>
                            <div class="col-sm-12">
                                <label>Work Telephone</label>
                                <input value="" name="work_telephone" id="work_telephone" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /# Edit Emergency Contact -->
    <div id="EditEmergencyContacts" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmEditEmergencyContacts">
                    <input type="hidden" id="emergency_contacts_edit" value="" />
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Edit Assign Emergency Contacts </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Name</label>
                                <input value="" name="name_edit" id="name_edit" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Relationship</label>
                                <input value="" name="relationship_edit" id="relationship_edit" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Home Telephone</label>
                                <input value="" name="home_telephone_edit" id="home_telephone_edit" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">

                                <label>Mobile</label>
                                <input value="" name="mobile_edit" id="mobile_edit" type="text" class="form-control">

                            </div>
                            <div class="col-sm-12">
                                <label>Work Telephone</label>
                                <input value="" name="work_telephone_edit" id="work_telephone_edit" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- /# Delete Emergency Contact -->
    <div id="DeleteEmergencyContact" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmDeleteEmergencyContact">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="emergency_contact_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Emergency Contact  </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to delete this Emergency Contact <b></b>   ?</label>
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
   <script src="/js/backend/terminate.js"></script>
   <script src="/js/backend/employee.js"></script>
   <script src="/js/backend/basic_salary.js"></script>
   <script src="/js/backend/experience.js"></script>
   <script src="/js/backend/employee_education.js"></script>
   <script src="/js/backend/employee_skill.js"></script>
   <script src="/js/backend/employee_lauguage.js"></script>
   <script src="/js/backend/employee_license.js"></script>
   <script src="/js/backend/employee_membership.js"></script>
@endsection

