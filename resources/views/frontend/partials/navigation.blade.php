{{-- <input id="registrar-btn" type="button"> <span id="in-progress"> 0 </span> --}}

<header class="tr-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa fa-align-justify"></i></span>
                </button>
                <a class="navbar-brand" href="index.html"><img class="img-fluid" src="{{asset('images/logo.png')}}" alt="Logo"></a>
            </div>
            <!-- /.navbar-header -->
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav">
                        <li class="{{ (request()->segment(1) == 'job') ? 'active' : '' }}">  
                        <a href="{{'/job'}}">Home</a>
                    </li>
                    <li class="{{ (request()->segment(1) == 'about') ? 'active' : '' }}">  
                        <a href="{{url('about')}}">About Us</a>
                    </li>
                    <li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}"> 
                        <a href="{{url('contact')}}">Contact Us</a>
                    </li>
                    @if(Auth::check())
                    <li class="tr-dropdown"><a href="#">Candidate   </a>
                        <ul class="tr-dropdown-menu tr-list fadeInUp" role="menu">
                            <li><a href="{{url('user-profile')}}">Employee Profile</a></li>
                            <li><a href="view-compnay.html">View Compnay</a></li>
                            <li><a href="view-resume.html">View Resume</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="navbar-right">	
                	
                    @if (Auth::check())
                    <div class="dropdown tr-change-dropdown">
                            <i class="fa fa-user"></i>
                            <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text"><b>
                                    {{ Auth::user()->name }}
                            </b></span><i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu tr-list">
                                {{-- <ul class="dropdown-menu tr-change tr-list"> --}}
                                <li><a  href="{{url('/logout')}}">Logout</a></li>
                            </ul>								
                        </div><!-- /.language-dropdown -->	
                @else
                <ul class="sign-in tr-list">
                        <li><i class="fa fa-user"></i></li>
                        <li><a href="#" data-toggle="modal" data-target="#login">Sign In </a></li>
                        <li><a href="#" onclick="LoadRegister();">Register</a></li>
                    </ul><!-- /.sign-in -->	
              @endif    					
            </div><!-- /.nav-right -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->
</header><!-- /.tr-header -->
<!-- /.Register  -->
<div class="modal fade" id="Register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div style="background-color:#008def" class="modal-header">
          {{-- <h5 style="color:white;" class="modal-title" id="exampleModalLabel">Register</h5> --}}
            <h5 style="color:white;" class="modal-title" >Register</h5>
        </div>
        <div class="modal-body">
                        <div class="text-center">
                            <div class="user-account">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs  nav-justified" role="tablist">
                                    <li role="presentation"><a class="active" href="#seeker" aria-controls="seeker" role="tab" data-toggle="tab">Job Seeker</a></li>
                                    <li role="presentation"><a href="#employers" aria-controls="employers" role="tab" data-toggle="tab">Employers</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="seeker">
                                        <div class="account-content">
                                            <form action="#" id="frmSeekerRegister" class="tr-form">
                
                                                <div class="form-group">
                                                    <input required  name="seeker_username" id="seeker_username" type="text" class="form-control" placeholder="Username">
                                                </div>
                                                <div class="form-group">
                                                    <input onblur="checkmain(this.value)" required type="email" name="seeker_email" id="seeker_email" class="form-control" placeholder="your Email">
                                                </div>
                                                <div class="form-group">
                                                    <input required type="password" name="seeker_password" id="seeker_password" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="seeker_confirm_password" id="seeker_confirm_password" class="form-control" placeholder="Confirm Password">
                                                </div>					
                                                <button type="submit" class="btn btn-primary">Sign Up</button>
                                            </form>	
                                            <div class="new-user text-center">
                                                <span>Already Registered? <a href="signin.html">Sign in</a> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="employers">
                                        <div class="account-content">
                                            <form action="#" id="frmEmployerLogin" class="tr-form">
                                                <div class="form-group">
                                                    <input required type="text" class="form-control" name="admin_user_name" id="admin_user_name" placeholder="Username">
                                                </div>
                                                <div class="form-group">
                                                    <input onblur="checkAdminMail(this.value)" required type="email" class="form-control" name="admin_email" id="admin_email" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <input required type="password" class="form-control" name="admin_password" id="admin_password" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <input required type="password" class="form-control" name="admin_confirm_password" id="admin_confirm_password" placeholder="Confirm Password">
                                                </div>												
                                                <button type="submit" class="btn btn-primary">Sign Up</button>
                                            </form>	
                                        </div>
                                    </div>
                                </div>				
                            </div>				
                        </div><!-- container -->
        </div>
      </div>
    </div>
  </div>


  <!-- /.Login  -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div style="background-color:#008def" class="modal-header">
          <h5 style="color:white;" class="modal-title" id="exampleModalLabel">Sign In</h5>
        </div>
        <div class="modal-body">
                <div class="text-center">
                        <div class="user-account">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs  nav-justified" role="tablist">
                                <li role="presentation"><a class="active" href="#seekerLogin" aria-controls="seeker" role="tab" data-toggle="tab">Job Seeker</a></li>
                                <li role="presentation"><a href="#admin" aria-controls="employers" role="tab" data-toggle="tab">Employers</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="seekerLogin">
                                    <div class="account-content">
                                        <form action="#" id="frmUserLogin" class="tr-form">
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <input type="email" id="email" name="email" class="form-control" placeholder="email">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="password">
                                            </div>
                                            <div class="user-option">
                                                    <div class="checkbox">
                                                        <label for="logged"><input type="checkbox" name="logged" id="logged">Remember me</label>
                                                    </div>
                                                    <div class="forgot-password">
                                                        <a href="#">I forgot password</a>
                                                    </div>
                                                </div>	
                                        				
                                            <button type="submit" class="btn btn-primary">Sign Up</button>
                                        </form>	
                                        <div class="new-user text-center">
                                            <span>Already Registered? <a href="signin.html">Register</a> </span>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="admin">
                                    <div class="account-content">
                                        <form action="#" class="tr-form" id="frmLoginEmployer">
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <input required id="admin_email_login" name="admin_email_login" type="email" class="form-control" placeholder="email">
                                            </div>
                                            <div class="form-group">
                                                <input required id="admin_password_login" name="admin_password_login" type="password" class="form-control" placeholder="password">
                                            </div>
                                            <div class="user-option">
                                                    <div class="checkbox">
                                                        <label for="loggedAdmin"><input type="checkbox" name="loggedAdmin" id="loggedAdmin">Remember me</label>
                                                    </div>
                                                    <div class="forgot-password">
                                                        <a href="#">I forgot password</a>
                                                    </div>
                                                </div>				
                                            <button type="submit" class="btn btn-primary">Sign Up</button>
                                        </form>	
                                        <div class="new-user text-center">
                                            <span>Already Registered? <a href="signin.html">Register</a> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>				
                        </div>				
                    </div>
        </div>
      </div>
    </div>
  </div>
  @section('scripts')
       
  @endsection