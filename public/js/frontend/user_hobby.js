


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
               var hobby = '<div  id="card_hobby_edit'+result.id+'">'+
               '<div class="jobint user-delete-hobby'+result.id+'">'+
               '<div class="row">'+
               '<div class="col-md-8 col-sm-8">'+
                   '<h4><a href="#.">'+ result.name +'</a></h4>'+
               '</div>'+
               '<div class="col-md-3 col-sm-3">'+
                   '<a href="#." onclick="hobbyEdit('+result.id+');" class="applybtn">Edit</a> <a href="#." onclick="hobbyDelete('+result.id+');" class="applybtn">Delete</a>'+
               '</div>'+
               '</div>'+
           '</div>'+
           '<br/>';
            $('#card_hobby_edit'+result.id).replaceWith(hobby);
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
                $('.user-delete-hobby'+response.id).remove();
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
               var hobby = '<div  id="card_hobby_edit'+result.id+'">'+
               '<div class="jobint user-delete-hobby'+result.id+'">'+
               '<div class="row">'+
               '<div class="col-md-8 col-sm-8">'+
                   '<h4><a href="#.">'+ result.name +'</a></h4>'+
               '</div>'+
               '<div class="col-md-3 col-sm-3">'+
                   '<a href="#." onclick="hobbyEdit('+result.id+');" class="applybtn">Edit</a> <a href="#." onclick="hobbyDelete('+result.id+');" class="applybtn">Delete</a>'+
               '</div>'+
               '</div>'+
           '</div>'+
           '<br/>';
            $('#user-hobby').append(hobby);
            },error : function(err){

                console.log(err);
            }
        });
    }
});