@extends('backend.layouts.master')
@section('content')
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
                        <input type="text" class="form-control wide-width" placeholder="Search & type" />
                    </div>
                    <div class="card-body">
                        @foreach($company as $companies)
                        <ul class="list">
                                <li class="manage-list-row clearfix">
                                    <div class="job-info">
                                        <div class="job-img">
                                            <img src="{{asset('img/about/about-us.jpg')}}" class="attachment-thumbnail" alt="Academy Pro Theme">
                                        </div>
                                        <div class="job-details">
                                            <h3 class="job-name">{{$companies->company_name}}</h3>
                                            <small class="job-company"><i class="ti-home"></i>{{$companies->address}}</small>
                                            <small class="job-sallery"><i class="ti-credit-card"></i>25,000 - 35,000</small>
                                            <small class="job-update"><i class="ti-time"></i>Created Date: {{$companies->created_at}}</small>
                                            <span class="j-type part-time">{{$companies->phone}}</span>
                                        </div>
                                    </div>
                                    <div class="job-buttons">
                                        <a href="#" class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                        <a href="#" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                    </div>
                                </li>
                        </ul>
                        @endforeach
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

    @endsection