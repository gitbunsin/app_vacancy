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
								<li><i class="fa fa-check" aria-hidden="true"></i>Dashboard access to manage</li>
								<li><i class="fa fa-check" aria-hidden="true"></i>Package Duration : 1/ Month</li>
								<li><i class="fa fa-times" aria-hidden="true"></i>No Premium Job Post</li>
								<li><i class="fa fa-times" aria-hidden="true"></i>limited Regular Job Post</li>
								<li><i class="fa fa-times" aria-hidden="true"></i>limited Applicants</li>

								<li><i class="fa fa-times" aria-hidden="true"></i>No support available</li>
								<li><i class="fa fa-times" aria-hidden="true"></i>1 Job Post</li>
							</ul>
							<a href="#" class="btn btn-primary">Purchas Package</a>
						</div>
					</div><!-- /.price -->
				</div>
				@foreach($packages as $package)
					<div class="col-md-6 col-lg-4">
						<div class="pricing">
							<div class="most-popular">
								<span>Premium</span>
							</div>
							<span>{{$package->package_name}}</span>
							<h1><sup>$</sup>{{$package->price}}</h1>
							<div class="pricing-list">
								<ul class="tr-list">
									<li><i class="fa fa-check" aria-hidden="true"></i>Package : {{$package->package_name}}</li>
									<li><i class="fa fa-check" aria-hidden="true"></i>{{$package->premium_job}} Premium Jobs Post </li>
									<li><i class="fa fa-check" aria-hidden="true"></i>Package Duration : 3 / Month</li>
									<li><i class="fa fa-check" aria-hidden="true"></i>Sell Unlimited Products</li>
									<li><i class="fa fa-check" aria-hidden="true"></i>Mobile-Optimized Website</li>
									<li><i class="fa fa-check" aria-hidden="true"></i>Unlimited Regular Job Post</li>
									<li><i class="fa fa-check" aria-hidden="true"></i>Unlimited Applicants</li>
									<li><i class="fa fa-times" aria-hidden="true"></i>E-Mail support available</li>
								</ul>
								<a href="#" class="btn btn-primary">Purchas Package</a>
							</div>
						</div><!-- /.price -->
					</div>
				@endforeach
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.tr-pricing -->

    @endsection