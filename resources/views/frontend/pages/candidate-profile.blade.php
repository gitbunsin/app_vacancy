@extends('frontend.layouts.template')
@section('content')
    <br/><br/><br/><br/>

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
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#panel21" role="tab">My Profile
                                    <i  style="color: #0bbf0b;" class="ti-user"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#panel22" role="tab">My Resume
                                    <i  style="color: #0bbf0b;" class="ti-file"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#panel22" role="tab">CV & Cover letter
                                    <i  style="color: #0bbf0b;" class="ti ti-email"></i>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#panel22" role="tab">Shortlisted Job
                                    <i  style="color: #0bbf0b;" class="ti-heart"></i>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#panel22" role="tab">Apply Jobs
                                    <i  style="color: #0bbf0b;" class="ti-stamp"></i>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#panel22" role="tab">View Profiles
                                    <i  style="color: #0bbf0b;" class="ti-vimeo"></i>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#panel22" role="tab">Change Password
                                    <i  style="color: #0bbf0b;" class="ti-lock"></i>
                                </a>

                            </li> <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#panel22" role="tab">Log Out
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
                            <!-- Panel 1 -->
                            <div class="tab-pane fade in show active" id="panel21" role="tabpanel">
                                <div class="row no-mrg">
                                    <div class="edit-pro">
                                        <div class="col-md-4 col-sm-6">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="Matthew">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" placeholder="Else">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Dana">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="dana.mathew@gmail.com">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" placeholder="+91 258 475 6859">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Zip / Postal</label>
                                            <input type="text" class="form-control" placeholder="258 457 528">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Address</label>
                                            <input type="text" class="form-control" placeholder="204 Lowes Alley">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Address 2</label>
                                            <input type="text" class="form-control" placeholder="Software Developer">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Organization</label>
                                            <input type="text" class="form-control" placeholder="Software Developer">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>City</label>
                                            <input type="text" class="form-control" placeholder="Chandigarh">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>State</label>
                                            <input type="text" class="form-control" placeholder="Punjab">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Country</label>
                                            <input type="text" class="form-control" placeholder="India">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control" placeholder="*********">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" placeholder="*********">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control" placeholder="*********">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>About you</label>
                                            <textarea class="form-control" placeholder="Write Something"></textarea>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Upload Profile Pic</label>
                                            <form action="/upload-target" class="dropzone dz-clickable profile-pic">
                                                <div class="dz-default dz-message">
                                                    <i class="fa fa-cloud-upload"></i>
                                                    <span>Drop files here to upload</span>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label>Upload Profile Cover</label>
                                            <form action="/upload-target" class="dropzone dz-clickable profile-cover">
                                                <div class="dz-default dz-message">
                                                    <i class="fa fa-cloud-upload"></i>
                                                    <span>Drop files here to upload</span>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="button" class="update-btn">Update Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Panel 1 -->
                            <!-- Panel 2 -->
                            <div class="tab-pane fade" id="panel22" role="tabpanel">
                                <h5 class="my-2 h5">Panel 2</h5>
                            </div>
                            <!-- Panel 2 -->
                            <!-- Panel 3 -->
                            <div class="tab-pane fade" id="panel23" role="tabpanel">
                                <h5 class="my-2 h5">Panel 3</h5>
                            </div>
                            <!-- Panel 3 -->
                        </div>
                    </div>
                </div><br/>
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
