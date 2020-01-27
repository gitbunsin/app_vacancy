function notBookmark()
{
    toastr.warning('The user is not logined in the system !');
}
function Bookmark(vacancy_id)
{
    $('#vacancy_bookmark_id').val(vacancy_id);
    $('#UserVacancyBookMark').modal('show');
}

$('#frmVacancyBookmark').validate({
    submitHandler: function (form) {
        var id = $('#vacancy_bookmark_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/bookmark/" + id,
            method: 'POST',
            success: function (response) {
                $('#UserVacancyBookMark').modal('hide');
                toastr.success('Success', 'item has been Bookmarked !');
               var delay = 3000; 
               setTimeout(function()
               {               
                  location.reload();
               }, delay);
               
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

 function bookmarkDelete(id)
 {
    $('#user_bookmark_id_delete').val(id);
    $('#userBookmarkDelete').modal('show');
 }

 $('#frmVacancyBookmarkDelete').validate({
    submitHandler: function (form) {
        var id = $('#user_bookmark_id_delete').val();
        vacancy_id = $('#bookmark_id').data("id") 
        // console.log(vacancy_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/bookmark/" + id,
            method: 'Delete',
            data : {
                'vacancy_id' : vacancy_id
            },  
            success: function (response) {
                $('#userBookmarkDelete').modal('hide');
                $('.remove-item' + response.id).remove();
                toastr.success('Success', 'item has been Deleted !');           
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });
