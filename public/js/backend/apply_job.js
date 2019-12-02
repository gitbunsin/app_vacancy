// function ApplyJob(){
//     $('#frmDeleteVacancy').modal('show');
// }
function UploadResume(){
   $('#UserUploadResume').modal('show');
}
$(document).ready(function () {
   $('#frmUploadResume').validate({
      rules : {
         resume_id : {
            required : true,
         }
      } ,submitHandler : function (e) {

         var id = $('#user_resume_id').val();
         var extension = $('#resume_id').val().split('.').pop().toLowerCase();
         if ($.inArray(extension, ['pdf', 'doc', 'xlsx']) == -1) {
            toastr.warning('The user is not logined in the system !');
            //  $('#errormessage').html('Please Select Valid File... ');
         } else {
     
             var file_data = $('#resume_id').prop('files')[0];
             var form_data = new FormData();
             form_data.append('file', file_data);

             $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
   
             $.ajax({
                 url: "admin/user/resume/" + id, // point to server-side PHP script
                 data: form_data,
                 type: 'POST',
                 dataType:"json",
               //   contentType: false, // The content type used when sending data to the server.
               //   cache: false, // To unable request pages to be cached
                 processData: false,
                 success: function(data) {
                     console.log(data);
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