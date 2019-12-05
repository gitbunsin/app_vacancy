$(document).ready(function () {
   $('#frmEditResume').validate({
      rules : {
         file_name_edit : {
            required : true,
         }
      } ,submitHandler : function (e) {

         var id = $('#user_resume_id_edit').val();
         var extension = $('#file_name_edit').val().split('.').pop().toLowerCase();
         if ($.inArray(extension, ['pdf', 'doc', 'xlsx']) == -1) {
            toastr.error('Please Select Valid File... !');
            //  $('#errormessage').html('Please Select Valid File... ');
         } else {
     
             var file_data = $('#file_name_edit').prop('files')[0];
             var form_data = new FormData();
             form_data.append('file_name', file_data);

             $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
   
             $.ajax({
                 url: "user/attachment/update/" + id, // point to server-side PHP script
                 data: form_data,
                 type: 'POST',
                 dataType:"json",
                 contentType: false, // The content type used when sending data to the server.
                 cache: false, // To unable request pages to be cached
                 processData: false,
                 success: function(result) {
                   console.log(result);
                  $('#ModalEditUserCv').modal('hide');
                  toastr.success('Success', 'item has been Updated !');
                  var resume = '<tr id="tr_userCV' + result.id + '"><td>' + result.file_name + '</td><td>' + result.file_size + '</td><td>' + result.attachment_type + '</td>';
                  resume += '<th><a onclick="EditUserCv('+ result.id + ');"  data-toggle="modal" class="btn btn-primary">Edit</a>  <a onclick="DeleteUserCv(' + result.id + ');"  class="btn btn-danger">Delete</a></th></tr>';
                  $("#tr_userCv"+result.id).replaceWith(resume);
                 },error:function(err){
                  console.log(err);
                 }
             });
         }
      }
   });
});





function EditUserCv(id)
{
   $('#frmEditResume').trigger('reset');
   $('#user_resume_id_edit').val(id);
   $.ajax({
      type: "GET",
      url: "user/attachment/edit" + "/" + id ,
      success: function(result)
      {
         // console.log(result);
         $('#ModalEditUserCv').modal('show');
         $('#resume_edit').val(result.file_name);
        
      },error : function(err){

            console.log(err);
      }
  });
}

function DeleteUserCv(id)
{
    $('#ModalDeleteUserCv').modal('show');
    $('#user_resume_id').val(id);
   //  console.log(id);
}

$('#frmDeleteResume').validate({
    submitHandler: function (form) {
        var id = $('#user_resume_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "user/attachment/delete" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteUserCv').modal('hide');
                $('#tr_userCv'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

function UploadResume(){
   $('#UserUploadResume').modal('show');
   $('#frmUploadResume').trigger('reset');
}
$(document).ready(function () {
   $('#frmUploadResume').validate({
      rules : {
         file_name : {
            required : true,
         }
      } ,submitHandler : function (e) {

         var id = $('#user_resume_id').val();
         var extension = $('#file_name').val().split('.').pop().toLowerCase();
         if ($.inArray(extension, ['pdf', 'doc', 'xlsx']) == -1) {
            toastr.warning('The user is not logined in the system !');
            //  $('#errormessage').html('Please Select Valid File... ');
         } else {
     
             var file_data = $('#file_name').prop('files')[0];
             var form_data = new FormData();
             form_data.append('file', file_data);

             $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
   
             $.ajax({
                 url: "user/attachment/" + id, // point to server-side PHP script
                 data: form_data,
                 type: 'POST',
                 dataType:"json",
                 contentType: false, // The content type used when sending data to the server.
                 cache: false, // To unable request pages to be cached
                 processData: false,
                 success: function(result) {
                       $('#UserUploadResume').modal('hide');
                       toastr.success('Success', 'item has been deleted !');
                       var resume = '<tr id="tr_userCV' + result.id + '"><td>' + result.file_name + '</td><td>' + result.file_size + '</td><td>' + result.attachment_type + '</td>';
                       resume += '<th><a onclick="EditUserCv('+result.id+');" class="btn btn-primary">Edit</a>  <a onclick="DeleteUserCv('+ result.id + ');" class="btn btn-danger">Delete</a></th></tr>';
                       $('#tbl_resume').append(resume);
                 },error:function(err){
                  console.log(err);
                 }
             });
         }
      }
   });
});


function ApplyJob()
{
   $.ajax({
      type: "GET",
      url: "/checkUserLogin" ,
      success: function(result)
      {
         console.log(result);
         $('#UserLogin').modal('show');
        //  $('#category_name_edit').val(result.name);
      },error : function(err){

            console.log(err);
      }
  });
}


function NotLogin()
{
   $.ajax({
      type: "GET",
      url: "/checkUserLogin" ,
      success: function(result)
      {
         console.log(result);
         toastr.warning('The user is not logined in the system !');
         // $('#UserNotLogin').modal('show');
        //  $('#category_name_edit').val(result.name);
      },error : function(err){

            console.log(err);
      }
  });
}