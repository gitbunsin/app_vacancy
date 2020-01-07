@extends('backend.layouts.master')
@section('content')
@php
    use App\Model\city;use App\Model\country;
@endphp
<style>
.overlay {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 25%;
  background-color: rgb(225, 225, 225);
  background-color: rgba(225, 225, 225, 0);
  overflow-y: hidden;
  transition: 0.5s;
}

.stepwizard-step p {
  margin-top: 10px;
}

.stepwizard-row {
  display: table-row;
}

.stepwizard {
  display: table;
  width: 100%;
  position: relative;
}

.stepwizard-step button[disabled] {
  opacity: 1 !important;
  filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
  top: 14px;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 100%;
  height: 1px;
  background-color: #ccc;
  z-order: 0;
}

.stepwizard-step {
  display: table-cell;
  text-align: center;
  position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
  
/* my code */
  pointer-events: none;
}

.modal-dialog {
  z-index: 9999;
  position: relative;
}

</style>
    
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <div class="pull-right">
                            <a href="{{url('admin/payment/create')}}" class="btn btn-primary"  title="Payment"><i class="ti-plus"></i> Add Payment</a>
                        </div>
                        <input type="text" class="form-control wide-width" placeholder="Search & type" />
                    </div>
                    <div class="card-body"> 

                            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                            
                                  <div class="stepwizard col-md-offset-3">
                                    <div class="stepwizard-row setup-panel">
                                      <div class="stepwizard-step">
                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            
                                        <p>Step 1</p>
                                      </div>
                                      <div class="stepwizard-step">
                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                        <p>Step 2</p>
                                      </div>
                                      <div class="stepwizard-step">
                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                        <p>Step 3</p>
                                      </div>
                                    </div>
                                  </div>
                                  <!--Top section showing 1, 2 3-->
                            
                            
                                  <div class="modal-header" align="center">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                  </div>
                            
                            
                                 
                            
                                </div>
                              </div>
                            </div>
                            
                           
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="LoadModalPaymentModule" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="frmEditCategory">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" name="" val="" id="category_edit_id">
                        <div class="modal-header theme-bg">						
                            <h4 class="modal-title"> Payments</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                    <div class="stepwizard col-md-12">
                                            <div class="stepwizard-row setup-panel">
                                              <div class="stepwizard-step">
                                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                                <p>Step 1</p>
                                              </div>
                                              <div class="stepwizard-step">
                                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                                <p>Step 2</p>
                                              </div>
                                              <div class="stepwizard-step">
                                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                                <p>Step 3</p>
                                              </div>
                                            </div>
                                          </div>

                                            <div class="row setup-content" id="step-1">
                                              <div class="col-xs-12">
                                                <div class="col-md-12">
                                                  <h3> Step 1</h3>
                                                  <div class="form-group">
                                    
                                                    <label class="control-label">Name</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Name" />
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="control-label">Surname</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Surname" />
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <textarea required="required" class="form-control" placeholder="Enter Address"></textarea>
                                                  </div>
                                                  <button class="btn btn-primary nextBtn  pull-right" type="button">Next</button>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row setup-content" id="step-2">
                                              <div class="col-xs-12">
                                                <div class="col-md-12">
                                                  <h3> Step 2</h3>
                                                  <div class="form-group">
                                                    <label class="control-label">Company Name</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="control-label">Company Address</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                                                  </div>
                                                  <button class="btn btn-primary nextBtn  pull-right" type="button">Next</button>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row setup-content" id="step-3">
                                              <div class="col-xs-6 col-md-offset-3">
                                                <div class="col-md-12">
                                                  <h3> Step 3</h3>
                                                  <button class="btn btn-success pull-right" type="submit">Submit</button>
                                                </div>
                                              </div>
                                            </div>                           
                            </div>
                        </div>
                        <div class="modal-footer">
                               
                        </div>
                    </form>
                </div>
            </div>
          </div>
@endsection
@section('scripts')
        <script src="/js/backend/payment.js"></script>
        <script>
            $(document).ready(function() {
  var navListItems = $('div.setup-panel div a'),
    allWells = $('.setup-content'),
    allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function(e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
      $item = $(this);

    if (!$item.hasClass('disabled')) {
      navListItems.removeClass('btn-primary').addClass('btn-default');
      $item.addClass('btn-primary');
      allWells.hide();
      $target.show();
      $target.find('input:eq(0)').focus();
    }
  });

  function closeNav() {
    document.getElementById("myNav").style.height = "0%";
  };

allNextBtn.click(function() {
  var curStep = $(this).closest(".setup-content"),
    curStepBtn = curStep.attr("id"),
    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
    curInputs = curStep.find("input[type='text'],input[type='url']"),
    isValid = true;

  $(".form-group").removeClass("has-error");
  for (var i = 0; i < curInputs.length; i++) {
    if (!curInputs[i].validity.valid) {
      isValid = false;
      $(curInputs[i]).closest(".form-group").addClass("has-error");
    }
  }

  if (isValid)
    nextStepWizard.removeAttr('disabled').trigger('click');
});

$('div.setup-panel div a.btn-primary').trigger('click');
});

        </script>
@endsection