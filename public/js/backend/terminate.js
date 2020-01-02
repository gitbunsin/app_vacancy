function DeleteTerminateReason(id)
{
    $('#ModalDeleteTermination').modal('show');
    $('#employee_termination_delete_id').val(id);
}

$('#frmEmployeeDeleteTermination').validate({
    submitHandler: function (form) {
        var id = $('#employee_termination_delete_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employeeTerminate/" + id  ,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteTermination').modal('hide');
                $('.ul_id'+response.id).remove();
                toastr.success('Success', 'item has Deactivate!');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });


$('#frmEmployeeTerminateEdit').validate({
    rules : {
        reason_id_edit : {
          required : true
       },terminate_date_edit : {
           required : true
       }
    },
    submitHandler: function (form) {
        var id = $('#emloyee_terminate_id_edit').val();
                // console.log(extension); 
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                 jQuery.ajax({
                    url: "/admin/employeeTerminate/" + id  ,
                    type: 'PUT',
                    data: {
                        "reason_id" : $('#reason_id_edit').val(),
                        "employee_terminate_id" : $('#employee_termination_id').val(),
                        "date" : $('#terminate_date_edit').val(),
                        "note" : $('#terminate_note_edit').val(),
                    },
                     success: function (response) {
                         console.log(response.id);
                         $('#showModalReasonEdit').modal('hide');
                         // $('#tr_interview' + response.id).remove();
                      
                         let ul =
                         '<div id="candidate_attachment" class="ul_id'+response.id+' list" >' + 
                         '<li class="manage-list-row clearfix"> ' + 
                                ' <div class="job-info"> ' +
                                        ' <div class="job-details"> ' +
                                            ' <small class="job-company"><i class="ti-time"></i><b>Reason</b> : <a href="">' + response.reason.name + '</a> </small>'+
                                            ' <small class="job-company"><i class="ti-location-pin"></i><b>Date </b>:' + response.date + '</small> ' +        
                                            ' <small class="job-company"><i class="ti-file"></i><b>Note </b>: ' + response.note + '</small> ' +                                                                
                                         '</div>'+
                                     '</div>';
                                 ul += 
                                     '<div class="job-buttons">' + 
                                        '<a onclick="EditTerminateReason(' + response.id + ');" class="btn btn-primary"><i class="icon-edit"></i></a> '+
                                        '<a onclick="DeleteTerminateReason(' + response.id + ');" class="btn btn-danger"><i class="ti-trash"></i></a> '+ 
                                    '</div></li></div>';
                         
                             $('#candidate_attachment').replaceWith(ul);
                             toastr.success('Success', 'item has been Added !');
 
                     }, error: function (err) {
                         console.log(err);
                     }
                 });
             }
 });


function EditTerminateReason(id){

    $('#emloyee_terminate_id_edit').val(id);
    $('#showModalReasonEdit').modal('show');
    $.ajax(
        {
            url: "/admin/employeeTerminate/" + id + '/edit',
            type: 'GET',
            data: {
                "id": id,
            },
            success: function (data){
                console.log(data);
                $('#terminate_date_edit').val(data.date);
                $('#terminate_note_edit').val(data.note);
                var jx = $('#reason_id_edit');
                jx.empty();
                $.each(data.all_reason, function (key , value) {
                      var isSelected = '';
                      if(data.termination_id == value.id)
                      {
                         isSelected = 'selected';
                      }
                      jx.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
               });
       

            },error : function(err){
                console.log(err);
            }
        });
}

function ShowTerminateReason(id){
    $('#showModalReason').modal('show');
}
// Add


$('#frmEmployeeTerminate').validate({
    rules : {
        resume_file_edit : {
          required : true
       }
    },
    submitHandler: function (form) {
        var id = $('#vacancy_resume_id_edit').val();
                // console.log(extension); 
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                 jQuery.ajax({
                    url: "/admin/employeeTerminate" ,
                    type: 'POST',
                    data: {
                        "reason_id" : $('#reason_id').val(),
                        "employee_terminate_id" : $('#emloyee_terminate_id').val(),
                        "date" : $('#terminate_date').val(),
                        "note" : $('#terminate_note').val(),
                    },
                     success: function (response) {
                         console.log(response.id);
                         $('#showModalReason').modal('hide');
                         // $('#tr_interview' + response.id).remove();
                      
                         let ul =
                         '<div id="candidate_attachment" class="ul_id'+response.id+' list" >' + 
                         '<li class="manage-list-row clearfix"> ' + 
                                ' <div class="job-info"> ' +
                                        ' <div class="job-details"> ' +
                                            ' <small class="job-company"><i class="ti-time"></i><b>Reason</b> : <a href="">' + response.reason.name + '</a> </small>'+
                                            ' <small class="job-company"><i class="ti-location-pin"></i><b>Date </b>:' + response.date + '</small> ' +        
                                            ' <small class="job-company"><i class="ti-file"></i><b>Note </b>: ' + response.note + '</small> ' +                                                                
                                         '</div>'+
                                     '</div>';
                                 ul += 
                                     '<div class="job-buttons">' + 
                                        '<a onclick="EditTerminateReason(' + response.id + ');" class="btn btn-primary"><i class="icon-edit"></i></a> '+
                                        '<a onclick="DeleteTerminateReason('+ response.id + ');" class="btn btn-danger"><i class="ti-trash"></i></a> '+ 
                                    '</div></li></div>';
                         
                             $('.div_terminate').append(ul);
                             toastr.success('Success', 'item has been Added !');
 
                     }, error: function (err) {
                         console.log(err);
                     }
                 });
             }
 });