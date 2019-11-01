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
                            <option>Ascending</option>
                            <option>Descending</option>
                            <option>Most Popular</option>
                        </select>
                    </div>
                    <input type="text" class="form-control wide-width" placeholder="Search & type" />
                </div>

                @if(!empty($user))
                    @foreach($user as $users)
                <div class="card-body">
                    <ul class="list">
                        <li class="manage-list-row clearfix">
                            <div class="job-info">
                                <div class="job-img">
                                    <img src="{{asset('img/about/about-us.jpg')}}" class="attachment-thumbnail" alt="Academy Pro Theme">
                                </div>
                                <div class="job-details">
                                    <h3 class="job-name"><a class="job_name_tag" href="#">{{$users->name}}</a></h3>
                                    <small class="job-company"><i class="ti-home"></i>Apply For : Web Designer</small>
                                    <small class="job-sallery"><i class="ti-time"></i>Date Apply : 2019-07-31</small>
                                    <div class="shortlisted-can">Application Initiated</div>
                                    <div class="candi-skill">
                                        <span class="skill-tag">css</span>
                                        <span class="skill-tag">HTML</span>
                                        <span class="skill-tag">Photoshop</span>
                                    </div>
                                </div>
                            </div>
                            <div class="job-buttons">
                                <a href="#" class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Download Resume"><i class="ti-check"></i></a>
                                <a href="#SendMessage"  data-toggle="modal" class="btn btn-blue manage-btn" data-toggle="tooltip" data-placement="top" title="Message"><i class="ti-email"></i></a>
                                <a href="#" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="ti-close"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
                    @endforeach
                @endif
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
<!-- Send Message -->
<div id="SendMessage" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form>
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title">Send Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control big-height"></textarea>
                    </div>					
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Send">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
@endsection