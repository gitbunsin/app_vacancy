@extends('backend.layouts.master')
@section('content')
    <form action="{{url('admin/company')}}" id='myform' method='post'>
        {{ csrf_field() }}
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <!-- General Company Information  -->
                <div class="card">
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
                </div>

                <!-- Social Accounts -->
                <div class="card">

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
                <div class="text-center">
                    <button type="submit" class="btn btn-m btn-success">Submit & Exit</button>
                </div>

            </div>
        </div>
        <!-- /row -->
    </div>
    </div>
</form>
    <!-- /#page-wrapper -->
@endsection

