@extends('backend.layouts.master')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-right">
                            <a  onclick="showLocation(this);"  href="#"  class="btn btn-success manage-btn" data-toggle="tooltip" data-placement="top" title="Create Location"><i class="ti-plus"></i></a>
                        </div>
                        <input type="text" class="form-control wide-width" placeholder="Search & type" />
                    </div>
                    <div class="card-body" id="jobCategory_id">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#No</th>
                                <th scope="col">Name </th>
                                <th scope="col">City</th>
                                <th scope="col">Country</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Number of Employee</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody id="location_list" name="location_list">
                            @if(!$location->isEmpty())
                                @foreach($location as $key => $locations)
                                <tr id="location_id{{$locations->id}}">
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$locations->name}}</td>
                                    <td>{{$locations->city->name}}</td>
                                    <td>{{$locations->country->name}}</td>
                                    <td>{{$locations->phone}}</td>
                                    <td></td>
                                    <td>
                                        <a href="#" onclick="EditLocation({{$locations->id}});"  class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                        <a href="#" onclick="DeleteLocation({{$locations->id}});" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-close"></i></a>
                                    </td>
                                </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="DeleteCategory" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmJobCategory">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="jobCategory_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Location </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Do u want to delete this  ?</label>
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

    <!-- Edit Job Title -->
    <div id="showEditLocation" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="#" id="frmEditLocation">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="edit_id"/>
                    <input type="hidden" name="no" id="no" value=""/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Edit Location</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name_edit" id="name_edit" class="form-control"/>
                                            </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>Country</label>
                                                <select class="form-control" id="country_code_edit" name="country_code_edit">
                                                    @php use App\Model\country;$country1 = country::all(); @endphp
                                                    @foreach($country1 as $countries1)
                                                        <option value="{{$countries1->id}}">{{$countries1->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>City</label>
                                                <select class="form-control" id="city_code_edit" name="city_code_edit">
                                                    @php use App\Model\city;$city1 = city::all(); @endphp
                                                    @foreach($city1 as $cities1)
                                                        <option value="{{$cities1->id}}">{{$cities1->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>Province</label>
                                                <select class="form-control" id="province_code_edit" name="province_code_edit">
                                                    @php use App\Model\province;$province1 = province::all(); @endphp
                                                    @foreach($province1 as $provinces1)
                                                        <option value="{{$provinces1->id}}">{{$provinces1->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone_edit" id="phone_edit" class="form-control"/>
                                            </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>Fax</label>
                                                <input type="text" name="fax_edit" id="fax_edit" class="form-control"/>
                                            </div>
                                </div>
                                <div class="col-lg-12">
                                        <div class="form-group">
                                                <label>Zip Code</label>
                                                <input type="text" name="zip_code_edit" id="zip_code_edit" class="form-control"/>
                                            </div>
                                </div>
                                <div class="col-lg-12">
                                        <div class="form-group">
                                                <label>Address </label>
                                                <textarea rows="3" id="address_edit" name="address_edit" class="form-control"></textarea>
                                            </div>
                                </div>
                                <div class="col-lg-12">
                                        <div class="form-group">
                                                <label>Note </label>
                                                <textarea rows="3" id="note_edit" name="note_edit" class="form-control"></textarea>
                                            </div>
                                </div>
                    </div>
                </div>
                 <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Edit Company -->

    <!-- Deleted Company -->
    <div id="showLocation" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="#" id="frmAddLocation">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="company_id_hidden"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title"> Location </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                        <div class="col-lg-6">
                                <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control"/>
                                    </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" id="country_code" name="country_code">
                                            @php $country = country::all(); @endphp
                                            @foreach($country as $countries)
                                                 <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="col-lg-6">
         
                                <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control" id="city_code" name="city_code">
                                            @php $city = city::all(); @endphp
                                            @foreach($city as $cities)
                                                 <option value="{{$cities->id}}">{{$cities->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="form-group">
                                        <label>Province</label>
                                        <select class="form-control" id="province_code" name="province_code">
                                            @php $province = province::all(); @endphp
                                            @foreach($province as $provinces)
                                                 <option value="{{$provinces->id}}">{{$provinces->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="col-lg-6">
                             
                        <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="phone" id="phone" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="form-group">
                                        <label>Fax</label>
                                        <input type="text" name="fax" id="fax" class="form-control"/>
                                    </div>
                        </div>
                        <div class="col-lg-12">
                                <div class="form-group">
                                        <label>Zip Code</label>
                                        <input type="text" name="zip_code" id="zip_code" class="form-control"/>
                                    </div>
                        </div>
                        <div class="col-lg-12">
                                <div class="form-group">
                                        <label>Address </label>
                                        <textarea rows="3" id="address" name="address" class="form-control"></textarea>
                                    </div>
                        </div>
                        <div class="col-lg-12">
                                <div class="form-group">
                                        <label>Note </label>
                                        <textarea rows="3" id="note" name="note" class="form-control"></textarea>
                                    </div>
                        </div>
                        </div>              
                    </div>   
                    <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-primary" value="Save">
                    </div>   
                </form>
            </div>
        </div>
    </div>
    <!-- End Deleted Company -->
@endsection
@section('scripts')
    <script src="/js/backend/location.js"></script>
@endsection