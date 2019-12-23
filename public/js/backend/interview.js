
function EditInterview(id)
{
   $.ajax({
      type: "GET",
      url: "/admin/interview" + "/" + id + "/edit",
      success: function(result)
      {
        console.log(result);
        $('#ModalAddInterview').modal('show');
        $('#interview_name').val(result.interview_name);
        $('#interview_date').val(result.interview_date);
        $('#interview_time').val(result.interview_time);
        $('#note').val(result.note);
        var status = $('#interview_status');
        status.empty();
        var all_status = ['interview','Pass','Fail','Offer','Reject'];
         $.each(all_status, function (key , value) {
            //  console.log(value);
               var isSelected = '';
               if(result.status == value)
               {
                  isSelected = 'selected';
               }
               status.append('<option value="'+value + '" '+isSelected+' >'+value+'</option>');
        });
      },error : function(err){

            console.log(err);
      }
  });
}
