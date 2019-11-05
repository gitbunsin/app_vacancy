
@extends('frontend.layouts.template')
@section('content')

<div class="tr-breadcrumb bg-image section-before">
    <div class="container">
        <div class="breadcrumb-info text-center">
            <div class="page-title">
                <h1>Create a New Account</h1>
                <span>Lorem Ipsum is simply dummy text of the printing pesetting.</span>
            </div>				
        </div>
    </div><!-- /.container -->
</div><!-- tr-breadcrumb -->	

<div class="tr-account section-padding">
    <div class="container text-center">
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
                            <div class="dropdown tr-change-dropdown">

                                <a data-toggle="dropdown" aria-expanded="false"><span class="change-text">Gender</span><i class="fa fa-angle-down"></i></a>

                                <ul class="dropdown-menu tr-change">
                                    <li><a href="#">Male</a></li>
                                    <li><a href="#">Female</a></li>
                                </ul>								
                            </div><!-- /.category-change -->
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
                            <div class="dropdown tr-change-dropdown">
                                <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Industry Type</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu tr-change">
                                    <li><a href="#">Industry 1</a></li>
                                    <li><a href="#">Industry 2</a></li>
                                    <li><a href="#">Industry 3</a></li>
                                </ul>								
                            </div><!-- /.category-change -->												
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
</div><!-- /.tr-account-->	
@endsection
