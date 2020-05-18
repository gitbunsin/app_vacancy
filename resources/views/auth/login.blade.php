
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
              <h5>Login Or Register</h5>
             </div>
            <div class="userbtns">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#candidate">Candidate</a></li>
                <li><a data-toggle="tab" href="#employer">Employer</a></li>
              </ul>
            </div>
            <div class="tab-content">
              <div id="candidate" class="formpanel tab-pane fade in active">
              <form action="#" id="frmUserLogin" class="tr-form">
                  <div class="formrow">
                    <input type="email" id="email" name="email" class="form-control" placeholder="email">
                  </div>
                  <div class="formrow">
                    <input type="password" id="password" name="password" class="form-control" placeholder="password">
                  </div>
                  
                  <div class="formrow">
                    <input type="checkbox" value="agree text" name="agree" /> Remember me</div>
                   
                    <button type="submit" class="btn btn-primary">Sign Up</button>
              </form>
              </div>
              <div id="employer" class="formpanel tab-pane fade in">
                <form action="#" class="tr-form" id="frmLoginEmployer">
                    <div class="formrow">
                      <input required id="admin_email_login" name="admin_email_login" type="email" class="form-control" placeholder="email">
                    </div>
                    <div class="formrow">
                      <input required id="admin_password_login" name="admin_password_login" type="password" class="form-control" placeholder="password">
                    </div>
                   
                    <div class="formrow">
                      <input type="checkbox" value="agree text c" name="cagree" />
                      Remember me </div>
                    <input type="submit" class="btn" value="Login">
                </form>
                </div>
            </div>
            <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> Already a Member? <a href="{{url('register')}}">Register Here</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="{{asset('js/login/admin.js')}}"></script>
@endsection
