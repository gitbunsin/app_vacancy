<style>
  /* @font-face { 
  font-family: Koulen; src: url('https://fonts.googleapis.com/css?family=Koulen');
  } */
</style>
<div class="header">
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-12"> <a href="index.html" class="logo"><img src="" alt="" /></a>
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
                  <a id="{{__('menu.font_family_en')}}" href="{{url('home')}}">{{__('menu.home')}}</a>
                </li>
                <li class="{{ (request()->segment(1) == 'job') ? 'active' : '' }}"> 
                  <a id="{{__('menu.font_family_en')}}" href="{{url('job')}}">{{__('menu.job')}}</a>
                </li>
                <li class="{{ (request()->segment(1) == 'package') ? 'active' : '' }}"> 
                  <a id="{{__('menu.font_family_en')}}"href="{{url('package')}}">{{__('menu.our_package')}}</a>
                </li>
                <li class="{{ (request()->segment(1) == 'news') ? 'active' : '' }}"> 
                  <a id="{{__('menu.font_family_en')}}" href="{{url('news')}}">{{__('menu.blog')}}</a>
                </li>
                <li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}">
                  <a id="{{__('menu.font_family_en')}}" href="{{url("contact")}}">{{__('menu.contact_us')}}</a>
                </li>
                @if (Auth::check())
                  <li class="dropdown userbtn"><a href=""><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/candidates/01.jpg" alt="" class="userimg" /></a>
                    <ul class="dropdown-menu">
                      <li><a id="{{__('menu.font_family_en')}}" href="{{url('/user/my-dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('menu.dashboard')}}</a></li>
                      <li><a id="{{__('menu.font_family_en')}}" href="{{url('/user/my-profile')}}"><i class="fa fa-pencil" aria-hidden="true"></i> {{__('menu.my_profile')}}</a></li>
                      <li><a id="{{__('menu.font_family_en')}}" href="#"><i class="fa fa-briefcase" aria-hidden="true"></i> {{__('menu.my_job')}}</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a id="{{__('menu.font_family_en')}}" href="{{url('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('menu.logout')}}</a></li>
                    </ul>
                </li>
                @else
                  <li id="{{__('menu.font_family_en')}}" class="postjob"><a  href="{{url('login')}}"> {{__('menu.sign_in')}}</a></li> 
                  <li id="{{__('menu.font_family_en')}}" class="jobseeker"><a href="{{url('register')}}"> {{__('menu.register')}}</a></li>
                @endif 
                <li class="dropdown userbtn"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update"><img src="https://www.sharjeelanjum.com/demos/jobsportal-update/images/lang.png" alt="" class="userimg"></a>
                  <ul class="dropdown-menu">
                   
                    <li><a  href="{{ url('/en') }}" class="nav-link">English</a></li>
                    <li><a href="{{ url('/kh') }}"  class="nav-link">Khmer</a></li>
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