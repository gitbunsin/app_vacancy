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
                                                <input type="text" class="form-control wide-width" placeholder="Search & type" />
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
                                                    <a class="btn btn-primary" onclick="myfunc()" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-plus"></i></a>
                                                </div>
                                                <input type="text" class="form-control wide-width" placeholder="Search & type" />
                                            </div>
                                                <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">#No</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Action</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- @foreach ($company as $key => $companies) --}}
                                                            <tr>
                                                              <th scope="row">1</th>
                                                              <td></td>
                                                              <td></td>
                                                              <td>
                                                                      <a onclick="Edit();"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                      <a onclick="Delete();" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                              </td>
                                                            </tr>  
                                                          {{-- @endforeach --}}
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
@endsection