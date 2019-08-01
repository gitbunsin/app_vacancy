@extends('backend.layouts.master')
@section('content')
    <form action="{{url('admin/job')}}" id='myform' method='post' enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <!-- General Information -->
                <div class="card">

                    <div class="card-header">
                        <h4>General Overview</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-4">
                                <label>Job Title</label>
                                <input  name="job_title" required  type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label>Company Name</label>
                                <?php use App\Model\Category;use App\Model\city;use App\Model\company;use App\Model\country;use App\Model\JobType;use App\Model\location;use App\Model\skill;$company  = company::all(); ?>
                                <select name="company_id" class="form-control" required>
                                    @foreach($company as $companies)
                                        <option value="{{$companies->id}}"> {{$companies->company_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label>Category</label>
                                <?php $category  = Category::all(); ?>
                                <select name="category_id" class="form-control">
                                    @foreach($category as $categories)
                                       <option value="{{$categories->id}}"> {{$categories->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 m-clear">
                                <label>Position</label>
                                <input name="position" type="text" class="form-control">
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>No. Of Vacancy</label>
                                <input name="no_of_position" type="number" class="form-control" value="1">
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>Package</label>
                                <select class="form-control">
                                    <option>2,00000 CTC</option>
                                    <option value="1">3,00000 CTC</option>
                                    <option value="2">4,00000 CTC</option>
                                </select>
                            </div>
                            <div class="col-sm-4 m-clear">
                                <label>Job Type</label>
                                <?php $jobType = JobType::all(); ?>
                                <select name="job_type_id" class="form-control">
                                    @foreach($jobType as $JobTypes)
                                      <option value="{{$JobTypes->id}}">{{$JobTypes->name}}</option>
                                   @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label> Skills</label>
                                <?php $skill = skill::all(); ?>
                                <select class="multiple-skill form-control" name="skill[]" multiple="multiple">
                                    @foreach($skill as $skills)
                                        <option value="{{$skills->id}}">{{$skills->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>locations </label>
                                <?php $location = location::all(); ?>
                                <select name="location_id" class="form-control">
                                    @foreach($location as $locations)
                                        <option value="{{$locations->id}}">{{$locations->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 m-clear">
                                <label>Closing Date</label>
                                <input name="closingDate" type="text" data-toggle="datepicker" class="form-control">
                            </div>

                            <div class="col-sm-6">
                                <label>Free/Paid Job</label>
                                <div class="row">
                                    <div class="col-sm-5 col-xs-6">
                                        <div class="custom-radio">
                                            <input   type="radio" onclick="javascript:yesnoCheck();" name="public_in_feed" id="noCheck" checked>
                                            <label for="noCheck">Free</label>

                                            <input type="radio" onclick="javascript:yesnoCheck();"  name="public_in_feed" id="yesCheck">
                                            <label for="yesCheck">Paid</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-7 col-xs-6">
                                        <div id="ifYes" style="visibility:hidden">
                                            <input type="number" class="form-control" id='yes' name='public_in_feed' placeholder="$30">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 col-sm-3">Job Attachment:</label>
                                <div class="col-md-10 col-sm-9">
                                    <label class="btn-bs-file btn">
                                        Browse
                                        <input type="file" name="filename" id="filename">
                                    </label>
                                </div>
                            </div>
                            <!-- Qualification & Instruction -->
                                <div class="col-sm-12 col-md-12">
                                    <label>Job Description  & Job Requirement</label>
                                    <textarea name="job_description" class="form-control height-120 textarea" id="about-company" placeholder="About Company"></textarea>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- General Candidate Information  -->
                <div class="card">
                    <div class="card-header">
                        <h4>Candidate Overview</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 ">
                                <label>Offer Salary</label>
                                <div class="row">
                                    <div class="col-sm-5 col-xs-6">
                                        <div class="custom-radio">
                                            <input value="Negotiate" type="radio" onclick="javascript:YesNoSalary();" name="salary" id="noSalary" checked>
                                            <label for="noSalary">Negotiate</label>

                                            <input value="Paid" type="radio" onclick="javascript:YesNoSalary();"  name="salary" id="YesSalary">
                                            <label for="YesSalary">Paid</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-xs-6">
                                        <div id="ifYesSalary" style="visibility:hidden">
                                            <input type="text" class="form-control" id='offer_salary' name='offer_salary' placeholder="$30">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 m-clear">
                                <label>Gender </label>
                                <select class="form-control" name="gender">
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <label>Career Level</label>
                                <input name="career_level" type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Industry</label>
                                <input name="industry" type="text" class="form-control">
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>Experience</label>
                                <select class="form-control" name="experience">
                                    <option value="0 To 6 Month">0 To 6 Month</option>
                                    <option value="1 Year">1 Year</option>
                                    <option value="2 Year">2 Year</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Qualification</label>
                                <input type="text" class="form-control" name="qualification">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-m btn-success">Submit & Exit</button>
                </div>

            </div>
        </div>
        <!-- /row -->
    </div>
    </div>
</form>
    <!-- /#page-wrapper -->

        <script>

            function yesnoCheck() {
                if (document.getElementById('yesCheck').checked) {
                    document.getElementById('ifYes').style.visibility = 'visible';
                }
                else document.getElementById('ifYes').style.visibility = 'hidden';
            }

            function YesNoSalary() {
                if (document.getElementById('YesSalary').checked) {
                    document.getElementById('offer_salary').style.visibility = 'visible';
                }
                else document.getElementById('offer_salary').style.visibility = 'hidden';
            }
        </script>
@endsection