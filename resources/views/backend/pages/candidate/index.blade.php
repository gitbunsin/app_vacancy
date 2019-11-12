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
{{-- 
                @if(!empty($user))
                    @foreach($user as $users) --}}
                <div class="card-body">
                    <table class="table" id='company_id'>
                        <thead>
                          <tr>
                            <th scope="col">#No</th>
                            <th scope="col">First (& Middle) Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Employment Status</th>
                            <th scope="col">SubUnit</th>
                            <th scope="col">Supervisor</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>  
                        {{-- @foreach ($company as $key => $companies) --}}
                            <tr id="tbl_company">
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th>
                                    <a onclick="Edit();"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                    <a onclick="Delete();" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                </th>
                            </tr>
                          {{-- @endforeach --}}
                      
                        </tbody>
                      </table>
                </div>
                    {{-- @endforeach --}}
                {{-- @endif --}}
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