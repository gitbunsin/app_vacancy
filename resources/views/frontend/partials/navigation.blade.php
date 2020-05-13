<style>


</style>
<div class="header">
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-12"> <a href="index.html" class="logo"><img src="https://demo.themeregion.com/jobs/images/logo.png" alt="" /></a>
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12"> 
          <!-- Nav start -->
          <div class="navbar navbar-default" role="navigation">
            <div class="navbar-collapse collapse" id="nav-main">
              <ul class="nav navbar-nav">
                <li class="{{ (request()->segment(1) == 'home') ? 'active' : '' }}">  
                  <a href="{{url('home')}}">Home</a>
                </li>
                {{-- <li class="{{ (request()->segment(1) == 'about') ? 'active' : '' }}"> 
                  <a href="{{url('about')}}">About us</a>
                </li> --}}
                <li class="{{ (request()->segment(1) == 'job') ? 'active' : '' }}"> 
                  <a href="{{url('job')}}">Job Listing</a>
                </li>
                <li class="{{ (request()->segment(1) == 'package') ? 'active' : '' }}"> 
                  <a href="{{url('package')}}">Our Package</a>
                </li>
                <li class="{{ (request()->segment(1) == 'news') ? 'active' : '' }}"> 
                  <a href="{{url('news')}}">Blog</a>
                </li>
                <li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}">
                  <a href="{{url("contact")}}">Contact</a>
                </li>
                @if (Auth::check())
                  <li class="dropdown userbtn"><a href=""><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/candidates/01.jpg" alt="" class="userimg" /></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{url('/user/my-dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                      <li><a href="{{url('/user/my-profile')}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a></li>
                      <li><a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i> My Jobs</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="{{url('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                    </ul>
                </li>
                @else
                  <li class="postjob"><a  href="{{url('login')}}">Post a job  </a></li> 
                  <li class="jobseeker"><a href="{{url('register')}}">Job Seeker</a></li>
                @endif   
                
              </ul>
              
              <!-- Nav collapes end --> 
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- Nav end --> 
        </div>
      </div>
      <!-- row end --> 
    </div>
    <!-- Header container end --> 
  </div>