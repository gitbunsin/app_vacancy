
@extends('frontend.layouts.template')
@section('content')
<section>
    <div class="container">
        <!-- Company Searrch Filter Start -->
        <div class="row extra-mrg">
            <div class="wrap-search-filter">
                <form>
                    <div class="col-md-4 col-sm-4">
                        <input type="text" class="form-control" placeholder="Keyword: Name, Tag">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <input type="text" class="form-control" placeholder="Location: City, State, Zip">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select class="form-control" id="j-category">
                            <option value="">&nbsp;</option>
                            <option value="1">Information Technology</option>
                            <option value="2">Mechanical</option>
                            <option value="3">Hardware</option>
                            <option value="4">Hospitality & Tourism</option>
                            <option value="5">Education & Training</option>
                            <option value="6">Government & Public</option>
                            <option value="7">Architecture</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <button type="submit" class="btn btn-primary full-width">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Company Searrch Filter End -->
        @foreach($job as $jobs)
            <div class="item-click">
                <article>
                    <div class="brows-job-list">
                        <div class="col-md-6 col-sm-6">
                            <div class="item-fl-box">
                                <div class="brows-job-company-img">
                                    <a href="job-detail.html"><img src="{{asset('img/job/com-1.jpg')}}" class="img-responsive" alt="" /></a>
                                </div>
                                <div class="brows-job-position">
                                    <h3><a href="{{url('job-apply-details/'.$jobs->id)}}">{{$jobs->job_title}}</a></h3>
                                    <p>
                                        <span class="brows-job-sallery"><i class="fa fa-money"></i>$750 - 800</span>
                                        <span>Expired Date :</span><span class="brows-job-sallery"><i class="fa fa-clock-o"></i>{{$jobs->closingDate}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="brows-job-location">
                                <p style="font-size: 13px !important;"><i class="fa fa-map-marker"></i>{{$jobs->company->address}}</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <div class="brows-job-link">
                                <a href="{{url('job-apply-details/'.$jobs->id)}}" class="btn btn-success">View Detail</a>
                            </div>
                        </div>
                    </div>
                    <span class="tg-themetag tg-featuretag">Premium</span>
                </article>
            </div>
        @endforeach
        <!--/.row-->
        <div class="row">
            <ul class="pagination">
                <li><a href="#"><i class="ti-arrow-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li>
                <li><a href="#"><i class="ti-arrow-right"></i></a></li>
            </ul>
        </div>

    </div>
</section>
<!-- ========== Begin: Brows job End ===============  -->
<!-- Footer Section Start -->
<div class="clearfix"></div>
<!-- Footer Section End -->

<!-- Sign Up Window Code -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Sign In</a></li>
                        <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content" id="myModalLabel2">
                        <div role="tabpanel" class="tab-pane fade in active" id="login">
                            <img src="assets/img/logo.png" class="img-responsive" alt="" />
                            <div class="subscribe wow fadeInUp">
                                <form class="form-inline" method="post">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="email"  name="email" class="form-control" placeholder="Username" required="">
                                            <input type="password" name="password" class="form-control"  placeholder="Password" required="">
                                            <div class="center">
                                                <button type="submit" id="login-btn" class="submit-btn"> Login </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="register">
                            <img src="assets/img/logo.png" class="img-responsive" alt="" />
                            <form class="form-inline" method="post">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text"  name="email" class="form-control" placeholder="Your Name" required="">
                                        <input type="email"  name="email" class="form-control" placeholder="Your Email" required="">
                                        <input type="email"  name="email" class="form-control" placeholder="Username" required="">
                                        <input type="password" name="password" class="form-control"  placeholder="Password" required="">
                                        <div class="center">
                                            <button type="submit" id="subscribe" class="submit-btn"> Create Account </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection