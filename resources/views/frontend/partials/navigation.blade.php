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
                    <li class="tr-dropdown active"><a href="#">Home</a></li>
                    <li><a href="{{url('about')}}">About Us</a></li>
                    <li><a href="{{url('contact')}}">Contact Us</a></li>
                    <li class="tr-dropdown"><a href="#">Candidate   </a>
                        <ul class="tr-dropdown-menu tr-list fadeInUp" role="menu">
                            <li><a href="{{url('user-profile')}}">Employee Profile</a></li>
                            <li><a href="view-compnay.html">View Compnay</a></li>
                            <li><a href="view-resume.html">View Resume</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="navbar-right">			
                <div class="dropdown tr-change-dropdown">
                    <i class="fa fa-globe"></i>
                    <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">United Kingdom</span><i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu tr-change tr-list">
                        <li><a href="#">United Kingdom</a></li>
                        <li><a href="#">United States</a></li>
                        <li><a href="#">China</a></li>
                        <li><a href="#">Russia</a></li>
                    </ul>								
                </div><!-- /.language-dropdown -->					
                <ul class="sign-in tr-list">
                    <li><i class="fa fa-user"></i></li>
                    <li><a href="#" data-toggle="modal" data-target="#exampleModal">Sign In </a></li>
                    <li><a href="#" data-toggle="modal" data-target="#examplRegister">Register</a></li>
                </ul><!-- /.sign-in -->					

                <a href="job-post.html" class="btn btn-primary">Post Job</a>
            </div><!-- /.nav-right -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->
</header><!-- /.tr-header -->
{{-- Register --}}
<div class="modal fade" id="examplRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div style="background-color:#008def" class="modal-header">
          <h5 style="color:white;" class="modal-title" id="exampleModalLabel">Register</h5>
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
                                            <form action="#" class="tr-form">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Full Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Username">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="your Email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Confirm Password">
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
                                            <form action="#" class="tr-form">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Your Full Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Username">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="your Email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Confirm Password">
                                                </div>												
                                                <button type="submit" class="btn btn-primary">Sign Up</button>
                                            </form>	
                                            <div class="new-user text-center">
                                                <span>Already Registered? <a href="signin.html">Sign in</a> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>				
                            </div>				
                        </div><!-- container -->
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <li role="presentation"><a href="#employersLogin" aria-controls="employers" role="tab" data-toggle="tab">Employers</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="seekerLogin">
                                    <div class="account-content">
                                        <form action="#" class="tr-form">
                                        
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="your Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password">
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
                                <div role="tabpanel" class="tab-pane" id="employersLogin">
                                    <div class="account-content">
                                        <form action="#" class="tr-form">
                                           
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="your Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password">
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
                            </div>				
                        </div>				
                    </div>
        </div>
      </div>
    </div>
  </div>