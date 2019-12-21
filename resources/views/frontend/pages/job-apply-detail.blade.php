@extends('frontend.layouts.template')
@section('content')
@php
    use App\Model\candidate_vacancy;
@endphp
<style>
    .not-active {
    pointer-events: none;
    cursor: default;
    text-decoration: none;
    color: #ffc107;
    font-weight: bold;
}
</style>
<div class="tr-breadcrumb bg-image section-before">
    <div class="container">
        <div class="breadcrumb-info text-center">

            <div class="page-title">
                <h1>{{$vacancy->vacancy_name}}</h1>
            </div>
            <ul class="tr-list job-meta list-inline">
                <li><i class="fa fa-map-signs" aria-hidden="true"></i>{{$vacancy->location->name}}</li>
                <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{$vacancy->jobType->name}}</li>
                <li><i class="fa fa-money" aria-hidden="true"></i>$25,000 - $35,000</li>
                <li><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</li>
                <li><i class="fa fa-hourglass-start" aria-hidden="true"></i>Application Deadline : {{$vacancy->closingDate}}</li>
            </ul>	
            <div class="buttons">
                 @if(Auth::check())
                    @php
                        $candidate_vacancy = candidate_vacancy::where('vacancy_id',$vacancy->id)->where('candidate_id',auth::user()->id)->count();                           
                    @endphp
                 @endif         
                <!-- /.check login -->
                @if(Auth::check() && $candidate_vacancy > 0)
                    <a href="#"  data-toggle="tooltip" title="Applied For This Job!" class="btn btn-primary not-active"><i class="fa fa-briefcase" aria-hidden="true"></i>Applied For This Job</a>
                 @elseif(Auth::check())
                 <a href="#" data-candidate_id={{auth::user()->id}} onclick="ApplyJob({{$vacancy->id}});" class="btn btn-primary "><i class="fa fa-briefcase" aria-hidden="true"></i>Apply For This Job</a>
                 @else
                     <a href="#" onclick="NotLogin();" class="btn btn-primary"><i class="fa fa-briefcase" aria-hidden="true"></i>Apply For This Job</a>  
                 @endif
                 <a href="#" class="btn button-bookmark"><i class="fa fa-bookmark" aria-hidden="true"></i>Bookmark</a>
               
                 <span class="btn button-share"><i class="fa fa-share-alt" aria-hidden="true"></i>Share <span><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></span></span>
            </div>		
        </div>
    </div><!-- /.container -->
</div><!-- /.tr-breadcrumb -->
<div class="job-details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="job-summary section">
                    <span class="tr-title">Job Description</span>
                             {!! $vacancy->job_description !!}
                    <span>Job Requirements : </span>
                    <p>Execute all visual design stages of website design from concept to final hand-off to development Create print advertisements, social media advertisements, client collateral & digital resizes according to Client demands With direction of the Creative team, input into new design ideas for client branding Update & keep all agency collateral materials, including keeping records of Client's logos, fonts, images, etc. </p>
                    <span>How to apply</span>
                    <ul class="tr-list">
                        <li>Bachelor's Degree</li>
                        <li>2-5 years of relevant experience ( or equivalent educational experience)</li>
                        <li>Experience developing in Wordpress and other web design platforms</li>
                        <li>HTML, CSS and JavaScript experience a plus</li>
                        <li>In depth knowledge & technical experience of Photoshop, Illustrator, InDesign, Adobe PDF, Keynote, PowerPoint, Microsoft Word & Excel</li>
                        <li>Exceptional eye for design, deep understanding of creativity and ability to recognize fresh approaches to Advertising </li>
                        <li>Must be fluent in Spanish; working written and spoken proficiency</li>
                        <li>**All applicants must be eligible to work in the U.S. without sponsorship</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="tr-sidebar">
                    <div class="widget-area">
                        <div class="widget short-info">
                            <h3 class="widget_title">Short Info</h3>
                            <ul class="tr-list">
                                <li class="media"><div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i></div> <div class="media-body"><span>Published:</span>1 Days ago</div></li>
                                <li class="media"><div class="pull-left"><i class="fa fa-user-plus" aria-hidden="true"></i></div> <div class="media-body"><span>Job poster:</span>Lance Ladaga</div></li>
                                <li class="media"><div class="pull-left"><i class="fa fa-industry" aria-hidden="true"></i></div> <div class="media-body"><span>Industry:</span>Marketing and Advertising</div></li>
                                <li class="media"><div class="pull-left"><i class="fa fa-line-chart" aria-hidden="true"></i></div> <div class="media-body"><span>Experience:</span>Entry level</div></li>
                                <li class="media"><div class="pull-left"><i class="fa fa-key" aria-hidden="true"></i></div> <div class="media-body"><span>Job function:</span>Advertising, Design, Art/Creative</div></li>
                            </ul>
                        </div><!-- /.widger -->
                        <div class="widget cmpany-info">
                            <h3 class="widget_title">Cmpany Info</h3>
                            <span><b>{{$vacancy->company->company_name}}</b></span>
                        
                            <ul class="tr-list">
                                <li><span>Address:</span> London, UK</li>
                                <li><span>Compnay SIze:</span>  2k Employee</li>
                                <li><span>Industry:</span> <a href="#">Technology</a></li>
                                <li><span>Phone:</span> +1234 567 8910</li>
                                <li><span>Email:</span> <a href="#"><span class="__cf_email__" data-cfemail="4c25222a230c283e233c2e2334622f2321">{{$vacancy->company->email}}</span></a></li>
                                <li><span>Website:</span> <a href="#">www.dropbox.com</a></li>
                                <li><span></span></li>
                            </ul>
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
                                <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>{{$vacancy->location->name}}</li>
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
                <div class="col-md-6 col-lg-3">
                    <div class="job-item">
                        <div class="item-overlay">
                            <div class="job-info">
                                <a href="#" class="btn btn-primary">Full Time</a>
                                <span class="tr-title">
                                    <a href="#">Design Consultant</a>
                                    <span><a href="#">Families</a></span>
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
                                <img src="images/job/4.png" alt="images" class="img-fluid">
                            </div>
                            <span class="tr-title">
                                <a href="#">Design Consultant</a>
                                <span><a href="#">Families</a></span>
                            </span>
                            <ul class="tr-list job-meta">
                                <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                            </ul>
                            <div class="time">
                                <a href="#"><span>Full Time</span></a>
                                <span class="pull-right">Posted Oct 09, 2017</span>
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
