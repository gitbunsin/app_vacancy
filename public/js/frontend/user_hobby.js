


$("#frmUserHobbyEdit").validate({
    rules: {
        user_hobby_edit : {
          required: true,
       }
    }, submitHandler: function (form) {
        var id = $('#user_hobby_id_edit').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/hobby/" + id,
            method: 'PUT',
            data: {
                "name" : $('#name_hobby_edit').val(),
            },
            success: function(result)
            {
            //    console.log(result);
            toastr.success('Success', 'item has been updated !');
               $('#ModalUserHobbyEdit').modal('hide');
               var skill = '<div class="card" id="card_user_hobby'+ result.id +'">' +
               '<div class="card-body">' +
                   '<p class="card-text">' + 
                       '<strong>Hobby Name :</strong>' +
                             result.name +
                           '<a href="#" onclick="hobbyDelete('+ result.id + ');"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp'+
                           '<a href="#" onclick="hobbyEdit('+ result.id +');"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>' + 
                       '</p>'+
               '</div>'+
           '</div>'+
           '<br/>';
            $('#card_user_hobby'+result.id).replaceWith(skill);
            },error : function(err){
                console.log(err);
            }
        });
    }
});






function hobbyEdit(id){
    $('#user_hobby_id_edit').val(id);
    $.ajax({
        type: "GET",
        url: "/user/hobby/" + id + "/edit",
        success: function(result)
        {
            console.log(result);   
            $('#name_hobby_edit').val(result.name);        
            $('#ModalUserHobbyEdit').modal('show');
        },error : function(err){
  
              console.log(err);
        }
    });
  
}

function hobbyDelete(id)
{
    $('#user_hobby_id').val(id);
    $('#ModalHobbyDelete').modal('show');
}
$('#frmHobby').validate({
    submitHandler: function (form) {
        var id = $('#user_hobby_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/hobby" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalHobbyDelete').modal('hide');
                $('#card_user_hobby'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });






function loadHobby(){

    $('#ModalUserHobby').modal('show');
}
$("#frmUserHobby").validate({
    rules: {
        name : {
          required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/hobby",
            method: 'POST',
            data: {
                "name" : $('#name_hobby').val(),
            },
            success: function(result)
            {
            //    console.log(result);
               $('#ModalUserHobby').modal('hide');
               var skill = '<div class="card" id="card_user_hobby'+ result.id +'">' +
               '<div class="card-body">' +
                   '<p class="card-text">' + 
                       '<strong>Hobby Name : </strong>' +
                             result.name +
                           '<a href="#" onclick="hobbyDelete('+ result.id + ');"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp'+
                           '<a href="#" onclick="hobbyEdit('+ result.id +');"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>' + 
                       '</p>'+
               '</div>'+
           '</div>'+
           '<br/>';
            $('#div_card_user_hobby').append(skill);
            },error : function(err){

                console.log(err);
            }
        });
    }
});