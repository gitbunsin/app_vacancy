$('#frmUserChangePassword').validate({
    rules:{
        new_password : {
            minlength : 6,
            required : true
        },
        confirm_password : {
            required : true,
            minlength : 6,
            equalTo : "#new_password"
        }
    },submitHandler:function(form){

        var id = $('#user_password').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/reset/user/password/" + id,
            method: 'POST',
            data : {
                "password" : $('#new_password').val()
            },
            success: function (response) {
                toastr.success('Success', 'Password has been reset !');
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
$('#frmUpdateUserProfile').validate({
    rules:{
        user_name : {
            required : true
        },user_email : {
            required : true
        }
    },
    submitHandler: function (form) {
        var id = $('#user_login_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var file_data = $('#image').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('name',$('#user_name').val());
        form_data.append('phone',$('#user_phone').val());
        form_data.append('first_name',$('#user_first_name').val());
        form_data.append('last_name',$('#user_last_name').val());
        form_data.append('email',$('#user_email').val());
        form_data.append('zip',$('#user_zip').val());
        form_data.append('address',$('#user_address').val());
        jQuery.ajax({
            url: "/upload/user/profile/" + id,
            method: 'POST',
            data : form_data,
            type: 'POST',
            dataType:"json",
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            success: function (response) {
                toastr.success('Success', 'item has been updated !');
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

 //change UserProfile
 function changeProfile() {
    $('#image').click();
}
$('#image').change(function () {
    var imgPath = this.value;
    var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
        readURL(this);
    else
        // alert("Please select image file (jpg, jpeg, png).")
        toastr.error('Success', 'Please select image file (jpg, jpeg, png).');
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
//              $("#remove").val(0);
        };
    }
}
function removeImage() {
    $('#preview').attr('src', 'images/noimage.jpg');
//      $("#remove").val(1);
}