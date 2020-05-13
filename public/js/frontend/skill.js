


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
               $('#ModalSkillEdit').modal('hide');
               var skill = '<div  id="card_skill_edit'+result.id+'">'+
               '<div class="jobint user-delete-skill'+result.id+'">'+
               '<div class="row">'+
               '<div class="col-md-8 col-sm-8">'+
                   '<h4><a href="#.">'+   result.name  +'</a></h4>'+
                   '<div class="jobloc"><label class="fulltime">' +   result.year +'</label></div>'+
               '</div>'+
               '<div class="col-md-3 col-sm-3">'+
                   '<a href="#." onclick="userSkillEdit('+result.id+');" class="applybtn">Edit</a> <a href="#." onclick="userSkillDelete('+result.id+');" class="applybtn">Delete</a>'+
               '</div>'+
               '</div>'+
            '</div>'+
            '<br/>';
            $('#card_skill_edit'+result.id).replaceWith(skill);
            toastr.success('Success', 'item has been updated !');

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
                $('.user-delete-skill'+response.id).remove();
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
               var skill = '<div  id="card_skill_edit'+result.id+'">'+
               '<div class="jobint user-delete-skill'+result.id+'">'+
               '<div class="row">'+
               '<div class="col-md-8 col-sm-8">'+
                   '<h4><a href="#.">'+   result.name  +'</a></h4>'+
                   '<div class="jobloc"><label class="fulltime">' +   result.year +'</label></div>'+
               '</div>'+
               '<div class="col-md-3 col-sm-3">'+
                   '<a href="#." onclick="userSkillEdit('+result.id+');" class="applybtn">Edit</a> <a href="#." onclick="userSkillDelete('+result.id+');" class="applybtn">Delete</a>'+
               '</div>'+
               '</div>'+
            '</div>'+
            '<br/>';
            $('#user-skill').append(skill);
            },error : function(err){

                console.log(err);
            }
        });
    }
});