@extends('frontend.layouts.template')
@section('content')
@php
     use App\Model\language;
     use App\Model\jobTitle;
@endphp
<style>
    .fa-linkedin-square {
  display: inline-block;
  border-radius: 60px;
  color:#0e76a8;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.6em;

}
.fa-twitter-square {
  display: inline-block;
  border-radius: 60px;
  color:#00acee;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.6em;

}

.fa-facebook-square {
  display: inline-block;
  border-radius: 60px;
  color : #3b5998;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.6em;

}
</style>
<div class="pageTitle">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h1 class="page-heading">Dashboard</h1>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="breadCrumb"><span style="color:white;">Welcome /  {{Auth::user()->name}}</span></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Title End -->
  
  <div class="listpgWraper">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-2">
            
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
            <li><a href="#"><i class="fa fa-desktop" aria-hidden="true"></i> My Job Applications</a></li>
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
        <div class="col-md-9">
            <div class="job-header">
                <div class="jobinfo">
                  <div class="row">
                    <div class="col-md-8 col-sm-8"> 
                      <!-- Candidate Info -->
                      <div class="candidateinfo">
                        <div class="userPic">
                            <img class="img-circle" src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/candidates/01.jpg" alt=""></div>
                        <div class="title">{{Auth::user()->name}}</div>
                        <div class="desi">Senior Data Analytist</div>
                        <div class="loctext"><i class="fa fa-history" aria-hidden="true"></i> Member Since, Aug 14, 2016</div>
                        <div class="loctext"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->address}}</div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4"> 
                      <!-- Candidate Contact -->
                      <div class="candidateinfo">
                        <div class="loctext"><i class="fa fa-phone" aria-hidden="true"></i> (+1) 123.456.7890</div>
                        <div class="loctext"><i class="fa fa-envelope" aria-hidden="true"></i>{{$user->email}}</div>
                        <div class="loctext"><i class="fa fa-globe" aria-hidden="true"></i> www.mywebsite.com</div>
                        <div class="cadsocial"> 
                            <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                            <a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> 
                            <a href="http://www.facebook.com" target="_blank"> <i class="fa fa-facebook-square" aria-hidden="true"></i></a> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Buttons -->
                <div class="jobButtons"> <a href="#." class="btn apply">
                  <i class="fa fa-paper-plane" aria-hidden="true"></i> Hire Me</a>
                  <a href="{{url("user/generate-docx/".$user->id)}}" class="btn"><i class="fa fa-download" aria-hidden="true">
                  </i> Download CV</a> <a href="#." class="btn">
                    <i class="fa fa-envelope" aria-hidden="true"></i> Send Message</a> 
                   
    </div>
              </div>
              
              <!-- Job Detail start -->
              <div class="row">
                <div class="col-md-8"> 
                  <!-- About Employee start -->
                  <div class="job-header">
                    <div class="contentbox">
                      <h3>About me</h3>
                      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque massa vel lorem fermentum fringilla. Pellentesque id est et neque blandit ornare malesuada a mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis, quam a fringilla congue, turpis turpis molestie ligula, ut laoreet elit arcu sed nulla. Sed at quam commodo, egestas turpis eget, fringilla dui. Etiam sit amet nulla metus. Etiam iaculis lobortis ultricies. <strong>Maecenas maximus magna a metus consectetur, vel fermentum nisl ultrices</strong>. Quisque eget ante id dui posuere ullamcorper ut molestie eros. Aliquam ultrices lacinia risus, at lacinia ante vehicula id. Nulla in lectus dignissim, egestas purus sit amet, mattis libero. Maecenas ullamcorper rutrum porta. </p>
                      <ul>
                        <li>In non augue eget purus placerat aliquet sit amet lobortis lacus.</li>
                        <li>Curabitur interdum nisl quis placerat ornare.</li>
                        <li>Curabitur ornare enim ac aliquam efficitur.</li>
                        <li>Etiam volutpat leo et orci luctus, blandit accumsan arcu placerat.</li>
                        <li>Proin egestas dui et pulvinar pellentesque.</li>
                        <li>In ultricies nulla eget lacus tempor lobortis.</li>
                      </ul>
                    </div>
                  </div>
                  
                  <!-- Education start -->
                  <div class="job-header">
                    <div class="contentbox">
                      <h3>Education</h3>
                      @foreach ($user->education as $educations)
                      <ul class="experienceList">
                        <li>
                          <div class="row">
                            <div class="col-md-2"><img class="img-circle" src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/candidates/01.jpg" alt="your alt text"></div>
                            <div class="col-md-10">
                              <h4>{{$educations->school}}</h4>
                              <div class="row">
                                <div class="col-md-6">Degree : {{$educations->degree}}</div>
                                <div class="col-md-6">From {{$educations->year}} - {{$educations->year_to}}</div>
                              </div>
                              <p>{{$educations->description}}</p>
                            </div>
                          </div>
                        </li>
                      </ul><hr/>
                      @endforeach

                    </div>
                  </div>
                  
                  <!-- Experience start -->
                  <div class="job-header">
                    <div class="contentbox">
                      <h3>Experience</h3>
                      @foreach ($user->experience as $experiences)
                         @php
                         $jobTitle = jobTitle::where('id',$experiences->job_title_id)->first();
                        @endphp
                        <ul class="experienceList">
                            <li>
                            <div class="row">
                                <div class="col-md-10">
                                <h4>{{$experiences->company_name}}</h4>
                                <div class="row">
                                    <div class="col-md-6">Major : {{$jobTitle->name}}</div>
                                    <div class="col-md-6">From Month {{$experiences->from_month}} - {{$experiences->from_month_to}}</div>
                                </div>
                                <p>{{$experiences->description}}</p>
                                </div>
                            </div>
                            </li>
                        </ul>                        
                      @endforeach
                    </div>
                  </div>

                   <!-- Education start -->
                   <div class="job-header">
                    <div class="contentbox">
                      <h3>Training Skill</h3>
                      @foreach ($user->traning as $tranings)
                      <ul class="experienceList">
                        <li>
                          <div class="row">
                            <div class="col-md-2"><img class="img-circle" src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/candidates/01.jpg" alt="your alt text"></div>
                            <div class="col-md-10">
                              <h4>{{$tranings->school}}</h4>
                              <div class="row">
                                <div class="col-md-6">Major: {{$tranings->degree}}</div>
                                <div class="col-md-6">Year: {{$tranings->year . ' -' . $tranings->year_to}}</div>
                              </div>
                              <p>{{$tranings->description}}</p>
                            </div>
                          </div>
                        </li>
                      </ul><hr/>
                      @endforeach

                    </div>
                  </div>
                  <div class="job-header">
                    <div class="contentbox">
                      <h3>Reference</h3>
                      @foreach ($user->reference as $references)
                      <ul class="experienceList">
                        <li>
                          <div class="row">
                            <div class="col-md-2"><img class="img-circle" src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/candidates/01.jpg" alt="your alt text"></div>
                            <div class="col-md-10">
                              <h4>{{$references->name}}</h4>
                              <div class="row">
                                <div class="col-md-6">Major: {{$references->name}}</div>
                                <div class="col-md-6">Position: {{$references->position}}</div>
                                <div class="col-md-6">Email: {{$references->email}}</div>
                                <div class="col-md-6">Phone: {{$references->phone}}</div>
                              </div>
                              <p>{{$tranings->description}}</p>
                            </div>
                          </div>
                        </li>
                      </ul><hr/>
                      @endforeach

                    </div>
                  </div>
                  <!-- Portfolio start -->
                </div>
                <div class="col-md-4"> 
                  <!-- Candidate Detail start -->
                  <div class="job-header">
                    <div class="jobdetail">
                      <h3>Skill</h3>
                      <ul class="jbdetail">
                        @foreach ($user->skill as $skills)
                        <li class="row">
                          <div class="col-md-8 col-xs-8">{{$skills->name}}</div>
                          <div class="col-md-4 col-xs-4"><span class="freelance">{{$skills->year}} Years</span></div>
                        </li><hr/>
                        @endforeach
                        
                      </ul>
                    </div>
                  </div>
                  <div class="job-header">
                    <div class="jobdetail">
                      <h3>Language</h3>
                      <ul class="jbdetail">
                        @foreach ($user->language as $languages)
                        @php
                        $language = language::find($languages->language_id);
                     @endphp
                        <li class="row">
                            <div class="col-md-8 col-xs-8">{{$language->name}}</div>
                            <div class="col-md-4 col-xs-4"><span class="freelance">{{$languages->level}}</span></div>
                        </li><hr/>
                        @endforeach
                        
                      </ul>
                    </div>
                  </div>
                  <div class="job-header">
                    <div class="jobdetail">
                      <h3>Hobby & Interesting</h3>
                      <ul class="jbdetail">
                        @foreach ($user->hobby as $hobbies)
                        <li class="row">
                          <div class="col-md-12 col-xs-12">{{$hobbies->name}}</div>
                        </li><hr/>
                        @endforeach
                        
                      </ul>
                    </div>
                  </div>
                  <!-- Contact Company start -->
                  
                </div>
              </div>
              
      </div>
    </div>
  </div>
  </div>
  
  @endsection