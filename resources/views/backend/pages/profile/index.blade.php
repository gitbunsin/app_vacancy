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
                                    @php
                                         $admin = auth::guard('admin')->user();
                                    @endphp
                                    <!-- Tab panes -->
                                    <div class="tab-content tabs">
                                        <div role="tabpanel" class="tab-pane fade in active" id="info">
                                                <form action="" id="frmAdminProfile">
                                                    <input type="hidden" id="admin_id" name="admin_id" value="{{$admin->id}}">
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <div class="card-body">
                                                      
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="change-photo">
                                                                            <div class="user-image">
                                                                                @if($admin->profile)
                                                                                    <img class="img-circle" id="preview" src="{{url('uploads/UserCv/'.$admin->profile)}}" width="150px" height="150px"/><br/>
                                                                                @else
                                                                                    <img class="img-circle" id="preview" src="{{asset('images/noimage.jpg')}}" width="150px" height="150px"/><br/>
                                                                                @endif
                                                                                <input type="file"id="image" style="display: none;"/>
                                                                            </div>
                                                                            <br/>
                                                                            <div class="upload-photo">
                                                                                <label class="btn btn-primary" for="upload-photo">
                                                                                        <a style="color:white;" id="upload-photo" href="javascript:changeProfile()">Change</a>
                                                                                </label>
                                                                                <label class="btn btn-danger" for="upload-photo">
                                                                                        <a style="color: white" href="javascript:removeImage()">Remove</a>
                                                                                    </label>
                                                                                <span class="max-size">Max 20 MB</span>
                                                                            </div>
                                                                        </div></div><div class="col-md-4"></div><div class="col-md-4"></div>
                                                                    <div class="col-md-4">
                                                                        <label>FullName</label>
                                                                        <input value="{{$admin->name}}" id="user_name" name="user_name" type="text" class="form-control" >
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <label>First Name</label>
                                                                            <input value="{{$admin->first_name}}" id="first_name" name="first_name" type="text" class="form-control" >
                                                                        </div>
                                                                    <div class="col-md-4">
                                                                        <label>Last Name</label>
                                                                        <input value="{{$admin->last_name}}" id="last_name" name="last_name" type="text" class="form-control" >
                                                                    </div>
                                                                   
                                                                  
                                                                    <div class="col-md-4">
                                                                            <label>Email</label>
                                                                            <input id="email" name="email" value="{{$admin->email}}" type="text" class="form-control" >
                                                                        </div>

                                                                    <div class="col-md-4">
                                                                            <label>Phone</label>
                                                                            <input id="phone" name="phone" type="text" class="form-control" >
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <label>Gender</label>
                                                                            <select class="form-control" id="gender" name="gender">   
                                                                                <option>Gender</option>
                                                                                <option value="1">Male</option>
                                                                                <option value="2">Female</option>
                                                                            </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <label>Country</label>
                                                                            <select class="form-control" name="country" id="country">   
                                                                                <option>Gender</option>
                                                                                <option value="1">Male</option>
                                                                                <option value="2">Female</option>
                                                                            </select>
                                                                    </div>
                                                                <div class="col-md-4">
                                                                        <label>City</label>
                                                                        <select class="form-control" class="city" id="city">   
                                                                            <option>Gender</option>
                                                                            <option value="1">Male</option>
                                                                            <option value="2">Female</option>
                                                                        </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <label>Zip Code</label>
                                                                        <input type="text" class="form-control" id="zip_code" name="zip_code" >
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
                                                <form action="" id="frmUserChangePassword">
                                                        <input type="hidden" id="user_admin_id" name="user_admin_id" value="{{$admin->id}}">
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <div class="card-body">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                    <label>New Password </label>
                                                                    <input id="new_password" name="new_password" type="password" class="form-control" >
                                                            </div>

                                                            <div class="col-md-12">
                                                                        <label>Confirm Password</label>
                                                                        <input  id="confirm_password" name="confirm_password" type="password" class="form-control" >
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
@section('scripts')
    <script src="/js/backend/admin_profile.js"></script>
@endsection