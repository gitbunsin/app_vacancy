@extends('frontend.layouts.template')
@section('content')
@php
	$user = Auth::user();	
	// dd($User);
	use App\Model\Country;
	use App\Model\vacancy;
	use App\Model\City;
	$country = Country::all();
	$city = City::all();
	use App\Model\jobTitle;
	$job_title = jobTitle::all();
	$degree = array("Associate degree","Bachelor degree","Master degree","Doctoral degree");
	use App\Model\Language;
	$language = Language::all();
	$level = array("Basic","Fair","Good","Very Good","Proficiency","Native");
	$sex = array('Male','Female');
@endphp
<style>
	.formpanel .form-control{

		height: auto;
    	border-radius: 4px;
    	padding: 10px 13px;
    	border-color: #ddd;
	}
</style>
<div class="pageTitle">
	<div class="container">
	  <div class="row">
		<div class="col-md-6 col-sm-6">
		  <h1 class="page-heading">Dashboard</h1>
		</div>
		<div class="col-md-6 col-sm-6">
		  <div class="breadCrumb"><span>Welcome Back Jhon</span></div>
		</div>
	  </div>
	</div>
  </div>
  <!-- Page Title End -->
  
  <div class="listpgWraper">
	<div class="container">
	  <div class="row">
		<div class="col-md-3 col-sm-4">
			
		  <div class="switchbox">
			  <div class="txtlbl">Immediate Available <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus consectetur sagittis. Duis vitae urna vehicula, ornare nibh non, aliquet neque. In vitae erat ut augue suscipit." data-original-title="" title=""></i></div>
			  <div class="pull-right"><label class="switch switch-green">
				<input type="checkbox" class="switch-input">
				<span class="switch-label" data-on="On" data-off="Off"></span>
				<span class="switch-handle"></span>
			  </label></div>
			  <div class="clearfix"></div>
		  </div>
		
		  <ul class="usernavdash">
			<li class="{{(request()->segment(2) == 'my-dashboard') ? 'active' : '' }}">
				<a href="{{url('/user/my-dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Candidate Dashboard</a>
			</li>
			<li class="{{(request()->segment(2) == 'my-profile') ? 'active' : '' }}">
				<a  href="{{url('/user/my-profile')}}"><i class="fa fa-user" aria-hidden="true"></i> My Details</a>
			</li>
			<li class="{{(request()->segment(2) == 'view-bookmark') ? 'active' : '' }}">
				<a href="{{url('/user/view-bookmark')}}"><i class="fa fa-desktop" aria-hidden="true"></i> My Job Applications</a>
			</li>
			<li class="{{(request()->segment(2) == 'view-profile') ? 'active' : '' }}">
                <a href="{{url('/user/view-profile')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> View Resume</a>
            </li>
			<li class="{{(request()->segment(2) == 'my-resume') ? 'active' : '' }}">
                <a href="{{url('/user/my-resume')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Build Resume</a>
            </li>
			<li class="{{(request()->segment(2) == 'upload-resume') ? 'active' : '' }}">
				<a href="{{url('/user/upload-resume')}}"><i class="fa fa-paper-plane" aria-hidden="true"></i> upload Resume</a>
			</li>
			<li><a href="#"><i class="fa fa-commenting" aria-hidden="true"></i> Feedback</a></li>
			<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> My Package</a></li>
            <li class="{{(request()->segment(2) == 'account-setting') ? 'active' : '' }}">
                <a href="{{url('user/account-setting')}}"><i class="fa fa-lock" aria-hidden="true"></i> Account Setting</a>
            </li>
			<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		  </ul>
		</div>
		<div class="col-md-9 col-sm-8">
            <div class="row">
                <div class="col-md-12">
                  <div class="userccount">
                    <div class="formpanel">  
                      <!-- Personal Information -->
					  <h5>Personal Information</h5>
					  <hr/>
					  <form id="frmUpdateUserProfile" enctype="multipart/form-data" accept-charset="UTF-8">
						<input type="hidden" value="{{$user->id}}" name="user_login_id" id="user_login_id">
                      <h6 style="text-align: center">Profile Image</h6>
                      <div class="row">
                        <div class="col-md-12" style="text-align: center">
                          <div class="formrow" id="thumbnail">
							@if($user->profile)
								<img class="img-circel" id="preview" src="{{url('uploads/UserCv/'.$user->profile)}}" width="100px" height="100px"/><br/>
							@else
								<img class="img-circel" sid="preview" src="{{asset('images/noimage.jpg')}}" width="100px" height="100px"/><br/>
							@endif
								<input type="file"id="image" style="display: none;"/>
                          </div>
                            <div class="formrow">
                                <label class="btn btn-default" style="width: auto">
									<a style="color:white;" id="upload-photo" href="javascript:changeProfile()">Change Profile</a>
								</label> 
                            </div>
                        </div>
                        </div>
                      <div class="row">
                        <div class="col-md-6">
                         	<div class="formrow "> 
							  <input value="{{$user->first_name}}" class="form-control" id="user_first_name" placeholder="First Name" name="user_first_name" type="text">
                        	</div>
						</div>
						
                        <div class="col-md-6">
                          <div class="formrow "> 
							  <input class="form-control" value="{{$user->last_name}}" id="user_last_name"  name="user_last_name" placeholder="Last Name"   type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="formrow "> 
							  <input class="form-control" id="user_email" placeholder="Email" name="user_email" type="text" value="{{$user->email}}">
                             </div>
						</div>
						<div class="col-md-6">
							<div class="formrow "> 
								<input  value="{{$user->phone}}" class="form-control" id="user_phone" placeholder="Phone" name="user_phone" type="text" value="">
							</div>
						  </div>
						<div class="col-md-6">
							<div class="formrow ">
								 <select name="user_sex" id="user_sex" style="height: 42px;" class="form-control">
								<option value="" selected="selected">Select Sex</option><option value="1">Female</option>
								@foreach( $sex as $sexs)
									<option value="{{$sexs}}">{{$sexs}}</option>
								@endforeach
							</select>
						</div>
						  </div>
						  <div class="col-md-6">
							<div class="formrow ">
								<input value="{{$user->zip}}" placeholder="zip Code" class="form-control" type="text" name="user_zip" id="user_zip"/>
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="formrow "> 
								<input placeholder="Nationality" class="form-control" type="text" name="user_nationality" id="user_nationality"/>
							</div>
						  </div>
						 
						  <div class="col-md-6">
							<div class="formrow "> <select style="height: 42px;" class="form-control" id="gender_id" name="gender_id">
								<option value="" selected="selected">Select City</option>
								@foreach( $city as $cities)
									<option value="{{$cities->id}}">{{$cities->name}}</option>
								@endforeach
							</select></div>
						  </div>
						  <div class="col-md-6">
							<div class="formrow "> 
								<input placeholder="State" class="form-control" type="text" name="user_state" id="user_state"/>
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="formrow "> 
								<input style="height: 43px;" class="form-control" type="date" name="user_date" id="user_date"/>
							</div>
						  </div>
						  <div class="col-md-12">
							<div class="formrow "> 
								<input value="{{$user->address}}" placeholder="Address" class="form-control" type="text" name="user_address" id="user_address"/>
							</div>
						  </div>
						  <div class="col-md-12">
							  <div class="form-body">
							  <div id="success_msg"></div>
								<div class="formrow ">
								  <textarea name="summary" class="form-control" id="summary" placeholder="About Me"></textarea>
								  <span class="help-block summary-error"></span> </div>
								  <button style="width: 390px;" type="submit" id="save_profile"  class="btn btn-primary" value="">Save  <i class="fa fa-save" aria-hidden="true"></i></button>
								  <button style="width: 390px;" type="button" id="btn_save_profile"  class="btn btn-primary" value=""> Update Summary </button>
								{{-- <button type="button" class="btn btn-large btn-primary" onclick="submitProfileSummaryForm();">Update Summary <i class="fa fa-save" aria-hidden="true"></i></button> --}}
							  </div>
						  </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
            
		  </div>
		</div>
	  </div>
	</div>
  </div>
	
	@endsection
	@section('scripts')
	<script src="{{asset('js/backend/bookmark.js')}}"></script>
	<script src="{{asset('js/frontend/user_hobby.js')}}"></script>
	<script src="{{asset('js/frontend/user_reference.js')}}"></script>
	<script src="{{asset('js/frontend/user_language.js')}}"></script>
	<script src="{{asset('js/frontend/user_experience.js')}}"></script>
	<script src="{{asset('js/frontend/user_skill.js')}}"></script>
	<script src="{{asset('js/frontend/user_education.js')}}"></script>
	<script src="{{asset('js/backend/apply_job.js')}}"></script>
	<script src="{{asset('js/backend/user_profile.js')}}"></script>
	<script src="{{asset('js/frontend/skill.js')}}"></script>
	@endsection
	
	
