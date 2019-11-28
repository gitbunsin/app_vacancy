
$("#frmEditCategory").validate({
    rules: {
        category_name_edit: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#category_edit_id').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/jobCategory" + '/' + id,
           method: 'PUT',
           data: {
              "name" : $('#category_name_edit').val(),
           },
           success: function (result) {
             //console.log(result);
             $('#ModalEditJobCategory').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var category = '<tr id="tr_category' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
             category += '<th><a onclick="Editcategory(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Status"><i class="icon-edit"></i></a>  <a onclick="Deletecategory(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Category"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_category" + result.id).replaceWith(category);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function Editcategory(id)
{
   $('#category_edit_id').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/jobCategory" + "/" + id + "/edit",
      success: function(result)
      {
         $('#ModalEditJobCategory').modal('show');
         $('#category_name_edit').val(result.name);
      },error : function(err){

            console.log(err);
      }
  });
}

function Deletecategory(id)
{
    $('#DeleteJobCategory').modal('show');
    $('#category_id').val(id);
}

$('#frmJobCategoryDelete').validate({
    submitHandler: function (form) {
        var id = $('#category_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/jobCategory" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#DeleteJobCategory').modal('hide');
                $('#tr_category' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddEmployeeEducation").validate({
    rules: {
        institute_id: {
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
                "name" : $('#institute_id').val(),
                "score" : $('#score').val(),
                "Year" : $('#Year').val(),
                "start_date" : $('#start_date').val(),
                "end_date" : $('#end_date').val(),
            },
            success: function(result)
            {
               $('#ShowModalEmployeeEducation').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var education = '<tr id="tr_employee_education' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td><td>' + result.Year + '</td><td>' + result.score + '</td>';
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