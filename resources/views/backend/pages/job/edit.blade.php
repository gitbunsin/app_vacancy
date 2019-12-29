@extends('backend.layouts.master')
@section('content')
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
    {{-- @php
        use App\Model\JobCategory;
        use App\Model\employee;
        use App\Model\JobType;
        use App\Model\skill;
        use App\Model\location;
        use App\Model\company;
        use App\Model\jobTitle;
    @endphp --}}
    
    <div class="container-fluid">
    <!-- /row -->
    <div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
    
            <div class="card-header">
               <h3> Vacancy Details : <strong>{{$vacancy->vacancy_name}}</strong></h3>
            </div>
            <form  id="frmEditModalVacancy">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="vacancy_id_edit">
            <div class="card-body">
                   
                    <div class="modal-body">
                            <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#info_edit" aria-controls="home" role="tab" data-toggle="tab"> Vacancy Info</a></li>
                                    <li role="presentation"><a href="#description_edit" aria-controls="description" role="tab" data-toggle="tab"> Requirement / Description</a></li>
                                    <li role="presentation"><a href="#attachment" aria-controls="messages" role="tab" data-toggle="tab">Vacancy Attachment</a></li>
                                
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabs">
                        
                                    <div role="tabpanel" class="tab-pane fade in active" id="info_edit">                                      
                                            <div class="card-body">
                                                    <table class="table">
                                                            <tr>
                                                                    <td><b> Company : </b></td>
                                                                    <td>{{$vacancy->company->company_name}}</td>
                                                            </tr> 
                                                            <tr>
                                                              <td><b>Vacancy Name : </b></td>
                                                              <td>{{$vacancy->vacancy_name}}</td>
                                                            </tr>
                                                            <tr>
                                                              <td><b>Hiring Manager : </b></td>
                                                              <td>{{$vacancy->employee->last_name . ' ' .$vacancy->employee->first_name  }}</td>
                                                            </tr>
                                                            <tr>
                                                                    <td><b> Salary : </b></td>
                                                                    <td>{{$vacancy->offer_salary}}</td>
                                                            </tr>
                                                            <tr>
                                                                    <td><b> Salary Cycle : </b></td>
                                                                    <td>{{$vacancy->salary_cycle}}</td>
                                                            </tr>
                                                            <tr>
                                                                    <td><b> Experience Level: </b></td>
                                                                    <td>{{$vacancy->exp_level}}</td>
                                                            </tr>
                                                            <tr>
                                                                    <td><b> Job Category : </b></td>
                                                                    <td>{{$vacancy->category->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                    <td><b> Job Tittle : </b></td>
                                                                    <td>{{$vacancy->jobTitle->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                    <td><b> Job Type : </b></td>
                                                                    <td>{{$vacancy->JobType->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                    <td><b> Location : </b></td>
                                                                    <td>{{$vacancy->province->name}}</td>
                                                            </tr>
                                                          
                                                            <tr>
                                                                    <td><b> closingDate : </b></td>
                                                                    <td>{{$vacancy->closingDate}}</td>
                                                            </tr>
                                                          
                                                          
                                                          </table>

                                            </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="description_edit">                                      
                                            <div class="card-body">
                                                   
                                                            <table class="table">
                                                                   
                                                                    <tr>
                                                                      <td><b>job Description : </b></td>
                                                                      <td>{!! $vacancy->job_description !!}</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td><b>job Requirement : </b></td>
                                                                      <td>{!! $vacancy->job_requirement !!}</td>
                                                                    </tr>
                                                                  
                                                                  </table>
                                                               
                                            </div>
                                                        

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="attachment">                                      
                                                    <div class="card-body">
                                                                <div class="card-header">
                                                                    
                                                                                <div class="pull-right">
                                                                                          
                                                                                        <a onclick="AddVacancyAttachment({{$vacancy->id}});" class="btn btn-primary"  title="Payment"><i class="ti-plus"></i> Add Attachment</a>
                                                                                </div> 
                                                                                <br/>
                                                                                <h3></h3>
                                                                            </div>
                                                            <form action="">
                                                                    <div class="card-body">
                                                                            <div class="row">
                                                                                    @foreach ($vacancy->jobAttachment as $vacancyAttachments)
                                                                                    <div id="candidate_attachment" class="ul_id{{$vacancyAttachments->id}} list" >
                                                                                            <li class="manage-list-row clearfix">   
                                                                                                    <div class="job-info">
                                                                                                            <div class="job-details">
                                                                                                                <small class="job-company"><i class="ti-time"></i><b>Resume</b> : <a href="">{{$vacancyAttachments->file_name}}</a> </small>
                                                                                                                <small class="job-company"><i class="ti-location-pin"></i><b>Attachment_type </b>: {{$vacancyAttachments->attachment_type}}</small>         
                                                                                                                <small class="job-company"><i class="ti-file"></i><b>File Size </b>: {{$vacancyAttachments->file_size}}</small>                                                                            
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="job-buttons">
                                                                                                            <a onclick="EditVacancyResume({{$vacancyAttachments->id}});" class="btn btn-primary"><i class="icon-edit"></i></a>
                                                                                                            <a onclick="DeleteVacancyResume({{$vacancyAttachments->id}});" class="btn btn-danger"><i class="ti-trash"></i></a>
                                                                                                        </div>
                                                                                                </li>
                                                                                    </div>
                                                                                    @endforeach
                                                                            
                                                                            </div>
                                                                    </div>
                                                                   
                                                                    </form>
                                                                       
                                                    </div>                    
                                            </div>
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
    <div id="ModalCandidateEditResume" class="modal fade">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content">
                        <form id="frmVacancyEditResume">
                            <input type="hidden" id="vacancy_resume_id_edit" value="">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="modal-header theme-bg">
                                    <h4 class="modal-title">Vacancy Attachment</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                            <div class="row">
                                            <div class="col-sm-12">
                                                    <label>Resume</label>
                                                    <input  name="resume_file_edit" id="resume_file_edit" type="file" class="form-control">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Old Attachment</label>
                                                    <input class="form-control" type="text" id="old_attachment" name="old_attachment">
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
    <div id="ModalDeleteVacancyResume" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="frmDeleteVacancyResume">
                            <input type="hidden" id="vacancy_delete_id" value="">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="modal-header theme-bg">
                                    <h4 class="modal-title">Vacancy Attachment</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Are You Sure to Delete this Vacancy Attachment?</label>
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
    <div id="ModalCandidateAddResume" class="modal fade">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content">
                        <form id="frmVacancyResume">
                            <input type="hidden" id="vacancy_resume_id" value="">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="modal-header theme-bg">
                                    <h4 class="modal-title">Vacancy Attachment</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                            <div class="row">
                                            <div class="col-sm-12">
                                                    <label>Resume</label>
                                                    <input  name="resume_file" id="resume_file" type="file" class="form-control">
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
@endsection
@section('scripts')
         <script src="/js/backend/vacancy.js"></script>
@endsection