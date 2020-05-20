        // User Login
         $("#frmUserLogin").validate({
            rules: {
                email: {
                required: true,
            },
            password : {
                required : true
            }
        },submitHandler: function(form) 
        {
            // var url = 'login';
            // console.log('login');
            $email = $('.email').val();
            $password = $('.password').val()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: '/login',
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
                            URL = '/job';
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


        //Employer Login
        $("#frmLoginEmployer").validate({
            rules: {
                admin_email: {
                required: true,
            },
            admin_password : {
                required : true
            }
        },submitHandler: function(form) 
        {
            $email = $('.admin_email_login').val();
            $password = $('.admin_password_login').val()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "/admin-login",
                method: 'POST',
                data: {
                    "email" : $email,
                    "password" : $password
                },
                success: function(result){
                    // console.log(result);
                    if(result == "success"){
                        toastr.success('Admin' , 'logined succcess !');
                        var delay = 3000; 
                            URL = '/admin/app';
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

        function redirectWithFlashMessage(redirect) {
            // var params = {
            //       email : emai
            // };
            $.get('/admin/app' , function(response) {
                window.location.href = redirect;
            });
        }