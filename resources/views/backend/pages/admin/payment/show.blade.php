@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\city;use App\Model\country;
    $User = auth()->guard('admin')->user();
@endphp    
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h4><i class="fa fa-dollar" aria-hidden="true"></i> Check out payment Details</h4>
                    </div>
                    <div class="card-body"> 
    <div class="checkout-page py-5">
        <div class="container">
            <div class="row">
                    <table class="table">
                            <tr>
                                    <td><b> Name : </b></td>
                                    <td>{{$payment->name}}</td>
                            </tr> 
                            <tr>
                                    <td><b> Email : </b></td>
                                    <td>{{$payment->email}}</td>
                            </tr> 
                            <tr>
                                    <td><b> Amount : </b></td>
                                    <td>{{$payment->amount}}</td>
                            </tr> 
                            <tr>
                                    <td><b> Status : </b></td>
                                    <td>{{$payment->status}}</td>
                            </tr> 
                            <tr>
                                    <td><b> Bank Swift Code : </b></td>
                                    <td>{{$payment->bank_swift_code}}</td>
                            </tr> 
                            <tr>
                                    <td><b> Account Number : </b></td>
                                    <td>{{$payment->account_number}}</td>
                            </tr> 
                            <tr>
                                    <td><b> Branch Name : </b></td>
                                    <td>{{$payment->branch_name}}</td>
                            </tr> 
                            <tr>
                                    <td><b> Account Name  : </b></td>
                                    <td>{{$payment->account_name}}</td>
                            </tr> 
                            <tr>
                                    <td><b> Status : </b></td>
                                    <td><b class="badge bg-success">{{$payment->status}}</b></td>
                            </tr> 
                            <tr>
                                    <td><b> Created at  : </b></td>
                                    <td>{{$payment->created_at}}</td>
                            </tr> 
                            <tr>
                                @if ($User->role_id == 1)
                                   <td><input type="submit" class="btn btn-danger" value="Mark to Success"></td>  
                                @else
                                <td></td>
                                   @endif
                                  <td></td>
                            </tr>
                    </table>
                 
              
            </div>
           
        </div>
        <div class="modal-footer">
                <a class="btn btn-primary" href="{{ URL::previous() }}">Back</a>
                
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