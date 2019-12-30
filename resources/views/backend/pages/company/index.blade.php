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
                            <a class="btn btn-primary" onclick="myfunc()" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-plus"></i></a>
                        </div>
                        <input type="text" class="form-control wide-width" placeholder="Search & type" />
                    </div>
                    <div class="card-body">
                            <table class="table" id='company_id'>
                                    <thead>
                                      <tr>
                                        <th scope="col">#No</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>  
                                    @foreach ($company as $key => $companies)
                                        <tr id="tbl_company{{$companies->id}}">
                                            <th scope="row">{{$key + 1}}</th>
                                            <td style="color:red;"><a href=""><strong>{{$companies->company_name}}</strong></a></td>
                                            <td>{{$companies->phone}}</td></td>
                                            <td>{{$companies->email}}</td>
                                            <th>
                                                <a onclick="Edit({{$companies->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                <a onclick="Delete({{$companies->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                            </th>
                                        </tr>
                                      @endforeach
                                  
                                    </tbody>
                                  </table>
                        <div class="flexbox padd-10">
                            <ul class="pagination">
                                <li class="page-item">
                                        {{ $company->links() }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    </div>
    <!-- /#page-wrapper -->
 <!-- /#Delete -->
 <div id="Delete" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmCompanyDelete">
                    <input type="hidden" name="" val="" id="id">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title">Company</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h5> Do you want to delete this company ? </h5>
                    </div>
                    <div class="modal-footer">
                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="No">
                            <input type="submit" class="btn btn-success" value="Yes">
                    </div>
                </form>
            </div>
        </div>
 </div>
 <!-- Edit Company -->
 <div id="EditCompany" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmCompanyEdit">
                    <input type="hidden" name="" val="" id="id_edit">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title">Update Company</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <!-- General Company Information  -->
                                        {{-- <div class="card"> --}}
                                            <div class="card-header">
                                                <h4>Company Address</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Company Name</label>
                                                        <input  name="company_name_edit" id="company_name_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Phone No.</label>
                                                        <input name="phone_edit" id="phone_edit" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Email</label>
                                                        <input name="email_edit" id="email_edit" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Website Link</label>
                                                        <input name="website_link_edit" id="website_link_edit" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Address</label>
                                                        <input name="address_edit" id="address_edit" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>City</label>
                                                        <?php $city = city::all(); ?>
                                                        <select name="city_id_edit" id="city_id_edit" class="form-control">
                                                            @foreach( $city as $cities)
                                                              <option value="{{$cities->id}}">{{$cities->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>State</label>
                                                        <input type="text" name="state_edit" id="state_edit" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Country</label>
                                                        <?php $country = country::all();?>
                                                        <select class="form-control" id="country_id_edit" name="country_id_edit">
                                                            @foreach( $country as $countries)
                                                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Zip Code</label>
                                                        <input id="zip_code_edit" name="zip_code_edit"  type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Social Accounts -->
                                            <div class="card-header">
                                                <h4>Social Accounts</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-facebook mrg-r-5"></i>Facebook</label>
                                                        <input name="facebook_link_edit" id="facebook_link_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-google-plus mrg-r-5"></i>Google +</label>
                                                        <input name="google_link_edit" id="google_link_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-twitter mrg-r-5"></i>Twitter</label>
                                                        <input name="twitter_link_edit" id="twitter_link_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-linkedin mrg-r-5"></i>LinkedIn</label>
                                                        <input name="linkedIn_link_edit" id="linkedIn_link_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-pinterest mrg-r-5"></i>Pinterest</label>
                                                        <input name="pinterest_link_edit" id="pinterest_link_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-instagram mrg-r-5"></i>Instagram</label>
                                                        <input name="instagram_link_edit" id="instagram_link_edit" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>	
                    </div>
                    <div class="modal-footer">
                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="No">
                            <input type="submit" class="btn btn-success" value="Yes">
                    </div>
                </form>
            </div>
        </div>
 </div>
<!-- Send Message -->
<div id="AddCompany" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmCompany">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title">Create Company</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <!-- General Company Information  -->
                                        {{-- <div class="card"> --}}
                                            <div class="card-header">
                                                <h4>Company Address</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Company Name</label>
                                                        <input  name="company_name" id="company_name" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Phone No.</label>
                                                        <input name="phone" id="phone" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Email</label>
                                                        <input name="email" id="email" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Website Link</label>
                                                        <input name="website_link" id="website_link" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Address</label>
                                                        <input name="address" id="address" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>City</label>
                                                        <?php $city = city::all(); ?>
                                                        <select class="form-control">
                                                            {{-- @foreach( $city as $cities)
                                                              <option value="{{$cities->id}}">{{$cities->name}}</option>
                                                            @endforeach --}}
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>State</label>
                                                        <input type="text" name="state" id="state" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Country</label>
                                                        <?php //$country = country::all(); ?>
                                                        <select class="form-control">
                                                            {{-- @foreach( $country as $countries)
                                                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                            @endforeach --}}
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Zip Code</label>
                                                        <input id="zip_code" name="zip_code"  type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Social Accounts -->
                                            <div class="card-header">
                                                <h4>Social Accounts</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-facebook mrg-r-5"></i>Facebook</label>
                                                        <input name="facebook_link" id="facebook_link" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-google-plus mrg-r-5"></i>Google +</label>
                                                        <input name="google_link" id="google_link" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-twitter mrg-r-5"></i>Twitter</label>
                                                        <input name="twitter_link" id="twitter_link" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-linkedin mrg-r-5"></i>LinkedIn</label>
                                                        <input name="linkedIn_link" id="linkedIn_link" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-pinterest mrg-r-5"></i>Pinterest</label>
                                                        <input name="pinterest_link" id="pinterest_link" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-instagram mrg-r-5"></i>Instagram</label>
                                                        <input name="instagram_link" id="instagram_link" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>	
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
            <script src="/js/backend/company.js"></script>
    @endsection