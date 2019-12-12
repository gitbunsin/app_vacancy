$("#frmSeekerRegister").validate({
    rules: {
        seeker_name: {
          required: true,
       },
       seeker_username:{
           required : true
       },
       seeker_email : {
           required : true
       },seeker_password : {
           required : true,
           minlength : 6
       }, seeker_confirm_password : {
            minlength : 6,
            equalTo : "#seeker_password"
       }
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