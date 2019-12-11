


function EditWorkShift(id)
{
   $('#work_shift_id_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/WorkShift" + "/" + id + "/edit",
      success: function(result)
      {
        //  console.log(result.employee_work_shift);
         $('#ModalWorkShiftEdit').modal('show');

         $('#name_edit').val(result.name);
         $('#start_time_edit').val(result.start_time);
         $('#end_time_edit').val(result.end_time);
         $('#duration_edit').val(result.hours_per_day);

           // WorkShitf
           var w = $('#duallistbox_demo2_edit');
           w.empty();
           $.each(result.all_employee, function (key , value) {
             $.each(result.employee_work_shift, function (x , xx) {
                // console.log(xx);
               var isSelected = '';
              //  console.log(value);
               if(value.id == xx.employee_id)
               {
                   isSelected = 'selected';
               }
               w.append('<option value="'+value.id+'" '+isSelected+' >'+value.first_name + ' ' + value.last_name +'</option>');
               w.bootstrapDualListbox('refresh', true);
           });
          });
         
        //  var options = '';
        // //  options.empty();
        //  for (var i = 0; i <result.all_employee.length; i++) {
        //   //  console.log(result.all_employee[i]['id']);
        //   var a = 1;
        //   for (var j = 0; j < result.employee_work_shift.length; j++) {

        //     //  console.log(result.employee_work_shift[j]['employee_id']);
        //       // Appending "selected" attribute to the values which are already selected
        //       if (result.employee_work_shift[j]['employee_id'] == result.all_employee[i]['id']) {

        //           isSelected = 'selected';
        //             console.log(result.all_employee[i]['last_name'] + ' ' + result.all_employee[i]['first_name']);
        //          options += '<option value="' + result.all_employee[i]['id'] + '" '+isSelected+'>' + result.all_employee[i]['first_name'] + '</option>';
        //          a = 0;
        //       }
        //       //options += '<option value="' + result.all_employee[i]['id'] + '" '+isSelected+' >' + result.all_employee[i]['first_name'] + '</option>';
        //       if (a == 1) {
        //         options += '<options value="' + result.all_employee[i]['id'] + '">' + result.all_employee[i]['first_name'] + '</options>';
        //     }
        //   }
        //   $("select#duallistbox_demo2_edit").empty().append(options);
        //   $("select#duallistbox_demo2_edit").trigger('bootstrapduallistbox.refresh', true);
          // Loading Country of operating dual-box field
          // $("#country-of-operation-edit").DualListBox();
          // $("select#bootstrap-duallistbox-selected-list_duallistbox_demo2[]").empty().append(optons);
          // $("select#bootstrap-duallistbox-selected-list_duallistbox_demo2[]").trigger('bootstrapduallistbox.refresh', true);

          // Loading Country of operating dual-box field
          // $("#demo3").DualListBox();
      // }

      },error : function(err){

            console.log(err);
      }
  });
}



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


var demo2 = $('.demo2').bootstrapDualListbox({
  nonSelectedListLabel: 'Available Employees',
  selectedListLabel: 'Assigned Employees',
  preserveSelectionOnMove: 'moved',
  moveOnSelect: false,
  // nonSelectedFilter: 'ion ([7-9]|[1][0-2])'
});