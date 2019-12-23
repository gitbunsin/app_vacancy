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
                $('#frmContactUs').trigger('reset');
             }
           },error : function(err){
                console.log(err);
           }
          });
    }
 });
