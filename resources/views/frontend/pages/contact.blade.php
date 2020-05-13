
@extends('frontend.layouts.template')
@section('content')
<div class="pageTitle">
	<div class="container">
	  <div class="row">
		<div class="col-md-6 col-sm-6">
		  <h1 class="page-heading">Contact Us</h1>
		</div>
		<div class="col-md-6 col-sm-6">
		  <div class="breadCrumb"><a href="#.">Home</a> / <span>Contact Us</span></div>
		</div>
	  </div>
	</div>
  </div>

  <!-- Page Title End --> 
   
  <!-- Contact us -->
  <div class="inner-page">
	<div class="container">
	  <div class="contact-wrap">
		<div class="row">
		  <div class="col-md-12 column">
			<div class="title"> <span>We Are Here For Your Help</span>
			  <h2>GET IN TOUCH FAST</h2>
			  <p>Vestibulum at magna tellus. Vivamus sagittis nunc aliquet. Vivamin orci aliquam<br>
				eros vel saphicula. Donec eget ultricies ipsmconsequat.</p>
			</div>
		  </div>
		  
		  <!-- Contact Info -->
		  <div class="col-md-4 column">
			<div class="contact-now">
			  <div class="contact"> <span><i class="fa fa-home"></i></span>
				<div class="information"> <strong>Address:</strong>
				  <p>8500 lorem, New Ispum, Dolor amet sit 12301</p>
				</div>
			  </div>
			  <!-- Contact Info -->
			  <div class="contact"> <span><i class="fa fa-envelope"></i></span>
				<div class="information"> <strong>Email Address:</strong>
				  <p>bunsin.toeng@gmail.com</p>
				  <p>bunsin.toeng@kh-work.com</p>
				</div>
			  </div>
			  <!-- Contact Info -->
			  <div class="contact"> <span><i class="fa fa-phone"></i></span>
				<div class="information"> <strong>Phone No:</strong>
				  <p>+885 0962711117</p>
				  <p>+885 0962711117</p>
				</div>
			  </div>
			  <!-- Contact Info --> 
			</div>
			<!-- Contact Now --> 
		  </div>
		  
		  <!-- Contact form -->
		  <div class="col-md-8 column">
			<div class="contact-form">
			  <div id="message"></div>
			  <form action="#" class="tr-form" id="frmContactUs">
				@if (Auth::check())
					<input type="hidden" id="user_id" value="{{auth()->user()->id}}">
				@else
					<input type="hidden" id="user_id" value="">
				@endif
				<div class="row">
				  <div class="col-md-6">
					<input type="text" id="name" name="name"  required="required" placeholder="Full Name">
				  </div>
				  <div class="col-md-6">
					<input type="email" id="contact_email" name="contact_email"  required="required" placeholder="Email Address">
				  </div>
				  <div class="col-md-12">
					<input type="text" id="subject"  required="required" placeholder="Subject">	
				  </div>
				  <div class="col-md-12">
					<textarea name="message" id="message"  required="required" rows="6" placeholder="Message"></textarea>	
				  </div>
				  <div class="col-md-12">
					<button type="submit">Submit</button>
				  </div>
				</div>
			  </form>
			</div>
			
		  </div>
		</div>
		<br/>
		<!-- Google Map -->
		<div class="googlemap">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d193572.19492844533!2d-74.11808565615137!3d40.70556503857166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1481975053066" allowfullscreen></iframe>
		  </div>
	  </div>
	</div>
  </div>
  
  
  
@endsection
@section('scripts')
	<script src="/js/backend/contact.js"></script>
@endsection