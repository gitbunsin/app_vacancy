@extends('backend.layouts.master')
@section('content')

{{-- <style>
.select2-container {
    width: 100% !important;
    padding: 0;
}
.skill_id_edit{
    width: 100% !important;
    padding: 0;
}
.smpl-step {
        margin-top: 40px;
    }
    .smpl-step {
        border-bottom: solid 1px #e0e0e0;
        padding: 0 0 10px 0;
    }

    .smpl-step > .smpl-step-step {
        padding: 0;
        position: relative;
    }   

    .smpl-step > .smpl-step-step .smpl-step-num {
        font-size: 17px;
        margin-top: -20px;
        margin-left: 47px;
    }

    .smpl-step > .smpl-step-step .smpl-step-info {
        font-size: 14px;
        padding-top: 27px;
    }

    .smpl-step > .smpl-step-step > .smpl-step-icon {
        position: absolute;
        width: 70px;
        height: 70px;
        display: block;
        background: #5CB85C;
        top: 45px;
        left: 50%;
        margin-top: -35px;
        margin-left: -15px;
        border-radius: 50%;
    }

    .smpl-step > .smpl-step-step > .progress {
        position: relative;
        border-radius: 0px;
        height: 8px;
        box-shadow: none;
        margin-top: 37px;
    }

   .smpl-step > .smpl-step-step > .progress > .progress-bar {
       width: 0px;
       box-shadow: none;
       background: #428BCA;
   }

    .smpl-step > .smpl-step-step.complete > .progress > .progress-bar {
        width: 100%;
    }

    .smpl-step > .smpl-step-step.active > .progress > .progress-bar {
        width: 50%;
    }

    .smpl-step > .smpl-step-step:first-child.active > .progress > .progress-bar {
        width: 0%;
    }

    .smpl-step > .smpl-step-step:last-child.active > .progress > .progress-bar {
        width: 100%;
    }

    .smpl-step > .smpl-step-step.disabled > .smpl-step-icon {
        background-color: #f5f5f5;
    }

    .smpl-step > .smpl-step-step.disabled > .smpl-step-icon:after {
        opacity: 0;
    }

    .smpl-step > .smpl-step-step:first-child > .progress {
        left: 50%;
        width: 50%;
    }

    .smpl-step > .smpl-step-step:last-child > .progress {
        width: 50%;
    }

    .smpl-step > .smpl-step-step.disabled a.smpl-step-icon {
        pointer-events: none;
    }
</style> --}}
@php
    use App\Model\JobCategory;
    use App\Model\employee;
    use App\Model\JobType;
    use App\Model\skill;
    use App\Model\location;
@endphp

{{-- <div class="container">
        <div class="row smpl-step" style="border-bottom: 0; min-width: 500px;">
            <div class="col-xs-3 smpl-step-step complete">
                <div class="text-center smpl-step-num">Our Packages</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a class="smpl-step-icon"><i class="fa fa-user" style="font-size: 60px; padding-left: 12px; padding-top: 3px; color: black;"></i></a>
                <div class="smpl-step-info text-center">Registe User via control panel.</div>
            </div>
    
            <div class="col-xs-3 smpl-step-step ">           
                <div class="text-center smpl-step-num">Step 2</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a class="smpl-step-icon"><i class="fa fa-dollar" style="font-size: 60px; padding-left: 18px; padding-top: 5px; color: black;"></i></a>
                <div class="smpl-step-info text-center">Process Payment and fill out all required fields.</div>
            </div>
            <div class="col-xs-3 smpl-step-step">          
                <div class="text-center smpl-step-num">Step 3</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a class="smpl-step-icon"><i class="fa fa-repeat" style="font-size: 60px; padding-left: 7px; padding-top: 7px; color: black;"></i></a>
                <div class="smpl-step-info text-center">Confirm Data entered in step 2.</div>
            </div>
            <div class="col-xs-3 smpl-step-step">           
                <div class="text-center smpl-step-num">Step 4</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a class="smpl-step-icon"><i class="fa fa-download" style="font-size: 60px; padding-left: 8px; padding-top: 4px; color: black; opacity: 0.3;"></i></a>
                <div class="smpl-step-info text-center">Download product after receiving confirmation email.</div>
            </div>
        </div>
    </div> --}}
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
            {{-- <a onclick="AddVacancy();" class=" pull-right btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Add Attachment"> Add </a> --}}
            {{-- <a href="{{url('admin/job/create')}}" class=" pull-right btn btn-cancel manage-btn" title="Add Attachment"> <i class="ti-plus"></i> Add </a> --}}
            <a href="{{url('admin/job/create')}}" class="btn btn-primary pull-right"  title="Payment"><i class="ti-plus"></i> Add Candidate</a> &nbsp;&nbsp;&nbsp;
            <input type="text" class="form-control wide-width" placeholder="Search & type" />
        </div>
        <div class="card-body">
                <table class="table" id='tbl_vacancy'>
                        <thead>
                            <tr>
                            <th scope="col">#No</th>
                            <th scope="col">Vacancy Name</th>
                            <th scope="col">Closing Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>  
                        @foreach ($job as $key => $jobs)
                            <tr id="tr_vacancy{{$jobs->id}}">
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{$jobs->vacancy_name}}</td>
                                <td>{{$jobs->closingDate}}</td>
                                <td style="color:cadetblue;">{{$jobs->status}}</td>
                                <th>
                                    <a onclick="EditVacancy({{$jobs->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                    <a onclick="DeleteVacancy({{$jobs->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
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
    <form method="POST" id="frmAddModalVacancy">
        <div class="modal-header theme-bg">
            <h4 class="modal-title">Posting Vacancy</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
                <div class="demo">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab" role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#info" aria-controls="home" role="tab" data-toggle="tab"> Gengeral Information</a></li>
                                        <li role="presentation"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"> Responsibilities / Requirement</a></li>
                                        <li role="presentation"><a href="#apply" aria-controls="messages" role="tab" data-toggle="tab"> How to apply</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content tabs">
                                        <div role="tabpanel" class="tab-pane fade in active" id="info">
                                                <div class="card-body">
                                                        <div class="row">
                                                                <div class="col-lg-6">
                                                                        <label> Job Category </label>
                                                                        <select class="form-control" required id="job_category_vacancy_id" name="job_category_vacancy_id">
                                                                            <option value="">  -- Pleae Select Job Tittle -- </option>
                                                                            @php $j = JobCategory::all(); @endphp
                                                                            @foreach ($j as $js)
                                                                                 <option value="{{$js->id}}"> {{$js->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                              <div class="col-lg-6">
                                                                  <label> Vacancy Name </label>
                                                                  <input  name="vacancy_name" id="vacancy_name" type="text" class="form-control">
                                                              </div>
                                                              <div class="col-lg-6">
                                                                    <label> Hiring Manager </label>
                                                                    <select class="form-control" required id="hiring_manager_id" name="hiring_manager_id">
                                                                        <option value="">  -- Pleae Select Employee -- </option>
                                                                        @php $employee = employee::all(); @endphp
                                                                        @foreach ($employee as $employees)
                                                                             <option value="{{$employees->id}}">{{$employees->first_name}}  {{$employees->last_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Package</label>
                                                                    <select class="form-control">
                                                                        <option>2,00000 CTC</option>
                                                                        <option value="1">3,00000 CTC</option>
                                                                        <option value="2">4,00000 CTC</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Job Type</label>
                                                                    <?php $jobType = JobType::all(); ?>
                                                                    <select name="job_type_id" id="job_type_id" class="form-control">
                                                                    <option value="">  -- Pleae Select Job Type -- </option>

                                                                        @foreach($jobType as $JobTypes)
                                                                          <option value="{{$JobTypes->id}}">{{$JobTypes->name}}</option>
                                                                       @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label> Skills</label>
                                                                    <?php $skill = skill::all(); ?>
                                                                    <select class="multiple-skill form-control" id="skill_id" name="skill[]" multiple="multiple">
                                                                        @foreach($skill as $skills)
                                                                            <option value="{{$skills->id}}">{{$skills->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>locations </label>
                                                                    <?php $location = location::all(); ?>
                                                                    <select name="location_id" id="location_id" class="form-control">
                                                                            <option value="">  -- Pleae Select Location -- </option>
                                                                        @foreach($location as $locations)
                                                                            <option value="{{$locations->id}}">{{$locations->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 m-clear">
                                                                    <label>Closing Date</label>
                                                                    <input name="closingDate" id="closingDate" type="text" data-toggle="datepicker" class="form-control">
                                                                </div>
                                                        </div>
                                                    </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in" id="description">
                                            <div class="row">
                                                    <div class="col-lg-12">
                                                            <label>Job Description / Requirement</label>
                                                            <textarea class="form-control job_description" id="job_description" name="job_description"></textarea>
                                                        </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in" id="apply">
                                                <div class="row">
                                                        <div class="col-lg-12">
                                                                <label>How to apply </label>
                                                                <textarea  name="description" id="description" class="form-control" cols='5' rows='5'></textarea>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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


{{-- //Edit --}}
<div id="ModalEditVacacny" class="modal fade">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form method="POST" id="frmEditModalVacancy">
            <input type="hidden" id="vacancy_id_edit">
            <div class="modal-header theme-bg">
                <h4 class="modal-title">Posting Vacancy</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                    <div class="demo">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tab" role="tabpanel">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#info_edit" aria-controls="home" role="tab" data-toggle="tab"> Gengeral Information</a></li>
                                            <li role="presentation"><a href="#description_edit" aria-controls="description" role="tab" data-toggle="tab"> Responsibilities / Requirement</a></li>
                                            <li role="presentation"><a href="#apply_edit" aria-controls="messages" role="tab" data-toggle="tab"> How to apply</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs">
                                            <div role="tabpanel" class="tab-pane fade in active" id="info_edit">
                                                    <div class="card-body">
                                                            <div class="row">
                                                                    <div class="col-lg-6">
                                                                            <label> Job Category </label>
                                                                            <select class="form-control" required id="job_category_vacancy_id_edit" name="job_category_vacancy_id_edit">
                                                                                <option value="">  -- Pleae Select category -- </option>
                                                                                @php $j = JobCategory::all(); @endphp
                                                                                @foreach ($j as $js)
                                                                                     <option value="{{$js->id}}"> {{$js->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                  <div class="col-lg-6">
                                                                      <label> Vacancy Name </label>
                                                                      <input  name="vacancy_name_edit" id="vacancy_name_edit" type="text" class="form-control">
                                                                  </div>
                                                                  <div class="col-lg-6">
                                                                        <label> Hiring Manager </label>
                                                                        <select class="form-control" required id="hiring_manager_id" name="hiring_manager_id">
                                                                            <option value="">  -- Pleae Select Employee -- </option>
                                                                            @php $employee = employee::all(); @endphp
                                                                            @foreach ($employee as $employees)
                                                                                 <option value="{{$employees->id}}">{{$employees->first_name}}  {{$employees->last_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>Package</label>
                                                                        <select class="form-control">
                                                                            <option>2,00000 CTC</option>
                                                                            <option value="1">3,00000 CTC</option>
                                                                            <option value="2">4,00000 CTC</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>Job Type</label>
                                                                        <?php $jobType = JobType::all(); ?>
                                                                        <select name="job_type_id_edit" id="job_type_id_edit" class="form-control">
                                                                        <option value="">  -- Pleae Select Job Type -- </option>
                                                                            @foreach($jobType as $JobTypes)
                                                                              <option value="{{$JobTypes->id}}">{{$JobTypes->name}}</option>
                                                                           @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label> Skills</label>
                                                                        <?php $skill = skill::all(); ?>
                                                                        <select class="multiple-skill form-control" id="skill_id_edit" name="skill_edit[]" multiple="multiple">
                                                                            @foreach($skill as $skills)
                                                                                <option value="{{$skills->id}}">{{$skills->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label>locations </label>
                                                                        <?php $location = location::all(); ?>
                                                                        <select name="location_id_edit" id="location_id_edit" class="form-control">
                                                                                <option value="">  -- Pleae Select Location -- </option>
                                                                            @foreach($location as $locations)
                                                                                <option value="{{$locations->id}}">{{$locations->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-6 m-clear">
                                                                        <label>Closing Date</label>
                                                                        <input name="closingDate_edit" id="closingDate_edit" type="text" data-toggle="datepicker" class="form-control">
                                                                    </div>
                                                            </div>
                                                        </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade in" id="description_edit">
                                                <div class="row">
                                                        <div class="col-lg-12">
                                                                <label>Job Description / Requirement</label>
                                                                <textarea class="form-control job_description" id="job_description_eidt" name="job_description_eidt"></textarea>
                                                            </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade in" id="apply_edit">
                                                    <div class="row">
                                                            <div class="col-lg-12">
                                                                    <label>How to apply </label>
                                                                    <textarea  name="description" id="description" class="form-control" cols='5' rows='5'></textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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


<div id="frmDeleteVacancy" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmVacancy">
                <input type="hidden" id="vacancy_id" value="">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="modal-header theme-bg">
                        <h4 class="modal-title">Job</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Are You Sure to Delete this vacancy?</label>
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
        <!-- Modal: modalPoll -->


@endsection
@section('scripts')
    <script src="{{asset('js/backend/vacancy.js')}}"></script>
@endsection