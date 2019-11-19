@extends('backend.layouts.master')
@section('content')
    <style>
        .error {

            color: red;
        }
        /*  bhoechie tab */
        div.bhoechie-tab-menu{
            padding-right: 0;
            padding-left: 0;
            padding-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group{
            margin-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group>a{
            margin-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group>a .glyphicon,
        div.bhoechie-tab-menu div.list-group>a .fa {
            color: #586d82;
        }
        div.bhoechie-tab-menu div.list-group>a:first-child{
            border-top-right-radius: 0;
            -moz-border-top-right-radius: 0;
        }
        div.bhoechie-tab-menu div.list-group>a:last-child{
            border-bottom-right-radius: 0;
            -moz-border-bottom-right-radius: 0;
        }
        div.bhoechie-tab-menu div.list-group>a.active,
        div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
        div.bhoechie-tab-menu div.list-group>a.active .fa{
            background-color: #586d82;
            background-image: #586d82;
            color: #ffffff;
        }
        div.bhoechie-tab-menu div.list-group>a.active:after{
            content: '';
            position: absolute;
            left: 100%;
            top: 50%;
            margin-top: -13px;
            border-left: 0;
            border-bottom: 13px solid transparent;
            border-top: 13px solid transparent;
            border-left: 10px solid #586d82;
        }

        div.bhoechie-tab-content{
            background-color: #ffffff;
            /* border: 1px solid #eeeeee; */
            padding-left: 20px;
            padding-top: 10px;
        }

        div.bhoechie-tab div.bhoechie-tab-content:not(.active){
            display: none;
        }
    </style>
    <input type="hidden" value="{{$employee->id}}" id="employee_id">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 col-md-5 col-sm-8 col-xs-9">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item active text-center">
                            <h4 class="fa fa-dashboard fa-4x"></h4><br/>Personal Details
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="fa fa-phone-square fa-4x"></h4><br/> Contact Details
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="fa fa-user fa-4x"></h4><br/> Emergency Contact
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="fa fa-heart-o fa-4x"></h4><br/>Job
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="fa fa-dollar fa-4x"></h4><br/> Salary
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="fa fa-send-o fa-4x"></h4><br/> Report To
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
                                        <label>Employee Profile.</label>
                                        <input id="photo" name="photo" type="file" class="form-control">
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
                                        <select class="form-control"  name="gender" id="gender">
                                            <option value="" required > -- plz select gender -- </option>
                                            @php $gender = array("Male","Female");@endphp
                                            @foreach($gender as $genders)
                                                <option  value="{{$genders}}" {{$employee->gender == $genders ? "selected":" " }}> {{$genders}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label> Marital Status </label>
                                        <select class="form-control"  name="marital_status" id="marital_status">
                                            <option value="" required > -- plz select status -- </option>
                                            @php $Single = array("Single","Married");@endphp
                                            @foreach($Single as $Singles)
                                                <option value="{{$Singles}}" {{$employee->marital_status == $Singles ? "selected":" " }}> {{$Singles}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label> Nationality</label>
                                        <select class="form-control"  name="city_code" id="city_code">
                                            <option value="" required > -- plz select nationality -- </option>
                                            @php $nationality = array("Cambodia","Thailand");@endphp
                                            @foreach($nationality as $nationalities)
                                                <option value="{{$Singles}}"> {{$Singles}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="text-center pull-right">
                                        <a href="{{ URL::previous() }}"><button class="btn btn-m btn-primary">Back</button></a>
                                        <button type="submit" class="btn btn-m btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-header">
                            <a href="#" data-id="{{$employee->id}}" onclick="ShowEmployeeAttachment(this);" class=" pull-right btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Add Attachment">  Add Attachment</a>
                            <br>
                            <h4><i class="fa fa-file" ></i> Employee Attachment</h4>
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
                                            <a href="#" data-id="{{$employee_attachments->id}}"  onclick="DeleteVacancyAttachment(this);" class="btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach

                        </div>
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
                                </div>
                                <div class="card-header"></div><br/>
                                <div class="row">
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
                                    <div class="col-sm-4"><button type="submit" class="btn btn-success">Save</button></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- hotel search -->
                    <div class="bhoechie-tab-content">
                        <div class="card-header">
                            <a href="#" data-id="{{$employee->id}}" onclick="ShowEmergencyContacts(this);" class=" pull-right btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Add Attachment"> Add </a>
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
                                            <a href="#" onclick="EditEmergencyContact({{$contact->id}});"  class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                            <a href="#" data-id="{{$contact->id}}" onclick="DeleteEmergencyContact(this);" class="btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="bhoechie-tab-content">
                        <div class="card-header">
                            <h4><i class="fa fa-send-o " ></i><strong> Job </strong> </h4>
                        </div>
                        <form id="frmContactDetails" action="#">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label> Job Title  </label>
                                        <select class="form-control"  name="city_code" id="city_code">
                                            <option value="" required > -- plz select job titles -- </option>
                                            @php use App\Model\jobTitle;$jobTitle = jobTitle::all();@endphp
                                            @foreach($jobTitle as $jobTitles)
                                                <option value="{{$jobTitles->id}}"> {{$jobTitles->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Job Specification .</label>
                                        <small></small>
                                    </div>
                                    <div class="col-sm-4">
                                        <label> Employment Status  </label>
                                        <select class="form-control"  name="city_code" id="city_code">
                                            <option value="" required > -- plz select status -- </option>
                                            @php use App\Model\EmploymentStatus;$status = EmploymentStatus::all();@endphp
                                            @foreach($status as $statuses)
                                                <option value="{{$statuses->id}}"> {{$statuses->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label> Job Category  </label>
                                        <select class="form-control"  name="city_code" id="city_code">
                                            <option value="" required > -- plz select status -- </option>
                                            @php use App\Model\jobCategory;$jobCategory = jobCategory::all(); @endphp
                                            @foreach($jobCategory as $jobCategories)
                                                <option value="{{$jobCategories->id}}"> {{$jobCategories->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Joined Date</label>
                                        <input name="zip_code" data-toggle="datepicker"  id="zip_code" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label> Sub Unit</label>
                                        <select class="form-control"  name="city_code" id="city_code">
                                            <option value="" required > -- plz select Sub Unit -- </option>
                                            @php $subUnit = array("IT Department ","Accounting");@endphp
                                            @foreach($subUnit as $subUnits)
                                                <option value="{{$subUnits}}"> {{$subUnits}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label> Location </label>
                                        <select class="form-control"  name="city_code" id="city_code">
                                            <option value="" required > -- plz select Location -- </option>
                                            @php use App\Model\location;$location = location::all();@endphp
                                            @foreach($location as $locations)
                                                <option value="{{$locations->id}}"> {{$locations->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card-header">
                                    <h4><i class="fa fa-send-o " ></i><strong> Employment Contract </strong> </h4>
                                </div><br/>
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
                                <div class="card-header">
                                </div>
                                <br/>
                                <button type="submit" class="btn btn-success">Edit</button>
                                <button type="submit" class="btn btn-primary">Terminate Employment</button>

                                <br/>


                            </div>
                        </form>
                    </div>
                    <div class="bhoechie-tab-content">
                        <h1 style="font-size:12em;color:#55518a"><i class="fa fa-user mrg-r-5"></i></h1>
                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                        <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                    </div>

                    <div class="bhoechie-tab-content">
                        <h1 style="font-size:12em;color:#55518a"><i class="fa fa-user mrg-r-5"></i></h1>
                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                        <h3 style="margin-top: 0;color:#55518a">Report Card</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Add Attachment -->
    <div id="AddJobAttachment" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmJobAttachment" >
                    <input type="hidden" id="employee_attachment_id" value="" />
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Employee Attachment </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-4 col-sm-3"> Attachment:</label>
                            <div class="col-md-8 col-sm-9">
                                <label class="btn-bs-file btn">
                                    Browse
                                    <input type="file" id="file" name="file" accept="application/pdf,application/vnd.ms-excel" />
                                </label>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmShowEmergencyContacts">
                    <input type="hidden" id="employee_assign_emergency_contacts" value="" />
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Assign Emergency Contacts </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Name</label>
                                <input value="" name="name" id="name" type="text" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label>Relationship</label>
                                <input value="" name="relationship" id="relationship" type="text" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label>Home Telephone</label>
                                <input value="" name="home_telephone" id="home_telephone" type="text" class="form-control">
                            </div>
                            <div class="col-sm-12">

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
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmEditEmergencyContacts">
                    <input type="hidden" id="emergency_contacts_edit" value="" />
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Edit Assign Emergency Contacts </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Name</label>
                                <input value="" name="name_edit" id="name_edit" type="text" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label>Relationship</label>
                                <input value="" name="relationship_edit" id="relationship_edit" type="text" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label>Home Telephone</label>
                                <input value="" name="home_telephone_edit" id="home_telephone_edit" type="text" class="form-control">
                            </div>
                            <div class="col-sm-12">

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
    <script type="text/javascript">


        // Edit Emergency Contact
        function EditEmergencyContact(id) {

            $('#EditEmergencyContacts').modal('show');
            $('#emergency_contacts_edit').val(id);
            let token = $("meta[name='csrf-token']").attr("content");
            $.ajax(
                {
                    url: "{{url('admin/employee/show/emergency/contact')}}" + "/" + id,
                    type: 'GET',
                    data: {

                        "id": id,
                        "_token": token
                    },
                    success: function (data){

                        $('#name_edit').val(data.name);
                        $('#relationship_edit').val(data.relationship);
                        $('#work_telephone_edit').val(data.work_telephone);
                        $('#home_telephone_edit').val(data.home_telephone);
                        $('#mobile_edit').val(data.mobile);

                    }
                });
        }

        // Edit
        $('#frmEditEmergencyContacts').validate({ // initialize the plugin
            rules:{
                name_edit : {
                    required : true
                },
                relationship_edit : {

                    required : true
                }
            },
            submitHandler: function (form) { // for demo

                let token = $("meta[name='csrf-token']").attr("content");

                let id = $('#emergency_contacts_edit').val();

                $.ajax(
                    {
                        url: "{{url('admin/employee/update/emergency/contact')}}" + "/" +  id ,
                        type: 'POST',
                        data: {

                            "id": id,
                            "employee_id": $('#employee_id').val(),
                            "name" : $('#name_edit').val(),
                            "relationship" : $('#relationship_edit').val(),
                            "mobile" : $('#mobile_edit').val(),
                            "work_telephone" : $('#work_telephone_edit').val(),
                            "home_telephone" : $('#home_telephone_edit').val(),
                            "_token": token

                        },
                        success: function (data){

                                let ul =

                                "<ul id='ul_emergency_contact' class='ul_id"+data.id+" list'>" +
                                "<li class='manage-list-row clearfix'>" +
                                "<div class='job-info'>" +
                                "<div class='job-details'>" +
                                "<h3 class='job-name'></h3>" +
                                "<small class='job-company'><b>Name :</b> " + data.name + "  </small>" +
                                "<small class='job-company'></i><b>Relationship :</b> " + data.relationship + " </small>" +
                                "<small class='job-update'><i class='ti-time'></i><b>Mobile : </b> " + data.mobile + "  </small>" +
                                "<span class='j-type part-time'></span>" +
                                "</div>" +
                                "</div>";
                                ul += "<div class='job-buttons'><a href='#' onclick='EditEmergencyContact(" + data.id + ");'  class='btn btn-gary manage-btn' data-toggle='tooltip' data-placement='top' title='Edit'><i class='ti-pencil-alt'></i></a></td>"
                                ul += "<a href='#' data-id='" + data.id + "' onclick='DeleteEmergencyContact(this);' class='btn btn-cancel manage-btn' data-toggle='modal' data-placement='top'><i class='ti-close'></i></a></div></li></ul>";

                            $('#ul_emergency_contact').replaceWith(ul);
                            $('#EditEmergencyContacts').modal('hide');
                            toastr.success('Emergency Contacts has been edit  success !.', 'Success ', {timeOut: 5000})

                        },error:function (err) {

                            console.log(err);
                        }
                    });
            }
        });



        //Emergency Contact
        function ShowEmergencyContacts(m) {

            $('#frmShowEmergencyContacts').trigger("reset");
            let id = $(m).data("id");
            $('#ShowEmergencyContacts').modal('show');
            $('#employee_assign_emergency_contacts').val(id);

        }

        function DeleteEmergencyContact(mm)
        {
            let id = $(mm).data("id");
            $('#DeleteEmergencyContact').modal('show');
            $('#emergency_contact_id').val(id);
        }


        //Deleted Emergency Contact
        $('#frmDeleteEmergencyContact').validate({ // initialize the plugin
            submitHandler: function (form) { // for demo

                let token = $("meta[name='csrf-token']").attr("content");

                let id = $('#emergency_contact_id').val();

                console.log(id);

                $.ajax(
                    {
                        url: "{{url('admin/employee/delete/emergency/contact')}}" + "/" + id,
                        type: 'DELETE',
                        data: {

                            "id": id,
                            "_token": token
                        },
                        success: function (data){

                            $('.ul_id'+data.id).remove();
                            $('#DeleteEmergencyContact').modal('hide');
                            toastr.success('Emergency Contacts has been deleted  successfully !.', 'Success ', {timeOut: 5000})

                        }
                    });
            }
        });

        // Add
        $('#frmShowEmergencyContacts').validate({ // initialize the plugin
            rules:{
                name : {
                    required : true
                },
                relationship : {

                    required : true
                }
            },
            submitHandler: function (form) { // for demo

                let token = $("meta[name='csrf-token']").attr("content");

                let id = $('#employee_assign_emergency_contacts').val();

                $.ajax(
                    {
                        url: "{{url('admin/employee/add/emergency/contact')}}" ,
                        type: 'POST',
                        data: {

                            "id": id,
                            "name" : $('#name').val(),
                            "relationship" : $('#relationship').val(),
                            "mobile" : $('#relationship').val(),
                            "work_telephone" : $('#work_telephone').val(),
                            "home_telephone" : $('#home_telephone').val(),
                            "_token": token

                        },
                        success: function (data){

                            $('#body_emergency').append(
                                "<ul id='ul_emergency_contact' class='ul_id"+data.id+" list'>" +
                                "<li class='manage-list-row clearfix'>" +
                                "<div class='job-info'>" +
                                "<div class='job-details'>" +
                                "<h3 class='job-name'></h3>" +
                                "<small class='job-company'><b>Name :</b> " + data.name + "  </small>" +
                                "<small class='job-company'></i><b>Relationship :</b> " + data.relationship + " </small>" +
                                "<small class='job-update'><i class='ti-time'></i><b>Mobile : </b> " + data.mobile + "  </small>" +
                                "<span class='j-type part-time'></span>" +
                                "</div>" +
                                "</div>" +
                                "<div class='job-buttons'>" +
                                "<a href='#' onclick='EditEmergencyContact(" + data.id + ");'  class='btn btn-gary manage-btn' data-toggle='tooltip' data-placement='top' title='Edit'><i class='ti-pencil-alt'></i></a>" +
                                "<a href='#' data-id='" + data.id + "' onclick='DeleteEmergencyContact(this);' class='btn btn-cancel manage-btn' data-toggle='modal' data-placement='top'><i class='ti-close'></i></a>" +
                                "</div>" +
                                "</li>" +
                                "</ul>");

                            $('#ShowEmergencyContacts').modal('hide');
                            toastr.success('Emergency Contacts has been added  success !.', 'Success ', {timeOut: 5000})
                        }
                    });
            }
        });
































        //show
        function  ShowEmployeeAttachment(xx){

            let id = $(xx).data("id");
            $('#AddJobAttachment').modal('show');
            $('#employee_attachment_id').val(id);


        }

        //delete
        function DeleteVacancyAttachment(xxxxx){

            let id = $(xxxxx).data("id");
            $('#Delete').modal('show');
            $('#attachment_id').val(id);

        }

        $(document).ready(function () {

            $('#frmDeleteJobAttachment').validate({ // initialize the plugin

                submitHandler: function (form) { // for demo

                    let token = $("meta[name='csrf-token']").attr("content");

                    let id = $('#attachment_id').val();

                    $.ajax(
                        {
                            url: "{{url('admin/employee/delete/attachment')}}" +"/"+ id,
                            type: 'DELETE',
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function (data){

                                if(data == "success"){

                                    let concatId = 'tbl_attachment'+id;
                                    concatId = concatId.replace(/\s/g, '');
                                    document.getElementById(concatId).remove();

                                    $('#Delete').modal('hide');
                                    toastr.success('Attachment Delete success !.', 'Success ', {timeOut: 5000})

                                }
                            }
                        });
                }
            });



            $('#frmJobAttachment').validate({ // initialize the plugin

                rules: {
                    file : {

                        required : true
                    }
                },
                submitHandler: function (form) { // for demo

                    let id = $('#employee_attachment_id').val();

                    let file_data = $('#file').prop('files')[0];

                    let form_data = new FormData();

                    form_data.append('file', file_data);

                    $.ajaxSetup({

                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({

                        url: "{{url('admin/employee/add/attachment')}}" +"/"+ id,
                        data: form_data,
                        type: 'POST',
                        contentType: false, // The content type used when sending data to the server.
                        cache: false, // To unable request pages to be cached
                        processData: false,

                        success: function (data){

                            console.log(data);

                            if(data == "success"){

                                $('#AddJobAttachment').modal('hide');
                                toastr.success('Attachment uploaded success  !.', 'Success ', {timeOut: 5000})

                                setTimeout(function(){
                                    window.location.reload(1);
                                }, 3000);
                            }
                        },error : function (err) {

                            console.log(err);

                        }
                    });
                }
            });

            // update contact details
            $('#frmContactDetails').validate({ // initialize the plugin
                rules : {
                    mobile : {
                        required : true
                    },
                    work_email :
                        {
                            required: true
                        },
                    street1 : {
                        required: true

                    }
                },
                submitHandler: function (form) { // for demo

                    let id = $('#employee_id').val();
                    let token = $("meta[name='csrf-token']").attr("content");

                    $.ajax(
                        {
                            url: "{{url('admin/employee/update/contact')}}" +"/"+ id,
                            type:"POST",
                            data: {
                                "id": id,
                                "_token": token,
                                "mobile" : $('#mobile').val(),
                                "work_email" : $('#work_email').val(),
                                "street1" : $('#street1').val(),
                                "street2" : $('#street2').val(),
                                "city_code" : $('#city_code').val(),
                                "country_code" : $('#country_code').val(),
                                "province_code" : $('#province_code').val(),
                                "zip_code" : $('#zip_code').val(),
                                "telephone" : $('#telephone').val(),
                                "work_telephone" : $('#work_telephone').val(),
                                "other_email" : $('#other_email').val(),
                            },
                            success: function (data){

                                console.log(data);
                                toastr.success('Employee update success !.', 'Success ', {timeOut: 5000})

                            },error : function (err) {

                                console.log(err);
                            }
                        });
                }
            });


            //update Employee Details
            $('#frmEmployeeDetails').validate({ // initialize the plugin
                rules : {
                    gender : {
                        required : true
                    },
                    marital_status :
                        {
                            required: true
                        },
                    first_name : {

                        required : true
                    },
                    last_name : {

                        required : true
                    }
                },
                submitHandler: function (form) { // for demo

                    let id = $('#employee_id').val();
                    let token = $("meta[name='csrf-token']").attr("content");

                    $.ajax(
                        {
                            url: "{{url('admin/employee/update')}}" +"/"+ id,
                            type:"POST",
                            data: {
                                "id": id,
                                "_token": token,
                                "first_name" : $('#first_name').val(),
                                "last_name" : $('#last_name').val(),
                                "middle_name" : $('#middle_name').val(),
                                "gender" : $('#gender').val(),
                                "marital_status" : $('#marital_status').val(),
                                "other_id" : $('#other_id').val(),
                            },
                            success: function (data){

                                toastr.success('Employee update success !.', 'Success ', {timeOut: 5000})

                            },error : function (err) {

                                console.log(err);
                            }
                        });
                }
            });


            $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
            });

        });

    </script>
@endsection

