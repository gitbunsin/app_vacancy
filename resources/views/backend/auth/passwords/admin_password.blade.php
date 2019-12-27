

@extends('frontend.layouts.template')
@section('content')
<div class="tr-breadcrumb bg-image section-before">
		<div class="container">
			<div class="breadcrumb-info text-center">
				<div class="page-title">
					<h1>Reset Password for Employer Account</h1>
				</div>		
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">Contact Us</li>
				</ol>			
			</div>
		</div><!-- /.container -->
	</div><!-- /.tr-breadcrumb -->

	<div class="page-content">
		<div class="container">
			{{-- <div class="tr-map">
				<div id="gmap"></div>
			</div><!-- /.tr-map --> --}}
			<div class="contact-section">
				<div class="row">
					<div class="col-md-10">
						<div class="section">
							<span class="tr-title">Reset Password For Employer Account</span>
							<p>There are many variations of passages of lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>
                        <form  id="frmForgotCandidatePassword">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" name="email">
                            </span>
                                
                                </div>
                            </div>
                            <br/>
                            <div class="form-group row mb-0 ">
                                <div class="col-md-6 offset-md-4">
                                    <button style=""  type="submit" class="btn btn-primary">Send Password Reset Link</button>
                                </div>
                            </div>
                        </form>
						</div>
					</div>
					
				</div>
			</div>			
		</div><!-- /.container -->
	</div><!-- /.page-content -->    
@endsection
@section('scripts')
    <script src="/js/backend/forgot_password.js"></script>
@endsection
