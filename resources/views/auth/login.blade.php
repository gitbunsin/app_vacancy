
@extends('frontend.layouts.template')
@section('content')

<div class="pageTitle">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h1 id="{{__('menu.font_family_en')}}" class="page-heading"> {{__('content.register')}} </h1>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="breadCrumb"><a id="{{__('menu.font_family_en')}}" href="#.">{{__('content.home')}}</a> / <span id="{{__('menu.font_family_en')}}">{{__('content.register')}}</span></div>
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
            <div class="userbtns">
              <ul class="nav nav-tabs">
                <li id="{{__('menu.font_family_en')}}" class="active"><a data-toggle="tab" href="#candidate">{{__('content.candidate')}}</a></li>
                <li id="{{__('menu.font_family_en')}}" ><a data-toggle="tab" href="#employer">{{__('content.employers_login')}}</a></li>
              </ul>
            </div>
            <div class="tab-content">
              <div id="candidate" class="formpanel tab-pane fade in active">
              <form action="#" id="frmUserLogin" class="tr-form">
                  <div class="formrow">
                    <input required id="{{__('menu.font_family_en')}}" type="email"  name="email" class="form-control email" placeholder="{{__('content.email')}}">
                  </div>
                  <div class="formrow">
                    <input required id="{{__('menu.font_family_en')}}" type="password" name="password" class="form-control password" placeholder="{{__('content.password')}}">
                  </div>
                  
                  <div class="formrow">
                    <input   type="checkbox" value="agree text c" name="cagree" />
                  <span id="{{__('menu.font_family_en')}}"  >{{__('content.remember_me')}} </span> <span class="pull-right"><a id="{{__('menu.font_family_en')}}" href="{{'password/reset'}}">{{__('content.forgot_password')}}</a></span>          
                  </div>
                    <button  id="{{__('menu.font_family_en')}}" type="submit" class="btn btn-primary">{{__('content.sign_in')}}</button>
              </form>
              </div>
              <div id="employer" class="formpanel tab-pane fade in">
                <form action="#" class="tr-form" id="frmLoginEmployer">
                    <div class="formrow">
                      <input id="{{__('menu.font_family_en')}}" required  name="admin_email_login" type="email" class="form-control admin_email_login" placeholder="{{__('content.email')}}">
                    </div>
                    <div class="formrow">
                      <input id="{{__('menu.font_family_en')}}" required  name="admin_password_login" type="password" class="form-control admin_password_login" placeholder="{{__('content.password')}}">
                    </div>
                   
                    <div class="formrow">
                      <input   type="checkbox" value="agree text c" name="cagree" />
                    <span id="{{__('menu.font_family_en')}}"  >{{__('content.remember_me')}} </span> <span class="pull-right"><a id="{{__('menu.font_family_en')}}" href="{{'password/admin/reset'}}">{{__('content.forgot_password')}}</a></span>
                    </div>   
                    <input id="{{__('menu.font_family_en')}}" type="submit" class="btn" value="{{__('content.sign_in')}}">
                </form>
                </div>
            </div>
            <div id="{{__('menu.font_family_en')}}" class="newuser"><i class="fa fa-user" aria-hidden="true"></i> {{__('content.already_a_member')}} <a href="{{url('register')}}"> {{__('content.register_here')}}</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="{{asset('js/login/admin.js')}}"></script>
@endsection
