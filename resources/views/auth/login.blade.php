
@extends('frontend.layouts.template')
@section('content')
    <!-- End Navigation -->
    <div class="tr-breadcrumb bg-image section-before">
		<div class="container">
			<div class="breadcrumb-info text-center">
				<div class="page-title">
					<h1>Sign In</h1>
					<span>Lorem Ipsum is simply dummy text of the printing pesetting.</span>
				</div>				
			</div>
		</div><!-- /.container -->
	</div><!-- tr-breadcrumb -->	

	<div class="tr-account section-padding">
		<div class="container text-center">
			<div class="user-account">
				<div class="account-content">
					<form action="#" class="tr-form">
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Please Enter Your Email">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password">
						</div>
						<div class="user-option">
							<div class="checkbox">
								<label for="logged"><input type="checkbox" name="logged" id="logged">Remember me</label>
							</div>
							<div class="forgot-password">
								<a href="#">I forgot password</a>
							</div>
						</div>						
						<button type="submit" class="btn btn-primary">Login</button>
					</form>	
					<div class="new-user text-center">
						<span><a href="signup.html">Create a New Account</a> </span>
					</div>
				</div>
			</div>			
		</div><!-- container -->
	</div><!-- /.tr-account-->	

@endsection

