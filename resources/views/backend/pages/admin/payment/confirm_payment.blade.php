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
      @php
      $user = auth()->guard('admin')->user();
      @endphp
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">

                    <div class="card-header">
                      
                       <h5><i class="fa fa-bank mrg-r-5"></i> Cofirm Billing Payment</h5>
                    </div>
                    <div class="card-body"> 
                            <form method="get" action="{{url('admin/invoice/'. $user->id)}}">
                                <div class="row">
  
                                    <div class="col-sm-6">
                                        <label>Bank Swift Code</label>
                                        <input name="facebook_link" type="text" class="form-control">

                                        <label>Account Number *</label>
                                        <input name="google_link" type="text" class="form-control">

                                        <label>Branch Name *</label>
                                        <input name="twitter_link" type="text" class="form-control">

                                        <label>Branch Address *</label>
                                        <input name="linkedIn_link" type="text" class="form-control">
                                        <label>Account Name *</label>
                                        <input name="pinterest_link" type="text" class="form-control">
                                        <label>IBAN</label>
                                        <input name="instagram_link" type="text" class="form-control">
                                    </div>
        
                                    <div class="col-sm-6">
                                        <h4>@lang('app.bank_payment_instruction')</h4>

                            <table class="table">
                                <tr>
                                    <th>@lang('app.bank_swift_code')</th>
                                    <td>@lang('app.bank_swift_code')</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.account_number')</th>
                                    <td>@lang('app.account_number')</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.branch_name')</th>
                                    <td>@lang('app.branch_name')</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.branch_address')</th>
                                    <td>@lang('app.branch_address')</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.account_name')</th>
                                    <td>@lang('app.account_name')</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.iban')</th>
                                    <td>@lang('app.iban')</td>
                                </tr>
                            </table>
                                    </div>

                                </div>
                                <div class="pull-right">
                                    <a href="{{ URL::previous() }}" class="btn btn-danger">Back</a>
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                    </div>
                </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection