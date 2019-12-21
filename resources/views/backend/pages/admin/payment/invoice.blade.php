@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\city;use App\Model\country;
@endphp    
<div class="container-fluid">
    <!-- /row -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
            
                <div class="card-header">
                    <h4>View Invoice</h4>
                </div>
                
                <div class="card-body">    
                    <form method="post" action="{{url('admin/payment')}}">  
                        {{ csrf_field() }}          
                    <div class="row mrg-0">
                        <div class="col-md-6">
                            <div id="logo"><img src="assets/img/logo.png" class="img-responsive" alt=""></div>
                        </div>

                        <div class="col-md-6">	
                            <p id="invoice-info">
                                <strong>Order:</strong> #7075872 <br>
                                <strong>Issued:</strong> 17/10/2017 <br>
                                Due 7 days from date of issue
                            </p>
                        </div>
                        
                    </div>
                    
                    <div class="row  mrg-0 detail-invoice">
                    
                        <div class="col-md-12">
                            <h2>INVOICE</h2>
                        </div>
                        @php
                             $user = auth()->guard('admin')->user();
                        @endphp
                        <div class="col-md-12">
                            <div class="row">
                              <div class="col-lg-7 col-md-7 col-sm-7">
                              
                                <h4>Supplier: </h4>
                                <h5>{{$user->name}}</h5>
                                <p>
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1b72757d745b7c77746d727a35787476">{{$user->email}}</a><br />
                                    
                                    0962711117<br />
                                    
                                    780/77 , Lane Here, Cambodia,
                                    <br /> 
                                </p>
                                
                              </div>
                              <div class="col-lg-5 col-md-5 col-sm-5">
                                <h4>Client Contact :</h4>
                                <h5>Bunsin Toeng</h5>
                                <p>
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5526342027342338343c396d62153238343c397b363a38">bunsin.toeng@gmail.com</a><br />
                                    
                                    +885 962711117<br />
                                    
                                    780/77 , Gurudwara Chauk, Cambodia,
                                    <br /> 
                                </p>
                              </div>
                            </div>
                        </div>
                        <hr />
                        
                        <div class="col-12 col-md-12">
                            <strong>ITEM DESCRIPTION & DETAILS :</strong>
                        </div>
                        <hr>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="invoice-table">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Project</th>
                                                <th>Time</th>
                                                <th>Team</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         {{-- @foreach ($packages as $key =>  $package)  --}}
                                            <tr>
                                                <td>1</td>
                                                <td>{{$package->package_name}}</td>
                                                <td>1 Month</td>
                                                <td>{{ number_format($package->price, 2) }}</td>
                                                <td>{{ number_format($package->price, 2) }} USD</td>
                                            </tr>
                                        </tbody>
                                        {{-- @endforeach --}}
                                    </table>
                                </div>
                                <hr>
                                <div>
                                    <h5>Total : {{ number_format($package->price, 2) }} USD </h5>
                                </div>
                                <hr>
                                <div>
                                    <h5>Taxes : {{ number_format($package->price, 2) }} USD </h5>
                                </div>
                                <hr>
                                <div>
                                    <h4>Bill Amount : {{ number_format($package->price, 2) }} USD </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a href="{{ URL::previous() }}" class="btn btn-danger">Back</a>
                        <input type="submit" class="btn btn-primary" value="Agree">
                    </div>
                </form>    
                </div>
            
            </div>
        </div>
    </div>
    <!-- /row -->
</div>	
@endsection