
$("#frmEditEmployeeLanuage").validate({
    rules: {
        language_id_edit: {
          required: true,
       },fluency : {
           required : true
       }, Competency : {
           required : true
       }
    }, submitHandler: function (form) {
 
       var id  = $('#employee_lanauge_id_edit').val();
    //    console.log(id);
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/employeeLanguage" + '/' + id,
           method: 'PUT',
           data: {
            "language_id" : $('#language_id_edit').val(),
            "employee_id" : $('#employee_id').val(),
            "fluency_id" : $('#fluency_id_edit').val(),
            "competency_id" : $('#competency_id_edit').val(),
            "comments" : $('#comments_language_edit').val(),
        },
           success: function (result) {
             //console.log(result);
             $('#ShowModalEditEmployeeLanauge').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var lanauage = '<tr id="tr_employee_language' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.language.name + '</td><td>' + result.fluency + '</td><td>' + result.competency + '</td><td>' + result.comments + '</td>';
               lanauage += '<th><a onclick="EditEmployeeLanguage(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Skill"><i class="icon-edit"></i></a>  <a onclick="DeleteEmployeeLanguage(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Language"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_employee_language" + result.id).replaceWith(lanauage);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditEmployeeLanguage(id)
{
    $('#employee_lanauge_id_edit').val(id);

   $.ajax({
      type: "GET",
      url: "/admin/employeeLanguage" + "/" + id + "/edit",
      success: function(result)
      {
        // console.log(result);
         $('#ShowModalEditEmployeeLanauge').modal('show');
         $('#language_id_edit').val(result.year);
         $('#comments_language_edit').val(result.comments);
         var jx = $('#language_id_edit');
         jx.empty();
         $.each(result.all_language, function (key , value) {
               var isSelected = '';
               if(result.education_id == value.id)
               {
                  isSelected = 'selected';
               }
               jx.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
        });

       

         var fluency = ["Poor","Basic","Good","Mother Tough"];

         var jxx = $('#fluency_id_edit');
         jxx.empty();
         $.each(fluency, function (key , value) {
               var isSelected = '';
               if(result.fluency == value)
               {
                  isSelected = 'selected';
               }
               jxx.append('<option value="'+value+'" '+isSelected+' >'+value+'</option>');
        });



        //
        var Competency = ["Poor","Basic","Good","Mother Tough"];

        var jxxx = $('#competency_id_edit');
        jxxx.empty();
        $.each(Competency, function (key , value) {
              var isSelected = '';
              if(result.competency == value)
              {
                 isSelected = 'selected';
              }
              jxxx.append('<option value="'+value+'" '+isSelected+' >'+value+'</option>');
       });

      },error : function(err){

            console.log(err);
      }
  });
}

function DeleteEmployeeLanguage(id)
{
    $('#ModalDeleteEmployeeLanguage').modal('show');
    $('#employee_lanauge_id').val(id);
}

$('#frmEmployeeLanauge').validate({
    submitHandler: function (form) {
        var id = $('#employee_lanauge_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employeeLanguage" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteEmployeeLanguage').modal('hide');
                $('#tr_employee_language' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddEmployeeLanuage").validate({
    rules: {
        language_id: {
          required: true,
       },fluency_id : {
           required : true,
       },competency_id : {
         required : true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employeeLanguage",
            method: 'POST',
            data: {
                "language_id" : $('#language_id').val(),
                "employee_id" : $('#employee_id').val(),
                "fluency_id" : $('#fluency_id').val(),
                "competency_id" : $('#competency_id').val(),
                "comments" : $('#comments_skill').val(),
            },
            success: function(result)
            {
              //console.log(result);
               $('#ShowModalAddEmployeeLanauge').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var lanauage = '<tr id="tr_employee_language' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.language.name + '</td><td>' + result.fluency + '</td><td>' + result.competency + '</td><td>' + result.comments + '</td>';
               lanauage += '<th><a onclick="EditEmployeeLanguage(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Skill"><i class="icon-edit"></i></a>  <a onclick="DeleteEmployeeLanguage(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Language"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_employee_language').append(lanauage);

            },error : function(err){

                console.log(err);
            }
        });
    }
});

function ShowEmployeeLanguage() {
    $('#ShowModalAddEmployeeLanauge').modal('show');
    $("#frmAddEmployeeLanuage").trigger('reset');
 }