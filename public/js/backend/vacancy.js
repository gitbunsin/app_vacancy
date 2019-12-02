
$('#frmEditModalVacancy').validate({
    rules: {
        job_category_vacancy_id_edit: {
            required: true,
        },
        hiring_manager_id: {
            required: true,
        },
        job_type_id_edit : {
            required: true,
        },
        vacancy_name_edit : {
            required: true,
        },
        skill_id_edit : {
            required: true,
        },
        location_id_edit : {
            required: true,
        },
        job_description_edit : {
            required: true,
        },
        closingDate_edit : {
            required: true,
        },
    },
    submitHandler: function (form) {
        var id = $('#vacancy_id_edit').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/job/" + id,
            method: 'PUT',
            data: {
                "job_category_vacancy_id": $('#job_category_vacancy_id_edit').val(),
                "hiring_manager_id": $('#hiring_manager_id_edit').val(),
                "job_type_id": $('#job_type_id_edit').val(),
                "skill_id": $('#skill_id_edit').val(),
                "location_id": $('#location_id_edit').val(),
                "job_description": $('#job_description_eidt').val(),
                "vacancy_name": $('#vacancy_name_edit').val(),
                "closingDate": $('#closingDate_edit').val(),
            },
            success: function (result) {
                // console.log(result);
                $('#ModalEditVacacny').modal('hide');
                toastr.success('Success', 'item has been updated !');
                var vacancy = '<tr id="tr_vacancy' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.vacancy_name + '</td><td>' + result.closingDate + '</td><td style="color:cadetblue;">' + result.status + '</td>';
                vacancy += '<th><a onclick="EditVacancy(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Vacancy"><i class="icon-edit"></i></a>  <a onclick="DeleteVacancy(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Vacancy"><i class="ti-trash"></i></a></th></tr>';
                $("#tr_vacancy" + result.id).replaceWith(vacancy);


            }, error: function (err) {
                console.log(err);
            }
});
}
});


function EditVacancy(id){
    
    $('#vacancy_id_edit').val(id);
    $.ajax({
            type: "GET",
            url: "/admin/job/" + id + "/edit",
            success: function(result)
            {
                // console.log(result);
                $('#ModalEditVacacny').modal('show');
                $('#vacancy_name_edit').val(result.vacancy_name);
                $('#closingDate_edit').val(result.closingDate);
                $("#job_description_eidt").summernote("code", result.job_description);
               

                

                 // skill
                 var s = $('#skill_id_edit');
                 s.empty();
                 $.each(result.all_skill, function (key , value) {
                     var isSelected = '';
                     $.each(result.vacancy_skill_id, function (k , v) {

                        if(v.skill_id == value.id)
                     {
                         isSelected = 'selected';
                     }
                     s.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');

                     });
                     
                 });
 

                // JobType
                var l = $('#location_id_edit');
                l.empty();
                $.each(result.location, function (key , value) {
                    var isSelected = '';
                    if(result.location == value.id)
                    {
                        isSelected = 'selected';
                    }
                    l.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
                });

                // JobType
                var j = $('#job_type_id_edit');
                j.empty();
                $.each(result.jobType, function (key , value) {
                      var isSelected = '';
                      if(result.jobType == value.id)
                      {
                         isSelected = 'selected';
                      }
                      j.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
               });


                //Category 
                var c = $('#job_category_vacancy_id_edit');
                c.empty();
                $.each(result.category, function (key , value) {
                      var isSelected = '';
                      if(result.category_id == value.id)
                      {
                         isSelected = 'selected';
                      }
                      c.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
               });

            },error : function(err){
                console.log(err); 
            }
        });
}


function AddVacancy(){
    $('#ModalAddVacacny').modal('show');
    $("#frmAddModalVacancy").trigger('reset');
}
$("#frmAddModalVacancy").validate({
    rules: {
        job_category_vacancy_id: {
            required: true,
        },
        hiring_manager_id: {
            required: true,
        },
        job_type_id : {
            required: true,
        },
        vacancy_name : {
            required: true,
        },
        skill_id : {
            required: true,
        },
        location_id : {
            required: true,
        },
        job_description : {
            required: true,
        },
        closingDate : {
            required: true,
        }
    }, submitHandler: function (form) {
        // console.log($('#job_description').val());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/job",
            method: 'POST',
            data: {
                "job_category_vacancy_id": $('#job_category_vacancy_id').val(),
                "hiring_manager_id": $('#hiring_manager_id').val(),
                "job_type_id": $('#job_type_id').val(),
                "skill_id": $('#skill_id').val(),
                "location_id": $('#location_id').val(),
                "job_description": $('#job_description').val(),
                "vacancy_name": $('#vacancy_name').val(),
                "closingDate": $('#closingDate').val(),
            },
            success: function (result) {
                // console.log(result);
                toastr.success('Success', 'item has been created !');
                $('#ModalAddVacacny').modal('hide');
                var vacancy = '<tr id="tr_vacancy' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.vacancy_name + '</td><td>' + result.closingDate + '</td><td style="color:cadetblue;">' + result.status + '</td>';
                vacancy += '<th><a onclick="EditVacancy(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Vacancy"><i class="icon-edit"></i></a>  <a onclick="DeleteVacancy(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Vacancy"><i class="ti-trash"></i></a></th></tr>';
                $('#tbl_vacancy').append(vacancy);


            }, error: function (err) {

                console.log(err);
            }
        });
    }
});

function DeleteVacancy(id){

    $('#frmDeleteVacancy').modal('show');
    $('#vacancy_id').val(id);

}

$('#frmDeleteVacancy').validate({
    submitHandler: function (form) {
        var id = $('#vacancy_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/job" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#frmDeleteVacancy').modal('hide');
                $('#tr_vacancy' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
});


    
    


$('.job_description').summernote({height: 300});


// $('.job_description_edit').summernote({height: 300});






//update 
$("#frmJobTitleEdit").validate({
    rules: {
        name_edit: {
            required: true,
        }
    }, submitHandler: function (form) {
        var id  = $('#job_tittle_edit').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/jobTitle" + '/' + id,
            method: 'PUT',
            data: {
                "name": $('#name_edit').val(),
                "description": $('#description_edit').val()
            },
            success: function (result) {
                
                $('#jobTitleEdit').modal('hide');
                toastr.success('Success', 'item has updated created !');
                var job_title = '<tr id="tr_job_title' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td><td>' + result.description + '</td>';
                job_title += '<th><a onclick="EditJobTitle(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Company"><i class="icon-edit"></i></a>  <a onclick="DeleteJobTitle(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-trash"></i></a></th></tr>';
                $("#tr_job_title" + result.id).replaceWith(job_title);

            },error : function(err){
                console.log(err);
            }
        });
    }
});
// EditJobTitle
function EditJobTitle(id){
    
    $('#job_tittle_edit').val(id);
    $.ajax({
            type: "GET",
            url: "/admin/jobTitle" + "/" + id + "/edit",
            success: function(data)
            {
                //console.log(data);
                $('#jobTitleEdit').modal('show');
                $('#name_edit').val(data.name);
                $('#description_edit').val(data.description);
            },error : function(err){

            }
        });
}
//Delete
function DeleteJobTitle(id) {
    $('#DeleteJobTtile').modal('show');
    $('#id_jobTitle').val(id);
}

$('#frmJobTitleDelete').validate({
    submitHandler: function (form) {
        var id = $('#id_jobTitle').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/jobTitle" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#DeleteJobTtile').modal('hide');
                $('#tr_job_title' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
});

//Add
$("#frmJobTitle").validate({
    rules: {
        name: {
            required: true,
        }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/jobTitle",
            method: 'POST',
            data: {
                "name": $('#name').val(),
                "description": $('#description').val()
            },
            success: function (result) {
                // console.log(result);
                toastr.success('Success', 'item has been created !');
                $('#exampleModal').modal('hide');
                var user = '<tr id="tr_job_title' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td><td>' + result.description + '</td>';
                user += '<th><a onclick="EditJobTitle(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Company"><i class="icon-edit"></i></a>  <a onclick="DeleteJobTitle(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-trash"></i></a></th></tr>';
                $('#tbl_job_title').append(user);


            }, error: function (err) {

                console.log(err);
            }
        });
    }
});



$(document).ready(function () {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});