@extends('frontend.layouts.template')
@section('content')
@php
    use App\Model\UserVacancy;
    use App\Model\userBookmark;
@endphp
<style>
 ul {
    list-style-type: none;
    padding: 0px;
    margin: 0px;
}
    .task-overview {
    padding: 10px 0 15px 0;
    border-bottom: 1px solid #e8eef1;
    display: inline-block;
    width: 100%;
}
.task-overview .task-detail span {
    font-size: 12px;
}
.task-overview .task-detail {
    margin-left: 60px;
}
    .alpha-a {
    background: #ffa1ae;
    color: #f73d51;
}
    .alpha-box {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    text-align: center;
    line-height: 50px;
    font-size: 27px;
    font-weight: 400;
    float: left;
}
    .bage-warning {
    background: #ff9800;
}
    .todo-default .ct-title span {
    display: block;
    font-size: 13px;
    opacity: 0.8;
    font-weight: 400;
}
.badge.badge-action {
    background: transparent;
}
.todo-default .badge {
    font-weight: 400;
    font-size: 11.5px;
    border-radius: 50%;
    padding: .27em .5em;
    text-align: center;
}
    span.user-status {
    width: 7px;
    height: 7px;
    position: absolute;
    display: block;
    right: 2px;
    bottom: 2px;
    border-radius: 50%;
}
.todo-default .ct-title {
    flex: 1 1 0%;
    -webkit-box-flex: 1;
}
span.user-status {
    width: 7px;
    height: 7px;
    position: absolute;
    display: block;
    right: 2px;
    bottom: 2px;
    border-radius: 50%;
}

.card h5 {
    margin: 5px 0;
    font-weight: 400;
    line-height: 20px;
}
    .sm-avater.list-avater {
    max-width: 70px;
    margin-right: 10px;
    position: relative;
    height: 45px;
    border-radius: 50%;
}
.img-circle {
    border-radius: 50%;
}
    .todo.todo-default {
    border-bottom: 1px solid #e8eef1;
    padding: 16px 12px;
    display: flex;
    align-items: center;
    -webkit-box-align: center;
    display: -ms-flexbox;
    align-items: flex-start;
}
    .card-header {
    background: #ffffff;
    border-bottom: 0px;
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    border-bottom: 1px solid #e8eef1;
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,-4.875);
    border-radius: 0.25rem;
}
  
.btn {
    color: #fff;
    padding: 8px 20px 5px;
    border-radius: 30px;
    font-size: 12px;
    position: relative;
    z-index: 1;
    overflow: hidden;
}
    p#job_requirement  span{
    color: rgb(119, 119, 119);
    font-family: 'Varela Round', sans-serif !important;
    letter-spacing: 1px;
    font-size: 14px;
}
    #contact_person {
  border-radius: 50%;
}

.avatar {
  vertical-align: middle;
  width: 100px;
  height: 100px;
  border-radius: 50%;
}

    .not-active {
    pointer-events: none;
    cursor: default;
    text-decoration: none;
    color: white;
    font-weight: bold;
    background: red;
}
.btn.btn-primary.not-active {
    background-color: red;
    border-color: red;
}
</style>
<div class="job-details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="job-summary section">
                        <div class="row">
                                <div class="col-sm-3">
                                        <img width="100px;" height="100px"  src="/uploads/UserCv/{{ $vacancy->company->company_logo }}" alt="Smiley face" class="img-fluid">
                                </div>
                                <div class="col-sm-9"> <span><b>{{$vacancy->vacancy_name}} </b></span>
                                    <div class="buttons">
                                            @if(Auth::check())
                                               @php
                                                   $candidate_vacancy = UserVacancy::where('vacancy_id',$vacancy->id)->where('user_id',auth::user()->id)->count();                           
                                               @endphp
                                            @endif         
                                           <!-- /.check login -->
                                           @if(Auth::check() && $candidate_vacancy > 0)
                                               <a href="#"  data-toggle="tooltip" title="Applied For This Job!"  class="btn btn-primary  not-active"><i class="fa fa-briefcase" aria-hidden="true"></i>Applied For This Job</a>
                                            @elseif(Auth::check())
                                            <a href="#" data-candidate_id={{auth::user()->id}} onclick="ApplyJob({{$vacancy->id}});" class="btn btn-primary "><i class="fa fa-briefcase" aria-hidden="true"></i>Apply For This Job</a>
                                            @else
                                                <a href="#" onclick="NotLogin();" class="btn btn-primary "><i class="fa fa-briefcase" aria-hidden="true"></i>Apply For This Job</a>  
                                            @endif
                                            @if(Auth::check())
                                               @php
                                                   $bookmark_vacancy = userBookmark::where('vacancy_id',$vacancy->id)->where('user_id',auth::user()->id)->count();                           
                                               @endphp
                                            @endif 
                                            @if(Auth::check() &&  $bookmark_vacancy > 0)
                                                <a href="#" class="btn btn-primary   not-active"><i class="fa fa-bookmark" aria-hidden="true"></i>Bookmarked</a>
                                            @elseif(Auth::check())
                                                <a href="#" onclick="Bookmark({{$vacancy->id}});" class="btn button-bookmark"><i class="fa fa-bookmark" aria-hidden="true"></i>Bookmark</a>
                                            @else
                                                <a href="#" onclick="notBookmark();" class="btn button-bookmark"><i class="fa fa-bookmark" aria-hidden="true"></i>Bookmark</a>
                                            @endif
                                        </div>	
                                </div>
                              </div>
 	
                      
                        <br/>
                     <div>
                            <table class="table">
                                    <tr>
                                        <th>Vacancy Name : </th>
                                        <td>{{$vacancy->vacancy_name}}</td>
                                    </tr>
                                    <tr>
                                      <th>Location : </th>
                                      <td>{{$vacancy->province->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Salary : </th>
                                        <td>{{$vacancy->minSalary .' - '. $vacancy->maxSalary.' $' }} / 
                                            @if ($vacancy->negotiation == "1")
                                            <b >Negotiation</b>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                            <th>Job Type : </th>
                                            <td>{{$vacancy->jobType->name}}</td>
                                        </tr>
                                    <tr>
                                        <th>function : </th>
                                        <td>{{$vacancy->category->name}}</td>
                                    </tr>
                                    <tr>
                                            <th> Application Deadline  : </th>
                                            <td>{{$vacancy->closingDate}}</td>
                                    </tr>
                            </table>
                     </div>
                     <hr/>
                    <span class="tr-title"><b> Job Description :</b> </span>
                           <p id="job_requirement"> {!! $vacancy->job_description !!}</p> 
                    <span> <b>Job Requirements :</b> </span>
                    <p id="job_requirement" style="font-size:14px;">
                            {!! $vacancy->job_requirement!!}    
                    </p>
                    <hr/>
                        <span><b>Skills Requirement</b></span>
                        @foreach ($vacancy->skill as $skills)
                             <a href="#"  class="btn btn-primary "><i class="fa fa-briefcase" aria-hidden="true"></i>{{$skills->name}}</a>
                        @endforeach
                        
                    <hr/>
                    <span><b>Contact Information</b></span>
                    <div class="row">
                            <div class="col-sm-4">
                               @if ($vacancy->employee->photo)
                                  <img id="contact_person" class="img-circle" src="{{asset('/uploads/employee/'.$vacancy->employee->photo)}}" alt="Smiley face" height="100" width="100">
                               @else
                               <img class="avatar" src="{{asset('images/img_avatar.png')}}" alt="Avatar">
                               @endif
                               
                            </div>
                            <div class="col-sm-8">
                                Name :   <b> {{$vacancy->employee->last_name . ' ' .$vacancy->employee->first_name  }}</b><br/>
                                Phone :  <b>{{$vacancy->employee->mobile}} </b> / <b> {{$vacancy->employee->work_telephone}} </b><br/>
                                Email :  <b>{{$vacancy->employee->work_email}}</b>

                            </div>
                    
                          </div>
                          <hr/>
                    <span><b>How to apply</b></span>
                    <ul class="tr-list">
                           <li>1. Please register Kh-Works Account</li> 
                           <li>2. Apply for a job by clicking the 'Apply Now' button, please click Create CV， After create your CV, employers will review your CV online, Increase your job opportunities. Click Now Here，Learn how to register and post your CV!</i>
                    </ul>
                </div>
                
                
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="tr-sidebar">
                    <div class="widget-area">
                        <div class="widget short-info">
                            <h3 class="widget_title">Short Info</h3>
                            
                            <table class="table">
                                <tr>
                                    <th> <b> Published : </b></th>
                                    <td>{{$vacancy->created_at}}</td>
                                </tr>
                                <tr>
                                        <th> <b>job poster :  </b></th>
                                        <td>{{$vacancy->admin->name}}</td>
                                </tr>
                                <tr>
                                        <th> <b>Industry :  </b></th>
                                        <td>{{$vacancy->category->name}}</td>
                                </tr>
                                <tr>
                                        <th> <b>Experience :  </b></th>
                                        <td>{{$vacancy->exp_level}}</td>
                                </tr>
                                <tr>
                                        <th> <b>Job function : </b></th>
                                        <td>{{$vacancy->jobTitle->name}}</td>
                                </tr>
                            </table>
                            
                        </div><!-- /.widger -->
                        <div class="widget cmpany-info">
                            <h3 class="widget_title">Cmpany Info</h3>
                            <span><b>{{$vacancy->company->company_name}}</b></span>
                            <table class="table">
                                    <tr>
                                        <th> <b> Address : </b></th>
                                        <td>London, UK</td>
                                       
                                    </tr>
                                    <tr>
                                            <th> <b>Compnay SIze : </b></th>
                                            <td>2k Employee</td>
                                    </tr>
                                    <tr>
                                            <th> <b>Industry :  </b></th>
                                            <td>{{$vacancy->category->name}}</td>
                                    </tr>
                                    <tr>
                                            <th> <b>Phone :  </b></th>
                                            <td>{{$vacancy->company->phone}}</td>
                                    </tr>
                                    <tr>
                                            <th> <b>Email : </b></th>
                                            <td>{{$vacancy->company->email}}</td>
                                    </tr>
                                    <tr>
                                            <th> <b>Website : </b></th>
                                            <td><a target="_blank" href="{{$vacancy->company->website_link}}">{{$vacancy->company->website_link}}</a></td>
                                    </tr>
                                </table>
                            <div class="widget-social">
                                <ul class="tr-list">
                                    <li><a href="{{$vacancy->company->facebook_link}}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                    <li><a href="{{$vacancy->company->facebook_link}}"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- /.widger -->
                    </div><!-- /.widget-area -->
                </div><!-- /.tr-sidebar -->
            </div>
        </div><!-- row -->
       
      
        <span class="tr-title">Similar Jobs Post</span>
           
                            <div class="row">
                                    <!-- col-md-6 -->
                                    <div class="col-md-8"> 
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="todo-list todo-list-hover todo-list-divided">
                                                    @if(!$relatedVacancy->isEmpty())
                                                     @foreach($relatedVacancy as $relatedVacancies)
                                                        <div class="todo todo-default">
                                                            <div class="sm-avater list-avater">
                                                                    <img width="50px;"  src="/uploads/UserCv/{{ $relatedVacancies->company->company_logo }}" alt="Smiley face" class="img-fluid">
                                                            </div>
                                                            <h5 class="ct-title"><a href="{{'/vacancy/detail/'.$relatedVacancies->id}}">{{$relatedVacancies->vacancy_name}}</a><span class="ct-designation">{{$relatedVacancies->company->company_name}} / {{$relatedVacancies->maxSalary .' - ' . $relatedVacancies->minSalary . ' $'}} / {{$relatedVacancies->jobType->name}}</span></h5>
                                                        </div>
                                                        @endforeach
                                                        @else
                                                       
                                                            <div class="col-md-8">
                                                                <div class="found-info">
                                                                    <h1>404</h1>
                                                                    <h2>Related Job Not Found</h2>
                                                                    <p>We can't seem to find the page you're looking for.</p>
                                                                    <a href="{{URL::previous()}}" class="btn btn-primary">Back to home</a>
                                                                </div>
                                                            </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        </div><!-- /.tr-job-posted -->		
    </div><!-- /.container -->
</div><!-- /.tr-details -->	
<div id="UserVacancyBookMark" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <form id="frmVacancyBookmark">
                    <input type="hidden" id="vacancy_bookmark_id" value="">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div  class="modal-header theme-bg" style="background-color:#008def" >
                            <h4 class="modal-title" style="color:white;"> Bookmark</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label> Do u want to apply this Bookmark ? </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
                                <input type="submit" class="btn btn-primary" value="Yes">
                            </div>
                    </form>
            </div>
        </div>
</div>
<!-- /.tr-login-apply-job -->	
<div id="UserLogin" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmVacancyApply">
                    <input type="hidden" id="vacancy_id" value="">
                    <input type="hidden" id="company_id_appy_job" value="{{$vacancy->company->id}}">
                    <input type="hidden" id="admin_poster_id" value="{{$vacancy->admin->id}}">
                    @if (Auth::check())
                     <input type="hidden" id="candidate_id" value="{{auth::user()->id}}">
                   
                    @endif  
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div  class="modal-header theme-bg" style="background-color:#008def" >
                            <h4 class="modal-title" style="color:white;"> Vacancy</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label> Do u want to apply this job ? </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input  type="button" class="btn btn-danger" data-dismiss="modal" value="No">
                                <input type="submit" class="btn btn-primary" value="Yes">
                            </div>
                    </form>
            </div>
        </div>
</div>

@endsection
@section('scripts')
   <script src="{{asset('js/backend/apply_job.js')}}"></script>
   <script src="{{asset('js/backend/bookmark.js')}}"></script>
@endsection
