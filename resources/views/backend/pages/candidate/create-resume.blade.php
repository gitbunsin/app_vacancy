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
                                <label>First Name</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Last Name</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Email</label>
                                <input type="email" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Phone</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Designation</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Category</label>
                                <select class="wide form-control">
                                    <option data-display="Location">Information Of Technology</option>
                                    <option value="1">Hardware</option>
                                    <option value="2">Machanical</option>
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>Experience</label>
                                <select class="wide form-control">
                                    <option data-display="Experience">0 To 6 Month</option>
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Year</option>
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>Job Type</label>
                                <select class="wide form-control">
                                    <option data-display="Job Type">Full Time</option>
                                    <option value="1">Part Time</option>
                                    <option value="2">Freelancer</option>
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>Expect Package</label>
                                <select class="wide form-control">
                                    <option data-display="Package">2,00000 CTC</option>
                                    <option value="1">3,00000 CTC</option>
                                    <option value="2">4,00000 CTC</option>
                                </select>
                            </div>

                            <div class="col-sm-12 m-clear">
                                <label>Skills</label>
                                <input type="text" class="form-control" placeholder="CSS, Photoshop, Js, Bootstrap">
                            </div>

                            <div class="col-sm-12">
                                <label>Career</label>
                                <textarea class="form-control height-120 textarea" id="career" placeholder="Career"></textarea>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Personal Detail & Address -->
                <div class="card">

                    <div class="card-header">
                        <h4>Personal Detail & Address</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-4">
                                <label>Birth</label>
                                <input type="text" class="form-control" data-toggle="datepicker">
                            </div>

                            <div class="col-sm-4">
                                <label>Address</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>City</label>
                                <select class="wide form-control">
                                    <option data-display="City">Allahabad</option>
                                    <option value="1">Faizabad</option>
                                    <option value="2">Sultanpur</option>
                                    <option value="3" disabled>Pratapgarh</option>
                                    <option value="4">Basti</option>
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>State</label>
                                <select class="wide form-control">
                                    <option data-display="State">Uttar Pradesh</option>
                                    <option value="1">Uttrakhand</option>
                                    <option value="2">Chandigarh</option>
                                    <option value="3" disabled>Punjab</option>
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>Country</label>
                                <select class="wide form-control">
                                    <option data-display="Country">India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">Austrailia</option>
                                    <option value="3" disabled>New ZeLand</option>
                                </select>
                            </div>

                            <div class="col-sm-4 m-clear">
                                <label>Zip Code</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Father Name</label>
                                <input type="text" class="form-control">
                            </div>


                            <div class="col-sm-4">
                                <label>Hobbies(With Comma)</label>
                                <input type="text" class="form-control">
                            </div>


                            <div class="col-sm-4">
                                <label>Strength</label>
                                <input type="text" class="form-control">
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Add Qualification -->
                <div class="card">

                    <div class="card-header">
                        <h4>Add Qualification</h4>
                    </div>

                    <div class="card-body">
                        <div class="extra-field-box">
                            <div class="multi-box">
                                <div class="dublicat-box">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <label>Degree Name</label>
                                            <input type="text" class="form-control">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>School Name</label>
                                            <input type="text" class="form-control">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Date From</label>
                                            <input type="text" class="form-control" data-toggle="datepicker">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Date To</label>
                                            <input type="text" class="form-control" data-toggle="datepicker">
                                        </div>

                                    </div>
                                    <button type="button" class="btn remove-field light-gray-btn">Remove</button>
                                </div>
                            </div>
                            <div class="text-center"><button type="button" class="btn add-field btn-primary">Add More</button></div>
                        </div>
                    </div>

                </div>

                <!-- Experience -->
                <div class="card">

                    <div class="card-header">
                        <h4>Experience</h4>
                    </div>

                    <div class="card-body">
                        <div class="extra-field-box">
                            <div class="multi-box">
                                <div class="dublicat-box">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <label>Employer</label>
                                            <input type="text" class="form-control">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Designation</label>
                                            <input type="text" class="form-control">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Date From</label>
                                            <input type="text" class="form-control" data-toggle="datepicker">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Date To</label>
                                            <input type="text" class="form-control" data-toggle="datepicker">
                                        </div>

                                    </div>
                                    <button type="button" class="btn remove-field light-gray-btn">Remove</button>
                                </div>
                            </div>
                            <div class="text-center"><button type="button" class="btn add-field btn-primary">Add More</button></div>
                        </div>
                    </div>

                </div>
                <!-- Resume Content -->
                <div class="card">

                    <div class="card-header">
                        <h4>Resume Content</h4>
                    </div>

                    <div class="card-body">
                        <textarea class="form-control height-120 textarea" id="resume-text" placeholder="About Company"></textarea>
                    </div>

                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-m btn-success">Submit &amp; Exit</button>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
</div>
@endsection