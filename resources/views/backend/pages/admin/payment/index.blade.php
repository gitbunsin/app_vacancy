@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\city;use App\Model\country;
@endphp
<style>

        .error {
            color : red;
        }
</style>
    
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <div class="pull-right">
                            <a href="{{url('admin/payment/create')}}" class="btn btn-primary"  title="Payment"><i class="ti-plus"></i> Add Payment</a>
                        </div>
                        <input type="text" class="form-control wide-width" placeholder="Search & type" />
                    </div>
                    <div class="card-body"> 
                        
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection