@extends('frontend.layouts.template')
@section('content')
<div class="tr-breadcrumb bg-image section-before">
		<div class="container">
			<div class="breadcrumb-info text-center">
				<div class="page-title">
					<h1> Our Packages</h1>
				</div>		
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">Packages</li>
				</ol>			
			</div>
		</div><!-- /.container -->
	</div><!-- /.tr-breadcrumb -->

	<div class="tr-pricing section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-4">
					<div class="pricing">
						<span>Free Package</span>
						<h1><sup>$</sup>0<span>/Per Month</span></h1>
						<div class="pricing-list">
							<ul class="tr-list">
                                <li><i class="fa fa-check" aria-hidden="true"></i>Package : Free Package </li>
								<li><i class="fa fa-check" aria-hidden="true"></i>Can Post Vacancy : 15 days</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>Package Duration : 1/ Month</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>Sell Unlimited Products</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>Mobile-Optimized Website</li>
								<li><i class="fa fa-times" aria-hidden="true"></i>Free Custom Domain</li>
								<li><i class="fa fa-times" aria-hidden="true"></i>24/7 Customer Support</li>
								<li><i class="fa fa-times" aria-hidden="true"></i>3% Sales Transaction Fee</li>
							</ul>
							<a href="#" class="btn btn-primary">Buy Now</a>
						</div>
					</div><!-- /.price -->
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="pricing">
						<div class="most-popular">
							<span>Popular</span>
						</div>
						<span>Silver Package</span>
						<h1><sup>$</sup>19<span>/Per Month</span></h1>
						<div class="pricing-list">
							<ul class="tr-list">
                                <li><i class="fa fa-check" aria-hidden="true"></i>Package : Silver Package </li>
                                <li><i class="fa fa-check" aria-hidden="true"></i>Can Post Vacancy : 3 </li>
                                <li><i class="fa fa-check" aria-hidden="true"></i>Package Duration : 3 / Month</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>Sell Unlimited Products</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>Mobile-Optimized Website</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>Free Custom Domain</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>24/7 Customer Support</li>
								<li><i class="fa fa-times" aria-hidden="true"></i>3% Sales Transaction Fee</li>
							</ul>
							<a href="#" class="btn btn-primary">Buy Now</a>
						</div>
					</div><!-- /.price -->
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="pricing">
						<span>Gold Package</span>
						<h1><sup>$</sup>39<span>/Per Month</span></h1>
						<div class="pricing-list">
							<ul class="tr-list">
                                <li><i class="fa fa-check" aria-hidden="true"></i>Package : Gold Package</li>
                                <li><i class="fa fa-check" aria-hidden="true"></i>Can Post Vacancy : 5 </li>
                                <li><i class="fa fa-check" aria-hidden="true"></i>Package Duration : 5 / Month</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>Sell Unlimited Products</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>Mobile-Optimized Website</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>Free Custom Domain</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>24/7 Customer Support</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>3% Sales Transaction Fee</li>
							</ul>
							<a href="#" class="btn btn-primary">Buy Now</a>
						</div>
					</div><!-- /.price -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.tr-pricing -->

    @endsection