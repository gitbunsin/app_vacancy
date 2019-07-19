@extends('frontend.layouts.template')
@section('content')
    <!-- Title Header Start -->
    <div class="clearfix"></div>
    <!-- Title Header End -->
    <!-- Accordion Design Start -->
    <section class="accordion">
        <div class="container">
            <div class="row">

                <!-- Billing Address -->
                <div class="col-md-10 col-sm-8">
                    <div class="sidebar-wrapper">

                        <div class="sidebar-box-header bb-1">
                            <h4>Create An Account</h4>
                        </div>

                        <form class="billing-form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="col-xs-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" />
                                </div>
                                <div class="col-xs-6">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
										<span class="custom-checkbox">
											<input type="checkbox" id="1">
											<label for="1"></label>
										</span> I give my consent to Job Stock to collect my data with GDPR regulation.</a>
                                </div>
                            </div>
                            <div class="row mrg-top-30">
                                <div class="col-md-12 text-center">
                                    <a href="#" class="btn btn-success">SignUp</a>
                                    <a href="" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Accordion Design End -->
    <!-- Footer Section Start -->
    <footer class="">
        <div class="row copyright">
            <div class="container">
                <p>Copyright Love Jobs © 2019. All Rights Reserved </p>
            </div>
        </div>
    </footer>
@endsection