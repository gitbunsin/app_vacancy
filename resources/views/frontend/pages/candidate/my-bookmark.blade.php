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
	use App\Model\company;
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
			  <div id="{{__('menu.font_family_en')}}" class="txtlbl"> {{__('dashboard.immediate_available')}} <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus consectetur sagittis. Duis vitae urna vehicula, ornare nibh non, aliquet neque. In vitae erat ut augue suscipit." data-original-title="" title=""></i></div>
			  <div class="pull-right"><label class="switch switch-green">
				<input type="checkbox" class="switch-input">
				<span class="switch-label" data-on="On" data-off="Off"></span>
				<span class="switch-handle"></span>
			  </label></div>
			  <div class="clearfix"></div>
		  </div>
		
		  <ul class="usernavdash">
            <li class="{{(request()->segment(2) == 'my-dashboard') ? 'active' : '' }}">
              <a id="{{__('menu.font_family_en')}}" href="{{url('/user/my-dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>{{__('dashboard.candidate_dashboard')}}</a>
            </li>
            <li class="{{(request()->segment(2) == 'my-profile') ? 'active' : '' }}">
              <a id="{{__('menu.font_family_en')}}"  href="{{url('/user/my-profile')}}"><i class="fa fa-user" aria-hidden="true"></i>{{__('dashboard.my_details')}}</a>
            </li>
            <li class="{{(request()->segment(2) == 'my-job') ? 'active' : '' }}">
              <a  id="{{__('menu.font_family_en')}}" href="{{url('/user/my-job')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>{{__('dashboard.my_job_application')}}</a>
              </li>
            <li class="{{(request()->segment(2) == 'view-bookmark') ? 'active' : '' }}">
              <a id="{{__('menu.font_family_en')}}" href="{{url('/user/view-bookmark')}}"><i class="fa fa-desktop" aria-hidden="true"></i>{{__('dashboard.my_favorite_job')}}</a>
            </li>
            <li class="{{(request()->segment(2) == 'view-profile') ? 'active' : '' }}">
                      <a id="{{__('menu.font_family_en')}}" href="{{url('/user/view-profile')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{{__('dashboard.view_resume')}}</a>
                  </li>
            <li class="{{(request()->segment(2) == 'my-resume') ? 'active' : '' }}">
                      <a id="{{__('menu.font_family_en')}}" href="{{url('/user/my-resume')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{{__('dashboard.build_resume')}}</a>
                  </li>
            <li class="{{(request()->segment(2) == 'upload-resume') ? 'active' : '' }}">
              <a id="{{__('menu.font_family_en')}}" href="{{url('/user/upload-resume')}}"><i class="fa fa-paper-plane" aria-hidden="true"></i>{{__('dashboard.upload_resume')}}</a>
            </li>
          
            <li><a id="{{__('menu.font_family_en')}}" href="#"><i class="fa fa-star" aria-hidden="true"></i>{{__('dashboard.my_package')}}</a></li>
                  <li class="{{(request()->segment(2) == 'account-setting') ? 'active' : '' }}">
                      <a id="{{__('menu.font_family_en')}}" href="{{url('user/account-setting')}}"><i class="fa fa-lock" aria-hidden="true"></i>{{__('dashboard.account_setting')}}</a>
                  </li>
            <li><a id="{{__('menu.font_family_en')}}" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>{{__('dashboard.logout')}}</a></li>
          </ul>
		</div>
		<div class="col-md-9 col-sm-8">
            <div class="row">
                <div class="col-md-12">
                  <div class="userccount">
                    <div class="formpanel">  
                      <!-- Personal Information -->
					  
					 	 <h3>Favourite Jobs</h3>
						 <span>Here all ! Your favourite jobs </span><br/><br/>
						 <ul class="jobslist row">
							<!--Job start-->
							@foreach ($bookmarks as  $bookmark)
								@php
									$com = vacancy::with('company')->where('company_id',$bookmark->vacancy->company_id)->first();
									// dd($company);
								@endphp
								<li class="col-md-12 remove-bookmark{{$bookmark->id}}">
								<div class="jobint">
									<div class="row">
									<div class="col-md-2 col-sm-2"><img height="100px;" src="{{asset('/uploads/UserCv/'.$com->company->company_logo)}}" alt="Job Name" /></div>
									<div class="col-md-7 col-sm-7">
										<h4><a href="{{url('vacancy/detail/'.$bookmark->vacancy->id)}}">{{$bookmark->vacancy->vacancy_name}}</a></h4>
										<div class="company"><a href="#.">{{$bookmark->vacancy->category->name}}</a>
										</div>
										<div class="jobloc"><label class="fulltime">{{$bookmark->vacancy->jobType->name}}</label>   - <span>{{$bookmark->vacancy->province->name}}</span></div>
									</div>
									<div class="col-md-2 col-sm-2">
										<a href="#" onclick="bookmarkDelete({{$bookmark->id}});"  class="btn btn-primary">Delete</a>
									</div>
									</div>
								</div>
								</li>								
							@endforeach
						 </ul>
                    </div>
                  </div>
                </div>
            
		  </div>
		</div>
	  </div>
	</div>
  </div>
  <div id="userBookmarkDelete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmVacancyBookmarkDelete">
                <input type="hidden" id="user_bookmark_id_delete" value="">
                @if (Auth::check())
                 <input type="hidden" id="candidate_id" value="{{auth::user()->id}}">
               
                @endif  
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div  class="modal-header theme-bg" style="background-color:#008def" >
                        <h4 class="modal-title" style="color:white;"> Favourite Jobs</h4>
                            {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label> Do u want to deleted this Favourite Jobs ? </label>
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
	
	@endsection
	@section('scripts')
		<script src="{{asset('js/backend/bookmark.js')}}"></script>
	@endsection
	
	
