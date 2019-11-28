
$("#ShowModalEditEmployeeEducation").validate({
    rules: {
        institute_edit: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#emloyee_education_id_edit').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/employeeEduction" + '/' + id,
           method: 'PUT',
           data: {
            "institute" : $('#institute_edit').val(),
            "education_id" : $('#education_id_edit').val(),
            "employee_id" : $('#employee_id').val(),
            "score" : $('#score_edit').val(),
            "major" : $('#major_edit').val(),
            "year" : $('#year_edit').val(),
            "start_date" : $('#start_date_edit').val(),
            "end_date" : $('#end_date_edit').val(),
             },
           success: function (result) {
             //console.log(result);
             $('#ShowModalEditEmployeeEducation').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var education = '<tr id="tr_employee_education' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.level.name + '</td><td>' + result.year + '</td><td>' + result.score + '</td>';
             education += '<th><a onclick="EditEmployeeEducation(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Status"><i class="icon-edit"></i></a>  <a onclick="DeleteEmployeeEducation(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Category"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_employee_education" + result.id).replaceWith(education);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditEmployeeEducation(id)
{
   $('#emloyee_education_id_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/employeeEduction" + "/" + id + "/edit",
      success: function(result)
      {
        // console.log(result);

         $('#ShowModalEditEmployeeEducation').modal('show');
         $('#institute_edit').val(result.institute);
         $('#major_edit').val(result.major);
         $('#score_edit').val(result.score);
         $('#year_edit').val(result.year);
         $('#start_date_edit').val(result.start_date);
         $('#end_date_edit').val(result.end_date);

         var jx = $('#education_id_edit');
         jx.empty();
         $.each(result.all_level, function (key , value) {
               var isSelected = '';
               if(result.education_id == value.id)
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

function DeleteEmployeeEducation(id)
{
    $('#ModalDeleteEmployeeEducation').modal('show');
    $('#emloyee_education_id').val(id);
}

$('#frmEmployeeEducation').validate({
    submitHandler: function (form) {
        var id = $('#emloyee_education_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employeeEduction" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteEmployeeEducation').modal('hide');
                $('#tr_employee_education' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddEmployeeEducation").validate({
    rules: {
        education_id: {
          required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employeeEduction",
            method: 'POST',
            data: {
                "institute" : $('#institute').val(),
                "education_id" : $('#education_id').val(),
                "employee_id" : $('#employee_id').val(),
                "score" : $('#score').val(),
                "major" : $('#major').val(),
                "year" : $('#year').val(),
                "start_date" : $('#start_date').val(),
                "end_date" : $('#end_date').val(),
            },
            success: function(result)
            {
               $('#ShowModalEmployeeEducation').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var education = '<tr id="tr_employee_education' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.level.name + '</td><td>' + result.year + '</td><td>' + result.score + '</td>';
               education += '<th><a onclick="EditEmployeeEducation(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Status"><i class="icon-edit"></i></a>  <a onclick="DeleteEmployeeEducation(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Category"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_employee_education').append(education);

            },error : function(err){

                console.log(err);
            }
        });
    }
});

function ShowEmployeeEducation() {
    $('#ShowModalEmployeeEducation').modal('show');
    $("#frmAddEmployeeEducation").trigger('reset');
 }