 // User Login
 $("#employee_login").validate({
    rules: {
        email: {
        required: true,
    },
    password : {
        required : true
    }
},submitHandler: function(form) 
{
    $email = $('#email').val();
    $password = $('#password').val()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: '/employee/login',
        method: 'POST',
        data: {
            "email" : $email,
            "password" : $password
        },
        success: function(result){
            
            // console.log(result);
            if(result == "success"){
                toastr.success('User' , 'logined succcess !');
                var delay = 3000; 
                    URL = '/admin/employee'
                    setTimeout(function()
                    {               
                      window.location = URL;
                    }, delay);
            }else{
                toastr.error('These credentials do not match our records.!');
            }
            // console.log(result);
        },error : function(err){

            console.log(err);
        }
    });
}
});