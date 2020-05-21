 //cd-reset
 $('#frmReportVacancy').validate({
    rules:{
        subject : {
            required : true
        },
        message : {
            required : true,
        }
    },submitHandler:function(form){
        var id = $('#job_id').val();
        // console.log($('#message').val());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        jQuery.ajax({
            url: "/user/send-report/" + id,
            method: 'POST',
            data : {
                "subject" : $('#subject').val(),
                "message" : $('#message').val()
            },
            beforeSend:function(){
                $.LoadingOverlay("show");
            },
            success: function (result) {
                // console.log(result);
                if(result =="success"){
                    $.LoadingOverlay("hide");
                    toastr.success('Success', 'Report has been send !');
                   }else{
                    $.LoadingOverlay("hide");
                    toastr.error('Success' , 'email wrong !');
                   }
                   var delay = 3000; 
                    setTimeout(function()
                    {               
                        location.reload();
                    }, delay);
                
                // console.log(response);
            }, error: function (err) {
                console.log(err);
            }
        });

    }
});

 //cd-reset
 $('#frmAdResetPassword').validate({
    rules:{
        password : {
            minlength : 6,
            required : true
        },
        password_confirm : {
            required : true,
            minlength : 6,
            equalTo : "#password"
        }
    },submitHandler:function(form){
        var email = $('#adEmail').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        jQuery.ajax({
            url: "/reset/ad-reset/" + email,
            method: 'POST',
            data : {
                "password" : $('#password').val()
            },
            beforeSend:function(){
                $.LoadingOverlay("show");
            },
            success: function (result) {
                // console.log(response);
                if(result =="success"){
                    $.LoadingOverlay("hide");
                    toastr.success('Success', 'Password has been reset !');
                   }else{
                    $.LoadingOverlay("hide");
                    toastr.error('Success' , 'email wrong !');
                   }
                   var delay = 3000; 
                    setTimeout(function()
                    {               
                        location.reload();
                    }, delay);
                
                // console.log(response);
            }, error: function (err) {
                console.log(err);
            }
        });

    }
});

$("#frmAdPassword").validate({
    rules: {
        email: {
          required: true,
       },
    }, submitHandler: function (form) {
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });  
       jQuery.ajax({
           url: "/password/admin-reset",
           method: 'POST',
           data: {
              "email" : $('#email').val(),
           },
           beforeSend:function(){
            $.LoadingOverlay("show");
           },
           success: function (result) {
            //    console.log(result);
               if(result =="success"){
                $.LoadingOverlay("hide");
                toastr.success('Success' , 'item has been updated !');
               }else{
                $.LoadingOverlay("hide");
                toastr.error('Success' , 'email wrong !');
               }
           },error : function(err){
                console.log(err);
           }
          });
    }
 });


//Cd 
$("#frmForgotCandidatePassword").validate({
    rules: {
        email: {
          required: true,
       },
    }, submitHandler: function (form) {
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       
       jQuery.ajax({
           url: "/reset/ad-reset/password",
           method: 'POST',
           data: {
              "email" : $('#email').val(),
           },
           beforeSend:function(){
            $.LoadingOverlay("show");
           },
           success: function (result) {
            //    console.log(result);
               if(result =="success"){
                $.LoadingOverlay("hide");
                toastr.success('Success' , 'item has been updated !');
               }else{
                $.LoadingOverlay("hide");
                toastr.error('Success' , 'email wrong !');
               }
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

 //cd-reset
 $('#frmCdResetPassword').validate({
    rules:{
        password : {
            minlength : 6,
            required : true
        },
        password_confirm : {
            required : true,
            minlength : 6,
            equalTo : "#password"
        }
    },submitHandler:function(form){

        var email = $('#cdEmail').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        jQuery.ajax({
            url: "/reset/cd-reset/" + email,
            method: 'POST',
            data : {
                "password" : $('#password').val()
            },
            beforeSend:function(){
                $.LoadingOverlay("show");
            },
            success: function (result) {
                // console.log(response);
                if(result =="success"){
                    $.LoadingOverlay("hide");
                    toastr.success('Success', 'Password has been reset !');
                   }else{
                    $.LoadingOverlay("hide");
                    toastr.error('Success' , 'email wrong !');
                   }
                   var delay = 3000; 
                    setTimeout(function()
                    {               
                        location.reload();
                    }, delay);
                
                // console.log(response);
            }, error: function (err) {
                console.log(err);
            }
        });

    }
});