@extends('frontend.layouts.template')
@section('content')
<div class="pageTitle">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h1 class="page-heading">Dashboard</h1>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="breadCrumb"><span>Welcome Back Jhon</span></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Title End -->
  
  <div class="listpgWraper">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4">
            
          <div class="switchbox">
              <div class="txtlbl">Immediate Available <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus consectetur sagittis. Duis vitae urna vehicula, ornare nibh non, aliquet neque. In vitae erat ut augue suscipit." data-original-title="" title=""></i></div>
              <div class="pull-right"><label class="switch switch-green">
                <input type="checkbox" class="switch-input">
                <span class="switch-label" data-on="On" data-off="Off"></span>
                <span class="switch-handle"></span>
              </label></div>
              <div class="clearfix"></div>
          </div>
        
          <ul class="usernavdash">
            <li class="{{(request()->segment(2) == 'my-dashboard') ? 'active' : '' }}">
              <a href="{{url('/user/my-dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Candidate Dashboard</a>
            </li>
            <li class="{{(request()->segment(2) == 'my-profile') ? 'active' : '' }}">
              <a  href="{{url('/user/my-profile')}}"><i class="fa fa-user" aria-hidden="true"></i> My Details</a>
            </li>
            <li class="{{(request()->segment(2) == 'my-job') ? 'active' : '' }}">
              <a href="{{url('/user/my-job')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>My Job Application</a>
              </li>
            <li class="{{(request()->segment(2) == 'view-bookmark') ? 'active' : '' }}">
              <a href="{{url('/user/view-bookmark')}}"><i class="fa fa-desktop" aria-hidden="true"></i> My Favourite Jobs</a>
            </li>
            <li class="{{(request()->segment(2) == 'view-profile') ? 'active' : '' }}">
                      <a href="{{url('/user/view-profile')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> View Resume</a>
                  </li>
            <li class="{{(request()->segment(2) == 'my-resume') ? 'active' : '' }}">
                      <a href="{{url('/user/my-resume')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Build Resume</a>
                  </li>
            <li class="{{(request()->segment(2) == 'upload-resume') ? 'active' : '' }}">
              <a href="{{url('/user/upload-resume')}}"><i class="fa fa-paper-plane" aria-hidden="true"></i> upload Resume</a>
            </li>
          
            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> My Package</a></li>
                  <li class="{{(request()->segment(2) == 'account-setting') ? 'active' : '' }}">
                      <a href="{{url('user/account-setting')}}"><i class="fa fa-lock" aria-hidden="true"></i> Account Setting</a>
                  </li>
            <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-8"> <div class="row">
            
        </div>
    <ul class="row profilestat">
      <li class="col-md-3 col-sm-4 col-xs-6">
        <div class="inbox">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
              <h6><a href="https://tosjob.com/my-profile#summaryyy" style="color:#00a441">0</a></h6>
              <strong>My CV List</strong>
        </div>
      </li>
      <li class="col-md-3 col-sm-4 col-xs-6">
        <div class="inbox"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
          <h6><a href="https://tosjob.com/my-messages" style="color:#00a441">0</a></h6>
          <strong>Message Box</strong> </div>
      </li>
    </ul>         </div>
      </div>
    </div>
  </div>
  @endsection