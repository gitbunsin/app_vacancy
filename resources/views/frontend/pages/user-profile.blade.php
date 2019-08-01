@extends('frontend.layouts.template')
@section('content')
    <br/><br/><br/><br/>
    <style>
    </style>
    <div class="container">
        <div class="row">
    <div class="col-lg-3 col-md-3">
        <div class="full-sidebar-wrap">
            <!-- Candidate overview -->
            <div class="sidebar-widgets">

                <div class="ur-detail-wrap">
                    <div class="ur-detail-wrap-header" style="text-align: center;">
                        <a href="job-detail.html"><img  style="width: 150px;" src="{{asset('img/about/about-us.jpg')}}" class="img-circle center" alt="" /></a>
                        <br/> <br/>
                        <h4>Candidate Overview</h4>
                    </div>
                    <div class="ur-detail-wrap-body">
                        <ul class="nav md-pills pills-primary flex-column ove-detail-list" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link active" data-toggle="tab" href="#panel21" role="tab">My Profile
                                    <i  style="color: #0bbf0b;" class="ti-user"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#resume" role="tab">My Resume
                                    <i  style="color: #0bbf0b;" class="ti-file"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#shortlist" role="tab">Shortlisted Job
                                    <i  style="color: #0bbf0b;" class="ti-heart"></i>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#apply-job" role="tab">Apply Jobs
                                    <i  style="color: #0bbf0b;" class="ti-stamp"></i>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#change-password" role="tab">Change Password
                                    <i  style="color: #0bbf0b;" class="ti-lock"></i>
                                </a>

                            </li> <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="{{url('logout')}}" role="tab">Log Out
                                    <i  style="color: #0bbf0b;" class="ti ti-shift-right"></i>
                                </a>

                            </li>
                        </ul>

                    </div>
                </div><br/>
            </div>
            <!-- /Candidate overview -->
        </div>
    </div>
    <div class="col-lg-9 col-md-9">
        <div class="full-sidebar-wrap">
            <!-- Candidate overview -->
            <div class="sidebar-widgets">

                <div class="ur-detail-wrap">
                    <div class="ur-detail-wrap-header">
                        <h4>Candidate Overview</h4>
                    </div>
                    <div class="ur-detail-wrap-body">
                        <div class="tab-content vertical">

                            <div class="tab-pane fade in show active" id="panel21" role="tabpanel">
                                <form action="{{url('admin/user/'.auth()->user()->id)}}" class="" method="post" >
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="PATCH">

                                <div class="row no-mrg">
                                    <div class="edit-pro">

                                        <div class="col-md-4 col-sm-6">
                                            <label>First Name</label>
                                            <input value="{{auth()->user()->first_name}}" name="first_name" placeholder="first_name" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Middle Name</label>
                                            <input value="{{auth()->user()->middle_name}}" name="middle_name" placeholder="middle_name" type="text" class="form-control" >
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Last Name</label>
                                            <input value="{{auth()->user()->last_name}}" name="last_name" type="text" class="form-control" placeholder="last name">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Email</label>
                                            <input value="{{auth()->user()->email}}" type="email" class="form-control" placeholder="dana.mathew@gmail.com">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Phone</label>
                                            <input value="{{auth()->user()->phone}}" name="phone" type="text" class="form-control" placeholder="+91 258 475 6859">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Zip / Postal</label>
                                            <input value="{{auth()->user()->zip}}" name="zip" type="text" class="form-control" placeholder="258 457 528">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Address</label>
                                            <input value="{{auth()->user()->address}}" name="address" type="text" class="form-control" placeholder="204 Lowes Alley">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Address 2</label>
                                            <input value="{{auth()->user()->address_2}}" name="address_2" type="text" class="form-control" placeholder="Software Developer">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Organization</label>
                                            <input value="{{auth()->user()->organization}}" name="organization" type="text" class="form-control" placeholder="Software Developer">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>City</label>
                                            <input value="{{auth()->user()->city}}" name="city" type="text" class="form-control" placeholder="Chandigarh">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>State</label>
                                            <input value="{{auth()->user()->state}}" name="state" type="text" class="form-control" placeholder="Punjab">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Country</label>
                                            <input value="{{auth()->user()->country}}"  name="country" type="text" class="form-control" placeholder="India">
                                        </div>
                                        <div class="col-md-8 col-sm-6">
                                            <label>About you</label>
                                            <textarea class="form-control" placeholder="Write Something"></textarea>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Upload Profile Pic</label>
                                            <input  type="file" name="profile" />
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="update-btn">Update Now</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>

                            <!-- Panel 3 -->
                            <div style="position: relative; bottom: 700px;" class="tab-pane fade in  " id="resume" role="tabpanel">
                                <form enctype="multipart/form-data" action="{{url('admin/user-cv/'.auth()->user()->id)}}" class="" method="post" >
                                    {{csrf_field()}}
                                <div class="row no-mrg">
                                    <div class="edit-pro">
                                        <div class="col-md-12 col-sm-12">
                                            <label> Full Name</label>
                                            <input placeholder="full Name" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <label>Job Title</label>
                                            <input placeholder="full Name" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <label>About you</label>
                                            <textarea class="form-control textarea" placeholder="Write Something"></textarea>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <label>Upload CVs</label>
                                            <input type="file" name="filename" class="form-control" />
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="update-btn">Update Now</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <!-- Panel 3 -->
                            <div  style="height :auto;position: relative; bottom: 700px;" class="tab-pane fade" id="shortlist" role="tabpanel">

                                <article class="advance-search-job">
                                    <div class="row">
                                    <div class="row no-mrg">
                                        <div class="col-md-6 col-sm-6">
                                            <a href="new-job-detail.html" title="job Detail">
                                                <div class="advance-search-img-box"><img src="{{asset('img/job/com-1.jpg')}}" class="img-responsive" alt=""></div>
                                            </a>
                                            <div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>Product Designer</h4></a><span>Google Ltd</span></div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="advance-search-job-locat">
                                                <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">Apply</a></div>
                                    </div>
                                    <span class="tg-themetag tg-featuretag">Premium</span>
                                    </div>
                                </article>
                                <article class="advance-search-job">
                                    <div class="row">
                                        <div class="row no-mrg">
                                            <div class="col-md-6 col-sm-6">
                                                <a href="new-job-detail.html" title="job Detail">
                                                    <div class="advance-search-img-box"><img src="{{asset('img/job/com-1.jpg')}}" class="img-responsive" alt=""></div>
                                                </a>
                                                <div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>Product Designer</h4></a><span>Google Ltd</span></div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="advance-search-job-locat">
                                                    <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">Apply</a></div>
                                        </div>
                                        <span class="tg-themetag tg-featuretag">Premium</span>
                                    </div>
                                </article>
                            </div>

                            <div  style="position: relative; bottom: 700px;" class="tab-pane fade" id="apply-job" role="tabpanel">

                                <article class="advance-search-job">
                                    <div class="row">
                                        <div class="row no-mrg">
                                            <div class="col-md-6 col-sm-6">
                                                <a href="new-job-detail.html" title="job Detail">
                                                    <div class="advance-search-img-box"><img src="{{asset('img/job/com-1.jpg')}}" class="img-responsive" alt=""></div>
                                                </a>
                                                <div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>Product Designer</h4></a><span>Google Ltd</span></div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="advance-search-job-locat">
                                                    <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">Apply</a></div>
                                        </div>
                                        <span class="tg-themetag tg-featuretag">Premium</span>
                                    </div>
                                </article>
                                <article class="advance-search-job">
                                    <div class="row">
                                        <div class="row no-mrg">
                                            <div class="col-md-6 col-sm-6">
                                                <a href="new-job-detail.html" title="job Detail">
                                                    <div class="advance-search-img-box"><img src="{{asset('img/job/com-1.jpg')}}" class="img-responsive" alt=""></div>
                                                </a>
                                                <div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>Product Designer</h4></a><span>Google Ltd</span></div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="advance-search-job-locat">
                                                    <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">Apply</a></div>
                                        </div>
                                        <span class="tg-themetag tg-featuretag">Premium</span>
                                    </div>
                                </article>
                            </div>
                            <div style="position: relative; bottom: 700px;" class="tab-pane fade in  " id="change-password" role="tabpanel">
                                <div class="row no-mrg">
                                    <div class="edit-pro">
                                        <div class="col-md-12 col-sm-12">
                                            <label> Current Password</label>
                                            <input placeholder="old password" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <label>New Password</label>
                                            <input placeholder="new Password" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <label>Confirm Password</label>
                                            <input placeholder="confirm password" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="button" class="update-btn">Save Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
                <!-- Panel 1 -->

                <br/>
            </div>
            <!-- /Candidate overview -->
        </div>
    </div>
    <div class="clearfix"></div>
        </div>
    </div>
    <footer class="">
        <div class="row copyright">
            <div class="container">
                <p>Copyright Love Jobs © 2019. All Rights Reserved </p>
            </div>
        </div>
    </footer>
    <!-- Title Header End -->
    @endsection
