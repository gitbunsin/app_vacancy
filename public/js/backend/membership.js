
$("#frmEditMembership").validate({
    rules: {
        license_name_edit: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#mebership_id_edit').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/membership" + '/' + id,
           method: 'PUT',
           data: {
              "name" : $('#membership_name_edit').val(),
           },
           success: function (result) {
             //console.log(result);
             $('#ModalEditMembership').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var Membership = '<tr id="tr_memebership' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
             Membership += '<th><a onclick="EditMembership(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title"Membership"><i class="icon-edit"></i></a>  <a onclick="DeleteMembership(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Membership"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_memebership"+result.id).replaceWith(Membership);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditMembership(id)
{
   $('#mebership_id_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/membership" + "/" + id + "/edit",
      success: function(result)
      {
         $('#ModalEditMembership').modal('show');
         $('#membership_name_edit').val(result.name);
      },error : function(err){

            console.log(err);
      }
  });
}

function DeletMembership(id)
{
    $('#ModalDeleteMembership').modal('show');
    $('#membership_id').val(id);
}

$('#frmDeleteMemebership').validate({
    submitHandler: function (form) {
        var id = $('#membership_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/membership" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteMembership').modal('hide');
                $('#tr_memebership'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddMembership").validate({
    rules: {
        membership_name: {
          required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/membership",
            method: 'POST',
            data: {
                "name" : $('#membership_name').val(),
            },
            success: function(result)
            {
               //console.log(result);
               $('#ModalAddMembership').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var license = '<tr id="tr_membership' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
               license += '<th><a onclick="EditMembership(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Membership"><i class="icon-edit"></i></a>  <a onclick="DeletMembership(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Membership"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_membership').append(license);

            },error : function(err){
                console.log(err);
            }
        });
    }
});

function LoadMemership() {
    $('#ModalAddMembership').modal('show');
    $("#frmAddMembership").trigger('reset');
 }