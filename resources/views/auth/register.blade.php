
@extends('frontend.layouts.template')
@section('content')

<div class="pageTitle">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h1 class="page-heading">Register</h1>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="breadCrumb"><a href="#.">Home</a> / <span>Register</span></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Title End -->
  
  <div class="listpgWraper">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="userccount">
            <div class="socialLogin">
              <h5>Login Or Register </h5>
             </div>
            {{-- <div class="alert alert-success" role="alert"><strong>Well done!</strong> Your account successfully created.</div>
            <div class="alert alert-warning" role="alert"><strong>Warning!</strong> Better check yourself, you're not looking too good.</div>
            <div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Change a few things up and try submitting again.</div> --}}
            <div class="userbtns">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#candidate">Candidate</a></li>
                <li><a data-toggle="tab" href="#employer">Employer</a></li>
              </ul>
            </div>
            <div class="tab-content">
              <div id="candidate" class="formpanel tab-pane fade in active">
                <form action="#" id="frmSeekerRegister" class="tr-form">
                    <div class="formrow">
                      <input required  name="seeker_first_name" id="seeker_first_name" type="text" class="form-control" placeholder="First Name">
                    </div>
                    <div class="formrow">
                      <input required  name="seeker_last_name" id="seeker_last_name" type="text" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="formrow">
                      <input onblur="checkmain(this.value)" required type="email" name="seeker_email" id="seeker_email" class="form-control" placeholder="Email">
                    </div>
                    <div class="formrow">
                      <input required type="password" name="seeker_password" id="seeker_password" class="form-control" placeholder="Password">
                    </div>
                    <div class="formrow">
                      <input type="password" name="seeker_confirm_password" id="seeker_confirm_password" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="formrow">
                      <input type="checkbox" value="agree text" name="agree" /> Accpeted term and condition ! </div>
                    <input type="submit" class="btn" value="Register">
                </form>
              </div>
              <!-- Employer Register -->
              <div id="employer" class="formpanel tab-pane fade in">
                <form action="#" id="frmEmployerLogin" class="tr-form">
                    <div class="formrow">
                      <input required type="text" class="form-control" name="admin_user_name" id="admin_user_name" placeholder="Username">
                    </div>
                    <div class="formrow">
                      <input onblur="checkAdminMail(this.value)" required type="email" class="form-control" name="admin_email" id="admin_email" placeholder="Email">
                    </div>
                    <div class="formrow">
                      <input required type="password" class="form-control" name="admin_password" id="admin_password" placeholder="Password">
                    </div>
                    <div class="formrow">
                      <input required type="password" class="form-control" name="admin_confirm_password" id="admin_confirm_password" placeholder="Confirm Password">
                    </div>
                    <div class="formrow">
                      <input type="checkbox" value="agree text c" name="cagree" />  Accpeted term and condition ! </div>
                    <input type="submit" class="btn" value="Register">
                </form>
                </div>
            </div>
            <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> Already a Member? <a href="{{url('login')}}">Login Here</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
