
$("#frmEditMethod").validate({
    rules: {
        method_edit_name: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#method_edit_id').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/method" + '/' + id,
           method: 'PUT',
           data: {
              "name" : $('#method_edit_name').val(),
           },
           success: function (result) {
             //console.log(result);
             $('#ModalEditMethod').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var method = '<tr id="tr_method'+result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
             method += '<th><a onclick="EditMethod(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Method"><i class="icon-edit"></i></a>  <a onclick="DeleteMethod(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Method"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_method" + result.id).replaceWith(method);
           },error : function(err){

                console.log(err);
           }
          });
    }
 });

function EditMethod(id)
{
   $('#method_edit_id').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/method" + "/" + id + "/edit",
      success: function(result)
      {
         $('#ModalEditMethod').modal('show');
         $('#method_edit_name').val(result.name);
      },error : function(err){
            console.log(err);
      }
  });
}

function DeleteMethod(id)
{
    $('#ModalDeleteMethod').modal('show');
    $('#method_id').val(id);
}

$('#frmDeleteMothod').validate({
    submitHandler: function (form) {
        var id = $('#method_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/method" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteMethod').modal('hide');
                $('#tr_method'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddmethod").validate({
    rules: {
        method_name: {
          required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/method",
            method: 'POST',
            data: {
                "name" : $('#method_name').val(),
            },
            success: function(result)
            {
               //console.log(result);
               $('#ModalAddMethod').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var method = '<tr id="tr_method' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
               method += '<th><a onclick="EditMethod(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Method"><i class="icon-edit"></i></a>  <a onclick="DeleteMethod(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Category"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_method').append(method);

            },error : function(err){

                console.log(err);
            }
        });
    }
});

function LoadMethods() {
    $('#ModalAddMethod').modal('show');
    $("#frmAddmethod").trigger('reset');
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