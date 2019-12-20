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
                        <h5>Check out payment</h5>
                    </div>
                    <div class="card-body"> 
    <div class="checkout-page py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h3>@lang('app.checkout')</h3>
                </div>
            </div>
        </div>
    </div>


    <div class="checkout-page bg-white py-5">

        @php
        $user = auth()->guard('admin')->user();
        @endphp

        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="checkout-form pt-3 pb-5">
                        <form method="get" action="{{url('/admin/confim/payment/'.$user->id)}}">
                            @csrf

                        <p></p>
                        <h4>Package: {{$package->package_name}}</h4>
                        <p>@lang('app.premium_job') : {{$package->premium_job}}</p>
                        <p class="text-success">@lang('app.price') : <b>$</b> {{ number_format($package->price, 2) }}</p>


                        <h4 class="my-5 text-muted">Choose your gateway</h4>

                        <div class="checkout-gateways-wrap">
                            <div class="custom-radio">
                                <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck" checked="">
                                <label for="noCheck">@lang('app.bank_transfer')</label>
                            </div>
                        </div>
                       
                        <div class="pull-right">
                            <a href="{{ URL::previous() }}" class="btn btn-danger">Back</a>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


                           
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection