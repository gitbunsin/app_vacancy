
$("#frmEditTerminationReason").validate({
    rules: {
        reason_name_edit: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#reason_name_id').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/reason" + '/' + id,
           method: 'PUT',
           data: {
              "name" : $('#reason_name_edit').val(),
           },
           success: function (result) {
             //console.log(result);
             $('#ModalEditTerminalReason').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var reason = '<tr id="tr_reason'+result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
             reason += '<th><a onclick="EditReason(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Reason"><i class="icon-edit"></i></a>  <a onclick="DeleteReason(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Reason"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_reason" + result.id).replaceWith(reason);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditReason(id)
{
   $('#reason_name_id').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/reason" + "/" + id + "/edit",
      success: function(result)
      {
         $('#ModalEditTerminalReason').modal('show');
         $('#reason_name_edit').val(result.name);

      },error : function(err){
            console.log(err);
      }
  });
}

function DeleteReason(id)
{
    $('#ModalDeleteReason').modal('show');
    $('#reason_id').val(id);
}

$('#frmDeleteReason').validate({
    submitHandler: function (form) {
        var id = $('#reason_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/reason" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteReason').modal('hide');
                $('#tr_reason'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddReason").validate({
    rules: {
        reason_name: {
          required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/reason",
            method: 'POST',
            data: {
                "name" : $('#reason_name').val(),
            },
            success: function(result)
            {
               //console.log(result);
               $('#LoadModalAddReason').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var reason = '<tr id="tr_reason'+result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
               reason += '<th><a onclick="EditReason(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Reason"><i class="icon-edit"></i></a>  <a onclick="DeleteReason(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Reason"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_reason').append(reason);

            },error : function(err){

                console.log(err);
            }
        });
    }
});

function LoadReason() {
    $('#LoadModalAddReason').modal('show');
    $("#frmAddReason").trigger('reset');
 }

$(document).ready(function () {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});