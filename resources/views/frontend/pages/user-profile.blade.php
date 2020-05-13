@extends('frontend.layouts.template')
@section('content')
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
			<li class="active"><a href="#"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
			<li class="nav-item">
				<a href="nav-link"><i class="fa fa-user" aria-hidden="true"></i> My Details</a>
			</li>
			<li><a href="#"><i class="fa fa-desktop" aria-hidden="true"></i> My Job Applications</a></li>
			<li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> View Resume</a></li>
			<li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Build Resume</a></li>
			<li><a href="#"><i class="fa fa-trash" aria-hidden="true"></i> Delete Resume</a></li>
			<li><a href="#"><i class="fa fa-commenting" aria-hidden="true"></i> Feedback</a></li>
			<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> Followers</a></li>
			<li><a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i> My Package</a></li>
			<li><a href="#"><i class="fa fa-tag" aria-hidden="true"></i> Tags</a></li>
			<li><a href="#"><i class="fa fa-lock" aria-hidden="true"></i> Account Setting</a></li>
			<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		  </ul>
		</div>
		<div class="col-md-9 col-sm-8">
		  <ul class="row profilestat">
			<li class="col-md-2 col-sm-4 col-xs-6">
			  <div class="inbox"> <i class="fa fa-eye" aria-hidden="true"></i>
				<h6>10</h6>
				<strong>Profile Views</strong> </div>
			</li>
			<li class="col-md-2 col-sm-4 col-xs-6">
			  <div class="inbox"> <i class="fa fa-tachometer" aria-hidden="true"></i>
				<h6>2 <span>hr</span></h6>
				<strong>Respond Time</strong> </div>
			</li>
			<li class="col-md-2 col-sm-4 col-xs-6">
			  <div class="inbox"> <i class="fa fa-clock-o" aria-hidden="true"></i>
				<h6>10</h6>
				<strong>Ad Expire</strong> </div>
			</li>
			<li class="col-md-2 col-sm-4 col-xs-6">
			  <div class="inbox"> <i class="fa fa-user-o" aria-hidden="true"></i>
				<h6>21</h6>
				<strong>Followers</strong> </div>
			</li>
			<li class="col-md-2 col-sm-4 col-xs-6">
			  <div class="inbox"> <i class="fa fa-briefcase" aria-hidden="true"></i>
				<h6>2</h6>
				<strong>My CV List</strong> </div>
			</li>
			<li class="col-md-2 col-sm-4 col-xs-6">
			  <div class="inbox"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
				<h6>8</h6>
				<strong>Messages</strong> </div>
			</li>
		  </ul>
		  
		  <div class="instoretxt">
			<div class="credit">Your on site available credit is: <strong>$99.00</strong></div>
			<a href="#.">Update Package</a> <a href="#." class="history">Payment History</a> </div>
			
		  <div class="myads">
			<h3>Similar Jobs</h3>
			<ul class="searchList">
			  <!-- start -->
			  <li>
			  <div class="row">
				<div class="col-md-8 col-sm-8">
				  <div class="jobimg"><img src="images/jobs/jobimg.jpg" alt="Job Name"></div>
				  <div class="jobinfo">
					<h3><a href="#.">Technical Database Engineer</a></h3>
					<div class="companyName"><a href="#.">Datebase Management Company</a></div>
					<div class="location">Permanent   - <span>New York</span></div>
				  </div>
				  <div class="clearfix"></div>
				</div>
				<div class="col-md-4 col-sm-4">
				  <div class="listbtn"><a href="#.">Apply Now</a></div>
				</div>
			  </div>
			  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce venenatis arcu est. Phasellus vel dignissim tellus. Aenean fermentum fermentum convallis.</p>
			</li>
			  <!-- end --> 
			  
			  <!-- start -->
			  <li>
			  <div class="row">
				<div class="col-md-8 col-sm-8">
				  <div class="jobimg"><img src="images/jobs/jobimg.jpg" alt="Job Name"></div>
				  <div class="jobinfo">
					<h3><a href="#.">Technical Database Engineer</a></h3>
					<div class="companyName"><a href="#.">Datebase Management Company</a></div>
					<div class="location">Permanent   - <span>New York</span></div>
				  </div>
				  <div class="clearfix"></div>
				</div>
				<div class="col-md-4 col-sm-4">
				  <div class="listbtn"><a href="#.">Apply Now</a></div>
				</div>
			  </div>
			  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce venenatis arcu est. Phasellus vel dignissim tellus. Aenean fermentum fermentum convallis.</p>
			</li>
			  <!-- end --> 
			  
			  <!-- start -->
			  <li>
			  <div class="row">
				<div class="col-md-8 col-sm-8">
				  <div class="jobimg"><img src="images/jobs/jobimg.jpg" alt="Job Name"></div>
				  <div class="jobinfo">
					<h3><a href="#.">Technical Database Engineer</a></h3>
					<div class="companyName"><a href="#.">Datebase Management Company</a></div>
					<div class="location">Permanent   - <span>New York</span></div>
				  </div>
				  <div class="clearfix"></div>
				</div>
				<div class="col-md-4 col-sm-4">
				  <div class="listbtn"><a href="#.">Apply Now</a></div>
				</div>
			  </div>
			  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce venenatis arcu est. Phasellus vel dignissim tellus. Aenean fermentum fermentum convallis.</p>
			</li>
			  <!-- end -->
			</ul>
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
	
	
