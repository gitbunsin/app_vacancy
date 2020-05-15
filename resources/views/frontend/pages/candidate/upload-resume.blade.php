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
			<li><a href="{{url('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		  </ul>
		</div>
		<div class="col-md-9 col-sm-8">
            <div class="row">
                <div class="col-md-12">
                  <div class="userccount">
                    <div class="formpanel">  
                      <!-- Personal Information -->
					  
					 	 <h1>Upload Resume</h1>
						 <span>please upload your resume here be able to applied your favorite vacancy ! </span><br/><br/>
						 <a href="#" onclick="UploadResume();" class="btn btn-primary pull-right"><i class="fa fa-paper-plane" aria-hidden="true"></i> Upload Resume</a>
						 <div class="buttons">
							<hr/>
							 <table class="table" id="tbl_resume">
									 <thead class="thead-dark">
									   <tr class="tr_resume">
										 <th scope="col">Name</th>
										 <th scope="col">Size</th>
										 <th scope="col">Type</th>
										 <th>Action</th>
									   </tr>
									 </thead>
									 <tbody> 
									 @if($user_cv)
										 <tr id="tr_userCv{{$user_cv->id}}">
											 <td>{{$user_cv->file_name}}</td>
											 <td>{{$user_cv->file_size}}</td>
											 <td>{{$user_cv->attachment_type}}</td>
											 <td>
												 <a href="#" onclick="EditUserCv({{$user_cv->id}});"><i class="fa fa-edit" aria-hidden="true"></i></a> | 
												 <a href="#" onclick="DeleteUserCv({{$user_cv->id}});"><i style="color:red;" class="fa fa-trash" aria-hidden="true"></i> </a>
											 </td>
										 </tr>
									 @else
									 @endif
									 </tbody>
								   </table>	  
						 </div>
                    </div>
                  </div>
                </div>
            
		  </div>
		  <div id="UserUploadResume" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmUploadResume" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" id="user_resume_id" value="{{$user->id}}">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Upload Resume</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<input type="file" class="form-control" id="file_name" name="file_name" accept="application/pdf,application/msword,
										application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>
									</div>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
									<input type="submit" class="btn btn-primary" value="Save">
								</div>
						</form>
				</div>
			</div>
		</div>
		<div id="ModalDeleteUserCv" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmDeleteResume" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" id="user_resume_id" value="">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Upload Resume</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">
									<span>Do you want to Delete this Resume ? </span>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
									<input type="submit" class="btn btn-primary" value="Yes">
								</div>
						</form>
				</div>
			</div>
		</div>

		{{-- //Edit  --}}
		<div id="ModalEditUserCv" class="modal fade">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<form id="frmEditResume" enctype="multipart/form-data" action="#">
							<input type="hidden" id="user_resume_id_edit" value="">
							<input type="hidden" name="_token" value="{{ csrf_token()}}">
							<div  class="modal-header theme-bg" style="background-color:#008def" >
									<h4 class="modal-title" style="color:white;"> Upload Resume</h4>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<div class="modal-body">
									<div class="form-group">
											<input type="file" class="form-control" id="file_name_edit" name="file_name_edit"/>
										</div>
										<input disabled class="form-control" type="text" name="resume_edit" value="" id="resume_edit">
									</div>
									<div class="modal-footer">
										<input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
										<input type="submit" class="btn btn-primary" value="Yes">
									</div>
							</form>
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
	
	
