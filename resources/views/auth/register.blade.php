
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
                <li id="{{__('menu.font_family_en')}}"  class="active"><a data-toggle="tab" href="#candidate">{{__('content.candidate')}}</a></li>
                <li id="{{__('menu.font_family_en')}}"  ><a data-toggle="tab" href="#employer">{{__('content.employers_login')}}</a></li>
              </ul>
            </div>
            <div class="tab-content">
              <div id="candidate" class="formpanel tab-pane fade in active">
                <form action="#" id="frmSeekerRegister" class="tr-form">
                    <div class="formrow">
                      <input required  name="seeker_first_name" id="{{__('menu.font_family_en')}}"  type="text" class="form-control seeker_first_name" placeholder="{{__('content.first_name')}}">
                    </div>
                    <div class="formrow">
                      <input required  name="seeker_last_name" id="{{__('menu.font_family_en')}}"   type="text" class="form-control seeker_last_name" placeholder="{{__('content.last_name')}}">
                    </div>
                    <div class="formrow">
                      <input onblur="checkmain(this.value)" id="{{__('menu.font_family_en')}}"  required type="email" name="seeker_email"  class="form-control seeker_email" placeholder="{{__('content.email')}}">
                    </div>
                    <div class="formrow">
                      <input required type="password" id="{{__('menu.font_family_en')}}"  name="seeker_password" class="form-control seeker_password" placeholder="{{__('content.password')}}">
                    </div>
                    <div class="formrow">
                      <input type="password" id="{{__('menu.font_family_en')}}"  name="seeker_confirm_password"  class="form-control seeker_confirm_password" placeholder="{{__('content.confirm_password')}}">
                    </div>
                    <div class="formrow">
                      <input type="checkbox" value="agree text c" name="cagree" /><span id="{{__('menu.font_family_en')}}" > {{__('content.accepted_term_and_condition')}}</span> </div>
                    <input id="{{__('menu.font_family_en')}}"  type="submit" class="btn" value="{{__('content.register')}}">
                </form>
              </div>
              <!-- Employer Register -->
              <div id="employer" class="formpanel tab-pane fade in">
                <form action="#" id="frmEmployerLogin" class="tr-form">
                    <div class="formrow">
                      <input required type="text" class="form-control admin_user_name" name="admin_user_name" id="{{__('menu.font_family_en')}}"  placeholder="{{__('content.user_name')}}">
                    </div>
                    <div class="formrow">
                      <input onblur="checkAdminMail(this.value)" required type="email" class="form-control admin_email" id="{{__('menu.font_family_en')}}" name="admin_email"  placeholder="{{__('content.email')}}">
                    </div>
                    <div class="formrow">
                      <input required type="password" id="{{__('menu.font_family_en')}}" class="form-control admin_password" name="admin_password"  placeholder="{{__('content.password')}}">
                    </div>
                    <div class="formrow">
                      <input required type="password" id="{{__('menu.font_family_en')}}" class="form-control admin_confirm_password" name="admin_confirm_password"  placeholder="{{__('content.confirm_password')}}">
                    </div>
                    <div class="formrow">
                      <input id="{{__('menu.font_family_en')}}" type="checkbox" value="agree text c" name="cagree" /> <span id="{{__('menu.font_family_en')}}" > {{__('content.accepted_term_and_condition')}}</span></div>
                    <input id="{{__('menu.font_family_en')}}" type="submit" class="btn" value="{{__('content.register')}}">
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
