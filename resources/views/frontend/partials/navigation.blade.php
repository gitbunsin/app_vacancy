<style>


</style>
<div class="header">
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-12"> <a href="index.html" class="logo"><img src="https://www.sharjeelanjum.com/demos/jobsportal-update/sitesetting_images/thumb/jobs-portal-1573969216-577.png" alt="" /></a>
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
                  <a href="{{url("contact")}}">Contact Us</a>
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
                  <li class="postjob"><a  href="{{url('login')}}">Sign in</a></li> 
                  <li class="jobseeker"><a href="{{url('register')}}">Register</a></li>
                @endif 
                <li class="dropdown userbtn"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update"><img src="https://www.sharjeelanjum.com/demos/jobsportal-update/images/lang.png" alt="" class="userimg"></a>
                  <ul class="dropdown-menu">
                   
                    <li><a href="javascript:;" onclick="event.preventDefault(); document.getElementById('locale-form-pt-br').submit();" class="nav-link">English</a>
                          <form id="locale-form-pt-br" action="https://www.sharjeelanjum.com/demos/jobsportal-update/set-locale" method="POST" style="display: none;">
                              <input type="hidden" name="_token" value="6K2tdVCwrH9IhRlWs4mVi7wSZ0S3FO3bG9C5at5v">
                              <input type="hidden" name="locale" value="pt-br">
                              <input type="hidden" name="return_url" value="https://www.sharjeelanjum.com/demos/jobsportal-update">
                              <input type="hidden" name="is_rtl" value="1">
                          </form>
                      </li>
                                                          <li><a href="javascript:;" onclick="event.preventDefault(); document.getElementById('locale-form-utf8').submit();" class="nav-link">Khmer</a>
                          <form id="locale-form-utf8" action="https://www.sharjeelanjum.com/demos/jobsportal-update/set-locale" method="POST" style="display: none;">
                              <input type="hidden" name="_token" value="6K2tdVCwrH9IhRlWs4mVi7wSZ0S3FO3bG9C5at5v">
                              <input type="hidden" name="locale" value="utf8">
                              <input type="hidden" name="return_url" value="https://www.sharjeelanjum.com/demos/jobsportal-update">
                              <input type="hidden" name="is_rtl" value="1">
                          </form>
                      </li>
                                                      </ul>
              </li>  
                
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