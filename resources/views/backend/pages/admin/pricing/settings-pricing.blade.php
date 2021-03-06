@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\pricing;
@endphp
<div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf
            
                                @php
                                $package1 = pricing::find(1);
                                $package1 = $package1 ? $package1->toArray() : $package1;
                                
            
                                $package2 = pricing::find(2);
                                $package2 = $package2 ? $package2->toArray() : $package2;
                                // dd($package2);
                                @endphp
            
                                <legend>Silver Package</legend>
                                <div class="form-group row">
                                    <label for="package_name" class="col-sm-4 control-label">@lang('app.package_name')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="package_name" value="{{array_get($package1, 'package_name')}}" name="package[1][package_name]" placeholder="@lang('app.package_name')">
                                    </div>
                                </div>
            
                                <div class="form-group row">
                                    <label for="price" class="col-sm-4 control-label">@lang('app.price')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="price" value="{{array_get($package1, 'price')}}" name="package[1][price]" placeholder="@lang('app.price')">
                                    </div>
                                </div>
            
                                <div class="form-group row">
                                    <label for="premium_job" class="col-sm-4 control-label">@lang('app.premium_job')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="premium_job" value="{{array_get($package1, 'premium_job')}}" name="package[1][premium_job]" placeholder="@lang('app.premium_job')">
                                    </div>
                                </div>
            
                                <legend>Gold Package</legend>
                                <div class="form-group row">
                                    <label for="package_name" class="col-sm-4 control-label">@lang('app.package_name')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="package_name" value="{{array_get($package2, 'package_name')}}" name="package[2][package_name]" placeholder="@lang('app.package_name')">
                                    </div>
                                </div>
            
                                <div class="form-group row">
                                    <label for="price" class="col-sm-4 control-label">@lang('app.price')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="price" value="{{array_get($package2, 'price')}}" name="package[2][price]" placeholder="@lang('app.price')">
                                    </div>
                                </div>
            
                                <div class="form-group row">
                                    <label for="premium_job" class="col-sm-4 control-label">@lang('app.premium_job')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="premium_job" value="{{array_get($package2, 'premium_job')}}" name="package[2][premium_job]" placeholder="@lang('app.premium_job')">
                                    </div>
                                </div>
            
            
                                <div class="form-group row row">
                                    <label class="col-sm-4"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" id="pricing_save_btn" class="btn btn-primary"> <i class="la la-save"></i> @lang('app.save_package')</button>
                                    </div>
                                </div>
            
                            </form>
            
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection