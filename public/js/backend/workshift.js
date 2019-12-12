var demo1 = $('select[name="duallistbox_demo2_edit[]"]').bootstrapDualListbox({
    nonSelectedListLabel: 'Available Reviewers',
    selectedListLabel: 'Assigned Reviewer',
    preserveSelectionOnMove: 'moved',
    moveOnSelect: true,
    helperSelectNamePostfix: '_helper',
    nonSelectedFilter: ''

});


function EditWorkShift(id)
{
   $('#work_shift_id_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/WorkShift" + "/" + id + "/edit",
      success: function(result)
      {

        // console.log(result);
            // WorkShitf
         var w = $('#duallistbox_demo2_edit');
        //  console.log(result.employee_work_shift);
         $('#ModalWorkShiftEdit').modal('show');
         $('.demo1').bootstrapDualListbox('refresh', true);

         $('#name_work_shift_edit').val(result.name);
         $('#start_time_edit').val(result.start_time);
         $('#end_time_edit').val(result.end_time);
         $('#duration_edit').val(result.hours_per_day);

         
        //  w.bootstrapDualListbox('destroy');

        for(var i = 0; i<result.all_employee.length; i++){
            // console.log(result.all_employee[i]['id']);
            for (var j = 0; j < result.employee_work_shift.length; j++) {
                    if(result.all_employee[i]['id'] == result.employee_work_shift[j]['employee_id'])
                    {
                        // console.log(result.all_employee[i]['first_name']);
                        isSelected = 'selected';
                        w.append('<option value="'+result.all_employee[i]['id']+'" '+isSelected+' >'+result.all_employee[i]['first_name'] + ' ' + result.all_employee[i]['last_name']+'</option>');
                        w.bootstrapDualListbox('refresh', true);
                       
                    }
            }
        }

      },error : function(err){

            console.log(err);
      }
  });
}

        // Edit Employee WorkShift
        $("#frmEditWorkShift").validate({
            rules: {
                name_work_shift_edit: {
                  required: true,
               },
            }, submitHandler: function (form) {
         
               var id  = $('#work_shift_id_edit').val();
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               jQuery.ajax({
                   url: "/admin/WorkShift" + '/' + id,
                   method: 'PUT',
                   data: {
                    "name" : $('#name_work_shift_edit').val(),
                    "employee" : $('#duallistbox_demo2_edit').val(),
                    "start_time" : $('#start_time_edit').val(),
                    "end_time" : $('#end_time_edit').val(),
                    "duration" : $('#duration_edit').val()
                },
                   success: function (result) {
                     //console.log(result);
                     $('#ModalWorkShiftEdit').modal('hide');
                     toastr.success('Success' , 'item has been updated !');
                     var workShift = '<tr id="tr_work_shift' + result.id + '"> <th class="scope="row">' + result.id + '</th><td>' + result.name + '</td><td>' + result.start_time + '</td><td>' + result.end_time + '</td><td>' + result.hours_per_day + '</td>';
                     workShift += '<th><a onclick="EditWorkShift(' + result.id + ');" class="btn btn-primary"  title="WorkShift"><i class="icon-edit"></i></a>  <a onclick="DeleteWorkShift(' + result.id + ');"  class="btn btn-danger" title="WorkShift"><i class="ti-trash"></i></a></th></tr>';
                    //  $('#tbl_work_shift').append(workShift);
                     $("#tr_work_shift" + result.id).replaceWith(workShift);
                   },error : function(err){
                        console.log(err);
                   }
                  });
            }
         });











$("#frmAddWorkShift").validate({
  rules: {
    name: {
        required: true,
     }
  }, submitHandler: function (form) {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      jQuery.ajax({
          url: "/admin/WorkShift",
          method: 'POST',
          data: {
              "name" : $('#name').val(),
              "employee" : $('#duallistbox_demo2').val(),
              "start_time" : $('#start_time').val(),
              "end_time" : $('#end_time').val(),
              "duration" : $('#duration').val()
          },
          success: function(result)
          {
            //  console.log(result);
             $('#ModalWorkShift').modal('hide');
             toastr.success('Success' , 'item has been create !');
             var workShift = '<tr id="tr_work_shift' + result.id + '"> <th class="scope="row">' + result.id + '</th><td>' + result.name + '</td><td>' + result.start_time + '</td><td>' + result.end_time + '</td><td>' + result.hours_per_day + '</td>';
             workShift += '<th><a onclick="EditWorkShift(' + result.id + ');" class="btn btn-primary"  title="WorkShift"><i class="icon-edit"></i></a>  <a onclick="DeleteWorkShift(' + result.id + ');"  class="btn btn-danger" title="WorkShift"><i class="ti-trash"></i></a></th></tr>';
             $('#tbl_work_shift').append(workShift);

          },error : function(err){

              console.log(err);
          }
      });
  }
});

function DeleteWorkShift(id)
{
    $('#ModalDeleteWorkShift').modal('show');
    $('#work_shift_id').val(id);
}

$('#frmDeleteWorkShift').validate({
  submitHandler: function (form) {
      var id = $('#work_shift_id').val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      jQuery.ajax({
          url: "/admin/WorkShift" + '/' + id,
          method: 'Delete',
          success: function (response) {
              $('#ModalDeleteWorkShift').modal('hide');
              $('#tr_work_shift' + response.id).remove();
              toastr.success('Success', 'item has been deleted !');
          }, error: function (err) {
              console.log(err);
          }
      });
  }
});






function LoadWorkShift(){
    $('#ModalWorkShift').modal('show');
    $('#frmDeleteWorkShift').trigger('reset');
    $('.demo2').bootstrapDualListbox('refresh', true);
}




  var timeControl = document.getElementById('end_time');
  timeControl.value = '17:00';

  $(function () { 
    function calculate() {
        var hours = parseInt($(".Time2").val().split(':')[0], 10) - parseInt($(".Time1").val().split(':')[0], 10);
        $(".Hours").val(hours);
    }
    $(".Time1,.Time2").change(calculate);
    calculate();
});


//edit 
var timeControl_edit = document.getElementById('end_time_edit');
timeControl_edit.value = '17:00';

$(function () { 
  function calculate() {
      var hours = parseInt($(".Time_edit_2").val().split(':')[0], 10) - parseInt($(".Time_edit_1").val().split(':')[0], 10);
      $(".Hours_edit").val(hours);
  }
  $(".Time_edit_1,.Time_edit_2").change(calculate);
  calculate();
});




var demo2 = $('.demo2').bootstrapDualListbox({
  nonSelectedListLabel: 'Available Employees',
  selectedListLabel: 'Assigned Employees',
  preserveSelectionOnMove: 'moved',
  moveOnSelect: false,
  // nonSelectedFilter: 'ion ([7-9]|[1][0-2])'
});