@extends('backend.layouts.master')
@section('content')
<style>

/*  bhoechie tab */
div.bhoechie-tab-container{
  /* z-index: 10; */
  /* background-color: #ffffff; */
  padding: 0 !important;
  /* border-radius: 4px; */
  /* -moz-border-radius: 4px; */
  /* border:1px solid #ddd; */
  /* margin-top: 20px; */
  /* margin-left: 50px; */
  /* -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175); */
  /* background-clip: padding-box; */
  /* opacity: 0.97; */
  /* filter: alpha(opacity=97); */
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #5A55A3;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #5A55A3;
  background-image: #5A55A3;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #5A55A3;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}
</style>
<div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                            <div class="col-lg-11 col-md-5 col-sm-8 col-xs-10 bhoechie-tab-container">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                                      <div class="list-group">
                                        <a href="#" class="list-group-item active text-center">
                                                <h4 style="font-size:1em;color:black;" class="ti-trash"></h4>Job Title
                                        </a>
                                        <a href="#" class="list-group-item text-center">
                                                <h4 style="font-size:1em;color:black;" class="ti-trash"></h4>Pay Grades<br/>
                                        </a>
                                        <a href="#" class="list-group-item text-center">
                                                <h4 style="font-size:1em;color:black;" class="ti-trash"></h4>Employement Status<br/>
                                        </a>
                                        <a href="#" class="list-group-item text-center">
                                                <h4 style="font-size:1em;color:black;" class="ti-trash"></h4>Job Categories<br/>
                                        </a>
                                        <a href="#" class="list-group-item text-center">
                                            <h4 style="font-size:1em;color:black;" class="ti-trash"></h4>Work Shift<br/>
                                        </a>
                                      </div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                                        <!-- flight section -->
                                        <div class="bhoechie-tab-content active">
                                            <div class="card-header">
                                                <div class="pull-right">
                                                    <a class="btn btn-primary" onclick="myfunc()" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-plus"></i></a>
                                                </div>
                                                <input type="text" class="form-control wide-width" placeholder="Search & type" />
                                            </div>
                                                <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">#No</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Action</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>
                                                                    <a onclick="Edit();"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                    <a onclick="Delete();" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                            </td>
                                                          </tr>  
                                                        </tbody>
                                                      </table>
                                        </div>
                                        <!-- train section -->
                                        <div class="bhoechie-tab-content">
                                            <div class="card-header">
                                                <div class="pull-right">
                                                    <a class="btn btn-primary" onclick="myfunc()" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-plus"></i></a>
                                                </div>
                                                <input type="text" class="form-control wide-width" placeholder="Search & type" />
                                            </div>
                                                <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">#No</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Action</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>
                                                                    <a onclick="Edit();"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>
                                                                    <a onclick="Delete();" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                                                            </td>
                                                          </tr>  
                                                        </tbody>
                                                      </table>
                                        </div>
                            
                                        <!-- hotel search -->
                                        <div class="bhoechie-tab-content">
                                            <center>
                                              <h1 class="ti-trash" style="font-size:12em;color:#55518a"></h1>
                                              <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                              <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
                                            </center>
                                        </div>
                                        <div class="bhoechie-tab-content">
                                            <center>
                                              <h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
                                              <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                              <h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
                                            </center>
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
@endsection
@section('scripts')

    <script>
        $(document).ready(function() {
        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
    </script>
@endsection