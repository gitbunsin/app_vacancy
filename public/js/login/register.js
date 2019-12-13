$("#frmSeekerRegister").validate({
    rules: {

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
 
    //    var id  = $('#category_edit_id').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "register",
           method: 'POST',
           data: {
                "seeker_username" : $('#seeker_username').val(),
                "seeker_email" : $('#seeker_email').val(),
                "seeker_password" : $('#seeker_password').val()
           },
           beforeSend:function(){
            $("#in-pogress").html("Processing daata");
           },
           success: function (result) {
             if(result == 'error')
             {
                toastr.error('Success' , 'Please use other email !');
                
             }else{
                $('#Register').modal('hide');
                toastr.success('Success' , 'user has been created !');
             }
        
           },error : function(err){

                console.log(err);
           }
          });
    }
 });


 //check mail 
 function checkmain(email)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/register/checkemail',
        type: 'POST',
        data: { 'email': email },
        success : function(result){
            // console.log(result);
            if(result == 'error'){
                toastr.warning('Success' , 'Email Already In Use !');
            }
        },error : function(err){
            console.log(err);
        }
    });
}
