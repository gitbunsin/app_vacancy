@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\employee;
@endphp
<div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                            <div class="col-lg-11 col-md-5 col-sm-8 col-xs-10 bhoechie-tab-container">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                                      <div class="list-group">
                                        <a href="#"  class="list-group-item active text-center">
                                              Job Title
                                        </a>
                                        <a href="#"  class="list-group-item text-center">
                                              Pay Grades<br/>
                                        </a>
                                        <a href="#" class="list-group-item text-center">
                                              Employement Status<br/>
                                        </a>
                                        <a href="#" class="list-group-item text-center">
                                            Job Categories<br/>
                                        </a>
                                        <a href="#" class="list-group-item text-center">
                                            Work Shift<br/>
                                        </a>
                                      </div>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9 col-xs-9 bhoechie-tab">
                                        <!-- flight section -->
                                        <div class="bhoechie-tab-content active">
                                            <div class="card-header">
                                                <div class="pull-right">
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="Job Title"><i class="ti-plus"></i></a>
                                                </div>
                                                <h3><span class="ti-home"></span> Job Title</h3>
                                            </div>
                                                <table class="table" id="tbl_job_title">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">#No</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Action</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          @foreach ($jobTitle as $key => $item)
                                                          <tr id="tr_job_title{{$item->id}}">
                                                              <th scope="row">{{$key + 1}}</th>
                                                              <td>{{$item->name}}</td>
                                                              <td>{{$item->description}}</td>
                                                              <th>
                                                                    <a onclick="EditJobTitle({{$item->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                    <a onclick="DeleteJobTitle({{$item->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                              </th>
                                                            </tr>  
                                                          @endforeach
                                                        </tbody>
                                                      </table>
                                        </div>
                                        <!-- train section -->
                                        <div class="bhoechie-tab-content">
                                            <div class="card-header">
                                                <div class="pull-right">
                                                    <a class="btn btn-primary" onclick="LoadModalPayGrade()" data-toggle="tooltip" data-placement="top" title="PayGrade"><i class="ti-plus"></i></a>
                                                </div>
                                                <h3><span class="ti-home"></span> Pay Grades</h3>
                                            </div>
                                                <table class="table" id="tab_pay_grade">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">#No</th>
                                                            <th>PayGrade</th>
                                                            <th>Currency</th>
                                                            <th>Max Salary </th>
                                                            <th>Min Salary </th>
                                                            <th scope="col">Action</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          @foreach ($payGrade as $key => $item)
                                                          <tr id="tr_pay_grade{{$item->id}}">
                                                              <th scope="row">{{$key + 1}}</th>
                                                              <td>{{$item->name}}</td>
                                                              <td>
                                                                @if ($item->currency->isEmpty())
                                                                    
                                                                @else
                                                                    @foreach ($item->currency as $currencies)
                                                                         {{$currencies->name}}
                                                                    @endforeach
                                                                @endif

                                                              </td>
                                                              <td>{{$currencies->pivot->max_salary}}</td>
                                                              <td>{{$currencies->pivot->min_salary}}</td>
                                                              <th>
                                                                    <a onclick="EditPayGrade({{$item->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                    <a onclick="DeletePayGrade({{$item->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                              </th>
                                                            </tr>  
                                                          @endforeach
                                                        </tbody>
                                                      </table>
                                        </div>
                            
                                        <!-- hotel search -->
                                        <div class="bhoechie-tab-content">
                                          <div class="card-header">
                                            <div class="pull-right">
                                                <a class="btn btn-primary" onclick="LoadStatus()" data-toggle="tooltip" data-placement="top" title="Status"><i class="ti-plus"></i></a>
                                            </div>
                                            <h3><span class="ti-home"></span> Employee Status</h3>
                                        </div>
                                            <table class="table" id="tbl_status">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">#No</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach ($status as $key => $statuses)
                                                      <tr id="tr_status{{$statuses->id}}">
                                                          <th scope="row">{{$key + 1}}</th>
                                                          <td>{{$statuses->name}}</td>
                                                          <th>
                                                                <a onclick="EditStatus({{$statuses->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                <a onclick="DeleteStatus({{$statuses->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                          </th>
                                                        </tr>  
                                                      @endforeach
                                                    </tbody>
                                                  </table>
                                        </div>
                                        <div class="bhoechie-tab-content">
                                          <div class="card-header">
                                            <div class="pull-right">
                                                <a class="btn btn-primary" onclick="LoadCategory()" data-toggle="tooltip" data-placement="top" title="Category"><i class="ti-plus"></i></a>
                                            </div>
                                            <h3><span class="ti-home"></span> Job Category</h3>
                                        </div>
                                            <table class="table" id="tbl_category">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">#No</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach ($category as $key => $categories)
                                                      <tr id="tr_category{{$categories->id}}">
                                                          <th scope="row">{{$key + 1}}</th>
                                                          <td>{{$categories->name}}</td>
                                                          <th>
                                                                <a onclick="Editcategory({{$categories->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                <a onclick="Deletecategory({{$categories->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                          </th>
                                                        </tr>  
                                                      @endforeach
                                                    </tbody>
                                                  </table>
                                        </div>
                                        <div class="bhoechie-tab-content">
                                          <div class="card-header">
                                            <div class="pull-right">
                                                <a class="btn btn-primary" onclick="LoadWorkShift()" data-toggle="tooltip" data-placement="top" title="WorkShift"><i class="ti-plus"></i></a>
                                            </div>
                                            <h3><span class="ti-home"></span> Employee WorkShift</h3>
                                        </div>
                                            <table class="table" id="tbl_work_shift">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">#No</th>
                                                        <th>Shift Name</th>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>Duration</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach ($workShifts as $key => $workShift)
                                                        <tr id="tr_work_shift{{$workShift->id}}">
                                                            <th scope="row">{{$key + 1}}</th>
                                                            <td>{{$workShift->name}}</td>
                                                            <td>{{$workShift->start_time}}</td>
                                                            <td>{{$workShift->end_time}}</td>
                                                            <td>{{$workShift->hours_per_day}}</td>
                                                            <th>
                                                                <a onclick="EditWorkShift({{$workShift->id}});"  class="btn btn-primary"  title="Edit"><i class="icon-edit"></i></a>
                                                                <a onclick="DeleteWorkShift({{$workShift->id}});" class="btn btn-danger" title="Delete"><i class="ti-trash"></i></a>
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
        </div>
        <!-- /row -->
    </div>
    </div>
    <!-- /#Load WorkShift -->
    <div id="ModalWorkShiftEdit" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmEditWorkShift">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="" val="" id="work_shift_id_edit">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title"> Work Shift</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                              <div class="col-lg-12">
                                      <label> Shift Name </label>
                                      <input  name="name_edit" id="name_edit" type="text" class="form-control">
                              </div>
                                <div class="col-lg-5">
                                    <label> Work Hour From :  </label>
                                    <input    name="start_time_edit" id="start_time_edit" type="time" class="form-control Time_edit_1">
                                </div>
                                <div class="col-lg-5">
                                    <label> To </label>
                                    <input   name="end_time_edit" id="end_time_edit" type="time" class="form-control Time_edit_2">
                                </div>
                                <div class="col-lg-2">
                                    <label> Duration  </label>
                                    <input  disabled value="0" name="duration_edit" id="duration_edit" type="text" class="form-control Hours_edit">
                                </div>
                              <div class="col-lg-12">
                                <select multiple="multiple" data-json="false" size="10" id="duallistbox_demo2_edit" name="duallistbox_demo2[]" class="demo2">
                                  @php
                                        $employees = employee::all();
                                  @endphp
                                  @foreach ($employees as $employee)
                                     <option value="{{$employee->id}}">{{$employee->last_name .' '.$employee->first_name}}</option>  
                                  @endforeach
                                
                                </select>
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
  



    <div id="ModalDeleteWorkShift" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmDeleteWorkShift">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="" val="" id="work_shift_id">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title"> WorkShift </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h5> Do you want to delete WorkShift ? </h5>
                    </div>
                    <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                            <input type="submit" class="btn btn-primary" value="Yes">
                    </div>
                </form>
            </div>
        </div>
      </div>


    <div id="ModalWorkShift" class="modal fade">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <form id="frmAddWorkShift">
                  <meta name="csrf-token" content="{{ csrf_token() }}">
                  <input type="hidden" name="" val="" id="work_shift_id">
                  <div class="modal-header theme-bg">						
                      <h4 class="modal-title"> Work Shift</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                      <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                                    <label> Shift Name </label>
                                    <input  name="name" id="name" type="text" class="form-control">
                            </div>
                              <div class="col-lg-5">
                                  <label> Work Hour From :  </label>
                                  <input value="08:00"  name="start_time" id="start_time" type="time" class="form-control Time1">
                              </div>
                              <div class="col-lg-5">
                                  <label> To </label>
                                  <input   name="end_time" id="end_time" type="time" class="form-control Time2">
                              </div>
                              <div class="col-lg-2">
                                  <label> Duration  </label>
                                  <input  disabled value="0" name="duration" id="duration" type="text" class="form-control Hours">
                              </div>
                            <div class="col-lg-12">
                              <select multiple="multiple" size="10" id="duallistbox_demo2" name="duallistbox_demo2[]" class="demo2">
                                @php
                                      $employees = employee::all();
                                @endphp
                                @foreach ($employees as $employee)
                                   <option value="{{$employee->id}}">{{$employee->last_name .' '.$employee->first_name}}</option>  
                                @endforeach
                              
                              </select>
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

<!-- /#JobCategory -->

<div id="ModalEditJobCategory" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="frmEditCategory">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <input type="hidden" name="" val="" id="category_edit_id">
              <div class="modal-header theme-bg">						
                  <h4 class="modal-title"> Job Category</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <div class="card-body">
                      <div class="row">
                        <div>
                            <div>
                                <label> Name </label>
                                <input  name="category_name_edit" id="category_name_edit" type="text" class="form-control">
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                      <input type="submit" class="btn btn-primary" value="Yes">
              </div>
          </form>
      </div>
  </div>
</div>


<div id="ModalAddJobCategory" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="frmAddCategory">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <input type="hidden" name="" val="" id="category_id">
              <div class="modal-header theme-bg">						
                  <h4 class="modal-title"> Job Category</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <div class="card-body">
                      <div class="row">
                        <div>
                            <div>
                                <label> Name </label>
                                <input  name="category_name" id="category_name" type="text" class="form-control">
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                      <input type="submit" class="btn btn-primary" value="Yes">
              </div>
          </form>
      </div>
  </div>
</div>



<div id="DeleteJobCategory" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="frmJobCategoryDelete">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input type="hidden" name="" val="" id="category_id">
              <div class="modal-header theme-bg">						
                  <h4 class="modal-title"> Job Category </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <h5> Do you want to delete Category ? </h5>
              </div>
              <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                      <input type="submit" class="btn btn-primary" value="Yes">
              </div>
          </form>
      </div>
  </div>
</div>


<!-- /#EmployeeStatus -->



<div id="EmployeeEditStatus" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditStatus">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="" val="" id="status_edit_id">
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title"> Employment Status </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                          <div>
                              <div>
                                  <label> Name </label>
                                  <input  name="status_name_edit" id="status_name_edit" type="text" class="form-control">
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                        <input type="submit" class="btn btn-primary" value="Yes">
                </div>
            </form>
        </div>
    </div>
  </div>

<div id="EmployeeStatus" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="frmAddStatus">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <input type="hidden" name="" val="" id="status_id">
              <div class="modal-header theme-bg">						
                  <h4 class="modal-title"> Employment Status </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <div class="card-body">
                      <div class="row">
                        <div>
                            <div>
                                <label> Name </label>
                                <input  name="status_name" id="status_name" type="text" class="form-control">
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                      <input type="submit" class="btn btn-primary" value="Yes">
              </div>
          </form>
      </div>
  </div>
</div>

<div id="DeleteStatus" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmStatusDelete">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="" val="" id="status_id">
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title"> Status </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <h5> Do you want to delete Employment Status ? </h5>
                </div>
                <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                        <input type="submit" class="btn btn-primary" value="Yes">
                </div>
            </form>
        </div>
    </div>
</div>


  <!-- /#PayGrade -->
  <div id="ModalEditPayGrade" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="frmEditPayGrade">
              <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="" val="" id="id_pay_grade_edit">
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title">Pay Grades</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6">
                          <div>
                              <label>Pay Grades  </label>
                              <input  name="pay_grade_name_edit" id="pay_grade_name_edit" type="text" class="form-control">
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div>
                              <label>Currency</label>
                              <select class="form-control" required id="currency_id_edit" name="currency_id_edit">
                                  <option value="">  -- Pleae Select Currency -- </option>
                                @php
                                     use App\Model\currency ;$currency = currency::all();
                                @endphp
                                 @foreach ($currency as $currencies)
                                 <option value="{{$currencies->id}}"> {{$currencies->name}}</option>                                     
                                 @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div>
                              <label> Max Salary </label>
                              <input placeholder="$"  name="max_salary_edit" id="max_salary_edit" type="number" class="form-control">
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div>
                              <label>Min Salary</label>
                              <input placeholder="$" name="min_salary_edit" id="min_salary_edit" type="number" class="form-control">
                          </div>
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

    <div id="DeletePayGrade" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <form id="frmPayGradeDelete">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="hidden" name="" val="" id="pay_grade_id">
                  <div class="modal-header theme-bg">						
                      <h4 class="modal-title"> PayGrade </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                      <h5> Do you want to delete payGrade ? </h5>
                  </div>
                  <div class="modal-footer">
                          <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                          <input type="submit" class="btn btn-primary" value="Yes">
                  </div>
              </form>
          </div>
      </div>
  </div>

    <div id="ModalPayGrade" class="modal fade">
      <div class="modal-dialog  modal-lg">
          <div class="modal-content">
              <form id="frmAddPayGrade">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                  <input type="hidden" name="" val="" id="id_jobTitle">
                  <div class="modal-header theme-bg">						
                      <h4 class="modal-title">Pay Grades</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label>Pay Grades  </label>
                                <input  name="pay_grade_name" id="pay_grade_name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label>Currency</label>
                                <select class="form-control" required id="currency_id" name="currency_id">
                                    <option value="">  -- Pleae Select Currency -- </option>
                                  @php $currency = currency::all(); @endphp
                                   @foreach ($currency as $currencies)
                                   <option value="{{$currencies->id}}"> {{$currencies->name}}</option>
                                       
                                   @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label> Max Salary </label>
                                <input placeholder="$"  name="max_salary" id="max_salary" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label>Min Salary</label>
                                <input placeholder="$" name="min_salary" id="min_salary" type="number" class="form-control">
                            </div>
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
    <!-- Job Title -->
    <div class="modal fade" id="jobTitleEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form id="frmJobTitleEdit">
                <input type="hidden" name="job_tittle_edit" id="job_tittle_edit">
                <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="modal-header" style="background:#0f66e8";>
              <h5 class="modal-title" style="color:white;" id="exampleModalLabel">Edit Job Tittle</h5>
            </div>
            <div class="modal-body">
            <div class="card-body">
                <div class="row">
                    <div>
                        <label>Name</label>
                        <input name="name_edit" id="name_edit" type="text" class="form-control">
                    </div>
                    <div>
                      <label>Description</label>
                      <textarea  name="description_edit" id="description_edit" class="form-control" cols='5' rows='5'></textarea>
                  </div>
                  
                </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>

    <div id="DeleteJobTtile" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmJobTitleDelete">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="" val="" id="id_jobTitle">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title">Job Title</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h5> Do you want to delete job Title? </h5>
                    </div>
                    <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                            <input type="submit" class="btn btn-success" value="Yes">
                    </div>
                </form>
            </div>
        </div>
 </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="frmJobTitle">
          <meta name="csrf-token" content="{{ csrf_token() }}">
      <div class="modal-header" style="background:#0f66e8";>
        <h5 class="modal-title" style="color:white;" id="exampleModalLabel">Job Tittle</h5>
      </div>
      <div class="modal-body">
      <div class="card-body">
          <div class="row">
              <div>
                  <label>Name</label>
                  <input name="name" id="name" type="text" class="form-control">
              </div>
              <div>
                <label>Description</label>
                <textarea  name="description" id="description" class="form-control" cols='5' rows='5'></textarea>
            </div>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('js/backend/workshift.js')}}"></script>
    <script src="{{asset('js/backend/vacancy.js')}}"></script>
    <script src="{{asset('js/backend/paygrade.js')}}"></script>
    <script src="{{asset('js/backend/status.js')}}"></script>
    <script src="{{asset('js/backend/category.js')}}"></script>
   
@endsection