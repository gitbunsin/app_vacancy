@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\city;use App\Model\country;use App\Model\employee;
    use App\Model\role;
@endphp
<style>
        .error {
            color : red;
        }
</style>
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <div class="pull-right">
                            <a class="btn btn-primary" onclick="myfunc()" data-toggle="tooltip" data-placement="top" title="User"><i class="ti-plus"></i></a>
                        </div>
                        <input type="text" class="form-control wide-width" placeholder="Search & type" />
                    </div>
                    <div class="card-body">
                            <table class="table" id='user_tbl_id'>
                                    <thead>
                                      <tr>
                                        <th scope="col">#No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>  
                                    @foreach ($user as $key => $users)
                                        <tr id="tbl_user{{$users->id}}">
                                            <th scope="row">{{$key + 1}}</th>
                                            <td style="color:red;"><a href=""><strong>{{$users->username}}</strong></a></td>
                                            <td>{{$users->email}}</td></td>
                                            @if ($users->verified == "1")
                                                <td><b class="badge bg-success">Verified</b></td>
                                            @else
                                                <td><b class="badge bg-warning">Not Verified</b></td>
                                            @endif
                                            <th>
                                                <a onclick="EditUser({{$users->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                <a onclick="DeleteUser({{$users->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                            </th>
                                        </tr>
                                      @endforeach
                                  
                                    </tbody>
                                  </table>
                        <div class="flexbox padd-10">
                            <ul class="pagination">
                                <li class="page-item">
                                        {{-- {{ $company->links() }} --}}
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
    <!-- /#page-wrapper -->
 <!-- /#Delete -->
 <div id="Delete" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmUserDelete">
                    <input type="hidden" name="" val="" id="user_id">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title">User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h5> Do you want to delete this User ? </h5>
                    </div>
                    <div class="modal-footer">
                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="No">
                            <input type="submit" class="btn btn-success" value="Yes">
                    </div>
                </form>
            </div>
        </div>
 </div>
 <!-- Edit Company -->
 <div id="EditUser" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmUserloginEdit">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="id_user_edit" id="id_user_edit">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title">User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">          
                                        <!-- Social Accounts -->
                                            <div class="card-header">
                                                <h4>Login Accounts</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Employee</label>
                                                        <?php $employee = employee::all();?>
                                                        <select class="form-control" id="employee_id_edit" name="employee_id_edit">
                                                                <option value=""> -- Select Employee -- </option>
                                                            @foreach( $employee as $employees)
                                                                <option value="{{$employees->id}}">{{$employees->last_name . ' ' .$employees->first_name  }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                            <label>Role</label>
                                                            <?php $role = Role::all();?>
                                                            <select class="form-control" id="role_id_edit" name="role_id_edit">
                                                                <option value=""> -- Select Role -- </option>
                                                                @foreach( $role as $roles)
                                                                    <option value="{{$roles->id}}">{{$roles->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    <div class="col-sm-6">
                                                        <label>UserName</label>
                                                        <input name="username_edit" id="username_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Email +</label>
                                                        <input name="email_edit" id="email_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Password</label>
                                                        <input name="password_edit" id="password_edit" type="password" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Confirm Password</label>
                                                        <input name="confirm_password_edit" id="confirm_password_edit" type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>	
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Send Message -->
<div id="addUser" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmUserlogin">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title">Create User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">          
                                        <!-- Social Accounts -->
                                            <div class="card-header">
                                                <h4>Login Accounts</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Employee</label>
                                                        <?php $employee = employee::all();?>
                                                        <select class="form-control" id="employee_id" name="employee_id">
                                                                <option value=""> -- Select Employee -- </option>
                                                            @foreach( $employee as $employees)
                                                                <option value="{{$employees->id}}">{{$employees->last_name . ' ' .$employees->first_name  }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                            <label>Role</label>
                                                            <?php $role = Role::all();?>
                                                            <select class="form-control" id="role_id" name="role_id">
                                                                <option value=""> -- Select Role -- </option>
                                                                @foreach( $role as $roles)
                                                                    <option value="{{$roles->id}}">{{$roles->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    <div class="col-sm-6">
                                                        <label>UserName</label>
                                                        <input name="username" id="username" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Email +</label>
                                                        <input name="email" id="email" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Password</label>
                                                        <input name="password" id="password" type="password" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Confirm Password</label>
                                                        <input name="confirm_password" id="confirm_password" type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>	
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
            <script src="/js/backend/user_management.js"></script>
    @endsection