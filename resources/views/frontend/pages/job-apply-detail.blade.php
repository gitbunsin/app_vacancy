@extends('frontend.layouts.template')
@section('content')
    <br/><br/> <br/><br/> <br/><br/><br/><br/>
    <div class="clearfix"></div>
    <!-- Title Header End -->

    <!-- Candidate Detail Start -->
    <section class="detail-desc">
        <div class="container">
            <div style="height: 160px;   " class="ur-detail-wrap top-lay">

                <div class="ur-detail-box">
                    <div class="ur-thumb">
                        <img  src="{{asset('img/job/com-1.jpg')}}" class="img-responsive img-circle" alt="" />
                    </div>
                    <div class="ur-caption">
                        <h4 class="ur-title">{{ $job == ""  ? " " : $job->job_title }}</h4>
                        <p class="ur-location"><i class="ti-location-pin mrg-r-5"></i>{{ $job->company->address }}</p>
                    </div>

                </div>

                <div class="ur-detail-btn">
                    <a style="margin-top: -8px;" href="{{url('job-download-company/'.$file->file_name)}}" class="btn btn-info full-width"><i class="ti-download mrg-r-5"></i>Download CV</a>
                </div>&nbsp;  <div class="ur-detail-btn">
                    <a href="#" class="btn btn-warning mrg-bot-10 full-width"><i class="ti-thumb-up mrg-r-5"></i>Save This Job</a>
                </div>

            </div>
        </div>
    </section>
    <!-- Candidate Detail End -->

    <!-- company full detail Start -->
    <section class="full-detail-description full-detail">
        <div class="container">
            <div class="row ">

                <div class="col-lg-8 col-md-8 full-card  ">

                    <div class="row-bottom">
                        <br/>
                        <h2 class="detail-title">Job Description</h2>
                        <p>{!! $job->job_description !!}</p>
                    </div>
                    <h2 class="detail-title">
                       Required Skills
                    </h2>
                    <ul class="skills">
                            @foreach($job->skill as $skills)
                            <li> {{$skills->name}} </li>
                            @endforeach
                    </ul>
                    <div class="row-bottom">
                        <h2 class="detail-title">Related Job</h2>
                        <!--Browse Job In Grid-->
                        <div class="row extra-mrg">
                            <div class="col-md-6 col-sm-6">
                                <div class="grid-view brows-job-list">
                                    <div class="brows-job-company-img">
                                        <img src="{{asset('img/job/com-1.jpg')}}" class="img-responsive" alt="" />
                                    </div>
                                    <div class="brows-job-position">
                                        <h3><a href="job-detail.html">Web Developer</a></h3>
                                        <p><span>Google</span></p>
                                    </div>
                                    <div class="job-position">
                                        <span class="job-num">5 Position</span>
                                    </div>
                                    <div class="brows-job-type">
                                        <span class="enternship">Internship</span>
                                    </div>
                                    <ul class="grid-view-caption">
                                        <li>
                                            <div class="brows-job-location">
                                                <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                            </div>
                                        </li>
                                        <li>
                                            <p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="grid-view brows-job-list">
                                    <div class="brows-job-company-img">
                                        <img src="{{asset('img/job/com-1.jpg')}}" class="img-responsive" alt="" />
                                    </div>
                                    <div class="brows-job-position">
                                        <h3><a href="job-detail.html">Web Developer</a></h3>
                                        <p><span>Google</span></p>
                                    </div>
                                    <div class="job-position">
                                        <span class="job-num">5 Position</span>
                                    </div>
                                    <div class="brows-job-type">
                                        <span class="part-time">Part Time</span>
                                    </div>
                                    <ul class="grid-view-caption">
                                        <li>
                                            <div class="brows-job-location">
                                                <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                            </div>
                                        </li>
                                        <li>
                                            <p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
                                        </li>
                                    </ul>
                                    <span class="tg-themetag tg-featuretag">Premium</span>
                                </div>
                            </div>

                        </div>
                        <!--/.Browse Job In Grid-->

                    </div>

                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="full-sidebar-wrap">
                        <a href="{{url('job-apply/'.$job->id)}}" class="btn btn-info mrg-bot-15 full-width"><i class="ti-star mrg-r-5"></i>Apply This Job</a>
                        <!-- Candidate overview -->
                        <div class="sidebar-widgets">

                            <div class="ur-detail-wrap">
                                <div class="ur-detail-wrap-header">
                                    <h4>Candidate Overview</h4>
                                </div>
                                <div class="ur-detail-wrap-body">
                                    <ul class="ove-detail-list">

                                        <li>
                                            <i class="ti-wallet"></i>
                                            <h5>Offer Salary</h5>
                                            <span>£ {{ $job->offer_salary }}</span>
                                        </li>
                                        <li>
                                            <i class="ti-user"></i>
                                            <h5>Gender</h5>
                                            <span>{{$job->gender}}</span>
                                        </li>
                                        <li>
                                            <i class="ti-ink-pen"></i>
                                            <h5>Career Level</h5>
                                            <span>{{$job->career_level}}</span>
                                        </li>
                                        <li>
                                            <i class="ti-home"></i>
                                            <h5>Industry</h5>
                                            <span>{{$job->industry}}</span>
                                        </li>
                                        <li>
                                            <i class="ti-shield"></i>
                                            <h5>Experience</h5>
                                            <span>{{$job->experience}}</span>
                                        </li>
                                        <li>
                                            <i class="ti-book"></i>
                                            <h5>Qualification</h5>
                                            <span>{{$job->qualification}}</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Company overview -->
                        <div class="sidebar-widgets">

                            <div class="ur-detail-wrap">
                                <div class="ur-detail-wrap-header">
                                    <h4>Company Overview</h4>
                                </div>
                                <div class="ur-detail-wrap-body">
                                    <ul class="ove-detail-list">

                                        <li>
                                            <i class="ti-ruler-pencil"></i>
                                            <h5>Established</h5>
                                            <span>{{$job->company->created_at}}</span>
                                        </li>

                                        <li>
                                            <i class="ti-user"></i>
                                            <h5>Employees</h5>
                                            <span>500 - 600</span>
                                        </li>

                                        <li>
                                            <i class="ti-face-smile"></i>
                                            <h5>Owner Name</h5>
                                            <span>{{$job->admin->name}}</span>
                                        </li>

                                        <li>
                                            <i class="ti-email"></i>
                                            <h5>Email</h5>
                                            <span>{{$job->company->email}}</span>
                                        </li>

                                        <li>
                                            <i class="ti-mobile"></i>
                                            <h5>Call</h5>
                                            <span>{{$job->company->phone}}</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- /Company overview -->
                        <!-- Follow Links -->
                        <div class="sidebar-widgets">

                            <div class="ur-detail-wrap">
                                <div class="ur-detail-wrap-header">
                                    <h4>Follow Links</h4>
                                </div>
                                <div class="ur-detail-wrap-body">
                                    <ul class="follow-links">

                                        <li><a href="{{$job->company->website_link}}"><i class="ti-link"></i>Website</a></li>
                                        <li><a href="{{$job->company->facebook_link}}"><i class="ti-facebook"></i>Facebook</a></li>
                                        <li><a href="{{$job->company->twitter_link}}"><i class="ti-twitter-alt"></i>Twitter</a></li>
                                        <li><a href="{{$job->company->linkedIn_link}}"><i class="ti-linkedin"></i>Linked In</a></li>
                                        <li><a href="{{$job->company->instagram_link}}"><i class="ti-instagram"></i>Instagram</a></li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- /Working Days -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- company full detail End -->
    <!-- More Jobs -->

    <!-- company full detail End -->
@endsection
