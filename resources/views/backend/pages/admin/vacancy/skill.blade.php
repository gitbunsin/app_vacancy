@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                            <div class="col-lg-11 col-md-5 col-sm-8 col-xs-10 bhoechie-tab-container">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                                      <div class="list-group">
                                        <a href="#"  class="list-group-item active text-center">
                                            Skills
                                        </a>
                                        <a href="#"  class="list-group-item text-center">
                                            Education<br/>
                                        </a>
                                        <a href="#" class="list-group-item text-center">
                                            Licenses<br/>
                                        </a>
                                        <a href="#" class="list-group-item text-center">
                                            Languages <br/>
                                        </a>
                                        <a href="#" class="list-group-item text-center">
                                            Memberships <br/>
                                        </a>
                                      </div>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9 col-xs-9 bhoechie-tab">
                                        <!-- flight section -->
                                        <div class="bhoechie-tab-content active">
                                            <div class="card-header">
                                                <div class="pull-right">
                                                    <a class="btn btn-primary" onclick="LoadSkill()" data-placement="top" title="Skill"><i class="ti-plus"></i></a>
                                                </div>
                                                <h3><span class="ti-home"></span> Skills </h3>
                                            </div>
                                                <table class="table" id="tbl_skill">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">#No</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Action</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          @foreach ($skill as $key => $skills)
                                                          <tr id="tr_skill{{$skills->id}}">
                                                              <th scope="row">{{$key + 1}}</th>
                                                              <td>{{$skills->name}}</td>
                                                              <td>{{$skills->description}}</td>
                                                              <th>
                                                                    <a onclick="EditSkill({{$skills->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                    <a onclick="DeleteSkill({{$skills->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                              </th>
                                                            </tr>  
                                                          @endforeach
                                                        </tbody>
                                                      </table>
                                        </div>
                                        <!-- train section -->
                                        <div class="bhoechie-tab-content">
                                            <div class="card-header">
                                                <div class="pull-right">
                                                    <a class="btn btn-primary" onclick="LoadModalEducation()" data-toggle="tooltip" data-placement="top" title="Education"><i class="ti-plus"></i></a>
                                                </div>
                                                <h3><span class="ti-home"></span> Education </h3>
                                            </div>
                                            <table class="table" id="tbl_education">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">#No</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($education as $key => $educations)
                                                  <tr id="tr_education{{$educations->id}}">
                                                      <th scope="row">{{$key + 1}}</th>
                                                      <td>{{$educations->name}}</td>
                                                      <th>
                                                            <a onclick="EditEducation({{$educations->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                            <a onclick="DeleteEducation({{$educations->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                      </th>
                                                    </tr>  
                                                  @endforeach
                                                </tbody>
                                              </table>
                                        </div>
                            
                                        <!-- hotel search -->
                                        <div class="bhoechie-tab-content">
                                          <div class="card-header">
                                            <div class="pull-right">
                                                <a class="btn btn-primary" onclick="" data-toggle="tooltip" data-placement="top" title="Status"><i class="ti-plus"></i></a>
                                            </div>
                                            <h3><span class="ti-home"></span> Employee Status</h3>
                                        </div>
                                            <table class="table" id="tbl_status">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">#No</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach ($status as $key => $statuses)
                                                      <tr id="tr_status{{$statuses->id}}">
                                                          <th scope="row">{{$key + 1}}</th>
                                                          <td>{{$statuses->name}}</td>
                                                          <th>
                                                                <a onclick="EditStatus({{$statuses->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                <a onclick="DeleteStatus({{$statuses->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                          </th>
                                                        </tr>  
                                                      @endforeach
                                                    </tbody>
                                                  </table>
                                        </div>
                                        <div class="bhoechie-tab-content">
                                          <div class="card-header">
                                            <div class="pull-right">
                                                <a class="btn btn-primary" onclick="" data-toggle="tooltip" data-placement="top" title="Category"><i class="ti-plus"></i></a>
                                            </div>
                                            <h3><span class="ti-home"></span> Job Category</h3>
                                        </div>
                                            <table class="table" id="tbl_category">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">#No</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach ($category as $key => $categories)
                                                      <tr id="tr_category{{$categories->id}}">
                                                          <th scope="row">{{$key + 1}}</th>
                                                          <td>{{$categories->name}}</td>
                                                          <th>
                                                                <a onclick="Editcategory({{$categories->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                <a onclick="Deletecategory({{$categories->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                          </th>
                                                        </tr>  
                                                      @endforeach
                                                    </tbody>
                                                  </table>
                                        </div>
                                        <div class="bhoechie-tab-content">
                                            <center>
                                              <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
                                              <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                              <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    </div>
    <!-- /#page-wrapper -->
<!-- /#JobCategory -->

<div id="ModalEditSkill" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="frmEditSkill">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <input type="hidden" name="" val="" id="skill_id_edit">
              <div class="modal-header theme-bg">						
                  <h4 class="modal-title"> Skills </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <div class="card-body">
                      <div class="row">
                        <div>
                            <div>
                                <label> Name </label>
                                <input  name="skill_name_edit" id="skill_name_edit" type="text" class="form-control">
                            </div>
                            <div>
                                <label>Description</label>
                                <textarea  name="description_edit" id="description_edit" class="form-control" cols='5' rows='5'></textarea>
                            </div>
                            
                        </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                      <input type="submit" class="btn btn-primary" value="Yes">
              </div>
          </form>
      </div>
  </div>
</div>


<div id="ModalAddSkill" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="frmAddSkill">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <input type="hidden" name="" val="" id="skill_id">
              <div class="modal-header theme-bg">						
                  <h4 class="modal-title"> Skills </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <div class="card-body">
                      <div class="row">
                        <div>
                            <div>
                                <label> Name </label>
                                <input  name="skill_name" id="skill_name" type="text" class="form-control">
                            </div>
                            <div>
                                <label>Description</label>
                                <textarea  name="description" id="description" class="form-control" cols='5' rows='5'></textarea>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                      <input type="submit" class="btn btn-primary" value="Yes">
              </div>
          </form>
      </div>
  </div>
</div>



<div id="ModalDeleteSkill" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="frmDeleteSkill">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input type="hidden" name="" val="" id="skill_id">
              <div class="modal-header theme-bg">						
                  <h4 class="modal-title"> Skill </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <h5> Do you want to delete Skill ? </h5>
              </div>
              <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                      <input type="submit" class="btn btn-primary" value="Yes">
              </div>
          </form>
      </div>
  </div>
</div>


<!-- /#Employee Education -->

<div id="ModalEditEducation" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditEducation">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="" val="" id="education_edit_id">
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title"> Education </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                          <div>
                              <div>
                                  <label> Name </label>
                                  <input  name="education_name_edit" id="education_name_edit" type="text" class="form-control">
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                        <input type="submit" class="btn btn-primary" value="Yes">
                </div>
            </form>
        </div>
    </div>
  </div>

  {{-- //add  --}}
<div id="ModalEducationAdd" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="frmAddEducation">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <input type="hidden" name="" val="" id="education_id">
              <div class="modal-header theme-bg">						
                  <h4 class="modal-title"> Education </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <div class="card-body">
                      <div class="row">
                        <div>
                            <div>
                                <label> Name </label>
                                <input  name="education_name" id="education_name" type="text" class="form-control">
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                      <input type="submit" class="btn btn-primary" value="Yes">
              </div>
          </form>
      </div>
  </div>
</div>

<div id="ModalDeleteEducation" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmDeleteEducation">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="" val="" id="education_id">
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title"> Education </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <h5> Do you want to delete Education ? </h5>
                </div>
                <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                        <input type="submit" class="btn btn-primary" value="Yes">
                </div>
            </form>
        </div>
    </div>
</div>


  <!-- /#PayGrade -->
  <div id="ModalEditPayGrade" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="frmEditPayGrade">
              <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="" val="" id="id_pay_grade_edit">
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title">Pay Grades</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6">
                          <div>
                              <label>Pay Grades  </label>
                              <input  name="pay_grade_name_edit" id="pay_grade_name_edit" type="text" class="form-control">
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div>
                              <label>Currency</label>
                              <select class="form-control" required id="currency_id_edit" name="currency_id_edit">
                                  <option value="">  -- Pleae Select Currency -- </option>
                                @php
                                     use App\Model\currency ;$currency = currency::all();
                                @endphp
                                 @foreach ($currency as $currencies)
                                 <option value="{{$currencies->id}}"> {{$currencies->name}}</option>                                     
                                 @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div>
                              <label> Max Salary </label>
                              <input placeholder="$"  name="max_salary_edit" id="max_salary_edit" type="number" class="form-control">
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div>
                              <label>Min Salary</label>
                              <input placeholder="$" name="min_salary_edit" id="min_salary_edit" type="number" class="form-control">
                          </div>
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

    <div id="DeletePayGrade" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <form id="frmPayGradeDelete">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="hidden" name="" val="" id="pay_grade_id">
                  <div class="modal-header theme-bg">						
                      <h4 class="modal-title"> PayGrade </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                      <h5> Do you want to delete payGrade ? </h5>
                  </div>
                  <div class="modal-footer">
                          <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                          <input type="submit" class="btn btn-primary" value="Yes">
                  </div>
              </form>
          </div>
      </div>
  </div>

    <div id="ModalPayGrade" class="modal fade">
      <div class="modal-dialog  modal-lg">
          <div class="modal-content">
              <form id="frmAddPayGrade">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                  <input type="hidden" name="" val="" id="id_jobTitle">
                  <div class="modal-header theme-bg">						
                      <h4 class="modal-title">Pay Grades</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label>Pay Grades  </label>
                                <input  name="pay_grade_name" id="pay_grade_name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label>Currency</label>
                                <select class="form-control" required id="currency_id" name="currency_id">
                                    <option value="">  -- Pleae Select Currency -- </option>
                                  @php $currency = currency::all(); @endphp
                                   @foreach ($currency as $currencies)
                                   <option value="{{$currencies->id}}"> {{$currencies->name}}</option>
                                       
                                   @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label> Max Salary </label>
                                <input placeholder="$"  name="max_salary" id="max_salary" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label>Min Salary</label>
                                <input placeholder="$" name="min_salary" id="min_salary" type="number" class="form-control">
                            </div>
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
    <!-- Job Title -->
    <div class="modal fade" id="jobTitleEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form id="frmJobTitleEdit">
                <input type="hidden" name="job_tittle_edit" id="job_tittle_edit">
                <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="modal-header" style="background:#0f66e8";>
              <h5 class="modal-title" style="color:white;" id="exampleModalLabel">Edit Job Tittle</h5>
            </div>
            <div class="modal-body">
            <div class="card-body">
                <div class="row">
                    <div>
                        <label>Name</label>
                        <input name="name_edit" id="name_edit" type="text" class="form-control">
                    </div>
                    <div>
                      <label>Description</label>
                      <textarea  name="description_edit" id="description_edit" class="form-control" cols='5' rows='5'></textarea>
                  </div>
                  
                </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>

    <div id="DeleteJobTtile" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmJobTitleDelete">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="" val="" id="id_jobTitle">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title">Job Title</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h5> Do you want to delete job Title? </h5>
                    </div>
                    <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                            <input type="submit" class="btn btn-success" value="Yes">
                    </div>
                </form>
            </div>
        </div>
 </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="frmJobTitle">
          <meta name="csrf-token" content="{{ csrf_token() }}">
      <div class="modal-header" style="background:#0f66e8";>
        <h5 class="modal-title" style="color:white;" id="exampleModalLabel">Job Tittle</h5>
      </div>
      <div class="modal-body">
      <div class="card-body">
          <div class="row">
              <div>
                  <label>Name</label>
                  <input name="name" id="name" type="text" class="form-control">
              </div>
              <div>
                <label>Description</label>
                <textarea  name="description" id="description" class="form-control" cols='5' rows='5'></textarea>
            </div>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('js/backend/skill.js')}}"></script>
    <script src="{{asset('js/backend/education.js')}}"></script>
@endsection