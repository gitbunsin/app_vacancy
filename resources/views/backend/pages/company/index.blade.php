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
                                            <td>{{$companies->company_name}}</td>
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
                                                        <?php //$city = city::all(); ?>
                                                        <select name="city_id_edit" id="city_id_edit" class="form-control">
                                                            {{-- @foreach( $city as $cities)
                                                              <option value="{{$cities->id}}">{{$cities->name}}</option>
                                                            @endforeach --}}
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>State</label>
                                                        <input type="text" name="state_edit" id="state_edit" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Country</label>
                                                        <?php //$country = country::all(); ?>
                                                        <select class="form-control" id="country_id_edit" name="country_id_edit">
                                                            {{-- @foreach( $country as $countries)
                                                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                            @endforeach --}}
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
                                                        <?php //$city = city::all(); ?>
                                                        <select name="city_id" id="city_id" class="form-control">
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
                                                        <select class="form-control" id="country_id" name="country_id">
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
            <script>
                function Edit(id){
                    $('#id_edit').val(id);
                    $.ajax({
                            type: "GET",
                            url: "/admin/company" + "/" + id + "/edit",
                            success: function(data)
                            {
                               // console.log(data);
                                $('#EditCompany').modal('show');
                                $('#company_name_edit').val(data.company_name);
                                $('#phone_edit').val(data.phone);
                                $('#email_edit').val(data.email);
                                $('#address_edit').val(data.address);
                                $('#zip_code_edit').val(data.zip_code);
                                $('#state_edit').val(data.state);
                                $('#phone_edit').val(data.phone);
                                $('#website_link_edit').val(data.website_link);
                                $('#facebook_link_edit').val(data.facebook_link);
                                $('#google_link_edit').val(data.google_link);
                                $('#twitter_link_edit').val(data.twitter_link);
                                $('#linkedIn_link_edit').val(data.linkedIn_link);
                                $('#pinterest_link_edit').val(data.pinterest_link);
                                $('#instagram_link_edit').val(data.instagram_link);
                                
                            },error : function(err){
                                console.log(err)
                            }
                        });
                }

                 function Delete(id){
                     $('#id').val(id);
                     $('#Delete').modal('show');
                 }

                 $('#frmCompanyDelete').validate({

                    submitHandler: function(form) 
                        {
                            var id = $('#id').val();
                            jQuery.ajax({
                                    url: "/admin/company" + '/' + id,
                                    method: 'Delete',
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        "id" : id
                                    },success : function(response)
                                    {
                                        //console.log(response.id);
                                       $('#Delete').modal('hide');
                                       $('#tbl_company'+response.id).remove();
                                       toastr.success('Success','Company has been deleted !');
                                    }
                                });
                        }
                 });


                 function myfunc() {
                    $("#frmCompany").trigger("reset");
                           // $(this).find('form')[0].reset();
                            $('#AddCompany').modal('show');
                            $("#frmCompany").trigger('reset');
                    }

                   //Edit Company 
                    $("#frmCompanyEdit").validate({
                            rules: {
                                company_name_edit: {
                                required: true,
                            },
                            email_edit : {
                                required : true
                            }
                        },submitHandler: function(form) 
                        {
                            var id = $('#id_edit').val();
                            jQuery.ajax({
                                    url: "/admin/company" + "/" + id,
                                    method: 'PUT',
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        "company_name": $('#company_name_edit').val(),
                                        "phone" : $('#phone_edit').val(),
                                        "zip_code" : $('#zip_code_edit').val(),
                                        "email" : $('#email_edit').val(),
                                        'address' : $('#address_edit').val(),
                                        'website_link' : $('#website_link_edit').val(),
                                        'city_id' : $('#city_id_edit').val(),
                                        'state' : $('#state_edit').val(),
                                        'country_id' : $('#country_id_edit').val(),
                                        'twitter_link' : $('#twitter_link_edit').val(),
                                        'google_link' : $('#google_link_edit').val(),
                                        'facebook_link' : $('#facebook_link_edit').val(),
                                        'pinterest_link' : $('#pinterest_link_edit').val(),
                                        'instagram_link' : $('#instagram_link_edit').val(),
                                        'linkedIn_link' : $('#linkedIn_link_edit').val(),
                                    },
                                    success: function(result){
                                    //    console.log(result);
              $('#EditCompany').modal('hide');
              var company = '<tr id="tbl_company' + result.id + '"><th class="scope="row">' + result.id + '</><td>' + result.company_name + '</td><td>' + result.phone + '</td><td>' + result.email + '</td>';
                company += '<th><a onclick="Edit(' +  result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>  <a onclick="Delete(' +  result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a></th></tr>';
              $("#tbl_company" + result.id).replaceWith(company);
                                        toastr.success('Success','Company has been updated !');
                                    },error : function(err){
                                        console.log(err);
                                    }
                                });
                        }
                    });
            
                     $("#frmCompany").validate({
                            rules: {
                                company_name: {
                                required: true,
                            },
                            email : {
                                required : true
                            }
                        },submitHandler: function(form) 
                        {
                            jQuery.ajax({
                                    url: "{{ url('admin/company')}}",
                                    method: 'POST',
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        "company_name": $('#company_name').val(),
                                        "phone" : $('#phone').val(),
                                        "zip_code" : $('#zip_code').val(),
                                        "email" : $('#email').val(),
                                        'address' : $('#address').val(),
                                        'website_link' : $('#website_link').val(),
                                        'city_id' : $('#city_id').val(),
                                        'state' : $('#state').val(),
                                        'country_id' : $('#country_id').val(),
                                        'twitter_link' : $('#twitter_link').val(),
                                        'google_link' : $('#google_link').val(),
                                        'facebook_link' : $('#facebook_link').val(),
                                        'pinterest_link' : $('#pinterest_link').val(),
                                        'instagram_link' : $('#instagram_link').val(),
                                        'linkedIn_link' : $('#linkedIn_link').val(),
                                    },
                                    success: function(result){
                                       console.log(result);
                                        $("#frmCompany").trigger('reset');
                                        $('#AddCompany').modal('hide');
              var user = '<tr id="tbl_company' + result.id + '"><th class="scope="row">' + result.id + '</><td>' + result.company_name + '</td><td>' + result.phone + '</td><td>' + result.email + '</td>';
              user += '<th><a onclick="Edit(' +  result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Company"><i class="icon-edit"></i></a>  <a onclick="Delete(' +  result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-trash"></i></a></th></tr>';
              $('#company_id').append(user);
                                        toastr.success('Success','Company has been created !');
                                    },error : function(err){
                                        console.log(err);
                                    }
                                });
                                }
                            });
            </script>
    @endsection