@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\city;use App\Model\pricing;
@endphp
<style>
.overlay {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 25%;
  background-color: rgb(225, 225, 225);
  background-color: rgba(225, 225, 225, 0);
  overflow-y: hidden;
  transition: 0.5s;
}

.stepwizard-step p {
  margin-top: 10px;
}

.stepwizard-row {
  display: table-row;
}

.stepwizard {
  display: table;
  width: 100%;
  position: relative;
}

.stepwizard-step button[disabled] {
  opacity: 1 !important;
  filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
  top: 14px;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 100%;
  height: 1px;
  background-color: #ccc;
  z-order: 0;
}

.stepwizard-step {
  display: table-cell;
  text-align: center;
  position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
  
/* my code */
  pointer-events: none;
}

.modal-dialog {
  z-index: 9999;
  position: relative;
}

</style>
    
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <div class="pull-right">
                            <a onclick="loadPayment(this);" class="btn btn-primary"  title="Payment"><i class="ti-plus"></i> Add Payment</a>
                        </div>
                        <input type="text" class="form-control wide-width" placeholder="Search & type" />
                    </div>
                    <div class="card-body">    
                            <table class="table" id='tbl_payment'>
                                    <thead>
                                        <tr>
                                        <th scope="col">#No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Payer email</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>  
                                    @foreach ($payment as $key => $payments)
                                        <tr id="tr_payment{{$payments->id}}">
                                            <th scope="row">{{$key + 1}}</th>
                                            <td><a href="{{url('admin/payment/'.$payments->id.'/edit')}}"><strong>{{$payments->name}}</strong></a></td>
                                            <td>{{$payments->email}}</td>
                                            <td>{{$payments->amount}}</td>
                                            <td>{{$payments->created_at	}}</td>
                                            <td><b class="badge bg-success">{{$payments->status}}</b></td>
                                            <th>
                                                <a onclick="DeletePayment({{$payments->id}});" class="btn btn-danger"  title="Delete"><i class="ti-trash"></i></a>
                                            </th>
                                        </tr>
                                        @endforeach                                
                                    </tbody>
                                    </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="LoadModalPaymentModule" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="frmAddPayment">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" name="" val="" id="payment_id">
                        <div class="modal-header theme-bg">						
                            <h4 class="modal-title"> Payments</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                              <div class="row">
  
                                <div class="col-sm-5">
                                    <label>Package</label>
                                    <select class="form-control" required id="package_id" name="package_id">
                                        <option value="">  -- Please Select Package-- </option>
                                        @php $j = pricing::all(); @endphp
                                        @foreach ($j as $js)
                                             <option value="{{$js->id}}"> {{$js->package_name . ' ' . $js->price }} $ </option>
                                        @endforeach
                                    </select>
                                    <label>Bank Swift Code</label>
                                    <input name="swift_code" id="swift_code" type="text"  placeholder="" class="form-control">

                                    <label>Account Number *</label>
                                    <input name="account_number" id="account_number"  type="number" class="form-control">

                                    <label>Branch Name *</label>
                                    <input name="branch_name" id="branch_name"  type="text" class="form-control">

                                    <label>Branch Address *</label>
                                    <input name="branch_address" id="branch_address"  type="text" class="form-control">
                                    <label>Account Name *</label>
                                    <input name="account_name"   id="account_name" type="text" class="form-control">
                                   
                                </div>
    
                                <div class="col-sm-7">
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
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                            <input type="submit" class="btn btn-danger" value="Save">
                        </div>
                    </form>
                </div>
            </div>
          </div>
          <div id="Delete" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="#" id="frmDeletePayment">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <input type="hidden" value="" id="payment_id"/>
                            <div class="modal-header theme-bg">
                                <h4 class="modal-title"> Payment </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Do u want to delete this <b> Payment</b> ?</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                                <input type="submit" class="btn btn-danger" value="Yes">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
@section('scripts')
          <script src="/js/backend/payment.js"></script>
@endsection