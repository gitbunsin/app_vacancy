@extends('frontend.layouts.template')
@section('content')
<div class="pageTitle">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h1 class="page-heading">Report Abuse</h1>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="breadCrumb"><a href="#.">Home</a> / <span>Post Job</span></div>
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
          <form action="post" id="frmReportVacancy">
              <input type="hidden" id="job_id" name="job_id" value="{{$report->id}}">
              <!-- Job Information -->
              <h5>Report Abuse Job Information</h5>
              <div class="row">
                <div class="col-md-12">
                    <div class="formrow">
                      <input value="http://localhost:8000/vacancy/detail/{{$report->vacancy_name}}" disabled type="text" name="jobtitle" class="form-control">
                    </div>
                  </div>
                <div class="col-md-12">
                  <div class="formrow">
                    <input id="subject"  type="text" name="subject" class="form-control" placeholder="Subject">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="formrow">
                    <textarea id="message"  class="form-control" name="message" placeholder="Message"></textarea>
                  </div>
                </div>
              </div>
              <br>
              <input type="submit" class="btn" value="Report">
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