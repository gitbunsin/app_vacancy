$("#frmEditUserSkill").validate({
    rules: {
        school_skill_edit: {
          required: true,
       },study_skill_edit:{
        required: true,
       },degree_skill_edit : {
           required : true
       },
       year_skill_edit : {
           required : true
       },year_to_skill_edit : {
           required : true
       },city_skill_edit : {
           required : true
       },
       country_skill_edit : {
           required : true
       }
    }, submitHandler: function (form) {
        id = $('#user_skill_id_edit_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/skill/" + id ,
            method: 'PUT',
            data: {
                "user_id" : $('#user_skill_id').val(),
                "school" : $('#school_skill_edit').val(),
                "study" : $('#study_skill_edit').val(),
                "degree" : $('#degree_skill_edit').val(),
                "year" : $('#year_skill_edit').val(),
                "year_to" : $('#year_to_skill_edit').val(),
                "country" : $('#country_skill_edit').val(),
                "city" : $('#city_skill_edit').val()
            },
            success: function(result)
            {
                $('#ModalEditUserSkill').modal('hide');
               var skill = '<div class="card" id="card_skill'+ result.id +'">' +
               '<div class="card-body">' +
                   '<p class="card-text">' + 
                       '<strong>School :</strong>' +
                           result.school +
                       '<strong> Degree : </strong> '+
                            result.degree + ',' +
                       '<strong>Year :</strong>' +
                            result.year + ' - '+ result.year_to + ' &nbsp;&nbsp ' + 
                        '<strong>' + 
                           '<a href="#" onclick="skillDelete('+ result.id + ');"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp'+
                           '<a href="#" onclick="skillEdit('+ result.id +');"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>' + 
                       '</p>'+
               '</div>'+
           '</div>'+
           '<br/>';
           toastr.success('Success', 'item has been updated !');
            $('#card_skill'+result.id).replaceWith(skill);
            },error : function(err){

                console.log(err);
            }
        });
    }
});

function skillEdit(id){
    // console.log(id);
    $('#user_skill_id_edit_id').val(id);
    $.ajax({
        type: "GET",
        url: "/user/skill/" + id + '/edit' ,
        success: function(result)
        {
            // console.log(result);
            $('#study_skill_edit').val(result.study);
            $('#school_skill_edit').val(result.school);
            $('#year_skill_edit').val(result.year);
            $('#year_to_skill_edit').val(result.year_to);
            var jx = $('#degree_skill_edit');
            var all_degree = ["Associate degree","Bachelor degree","Master degree","Doctoral degree"];
            jx.empty();
            $.each(all_degree, function (key , value) {
                var isSelected = '';
                if(result.degree == value)
                {
                    isSelected = 'selected';
                }
                jx.append('<option value="'+value+'" '+isSelected+' >'+value+'</option>');
            });
            //country
            var c = $('#country_skill_edit');
            c.empty();
            $.each(result.all_country, function (key , value) {
                var isSelected = '';
                if(result.country_id == value.id)
                {
                    isSelected = 'selected';
                }
                c.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
            });
            //City 
            var city = $('#city_skill_edit');
            city.empty();
            $.each(result.all_city, function (key , value) {
                var isSelected = '';
                if(result.city_id == value.id)
                {
                    isSelected = 'selected';
                }
                city.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
            });

            $('#ModalEditUserSkill').modal('show');
        },error : function(err){
  
              console.log(err);
        }
    });
  
}


function skillDelete(id)
{
    $('#user_skill_delete_id').val(id);
    $('#ModalDeleteUserSkill').modal('show');
}
$('#frmDeleteUserSkill').validate({
    submitHandler: function (form) {
        var id = $('#user_skill_delete_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/skill" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteUserSkill').modal('hide');
                $('#card_skill'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });


 function LoadUserSkill()
{
    $('#ModalAddUserSkill').modal('show');
}
//Add Skill
$("#frmAddUserSkill").validate({
    rules: {
        school_skill: {
          required: true,
       },study_skill:{
        required: true,
       },degree_skill : {
           required : true
       },
       year_skill : {
           required : true
       },year_to_skill : {
           required : true
       },city_skill : {
           required : true
       },
       country_skill : {
           required : true
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/skill",
            method: 'POST',
            data: {
                "user_id" : $('#user_skill_id').val(),
                "school" : $('#school_skill').val(),
                "study" : $('#study_skill').val(),
                "degree" : $('#degree_skill').val(),
                "year" : $('#year_skill').val(),
                "year_to" : $('#year_to_skill').val(),
                "country" : $('#country_skill').val(),
                "city" : $('#city_skill').val()
            },
            success: function(result)
            {
               // console.log(result);
               $('#ModalAddUserSkill').modal('hide');
               var skill = '<div class="card" id="card_skill'+ result.id +'">' +
               '<div class="card-body">' +
                   '<p class="card-text">' + 
                       '<strong>School :</strong>' +
                           result.school +
                       '<strong> Degree : </strong> '+
                            result.degree + ',' +
                       '<strong>Year :</strong>' +
                            result.year + ' - '+ result.year_to + ' &nbsp;&nbsp ' + 
                        '<strong>' + 
                           '<a href="#" onclick="skillDelete('+ result.id + ');"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp'+
                           '<a href="#" onclick="skillEdit('+ result.id +');"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>' + 
                       '</p>'+
               '</div>'+
           '</div>'+
           '<br/>';
            $('#card_user_skill').append(skill);
            },error : function(err){

                console.log(err);
            }
        });
    }
});