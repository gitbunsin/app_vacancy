
@extends('frontend.layouts.template')
@section('content')
<div class="pageTitle">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h1 class="page-heading">Reset Password for Candidate Account</h1>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="breadCrumb"><a href="#.">Home</a> / <span>Reset Password </span></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Title End -->
  
  <div class="listpgWraper">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="userccount">
            <div class="formpanel"> 
          <form id="frmForgotCandidatePassword">
			
              <!-- Job Information -->
              <h5>Reset Password for Candidate Account</h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="formrow">
                    <input id="email" type="email" class="form-control" name="email" placeholder="email">
                  </div>
                </div>
              </div>
              <br>
              <input type="submit" class="btn" value="Send">
         </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
    <script src="/js/backend/forgot_password.js"></script>
@endsection
