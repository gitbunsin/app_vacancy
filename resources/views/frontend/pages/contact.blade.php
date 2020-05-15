
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
			<div id="map" style="width: 100%; height: 500px;"></div> 
		  </div>
	  </div>
	</div>
  </div>
  
  
  
@endsection
@section('scripts')
	<script src="/js/backend/contact.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
	<script type="text/javascript">
		function initialize() {
		   var latlng = new google.maps.LatLng(11.562108,	104.888535);
			var map = new google.maps.Map(document.getElementById('map'), {
			  center: latlng,
			  zoom: 13
			});
			var marker = new google.maps.Marker({
			  map: map,
			  position: latlng,
			  draggable: false,
			  anchorPoint: new google.maps.Point(0, -29)
		   });
			var infowindow = new google.maps.InfoWindow();   
			google.maps.event.addListener(marker, 'click', function() {
			  var iwContent = '<div id="iw_container">' +
			  '<div class="iw_title"><b>Location</b> : PhnomPenh</div></div>';
			  // including content to the infowindow
			  infowindow.setContent(iwContent);
			  // opening the infowindow in the current map and at the current marker location
			  infowindow.open(map, marker);
			});
		}
		google.maps.event.addDomListener(window, 'load', initialize);
		</script>
@endsection