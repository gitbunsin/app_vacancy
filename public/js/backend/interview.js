//note
$('#frmCandidateNote').validate({
    rules : {
        candidate_note : {
          required : true
       }
    },
    submitHandler: function (form) {
        var id = $('#candidate_note_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/canidate/note/" + id,
            method: 'POST',
            data: {
                'note' : $('#candidate_note').val(),
            },success : function(response){
                toastr.success('Success', 'item has been deleted !');
            },error : function(err){

                console.log(err);
            }
        });  
    }
});


//function 
$('#frmCandidateResume').validate({
   rules : {
    resume_file : {
         required : true
      }
   },
   submitHandler: function (form) {
       var id = $('#candidate_resume_id').val();
       var extension = $('#resume_file').val().split('.').pop().toLowerCase();
               // console.log(extension);
                if ($.inArray(extension, ['pdf', 'doc', 'xlsx']) == -1) {
                   toastr.error('Please Select Valid File... !');
                   //  $('#errormessage').html('Please Select Valid File... ');
                } else {
       
                   var file_data = $('#resume_file').prop('files')[0];
                   var form_data = new FormData();
                   form_data.append('file', file_data);
                   $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                 });
                jQuery.ajax({
                    url: "/admin/candidate/update-resume" + '/' + id,
                    data: form_data,
                    type: 'POST',
                    dataType:"json",
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        $('#ModalCandidateEditResume').modal('hide');
                        // $('#tr_interview' + response.id).remove();
                     
                        let ul =
                        '<div id="candidate_attachment" class="ul_id '+ response.id+' list" >' + 
                        '<li class="manage-list-row clearfix"> ' + 
                               ' <div class="job-info"> ' +
                                       ' <div class="job-details"> ' +
                                           ' <small class="job-company"><i class="ti-time"></i><b>Resume</b> : <a href="">' + response.file_name + '</a> </small>'+
                                           ' <small class="job-company"><i class="ti-location-pin"></i><b>Attachment_type </b>:' + response.attachment_type + '</small> ' +        
                                           ' <small class="job-company"><i class="ti-file"></i><b>File Size </b>: ' + response.file_size + '</small> ' +                                                                
                                        '</div>'+
                                    '</div>';
                                ul += 
                                    '<div class="job-buttons">' + 
                                       '<a onclick="EditCandidateResume(' + response.candidate_id + ');" class="btn btn-primary"><i class="icon-edit"></i></a> '+
                                   '</div></li></div>';
                        
                            $('#candidate_attachment').replaceWith(ul);
                            toastr.success('Success', 'item has been deleted !');

                    }, error: function (err) {
                        console.log(err);
                    }
                });
            }
   }
});


function EditCandidateResume(id)
{
    console.log(id);
   $.ajax({
      type: "GET",
      url: "/admin/candidate/resume/" + id ,
      success: function(result)
      {
         console.log(result);
         $('#candidate_resume_id').val(id);
         $('#old_resume').val(result.file_name);
         $('#ModalCandidateEditResume').modal('show');
      },error : function(err){
        console.log(err);
      }
   });
}






function DeleteInterview(id){

   $('#interview_delete_id').val(id);
   $('#ModalDeleteInterview').modal('show');
}
$('#frmDeleteInterview').validate({
   submitHandler: function (form) {
       var id = $('#interview_delete_id').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/interview" + '/' + id,
           method: 'Delete',
           success: function (response) {
               $('#ModalDeleteInterview').modal('hide');
               $('#tr_interview' + response.id).remove();
               toastr.success('Success', 'item has been deleted !');
           }, error: function (err) {
               console.log(err);
           }
       });
   }
});
function assignInterview($candidate_id)
{
   $('#candidate_id').val($candidate_id);
   $('#ModalAssignInterview').modal('show');
}

//Add 
$("#frmAddInterview").validate({
   rules: {
       interview_name: {
         required: true,
      },interview_date : {
          required : true
      },
      interview_time : {
       required : true
   }
   }, submitHandler: function (form) {
      var id = $('#interviewer_id').val();
      var interview  = $('#interview_status').val();
      console.log(interview);
    //   console.log(id);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      jQuery.ajax({
          url: "/admin/interview",
          method: 'POST',
          data: {
             "interview_date" : $('#interview_date').val(),
             "interview_time" : $('#interview_time').val(),
             "interview_name" : $('#interview_name').val(),
             "interview_status" : $('#interview_status').val(),
             "interviewer_id" : $('#interviewer_id').val(),
             "candidate_id" : $('#candidate_id').val(),
             "vacancy_id" : $('#vacancy_id').val(),
             "note" : $('#note').val()
          },
          success: function (result) {
            //   console.log(result);
              var myObj = [];         
              $.each(result.employee, function (i, value) {
                  myObj.push(value.interviewer);
              });  
            var interviewer = myObj.join(", ");


           



            $('#ModalAssignInterview').modal('hide');
            toastr.success('Success' , 'item has created !');
            var interview = '<tr id="tr_interview' + result.id + '"><th class="scope="row">' + result.id + '</th><td>' + result.vacancy.vacancy_name + '</td><td>' + interviewer + '</td><td>' + result.interview_date + '</td><td>' + result.interview_time + '</td><td><b class="badge bg-success">' + result.status + '</b></td>';
            interview += '<th><a onclick="EditInterview(' + result.id + ');" class="btn btn-primary"  title"Interview"><i class="icon-edit"></i></a>  <a onclick="DeleteInterview(' + result.id + ');"  class="btn btn-danger" title="Interview"><i class="ti-trash"></i></a></th></tr>';
            $('#tbl_interview').append(interview);
          },error : function(err){
               console.log(err);
          }
         });
   }
});






function EditInterview(id)
{
   $.ajax({
      type: "GET",
      url: "/admin/interview" + "/" + id + "/edit",
      success: function(result)
      {
        // console.log(result);
        $('#interview_id_edit').val(id);
        $('#ModalUpdateInterview').modal('show');
        $('#interview_name_edit').val(result.interview_name);
        $('#interview_date_edit').val(result.interview_date);
        $('#interview_time_edit').val(result.interview_time);
        $('#note_edit').val(result.note);

        var interview_status = $('#interview_status_edit');
        interview_status.empty();
        var all_status = ['interview','Pass','Fail','Offer','Reject'];
         $.each(all_status, function (key , value) {
            //  console.log(value);
               var isSelected = '';
               if(result.status == value)
               {
                  isSelected = 'selected';
               }
               interview_status.append('<option value="'+value + '" '+isSelected+' >'+value+'</option>');
        });


        // console.log(result.employee);   
        // var myObj = [];         
        // $.each(result.employee, function (i, value) {
        //     myObj.push(value.id);
        // });  
        // var interviewer = myObj.join(", ");
        // console.log(myObj);
        // var w = $('#interviewer_id_edit');
      
        // for(var i = 0; i<result.all_employee.length; i++){
        //     // console.log(result.all_employee[i]['id']);
        //     for (var j = 0; j < result.employee.length; j++) {
                
        //             if(result.all_employee[i]['id'] == result.employee[j]['id'])
        //             {
        //                 isSelected = 'selected';
        //                  w.append('<option value="'+result.id+'" '+isSelected+' >'+result.all_employee[i]['last_name']+ ' ' + result.all_employee[i]['first_name']+'</option>');                       
        //             }
        //     }
        // }

        var s = $('#interviewer_id_edit');
        // s.empty();
        $.each(result.all_employee, function (key , value) {
            var isSelected = '';
            $.each(result.employee, function (k , v) {

               if(v.id == value.id)
            {
                isSelected = 'selected';
            }
            s.append('<option value="'+value.id+'" '+isSelected+' >'+value.first_name+' ' + value.last_name + '</option>');

            });
            
        });


      },error : function(err){

            console.log(err);
      }
  });

  $("#frmUpdateInterview").validate({
   rules: {
    interview_name_edit: {
         required: true,
      },
      interviewer_id_edit : {
          required : true
      },
      interviewer_date_edit : {
          required : true
      }
   }, submitHandler: function (form) {
      var id = $('#interview_id_edit').val();
      var date = $('#interview_date_edit').val();

      // console.log(date);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      jQuery.ajax({
          url: "/admin/interview" + '/' + id,
          method: 'PUT',
          data: {
             "interview_date" : $('#interview_date_edit').val(),
             "interview_time" : $('#interview_time_edit').val(),
             "interview_name" : $('#interview_name_edit').val(),
             "interview_status" : $('#interview_status_edit').val(),
             "employee_id" : $('#employee_id_edit').val(),
             "interviewer_id" : $('#interviewer_id_edit').val(), 
             "note" : $('#note_edit').val()
          },
          success: function (result) {
            // console.log(result);
            var myObj = [];         
            $.each(result.employee, function (i, value) {
                myObj.push(value.interviewer);
            });  
           var interviewer = myObj.join(", ");
            $('#ModalUpdateInterview').modal('hide');
            toastr.success('Success' , 'item has been updated !');
            var interview = '<tr id="tr_interview' + result.id + '"><th class="scope="row">' + result.id + '</th><td>' + result.vacancy.vacancy_name + '</td><td>' + interviewer + '</td><td>' + result.interview_date + '</td><td>' + result.interview_time + '</td><td><b class="badge bg-success">' + result.status + '</b></td>';
            interview += '<th><a onclick="EditInterview(' + result.id + ');" class="btn btn-primary"  title"Interview"><i class="icon-edit"></i></a>  <a onclick="DeleteInterview(' + result.id + ');"  class="btn btn-danger" title="Interview"><i class="ti-trash"></i></a></th></tr>';
            $("#tr_interview" + result.id).replaceWith(interview);
          },error : function(err){
               console.log(err);
          }
         });
   }
});
}
