
//Admin Register
$("#frmEmployerLogin").validate({
    rules: {
       admin_user_name:{
           required : true
       },
       admin_email : {
           required : true
       },admin_password : {
           required : true,
           minlength : 6
       }, admin_confirm_password : {
            minlength : 6,
            equalTo : ".admin_password"
       }
    }, submitHandler: function (form) {
 
    //    var id  = $('#category_edit_id').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin-register",
           method: 'POST',
           data: {
                "admin_username" : $('.admin_user_name').val(),
                "admin_email" : $('.admin_email').val(),
                "admin_password" : $('.admin_password').val()
           },
           beforeSend:function(){
            $.LoadingOverlay("show");
           },
           success: function (result) {
            //    console.log('ok');
             if(result == 'error')
             {
                toastr.error('Success' , 'Please use other email !');

             }else{
                $.LoadingOverlay("hide");
                $('#Register').modal('hide');
                toastr.success('Success' , 'user has been created !');
             }
        
           },error : function(err){

                console.log(err);
           }
          });
    }
 });


//Seeker Register 
$("#frmSeekerRegister").validate({
    rules: {

        seeker_first_name:{
           required : true
       },
       seeker_last_name:{
        required : true
       },
       seeker_email : {
           required : true
       },seeker_password : {
           required : true,
           minlength : 6
       }, seeker_confirm_password : {
            minlength : 6,
            equalTo : ".seeker_password"
       }
    }, submitHandler: function (form) {
 
    //    var id  = $('#category_edit_id').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/register",
           method: 'POST',
           data: {
                "seeker_first_name" : $('.seeker_first_name').val(),
                "seeker_last_name" : $('.seeker_last_name').val(),
                "seeker_email" : $('.seeker_email').val(),
                "seeker_password" : $('.seeker_password').val()
           },
           beforeSend:function(){
            $.LoadingOverlay("show");
           },
           success: function (result) {
             if(result == 'error')
             {
                toastr.error('Success' , 'Please use other email !');
                
             }else{
                $.LoadingOverlay("hide");
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
//Check Admin Mail
function checkAdminMail(email){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin-register/check/mail',
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

function LoadRegister()
{
    $('#frmSeekerRegister').trigger('reset');
    $('#frmEmployerLogin').trigger('reset');
    $('#Register').modal('show');
}