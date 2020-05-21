
@extends('frontend.layouts.template')
@section('content')
<div class="pageTitle">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h1 class="page-heading">Change Your Employers Password</h1>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="breadCrumb"><a href="#.">Home</a> / <span> Change Your Employers Password </span></div>
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
          <form id="frmAdResetPassword">
            <input type="hidden" id="adEmail" value="{{$adEmail}}" name="adEmail">
            <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
              <!-- Job Information -->
              <h5>Change Your Employers Password</h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="formrow">
                    <input id="password" type="password" class="form-control" name="password" placeholder="password">
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="formrow">
                      <input id="password_confirm" type="password" class="form-control" name="password_confirm" placeholder="confirm password">
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
