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
                                                <a class="btn btn-primary" onclick="LoadLicense()" data-toggle="tooltip" data-placement="top" title="License"><i class="ti-plus"></i></a>
                                            </div>
                                            <h3><span class="ti-home"></span> License </h3>
                                        </div>
                                            <table class="table" id="tbl_license">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">#No</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach ($license as $key => $licenses)
                                                      <tr id="tr_license{{$licenses->id}}">
                                                          <th scope="row">{{$key + 1}}</th>
                                                          <td>{{$licenses->name}}</td>
                                                          <th>
                                                                <a onclick="EditLicense({{$licenses->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                <a onclick="DeleteLicense({{$licenses->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                          </th>
                                                        </tr>  
                                                      @endforeach
                                                    </tbody>
                                                  </table>
                                        </div>
                                        <div class="bhoechie-tab-content">
                                          <div class="card-header">
                                            <div class="pull-right">
                                                <a class="btn btn-primary" onclick="LoadLanguage()" data-toggle="tooltip" data-placement="top" title="Language"><i class="ti-plus"></i></a>
                                            </div>
                                            <h3><span class="ti-home"></span> Languages</h3>
                                        </div>
                                            <table class="table" id="tbl_language">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">#No</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach ($language as $key => $languages)
                                                      <tr id="tr_language{{$languages->id}}">
                                                          <th scope="row">{{$key + 1}}</th>
                                                          <td>{{$languages->name}}</td>
                                                          <th>
                                                                <a onclick="EditLanguage({{$languages->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                <a onclick="DeleteLanguage({{$languages->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                          </th>
                                                        </tr>  
                                                      @endforeach
                                                    </tbody>
                                                  </table>
                                        </div>
                                        <div class="bhoechie-tab-content">
                                            <div class="card-header">
                                                <div class="pull-right">
                                                    <a class="btn btn-primary" onclick="LoadMemership()" data-toggle="tooltip" data-placement="top" title="Membership"><i class="ti-plus"></i></a>
                                                </div>
                                                <h3><span class="ti-home"></span> Memberships </h3>
                                            </div>
                                                <table class="table" id="tbl_membership">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">#No</th>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          @foreach ($membership as $key => $memberships)
                                                          <tr id="tr_memebership{{$memberships->id}}">
                                                              <th scope="row">{{$key + 1}}</th>
                                                              <td>{{$memberships->name}}</td>
                                                              <th>
                                                                    <a onclick="EditMembership({{$memberships->id}});"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                    <a onclick="DeletMembership({{$memberships->id}});" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                              </th>
                                                            </tr>  
                                                          @endforeach
                                                        </tbody>
                                                      </table>
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

    <!-- /#Membership-->


    <div id="ModalDeleteMembership" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmDeleteMemebership">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="" val="" id="membership_id">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title"> Memberships </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h5> Do you want to delete Memberships ? </h5>
                    </div>
                    <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                            <input type="submit" class="btn btn-primary" value="Yes">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div id="ModalEditMembership" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmEditMembership">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="" val="" id="mebership_id_edit">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title"> Memberships </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                              <div>
                                  <div>
                                      <label> Name </label>
                                      <input  name="membership_name_edit" id="membership_name_edit" type="text" class="form-control">
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
    
    <div id="ModalAddMembership" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmAddMembership">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" name="" val="" id="membership_id">
                    <div class="modal-header theme-bg">						
                        <h4 class="modal-title"> Memberships </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                              <div>
                                  <div>
                                      <label> Name </label>
                                      <input  name="membership_name" id="membership_name" type="text" class="form-control">
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
    


    <!--  End Membership -->




<!-- /#Langauge-->

<div id="ModalDeleteLanguage" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmDeleteLangauge">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="" val="" id="langauge_id">
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title"> Education </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <h5> Do you want to delete Langauge ? </h5>
                </div>
                <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                        <input type="submit" class="btn btn-primary" value="Yes">
                </div>
            </form>
        </div>
    </div>
</div>

<div id="ModalEditLanguage" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditLanguage">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="" val="" id="language_id_edit">
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title"> Language </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                          <div>
                              <div>
                                  <label> Name </label>
                                  <input  name="language_name_edit" id="language_name_edit" type="text" class="form-control">
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

<div id="ModalAddLanguage" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddLanguage">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="" val="" id="language_id">
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title"> Language </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                          <div>
                              <div>
                                  <label> Name </label>
                                  <input  name="language_name" id="language_name" type="text" class="form-control">
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



<!-- /#License -->

<div id="ModalAddLicense" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddLicense">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="" val="" id="license_id">
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title"> License </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                          <div>
                              <div>
                                  <label> Name </label>
                                  <input  name="license_name" id="license_name" type="text" class="form-control">
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


  <div id="ModalDeleteLicense" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmDeleteLicense">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="" val="" id="license_id">
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title"> License </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <h5> Do you want to delete License ? </h5>
                </div>
                <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                        <input type="submit" class="btn btn-primary" value="Yes">
                </div>
            </form>
        </div>
    </div>
  </div>


  <div id="ModalEditLicense" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditLicense">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="" val="" id="licenes_id_edit">
                <div class="modal-header theme-bg">						
                    <h4 class="modal-title"> License </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                          <div>
                              <div>
                                  <label> Name </label>
                                  <input  name="license_name_edit" id="license_name_edit" type="text" class="form-control">
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





<!-- /#Skill -->

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

</div>
@endsection
@section('scripts')
    <script src="{{asset('js/backend/skill.js')}}"></script>
    <script src="{{asset('js/backend/education.js')}}"></script>
    <script src="{{asset('js/backend/license.js')}}"></script>
    <script src="{{asset('js/backend/language.js')}}"></script>
    <script src="{{asset('js/backend/membership.js')}}"></script>
@endsection