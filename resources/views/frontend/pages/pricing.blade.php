@extends('frontend.layouts.template')
@section('content')
<div class="pageTitle">
	<div class="container">
	  <div class="row">
		<div class="col-md-6 col-sm-6">
		  <h1 class="page-heading">Packages</h1>
		</div>
		<div class="col-md-6 col-sm-6">
		  <div class="breadCrumb"><a href="#.">Home</a> / <span>Packages</span></div>
		</div>
	  </div>
	</div>
  </div>
  <!-- Page Title End -->
  
  <div class="paypackages"> 	
	<!---three-paln-->
	<div style="padding: 0px;" class="three-plan">
	  <div class="container">
		{{-- <h3>Our Plan</h3> --}}
		<ul class="row">
		  <li class="col-md-3 col-sm-6 col-xs-12">
			<div class="boxes">
			  <ul>
				<li class="plan-name-dt">Pricing
				  Plans</li>
				<li class="plan-pages"><i class="fa fa-paper-plane" aria-hidden="true"></i>Premium Jobs Post</li>
				<li class="plan-pages"><i class="fa fa-paper-plane" aria-hidden="true"></i>Sell Unlimited Products</li>
				<li class="plan-pages"><i class="fa fa-paper-plane" aria-hidden="true"></i>E-Mail support available</li>
				<li class="plan-pages"><i class="fa fa-paper-plane" aria-hidden="true"></i>Unlimited Applicants</li>
				<li class="plan-pages"><i class="fa fa-paper-plane" aria-hidden="true"></i>Unlimited Regular Job Post</li>
				<li class="plan-pages"><i class="fa fa-paper-plane" aria-hidden="true"></i>E-Mail support available</li>
			  </ul>
			</div>
		  </li>
		  <li class="col-md-3 col-sm-6 col-xs-12">
			<div class="boxes">
			  <div class="pricing-table1"> Free Package<strong>30 Days sample text</strong> </div>
			  <div class="main-unit">
				<div class="pricing-unit1">$</div>
				<div class="pricing-unit1-1">0</div>
				<div class="pricing-unit1-2">per <span class="pricing-unit1-3">mont</span></div>
				<div class="clearfix"></div>
			  </div>
			  <ul class="pricing-detail">
				<li class="plan-detail">300 GB</li>
				<li class="plan-detail">500 GB</li>
				<li class="plan-detail">2 Domains</li>
				<li class="plan-detail">5 Free</li>
				<li class="plan-detail ico"><i class="fa fa-times" aria-hidden="true"></i></li>
				<li class="plan-detail ico"><i class="fa fa-times" aria-hidden="true"></i></li>
				<li class="order-1"><a href="#.">order now</a></li>
			  </ul>
			</div>
		  </li>
		  <li class="col-md-3 col-sm-6 col-xs-12">
			<div class="boxes">
			  <div class="pricing-table1-2"> Gold<strong>30 Days sample text</strong> </div>
			  <div class="main-unit">
				<div class="pricing-unit2">$</div>
				<div class="pricing-unit2-1">10</div>
				<div class="pricing-unit2-2">per <span class="pricing-unit2-3">mont</span></div>
				<div class="clearfix"></div>
			  </div>
			  <ul class="pricing-detail">
				<li class="plan-detail">300 GB</li>
				<li class="plan-detail">500 GB</li>
				<li class="plan-detail">2 Domains</li>
				<li class="plan-detail">5 Free</li>
				<li class="plan-detail1"><i class="fa fa-check" aria-hidden="true"></i></li>
				<li class="plan-detail"><i class="fa fa-times" aria-hidden="true"></i></li>
				<li class="order-2"><a href="#.">order now</a></li>
			  </ul>
			</div>
		  </li>
		  <li class="col-md-3 col-sm-6 col-xs-12">
			<div class="boxes">
			  <div class="pricing-table1-3"> Premium<strong>30 Days sample text</strong> </div>
			  <div class="main-unit">
				<div class="pricing-unit3">$</div>
				<div class="pricing-unit3-1">20</div>
				<div class="pricing-unit3-2">per <span class="pricing-unit3-3">mont</span></div>
				<div class="clearfix"></div>
			  </div>
			  <ul class="pricing-detail">
				<li class="plan-detail">300 GB</li>
				<li class="plan-detail">500 GB</li>
				<li class="plan-detail">2 Domains</li>
				<li class="plan-detail">5 Free</li>
				<li class="plan-detail1"><i class="fa fa-check" aria-hidden="true"></i></li>
				<li class="plan-detail1"><i class="fa fa-check" aria-hidden="true"></i></li>
				<li class="order-3"><a href="#.">order now</a></li>
			  </ul>
			</div>
		  </li>
		</ul>
	  </div>
	  <br/> <br/>
	</div>
	<!---end three-paln--> 
@endsection