
$("#frmEditEmployeeLicense").validate({
    rules: {
        language_id_edit: {
          required: true,
       },fluency : {
           required : true
       }, Competency : {
           required : true
       }
    }, submitHandler: function (form) {
 
       var id  = $('#employee_license_id_edit').val();
    //    console.log(id);
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/employeeLicense" + '/' + id,
           method: 'PUT',
           data: {
            "licenses_id" : $('#licenses_id_edit').val(),
             "employee_id" : $('#employee_id').val(),
            "license_no" : $('#license_no_edit').val(),
            "issued_date" : $('#issued_date_edit').val(),
            "expiry_date" : $('#expiry_date_edit').val(),
            },
           success: function (result) {
             //console.log(result);
             $('#ShowModalEditEmployeeLicense').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var license = '<tr id="tr_employee_license' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.license.name + '</td><td>' + result.issued_date + '</td><td>' + result.expiry_date + '</td>';
             license += '<th><a onclick="EditEmployeeLicense(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="license"><i class="icon-edit"></i></a>  <a onclick="DeleteEmployeeLicense(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Language"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_employee_license" + result.id).replaceWith(license);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditEmployeeLicense(id)
{
    $('#employee_license_id_edit').val(id);

   $.ajax({
      type: "GET",
      url: "/admin/employeeLicense" + "/" + id + "/edit",
      success: function(result)
      {
        // console.log(result);
         $('#ShowModalEditEmployeeLicense').modal('show');
         $('#license_no_edit').val(result.license_no);
         $('#issued_date_edit').val(result.issued_date);
         $('#expiry_date_edit').val(result.expiry_date);

         var jx = $('#licenses_id_edit');
         jx.empty();
         $.each(result.license, function (key , value) {
               var isSelected = '';
               if(result.licenses_id == value.id)
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

function DeleteEmployeeLicense(id)
{
    $('#ModalDeleteEmployeeLicense').modal('show');
    $('#employee_license_id').val(id);
}

$('#frmEmployeeLicense').validate({
    submitHandler: function (form) {
        var id = $('#employee_license_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employeeLicense" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteEmployeeLicense').modal('hide');
                $('#tr_employee_license' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddEmployeeLicense").validate({
    rules: {
        license_id: {
          required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employeeLicense",
            method: 'POST',
            data: {
                "licenses_id" : $('#licenses_id').val(),
                "employee_id" : $('#employee_id').val(),
                "license_no" : $('#license_no').val(),
                "issued_date" : $('#issued_date').val(),
                "expiry_date" : $('#expiry_date').val(),
            },
            success: function(result)
            {
              //console.log(result);
               $('#ShowModalAddEmployeeLicense').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var license = '<tr id="tr_employee_license' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.license.name + '</td><td>' + result.issued_date + '</td><td>' + result.expiry_date + '</td>';
               license += '<th><a onclick="EditEmployeeLicense(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="license"><i class="icon-edit"></i></a>  <a onclick="DeleteEmployeeLicense(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Language"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_employee_license').append(license);
            },error : function(err){
                console.log(err);
            }
        });
    }
});

function ShowEmployeeLicense() {
    $('#ShowModalAddEmployeeLicense').modal('show');
    $("#frmAddEmployeeLicense").trigger('reset');
 }