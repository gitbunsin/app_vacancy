@extends('backend.layouts.master')
@section('content')
<style>
    /* Tr Pricing */

.pricing {
    background-color: #fff;
    padding: 40px 30px;
    color: #000;
    border-radius: 4px;
    margin-bottom: 15px;
    position: relative;	
    overflow: hidden;
}

.pricing>span {
	font-size: 20px;
	display: block;
}

.pricing h1 {
    font-size: 60px;
    margin: 0 0 50px;
}

.pricing h1 sup {
    font-size: 30px;
    font-weight: 500;
    top: -25px;	
}

.pricing h1 span {
	font-size: 14px;
	color: #000;
}

.pricing-list li {
	font-size: 14px;
	margin-bottom: 20px;
	text-transform: capitalize;
}

.pricing-list li i {
	color: #008def;
	margin-right: 20px;
}

.pricing-list li i.fa-times {
	color: #dfdfdf;
}

.pricing .btn.btn-primary {
	color: #fff;
	padding: 8px 20px;
	margin-top: 30px;
	text-transform: capitalize;
	background-color: #253b4b;
	border-color: #253b4b;
}

.pricing .btn.btn-primary:before {
	background-color: #008def;
}

.pricing .btn.btn-primary:hover {
	border-color: #008def;
}

.pricing .most-popular {
    position: absolute;
    top: 25px;
    right: -60px;
}

.pricing .most-popular span {
	color: #fff;
	display: block;
	font-size: 14px;
	padding: 10px 70px;
	background-color: #008def;
	-webkit-transform:rotate(40deg) ;
	-moz-transform:rotate(40deg) ;
	-ms-transform:rotate(40deg) ;
	-o-transform:rotate(40deg) ;
	transform:rotate(40deg) ;
}
</style>
{{-- <link href="{{asset('css/main.css')}}" rel="stylesheet"> --}}
    <form action="{{url('admin/company')}}" id='myform' method='post'>
        {{ csrf_field() }}
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <!-- General Company Information  -->
                <div class="card">
                    <div class="card-header">
                        <h4>Company Payment</h4>
                    </div>
                    <div class="card-body">
                          
                            <div class="tr-breadcrumb bg-image section-before">
                                    <div class="container">
                                        <div class="breadcrumb-info text-center">
                                            <div class="page-title">
                                                <h1> Our Packages</h1>
                                            </div>		
                                        </div>
                                    </div><!-- /.container -->
                                </div><!-- /.tr-breadcrumb -->
                                <div class="tr-pricing section-padding">
                                    {{-- <div class="container"> --}}
                                        {{-- <div class="row"> --}}
                                            {{-- <div class="col-lg-12"> --}}
                                            <div class="col-lg-4">
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
                                                            <a href="{{url('admin/payment/'.$package->id)}}" class="btn btn-primary">Purchas Package</a>
                                                        </div>
                                                    </div><!-- /.price -->
                                                </div>
                                            @endforeach
                                        </div><!-- /.row -->
                                    {{-- </div> --}}
                                    {{-- </div><!-- /.container --> --}}
                                </div><!-- /.tr-pricing -->
                    {{-- </div> --}}
            </div>
        </div>
        <!-- /row -->
    </div>
    </div>
</form>
    <!-- /#page-wrapper -->
@endsection

