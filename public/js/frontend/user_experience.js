$("#frmAddUserExpericenseEdit").validate({
    rules: {
        job_title_id_edit: {
          required: true,
       },company_name_edit:{
        required: true,
       },country_experience_edit : {
           required : true
       },
       city_experience_edit : {
           required : true
       },from_month_experience_edit : {
           required : true
       },from_to_experience_edit : {
           required : true
       },
       year_experience_edit : {
           required : true
       }
    }, submitHandler: function (form) {
        var id = $('#user_experience_edit_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/experience/" + id,
            method: 'PUT',
            data: {
                "job_title_id" : $('#job_title_id_edit').val(),
                "company_name" : $('#company_name_edit').val(),
                "year" : $('#year_experience_edit').val(),
                "year_to" : $('#year_to_experience_edit').val(),
                "country" : $('#country_experience_edit').val(),
                "city" : $('#city_experience_edit').val(),
                "from" : $('#from_month_edit').val(),
                "to" : $('#from_to_edit').val(),
                "description" : $('#description_experience_edit').val(),
            },
            success: function(result)
            {
            //    console.log(result);
            $('#ModalAddUserExperienceEdit').modal('hide');
            var experience = '<div  id="card_training_experiences_edit'+result.id+'">'+
                '<div class="jobint user-delete-experiences'+result.id+'">'+
                '<div class="row">'+
                '<div class="col-md-8 col-sm-8">'+
                    '<h4><a href="#.">'+  result.title.name  +'</a></h4>'+
                    '<div class="company"><a href="#.">'+ result.company_name +'</a></div>'+
                    '<div class="jobloc"><label class="fulltime">' + result.year +' - '+result.year_to+'</label></div>'+
                '</div>'+
                '<div class="col-md-3 col-sm-3">'+
                    '<a href="#." onclick="experienceEdit('+result.id+');" class="applybtn">Edit</a> <a href="#." onclick="experienceDelete('+result.id+');" class="applybtn">Delete</a>'+
                '</div>'+
                '</div>'+
            '</div>'+
            '<br/>';
            $('#card_training_experiences_edit'+result.id).replaceWith(experience);
            },error : function(err){

                console.log(err);
            }
        });
    }
});


function experienceEdit(id){
    // console.log(id);
    $('#user_experience_edit_id').val(id);
    $.ajax({
        type: "GET",
        url: "/user/experience" + "/" + id +'/edit',
        success: function(result)
        {
            console.log(result);

            $('#company_name_edit').val(result.company_name);
            $('#from_month_edit').val(result.from_month);
            $('#from_to_edit').val(result.from_month_to);
            $('#year_experience_edit').val(result.year);
            $('#year_to_experience_edit').val(result.year_to);
            $('#description_experience_edit').val(result.description);
            var jx = $('#job_title_id_edit');
            jx.empty();
            $.each(result.title, function (key , value) {
                var isSelected = '';
                if(result.job_title_id == value.id)
                {
                    isSelected = 'selected';
                }
                jx.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
            });
            // //country
            var c = $('#country_experience_edit');
            c.empty();
            $.each(result.all_country, function (key , value) {
                var isSelected = '';
                if(result.country_id == value.id)
                {
                    isSelected = 'selected';
                }
                c.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
            });
            // //City 
            var city = $('#city_experience_edit');
            city.empty();
            $.each(result.all_city, function (key , value) {
                var isSelected = '';
                if(result.city_id == value.id)
                {
                    isSelected = 'selected';
                }
                city.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
            });

            $('#ModalAddUserExperienceEdit').modal('show');
        },error : function(err){
  
              console.log(err);
        }
    });
  
}


function experienceDelete(id)
{
    $('#user_experience_id').val(id);
    $('#ModalDeleteUserExperience').modal('show');
}
$('#frmDeleteUserExperience').validate({
    submitHandler: function (form) {
        var id = $('#user_experience_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/experience" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteUserExperience').modal('hide');
                $('.user-delete-experiences'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });


 function userExperience()
{
    $('#ModalAddUserExperience').modal('show');
}
//Add Skill
$("#frmAddUserExpericense").validate({
    rules: {
        job_title_id: {
          required: true,
       },company_name:{
        required: true,
       },country_experience : {
           required : true
       },
       city_experience : {
           required : true
       },from_month_experience : {
           required : true
       },from_to_experience : {
           required : true
       },
       year_experience : {
           required : true
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/experience",
            method: 'POST',
            data: {
                "job_title_id" : $('#job_title_id').val(),
                "company_name" : $('#company_name').val(),
                "year" : $('#year_experience').val(),
                "year_to" : $('#year_to_experience').val(),
                "country" : $('#country_experience').val(),
                "city" : $('#city_experience').val(),
                "from" : $('#from_month').val(),
                "to" : $('#from_to').val(),
                "description" : $('#description_experience').val(),
            },
            success: function(result)
            {
            //    console.log(result);
               $('#ModalAddUserExperience').modal('hide');
               var experience = '<div  id="card_training_experiences_edit'+result.id+'">'+
               '<div class="jobint user-delete-experiences'+result.id+'">'+
               '<div class="row">'+
               '<div class="col-md-8 col-sm-8">'+
                   '<h4><a href="#.">'+  result.title.name  +'</a></h4>'+
                   '<div class="company"><a href="#.">'+ result.company_name +'</a></div>'+
                   '<div class="jobloc"><label class="fulltime">' + result.year +' - '+result.year_to+'</label></div>'+
               '</div>'+
               '<div class="col-md-3 col-sm-3">'+
                   '<a href="#." onclick="experienceEdit('+result.id+');" class="applybtn">Edit</a> <a href="#." onclick="experienceDelete('+result.id+');" class="applybtn">Delete</a>'+
               '</div>'+
               '</div>'+
           '</div>'+
           '<br/>';
    
            $('#user-experience').append(experience);
            },error : function(err){

                console.log(err);
            }
        });
    }
});