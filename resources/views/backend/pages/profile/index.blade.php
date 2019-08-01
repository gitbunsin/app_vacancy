@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <!-- /row -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">

                <div class="card-header">
                    <h4>Welcome  {{auth()->guard('admin')->user()->name}} !</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- col-md-6 -->
                        <div class="col-md-6 col-12">

                            <div class="form-group">
                                <div class="contact-img">
                                    <img src="{{asset('img/about/about-us.jpg')}}" class="img-circle img-responsive" alt="">
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="Daniel">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Duke">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" placeholder="***********">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="danielduke@gmail.com">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" placeholder="985 485 75895">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="#253 Joken Sliteer Shuit QCH12">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nation</label>
                                    <input type="text" class="form-control" placeholder="Canada">
                                </div>
                            </div>
                        </div>

                        <!-- col-md-6 -->
                        <div class="col-md-6 col-12 padd-top-20">

                            <!-- col-md-12 -->
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control">
                                                <option>Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Language</label>
                                            <select class="form-control">
                                                <option>Language</option>
                                                <option value="1">English</option>
                                                <option value="2">Hindi</option>
                                                <option value="4">British</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- col-md-12 -->

                            <!-- col-md-12 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="text" id="dob" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0"  class="form-control" readonly="">
                                </div>
                            </div>
                            <!-- col-md-12 -->

                            <!-- col-md-12 -->
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input type="text" class="form-control" placeholder="https://facebook.com/daniel">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input type="text" class="form-control" placeholder="https://twitter.com/daniel">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- col-md-12 -->

                            <!-- col-md-12 -->
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Linkedin</label>
                                            <input type="text" class="form-control" placeholder="https://linkedin.com/daniel">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Google+</label>
                                            <input type="text" class="form-control" placeholder="+Daniel">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- col-md-12 -->

                            <!-- col-md-12 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Slogan</label>
                                    <input type="text" class="form-control" placeholder="World Most Popular Software Development Industry">
                                </div>
                            </div>
                            <!-- col-md-12 -->

                            <!-- col-md-12 -->
                            <div class="col-md-12">

                                <label>Payment Methode</label>
                                <div class="row">

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">

                                            <div class="payment-box">

                                                <div class="padd-10">
                                                    <img src="assets/img/paypal.png" class="fl-left width-30" alt="" />
                                                    <h5 class="mb-0">Paypal</h5>
                                                    <small>daniel..@gmai</small>
                                                </div>

                                                <div class="pay-box-footer bt-1">
                                                    <a href="#" data-toggle="tooltip" data-original-title="Remove" class="theme-cl font-13 fl-right">Remove</a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">

                                            <div class="payment-box">

                                                <div class="padd-10">
                                                    <img src="assets/img/strip.png" class="fl-left width-30" alt="" />
                                                    <h5 class="mb-0">strip..456</h5>
                                                    <small>Expire 26/22</small>
                                                </div>

                                                <div class="pay-box-footer bt-1">
                                                    <a href="#" data-toggle="tooltip" data-original-title="Remove" class="theme-cl font-13 fl-right">Remove</a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">

                                            <div class="payment-box">

                                                <div class="padd-10">
                                                    <img src="assets/img/debit.png" class="fl-left width-40" alt="" />
                                                    <h5 class="mb-0">Master..256</h5>
                                                    <small>Expire 26/22</small>
                                                </div>

                                                <div class="pay-box-footer bt-1">
                                                    <a href="#" data-toggle="tooltip" data-original-title="Remove" class="theme-cl font-13 fl-right">Remove</a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- col-md-12 -->

                            <!-- col-md-12 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="" class="btn btn-default" data-toggle="tooltip" data-original-title="Add Payment Method">
                                        <i class="ti-credit-card"></i> Add Payment Method
                                    </a>
                                </div>
                            </div>
                            <!-- col-md-12 -->

                        </div>

                        <div class="col-md-12 col-12 padd-top-20 text-center">
                            <a href="#" class="btn btn-primary">Update & Exit</a>
                        </div>

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