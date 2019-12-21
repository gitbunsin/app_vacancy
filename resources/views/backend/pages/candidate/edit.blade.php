@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\vacancy;
    use App\Model\company;
    use App\Model\JobCategory;
@endphp
    <form action="{{url('admin/company')}}" id='myform' method='post'>
        {{ csrf_field() }}
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <!-- General Company Information  -->
                <div class="card">
                    <div class="card-header">
                        <h4>Candidate Info</h4>
                    </div>

                    <div class="card-body">
                            <div class="modal-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#info" aria-controls="home" role="tab" data-toggle="tab"> Candidate Info</a></li>
                                            <li role="presentation"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"> Candidate Status</a></li>
                                            <li role="presentation"><a href="#apply" aria-controls="messages" role="tab" data-toggle="tab"> Interview</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs">
                                            <div role="tabpanel" class="tab-pane fade in active" id="info">
                                                    <div class="card-body">
                                                            <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label>First Name</label>
                                                                        <input required name="first_name_edit" id="first_name_edit" type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>Middle Name .</label>
                                                                        <input required name="middle_name_edit" id="middle_name_edit" type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>Last Name</label>
                                                                        <input required required name="last_name_edit" id="last_name_edit" type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>Email</label>
                                                                        <input required  name="email_edit" id="email_edit" required  type="email" class="form-control">
                                    
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>Contact Number</label>
                                                                        <input required  name="phone_edit" id="phone_edit" required  type="number" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>Vacancy Name</label>
                                                                        <?php $vacancy  = vacancy::all(); ?>
                                                                        <select name="vacancy_edit"  id="vacancy_edit" class="form-control" required>
                                                                                <option value=""> -- please select vacancy -- </option>
                                                                            @foreach($vacancy as $vacancies)
                                                                                <option value="{{$vacancies->id}}"> {{$vacancies->vacancy_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>Company Name</label>
                                                                        <?php $company  = company::all(); ?>
                                                                        <select name="company_edit" id="company_edit" class="form-control" required>
                                                                            <option value=""> -- please select company -- </option>
                                                                            @foreach($company as $companies)
                                                                                <option value="{{$companies->id}}"> {{$companies->company_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-4 m-clear">
                                                                        <label>Date of Application</label>
                                                                        <input required id="date_application_edit" name="date_application_edit" type="date" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-4 m-clear">
                                                                        <label> Resume </label>
                                                                        <input name="file_name_edit" id="file_name_edit" type="file" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-12 m-clear">
                                                                            <label> Old Resume </label>
                                                                            <input required name="resume_edit" id="resume_edit" type="text" disabled class="form-control">
                                                                        </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Comment</label>
                                                                            <textarea name="comment_edit" id="comment_edit" type="text" rows="5" class="form-control"></textarea>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fades" id="description">
                                                    <div class="card-body">
                                                            <div class="row">
                                                                    <div class="col-lg-6">
                                                                            <label> Job Category </label>
                                                                            <select class="form-control" required id="job_category_vacancy_id" name="job_category_vacancy_id">
                                                                                <option value="">  -- Pleae Select Job Tittle -- </option>
                                                                                @php $j = JobCategory::all(); @endphp
                                                                                @foreach ($j as $js)
                                                                                     <option value="{{$js->id}}"> {{$js->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                            </div>
                                                    </div>
                                            </div>
                                        </div>
                            </div>
                                   
                                    <div class="pull-right">
                                            <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                                            <input type="submit" class="btn btn-primary" value="Save">
                                        </div>
                            </div>
                </div>
        
            </div>
        </div>
        <!-- /row -->
    </div>
    </div>
</form>
    <!-- /#page-wrapper -->
@endsection

