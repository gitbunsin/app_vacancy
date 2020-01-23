@extends('frontend.layouts.template')
@section('content')
@php
	$User = Auth::user();	
	use App\Model\Country;
	use App\Model\City;
	$country = Country::all();
	$city = City::all();
	use App\Model\jobTitle;
	$job_title = jobTitle::all();
	$degree = array("Associate degree","Bachelor degree","Master degree","Doctoral degree");

@endphp
<style>
.selectWrapper{
  border-radius:36px;
  display:inline-block;
  overflow:hidden;
  background:#cccccc;
  border:1px solid #cccccc;
  margin-top: 0px;
}
.selectBox{
  width:365px;
  height:40px;
  border:0px;
  outline:none;
}
</style>
	<div class="tr-profile section-padding">
	    <div class="container">
	        <div class="row">
	        	<div class="col-md-4 col-lg-3">
	        		<div class="tr-sidebar">
						<ul class="nav nav-tabs profile-tabs section" role="tablist">
							<li role="presentation"><a class="active" href="#account-info" aria-controls="account-info" role="tab" data-toggle="tab"><i class="fa fa-life-ring" aria-hidden="true"></i> Account Info</a></li>
							{{-- <li role="presentation"><a href="#resume" aria-controls="resume" role="tab" data-toggle="tab"><span><i class="fa fa-user-o" aria-hidden="true"></i></span> </a></li> --}}
							<li role="presentation"><a href="#edit-resume" aria-controls="edit-resume" role="tab" data-toggle="tab"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> My Resume</a></li>
							<li role="presentation"><a href="#bookmark" aria-controls="bookmark" role="tab" data-toggle="tab"><span><i class="fa fa-bookmark-o" aria-hidden="true"></i></span> Bookmark</a></li>
							<li role="presentation"><a href="#archived" aria-controls="archived" role="tab" data-toggle="tab"><span><i class="fa fa-clone" aria-hidden="true"></i></span>Change Password</a></li>
							<li role="presentation"><a href="#close-account" aria-controls="close-account" role="tab" data-toggle="tab"><span><i class="fa fa-scissors" aria-hidden="true"></i></span> Close Account</a></li>
						</ul>	
						<a href="#" class="btn btn-primary"><i class="fa fa-cloud-download" aria-hidden="true"></i> <span>Download Resume as doc</span></a>		        			
	        		</div><!-- /.tr-sidebar -->        		
				</div>
				@php
					// dd($user->id);
				@endphp
	            <div class="col-md-8 col-lg-9">
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in show active account-info" id="account-info">	
							<div class="section display-information">
								<form id="frmUpdateUserProfile">
											<input type="hidden" name="_token" value="{{ csrf_token()}}">
								<div class="title title-after">
									<div class="icon"><img src="{{asset('images/icons/2.png')}}" alt="Icon" class="img-fluid"></div> 
									<span>Your display Information</span>
								</div>
								<div class="change-photo">
									<div class="user-image">
										@if($user->profile)
											<img id="preview" src="{{url('uploads/UserCv/'.$user->profile)}}" width="350px" height="320px"/><br/>
										@else
											<img id="preview" src="{{asset('images/noimage.jpg')}}" width="350px" height="320px"/><br/>
										@endif
										<input type="file"id="image" style="display: none;"/>
									</div>
									<div class="upload-photo">
										<label class="btn btn-primary" for="upload-photo">
												<a style="color:white;" id="upload-photo" href="javascript:changeProfile()">Change</a>
				
										</label>
										<label class="btn btn-danger" for="upload-photo">
												<a style="color: white" href="javascript:removeImage()">Remove</a>
											</label>
										<span class="max-size">Max 20 MB</span>
									</div>
								</div>
								<ul class="tr-list account-details">
							<input type="hidden" value="{{$user->id}}" name="user_login_id" id="user_login_id">
							<div class="row">
				
									<div class="col-lg-6">
											<label>Name</label>
											<input value="{{$user->name}}" class="form-control" type="text" name="user_name" id="user_name"/>
									</div>
									<div class="col-lg-6">
											<label>Email</label>
											<input value="{{$user->email}}" class="form-control" type="email" name="user_email" id="user_email"/>
									</div>
									<div class="col-lg-6">
										<label>First Name</label>
										<input value="{{$user->first_name}}" class="form-control" type="text" name="user_first_name" id="user_first_name"/>
									</div>
									<div class="col-lg-6">
										<label>Last Name</label>
										<input value="{{$user->last_name}}" class="form-control" type="text" name="user_last_name" id="user_last_name"/>
									</div>
									<div class="col-lg-6">
											<label>Phone Number</label>
											<input value="{{$user->phone}}" class="form-control" type="number" name="user_phone" id="user_phone"/>
									</div>
									<div class="col-lg-6">
											<label>Zip Code</label>
											<input value="{{$user->zip}}" class="form-control" type="text" name="user_zip" id="user_zip"/>
									</div>
									<div class="col-lg-6">
											<label>Birth Date</label>
											<input class="form-control" type="date" name="user_date" id="user_date"/>
									</div>
									<div class="col-lg-6">
											<label>Nationality</label>
											<input class="form-control" type="text" name="user_nationality" id="user_nationality"/>
									</div>
									<div class="col-lg-6">
										<label>Sex</label>
										@php
											$sex = array('Male','Female');
										@endphp
										<select name="user_sex" id="user_sex" class="form-control">
											@foreach( $sex as $sexs)
												<option value="{{$sexs}}">{{$sexs}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-lg-6">
											<label>Address</label>
											<input value="{{$user->address}}" class="form-control" type="text" name="user_address" id="user_address"/>
									</div>
							</div>
							<div class="buttons pull-right">
									<button type="button" class="btn btn-primary" id="btn_save_profile" value="">Update Your Profile</button>
									<button type="submit" id="save_profile"  class="btn btn-primary" value="">Save</button>
							</div>
								</ul>	
							</form>							
							</div><!-- /.display-information -->
						</div><!-- /.tab-pane -->
						<div role="tabpanel" class="tab-pane edit-resume section" id="edit-resume">
								<h5>POST Your Resume Here's :  </h5>
								<a href="#" onclick="UploadResume();" class="btn btn-primary pull-right">Upload Resume</a>
								<div class="buttons">
									<br/><br/>	<br/>
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
													<th>
														<a onclick="EditUserCv({{$user_cv->id}});" class="btn btn-primary">Edit</a>
														<a onclick="DeleteUserCv({{$user_cv->id}});"  class="btn btn-danger">Delete</a>
													</th>
												</tr>
											@else

											@endif
											</tbody>
										  </table>	  
								</div>
								<hr/>
								<br/>
							<ul class="tr-list resume-info">
								
								<li class="work-history">
								  
								    <div class="media-body additem-work">
								    	<span class="tr-title">Education</span>
								    	<div id="addhistory" class="additem">
								    		<span  onclick="loadUserEducation();" class="icon clone"><i  class="fa fa-plus" aria-hidden="true"></i></span>
								    		<span class="icon remove"><i class="fa fa-times" aria-hidden="true"></i></span>
									    	<div class="code-edit-small" id="card_user_education">
												@foreach ($user->education as $educations)
													<div class="card" id="card_education{{$educations->id}}">
														<div class="card-body">
															<p class="card-text">
																<strong>School :</strong> 
																	{{$educations->school}} ,
																<strong> Degree : </strong> 
																	{{$educations->degree}} , 
																<strong>Year :</strong>
																	{{$educations->year .' - '.$educations->year_to }} &nbsp;&nbsp;
																 <strong>
																	 <a href="#" onclick="educationDelete({{$educations->id}});"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp; 
																	 <a href="#" onclick="educationEdit({{$educations->id}});"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>
																</p>
													
														</div>
													</div>
													<br/>
												@endforeach			 
									    	</div>
								    	</div>						    	
								    </div>
								</li><!-- /.work-history -->			
							</ul>
							<ul class="tr-list resume-info">
									<li class="work-history">
										<div class="media-body additem-work">
											<span class="tr-title">Traning Skills2</span>
											<div id="addhistory" class="additem">
												<span onclick="LoadUserSkill();" class="icon clone"><i  class="fa fa-plus" aria-hidden="true"></i></span>
												<div class="code-edit-small" id="card_user_skill">
														@foreach ($user->skill as $skills)
														<div class="card" id="card_skill{{$skills->id}}">
															<div class="card-body">
																<p class="card-text">
																	<strong>School :</strong> 
																		{{$skills->school}} ,
																	<strong> Degree : </strong> 
																		{{$skills->degree}} , 
																	<strong>Year :</strong>
																		{{$skills->year .' - '.$skills->year_to }} &nbsp;&nbsp;
																	 <strong>
																		 <a href="#" onclick="skillDelete({{$skills->id}});"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp; 
																		 <a href="#" onclick="skillEdit({{$skills->id}});"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>
																	</p>
															</div>
														</div>
														<br/>
													@endforeach					
												</div>
											</div>						    	
										</div>
									</li><!-- /.work-history -->			
								</ul>
								<ul class="tr-list resume-info">
										<li class="work-history">
											<div class="media-body additem-work">
												<span class="tr-title">Experience</span>
												<div id="addhistory" class="additem">
													<span onclick="userExperience();" class="icon clone"><i class="fa fa-plus" aria-hidden="true"></i></span>
													<div class="code-edit-small" id="div_card_experience">
															@foreach ($user->experience as $experiences)
																@php
																	$title =jobTitle::where('id',$experiences->job_title_id)->first();
																@endphp
																<div class="card" id="card_experience{{$experiences->id}}">
																	<div class="card-body">
																		<p class="card-text">
																			<strong>Job Title :</strong> 
																				{{$title->name}} ,
																			<strong> Company Name : </strong> 
																				{{$experiences->company_name}} , 
																			<strong>Year :</strong>
																				{{$experiences->year .' - '.$experiences->year_to }} &nbsp;&nbsp;
																			<strong>
																				<a href="#" onclick="experienceDelete({{$experiences->id}});"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp; 
																				<a href="#" onclick="experienceEdit({{$experiences->id}});"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>
																			</p>
																	</div>
																</div>
														<br/>
													@endforeach				
													</div>
												</div>						    	
											</div>
										</li><!-- /.work-history -->			
									</ul>
									<ul class="tr-list resume-info">
											<li class="work-history">
												<div class="media-body additem-work">
													<span class="tr-title">Language</span>
													<div id="addhistory" class="additem">
														<span id="clone" class="icon clone"><i class="fa fa-plus" aria-hidden="true"></i></span>
														<span class="icon remove"><i class="fa fa-times" aria-hidden="true"></i></span>
														<div class="code-edit-small">
																<div class="card">
																		<div class="card-body">
																		  <p class="card-text"><strong>School :</strong> PhnomPenhSecurities ,<strong> Degree : </strong> bachelor degree , <strong>Year :</strong>  2027 - 2027</p>
																		</div>
																	  </div>
																	  <br/>
																	
														</div>
													</div>						    	
												</div>
											</li><!-- /.work-history -->			
										</ul>
										<ul class="tr-list resume-info">
												<li class="work-history">
													<div class="media-body additem-work">
														<span class="tr-title">Computer Skill</span>
														<div id="addhistory" class="additem">
															<span id="clone" class="icon clone"><i class="fa fa-plus" aria-hidden="true"></i></span>
															<span class="icon remove"><i class="fa fa-times" aria-hidden="true"></i></span>
															<div class="code-edit-small">
																	<div class="card">
																			<div class="card-body">
																			  <p class="card-text"><strong>School :</strong> PhnomPenhSecurities ,<strong> Degree : </strong> bachelor degree , <strong>Year :</strong>  2027 - 2027</p>
																			</div>
																		  </div>
																		  <br/>
																		
															</div>
														</div>						    	
													</div>
												</li><!-- /.work-history -->			
											</ul>
											<ul class="tr-list resume-info">
													<li class="work-history">
														<div class="media-body additem-work">
															<span class="tr-title">About Me</span>
															<div id="addhistory" class="additem">
																<span id="clone" class="icon clone"><i class="fa fa-plus" aria-hidden="true"></i></span>
																<span class="icon remove"><i class="fa fa-times" aria-hidden="true"></i></span>
																<div class="code-edit-small">
																		<div class="card">
																				<div class="card-body">
																				  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
																				</div>
																			  </div>
																			  <br/>
																			
																</div>
															</div>						    	
														</div>
													</li><!-- /.work-history -->			
												</ul>
							<div class="buttons pull-right">
								<a href="#" class="btn button-cancle">Back</a>
								</div>								
						</div><!-- /.tab-pane -->

						<div role="tabpanel" class="tab-pane tab-pane open-role" id="bookmark">
									<div class="role remove-item">
											<div class="left-content">
												<div class="clearfix">
													<span class="tr-title">
														<a href="#">Design Associate</a>
													</span>
													<span><a href="#" class="btn btn-primary">Part Time</a></span>
												</div>
												<span class="deadline">Application Deadline : Jun 27, 2017</span>
												<ul class="tr-list job-meta">
													<li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
													<li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
													<li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
												</ul>										
											</div>
											<div class="right-content">
												<span style="color:red;" class="remove-icon"><i class="fa fa-trash-o"></i></span>
											</div>
										</div>
						</div><!-- /.tab-pane -->

						<div role="tabpanel" class="tab-pane section close-account" id="archived">
							<h1>Change Your Password Account</h1>
							<span>Are you sure, you want to change your account?</span>
							<form action="#" id="frmUserChangePassword">
								<input type="hidden" id="user_password" value="{{$user->id}}">
								<input type="hidden" name="_token" value="{{ csrf_token()}}">
								
								<div class="col-lg-12">
										<div class="form-group">
												<input type="password" placeholder="new password" class="form-control" id="new_password" name="new_password"/>
										</div>
								</div>
								<div class="col-lg-12">
										<div class="form-group">
												<input type="password" placeholder="confirm password" class="form-control" id="confirm_password" name="confirm_password"/>
										</div>
								</div>
								<div class="buttons">
										<a href="#" class="btn btn-primary">Cancel</a>
										<input type="submit" class="btn btn-primary" value="Yes">
									</div>
							</form>
							
						</div>
							

						<div role="tabpanel" class="tab-pane section close-account" id="close-account">
							<h1>Delete Your Account</h1>
							<span>Are you sure, you want to delete your account?</span>
							<div class="buttons">
								<a href="#" class="btn btn-primary">Delete Account</a>
								<a href="#" class="btn button-cancle">Cancle</a>
							</div>
						</div><!-- /.tab-pane -->
					</div>
	            </div>
	        </div><!-- /.row -->
	    </div><!-- /.container -->
	</div><!-- /.tr-profile -->	

	<!-- /.tr-user-Experience -->
	<div id="ModalAddUserExperienceEdit" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmAddUserExpericenseEdit">
						<input type="hidden" name="user_experience_edit_id" id="user_experience_edit_id">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;">Experience</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
												<label> Job Title * </label>
												<div class="selectWrapper">
														<select class="selectBox" id="job_title_id_edit" name="job_title_id">
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
													<select class="selectBox" id="country_experience_edit" name="country_experience_edit">
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
												<select class="selectBox" id="city_experience_edit" name="city_experience_edit">
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
											<textarea cols='5' rows="3" id="description_edit" name="description_edit" class="form-control"></textarea>
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
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmDeleteUserExperience" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="user_experience_id" id="user_experience_id">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Experience </h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
												<label> Job Title * </label>
												<div class="selectWrapper">
														<select class="selectBox" id="job_title_id" name="job_title_id">
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
													<select class="selectBox" id="country_experience" name="country_experience">
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
												<select class="selectBox" id="city_experience" name="city_experience">
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
											<textarea cols='5' rows="3" class="form-control"></textarea>
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

	<!-- /.tr-user-skill -->
	<div id="ModalEditUserSkill" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmEditUserSkill" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" id="user_skill_id_edit" value="{{$User->id}}">
						<input type="hidden" id="user_skill_id_edit_id" value="{{$User->id}}">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Skill</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
													<select class="selectBox" id="degree_skill_edit" name="degree_skill_edit"  style="width:765px;" >
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
													<select class="selectBox" id="country_skill_edit" name="country_skill_edit">
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
												<select class="selectBox" id="city_skill_edit" name="city_skill_edit">
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

	<!-- /.tr-user-skill -->
	<div id="ModalDeleteUserSkill" class="modal fade">
			<div class="modal-dialog modal-lg">
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
						<input type="hidden" id="user_skill_id" value="{{$User->id}}">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Skill</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
													<select class="selectBox" id="degree_skill" name="degree_skill"  style="width:765px;" >
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
													<select class="selectBox" id="country_skill" name="country_skill">
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
												<select class="selectBox" id="city_skill" name="city_skill">
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

		
	<!-- /.tr-user-education-->
	<div id="UserEducationEdit" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmUserEducationEdit" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" id="user_education_id_edit" value="">
						  <input type="hidden" id="user_edit_education_id" value="{{$User->id}}">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Education</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
													<select class="selectBox" id="degree_edit" name="degree_edit"  style="width:765px;" >
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
													<select class="selectBox" id="country_edit" name="country_edit">
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
												<select class="selectBox" id="city_edit" name="city_edit">
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


	<div id="ModalDeleteUserEducation" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="frmDeleteUserEducation" enctype="multipart/form-data" action="#" method="POST">
						<input type="hidden" name="user_education_delete_id" id="user_education_delete_id">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div  class="modal-header theme-bg" style="background-color:#008def" >
								<h4 class="modal-title" style="color:white;"> Education</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">
									<span>Do you want to Delete this education ? </span>
								</div>
								<div class="modal-footer">
									<input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
									<input type="submit" class="btn btn-primary" value="Yes">
								</div>
						</form>
				</div>
			</div>
		</div>
	<!-- /.tr-user-education-->
	<div id="UserEducation" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmAddEducation" enctype="multipart/form-data" action="#" method="POST">
                    <input type="hidden" id="user_education_id" value="{{$User->id}}">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <div  class="modal-header theme-bg" style="background-color:#008def" >
                            <h4 class="modal-title" style="color:white;"> Education</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
												<select class="selectBox" id="degree" name="degree"  style="width:765px;" >
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
												<select class="selectBox" id="country" name="country">
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
											<select class="selectBox" id="city" name="city">
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
	<!-- /.tr-login-apply-job not login -->
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




	{{-- ///Delete --}}
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
	
	@endsection
	@section('scripts')
		<script src="{{asset('js/frontend/user_experience.js')}}"></script>
		<script src="{{asset('js/frontend/user_skill.js')}}"></script>
		<script src="{{asset('js/frontend/user_education.js')}}"></script>
		<script src="{{asset('js/backend/apply_job.js')}}"></script>
		<script src="{{asset('js/backend/user_profile.js')}}"></script>
	@endsection
	
	
