@extends('backend.layouts.master')
@section('content')
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
                            <a href="#AddCompany"  data-toggle="modal" class="btn btn-blue manage-btn" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-plus"></i></a>
                        </div>
                        <input type="text" class="form-control wide-width" placeholder="Search & type" />
                    </div>
                    <div class="card-body">
                            <table class="table">
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
                                        <tr>
                                            <th scope="row">{{$key + 1}}</th>
                                            <td>{{$companies->company_name}}</td>
                                            <td>{{$companies->phone}}</td></td>
                                            <td>{{$companies->email}}</td>
                                            <th><input type="button" class="btn btn-primary" data-dismiss="modal" value="Edit">
                                                <input type="button" class="btn btn-danger" data-dismiss="modal" value="Delete">
                                            </th>
                                        </tr>
                                      @endforeach
                                  
                                    </tbody>
                                  </table>
                        <div class="flexbox padd-10">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <i class="ti-arrow-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <i class="ti-arrow-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
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
<!-- Send Message -->
<div id="AddCompany" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmCompany">
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
                                                        <input name="company_name" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Phone No.</label>
                                                        <input name="phone" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Email</label>
                                                        <input name="email" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Website Link</label>
                                                        <input name="website_link" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Address</label>
                                                        <input name="address" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>City</label>
                                                        <?php use App\Model\city;use App\Model\country;$city = city::all(); ?>
                                                        <select name="city_id" class="form-control">
                                                            @foreach( $city as $cities)
                                                              <option value="{{$cities->id}}">{{$cities->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>State</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Country</label>
                                                        <?php $country = country::all(); ?>
                                                        <select class="form-control" name="country_id">
                                                            @foreach( $country as $countries)
                                                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                        
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Zip Code</label>
                                                        <input name="zip_code"  type="text" class="form-control">
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
                                                        <input name="facebook_link" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-google-plus mrg-r-5"></i>Google +</label>
                                                        <input name="google_link" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-twitter mrg-r-5"></i>Twitter</label>
                                                        <input name="twitter_link" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-linkedin mrg-r-5"></i>LinkedIn</label>
                                                        <input name="linkedIn_link" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-pinterest mrg-r-5"></i>Pinterest</label>
                                                        <input name="pinterest_link" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label><i class="fa fa-instagram mrg-r-5"></i>Instagram</label>
                                                        <input name="instagram_link" type="text" class="form-control">
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
                     $("#frmCompany").validate({
                            rules: {
                                company_name: {
                                required: true,
                            },
                            email : {
                                required : true
                            }
                        },submitHandler: function(e) 
                        {
                                alert("ok");
                        }
                    });
            </script>
    @endsection