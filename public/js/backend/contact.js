$("#frmContactUs").validate({
    rules: {
        name: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#user_id').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "contact-us",
           method: 'POST',
           data: {
            "name" : $('#name').val(),
            "email" : $('#contact_email').val(),
            "subject"  : $('#subject').val(),
            "message" : $('#message').val(),
            "user_id" : $('#user_id').val()
           },
           success: function (result) {
             console.log(result);
             if(result == "error"){
                toastr.warning('Success' , 'Plase login  !');
             }else{
               
                toastr.success('Success' , 'item has been updated !');
                location.reload();
             }
            //  $('#ModalEditJobCategory').modal('hide');
             
            //  var category = '<tr id="tr_category' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
            //  category += '<th><a onclick="Editcategory(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Status"><i class="icon-edit"></i></a>  <a onclick="Deletecategory(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Category"><i class="ti-trash"></i></a></th></tr>';
            //  $("#tr_category" + result.id).replaceWith(category);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });
