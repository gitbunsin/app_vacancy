@extends('backend.layouts.master')
@section('content')

    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <!-- General Information -->
                <div class="card">

                    <div class="card-header">
                        <h4>General Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-4">
                                <label>Job Title</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Company Name</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Category</label>
                                <select class="form-control">
                                    <option>Information Of Technology</option>
                                    <option value="1">Hardware</option>
                                    <option value="2">Machanical</option>
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>Position</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>Experience</label>
                                <select class="form-control">
                                    <option>0 To 6 Month</option>
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Year</option>
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>No. Of Vacancy</label>
                                <input type="number" class="form-control" value="1">
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
                                <label>Company Logo</label>
                                <div class="custom-file-upload">
                                    <input type="file" id="file" name="myfiles[]" multiple />
                                </div>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>Job Type</label>
                                <select class="form-control">
                                    <option>Full Time</option>
                                    <option value="1">Part Time</option>
                                    <option value="2">Freelancer</option>
                                </select>
                            </div>

                            <div class="col-sm-6 m-clear">
                                <label>Min Qualification</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-6 m-clear">
                                <label>Last Date</label>
                                <input type="text" data-toggle="datepicker" class="form-control">
                            </div>

                            <div class="col-sm-6">
                                <label>Free/Paid Job</label>
                                <div class="row">
                                    <div class="col-sm-5 col-xs-6">
                                        <div class="custom-radio">
                                            <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck" checked>
                                            <label for="noCheck">Free</label>

                                            <input type="radio" onclick="javascript:yesnoCheck();"  name="yesno" id="yesCheck">
                                            <label for="yesCheck">Paid</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-7 col-xs-6">
                                        <div id="ifYes" style="visibility:hidden">
                                            <input type="text" class="form-control" id='yes' name='yes' placeholder="$30">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <label>Skills</label>
                                <select class="multiple-skill form-control" name="skills[]" multiple="multiple">
                                    <option>HTML5</option>
                                    <option>Css3</option>
                                    <option>Photoshop</option>
                                    <option>Php</option>
                                    <option>Wordpress</option>
                                    <option>Bootstrap</option>
                                    <option>Magento</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- General Information -->
                <div class="card">

                    <div class="card-header">
                        <h4>Company Address</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-4">
                                <label>Email</label>
                                <input type="email" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Phone No.</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Landline</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Website Link</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Address</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>City</label>
                                <select class="form-control">
                                    <option>Allahabad</option>
                                    <option value="1">Faizabad</option>
                                    <option value="2">Sultanpur</option>
                                    <option value="3" disabled>Pratapgarh</option>
                                    <option value="4">Basti</option>
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>State</label>
                                <select class="form-control">
                                    <option>Uttar Pradesh</option>
                                    <option value="1">Uttrakhand</option>
                                    <option value="2">Chandigarh</option>
                                    <option value="3" disabled>Punjab</option>
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>Country</label>
                                <select class="form-control">
                                    <option>India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">Austrailia</option>
                                    <option value="3" disabled>New ZeLand</option>
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>Zip Code</label>
                                <input type="text" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Social Accounts -->
                <div class="card">

                    <div class="card-header">
                        <h4>Social Accounts</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-4">
                                <label><i class="fa fa-facebook mrg-r-5"></i>Facebook</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label><i class="fa fa-google-plus mrg-r-5"></i>Google +</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label><i class="fa fa-twitter mrg-r-5"></i>Twitter</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label><i class="fa fa-linkedin mrg-r-5"></i>LinkedIn</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label><i class="fa fa-pinterest mrg-r-5"></i>Pinterest</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label><i class="fa fa-instagram mrg-r-5"></i>Instagram</label>
                                <input type="text" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Qualification & Instruction -->
                <div class="card">

                    <div class="card-header">
                        <h4>Qualification & Instruction</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-12">
                                <label>Qualification & Instruction</label>
                                <textarea class="form-control height-120 textarea" id="about-company" placeholder="About Company"></textarea>
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
    <!-- /#page-wrapper -->
        <script>
            function yesnoCheck() {
                if (document.getElementById('yesCheck').checked) {
                    document.getElementById('ifYes').style.visibility = 'visible';
                }
                else document.getElementById('ifYes').style.visibility = 'hidden';

            }
        </script>
@endsection

