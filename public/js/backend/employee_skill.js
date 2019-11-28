
$("#frmEditEmployeeSkill").validate({
    rules: {
        skill_id_edit: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#skill_id_edits').val();
       console.log(id);
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/employeeSkill" + '/' + id,
           method: 'PUT',
           data: {
                "skill_id" : $('#skill_id_edit').val(),
                "employee_id" : $('#employee_id_edit').val(),
                "year" : $('#year_edit').val(),
                "comments" : $('#comments_skill_edit').val(),
            },
           success: function (result) {
             //console.log(result);
             $('#ShowModalEditEmployeeSkill').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var skill = '<tr id="tr_employee_skill' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.skill.name + '</td><td>' + result.year + '</td><td>' + result.comments + '</td>';
             skill += '<th><a onclick="EditEmployeeSkill(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Skill"><i class="icon-edit"></i></a>  <a onclick="DeleteEmployeeSkill(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Skill"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_employee_skill" + result.id).replaceWith(skill);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditEmployeeSkill(id)
{
    $('#skill_id_edits').val(id);

   $.ajax({
      type: "GET",
      url: "/admin/employeeSkill" + "/" + id + "/edit",
      success: function(result)
      {
        // console.log(result);
         
         $('#ShowModalEditEmployeeSkill').modal('show');
         $('#year_edit').val(result.year);
         $('#comments_skill_edit').val(result.comments);
         var jx = $('#skill_id_edit');
         jx.empty();
         $.each(result.all_skill, function (key , value) {
               var isSelected = '';
               if(result.skill_id == value.id)
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

function DeleteEmployeeSkill(id)
{
    $('#ModalDeleteEmployeeSkill').modal('show');
    $('#emloyee_skill_id').val(id);
}

$('#frmEmployeeSkill').validate({
    submitHandler: function (form) {
        var id = $('#emloyee_skill_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employeeSkill" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteEmployeeSkill').modal('hide');
                $('#tr_employee_skill' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddEmployeeSkill").validate({
    rules: {
        skill_id: {
          required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employeeSkill",
            method: 'POST',
            data: {
                "skill_id" : $('#skill_id').val(),
                "employee_id" : $('#employee_id').val(),
                "year" : $('#year').val(),
                "comments" : $('#comments_skill').val(),
            },
            success: function(result)
            {
               console.log(result);

               $('#ShowModalAddEmployeeSkill').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var skill = '<tr id="tr_employee_skill' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.skill.name + '</td><td>' + result.year + '</td><td>' + result.comments + '</td>';
               skill += '<th><a onclick="EditEmployeeSkill(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Skill"><i class="icon-edit"></i></a>  <a onclick="DeleteEmployeeSkill(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Skill"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_employee_skill').append(skill);

            },error : function(err){

                console.log(err);
            }
        });
    }
});

function ShowEmployeeSkill() {
    $('#ShowModalAddEmployeeSkill').modal('show');
    $("#frmAddEmployeeSkill").trigger('reset');
 }