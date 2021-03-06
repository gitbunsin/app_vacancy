
function updateAboutMe(id){
    $('#user_about_me_id').val(id);
    $.ajax({
        type: "GET",
        url: "/user/about-me/" + id,
        success: function(result)
        {
            $('#about_me').val(result.about_me);
            $('#ModalUserAboutMe').modal('show');

        },error:function(err){
            console.log(err);

        }
    });
}

$('#frmUserAboutMe').validate({
    rules:{
        about_me : {
            required : true
        }
    },
    submitHandler: function (form) {
        var id = $('#user_about_me_id').val();
        // console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            method: 'POST',
            url: "/user/update-about-me/" + id,
            data : {
                "about_me" : $('#about_me').val(),
            },
            success: function (response) {
                console.log(response.about_me);
                $('#ModalUserAboutMe').modal('hide');
                $('#card_about_me').append(response.about_me);
                toastr.success('Success', 'item has been updated !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });



$("#frmUserEducationEdit").validate({
    rules: {
        school_edit: {
          required: true,
       },study_edit:{
        required: true,
       },degree_edit : {
           required : true
       },
       year_edit : {
           required : true
       },year_to_edit : {
           required : true
       },city_edit : {
           required : true
       },
       country_edit : {
           required : true
       }
    }, submitHandler: function (form) {
        var id = $('#user_education_id_edit').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/education/"+id,
            method: 'PUT',
            data: {
                "school" : $('#school_edit').val(),
                "study" : $('#study_edit').val(),
                "degree" : $('#degree_edit').val(),
                "year" : $('#year_edit').val(),
                "year_to" : $('#year_to_edit').val(),
                "country" : $('#country_edit').val(),
                "city" : $('#city_edit').val(),
                "description" : $('#description_education_edit').val(),
            },
            success: function(result)
            {
               $('#UserEducationEdit').modal('hide');
               var education = '<div  id="card_education-edit'+result.id+'">'+
               '<div class="jobint user-delete-education'+result.id+'">'+
               '<div class="row">'+
               '<div class="col-md-8 col-sm-8">'+
                   '<h4><a href="#.">'+ result.school +'</a></h4>'+
                   '<div class="company"><a href="#.">'+ result.degree +'</a></div>'+
                   '<div class="jobloc"><label class="fulltime">' + result.year +' - '+result.year_to+'</label>   - <span>'+result.city.name+'</span></div>'+
               '</div>'+
               '<div class="col-md-3 col-sm-3">'+
                   '<a href="#." onclick="educationEdit('+result.id+');" class="applybtn">Edit</a> <a href="#." onclick="educationDelete('+ result.id +');" class="applybtn">Delete</a>'+
               '</div>'+
               '</div>'+
           '</div>'+
           '<br/>';
            $('#card_education-edit'+result.id).replaceWith(education);
            toastr.success('Success', 'item has been updated !');
            },error : function(err){

                console.log(err);
            }
        });
    }
});
function loadUserEducation(){

    $('#UserEducation').modal('show');
}

function educationEdit(id){
    $('#user_education_id_edit').val(id);
    $.ajax({
        type: "GET",
        url: "/user/education/" + id + "/edit",
        success: function(result)
        {
            $('#study_edit').val(result.study);
            $('#school_edit').val(result.school);
            $('#year_edit').val(result.year);
            $('#year_to_edit').val(result.year_to);
            $('#description_education_edit').val(result.description);
            // console.log(result);
            var jx = $('#degree_edit');
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
            var c = $('#country_edit');
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
            var city = $('#city_edit');
            city.empty();
            $.each(result.all_city, function (key , value) {
                var isSelected = '';
                if(result.city_id == value.id)
                {
                    isSelected = 'selected';
                }
                city.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
            });

            $('#UserEducationEdit').modal('show');
        },error : function(err){
  
              console.log(err);
        }
    });
  
}

function educationDelete(id)
{
    // console.log(id);
    $('#user_education_delete_id').val(id);
    $('#ModalDeleteUserEducation').modal('show');
}
$('#frmDeleteUserEducation').validate({
    submitHandler: function (form) {
        var id = $('#user_education_delete_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/education" +'/'+ id,
            method: 'Delete',
            success: function (response) {
                console.log(id);
                $('#ModalDeleteUserEducation').modal('hide');
                $('.user-delete-education'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });


$("#frmAddEducation").validate({
    rules: {
        school: {
          required: true,
       },study:{
        required: true,
       },degree : {
           required : true
       },
       year : {
           required : true
       },year_to : {
           required : true
       },city : {
           required : true
       },
       country : {
           required : true
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/education",
            method: 'POST',
            data: {
                // "user_id" : $('#user_education_id').val(),
                "school" : $('#school').val(),
                "study" : $('#study').val(),
                "degree" : $('#degree').val(),
                "year" : $('#year').val(),
                "year_to" : $('#year_to').val(),
                "country" : $('#country').val(),
                "city" : $('#city').val(),
                "description" : $('#description_education').val()
            },
            success: function(result)
            {
               console.log(result);
               $('#UserEducation').modal('hide');
               var education = '<div  id="card_education-edit'+result.id+'">'+
               '<div class="jobint user-delete-education'+result.id+'">'+
									'<div class="row" id="card_education-edit'+result.id+'" id="card_education-edit'+result.id+'">'+
									'<div class="col-md-8 col-sm-8">'+
										'<h4><a href="#.">'+ result.school +'</a></h4>'+
										'<div class="company"><a href="#.">'+ result.degree +'</a></div>'+
										'<div class="jobloc"><label class="fulltime">' + result.year +' - '+result.year_to+'</label>   - <span>'+result.city.name+'</span></div>'+
									'</div>'+
									'<div class="col-md-3 col-sm-3">'+
										'<a href="#." onclick="educationEdit('+result.id+');" class="applybtn">Edit</a> <a href="#." onclick="educationDelete('+ result.id +');" class="applybtn">Delete</a>'+
									'</div>'+
									'</div>'+
								'</div>'+
								'<br/>';
            $('#user-education').append(education);
            },error : function(err){

                console.log(err);
            }
        });
    }
});