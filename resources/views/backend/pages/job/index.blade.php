@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\jobTitle;
@endphp
<div class="container-fluid">
<!-- /row -->
<div class="row">
<div class="col-md-12 col-sm-12">
    <div class="card">

        <div class="card-header">
            <div class="pull-right">
                <select class="form-control">
                    <option>Short By</option>
                    <option>Premium Job</option>
                    <option>Ascending</option>
                    <option>Descending</option>
                    <option>Most Popular</option>
                </select>
            </div>
            <a onclick="AddVacancy();" class=" pull-right btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Add Attachment"> Add </a>
            <input type="text" class="form-control wide-width" placeholder="Search & type" />
        </div>
        <div class="card-body">
                <table class="table" id='company_id'>
                        <thead>
                            <tr>
                            <th scope="col">#No</th>
                            <th scope="col">Vacancy Name</th>
                            <th scope="col">Closing Date</th>
                            <th scope="col">Career Level</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>  
                        @foreach ($job as $key => $jobs)
                            <tr id="tr_vacancy{{$jobs->id}}">
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{$jobs->vacancy_name}}</td>
                                <td>{{$jobs->closingDate}}</td>
                                <td>{{$jobs->career_level}}</td>
                                <th>
                                        <a href="{{url('admin/job/'.$jobs->id.'/edit')}}" class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                        <a  onclick="DeleteVacancy({{$jobs->id}});" href="#" class="btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                </th>
                            </tr>
                            @endforeach                                
                        </tbody>
                        </table>
        </div>
    </div>
</div>
</div>
<!-- /row -->
</div>
</div>
<!-- Modal: modalPoll -->
<!-- Send Message -->
<div id="ModalAddVacacny" class="modal fade">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <form method="POST" action="{{url('admin/job/')}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div class="modal-header theme-bg">
            <h4 class="modal-title">Posting Vacancy</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
                <div class="demo">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab" role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#info" aria-controls="home" role="tab" data-toggle="tab"> Gengeral Information</a></li>
                                        <li role="presentation"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"> Responsibilities / Requirement</a></li>
                                        <li role="presentation"><a href="#apply" aria-controls="messages" role="tab" data-toggle="tab"> How to apply</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content tabs">
                                        <div role="tabpanel" class="tab-pane fade in active" id="info">
                                                <div class="card-body">
                                                        <div class="row">
                                                                <div class="col-lg-6">
                                                                        <label> Job Title </label>
                                                                        <select class="form-control" required id="currency_id" name="currency_id">
                                                                            <option value="">  -- Pleae Select Job Tittle -- </option>
                                                                            @php $j = jobTitle::all(); @endphp
                                                                            @foreach ($j as $js)
                                                                                 <option value="{{$js->id}}"> {{$js->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                              <div class="col-lg-6">
                                                                  <label> Vacancy Name </label>
                                                                  <input  name="education_name" id="education_name" type="text" class="form-control">
                                                              </div>
                                                              <div class="col-lg-6">
                                                                    <label> Hiring Manager </label>
                                                                    <input  name="education_name" id="education_name" type="text" class="form-control">
                                                                </div>
                                                          <div class="col-lg-6">
                                                              <label> Number of Positions </label>
                                                              <input  name="education_name" id="education_name" type="text" class="form-control">
                                                          </div>
                                                          
                                                        </div>
                                                    </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in" id="description">

                                            <div class="row">
                                                    <div class="col-lg-12">
                                                            <label>Job Description / Requirement</label>
                                                            <textarea  name="description" id="description" class="form-control" cols='5' rows='5'></textarea>
                                                        </div>

                                            </div>

                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in" id="apply">

                                                <div class="row">
                                                        <div class="col-lg-12">
                                                                <label>How to apply </label>
                                                                <textarea  name="description" id="description" class="form-control" cols='5' rows='5'></textarea>
                                                            </div>
    
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
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
    <div id="frmDeleteVacancy" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="frmVacancy">
                        <input type="hidden" id="vacancy_id" value="">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="modal-header theme-bg">
                            <h4 class="modal-title">Job</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Are You Sure to Delete this vacancy?</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal: modalPoll -->


@endsection
@section('scripts')
    <script src="{{asset('js/backend/vacancy.js')}}"></script>
@endsection