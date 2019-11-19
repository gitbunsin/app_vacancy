@extends('backend.layouts.master')
@section('content')
    <form action="{{url('admin/employee')}}" id='frmEmployee' method='post' enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- General Company Information  -->
                <div class="card">
                    <div class="card-header">
                        <h4>Create Employee</h4>
                    </div>
                    <div class="card-body">
                        <input type="hidden" value="{{auth()->guard('admin')->user()->id}}" id="admin_id" name="admin_id">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>First Name</label>
                                <input required name="first_name" type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label>Middle Name .</label>
                                <input name="middle_name" type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label>Last Name</label>
                                <input required name="last_name" type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label>Employee Profile.</label>
                                <input name="photo" type="file" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                @php use Illuminate\Support\Facades\DB;$last2 = DB::table('employees')->orderBy('employee_id', 'DESC')->first();@endphp
                                <label>Employee ID </label>
                                <input readonly name="employee_id" value="{{str_pad($last2 == null ? ' ' : $last2->employee_id + 1, 2, '0', STR_PAD_LEFT)}}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Social Accounts -->
                <div class="card">
                    <div class="card-header">
                        <h4><input id="checkbox" type="checkbox" /> User Account login</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6" id="div_username">
                                <label><i class="fa fa-user mrg-r-5"></i> Username</label>
                                <input  name="username" id="username" type="text" class="form-control">
                            </div>
                            <div class="col-sm-6" id="div_password">
                                <label><i class="fa fa-lock mrg-r-5"></i>Password </label>
                                <input name="password" id="password" type="password" class="form-control">
                            </div>
                            <div class="col-sm-6" id="div_email">
                                <label><i class="fa-facebook fa mrg-r-5"></i>email</label>
                                <input name="email" type="email" class="form-control">
                            </div>
                            <div class="col-sm-6" id="div_confirm_password">
                                <label><i class="fa fa-twitter mrg-r-5"></i>Confirm Password </label>
                                <input oninput="check(this)";  name="confirm_password" id="confirm_password" type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-m btn-success">Save & Exit</button>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    </div>
</form>
    <!-- /#page-wrapper -->
@endsection
@section('scripts')
    <script type="text/javascript">


        //check confirm password
        function check(input) {
            if (input.value != document.getElementById('password').value) {

                input.setCustomValidity('Password Must be Matching.');
            } else {
                // input is valid -- reset the error message
                input.setCustomValidity('');
            }
        }


        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            let index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });


        $(document).ready(function () {


            $('#div_username').hide();
            $('#div_password').hide();
            $('#div_confirm_password').hide();
            $('#div_email').hide();

            let checkbox = $('#checkbox');

            $('input').on('click',function () {

                if (checkbox.is(':checked')) {

                    $('#div_username').show();
                    $('#div_password').show();
                    $('#div_confirm_password').show();
                    $('#div_email').show();
                    $("#username").prop('required',true);
                    $("#password").prop('required',true);

                } else {

                    $('#div_username').hide();
                    $('#div_password').hide();
                    $('#div_confirm_password').hide();
                    $('#div_email').hide();
                    $('#username').val("");
                    $('#password').val("");
                    $('#confirm_password').val("");
                    $('#email').val("");
                    $("#username").prop('required',false);
                    $("#password").prop('required',false);

                }
            });
        });

    </script>
@endsection

