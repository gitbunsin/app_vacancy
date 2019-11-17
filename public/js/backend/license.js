
$("#frmEditLicense").validate({
    rules: {
        license_name_edit: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#licenes_id_edit').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/license" + '/' + id,
           method: 'PUT',
           data: {
              "name" : $('#license_name_edit').val(),
           },
           success: function (result) {
             //console.log(result);
             $('#ModalEditLicense').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var license = '<tr id="tr_license' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
             license += '<th><a onclick="EditLicense(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title"License"><i class="icon-edit"></i></a>  <a onclick="DeleteLicense(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="License"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_license" + result.id).replaceWith(license);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditLicense(id)
{
   $('#licenes_id_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/license" + "/" + id + "/edit",
      success: function(result)
      {
         $('#ModalEditLicense').modal('show');
         $('#license_name_edit').val(result.name);
      },error : function(err){

            console.log(err);
      }
  });
}

function DeleteLicense(id)
{
    $('#ModalDeleteLicense').modal('show');
    $('#license_id').val(id);
}

$('#frmDeleteLicense').validate({
    submitHandler: function (form) {
        var id = $('#license_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/license" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteLicense').modal('hide');
                $('#tr_license' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddLicense").validate({
    rules: {
        license_name: {
          required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/license",
            method: 'POST',
            data: {
                "name" : $('#license_name').val(),
            },
            success: function(result)
            {
               //console.log(result);
               $('#ModalAddLicense').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var license = '<tr id="tr_license' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
               license += '<th><a onclick="EditLicense(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="License"><i class="icon-edit"></i></a>  <a onclick="DeleteLicense(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="License"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_license').append(license);

            },error : function(err){

                console.log(err);
            }
        });
    }
});

function LoadLicense() {
    $('#ModalAddLicense').modal('show');
    $("#frmAddLicense").trigger('reset');
 }