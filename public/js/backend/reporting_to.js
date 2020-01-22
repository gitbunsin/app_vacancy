$("#frmEmployeeReportingToEdit").validate({
    rules: {
        Supervisor_id_edit: {
          required: true,
       } ,reporting_method_id_edit : {
        required: true,
       }
    }, submitHandler: function (form) {
        var id = $('#emloyee_Supervisor_id_edit').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employee/report/update/supervisor/" + id,
            method: 'POST',
            data: {
                "Supervisor_id" : $('#Supervisor_id_edit').val(),
                "reporting_method_id" : $('#reporting_method_id_edit').val()
            },
            success: function(result)
            {
               console.log(result);
               $('#showModalReportingToEdit').modal('hide');
               toastr.success('Success' , 'item has been updated !');
               var supervisors = '<tr id="tr_assigned_supervisors' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.supervisor.last_name + ' ' + result.supervisor.first_name + '</td><td>' + result.reporting_method.name + '</td>';
               supervisors += '<th><a onclick="Editsupervisor(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Skill"><i class="icon-edit"></i></a>  <a onclick="Deletesupervisor(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Skill"><i class="ti-trash"></i></a></th></tr>';
               $('#tr_assigned_supervisors'+result.id ).replaceWith(supervisors);

            },error : function(err){

                console.log(err);
            }
        });
    }
});
function Editsupervisor(id)
{
   $('#emloyee_Supervisor_id_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/employee/report/delete/supervisor/" + id,
      success: function(result)
      {
          console.log(result);
       $('#showModalReportingToEdit').modal('show');
     
       //console.log(result.currency);
       var supervisor = $('#Supervisor_id_edit');
       supervisor.empty();
       $.each(result.all_supervisor, function (key , value) {
             var isSelected = '';
             if(result.supervisor.id == value.id)
             {
                isSelected = 'selected';
             }
             supervisor.append('<option value="'+value.id+'" '+isSelected+' >'+value.last_name + ' ' +value.first_name +'</option>');
      });

      var reporting_method = $('#reporting_method_id_edit');
      reporting_method.empty();
      $.each(result.all_reporting_method, function (key , value) {
            var isSelected = '';
            if(result.reporting_method.reporting_method_id == value.id)
            {
               isSelected = 'selected';
            }
            reporting_method.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
     });



      },error : function(err){
            console.log(err);
      }
  });
}

function Deletesupervisor(id){

    $('#ModalDeleteSupervoir').modal('show');
    $('#employee_Supervoir_id').val(id);
}

$('#frmEmployeeDeleteModalDeleteSupervoir').validate({
    submitHandler: function (form) {
        var id = $('#employee_Supervoir_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employee/report/delete/supervisor/"+ id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteSupervoir').modal('hide');
                $('#tr_assigned_supervisors'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

 function ShowModalReportosupervisors() {
           // $(this).find('form')[0].reset();
            $('#showModalReportingTo').modal('show');
            $("#frmEmployeeReportingTo").trigger('reset');
    }

    $("#frmEmployeeReportingTo").validate({
        rules: {
            Supervisor_id: {
              required: true,
           } ,reporting_method_id : {
            required: true,
           }
        }, submitHandler: function (form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "/admin/employee/report/supervisor",
                method: 'POST',
                data: {
                    "Supervisor_id" : $('#Supervisor_id').val(),
                    "reporting_method_id" : $('#reporting_method_id').val()
                },
                success: function(result)
                {
                   console.log(result);
                   $('#showModalReportingTo').modal('hide');
                   toastr.success('Success' , 'item has been create !');
                   var supervisors = '<tr id="tr_assigned_supervisors' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.supervisor.last_name + ' ' + result.supervisor.first_name + '</td><td>' + result.reporting_method.name + '</td>';
                   supervisors += '<th><a onclick="Editsupervisor(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Skill"><i class="icon-edit"></i></a>  <a onclick="Deletesupervisor(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Skill"><i class="ti-trash"></i></a></th></tr>';
                   $('#tbl_assigned_supervisors').append(supervisors);
    
                },error : function(err){
    
                    console.log(err);
                }
            });
        }
    });