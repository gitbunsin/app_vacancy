
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
                            <h4 style="text-align: center;">Register  An Cadidate Account</h4>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                                @csrf
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span style="color: red;" class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span  style="color: red;" class="invalid-feedback" role="alert">
                                            <strong style="">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span style="color: red;"  class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xs-6">
                                    <label>Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                                    <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section Start -->
    <footer class="">
        <div class="row copyright">
            <div class="container">
                <p>Copyright Love Jobs © 2019. All Rights Reserved </p>
            </div>
        </div>
    </footer>
@endsection
