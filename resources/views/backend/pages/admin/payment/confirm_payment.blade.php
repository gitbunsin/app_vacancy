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
                            <form method="get" action="{{url('admin/invoice/'. 1)}}">
                                <div class="row">
  
                                    <div class="col-sm-6">
                                        <label>Bank Swift Code</label>
                                        <input name="swift_code" id="swift_code" type="text" required placeholder="" class="form-control">

                                        <label>Account Number *</label>
                                        <input name="account_number" id="account_number" required type="number" class="form-control">

                                        <label>Branch Name *</label>
                                        <input name="branch_name" id="branch_name" required type="text" class="form-control">

                                        <label>Branch Address *</label>
                                        <input name="branch_address" id="branch_address" required type="text" class="form-control">
                                        <label>Account Name *</label>
                                        <input name="account_name" required  id="account_name" type="text" class="form-control">
                                        <label>IBAN</label>
                                        <input name="iban" id="iban" required type="text" class="form-control">
                                    </div>
        
                                    <div class="col-sm-6">
                                        <h4>@lang('app.bank_payment_instruction')</h4>

                            <table class="table">
                                <tr>
                                    <th>@lang('app.bank_swift_code')</th>
                                    <td>ACLBKHPP</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.account_number')</th>
                                    <td>4286 0900 1133 2861</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.branch_name')</th>
                                    <td>Phnom Penh</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.branch_address')</th>
                                    <td>#148 Preah Sihanouk Blvd,  </td>
                                </tr>
                                <tr>
                                    <th>@lang('app.account_name')</th>
                                    <td>Bunsin Toeng</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.iban')</th>
                                    <td>AL35202111090000000001234567</td>
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