@extends('backend.layouts.master')
@section('content')
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
                                            <center>
                                              <h1 class="ti-trash" style="font-size:12em;color:#55518a"></h1>
                                              <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                              <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
                                            </center>
                                        </div>
                                        <div class="bhoechie-tab-content">
                                            <center>
                                              <h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
                                              <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                              <h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
                                            </center>
                                        </div>
                                        <div class="bhoechie-tab-content">
                                            <center>
                                              <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
                                              <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                              <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                                            </center>
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
    <!-- /#page-wrapper -->
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
    <script src="{{asset('js/backend/vacancy.js')}}"></script>
    <script src="{{asset('js/backend/paygrade.js')}}"></script>
@endsection