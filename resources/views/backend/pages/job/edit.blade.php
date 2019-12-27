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
    {{-- @php
        use App\Model\JobCategory;
        use App\Model\employee;
        use App\Model\JobType;
        use App\Model\skill;
        use App\Model\location;
        use App\Model\company;
        use App\Model\jobTitle;
    @endphp --}}
    
    <div class="container-fluid">
    <!-- /row -->
    <div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
    
            <div class="card-header">
                <div class="pull-right">
                        <a onclick="AddVacancy();" class="btn btn-primary"  title="Payment"><i class="ti-plus"></i> Add Vacancy</a> &nbsp;&nbsp;&nbsp;
                   
                </div>
                {{-- <a onclick="AddVacancy();" class=" pull-right btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Add Attachment"> Add </a> --}}
                {{-- <a href="{{url('admin/job/create')}}" class=" pull-right btn btn-cancel manage-btn" title="Add Attachment"> <i class="ti-plus"></i> Add </a> --}}
               
                <input type="text" class="form-control wide-width" placeholder="Search & type" />
            </div>
            <div class="card-body">
                    <table class="table" id='tbl_vacancy'>
                            <thead>
                              
                            </thead>
                            <tbody>  
                                    <tr>
                                            <th scope="col">#No</th>
                                            <th scope="col">Vacancy Name</th>
                                            <th scope="col">Closing Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                            </tr>                     
                            </tbody>
                            </table>
            </div>
        </div>
    </div>
    </div>
    <!-- /row -->
    </div>
    </div>
@endsection