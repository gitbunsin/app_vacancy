@extends('backend.layouts.master')
@section('content')
@php
     use App\Model\city;use App\Model\country;
     use App\Model\subUnit;
@endphp
<style>
    .tree,
.tree ul {
  margin:0 0 0 1em; /* indentation */
  padding:0;
  list-style:none;
  color:#369;
  position:relative;
}

.tree ul {margin-left:.5em} /* (indentation/2) */

.tree:before,
.tree ul:before {
  content:"";
  display:block;
  width:0;
  position:absolute;
  top:0;
  bottom:0;
  left:4px;
  border-left:1px dashed;
}

ul.tree:before {
  border-left:none
}

.tree li {
  margin:0;
  padding:0 1.5em; /* indentation + .5em */
  line-height:2em; /* default list item's `line-height` */
  font-weight:bold;
  position:relative;
}

.tree container, .tree folder {
  display: block;
}

.tree container icon, .tree folder icon {
  background-repeat: no-repeat;
  background-position: 4px center;
  padding-left: 24px;
}

.tree container icon {
  background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAQCAYAAADwMZRfAAAAAXNSR0IArs4c6QAAAAlwSFlzAAALEwAACxMBAJqcGAAAAnJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IlhNUCBDb3JlIDUuNC4wIj4KICAgPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICAgICAgPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIKICAgICAgICAgICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyI+CiAgICAgICAgIDx0aWZmOllSZXNvbHV0aW9uPjcyPC90aWZmOllSZXNvbHV0aW9uPgogICAgICAgICA8dGlmZjpDb21wcmVzc2lvbj41PC90aWZmOkNvbXByZXNzaW9uPgogICAgICAgICA8dGlmZjpYUmVzb2x1dGlvbj43MjwvdGlmZjpYUmVzb2x1dGlvbj4KICAgICAgICAgPHhtcDpDcmVhdG9yVG9vbD5GbHlpbmcgTWVhdCBBY29ybiA1LjIuMTwveG1wOkNyZWF0b3JUb29sPgogICAgICAgICA8eG1wOk1vZGlmeURhdGU+MjAxNi0wMi0wMlQxMjo0ODo1ODwveG1wOk1vZGlmeURhdGU+CiAgICAgIDwvcmRmOkRlc2NyaXB0aW9uPgogICA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgqitOMRAAABuklEQVQ4EZVSvy9sQRT+Znfseh4rfuUVSCQahSBeIZaORqURT6L1FyjlFSJER0In0RMajeqphEVHqxIhmydYrL137sydce5ds9lYWesk9557vvOdb+acexjebXrtMqHjv2I2VtEnvTPT/mDjcp7bpKypX4Vxxm3MTOyKvn/buJwPRQYXTzYn+yLj3W2JJkvO5OTP68XUEWAmU3+TNxb/zLM/G+n1gc7I1FBnork5EYeQgCOAuxcf++f/ce+wXWmiz8XFDOxqe6Zl4Xhl8EdyNuVww9h0f0dDQ2Mdh+cDngakAeKxKMZ6W3D7LCaUT0CReQo3eiP9dHa3vAWQSJCrpndNYaRFbHD00PPRrh9V6+Flbj4T6doLchx0iKcNXLpFpSYLXDcs4dAKgkCnkPhayg3a8yVcVOdFpBJwlEZOfV1sGQFfSUESmbyIki6JmIpE2LuKS3xFh1vjSnkQBH5nJkE7gYgr8kJcKxm280r7UZHRdcJ2aCbWuO/L0/SjM5z1dK0Fy/mgpWxOZLWvTl2vKrxK2Obo0vE/gPWWKy7OGWYuDuaSIxYLN4kmPUFA6VZZVqn/xr8sLf4UeQNldMTNDtyI9wAAAABJRU5ErkJggg==');
}

.tree folder icon {
  background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAQCAYAAADwMZRfAAAAAXNSR0IArs4c6QAAAAlwSFlzAAALEwAACxMBAJqcGAAAAnJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IlhNUCBDb3JlIDUuNC4wIj4KICAgPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICAgICAgPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIKICAgICAgICAgICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyI+CiAgICAgICAgIDx0aWZmOllSZXNvbHV0aW9uPjcyPC90aWZmOllSZXNvbHV0aW9uPgogICAgICAgICA8dGlmZjpDb21wcmVzc2lvbj41PC90aWZmOkNvbXByZXNzaW9uPgogICAgICAgICA8dGlmZjpYUmVzb2x1dGlvbj43MjwvdGlmZjpYUmVzb2x1dGlvbj4KICAgICAgICAgPHhtcDpDcmVhdG9yVG9vbD5GbHlpbmcgTWVhdCBBY29ybiA1LjIuMTwveG1wOkNyZWF0b3JUb29sPgogICAgICAgICA8eG1wOk1vZGlmeURhdGU+MjAxNi0wMi0wMlQxMjo0OTowOTwveG1wOk1vZGlmeURhdGU+CiAgICAgIDwvcmRmOkRlc2NyaXB0aW9uPgogICA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgrkd8ulAAACb0lEQVQ4EZVSTWgTQRT+ZjP5L21KIeAfFpTWikJVqJdeiuJF0qulePHqRcGriAdPXqrFQy8i6EHwIGigFEQQvbRQxP5pSkzbxCbpT9o0SZvs7uzu+HabTeslxQcz7++bb957Mwx1mRy92sp1w+f6lV3TGHj8Y8f1m2neSOoYE5LfcP1AmE+RfdP1j9Tx+12v/0y+3S5nZ6S78t8/lOL3ut4feZgAbOLR5RedvVeGT1y63s5DHTB0AcswsbuZw+r0xF4xt/KO+xSpKIBpWHREgcLx5drD6TfuBXY7t6PdvW3BFg5DFKFYBmAJhMIMnX0D4Ug+c0fxMDACWpZEMZtCKZ/WyT0gkcIE97bBwyPw+OojsonqEj1z3jUdvfhtHIXM8j8xbmgqLL0CqYcaCbslrbq370tJTdt17EutXIIQViT+4OI5QAOCIZPDH4SubUGtErgu+eRvzH76TC1IeIQK0xsg64CIKWxIcgwxoUCaKHNoNUDaAwOEJpBbmEO1WET/8C0nxqgSeagSJ0ibTWnjZuIfwUHD8pp0m6oiO78AWavgVPdZ+AMBBLmFXV1Bi8863JHDU9ooIDs3m4Yp7zqTrFZqKGfmiXoHHcePIdzeBiYq0C0//EYNOoIIQIWAlx6YiDfXsbq4kiisLD2NjSbHHZJcKk1pDSdPR9EajcCkyrx0VKNHCqKKqkG9E4kkgp3CFtZTqUQmsTwWG0m+sssiEjm19nOuv6fvQoh5FFQ21pxy3U11jG2i2Jf1pdX08q+ll4PPks9djDNy+vZfKdDjBptqxp7ERhYbBDbWaceAPsgbP60pBTqsvfoHao777+xfmRQTxswccNgAAAAASUVORK5CYII=');
}

.tree folder.selected {
  background-image: linear-gradient(to bottom, #e4eef5, #c0d1db);
  border-radius: 5px;
}

.tree folder:hover {
    background-image: linear-gradient(to bottom, #e9f5e7, #c3d9bf);
  border-radius: 5px;
}

.tree li:before {
  content:"";
  display:block;
  width:10px; /* same with indentation */
  height:0;
  border-top:1px dashed;
  margin-top:-1px; /* border top width */
  position:absolute;
  top:1em; /* (line-height/2) */
  left:4px;
}

ul.tree>li:before {
  border-top:none;
}

.tree li:last-child:before {
  background:white; /* same with body background */
  height:auto;
  top:1em; /* (line-height/2) */
  bottom:0;
}
</style>
    <div class="container-fluid">
            <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                    <div class="col-lg-11 col-md-5 col-sm-8 col-xs-10 bhoechie-tab-container">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                                              <div class="list-group">
                                                    <a href="#"  class="list-group-item active text-center">
                                                            General Info
                                                    </a>
                                                    <a href="#"  class="list-group-item text-center">
                                                            Location
                                                      </a>
                                                      <a href="#"  class="list-group-item text-center">
                                                            Structure<br/>
                                                      </a>   
                                              </div>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                                                    <!-- flight section -->
                                                    <div class="bhoechie-tab-content active">
                                                            <div class="card-header">
                                                                    <div class="pull-right">
                                                                       <a class="btn btn-primary" onclick="myfunc()" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-plus"></i> Add Company</a>  

                                                                    </div>
                                                                    <h3><span class="ti-home"></span> General Information</h3>
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
                                                                                @foreach ($company as $key => $companies)
                                                                                    <tr id="tbl_company{{$companies->id}}">
                                                                                        <th scope="row">{{$key + 1}}</th>
                                                                                        <td><a href="{{url('admin/company/'.$companies->id)}}"><strong>{{$companies->company_name}}</strong></a></td>
                                                                                        <td>{{$companies->phone}}</td>
                                                                                        <td>{{$companies->email}}</td>
                                                                                        <th>
                                                                                            <a onclick="Edit({{$companies->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                                            <a onclick="Delete({{$companies->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                                                        </th>
                                                                                    </tr>
                                                                                  @endforeach
                                                                              
                                                                                </tbody>
                                                                              </table>
                                                                </div>
                                                    </div>
                                                    <div class="bhoechie-tab-content ">
                                                        <div class="card-header">
                                                                <div class="card-header">
                                                                        <div class="pull-right">
                                                                            <a  onclick="showLocation(this);"  href="#"  class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Create Location"><i class="ti-plus"></i>Add Location</a>
                                                                        </div>
                                                                        <h3><span class="ti-home"></span> Location</h3>
                                                                    </div>
                                                                    <div class="card-body" id="jobCategory_id">
                                                                        <table class="table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th scope="col">#No</th>
                                                                                <th scope="col">Name </th>
                                                                                <th scope="col">City</th>
                                                                                <th scope="col">Country</th>
                                                                                <th scope="col">Num / Emp</th>
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
                                                                                    <td></td>
                                                                                    <th>
                                                                                            <a onclick="EditLocation({{$locations->id}});"   class="btn btn-primary"  title="Edit"><i class="icon-edit"></i></a>
                                                                                            <a onclick="DeleteLocation({{$locations->id}});" class="btn btn-danger"  title="Delete"><i class="ti-trash"></i></a>
                                                                                      </th>
                                                                                </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                            </tbody>
                                                                        </table>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="bhoechie-tab-content">
                                                    <div class="card-header">
                                                           
                                                            <h3><span class="ti-home"></span> Organization Structure</h3>
                                                        </div>
                                                      
                                                        <div class="card-body">
                                                                <div class="modal-body">
                                                                        <ul class="nav nav-tabs" role="tablist">
                                                                                <li role="presentation" class="active"><a href="#info" aria-controls="home" role="tab" data-toggle="tab"> Structure</a></li>
                                                                                <li role="presentation"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"> Company Grap</a></li>
                                                                            </ul>
                                                                            <!-- Tab panes -->
                                                                            <div class="tab-content tabs">
                                                                    
                                                                                <div role="tabpanel" class="tab-pane fade in active" id="info">
                                                                                        <form action="" id="frmEditCandidate">
                                                                                        <input type="hidden" value="" id="candidate_id_edit">
                                                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                                                        <div class="card-body">
                                                                                                <div class="pull-right">
                                                                                                        <a  onclick="showSubUnit(this);"  href="#"  class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Create Location"><i class="ti-plus"></i>Add Structure</a>
                                                                                                      
                                                                                                    </div>
                                                                                                    <br/>
                                                                                                    <br/>
                                                                                                <div class="row">
                                                                                                        <table class="table">
                                                                                                                <thead>
                                                                                                                <tr>
                                                                                                                    <th scope="col"> Name</th>
                                                                                                                    <th scope="col">Head Office Department</th>
                                                                                                                  
                                                                                                                    <th scope="col">Action</th>
                                                                                                                </tr>
                                                                                                                </thead>
                                                                                                                <tbody id="company_list_graph" name="company_list_graph">
                                                                                                                    @foreach($subUnits as  $subUnit)
                                                                                                                         @foreach($subUnit->children as $cats)
                                                                                                                              @foreach($cats->children as $key => $cat)
                                                                                                                        <tr id="subUnit_id{{$cat->id}}">
                                                                                                                            <td>
                                                                                                                                {{$cat->name}}
                                                                                                                            </td>
                                                                                                                            <td> 
                                                                                                                                {{$cats->name}}
                                                                                                                           </td>
                                                                                                                            <th>
                                                                                                                                    <a onclick="EditSubUnit({{$cat->id}});"   class="btn btn-primary"  title="Edit"><i class="icon-edit"></i></a>
                                                                                                                                    <a onclick="DeleteSubUnit({{$cat->id}});" class="btn btn-danger"  title="Delete"><i class="ti-trash"></i></a>
                                                                                                                            </th>
                                                                                                                        </tr>
                                                                                                                        @endforeach
                                                                                                                    @endforeach 
                                                                                                                    @endforeach 
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                            
                                                                                                      
                                                                                                </div>
                                                                                        </div>
                                                                                        </form>
                                                                                </div>
                                                                                <div role="tabpanel" class="tab-pane fade" id="description">
                                                                                        <form action="" id="frmEditCandidate">
                                                                                        <input type="hidden" value="" id="candidate_id_edit">
                                                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                                                        <div class="card-body">
                                                                                                <div class="row">
                                                                                                    @foreach($subUnits as $subUnit)
                                                                                                        <ul class="tree">
                                                                                                                <li><h3>{{ $subUnit->name }}</h3>
                                                                                                                  <ul>
                                                                                                                     @foreach($subUnit->children as $cats)
                                                                                                                    <li>{{ $cats->name }}
                                                                                                                           
                                                                                                                      <ul>
                                                                                                                            @foreach($cats->children as $cat)
                                                                                                                              <li>{{$cat->name}}</li>
                                                                                                                            @endforeach
                                                                                                                        </li>
                                                                                                                      </ul>
                                                                                                                     
                                                                                                                    </li>
                                                                                                                    @endforeach
                                                                                                                  </ul>
                                                                                                                </li>
                                                                                                        </ul>
                                                                                                            @endforeach 
                                                                                                       
                                                                                                </div>
                                                                                        </div>
                                                                                        </form>
                                                                                </div>
                                                                            </div>
                                                                </div>
                                                        </div>
                                            </div>
                                                    
                                    </div>
                            </div>
                        </div>
                    </div>
        </div>
        </div>
    </div>

   

        <div id="AddSubUnit" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <form method="POST" action="#" id="frmAddSubUnit">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <input type="hidden" value="" id="subUnit_id"/>
                            <div class="modal-header theme-bg">
                                <h4 class="modal-title">Company  </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                    <div class="row">
                                                    <div class="col-sm-12">
                                                        <label> Name</label>
                                                        <input  name="company_subUnit_name" id="company_subUnit_name" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-12">
                                                            <label>Head Office Department</label>
                                                            <?php $subUnit= subUnit::all(); ?>
                                                            <select name="subUnit_head" id="subUnit_head" class="form-control">
                                                                @foreach( $subUnit as $subUnits)
                                                                  <option value="{{$subUnits->id}}">{{$subUnits->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                          
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

            <div id="DeleteSubUnit" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="#" id="frmDeleteSubUnit">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <input type="hidden" value="" id="company_subunit_id"/>
                                <div class="modal-header theme-bg">
                                    <h4 class="modal-title">Company Structure  </h4>
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
    {{-- // SubUnit --}}
    <div id="DeleteCompany" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="#" id="frmDeleteCompany">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" value="" id="company_id"/>
                    <div class="modal-header theme-bg">
                        <h4 class="modal-title">Company  </h4>
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



    <!-- Edit Company -->
 <div id="EditCompany" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmCompanyEdit">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="" val="" id="id_edit">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title">Update Company</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
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
                                                        <input  name="company_name_edit" id="company_name_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Phone No.</label>
                                                        <input name="phone_edit" id="phone_edit" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Email</label>
                                                        <input name="email_edit" id="email_edit" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Website Link</label>
                                                        <input name="website_link_edit" id="website_link_edit" type="text" class="form-control">
                                                    </div>
                        
                                                   
                        
                                                    <div class="col-sm-4">
                                                        <label>City</label>
                                                        <?php $city = city::all(); ?>
                                                        <select name="city_id_edit" id="city_id_edit" class="form-control">
                                                            @foreach( $city as $cities)
                                                              <option value="{{$cities->id}}">{{$cities->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>State</label>
                                                        <input type="text" name="state_edit" id="state_edit" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Country</label>
                                                        <?php $country = country::all();?>
                                                        <select class="form-control" id="country_id_edit" name="country_id_edit">
                                                            @foreach( $country as $countries)
                                                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Zip Code</label>
                                                        <input id="zip_code_edit" name="zip_code_edit"  type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                            <label>LinkedIn</label>
                                                            <input name="linkedIn_link_edit" id="linkedIn_link_edit" type="text" class="form-control">
                                                        </div>
                                                    <div class="col-sm-4">
                                                            <label>Facebook</label>
                                                            <input name="facebook_link_edit" id="facebook_link_edit" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Company Logo</label>
                                                        <input name="company_logo_edit" id="company_logo_edit" type="file" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Logo</label>
                                                        <img width="100px" height="100px" id="logo_edit" src="" alt="">
                                                    </div>

                                                    <div class="col-sm-12">
                                                            <label>Address</label>
                                                            <textarea class="form-control"   name="address_edit" id="address_edit" cols="10" rows="2"></textarea>
                                                        </div>
                                                   
                                                <div class="col-sm-12">
                                                        <label>Company Profiles</label>
                                                        <textarea class="form-control"  name="company_profile_edit" id="company_profile_edit" cols="30" rows="7"></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                       
                                    </div>
                            </div>	
                    </div>
                    <div class="modal-footer">
                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
 </div>
<!-- Send Message -->
<div id="AddCompany" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="frmCompany">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id">
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
                                                        <input  name="company_name" id="company_name" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Phone No.</label>
                                                        <input name="phone" id="phone" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>Email</label>
                                                        <input name="email" id="email" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                            <label>Company Logo</label>
                                                            <input name="company_logo" id="company_logo" type="file" class="form-control">
                                                        </div>
                                                    <div class="col-sm-4">
                                                        <label>Website Link</label>
                                                        <input name="website_link" id="website_link" type="text" class="form-control">
                                                    </div>
                        
                                                    <div class="col-sm-4">
                                                        <label>City</label>
                                                        <?php $city = city::all(); ?>
                                                        <select class="form-control" id="city_id">
                                                            @foreach( $city as $cities)
                                                              <option value="{{$cities->id}}">{{$cities->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>State</label>
                                                        <input type="text" name="state" id="state" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Country</label>
                                                        <?php $country = country::all(); ?>
                                                        <select class="form-control" id="country_id">
                                                            @foreach( $country as $countries)
                                                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 m-clear">
                                                        <label>Zip Code</label>
                                                        <input id="zip_code" name="zip_code"  type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                            <label>LinkedIn</label>
                                                            <input name="linkedIn_link" id="linkedIn_link" type="text" class="form-control">
                                                        </div>
                                                    <div class="col-sm-4">
                                                            <label>Facebook</label>
                                                            <input name="facebook_link" id="facebook_link" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4">
                                                            <label>Instagram</label>
                                                            <input name="instagram_link" id="instagram_link" type="text" class="form-control">
                                                        </div>
                                                    <div class="col-sm-12">
                                                            <label>Address</label>
                                                            <textarea class="form-control"  name="address" id="address" cols="10" rows="2"></textarea>
                                                        </div>
                                                   
                                                <div class="col-sm-12">
                                                        <label>Company Profiles</label>
                                                        <textarea class="form-control"  name="company_profile" id="company_profile" cols="30" rows="7"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="card-body">
                                                <div class="row"> --}}
                                                   
                                                {{-- </div>
                                            </div> --}}
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
                                <div class="col-lg-4">
                                                <label>Name</label>
                                                <input type="text" name="name_edit" id="name_edit" class="form-control"/>
                                </div>
                                <div class="col-lg-4">
                                                <label>Country</label>
                                                <select class="form-control" id="country_code_edit" name="country_code_edit">
                                                    @php $country1 = country::all(); @endphp
                                                    @foreach($country1 as $countries1)
                                                        <option value="{{$countries1->id}}">{{$countries1->name}}</option>
                                                    @endforeach
                                                </select>
                                </div>
                                <div class="col-lg-4">
                                                <label>City</label>
                                                <select class="form-control" id="city_code_edit" name="city_code_edit">
                                                    @php $city1 = city::all(); @endphp
                                                    @foreach($city1 as $cities1)
                                                        <option value="{{$cities1->id}}">{{$cities1->name}}</option>
                                                    @endforeach
                                                </select>
                                </div>
                                <div class="col-lg-4">
                                                <label>Province</label>
                                                <select class="form-control" id="province_code_edit" name="province_code_edit">
                                                    @php use App\Model\province;$province1 = province::all(); @endphp
                                                    @foreach($province1 as $provinces1)
                                                        <option value="{{$provinces1->id}}">{{$provinces1->name}}</option>
                                                    @endforeach
                                                </select>
                                </div>
                                <div class="col-lg-4">
                                                <label>Phone</label>
                                                <input type="text" name="phone_edit" id="phone_edit" class="form-control"/>
                                </div>
                                <div class="col-lg-4">
                                                <label>Fax</label>
                                                <input type="text" name="fax_edit" id="fax_edit" class="form-control"/>
                                </div>
                                <div class="col-lg-12">
                                                <label>Zip Code</label>
                                                <input type="text" name="zip_code_edit" id="zip_code_edit" class="form-control"/>
                                </div>
                                <div class="col-lg-12">
                                                <label>Address </label>
                                                <textarea rows="3" id="address_edit" name="address_edit" class="form-control"></textarea>
                                </div>
                                <div class="col-lg-12">
                                                <label>Note </label>
                                                <textarea rows="3" id="note_edit" name="note_edit" class="form-control"></textarea>
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
    <div id="DeleteLocationModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="#" id="frmDeleteLocation">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" value="" id="location_delete_id"/>
                        <div class="modal-header theme-bg">
                            <h4 class="modal-title">Location  </h4>
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

                        <div class="col-lg-4">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control"/>
                        </div>
                        <div class="col-lg-4">
                                        <label>Country</label>
                                        <select class="form-control" id="country_code" name="country_code">
                                            @php $country = country::all(); @endphp
                                            @foreach($country as $countries)
                                                 <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                        </div>
                        <div class="col-lg-4">
         
                            
                                        <label>City</label>
                                        <select class="form-control" id="city_code" name="city_code">
                                            @php $city = city::all(); @endphp
                                            @foreach($city as $cities)
                                                 <option value="{{$cities->id}}">{{$cities->name}}</option>
                                            @endforeach
                                        </select>
                                   
                        </div>
                        <div class="col-lg-4">
                                
                                        <label>Province</label>
                                        <select class="form-control" id="province_code" name="province_code">
                                            @php $province = province::all(); @endphp
                                            @foreach($province as $provinces)
                                                 <option value="{{$provinces->id}}">{{$provinces->name}}</option>
                                            @endforeach
                                        </select>
                                 
                        </div>
                        <div class="col-lg-4">
                                <label>Phone</label>
                                <input type="number" name="phone" id="phone" class="form-control"/>
                        </div>
                        <div class="col-lg-4">
                            <label>Fax</label>
                            <input type="text" name="fax" id="fax" class="form-control"/>
                        </div>
                        <div class="col-lg-12">
                 
                            <label>Zip Code</label>
                            <input type="text" name="zip_code" id="zip_code" class="form-control"/>
                        </div>
                        <div class="col-lg-12">
                                
                            <label>Address </label>
                            <textarea rows="3" id="address" name="address" class="form-control"></textarea>
                                   
                        </div>
                        <div class="col-lg-12">
                            <label>Note </label>
                            <textarea rows="3" id="note" name="note" class="form-control"></textarea>
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
    <script src="/js/backend/company.js"></script>
@endsection