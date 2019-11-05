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
                                    @foreach ($job as $key => $jobs)
                                        <tr id="tbl_company">
                                            <th scope="row">{{$key + 1}}</th>
                                            <td>Company Name</td>
                                            <td>Company Name</td>
                                            <td>Company Name</td>
                                            <th>
                                                <a onclick="Edit();"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                <a onclick="Delete();" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                            </th>
                                        </tr>
                                      @endforeach
                                  
                                    </tbody>
                                  </table>
                        {{-- <ul class="list">
                            @php $id = ""; $title = "";@endphp
                            @if ( !empty ( $job ) )
                            @foreach($job as $jobs)
                                    @php $id = $jobs->id;
                                         $title = $jobs->job_title;
                                    @endphp
                                <li class="manage-list-row clearfix">
                                    <div class="job-info">
                                        <div class="job-img">
                                            <img src="{{asset('img/about/about-us.jpg')}}" class="attachment-thumbnail" alt="Academy Pro Theme">
                                        </div>
                                        <div class="job-details">
                                            <h3 class="job-name">{{$jobs->job_title}}</h3>
                                            <small class="job-company"><i class="ti-home"></i>Google Inc</small>
                                            <small class="job-sallery"><i class="ti-credit-card"></i>{{$jobs->offer_salary}}</small>
                                            <small class="job-update"><i class="ti-time"></i>Closing Date: {{$jobs->closingDate}}</small>
                                            <span class="j-type part-time">{{$jobs->jobType->name}}</span>
                                        </div>
                                    </div>
                                    <div class="job-buttons">
                                        <a href="{{url('admin/job/'.$jobs->id.'/edit')}}" class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                                        <a href="#SendMessage" class="btn btn-cancel manage-btn" data-toggle="modal" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                                    </div>
                                </li>
                            @endforeach
                                @else
                                    @php $jobs = ""; @endphp
                            @endif
                        </ul> --}}
                        {{-- <div class="flexbox padd-10">
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
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    </div>
    <!-- Modal: modalPoll -->
    <!-- Send Message -->
    <div id="SendMessage" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST" action="{{url('admin/job/')}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Job</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Are You Sure to Delete this item <b></b> ?</label>
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
    <!-- /#page-wrapper -->

    @endsection