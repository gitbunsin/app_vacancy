


$("#frmSkillEdit").validate({
    rules: {
        user_skill_name : {
          required: true,
       },skill_year:{
        required: true,
       }
    }, submitHandler: function (form) {
        var id = $('#user_new_skill_id_edit').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/personal-skill/" + id,
            method: 'PUT',
            data: {
                "name" : $('#user_skill_name_edit').val(),
                "year" : $('#skill_year_edit').val(),
            },
            success: function(result)
            {
            //    console.log(result);
            toastr.success('Success', 'item has been updated !');
               $('#ModalSkillEdit').modal('hide');
               var skill = '<div class="card" id="card_user_new_skill'+ result.id +'">' +
               '<div class="card-body">' +
                   '<p class="card-text">' + 
                       '<strong>Skill Name :</strong>' +
                             result.name +
                       '<strong> Experience Year : </strong> '+
                            result.year + ',' +
                           '<a href="#" onclick="userSkillDelete('+ result.id + ');"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp'+
                           '<a href="#" onclick="userSkillEdit('+ result.id +');"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>' + 
                       '</p>'+
               '</div>'+
           '</div>'+
           '<br/>';
            $('#card_user_new_skill'+result.id).replaceWith(skill);
            },error : function(err){
                console.log(err);
            }
        });
    }
});






function userSkillEdit(id){
    // console.log(id);
    $('#user_new_skill_id_edit').val(id);
    $.ajax({
        type: "GET",
        url: "/user/personal-skill/" + id + "/edit",
        success: function(result)
        {
            console.log(result);   
            $('#user_skill_name_edit').val(result.name);     
            $('#skill_year_edit').val(result.year);     
            $('#ModalSkillEdit').modal('show');
        },error : function(err){
  
              console.log(err);
        }
    });
  
}

function userSkillDelete(id)
{
    $('#user_skill_new_id').val(id);
    $('#ModalSkillDelete').modal('show');
}
$('#frmSkillDelete').validate({
    submitHandler: function (form) {
        var id = $('#user_skill_new_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/personal-skill" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalSkillDelete').modal('hide');
                $('#card_user_new_skill'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });






function loadSkill(){

    $('#ModalSkill').modal('show');
}
$("#frmSkill").validate({
    rules: {
        user_skill_name : {
          required: true,
       },skill_year:{
        required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/personal-skill",
            method: 'POST',
            data: {
                "name" : $('#user_skill_name').val(),
                "year" : $('#skill_year').val(),
            },
            success: function(result)
            {
            //    console.log(result);
               $('#ModalSkill').modal('hide');
               var skill = '<div class="card" id="card_user_new_skill'+ result.id +'">' +
               '<div class="card-body">' +
                   '<p class="card-text">' + 
                       '<strong>Skill Name :</strong>' +
                             result.name +
                       '<strong> Experience Year : </strong> '+
                            result.year + ',' +
                           '<a href="#" onclick="userSkillDelete('+ result.id + ');"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp'+
                           '<a href="#" onclick="userSkillEdit('+ result.id +');"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>' + 
                       '</p>'+
               '</div>'+
           '</div>'+
           '<br/>';
            $('#div_card_user_skill').append(skill);
            },error : function(err){

                console.log(err);
            }
        });
    }
});