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
@php
    use App\Model\JobCategory;
    use App\Model\employee;
    use App\Model\JobType;
    use App\Model\skill;
    use App\Model\location;
    use App\Model\company;
    use App\Model\jobTitle;
    use App\Model\province;
    use App\Model\payment;
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
                <table class="table" id='tbl_vacancy'>
                        <thead>
                            <tr>
                            <th scope="col">#No</th>
                            <th scope="col">Vacancy Name</th>
                            <th scope="col">Hiring Manager</th>
                            <th scope="col">Closing Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>  
                        @foreach ($job as $key => $jobs)
                            <tr id="tr_vacancy{{$jobs->id}}">
                                <th scope="row">{{$key + 1}}</th>
                                <td><a href="{{url('admin/vacancy/'.$jobs->id.'/edit')}}"><strong>{{$jobs->vacancy_name}}</strong></a></td>
                                <td>{{$jobs->employee->last_name . ' ' . $jobs->employee->first_name}}</td>
                                <td>{{$jobs->closingDate}}</td>
                                <td><b class="badge bg-success">{{$jobs->status}}</b></td>
                                <th>
                                    <a onclick="EditVacancy({{$jobs->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                    <a onclick="DeleteVacancy({{$jobs->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                </th>
                            </tr>
                            @endforeach                                
                        </tbody>
                        </table>
                        <div class="flexbox padd-10">
                            <ul class="pagination">
                                <li class="page-item">
                                        {{ $job ->links() }}
                                </li>
                            </ul>
                        </div>
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
            <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="modal-header theme-bg">
            <h4 class="modal-title">Posting Vacancy</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="card-body">
                <div class="modal-body">
                        <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#info" aria-controls="home" role="tab" data-toggle="tab"> Vacancy Info</a></li>
                                <li role="presentation"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"> Requirement / Description</a></li>
                                {{-- <li role="presentation"><a href="#attachment" aria-controls="messages" role="tab" data-toggle="tab">Attachment</a></li> --}}
                            
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabs">
                    
                                <div role="tabpanel" class="tab-pane fade in active" id="info">                                      
                                        <div class="card-body">
                                                        <div class="row">
                                                                <div class="col-lg-6">
                                                                        <label> Vacancy Position </label>
                                                                        <input  name="vacancy_name" id="vacancy_name" type="text" class="form-control">
                                                                    </div>
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
                                                                    <div class="col-lg-6 m-clea">
                                                                            <label>Job Tittle</label>
                                                                            <?php $jobTitle = jobTitle::all(); ?>
                                                                            <select name="job_title_id" id="job_title_id" class="form-control">
                                                                            <option value="">  -- Pleae Select Job Title -- </option>
                                                                                @foreach($jobTitle as $jobTitles)
                                                                                  <option value="{{$jobTitles->id}}">{{$jobTitles->name}}</option>
                                                                               @endforeach
                                                                            </select>
                                                                        </div>
                                                                <div class="col-lg-6">
                                                                    <label> Company  </label>
                                                                    <select class="form-control" required id="company_id" name="company_id">
                                                                        <option value="">  -- Pleae Select Company -- </option>
                                                                        @php $company = company::all(); @endphp
                                                                        @foreach ($company as $companies)
                                                                                <option value="{{$companies->id}}">{{$companies->company_name}}</option>
                                                                        @endforeach
                                                                    </select>
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
                                                                    @php
                                                                        $Payment = payment::with('pricing')->where('admin_id',auth()->guard('admin')->user()->id)->get();
                                                                    @endphp
                                                                    <select class="form-control" id="package_id_payment" name="package_id_payment">
                                                                        <option value=""> -- Please Select Payment</option>
                                                                        @foreach ($Payment  as $item)
                                                                            <option value="{{$item->id}}"> {{$item->amount}} $</option>
                                                                        @endforeach
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

                                                                        <div class="col-sm-6 m-clear">
                                                                                <label>Closing Date</label>
                                                                                <input name="closingDate" id="closingDate" type="text" data-toggle="datepicker" class="form-control">
                                                                            </div>
                                                                        <div class="col-sm-6">
                                                                                <label>@lang('app.salary_cycle') </label>
                                                                            <select class="form-control" name="salary_cycle" id="salary_cycle">
                                                                                    <option value="monthly" {{ old('salary_cycle') == 'monthly' ? 'selected':'' }}>@lang('app.monthly')</option>
                                                                                    <option value="yearly" {{ old('salary_cycle') == 'yearly' ? 'selected':'' }}>@lang('app.yearly')</option>
                                                                                    <option value="weekly" {{ old('salary_cycle') == 'weekly' ? 'selected':'' }}>@lang('app.weekly')</option>
                                                                                    <option value="daily" {{ old('salary_cycle') == 'daily' ? 'selected':'' }}>@lang('app.daily')</option>
                                                                                    <option value="hourly" {{ old('salary_cycle') == 'hourly' ? 'selected':'' }}>@lang('app.hourly')</option>
                                                    
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                    <label>@lang('app.exp_level')</label>
                                                                                    <select class="form-control" name="exp_level" id="exp_level">
                                                                                            <option value="mid" {{ old('exp_level') == 'mid' ? 'selected':'' }}>@lang('app.mid')</option>
                                                                                            <option value="entry" {{ old('exp_level') == 'entry' ? 'selected':'' }}>@lang('app.entry')</option>
                                                                                            <option value="senior" {{ old('exp_level') == 'senior' ? 'selected':'' }}>@lang('app.senior')</option>
                                                                                        </select>
                                                                                </div>
                                                                               
                                                                <div class="col-sm-6">
                                                                    <label>locations </label>
                                                                    <?php $location = province::all(); ?>
                                                                    <select name="location_id" id="location_id" class="form-control">
                                                                            <option value="">  -- Pleae Select Location -- </option>
                                                                        @foreach($location as $locations)
                                                                            <option value="{{$locations->id}}">{{$locations->name}}</option>
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
                                                                   
                                                                    <div class="col-lg-6">
                                                                        <div class="row">
                                                                                <div class="col-lg-6">
                                                                                        <label> Min Salary</label>
                                                                                        <input placeholder="$" id="minSalary" name="minSalary" type="number" class="number form-control"/>
                                                                                   </div> 
                                                                                <div class="col-lg-6">
                                                                                        <label> Max Salary</label>
                                                                                      <input placeholder="$"  id="maxSalary" name="maxSalary" type="number" class="number form-control"/>
                                                                                   </div>
                                                                               
                                                                        </div>
                                                                        </div><br/><br/>
                                                                        <div class="col-lg-6">
                                                                                <label></label>
                                                                                <div class="checkbox">
                                                                                        <label><input type="checkbox" name="checkSalary" id="checkSalary" value=""> Negotination</label>
                                                                                      </div>
                                                                        </div>
                                                                
                                                                
                                                        </div>
                                                    </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in" id="description">
                                            <br/>
                                            <div class="row">
                                                    <div class="col-lg-12">
                                                            <label>Job Description </label>
                                                            <textarea class="form-control job_description" id="job_description" name="job_description"></textarea>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label>Job Requirement</label>
                                                        <textarea class="form-control responsibilities" id="responsibilities" name="responsibilities"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                                        <input type="submit" class="btn btn-primary" value="Save">
                                    </div>
                            </div>
                            
                        </div>
                       
                </div>
       
    </form>
</div>
</div>
</div>


{{-- //Edit --}}
<div id="ModalEditVacacny" class="modal fade">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
       
            <div class="modal-header theme-bg">
                <h4 class="modal-title">Posting Vacancy</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form  id="frmEditModalVacancy">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="vacancy_id_edit">
            <div class="card-body">
                   
                    <div class="modal-body">
                            <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#info_edit" aria-controls="home" role="tab" data-toggle="tab"> Vacancy Info</a></li>
                                    <li role="presentation"><a href="#description_edit" aria-controls="description" role="tab" data-toggle="tab"> Requirement / Description</a></li>
                                    {{-- <li role="presentation"><a href="#apply" aria-controls="messages" role="tab" data-toggle="tab">How to apply</a></li> --}}
                                
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabs">
                        
                                    <div role="tabpanel" class="tab-pane fade in active" id="info_edit">                                      
                                            <div class="card-body">
                                                            <div class="row">
                                                                    <div class="col-lg-6">
                                                                            <label> Vacancy Position </label>
                                                                            <input  name="vacancy_name_edit" id="vacancy_name_edit" type="text" class="form-control">
                                                                        </div>
                                                                    <div class="col-lg-6">
                                                                            <label> Job Category </label>
                                                                            <select class="form-control" required id="job_category_vacancy_id_edit" name="job_category_vacancy_id_edit">
                                                                                <option value="">  -- Pleae Select Job Tittle -- </option>
                                                                                @php $j = JobCategory::all(); @endphp
                                                                                @foreach ($j as $js)
                                                                                     <option value="{{$js->id}}"> {{$js->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6 m-clea">
                                                                                <label>Job Tittle</label>
                                                                                <?php $jobTitle = jobTitle::all(); ?>
                                                                                <select name="job_title_id_edit" id="job_title_id_edit" class="form-control">
                                                                                <option value="">  -- Pleae Select Job Title -- </option>
                                                                                    @foreach($jobTitle as $jobTitles)
                                                                                      <option value="{{$jobTitles->id}}">{{$jobTitles->name}}</option>
                                                                                   @endforeach
                                                                                </select>
                                                                            </div>
                                                                    <div class="col-lg-6">
                                                                        <label> Company  </label>
                                                                        <select class="form-control" required id="company_id_edit" name="company_id_edit">
                                                                            <option value="">  -- Pleae Select Company -- </option>
                                                                            @php $company = company::all(); @endphp
                                                                            @foreach ($company as $companies)
                                                                                    <option value="{{$companies->id}}">{{$companies->company_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                
                                                                  <div class="col-lg-6">
                                                                        <label> Hiring Manager </label>
                                                                        <select class="form-control" required id="hiring_manager_id_edit" name="hiring_manager_id_edit">
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
                                                                            <option value="1">3,00000 $</option>
                                                                            <option value="2">4,00000 $</option>
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
    
                                                                   
                                                                   
                                                                       
    
                                                                            <div class="col-sm-6 m-clear">
                                                                                    <label>Closing Date</label>
                                                                                    <input name="closingDate_edit" id="closingDate_edit" type="text" data-toggle="datepicker" class="form-control">
                                                                                </div>
                                                                            <div class="col-sm-6">
                                                                                    <label>@lang('app.salary_cycle') </label>
                                                                                @php
                                                                                    $salary = array('monthly','yearly','weekly','daily','hourly');
                                                                                @endphp
                                                                                <select class="form-control" name="salary_cycle_edit" id="salary_cycle_edit">
                                                                                      
                                                                                        @foreach ($salary as $salaries)
                                                                                            <option value="{{$salaries}}" >{{$salaries}}</option>
                                                                                        @endforeach
                                                                                </select>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                        @php
                                                                                        $level= array('mid', 'entry', 'senior');
                                                                                    @endphp
                                                                                    <label>@lang('app.exp_level') </label>
                                                                                    <select class="form-control" name="exp_level_id" id="exp_level_id">
                                                                                          
                                                                                            @foreach ($level as $levels)
                                                                                                <option value="{{$levels}}" >{{$levels}}</option>
                                                                                            @endforeach
                                                                                    </select>
                                                                                    </div>
                                                                                   
                                                                    <div class="col-sm-6">
                                                                        <label>locations </label>
                                                                        <?php $location = province::all(); ?>
                                                                        <select name="location_id_edit" id="location_id_edit" class="form-control">
                                                                                <option value="">  -- Pleae Select Location -- </option>
                                                                            @foreach($location as $locations)
                                                                                <option value="{{$locations->id}}">{{$locations->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                            <label> Skills</label>
                                                                            <?php $skill = skill::all(); ?>
                                                                            <select class="multiple-skill form-control" id="skill_id_edit" name="skill[]" multiple="multiple">
                                                                                @foreach($skill as $skills)
                                                                                    <option value="{{$skills->id}}">{{$skills->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                                <div class="row">
                                                                                        <div class="col-lg-6">
                                                                                                <label> Min Salary</label>
                                                                                                <input placeholder="$" id="minSalaryEdit" name="minSalaryEdit" type="text" class="number form-control"/>
                                                                                           </div> 
                                                                                        <div class="col-lg-6">
                                                                                                <label> Max Salary</label>
                                                                                              <input placeholder="$"  id="maxSalaryEdit" name="maxSalaryEdit" type="text" class="number form-control"/>
                                                                                           </div>
                                                                                       
                                                                                </div>
                                                                                </div><br/><br/>
                                                                                <div class="col-lg-6">
                                                                                        <label></label>
                                                                                        <div class="checkbox">
                                                                                                <label><input type="checkbox" name="checkSalaryEdit" id="checkSalaryEdit" value=""> Negotination</label>
                                                                                              </div>
                                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade in" id="description_edit">
                                                <br/>
                                                <div class="row">
                                                        <div class="col-lg-12">
                                                                <label>Job Description </label>
                                                                <textarea class="form-control job_description" id="job_description_edit" name="job_description"></textarea>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label>Job Requirement</label>
                                                            <textarea class="form-control responsibilities" id="responsibilities_edit" name="responsibilities"></textarea>
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