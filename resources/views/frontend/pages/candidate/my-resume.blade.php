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
@endphp
<style>
	label {
		padding: 0 0 10px;
		margin-top: 10px;
	}
}
	.jobslist li h4 a {
    font-size: 15px; !important;
    color: #000;
    font-weight: 700;
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
                      <!-- Personal Information -->
						<div class="container"> 
						  <ul class="jobslist row">
							<!--Job start-->
							<li class="col-md-8" id="user-education">
							<div>
								<a style="margin-top:-5px;" onclick="loadUserEducation();"  href="#." class="applybtn pull-right">Add New</a>
								<h6>Education</h6>
							</div>
							  <hr/>
							@foreach ($user->education as $educations)
							@php
								$city_name = city::find($educations->city_id);
							@endphp
							<div  id="card_education-edit{{$educations->id}}">
								<div class="jobint user-delete-education{{$educations->id}}" >
									<div class="row">
									<div class="col-md-8 col-sm-8">
										<h4><a href="#.">{{$educations->school}}</a></h4>
										<div class="company"><a href="#.">{{$educations->degree}} , </a></div>
										<div class="jobloc"><label class="fulltime">{{$educations->year .' - '.$educations->year_to }}</label> - {{$city_name->name}} <span></span></div>
									</div>
									<div class="col-md-3 col-sm-3">
										<a href="#." onclick="educationEdit({{$educations->id}});" class="applybtn">Edit</a> 
										<a href="#." onclick="educationDelete({{$educations->id}});" class="applybtn">Delete</a>
									</div>
									</div>
								</div>
							</div>
								<br/>
							@endforeach
							</li>

							<li class="col-md-8" id="user-training">
								<div>
									<a style="margin-top:-5px;" onclick="LoadUserSkill();"  href="#." class="applybtn pull-right">Add New</a>
									<h6>Traning Skills</h6>
								</div>
								  <hr/>
							@foreach ($user->traning as $tranings)
								<div  id="card_training_skills_edit{{$tranings->id}}">
									<div class="jobint user-delete-training_skills{{$tranings->id}}" >
										<div class="row">
										<div class="col-md-8 col-sm-8">
											<h4><a href="#.">{{$tranings->school}}</a></h4>
											<div class="company"><a href="#.">{{$tranings->degree}} , </a></div>
											<div class="jobloc"><label class="fulltime">{{$tranings->year .' - '.$tranings->year_to }}</label></div>
										</div>
										<div class="col-md-3 col-sm-3">
											<a href="#." onclick="skillEdit({{$tranings->id}});" class="applybtn">Edit</a> <a href="#." onclick="skillDelete({{$tranings->id}});" class="applybtn">Delete</a>
										</div>
										</div>
									</div>
								</div>
									<br/>
							@endforeach
								</li>

								<li class="col-md-8" id="user-experience">
									<div>
										<a style="margin-top:-5px;" onclick="userExperience();" href="#." class="applybtn pull-right">Add New</a>
										<h6>Experience</h6>
									</div>
									  <hr/>
								@foreach ($user->experience as $experiences)
											@php
												$title =jobTitle::where('id',$experiences->job_title_id)->first();
											@endphp
									<div  id="card_training_experiences_edit{{$experiences->id}}">
										<div class="jobint user-delete-experiences{{$experiences->id}}" >
											<div class="row">
											<div class="col-md-8 col-sm-8">
												<h4><a href="#.">{{$title->name}}</a></h4>
												<div class="company"><a href="#.">{{$experiences->company_name}} </a></div>
												<div class="jobloc"><label class="fulltime">{{$experiences->year .' - '.$experiences->year_to }}</label></div>
											</div>
											<div class="col-md-3 col-sm-3">
												<a href="#." onclick="experienceEdit({{$experiences->id}});" class="applybtn">Edit</a> <a href="#." onclick="experienceDelete({{$experiences->id}});" class="applybtn">Delete</a>
											</div>
											</div>
										</div>
									</div>
										<br/>
								@endforeach
									</li>
									<li class="col-md-8" id="user-language">
										<div>
											<a style="margin-top:-5px;" onclick="loadUserLanguage();" href="#." class="applybtn pull-right">Add New</a>
											<h6>Language</h6>
										</div>
										  <hr/>
										  @foreach ($user->language as $languages)
										  @php
										  $Lang =language::where('id',$languages->language_id)->first();
									  @endphp
										<div  id="card_language_edit{{$languages->id}}">
											<div class="jobint user-delete-language{{$languages->id}}" >
												<div class="row">
												<div class="col-md-8 col-sm-8">
													<h4><a href="#.">{{$Lang->name}}</a></h4>
													<div class="jobloc"><label class="fulltime">{{$languages->level}}</label></div>
												</div>
												<div class="col-md-3 col-sm-3">
													<a href="#." onclick="languageEdit({{$languages->id}});" class="applybtn">Edit</a> <a href="#." onclick="languageDelete({{$languages->id}});" class="applybtn">Delete</a>
												</div>
												</div>
											</div>
										</div>
											<br/>
									@endforeach
										</li>
										<li class="col-md-8" id="user-skill">
											<div>
												<a style="margin-top:-5px;" onclick="loadSkill();" href="#." class="applybtn pull-right">Add New</a>
												<h6>Skill</h6>
											</div>
											  <hr/>
								@foreach ($user->skill as $skills)
									  <div  id="card_skill_edit{{$skills->id}}">
										  <div class="jobint user-delete-skill{{$skills->id}}" >
											  <div class="row">
											  <div class="col-md-8 col-sm-8">
												  <h4><a href="#.">{{$skills->name}}</a></h4>
												  <div class="jobloc"><label class="fulltime">{{$skills->year}}</label></div>
											  </div>
											  <div class="col-md-3 col-sm-3">
												  <a href="#." onclick="userSkillEdit({{$skills->id}});" class="applybtn">Edit</a> <a href="#." onclick="userSkillDelete({{$skills->id}});" class="applybtn">Delete</a>
											  </div>
											  </div>
										  </div>
									  </div>
										  <br/>
								  @endforeach

								  
											<li class="col-md-8" id="user-reference">
									<div>
										<a style="margin-top:-5px;" onclick="loadReference();" href="#." class="applybtn pull-right">Add New</a>
										<h6>Reference</h6>
									</div>
									  <hr/>
								@foreach ($user->reference as $references)
											@php
												$title =jobTitle::where('id',$references->job_title_id)->first();
											@endphp
									<div  id="card_reference_edit{{$references->id}}">
										<div class="jobint user-delete-reference{{$references->id}}" >
											<div class="row">
											<div class="col-md-8 col-sm-8">
												<h4><a href="#.">{{$references->name}} </a></h4>
												<div class="company"><a href="#.">{{$references->position}} , </a></div>
												<div class="jobloc"><label class="fulltime">{{$references->phone .' - '.$references->email}}</label></div>
											</div>
											<div class="col-md-3 col-sm-3">
												<a href="#." onclick="referenceEdit({{$references->id}});" class="applybtn">Edit</a> <a href="#." onclick="referenceDelete({{$references->id}});" class="applybtn">Delete</a>
											</div>
											</div>
										</div>
									</div>
										<br/>
								@endforeach

								<li class="col-md-8" id="user-hobby">
									<div>
										<a style="margin-top:-5px;" onclick="loadHobby();" href="#." class="applybtn pull-right">Add New</a>
										<h6>Hobby</h6>
									</div>
									  <hr/>
									  @foreach ($user->hobby as $hobbies)
											@php
												$title =jobTitle::where('id',$hobbies->id)->first();
											@endphp
									<div  id="card_hobby_edit{{$hobbies->id}}">
										<div class="jobint user-delete-hobby{{$hobbies->id}}" >
											<div class="row">
											<div class="col-md-8 col-sm-8">
												<h4><a href="#.">{{$hobbies->name}} </a></h4>
											</div>
											<div class="col-md-3 col-sm-3">
												<a href="#." onclick="hobbyEdit({{$hobbies->id}});" class="applybtn">Edit</a> <a href="#." onclick="hobbyDelete({{$hobbies->id}});" class="applybtn">Delete</a>
											</div>
											</div>
										</div>
									</div>
										<br/>
								@endforeach


													{{-- <li class="col-md-8">
														<div>
															<a style="margin-top:-5px;"  href="#." class="applybtn pull-right">Add New</a>
															<h5>About Me</h5>
														</div>
														  <hr/>
														  <div class="jobint">
															<div class="row">
															  <div class="col-md-2 col-sm-2"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Job Name" /></div>
															  <div class="col-md-7 col-sm-7">
																<h4><a href="#.">Technical Database Engineer</a></h4>
																<div class="company"><a href="#.">Datebase Management Company</a></div>
																<div class="jobloc"><label class="fulltime">Full Time</label>   - <span>New York</span></div>
															  </div>
															  <div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Edit</a> <a href="#." class="applybtn">Delete</a></div>
															</div>
														  </div>
														  
														</li> --}}
							<!--Job end--> 
						  </ul>
						</div>
                      </div>

                    </div>
                  </div>
                </div>
            
		  </div>
		 
		</div>

		<!--Job Skill --> 

		<div id="ModalUserHobbyEdit" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmUserHobbyEdit" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="user_hobby_id_edit" id="user_hobby_id_edit">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Hobby </h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-12">
											<label> Hobby Name * </label>
											<input  name="name_hobby_edit" id="name_hobby_edit" type="text" class="form-control">
									</div>
									</div>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
									<input type="submit" class="btn btn-primary" value="Save">
								</div>
						</form>
				</div>
			</div>
		</div>
		
		<div id="ModalUserHobby" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmUserHobby" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="user_hobby_id" id="user_hobby_id">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Hobby </h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-12">
											<label> Hobby Name * </label>
											<input  name="name_hobby" id="name_hobby" type="text" class="form-control">
									</div>
									</div>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
									<input type="submit" class="btn btn-primary" value="Save">
								</div>
						</form>
				</div>
			</div>
		</div>
		
		<!-- /.tr-end-user-hobby -->
		
		
		
		<div id="ModalHobbyDelete" class="modal fade">
			<div class="modal-dialog ">
				<div class="modal-content">
					<form id="frmHobby" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="user_hobby_id" id="user_hobby_id">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Hobby </h4>
								</div>
								<div class="modal-body">
									<span>Do you want to Delete this Hobby ? </span>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
									<input type="submit" class="btn btn-primary" value="Save">
								</div>
						</form>
				</div>
			</div>
		</div>
		

		<div id="ModalUserReferenceEdit" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmUserReferenceEdit" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="user_reference_id_edit" id="user_reference_id_edit">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Reference </h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
											<label> Name * </label>
											<input  name="user_name_edit" id="user_name_edit" type="text" class="form-control">
									</div>
									<div class="col-lg-6">
										<label>  Postion * </label>
										<input  name="user_position_edit" id="user_position_edit" type="number" class="form-control">
									</div>
									<div class="col-lg-6">
										<label> Email * </label>
										<input  name="user_email_edit" id="user_email_edit" type="text" class="form-control">
									</div>
									<div class="col-lg-6">
										<label> Phone * </label>
										<input  name="user_phone_reference_edit" id="user_phone_reference_edit" type="text" class="form-control">
									</div>
									</div>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
									<input type="submit" class="btn btn-primary" value="Save">
								</div>
						</form>
				</div>
			</div>
		</div>
		
		
		
		
		<div id="ModalReferenceDelete" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="frmReferenceDelete" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="user_reference_id" id="user_reference_id">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Reference </h4>
								</div>
								<div class="modal-body">
									<span>Do you want to Delete this Reference ? </span>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
									<input type="submit" class="btn btn-primary" value="Yes">
								</div>
						</form>
				</div>
			</div>
		</div>
		
		
			<div id="ModalUserReference" class="modal fade">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<form id="frmUserReference" enctype="multipart/form-data" action="#" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token()}}">
							<div  class="modal-header theme-bg" style="background-color:#008def" >
									<h4 class="modal-title" style="color:white;"> Reference </h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-lg-6">
												<label> Name * </label>
												<input  name="user_name_reference" id="user_name_reference" type="text" class="form-control">
										</div>
										<div class="col-lg-6">
											<label>  Postion * </label>
											<input  name="user_position_reference" id="user_position_reference" type="text" class="form-control">
										</div>
										<div class="col-lg-6">
											<label> Email * </label>
											<input  name="user_email_reference" id="user_email_reference" type="text" class="form-control">
										</div>
										<div class="col-lg-6">
											<label> Phone * </label>
											<input  name="user_phone_reference" id="user_phone_reference" type="text" class="form-control">
										</div>
										</div>
									</div>
									<div class="modal-footer">
										<input  type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
										<input type="submit" class="btn btn-primary" value="Save">
									</div>
							</form>
					</div>
				</div>
			</div>
		<div id="ModalSkillEdit" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmSkillEdit" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="user_new_skill_id_edit" id="user_new_skill_id_edit">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Skill </h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-12">
											<label> Skill Name * </label>
											<input placeholder="ex : ios developer"  name="user_skill_name_edit" id="user_skill_name_edit" type="text" class="form-control">
									</div>
									<div class="col-lg-12">
										<label> Experience Year  * </label>
										<input  name="skill_year_edit" id="skill_year_edit" type="number" class="form-control">
								</div>
									</div>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
									<input type="submit" class="btn btn-primary" value="Save">
								</div>
						</form>
				</div>
			</div>
		</div>
	
		<div id="ModalSkillDelete" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="frmSkillDelete" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="user_skill_new_id" id="user_skill_new_id">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Skill </h4>
								</div>
								<div class="modal-body">
									<span>Do you want to Delete this Skill ? </span>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
									<input type="submit" class="btn btn-primary" value="Yes">
								</div>
						</form>
				</div>
			</div>
		</div>
	
	
		<div id="ModalSkill" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmSkill" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="user_language_id" id="user_language_id">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Skill </h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-12">
											<label> Skill Name * </label>
											<input placeholder="ex : ios developer"  name="user_skill_name" id="user_skill_name" type="text" class="form-control">
									</div>
									<div class="col-lg-12">
										<label> Experience Year  * </label>
										<input  name="skill_year" id="skill_year" type="number" class="form-control">
								</div>
									</div>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
									<input type="submit" class="btn btn-primary" value="Yes">
								</div>
						</form>
				</div>
			</div>
		</div>
	
	
		<!-- /.tr-user-skill -->	




		<!-- user langauge -->
	<div id="ModalEditUserLanague" class="modal fade">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form id="frmEditUserLanguage" enctype="multipart/form-data" action="#" method="POST">
					<input type="hidden" name="user_language_id_edit" id="user_language_id_edit">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div  class="modal-header theme-bg" style="background-color:#008def" >
							<h4 class="modal-title" style="color:white;"> Language </h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-6">
											<label> Language * </label>
											<div class="selectWrapper">
													<select class="form-control" id="language_id_edit" name="language_id_edit">
														<option value=""> -- Please Select Language -- </option>
														@foreach ($language as $languages)
															<option value="{{$languages->id}}">{{$languages->name}}</option>
														@endforeach
													</select>
												</div>
									</div>
									<div class="col-lg-6">
											<label> Level * </label>
											<div class="selectWrapper">
												<select class="form-control" id="level_id_edit" name="level_id_edit">
													<option value=""> -- Please Select Level -- </option>
													@foreach ($level as $levels)
														<option value="{{$levels}}">{{$levels}}</option>
													@endforeach
												</select>
											</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input  type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
								<input type="submit" class="btn btn-primary" value="Save">
							</div>
					</form>
			</div>
		</div>
	</div>
	<!-- /.tr-user-Language -->

	<div id="ModalAddUserLanague" class="modal fade">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form id="frmAddUserLanguage" enctype="multipart/form-data" action="#" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div  class="modal-header theme-bg" style="background-color:#008def" >
							<h4 class="modal-title" style="color:white;"> Language </h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-6">
											<label> Language * </label>
											<div class="selectWrapper">
													<select class="form-control" id="language_id" name="language_id">
														<option value=""> -- Please Select Language -- </option>
														@foreach ($language as $languages)
															<option value="{{$languages->id}}">{{$languages->name}}</option>
														@endforeach
													</select>
												</div>
									</div>
									<div class="col-lg-6">
											<label> Level * </label>
											<div class="selectWrapper">
												<select class="form-control" id="level_id" name="level_id">
													<option value=""> -- Please Select Level -- </option>
													@foreach ($level as $levels)
														<option value="{{$levels}}">{{$levels}}</option>
													@endforeach
												</select>
											</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input  type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
								<input type="submit" class="btn btn-primary" value="Save">
							</div>
					</form>
			</div>
		</div>
	</div>



	<div id="ModalDeleteUserLanguage" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="frmDeleteUserLanguage" enctype="multipart/form-data" action="#" method="POST">
					<input type="hidden" name="user_language_id" id="user_language_id">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div  class="modal-header theme-bg" style="background-color:#008def" >
							<h4 class="modal-title" style="color:white;"> Language </h4>
							</div>
							<div class="modal-body">
								<span>Do you want to Delete this Languages ? </span>
							</div>
							<div class="modal-footer">
								<input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
								<input type="submit" class="btn btn-primary" value="Yes">
							</div>
					</form>
			</div>
		</div>
	</div>
		<!-- /.tr-user-Experience -->
	<div id="ModalAddUserExperienceEdit" class="modal fade">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form id="frmAddUserExpericenseEdit">
					<input type="hidden" name="user_experience_edit_id" id="user_experience_edit_id">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div  class="modal-header theme-bg" style="background-color:#008def" >
							<h4 class="modal-title" style="color:white;">Experience</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-6">
											<label> Job Title * </label>
											<div class="selectWrapper">
													<select class="form-control" id="job_title_id_edit" name="job_title_id">
														<option value=""> -- Please Select Job Title -- </option>
														@foreach ($job_title as $job_titles)
															<option value="{{$job_titles->id}}">{{$job_titles->name}}</option>
														@endforeach
													</select>
												</div>
									</div>
									<div class="col-lg-6">
											<label> Company Name * </label>
											<input  name="company_name_edit" id="company_name_edit" type="text" class="form-control">
									</div>
									
									<div class="col-lg-6">
											<label> Country * </label>
										<div class="selectWrapper">
												<select class="form-control" id="country_experience_edit" name="country_experience_edit">
												<option value=""> -- Please Select Country -- </option>
												@foreach ($country as $countries)
													<option value="{{$countries->id}}">{{$countries->name}}</option>
												@endforeach
											  </select>
										 </div>
									</div>
									<div class="col-lg-6">
										<label> City * </label>
										<div class="selectWrapper">
											<select class="form-control" id="city_experience_edit" name="city_experience_edit">
												<option value=""> -- Please Select City -- </option>
												@foreach ($city as $cities)
													<option value="{{$cities->id}}">{{$cities->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-6">
											<label> From Month: </label>
											<input  name="from_month_edit" id="from_month_edit" type="number" class="form-control">
										</div>
										<div class="col-lg-6">
												<label> To : </label>
												<input  name="from_to_edit" id="from_to_edit" type="number" class="form-control">
											</div>
											<div class="col-lg-6">
												<label> Year : </label>
												<input  name="year_experience_edit" id="year_experience_edit" type="number" class="form-control">
											</div>
											<div class="col-lg-6">
												<label> Year To : </label>
												<input  name="year_to_experience_edit" id="year_to_experience_edit" type="number" class="form-control">
											</div>
											<div class="col-lg-12">
												<label> Description * </label>
												<textarea cols='5' id="description_experience_edit" rows="5" class="form-control"></textarea>
											</div>
								
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


<div id="ModalDeleteUserExperience" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="frmDeleteUserExperience" enctype="multipart/form-data" action="#" method="POST">
					<input type="hidden" name="user_experience_id" id="user_experience_id">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div  class="modal-header theme-bg" style="background-color:#008def" >
							<h4 class="modal-title" style="color:white;"> Experience </h4>
							</div>
							<div class="modal-body">
								<span>Do you want to Delete this experience ? </span>
							</div>
							<div class="modal-footer">
								<input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
								<input type="submit" class="btn btn-primary" value="Yes">
							</div>
					</form>
			</div>
		</div>
	</div>

<!-- /.tr-user-Experience -->
<div id="ModalAddUserExperience" class="modal fade">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form id="frmAddUserExpericense">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div  class="modal-header theme-bg" style="background-color:#008def" >
							<h4 class="modal-title" style="color:white;"> Experience</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-6">
											<label> Job Title * </label>
											<div class="selectWrapper">
													<select class="form-control" id="job_title_id" name="job_title_id">
														<option value=""> -- Please Select Job Title -- </option>
														@foreach ($job_title as $job_titles)
															<option value="{{$job_titles->id}}">{{$job_titles->name}}</option>
														@endforeach
													</select>
												</div>
									</div>
									<div class="col-lg-6">
											<label> Company Name * </label>
											<input  name="company_name" id="company_name" type="text" class="form-control">
									</div>
									
									<div class="col-lg-6">
											<label> Country * </label>
										<div class="selectWrapper">
												<select class="form-control" id="country_experience" name="country_experience">
												<option value=""> -- Please Select Country -- </option>
												@foreach ($country as $countries)
													<option value="{{$countries->id}}">{{$countries->name}}</option>
												@endforeach
											  </select>
										 </div>
									</div>
									<div class="col-lg-6">
										<label> City * </label>
										<div class="selectWrapper">
											<select class="form-control" id="city_experience" name="city_experience">
												<option value=""> -- Please Select City -- </option>
												@foreach ($city as $cities)
													<option value="{{$cities->id}}">{{$cities->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-6">
											<label> From Month: </label>
											<input  name="from_month" id="from_month" type="number" class="form-control">
										</div>
										<div class="col-lg-6">
												<label> To : </label>
												<input  name="from_to" id="from_to" type="number" class="form-control">
											</div>
											<div class="col-lg-6">
													<label> Year : </label>
													<input  name="year_experience" id="year_experience" type="number" class="form-control">
											</div>
											<div class="col-lg-6">
														<label> Year To : </label>
														<input  name="year_to_experience" id="year_to_experience" type="number" class="form-control">
											</div>
									<div class="col-lg-12">
										<label> Description * </label>
										<textarea cols='5' id="description_experience" rows="5" class="form-control"></textarea>
									</div>
								
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


		<!-- User Skills -->
		<div id="ModalEditUserSkill" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmEditUserSkill" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" id="user_skill_id_edit_id" value="">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Skill</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
												<label> School * </label>
												<input placeholder="Ex : Phnom Penh International University "  name="school_skill_edit" id="school_skill_edit" type="text" class="form-control">
										</div>
										<div class="col-lg-6">
												<label> Field of Study * </label>
												<input  name="study_skill_edit" id="study_skill_edit" type="text" class="form-control">
										</div>
										<div class="col-lg-12">
											<label> Degree * </label>
											<div class="selectWrapper">
													<select class="form-control" id="degree_skill_edit" name="degree_skill_edit">
													<option value=""> -- Please Select degree -- </option>
													@foreach ($degree as $degrees)
														<option value="{{$degrees}}">{{$degrees}}</option>
													@endforeach
												  </select>
											 </div>
										</div><br/>
										<div class="col-lg-6">
												<label> Country * </label>
											<div class="selectWrapper">
													<select class="form-control" id="country_skill_edit" name="country_skill_edit">
													<option value=""> -- Please Select Country -- </option>
													@foreach ($country as $countries)
														<option value="{{$countries->id}}">{{$countries->name}}</option>
													@endforeach
												  </select>
											 </div>
										</div>
										<div class="col-lg-6">
											<label> City * </label>
											<div class="selectWrapper">
												<select class="form-control" id="city_skill_edit" name="city_skill_edit">
													<option value=""> -- Please Select City -- </option>
													@foreach ($city as $cities)
														<option value="{{$cities->id}}">{{$cities->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-lg-6">
											<label> Year of Study * </label>
											<input   name="year_skill_edit" id="year_skill_edit" type="number" class="form-control">
										</div>
										<div class="col-lg-6">
											<label> To : </label>
											<input  name="year_to_skill_edit" id="year_to_skill_edit" type="number" class="form-control">
										</div>
										<div class="col-lg-12">
											<label> Description * </label>
											<textarea name="description_training_skill_edit" id="description_training_skill_edit" cols='5' rows="3" class="form-control"></textarea>
										</div>
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
		<div id="ModalDeleteUserSkill" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="frmDeleteUserSkill" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="user_skill_delete_id" id="user_skill_delete_id">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Skill</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">
									<span>Do you want to Delete this skill ? </span>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
									<input type="submit" class="btn btn-primary" value="Yes">
								</div>
						</form>
				</div>
			</div>
		</div>



	<div id="ModalAddUserSkill" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmAddUserSkill" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" id="user_skill_id" value="{{$user->id}}">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Skill</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
												<label> School * </label>
												<input placeholder="Ex : Phnom Penh International University "  name="school_skill" id="school_skill" type="text" class="form-control">
										</div>
										<div class="col-lg-6">
												<label> Field of Study * </label>
												<input  name="study_skill" id="study_skill" type="text" class="form-control">
										</div>
										<div class="col-lg-12">
											<label> Degree * </label>
											<div class="selectWrapper">
													<select class="form-control" id="degree_skill" name="degree_skill">
													<option value=""> -- Please Select degree -- </option>
													@foreach ($degree as $degrees)
														<option value="{{$degrees}}">{{$degrees}}</option>
													@endforeach
												  </select>
											 </div>
										</div><br/>
										<div class="col-lg-6">
												<label> Country * </label>
											<div class="selectWrapper">
													<select class="form-control" id="country_skill" name="country_skill">
													<option value=""> -- Please Select Country -- </option>
													@foreach ($country as $countries)
														<option value="{{$countries->id}}">{{$countries->name}}</option>
													@endforeach
												  </select>
											 </div>
										</div>
										<div class="col-lg-6">
											<label> City * </label>
											<div class="selectWrapper">
												<select class="form-control" id="city_skill" name="city_skill">
													<option value=""> -- Please Select City -- </option>
													@foreach ($city as $cities)
														<option value="{{$cities->id}}">{{$cities->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-lg-6">
											<label> Year of Study * </label>
											<input   name="year_skill" id="year_skill" type="number" class="form-control">
										</div>
										<div class="col-lg-6">
											<label> To : </label>
											<input  name="year_to_skill" id="year_to_skill" type="number" class="form-control">
										</div>
										<div class="col-lg-12">
											<label> Description * </label>
											<textarea name="description_training_skill" id="description_training_skill" cols='5' rows="3" class="form-control"></textarea>
										</div>
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


		<!-- User Education -->
		<div id="UserEducationEdit" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmUserEducationEdit" action="#">
						{{-- {{ method_field('PUT') }} --}}
						<input type="hidden" name="user_education_id_edit" id="user_education_id_edit" value="">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Education</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
												<label> School * </label>
												<input placeholder="Ex : Phnom Penh International University "  name="school_edit" id="school_edit" type="text" class="form-control">
										</div>
										<div class="col-lg-6">
												<label> Field of Study * </label>
												<input  name="study_edit" id="study_edit" type="text" class="form-control">
										</div>
										<div class="col-lg-12">
											<label> Degree * </label>
											<div class="selectWrapper">
													<select class="form-control" id="degree_edit" name="degree_edit"  >
													<option value=""> -- Please Select degree -- </option>
													@foreach ($degree as $degrees)
														<option value="{{$degrees}}">{{$degrees}}</option>
													@endforeach
												  </select>
											 </div>
										</div><br/>
										<div class="col-lg-6">
												<label> Country * </label>
											<div class="selectWrapper">
													<select class="form-control" id="country_edit" name="country_edit">
													<option value=""> -- Please Select Country -- </option>
													@foreach ($country as $countries)
														<option value="{{$countries->id}}">{{$countries->name}}</option>
													@endforeach
												  </select>
											 </div>
										</div>
										<div class="col-lg-6">
											<label> City * </label>
											<div class="">
												<select class="form-control" id="city_edit" name="city_edit">
													<option value=""> -- Please Select City -- </option>
													@foreach ($city as $cities)
														<option value="{{$cities->id}}">{{$cities->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-lg-6">
											<label> Year of Study * </label>
											<input   name="year_edit" id="year_edit" type="number" class="form-control">
										</div>
										<div class="col-lg-6">
											<label> To : </label>
											<input  name="year_to_edit" id="year_to_edit" type="number" class="form-control">
										</div>
										<div class="col-lg-12">
											<label> Description * </label>
											<textarea cols='5' rows="8" id="description_education_edit" name="description_education_edit" class="form-control"></textarea>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
									<input type="submit" class="btn btn-primary " value="Yes">
								</div>
						</form>
				</div>
			</div>
		</div>
		<div id="ModalDeleteUserEducation" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="frmDeleteUserEducation" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="user_education_delete_id" id="user_education_delete_id">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Education</h4>
								</div>
								<div class="modal-body">
									<span>Do you want to Delete this education ? </span>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
									<input type="submit" class="btn btn-primary " value="Yes">
								</div>
						</form>
				</div>
			</div>
		</div>
		<div id="UserEducation" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmAddEducation" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Education</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										
										<div class="col-lg-6">
												<label> School * </label>
												<input placeholder="Ex : Phnom Penh International University "  name="school" id="school" type="text" class="form-control">
										</div>
										<div class="col-lg-6">
												<label> Field of Study * </label>
												<input  name="study" id="study" type="text" class="form-control">
										</div>
										<div class="col-lg-12">
											<label> Degree * </label>
											<div class="selectWrapper">
													<select class="selectBox form-control" id="degree" name="degree">
													<option value=""> -- Please Select degree -- </option>
													@foreach ($degree as $degrees)
														<option value="{{$degrees}}">{{$degrees}}</option>
													@endforeach
												  </select>
											 </div>
										</div><br/>
										<div class="col-lg-6">
												<label> Country * </label>
											<div class="selectWrapper">
													<select class="form-control" id="country" name="country">
													<option value=""> -- Please Select Country -- </option>
													@foreach ($country as $countries)
														<option value="{{$countries->id}}">{{$countries->name}}</option>
													@endforeach
												  </select>
											 </div>
										</div>
										<div class="col-lg-6">
											<label> City * </label>
											<div class="selectWrapper ">
												<select class="selectBox form-control" id="city" name="city">
													<option value=""> -- Please Select City -- </option>
													@foreach ($city as $cities)
														<option value="{{$cities->id}}">{{$cities->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-lg-6">
											<label> Year of Study * </label>
											<input   name="year" id="year" type="number" class="form-control">
										</div>
										<div class="col-lg-6">
											<label> To : </label>
											<input  name="year_to" id="year_to" type="number" class="form-control">
										</div>
										<div class="col-lg-12">
											<label> Description * </label>
											<textarea cols='5' rows="8" id="description_education" name="description_education" class="form-control"></textarea>
										</div>
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
	  </div>
	</div>
  </div>
   <!-- //Education -->
  
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
	
	
