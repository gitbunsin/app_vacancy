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
                                            Reporting Methods
                                        </a>
                                        <a href="#"  class="list-group-item text-center">
                                            Termination Reasons
                                              <br/>
                                        </a>
                                      </div>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9 col-xs-9 bhoechie-tab">
                                        <!-- flight section -->
                                        <div class="bhoechie-tab-content active">
                                                <div class="card-header">
                                                        <div class="pull-right">
                                                            <a class="btn btn-primary" onclick="LoadMethods()" data-toggle="tooltip" data-placement="top" title="Method"><i class="ti-plus"></i></a>
                                                        </div>
                                                        <h3><span class="ti-home"></span> Reporting Methods</h3>
                                                    </div>
                                                        <table class="table" id="tbl_method">
                                                                <thead>
                                                                  <tr>
                                                                    <th scope="col">#No</th>
                                                                    <th>Name</th>
                                                                    <th>Action</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach ($method as $key => $methods)
                                                                  <tr id="tr_method{{$methods->id}}">
                                                                      <th scope="row">{{$key + 1}}</th>
                                                                      <td>{{$methods->name}}</td>
                                                                      <th>
                                                                            <a onclick="EditMethod({{$methods->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                            <a onclick="DeleteMethod({{$methods->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
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
                                                                <a class="btn btn-primary" onclick="LoadReason()" data-toggle="tooltip" data-placement="top" title="Reason"><i class="ti-plus"></i></a>
                                                        </div>
                                                        <h3><span class="ti-home"></span> Termination Reasons </h3>
                                                    </div>
                                                        <table class="table" id="tbl_reason">
                                                                <thead>
                                                                  <tr>
                                                                    <th scope="col">#No</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Action</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach ($reason as $key => $reasons)
                                                                  <tr id="tr_reason{{$reasons->id}}">
                                                                      <th scope="row">{{$key + 1}}</th>
                                                                      <td>{{$reasons->name}}</td>
                                                                      <th>
                                                                            <a onclick="EditReason({{$reasons->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                            <a onclick="DeleteReason({{$reasons->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
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
    <!-- /#page-wrapper -->
<!-- /#JobCategory -->

<div id="ModalEditMethod" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="frmEditMethod">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <input type="hidden" name="" val="" id="method_edit_id">
              <div class="modal-header theme-bg">						
                  <h4 class="modal-title"> Reporting Methods </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <div class="card-body">
                      <div class="row">
                        <div>
                            <div>
                                <label> Name </label>
                                <input  name="method_edit_name" id="method_edit_name" type="text" class="form-control">
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


<div id="ModalAddMethod" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="frmAddmethod">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <input type="hidden" name="" val="" id="method_id">
              <div class="modal-header theme-bg">						
                  <h4 class="modal-title"> Reporting Methods </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <div class="card-body">
                      <div class="row">
                        <div>
                            <div>
                                <label> Name </label>
                                <input  name="method_name" id="method_name" type="text" class="form-control">
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

<div id="ModalDeleteMethod" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="frmDeleteMothod">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input type="hidden" name="" val="" id="method_id">
              <div class="modal-header theme-bg">						
                  <h4 class="modal-title"> Reporting Methods</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <h5> Do you want to delete Reporting Methods ? </h5>
              </div>
              <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                      <input type="submit" class="btn btn-primary" value="Yes">
              </div>
          </form>
      </div>
  </div>
</div>

    <!-- Terminal Reasons  -->
    
    <div class="modal fade" id="ModalEditTerminalReason" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form id="frmEditTerminationReason">
                <input type="hidden" name="reason_name_id" id="reason_name_id">
                <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="modal-header" style="background:#0f66e8";>
              <h5 class="modal-title" style="color:white;" id="exampleModalLabel">Edit Job Tittle</h5>
            </div>
            <div class="modal-body">
            <div class="card-body">
                <div class="row">
                    <div>
                        <label>Name</label>
                        <input name="reason_name_edit" id="reason_name_edit" type="text" class="form-control">
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


    <div id="ModalDeleteReason" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmDeleteReason">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="" val="" id="reason_id">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title">Terminal Reasons</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h5> Do you want to delete Terminal Reasons? </h5>
                    </div>
                    <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                            <input type="submit" class="btn btn-success" value="Yes">
                    </div>
                </form>
            </div>
        </div>
 </div>


<div class="modal fade" id="LoadModalAddReason" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="frmAddReason">
          <meta name="csrf-token" content="{{ csrf_token() }}">
      <div class="modal-header" style="background:#0f66e8";>
        <h5 class="modal-title" style="color:white;" id="exampleModalLabel">Terminal Reasons</h5>
      </div>
      <div class="modal-body">
      <div class="card-body">
          <div class="row">
              <div>
                  <label>Name</label>
                  <input name="reason_name" id="reason_name" type="text" class="form-control">
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
    <script src="{{asset('js/backend/method.js')}}"></script>
    <script src="{{asset('js/backend/reasons.js')}}"></script>
@endsection