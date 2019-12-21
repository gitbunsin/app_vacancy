@extends('backend.layouts.master')
@section('content')
@php
use App\Model\JobCategory;
use App\Model\employee;
use App\Model\JobType;
use App\Model\skill;
use App\Model\location;
@endphp
    <form action="{{url('admin/job')}}" id='myform' method='post' enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <!-- General Information -->
                <div class="card">

                    <div class="card-header">
                        <h4>General Overview</h4>
                    </div>
                    <div class="card-body">
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
                                    <div role="tabpanel" class="tab-pane fade" id="description">
                                            <div class="card-body">
                                                    <div class="row">
                                                            <div class="col-lg-12">
                                                                    <label>Key Responsibilities:</label>
                                                                    <textarea class="form-control job_description" id="job_description" name="job_description"></textarea>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                        <label>Minimum Requirements:</label>
                                                                        <textarea class="form-control responsibilities" id="responsibilities" name="responsibilities"></textarea>
                                                                </div>
                                                    </div>
                                            </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="apply">
                                            <div class="card-body">
                                                    <div class="row">
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
                                <div class="pull-right">
                                        <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                                        <input type="submit" class="btn btn-primary" value="Save">
                                    </div>
                        </div>
                    </div>
                </div>
               
            </div>
            
        </div>
        
        <!-- /row -->
    </div>
    </div>
    
</form>
    <!-- /#page-wrapper -->

        <script>
            

            function yesnoCheck() {
                if (document.getElementById('yesCheck').checked) {
                    document.getElementById('ifYes').style.visibility = 'visible';
                }
                else document.getElementById('ifYes').style.visibility = 'hidden';
            }

            function YesNoSalary() {
                if (document.getElementById('YesSalary').checked) {
                    document.getElementById('offer_salary').style.visibility = 'visible';
                }
                else document.getElementById('offer_salary').style.visibility = 'hidden';
            }
        </script>
@endsection
@section('scripts')
    <script src="{{asset('js/backend/vacancy.js')}}"></script>
@endsection