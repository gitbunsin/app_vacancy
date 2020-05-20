@extends('frontend.layouts.template')
@section('content')
@php
    use App\Model\UserVacancy;
    use App\Model\userBookmark;
@endphp
<style>
  .social-company{
    display: inline-block !important;
    text-align: right;
    color: #263bd6;
    font-weight: 600;
}
  .fa-youtube-square{
  display: inline-block;
  border-radius: 60px;
  color : #3b5998;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.6em;
  font-size: 20px;
}
.fa-linkedin-square {
  display: inline-block;
  border-radius: 60px;
  color:#0e76a8;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.6em;
  font-size: 20px;

}
.fa-facebook-square {
  display: inline-block;
  border-radius: 60px;
  color : #3b5998;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.6em;
  font-size: 20px;

}
</style>
<div class="pageTitle">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h1 id="{{__('menu.font_family_en')}}" class="page-heading">{{__('content.job_detail')}}</h1>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="breadCrumb"><a id="{{__('menu.font_family_en')}}" href="#.">{{__('content.home')}}</a> / <span id="{{__('menu.font_family_en')}}">{{__('content.job_detail')}}</span></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Title End -->
  <div class="listpgWraper">
    <div class="container">  
      <!-- Job Header start -->
      <div class="job-header">
        <div class="jobinfo">
          <div class="row">
            <div class="col-md-8">
              <h2 id="{{__('menu.font_family_en')}}">{{$vacancy->vacancy_name}}</h2>
              <div class="ptext">Date Posted: {{$vacancy->closingDate}}</div>
              <div class="salary">Monthly Salary: <strong>{{$vacancy->minSalary .' - '. $vacancy->maxSalary.' $' }}</strong></div>
            </div>
            <div class="col-md-4">
              <div class="companyinfo">
                <div class="companylogo"><img src="/uploads/UserCv/{{ $vacancy->company->company_logo }}" alt="your alt text"></div>
                <div class="title"><a href="#.">Forum International</a></div>
                <div class="ptext">{{$vacancy->province->name}}</div>
                <div class="opening"><a href="#.">8 Current Jobs Openings</a></div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="jobButtons"> 
            @if(Auth::check())
            @php
                $candidate_vacancy = UserVacancy::where('vacancy_id',$vacancy->id)->where('user_id',auth::user()->id)->count();                           
            @endphp
            @endif  
            @if(Auth::check() && $candidate_vacancy > 0)
             <a href="#." class="btn report"><i class="fa fa-paper-plane" aria-hidden="true"></i> Apply Applied</a>
            @elseif(Auth::check())
             <a href="#." data-candidate_id={{auth::user()->id}} onclick="ApplyJob({{$vacancy->id}});" class="btn apply"><i class="fa fa-paper-plane" aria-hidden="true"></i><span id="{{__('menu.font_family_en')}}"> {{__('content.apply_now')}}</span></a>
            @else
                <a href="#." onclick="NotLogin();" class="btn apply"><i class="fa fa-paper-plane" aria-hidden="true"></i> <span id="{{__('menu.font_family_en')}}"> {{__('content.apply_now')}}</span></a>
            @endif
             <a href="https://www.facebook.com/sharer/sharer.php?u=http://sabay-merl.com/2020/05/17/tiktok/" class="btn"><i class="fa fa-share" aria-hidden="true"></i><span id="{{__('menu.font_family_en')}}"> {{__('content.share_to_friend')}}</span></a> 
             @if(Auth::check())
                 <a href="{{url('report/'.$vacancy->id)}}" class="btn"><i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i><span id="{{__('menu.font_family_en')}}"> {{__('content.report_abuse')}}</span> </a> 
             @else
                 <a href="#." onclick="NotLogin();" class="btn"><i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i> <span id="{{__('menu.font_family_en')}}"> {{__('content.report_abuse')}}</span></a> 
             @endif

             @if(Auth::check())
               @php
                 $bookmark_vacancy = userBookmark::where('vacancy_id',$vacancy->id)->where('user_id',auth::user()->id)->count();                           
               @endphp
             @endif 
             @if(Auth::check() &&  $bookmark_vacancy > 0)
                <a href=""  class="btn report  not-active"><i class="fa fa-floppy-o" aria-hidden="true"></i> <span id="{{__('menu.font_family_en')}}"> {{__('content.bookmark')}}</span></a> 

             @elseif(Auth::check())
              <a href="#." onclick="Bookmark({{$vacancy->id}});" class="btn not-active"><i class="fa fa-floppy-o" aria-hidden="true"></i> <span id="{{__('menu.font_family_en')}}"> {{__('content.bookmark')}}</span></a> 
             @else
              <a href="#." onclick="notBookmark();"  class="btn not-active"><i class="fa fa-floppy-o" aria-hidden="true"></i> <span id="{{__('menu.font_family_en')}}"> {{__('content.bookmark')}}</span> </a> 
             @endif
        </div>
      </div>
      
      <!-- Job Detail start -->
      <div class="row">
        <div class="col-md-8"> 
          <!-- Job Description start -->
          <div class="job-header">
            <div class="contentbox">
              <h3 id="{{__('menu.font_family_en')}}">{{__('content.job_description')}}</h3>
              <hr/>
                <p> {!! $vacancy->job_description !!}</p>
              <h3 id="{{__('menu.font_family_en')}}">{{__('content.job_requirements')}}</h3>
              <hr/>
                <p>{!! $vacancy->job_requirement!!} </p>
            </div>
            
          </div>
          <div class="relatedJobs">
            <h3 id="{{__('menu.font_family_en')}}">{{__('content.contact_info')}}</h3>
            <ul class="searchList">
              <!-- Job start -->
              <li>
              <div class="row">
                <div class="col-md-8 col-sm-8">
                  <div class="jobimg">
                    @if ($vacancy->employee->photo)
                     <img id="contact_person" class="img-circle" src="{{asset('/uploads/employee/'.$vacancy->employee->photo)}}" alt="Smiley face" height="100" width="150">
                    @else
                     <img class="avatar" src="{{asset('images/img_avatar.png')}}" alt="Avatar">
                    @endif
                  
                  </div>
                  <div class="jobinfo">
                    <h3><a href="#.">{{$vacancy->employee->last_name . ' ' .$vacancy->employee->first_name  }}</a></h3>
                    <div class="companyName"><a href="#."><b>{{$vacancy->employee->mobile}} </b> <b>/</b>  <b> {{$vacancy->employee->work_telephone}} </b></a></div>
                    <div class="location"><label class="fulltime">{{$vacancy->employee->work_email}}</label>   - <span>New York</span></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="listbtn"><a href="#.">Contact HR</a></div>
                </div>
              </div>
            </li>
            </ul>
          </div>
          <!-- Job Description end --> 
          
          <!-- related jobs start -->
          <div class="relatedJobs">
            <h3 id="{{__('menu.font_family_en')}}">{{__('content.related_jobs')}}</h3>
            <ul class="searchList">
              <!-- Job start -->
              <li>
              <div class="row">
                <div class="col-md-8 col-sm-8">
                  <div class="jobimg"><img src="{{asset('images/jobs/jobimg.jpg')}}" alt="Job Name"></div>
                  <div class="jobinfo">
                    <h3><a href="#.">Technical Database Engineer</a></h3>
                    <div class="companyName"><a href="#.">Datebase Management Company</a></div>
                    <div class="location"><label class="fulltime">Full Time</label>   - <span>New York</span></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="listbtn"><a href="#.">Apply Now</a></div>
                </div>
              </div>
            </li>
              <!-- Job end --> 
              
              <!-- Job start -->
              <li>
              <div class="row">
                <div class="col-md-8 col-sm-8">
                  <div class="jobimg"><img src="{{asset('images/jobs/jobimg.jpg')}}" alt="Job Name"></div>
                  <div class="jobinfo">
                    <h3><a href="#.">Technical Database Engineer</a></h3>
                    <div class="companyName"><a href="#.">Datebase Management Company</a></div>
                    <div class="location"><label class="partTime">Part Time</label>   - <span>New York</span></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="listbtn"><a href="#.">Apply Now</a></div>
                </div>
              </div>
            </li>
              <!-- Job end --> 
              
              <!-- Job start -->
              <li>
              <div class="row">
                <div class="col-md-8 col-sm-8">
                  <div class="jobimg"><img src="{{asset('images/jobs/jobimg.jpg')}}" alt="Job Name"></div>
                  <div class="jobinfo">
                    <h3><a href="#.">Technical Database Engineer</a></h3>
                    <div class="companyName"><a href="#.">Datebase Management Company</a></div>
                    <div class="location"><label class="freelance">Freelance</label>   - <span>New York</span></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="listbtn"><a href="#.">Apply Now</a></div>
                </div>
              </div>
            </li>
              <!-- Job end -->
            </ul>
          </div>
        </div>
        <!-- related jobs end -->
        
        <div class="col-md-4"> 
          <!-- Job Detail start -->
          <div class="job-header">
            <div class="jobdetail">
              <h3 id="{{__('menu.font_family_en')}}">{{__('content.job_detail')}}</h3>
              <hr/>
              <ul class="jbdetail">
                <li class="row">
                  <div id="{{__('menu.font_family_en')}}" class="col-md-6 col-xs-6"> {{__('content.job_poster')}}</div>
                  <div class="col-md-6 col-xs-6"><a href="#.">{{ucfirst($vacancy->admin->name)}}</a></div>
                </li><hr/>
              
                <li class="row">
                  <div id="{{__('menu.font_family_en')}}" class="col-md-6 col-xs-6">{{__('content.type')}}</div>
                  <div class="col-md-6 col-xs-6"><span>{{$vacancy->jobTitle->name}}</span></div>
                </li><hr/>
                
                <li class="row">
                  <div id="{{__('menu.font_family_en')}}" class="col-md-6 col-xs-6"> {{__('content.employments_type')}}</div>
                  <div class="col-md-6 col-xs-6"><span class="permanent">{{$vacancy->category->name}}</></div>
                </li><hr/>

                <li class="row">
                  <div id="{{__('menu.font_family_en')}}" class="col-md-6 col-xs-6"> {{__('content.career_level')}}</div>
                  <div class="col-md-6 col-xs-6"><span>Experience</span></div>
                </li><hr/>
             
                <li class="row">
                  <div id="{{__('menu.font_family_en')}}" class="col-md-6 col-xs-6">{{__('content.experience')}}</div>
                  <div class="col-md-6 col-xs-6"><span>2 Years</span></div>
                </li>
              
              </ul>
            </div>
          </div>
          <div class="job-header">
            <div class="jobdetail">
              <h3 id="{{__('menu.font_family_en')}}">{{__('content.company_info')}}</h3>
              <hr/>
              <ul class="jbdetail">
                <li class="row">
                  <div id="{{__('menu.font_family_en')}}" class="col-md-6 col-xs-6">{{__('content.company_name')}}</div>
                  <div class="col-md-6 col-xs-6"><a target="blank" href="{{$vacancy->company->website_link}}"><span class="freelance">{{$vacancy->company->company_name}}</span></a></div>
                </li><hr/>
            
                <li class="row">
                  <div id="{{__('menu.font_family_en')}}" class="col-md-6 col-xs-6"> {{__('content.company_size')}}</div>
                  <div class="col-md-6 col-xs-6"><a href="#.">2k Employee</a></div>
                </li><hr/>
              
                <li class="row">
                  <div id="{{__('menu.font_family_en')}}" class="col-md-6 col-xs-6">{{__('content.industry')}}</div>
                  <div class="col-md-6 col-xs-6"><span>{{$vacancy->category->name}}</span></div>
                </li><hr/>
                
                <li class="row">
                  <div id="{{__('menu.font_family_en')}}" class="col-md-6 col-xs-6">{{__('content.phone')}}</div>
                  <div class="col-md-6 col-xs-6"><span class="permanent"><a href="tel:">{{$vacancy->company->phone}}</a></div>
                </li><hr/>
             
                <li class="row">
                  <div id="{{__('menu.font_family_en')}}" class="col-md-3 col-xs-3">{{__('content.email')}}</div>
                  <div class="col-md-9 col-xs-9"><span><a href="mailto:">{{$vacancy->company->email}}</a></span></div>
                </li><hr/>
             
                <li class="row">
                  <div id="{{__('menu.font_family_en')}}" class="col-md-3 col-xs-3"> {{__('content.website')}}</div>
                  <div class="col-md-9 col-xs-9"><span><a target="_blank" href="{{$vacancy->company->website_link}}">{{$vacancy->company->website_link}}</a></span></div>
                </li><hr/>
                <li class="row">
                  <div id="{{__('menu.font_family_en')}}" class="col-md-3 col-xs-3"> {{__('content.social')}}</div>
                  <div class="col-md-9 col-xs-9"><span>
                    <a target="_blank" class="social-company" href="{{$vacancy->company->facebook_link}}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a target="_blank" class="social-company" href="{{$vacancy->company->linkedIn_link}}"> <i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                    <a target="_blank" class="social-company" href="#"> <i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          {{-- <div class="job-header">

            <div class="jobdetail">
  
              <h3>Google Map</h3>
  
              <div class="gmap">
  
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.61004688208!2d104.89129181530693!3d11.579787891779509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109517869e06c01%3A0x9452379e4ed405a5!2sInstinct%20Institute!5e0!3m2!1sen!2skh!4v1571889488979!5m2!1sen!2skh" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  
              </div>
  
            </div>
  
          </div>         --}}
        </div>
      </div>
    </div>
  </div>
  <div id="UserLogin" class="modal fade">
    <div class="modal-dialog">
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
                            {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
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
<div id="UserVacancyBookMark" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content ">
          <form id="frmVacancyBookmark">
              <input type="hidden" id="vacancy_bookmark_id" value="">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <div  class="modal-header theme-bg" style="background-color:#008def" >
                      <h4 class="modal-title" style="color:white;"> Bookmark</h4>
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

@endsection
@section('scripts')
   {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-75688606-9"></script> --}}
   <script src="{{asset('js/backend/apply_job.js')}}"></script>
   <script src="{{asset('js/backend/bookmark.js')}}"></script>
   <script src="{{ asset('js/share.js') }}"></script>
@endsection
