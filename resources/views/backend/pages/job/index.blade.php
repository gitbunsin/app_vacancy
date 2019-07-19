@extends('backend.layouts.master')
@section('content')



    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <div class="pull-right">
                            <select class="form-control">
                                <option>Short By</option>
                                <option>Premium Job</option>
                                <option>Ascending</option>
                                <option>Descending</option>
                                <option>Most Popular</option>
                            </select>
                        </div>
                        <input type="text" class="form-control wide-width" placeholder="Search & type" />
                    </div>

                    <div class="card-body">
                        <ul class="list">
                            <li class="manage-list-row clearfix">
                                <div class="job-info premium-job">
                                    <div class="job-img">
                                        <img src="{{asset('img/about/about-us.jpg')}}" class="attachment-thumbnail" alt="Academy Pro Theme">
                                    </div>
                                    <div class="job-details">
                                        <h3 class="job-name">New Product Mockup <span class="cl-danger">$25</span></h3>
                                        <small class="job-company"><i class="ti-home"></i>Apple Ltd</small>
                                        <small class="job-sallery"><i class="ti-credit-card"></i>215,000 - 45,000</small>
                                        <small class="job-update"><i class="ti-time"></i>Expired: 6/14/19</small>
                                        <span class="j-type full-time">Full Time</span>
                                    </div>
                                </div>
                                <div class="job-buttons">
                                    <a href="#" class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                </div>
                            </li>

                            <li class="manage-list-row clearfix">
                                <div class="job-info">
                                    <div class="job-img">
                                        <img src="{{asset('img/about/about-us.jpg')}}" class="attachment-thumbnail" alt="Academy Pro Theme">
                                    </div>
                                    <div class="job-details">
                                        <h3 class="job-name">Custom Php Developer</h3>
                                        <small class="job-company"><i class="ti-home"></i>Google Inc</small>
                                        <small class="job-sallery"><i class="ti-credit-card"></i>25,000 - 35,000</small>
                                        <small class="job-update"><i class="ti-time"></i>Expired: 6/14/19</small>
                                        <span class="j-type part-time">Part Time</span>
                                    </div>
                                </div>
                                <div class="job-buttons">
                                    <a href="#" class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                </div>
                            </li>

                            <li class="manage-list-row clearfix">
                                <div class="job-info premium-job">
                                    <div class="job-img">
                                        <img src="{{asset('img/about/about-us.jpg')}}" class="attachment-thumbnail" alt="Academy Pro Theme">
                                    </div>
                                    <div class="job-details">
                                        <h3 class="job-name">Web Maintenence <span class="cl-danger">$40</span></h3>
                                        <small class="job-company"><i class="ti-home"></i>Microsoft Ltd</small>
                                        <small class="job-sallery"><i class="ti-credit-card"></i>20,000 - 50,000</small>
                                        <small class="job-update"><i class="ti-time"></i>Expired: 6/14/19</small>
                                        <span class="j-type full-time">Full Time</span>
                                    </div>
                                </div>
                                <div class="job-buttons">
                                    <a href="#" class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                </div>
                            </li>

                            <li class="manage-list-row clearfix">
                                <div class="job-info premium-job">
                                    <div class="job-img">
                                        <img src="{{asset('img/about/about-us.jpg')}}" class="attachment-thumbnail" alt="Academy Pro Theme">
                                    </div>
                                    <div class="job-details">
                                        <h3 class="job-name">Photoshop Designer <span class="cl-danger">$32</span></h3>
                                        <small class="job-company"><i class="ti-home"></i>Liquid Soft</small>
                                        <small class="job-sallery"><i class="ti-credit-card"></i>20,000 - 30,000</small>
                                        <small class="job-update"><i class="ti-time"></i>Expired: 6/14/19</small>
                                        <span class="j-type freelancer">Freelancer</span>
                                    </div>
                                </div>
                                <div class="job-buttons">
                                    <a href="#" class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                </div>
                            </li>

                            <li class="manage-list-row clearfix">
                                <div class="job-info">
                                    <div class="job-img">
                                        <img src="{{asset('img/about/about-us.jpg')}}" class="attachment-thumbnail" alt="Academy Pro Theme">
                                    </div>
                                    <div class="job-details">
                                        <h3 class="job-name">HTML5 & CSS3 Coder</h3>
                                        <small class="job-company"><i class="ti-home"></i>Azeera Net</small>
                                        <small class="job-sallery"><i class="ti-credit-card"></i>30,000 - 40,000</small>
                                        <small class="job-update"><i class="ti-time"></i>Expired: 6/14/19</small>
                                        <span class="j-type part-time">part Time</span>
                                    </div>
                                </div>
                                <div class="job-buttons">
                                    <a href="#" class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                </div>
                            </li>

                            <li class="manage-list-row clearfix">
                                <div class="job-info">
                                    <div class="job-img">
                                        <img src="{{asset('img/about/about-us.jpg')}}" class="attachment-thumbnail" alt="Academy Pro Theme">
                                    </div>
                                    <div class="job-details">
                                        <h3 class="job-name">.Net Developer</h3>
                                        <small class="job-company"><i class="ti-home"></i>Nution Nutro</small>
                                        <small class="job-sallery"><i class="ti-credit-card"></i>25,000 - 40,000</small>
                                        <small class="job-update"><i class="ti-time"></i>Expired: 6/14/19</small>
                                        <span class="j-type internship">Internship</span>
                                    </div>
                                </div>
                                <div class="job-buttons">
                                    <a href="#" class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                </div>
                            </li>

                            <li class="manage-list-row clearfix">
                                <div class="job-info premium-job">
                                    <div class="job-img">
                                        <img src="{{asset('img/about/about-us.jpg')}}" class="attachment-thumbnail" alt="Academy Pro Theme">
                                    </div>
                                    <div class="job-details">
                                        <h3 class="job-name">Content Writer <span class="cl-danger">$52</span></h3>
                                        <small class="job-company"><i class="ti-home"></i>Click Code</small>
                                        <small class="job-sallery"><i class="ti-credit-card"></i>10,000 - 30,000</small>
                                        <small class="job-update"><i class="ti-time"></i>Expired: 6/14/19</small>
                                        <span class="j-type full-time">Full Time</span>
                                    </div>
                                </div>
                                <div class="job-buttons">
                                    <a href="#" class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                </div>
                            </li>

                        </ul>

                        <div class="flexbox padd-10">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <i class="ti-arrow-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <i class="ti-arrow-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    </div>
    <!-- /#page-wrapper -->





    @endsection