
@extends('frontend.layouts.template')
@section('content')
<div class="pageTitle">
	<div class="container">
	  <div class="row">
		<div class="col-md-6 col-sm-6">
		  <h1 id="{{__('menu.font_family_en')}}" class="page-heading">{{__('contact.contact_us')}}</h1>
		</div>
		<div class="col-md-6 col-sm-6">
		  <div class="breadCrumb"><a href="#.">Home</a> / <span id="{{__('menu.font_family_en')}}">{{__('contact.contact_us')}}</span></div>
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
			<div class="title"> <span id="{{__('menu.font_family_en')}}">{{__('contact.we_are_here_for_your_help')}}</span><br/><br/>
			  <h2 id="{{__('menu.font_family_en')}}">{{__('contact.get_in_touch_fast')}}</h2>
			  {{-- <p>Vestibulum at magna tellus. Vivamus sagittis nunc aliquet. Vivamin orci aliquam<br>
				eros vel saphicula. Donec eget ultricies ipsmconsequat.</p> --}}
			</div>
		  </div>
		  
		  <!-- Contact Info -->
		  <div class="col-md-4 column">
			<div class="contact-now">
			  <div class="contact"> <span><i class="fa fa-home"></i></span>
				<div class="information"> <strong id="{{__('menu.font_family_en')}}">{{__('contact.address')}}</strong>
				  <p>8500 lorem, New Ispum, Dolor amet sit 12301</p>
				</div>
			  </div>
			  <!-- Contact Info -->
			  <div class="contact"> <span><i class="fa fa-envelope"></i></span>
				<div class="information"> <strong id="{{__('menu.font_family_en')}}">{{__('contact.email_address')}}</strong>
				  <p>bunsin.toeng@gmail.com</p>
				  <p>bunsin.toeng@kh-work.com</p>
				</div>
			  </div>
			  <!-- Contact Info -->
			  <div class="contact"> <span><i class="fa fa-phone"></i></span>
				<div class="information"> <strong id="{{__('menu.font_family_en')}}">{{__('contact.phone_no')}}</strong>
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
					<input  type="text" id="{{__('menu.font_family_en')}}" name="name"  required="required" placeholder="{{__('contact.full_name')}}">
				  </div>
				  <div class="col-md-6">
					<input type="email" id="{{__('menu.font_family_en')}}" name="contact_email"  required="required" placeholder="{{__('contact.email_address')}}">
				  </div>
				  <div class="col-md-12">
					<input type="text" id="{{__('menu.font_family_en')}}" required="required" placeholder="{{__('contact.subject')}}">	
				  </div>
				  <div class="col-md-12">
					<textarea name="message" id="{{__('menu.font_family_en')}}" required="required" rows="6" placeholder="{{__('contact.message')}}"></textarea>	
				  </div>
				  <div class="col-md-12">
					<button type="submit">{{__('contact.submit')}}</button>
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