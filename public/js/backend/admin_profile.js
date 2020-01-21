 
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

        var id = $('#user_admin_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/reset/admin/password/" + id,
            method: 'POST',
            data : {
                "password" : $('#new_password').val()
            },
            success: function (response) {

                toastr.success('Success', 'Password has been reset !');
                // var delay = 3000; 
                // setTimeout(function()
                // {               
                //     location.reload();
                // }, delay);
                // console.log(response);
            }, error: function (err) {
                console.log(err);
            }
        });

    }
});


 $('#frmAdminProfile').validate({
    rules:{
        name : {
            required : true
        },email : {
            required : true
        },first_name : {
            required : true
        }
    },
    submitHandler: function (form) {
        var id = $('#admin_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var file_data = $('#image').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('name',$('#user_name').val());
        form_data.append('phone',$('#phone').val());
        form_data.append('first_name',$('#first_name').val());
        form_data.append('last_name',$('#last_name').val());
        form_data.append('email',$('#email').val());
        form_data.append('zip_code',$('#zip_code').val());
        form_data.append('address',$('#address').val());
        form_data.append('address',$('#address').val());
        form_data.append('country',$('#country').val());
        form_data.append('city',$('#city').val());
        form_data.append('gender',$('#gender').val());
        jQuery.ajax({
            url: "/upload/admin/profile/" + id,
            method: 'POST',
            data : form_data,
            type: 'POST',
            dataType:"json",
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            success: function (response) {
                // console.log(response);
                toastr.success('Success', 'item has been updated !');
                // var delay = 3000; 
                // setTimeout(function()
                // {               
                //     location.reload();
                // }, delay);
               
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