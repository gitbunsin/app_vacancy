$('#frmUpdateUserProfile').validate({
    rules:{
        name : {
            required : true
        },email : {
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
        form_data.append('name',$('#name').val());
        form_data.append('phone',$('#phone').val());
        form_data.append('user_email',$('#user_email').val());
        form_data.append('zip',$('#zip').val());
        form_data.append('address',$('#address').val());
        jQuery.ajax({
            url: "upload/user/profile/" + id,
            method: 'POST',
            data : form_data,
            type: 'POST',
            dataType:"json",
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            success: function (response) {
                console.log(response);
                // $('#ModalDeleteUserCv').modal('hide');
                // $('#tr_userCv'+response.id).remove();
                toastr.success('Success', 'item has been updated !');
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