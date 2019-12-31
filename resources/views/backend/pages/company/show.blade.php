@extends('backend.layouts.master')
@section('content')
<style>
        .skill_id_edit{
        width: 100% !important;
        padding: 0;
    }
    .select2-container {
        width: 100% !important;
        padding: 0;
    }
    </style>    
    <div class="container-fluid">
    <!-- /row -->
    <div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
    
            <div class="card-header">
               <h3> Company Details : <strong>{{$company->company_name}}</strong></h3>
            </div>
            <form  id="frmEditModalVacancy">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="vacancy_id_edit">
            <div class="card-body">
                <table class="table">
                                                                   
                    <tr>
                      <td><b>Company Name : </b></td>
                      <td>{{$company->company_name}} </td>
                    </tr>
                    <tr>
                      <td><b>Email  : </b></td>
                      <td>{{$company->email}}</td>
                    </tr>
                    <tr>
                        <td><b>Zip Code  : </b></td>
                        <td>{{$company->zip_code}}</td>
                    </tr>
                    <tr>
                        <td><b> State : </b></td>
                        <td>{{$company->state}}</td>
                    </tr>
                    <tr>
                        <td><b> Phone : </b></td>
                        <td>{{$company->phone}}</td>
                    </tr>
                    <tr>
                        <td><b> Address : </b></td>
                        <td>{{$company->address}}</td>
                    </tr>
                    <tr>
                        <td><b> WebSite : </b></td>
                        <td>{{$company->website_link}}</td>
                    </tr>
                    <tr>
                        <td><b> Facebook Link : </b></td>
                        <td>{{$company->facebook_link}}</td>
                    </tr>
                    <tr>
                        <td><b> Company Logo : </b></td>
                        @if ($company->company_logo)
                             <td><img width="100px" height="100px" src="{{url('/uploads/UserCv/'.$company->company_logo)}}" alt=""> </td>
                        @else
                             <span> -- No Image FOund -- </span>  
                        @endif
                        
                    </tr>
                  
                    <tr>
                            <td colspan="2"><b>Company Profiles :   <br/><br/></b>{{$company->company_profile}}</td>
                    </tr>
                       
                    
                 
                  
                  </table>
                
                  <div class="modal-footer">
                    <a class="btn btn-primary" href="{{ URL::previous() }}">Back</a>
            </div>       
            </div>
    </div>
    </div>
    <!-- /row -->
    </div>
    </div>

@endsection
@section('scripts')
         <script src="/js/backend/vacancy.js"></script>
@endsection