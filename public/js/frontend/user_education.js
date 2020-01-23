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
    //    var country_id = $('#country_edit').val();
    //    console.log(country_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/education/"+id,
            method: 'POST',
            data: {
                "user_id" : $('#user_edit_education_id').val(),
                "school" : $('#school_edit').val(),
                "study" : $('#study_edit').val(),
                "degree" : $('#degree_edit').val(),
                "year" : $('#year_edit').val(),
                "year_to" : $('#year_to_edit').val(),
                "country" : $('#country_edit').val(),
                "city" : $('#city_edit').val()
            },
            success: function(result)
            {
               console.log(result);
               $('#UserEducationEdit').modal('hide');
               var education = '<div class="card" id="card_education'+ result.id +'">' +
               '<div class="card-body">' +
                   '<p class="card-text">' + 
                       '<strong>School :</strong>' +
                           result.school +
                       '<strong> Degree : </strong> '+
                            result.degree + ',' +
                       '<strong>Year :</strong>' +
                            result.year + ' - '+ result.year_to + ' &nbsp;&nbsp ' + 
                        '<strong>' + 
                           '<a href="#" onclick="educationDelete('+ result.id + ');"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp'+
                           '<a href="#" onclick="educationEdit('+ result.id +');"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>' + 
                       '</p>'+
               '</div>'+
           '</div>'+
           '<br/>';
            $('#card_education'+result.id).replaceWith(education);
            },error : function(err){

                console.log(err);
            }
        });
    }
});
function loadUserEducation(){

    $('#UserEducation').modal('show');
}
function educationDelete(id)
{
    $('#user_education_delete_id').val(id);
    $('#ModalDeleteUserEducation').modal('show');
}
function educationEdit(id){
    $('#user_education_id_edit').val(id);
    $.ajax({
        type: "GET",
        url: "/user/education" + "/" + id ,
        success: function(result)
        {
            $('#study_edit').val(result.study);
            $('#school_edit').val(result.school);
            $('#year_edit').val(result.year);
            $('#year_to_edit').val(result.year_to);
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

$('#frmDeleteUserEducation').validate({
    submitHandler: function (form) {
        var id = $('#user_education_delete_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/education" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteUserEducation').modal('hide');
                $('#card_education'+response.id).remove();
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
                "user_id" : $('#user_education_id').val(),
                "school" : $('#school').val(),
                "study" : $('#study').val(),
                "degree" : $('#degree').val(),
                "year" : $('#year').val(),
                "year_to" : $('#year_to').val(),
                "country" : $('#country').val(),
                "city" : $('#city').val()
            },
            success: function(result)
            {
               console.log(result);
               $('#UserEducation').modal('hide');
               var education = '<div class="card" id="card_education'+ result.id +'">' +
               '<div class="card-body">' +
                   '<p class="card-text">' + 
                       '<strong>School :</strong>' +
                           result.school +
                       '<strong> Degree : </strong> '+
                            result.degree + ',' +
                       '<strong>Year :</strong>' +
                            result.year + ' - '+ result.year_to + ' &nbsp;&nbsp ' + 
                        '<strong>' + 
                           '<a href="#" onclick="educationDelete('+ result.id + ');"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp'+
                           '<a href="#" onclick="educationEdit('+ result.id +');"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>' + 
                       '</p>'+
               '</div>'+
           '</div>'+
           '<br/>';
            $('#card_user_education').append(education);
            },error : function(err){

                console.log(err);
            }
        });
    }
});