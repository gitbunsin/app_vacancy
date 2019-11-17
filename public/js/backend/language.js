
$("#frmEditLanguage").validate({
    rules: {
        language_name_edit: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#language_id_edit').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/language" + '/' + id,
           method: 'PUT',
           data: {
              "name" : $('#language_name_edit').val(),
           },
           success: function (result) {
             //console.log(result);
             $('#ModalEditLanguage').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var langauge = '<tr id="tr_langauge' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
             langauge += '<th><a onclick="EditLanguage(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title"Language"><i class="icon-edit"></i></a>  <a onclick="DeleteLanguage(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Language"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_language" + result.id).replaceWith(langauge);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditLanguage(id)
{
   $('#language_id_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/language" + "/" + id + "/edit",
      success: function(result)
      {
         $('#ModalEditLanguage').modal('show');
         $('#language_name_edit').val(result.name);
      },error : function(err){

            console.log(err);
      }
  });
}

function DeleteLanguage(id)
{
    $('#ModalDeleteLanguage').modal('show');
    $('#langauge_id').val(id);
}

$('#frmDeleteLangauge').validate({

    submitHandler: function (form) {
        var id = $('#langauge_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/language" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteLanguage').modal('hide');
                $('#tr_language' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }

 });

$("#frmAddLanguage").validate({
    rules: {
        language_name: {
          required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/language",
            method: 'POST',
            data: {
                "name" : $('#language_name').val(),
            },
            success: function(result)
            {
               //console.log(result);
               $('#ModalAddLanguage').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var language = '<tr id="tr_language' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
               language += '<th><a onclick="EditLanguage(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Language"><i class="icon-edit"></i></a>  <a onclick="DeleteLanguage(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Language"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_language').append(language);

            },error : function(err){

                console.log(err);
            }
        });
    }
});

function LoadLanguage() 
{
    $('#ModalAddLanguage').modal('show');
    $("#frmAddLanguage").trigger('reset');
 }