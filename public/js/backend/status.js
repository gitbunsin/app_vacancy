
$("#frmEditStatus").validate({
    rules: {
        status_name_edit: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#status_edit_id').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/employmentstatus" + '/' + id,
           method: 'PUT',
           data: {
              "name" : $('#status_name_edit').val(),
           },
           success: function (result) {
             //console.log(result);
             $('#EmployeeEditStatus').modal('hide');
             toastr.success('Success' , 'item has been create !');
             var status = '<tr id="tr_status' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
             status += '<th><a onclick="EditStatus(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Status"><i class="icon-edit"></i></a>  <a onclick="DeleteStatus(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-trash"></i></a></th></tr>';
             //$('#tbl_status').append(status);
             $("#tr_status" + result.id).replaceWith(status);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditStatus(id)
{
   $('#status_edit_id').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/employmentstatus" + "/" + id + "/edit",
      success: function(result)
      {
         $('#EmployeeEditStatus').modal('show');
         $('#status_name_edit').val(result.name);
      },error : function(err){

            console.log(err);
      }
  });
}

function DeleteStatus(id){
    $('#DeleteStatus').modal('show');
    $('#status_id').val(id);
}

$('#frmStatusDelete').validate({
    submitHandler: function (form) {
        var id = $('#status_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employmentstatus" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#DeleteStatus').modal('hide');
                $('#tr_status' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddStatus").validate({
    rules: {
       status_name: {
          required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employmentstatus",
            method: 'POST',
            data: {
                "name" : $('#status_name').val(),
            },
            success: function(result)
            {
               //console.log(result);
               $('#EmployeeStatus').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var status = '<tr id="tr_status' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
               status += '<th><a onclick="EditStatus(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Status"><i class="icon-edit"></i></a>  <a onclick="DeleteStatus(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_status').append(status);

            },error : function(err){

                console.log(err);
            }
        });
    }
});

function LoadStatus() {
    $('#EmployeeStatus').modal('show');
    $("#frmAddStatus").trigger('reset');
 }