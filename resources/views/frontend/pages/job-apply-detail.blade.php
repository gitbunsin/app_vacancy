@extends('frontend.layouts.template')
@section('content')
@php
    use App\Model\UserVacancy;
@endphp
<style>
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
                                            <a href="#" class="btn button-bookmark"><i class="fa fa-bookmark" aria-hidden="true"></i>Bookmark</a>
                                          
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
                                        <td>{{$vacancy->maxSalary .' - '. $vacancy->minSalary.' $' }} / 
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
                                  <img id="contact_person" class="img-circle" src="/uploads/employee/{{ $vacancy->employee->photo }}" alt="Smiley face" height="100" width="100">
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
                                    <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- /.widger -->
                    </div><!-- /.widget-area -->
                </div><!-- /.tr-sidebar -->
            </div>
        </div><!-- row -->
       
      
        
        <div class="tr-job-posted similar-jobs">
            <span class="tr-title">Similar Jobs Post</span>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="job-item">
                        <div class="item-overlay">
                            <div class="job-info">
                                <a href="#" class="btn btn-primary">Full Time</a>
                                <span class="tr-title">
                                    <a href="#">Project Manager</a>
                                    <span><a href="#">Dig File</a></span>
                                </span>
                                <ul class="tr-list job-meta">
                                    <li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
                                    <li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
                                    <li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
                                </ul>
                                <ul class="job-social tr-list">
                                    <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>										
                        </div>
                        <div class="job-info">
                            <div class="company-logo">
                                <img src="images/job/1.png" alt="images" class="img-fluid">
                            </div>
                            <span class="tr-title">
                                <a href="#">Project Manager</a>
                                <span><a href="#">Dig File</a></span>
                            </span>
                            <ul class="tr-list job-meta">
                                <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                            </ul>
                            <div class="time">
                                <a href="#"><span>Full Time</span></a>
                                <span class="pull-right">Posted 23 hours ago</span>
                            </div>																				
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="job-item">
                        <div class="item-overlay">
                            <div class="job-info">
                                <a href="#" class="btn btn-primary">Part Time</a>
                                <span class="tr-title">
                                    <a href="#">Design Associate</a>
                                    <span><a href="#">Loop</a></span>
                                </span>
                                <ul class="tr-list job-meta">
                                    <li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
                                    <li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
                                    <li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
                                </ul>
                                <ul class="job-social tr-list">
                                    <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>										
                        </div>								
                        <div class="job-info">
                            <div class="company-logo">
                                <img src="images/job/2.png" alt="images" class="img-fluid">
                            </div>
                            <span class="tr-title">
                                <a href="#">Design Associate</a>
                                <span><a href="#">Loop</a></span>
                            </span>
                            <ul class="tr-list job-meta">
                                <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>{{$vacancy->province->name}}</li>
                                <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                            </ul>
                            <div class="time">
                                <a href="#"><span class="part-time">{{$vacancy->jobType->name}}</span></a>
                                <span class="pull-right">Posted 1 day ago</span>
                            </div>			
                        </div>
                    </div>
                </div>	
                <div class="col-md-6 col-lg-3">
                    <div class="job-item">
                        <div class="item-overlay">
                            <div class="job-info">
                                <a href="#" class="btn btn-primary">Freelance</a>
                                <span class="tr-title">
                                    <a href="#">Graphic Designer</a>
                                    <span><a href="#">Humanity Creative</a></span>
                                </span>
                                <ul class="tr-list job-meta">
                                    <li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
                                    <li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
                                    <li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
                                </ul>
                                <ul class="job-social tr-list">
                                    <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>										
                        </div>								
                        <div class="job-info">
                            <div class="company-logo">
                                <img src="images/job/3.png" alt="images" class="img-fluid">
                            </div>
                            <span class="tr-title">
                                <a href="#">Graphic Designer</a>
                                <span><a href="#">Humanity Creative</a></span>
                            </span>
                            <ul class="tr-list job-meta">
                                <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                            </ul>
                            <div class="time">
                                <a href="#"><span class="freelance">Freelance</span></a>
                                <span class="pull-right">Posted 10 day ago</span>
                            </div>			
                        </div>
                    </div>
                </div>
               													
            </div>
        </div><!-- /.tr-job-posted -->		
    </div><!-- /.container -->
</div><!-- /.tr-details -->	

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
@endsection
