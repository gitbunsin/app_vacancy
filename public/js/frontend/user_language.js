$("#frmEditUserLanguage").validate({
    rules: {
        language_id_edit : {
          required: true,
       },level_id_edit:{
        required: true,
       }
    }, submitHandler: function (form) {
       var id =  $('#user_language_id_edit').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/language/" + id,
            method: 'PUT',
            data: {
                "language_id" : $('#language_id_edit').val(),
                "level_id" : $('#level_id_edit').val(),
            },
            success: function(result)
            {
               console.log(result);
               $('#ModalEditUserLanague').modal('hide');
               var language = '<div class="card" id="card_language'+ result.id +'">' +
               '<div class="card-body">' +
                   '<p class="card-text">' + 
                       '<strong>Language :</strong>' +
                             result.lang.name +
                       '<strong> Level : </strong> '+
                            result.level + ',' +
                           '<a href="#" onclick="languageDelete('+ result.id + ');"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp'+
                           '<a href="#" onclick="languageEdit('+ result.id +');"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>' + 
                       '</p>'+
               '</div>'+
           '</div>'+
           '<br/>';
            $('#card_language'+result.id).replaceWith(language);
            },error : function(err){

                console.log(err);
            }
        });
    }
});


function languageEdit(id){
    // console.log(id);
    $('#user_language_id_edit').val(id);
    $.ajax({
        type: "GET",
        url: "/user/language/" + id + "/edit",
        success: function(result)
        {
            console.log(result);        
            var jx = $('#level_id_edit');
            var all_degree = ["Basic","Fair","Good","Very Good","Proficiency","Native"];
            jx.empty();
            $.each(all_degree, function (key , value) {
                var isSelected = '';
                if(result.level == value)
                {
                    isSelected = 'selected';
                }
                jx.append('<option value="'+value+'" '+isSelected+' >'+value+'</option>');
            });
            // //country
            var c = $('#language_id_edit');
            c.empty();
            $.each(result.all_lang, function (key , value) {
                var isSelected = '';
                if(result.language_id == value.id)
                {
                    isSelected = 'selected';
                }
                c.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
            });

            $('#ModalEditUserLanague').modal('show');
        },error : function(err){
  
              console.log(err);
        }
    });
  
}
function languageDelete(id)
{
    $('#user_language_id').val(id);
    $('#ModalDeleteUserLanguage').modal('show');
}
$('#frmDeleteUserLanguage').validate({
    submitHandler: function (form) {
        var id = $('#user_language_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/language" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteUserLanguage').modal('hide');
                $('#card_language'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

 function loadUserLanguage()
 {
     $('#ModalAddUserLanague').modal('show');
 }
$("#frmAddUserLanguage").validate({
    rules: {
        language_id : {
          required: true,
       },level_id:{
        required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/language",
            method: 'POST',
            data: {
                "language_id" : $('#language_id').val(),
                "level_id" : $('#level_id').val(),
            },
            success: function(result)
            {
               console.log(result);
               $('#ModalAddUserLanague').modal('hide');
               var language = '<div class="card" id="card_language'+ result.id +'">' +
               '<div class="card-body">' +
                   '<p class="card-text">' + 
                       '<strong>Language :</strong>' +
                             result.lang.name +
                       '<strong> Level : </strong> '+
                            result.level + ',' +
                           '<a href="#" onclick="languageDelete('+ result.id + ');"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp'+
                           '<a href="#" onclick="languageEdit('+ result.id +');"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>' + 
                       '</p>'+
               '</div>'+
           '</div>'+
           '<br/>';
            $('#div_card_language').append(language);
            },error : function(err){

                console.log(err);
            }
        });
    }
});