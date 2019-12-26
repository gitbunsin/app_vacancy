@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <!-- /row -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4><span class="ti-home"></span> Welcome  <strong> {{auth()->guard('admin')->user()->name}} </strong> !</h4>
                </div>
                <div class="card-body">
                        <div class="modal-body">
                                <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#info" aria-controls="home" role="tab" data-toggle="tab"> Gender Infomation</a></li>
                                        <li role="presentation"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"> Change Password</a></li>                                    
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content tabs">
                                        <div role="tabpanel" class="tab-pane fade in active" id="info">
                                                <form action="" id="frmEditCandidate">
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <div class="card-body">
                                                        @php
                                                            $admin = auth::guard('admin')->user();
                                                        @endphp
                                                            <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>FullName</label>
                                                                        <input value="{{$admin->name}}" id="name" name="name" type="text" class="form-control" >
                                                                    </div>
                                
                                                                    <div class="col-md-4">
                                                                        <label>Last Name</label>
                                                                        <input value="{{$admin->last_name}}" id="last_name" name="last_name" type="text" class="form-control" >
                                                                    </div>
                                                                   
                                                                    <div class="col-md-4">
                                                                        <label>First Name</label>
                                                                        <input value="{{$admin->first_name}}" id="first_name" name="first_name" type="text" class="form-control" >
                                                                    </div>
                                
                                                                    <div class="col-md-4">
                                                                            <label>Country</label>
                                                                            <select class="form-control">   
                                                                                <option>Gender</option>
                                                                                <option value="1">Male</option>
                                                                                <option value="2">Female</option>
                                                                            </select>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label>Email</label>
                                                                        <input value="{{$admin->email}}" type="text" class="form-control" >
                                                                    </div>
                                            
                                                                    <div class="col-md-4">
                                                                            <label>Phone</label>
                                                                            <input type="text" class="form-control" >
                                                                    </div>
                                            
                                                              
                                                                <div class="col-md-4">
                                                                        <label>Gender</label>
                                                                        <select class="form-control">   
                                                                            <option>Gender</option>
                                                                            <option value="1">Male</option>
                                                                            <option value="2">Female</option>
                                                                        </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <label>Organization</label>
                                                                        <select class="form-control">   
                                                                            <option>Gender</option>
                                                                            <option value="1">Male</option>
                                                                            <option value="2">Female</option>
                                                                        </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <label>Zip Code</label>
                                                                        <input type="text" class="form-control" >
                                                                </div>
                                                                <div class="col-md-12">
                                                                        <label>Address</label>
                                                                        <textarea cols="5" rows="5" name="address" id="address" class="form-control"></textarea>
                                                                </div>
                                        
                                                        </div>
                                                                
                                                    </div>
                                                    <div class="pull-right">
                                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                                                            <input type="submit" class="btn btn-primary" value="Update">
                                                        </div>
                                                </form>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="description">
                                                <form action="" id="frmEditCandidate">
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <div class="card-body">
                                                        <div class="row">

                                                                <div class="col-md-12">
                                                                        <label> Old Password </label>
                                                                        <input type="password" class="form-control" >
                                                                </div>
                            
                                                                <div class="col-md-12">
                                                                        <label>New Password </label>
                                                                        <input type="password" class="form-control" >
                                                                </div>

                                                                <div class="col-md-12">
                                                                            <label>Confirm Password</label>
                                                                            <input type="password" class="form-control" >
                                                                    </div>
                                                        </div>
                                                        <br/>
                                                        <div class="pull-right">
                                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                                                                <input type="submit" class="btn btn-primary" value="Update">
                                                            </div>
                                                    </div>
                                                   
                                                </form>
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
@endsection