$("#frmForgotCandidatePassword").validate({
    rules: {
        email: {
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
           url: "/password/reset",
           method: 'POST',
           data: {
            "_token": "{{ csrf_token() }}",
           },
           success: function (result) {
             //console.log(result);
            //  $('#ModalEditLanguage').modal('hide');
             toastr.success('Success' , 'item has been updated !');
           
           },error : function(err){
                console.log(err);
           }
          });
    }
 });