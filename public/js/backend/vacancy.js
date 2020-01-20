





$('#checkSalary').val('0');
$('#checkSalary').change(function(ev) {
    if ( $(this).is(':checked') ) $('#checkSalary').val('1');
    else $('#checkSalary').val('0');
});

$('#checkSalaryEdit').val('0');
$('#checkSalaryEdit').change(function(ev) {
    if ( $(this).is(':checked') ) $('#checkSalaryEdit').val('1');
    else $('#checkSalaryEdit').val('0');
});

$('#frmVacancyEditResume').validate({
    rules : {
        resume_file_edit : {
          required : true
       }
    },
    submitHandler: function (form) {
        var id = $('#vacancy_resume_id_edit').val();
        // var vacancy_id = ;
        // console.log(vacancy_id);
        var extension = $('#resume_file_edit').val().split('.').pop().toLowerCase();
                // console.log(extension);
                 if ($.inArray(extension, ['pdf', 'doc', 'xlsx']) == -1) {
                    toastr.error('Please Select Valid File... !');
                    //  $('#errormessage').html('Please Select Valid File... ');
                 } else {
        
                    var file_data = $('#resume_file_edit').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    form_data.append('vacancy_id', $('#vacancy_id_attachment').val());
                    $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                  });
                 jQuery.ajax({
                     url: "/vacancy-attachment/update/" + id ,
                     data: form_data,
                     type: 'POST',
                     dataType:"json",
                     contentType: false, // The content type used when sending data to the server.
                     cache: false, // To unable request pages to be cached
                     processData: false,
                     success: function (response) {
                         console.log(response);
                          $('#ModalCandidateEditResume').modal('hide');
                         // $('#tr_interview' + response.id).remove();
                         let ul =
                         '<div id="candidate_attachment" class="ul_id '+ response.id+' list" >' + 
                         '<li class="manage-list-row clearfix"> ' + 
                                ' <div class="job-info"> ' +
                                        ' <div class="job-details"> ' +
                                            ' <small class="job-company"><i class="ti-time"></i><b>Resume</b> : <a href="">' + response.file_name + '</a> </small>'+
                                            ' <small class="job-company"><i class="ti-location-pin"></i><b>Attachment_type </b>:' + response.attachment_type + '</small> ' +        
                                            ' <small class="job-company"><i class="ti-file"></i><b>File Size </b>: ' + response.file_size + '</small> ' +                                                                
                                         '</div>'+
                                     '</div>';
                                 ul += 
                                     '<div class="job-buttons">' + 
                                        '<a onclick="EditVacancyResume('+ response.id +');" class="btn btn-primary"><i class="icon-edit"></i></a> '+
                                        '<a onclick="DeleteVacancyResume('+ response.id +');" class="btn btn-danger"><i class="ti-trash"></i></a> '+ 
                                    '</div></li></div>';
                         
                             $('#candidate_attachment').replaceWith(ul);
                             toastr.success('Success', 'item has been deleted !');
 
                     }, error: function (err) {
                         console.log(err);
                     }
                 });
             }
    }
 });

function EditVacancyResume(id)
{
   $.ajax({
      type: "GET",
      url: "/admin/vacancy/" + id ,
      success: function(result)
      {
        //  console.log(result);
         $('#vacancy_resume_id_edit').val(id);
         $('#vacancy_id_attachment').val(result.vacancy_id);
         $('#old_attachment').val(result.file_name);
         $('#ModalCandidateEditResume').modal('show');
      },error : function(err){
        console.log(err);
      }
   });
}

function DeleteVacancyResume(id){

    $('#vacancy_delete_id').val(id);
    $('#ModalDeleteVacancyResume').modal('show');
 }
 $('#frmDeleteVacancyResume').validate({
    submitHandler: function (form) {
        var id = $('#vacancy_delete_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/vacancy" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteVacancyResume').modal('hide');
                $('.ul_id' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });
//function 
$('#frmVacancyResume').validate({
    rules : {
     resume_file : {
          required : true
       }
    },
    submitHandler: function (form) {
        var id = $('#vacancy_resume_id').val();
        var extension = $('#resume_file').val().split('.').pop().toLowerCase();
                // console.log(extension);
                 if ($.inArray(extension, ['pdf', 'doc', 'xlsx']) == -1) {
                    toastr.error('Please Select Valid File... !');
                    //  $('#errormessage').html('Please Select Valid File... ');
                 } else {
        
                    var file_data = $('#resume_file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file_name', file_data);
                    $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                  });
                 jQuery.ajax({
                     url: "/vacancy-attachment" + '/' + id,
                     data: form_data,
                     type: 'POST',
                     dataType:"json",
                     contentType: false, // The content type used when sending data to the server.
                     cache: false, // To unable request pages to be cached
                     processData: false,
                     success: function (response) {
                         console.log(response);
                         $('#ModalCandidateAddResume').modal('hide');
                         // $('#tr_interview' + response.id).remove();
                      
                         let ul =
                         '<div id="candidate_attachment" class="ul_id'+ response.id+' list" >' + 
                         '<li class="manage-list-row clearfix"> ' + 
                                ' <div class="job-info"> ' +
                                        ' <div class="job-details"> ' +
                                            ' <small class="job-company"><i class="ti-time"></i><b>Resume</b> : <a href="">' + response.file_name + '</a> </small>'+
                                            ' <small class="job-company"><i class="ti-location-pin"></i><b>Attachment_type </b>:' + response.attachment_type + '</small> ' +        
                                            ' <small class="job-company"><i class="ti-file"></i><b>File Size </b>: ' + response.file_size + '</small> ' +                                                                
                                         '</div>'+
                                     '</div>';
                                 ul += 
                                     '<div class="job-buttons">' + 
                                        '<a onclick="EditVacancyResume(' + response.id + ');" class="btn btn-primary"><i class="icon-edit"></i></a> '+
                                        '<a onclick="DeleteVacancyResume(' + response.id + ');" class="btn btn-danger"><i class="ti-trash"></i></a> '+ 
                                        '</div></li></div>';
                         
                             $('#div_vacancy_attachment').append(ul);
                             toastr.success('Success', 'item has been Added !');
 
                     }, error: function (err) {
                         console.log(err);
                     }
                 });
             }
    }
 });

function AddVacancyAttachment(id)
{
    $('#vacancy_resume_id').val(id);
    $('#ModalCandidateAddResume').modal('show');
}

 //custom rule method
 $.validator.addMethod("greaterThan",

 function (value, element, param) {
   var $min = $(param);
   if (this.settings.onfocusout) {
     $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
       $(element).valid();
     });
   }
   return parseInt(value) > parseInt($min.val());
 }, "Max must be greater than min");

$('#frmEditModalVacancy').validate({
    rules: {
        maxSalaryEdit: {
            greaterThan: '#minSalaryEdit'
          },
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
        },package_id_payment : {
            required: true,
        }
    },
    submitHandler: function (form) {
        var id = $('#vacancy_id_edit').val();
        var dd = $('#job_description_edit_1').val();
        console.log(dd)
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
                "job_title_id" : $('#job_title_id_edit').val(),
                "company_id": $('#company_id_edit').val(),
                "salary_cycle" : $('#salary_cycle_edit').val(), 
                "maxSalary" : $('#maxSalaryEdit').val(),
                "minSalary" : $('#minSalaryEdit').val(),
                "checkSalary" : $('#checkSalaryEdit').val(),
                "responsibilities" : $('#responsibilities_edit_1').val(),
                "exp_level" : $('#exp_level_edit').val(),
                "skill_id": $('#skill_id_edit').val(),
                "location_id": $('#location_id_edit').val(),
                "job_description": $('#job_description_edit_1').val(),
                "vacancy_name": $('#vacancy_name_edit').val(),
                "closingDate": $('#closingDate_edit').val(),
            },
            success: function (result) {
                // console.log(result);
                $('#ModalEditVacacny').modal('hide');
                toastr.success('Success', 'item has been updated !');
                var vacancy = '<tr id="tr_vacancy' + result.id + '"> <th class="scope="row">' + result.id + '</><td><strong><a href="/admin/vacancy/' + result.id + '/edit">' + result.vacancy_name + '</a></strong></td><td>' + result.employee.last_name + ' ' + result.employee.first_name + '</td><td>' + result.closingDate + '</td><td><b class="badge bg-success">' + result.status + '</a></td>';
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
                var myEditorResponsibility;

                ClassicEditor
                    .create( document.querySelector('#responsibilities_edit_1'))
                    .then( editor => {
                        // console.log(editor );
                        myEditorResponsibility = editor;
                    } )
                    .catch( err => {
                        console.error( err.stack );
                    } );
                var myEditor;

                ClassicEditor
                    .create( document.querySelector( '#job_description_edit_1'))
                    .then( editor => {
                        // console.log(editor );
                        myEditor = editor;
                    } )
                    .catch( err => {
                        console.error( err.stack );
                    } );
                // var singleValues = $( "#job_description_edit_1" ).val();
                // CKEDITOR.instances.setData(singleValues);
                // var mailContents = CKEDITOR.instances['job_description_edit_1'].getData();
                console.log(result.job_description);
                $('#ModalEditVacacny').modal('show');
                $('#vacancy_name_edit').val(result.vacancy_name);
                $('#closingDate_edit').val(result.closingDate);
                myEditor.setData(result.job_description);   
                myEditorResponsibility.setData(result.job_requirement);
                // $("#responsibilities_edit_1").val(result.job_requirement);
                $("#maxSalaryEdit").val(result.maxSalary);
                $("#minSalaryEdit").val(result.minSalary);

                var check = result.negotiation;
                if(check == "1"){
                    $("#checkSalaryEdit").prop("checked", true);
                }else{
                    $("#checkSalaryEdit").prop("checked", false);
                }
                // skill
                var se = $('#hiring_manager_id_edit');
                se.empty();
                $.each(result.employee, function (key , value) {
                    var isSelected = '';
                    if(result.employee_id == value.id)
                    {
                        isSelected = 'selected';
                    }
                    se.append('<option value="'+value.id+'" '+isSelected+' >'+value.last_name + ' ' + value.first_name+'</option>');
                    
                });

                //Salary 
                var salary  = ['monthly','yearly','weekly','daily','hourly'];
                var sex = $('#salary_cycle_edit');
                sex.empty();
                $.each(salary, function (key , value) {
                    var isSelected = '';
                    if(result.salary_cycle == value)
                    {
                        isSelected = 'selected';
                    }
                    sex.append('<option value="'+value+'" '+isSelected+' >' + value + '</option>');
                    
                });
                   //Salary 
                   var level  = ['mid', 'entry', 'senior'];
                   var sex = $('#exp_level_id');
                   sex.empty();
                   $.each(level, function (key , value) {
                       var isSelected = '';
                       if(result.exp_level == value)
                       {
                           isSelected = 'selected';
                       }
                       sex.append('<option value="'+value+'" '+isSelected+' >' + value + '</option>');
                       
                   });
                

                 // skill
                 var s = $('#skill_id_edit');
                   s.empty();
                 var myObj =[];   
                        $.each(result.vacancy_skill_id, function (i, value) {
                        //    console.log(value.skill_id);
                        myObj.push(value.skill_id);
                   });  
                   var myObj_skill =[];   
                        $.each(result.all_skill, function (i, value) {
                        //    console.log(value.id);
                        // myObj_skill.push(value.id);
                   });

                //    var data = myObj.join(",");
                //    console.log(myObj);
                //  console.log(myObj_skill);
                const array1 = myObj;
                // console.log(array1);
                for(let i = 0; i < array1.length; i++) { 
          
                    // Loop for array2 
                    for(let j = 0; j < result.all_skill.length; j++) {   
                        var isSelected = '';
                        if(array1[i] === result.all_skill[j].id) { 
                           
                            isSelected = 'selected';

                        } 
                        s.append('<option value="'+result.all_skill[j].id+'" '+isSelected+' >' + result.all_skill[j].name + '</option>');

    
                    } 
                } 
               

                        // console.log(myObj[i]);
        
                //  $.each(result.all_skill, function (key , value) {
                //         // console.log(value);
                //         var isSelected = '';
                //         if('3' == value.id)
                //         {
                //             isSelected = 'selected';
                //         }
                //         s.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
                //  });
 

                // JobType
                var l = $('#location_id_edit');
                l.empty();
                $.each(result.province, function (key , value) {
                    var isSelected = '';
                    if(result.province_id == value.id)
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
               //company 
                var cz = $('#company_id_edit');
                cz.empty();
                $.each(result.company, function (key , value) {
                      var isSelected = '';
                      if(result.company_id == value.id)
                      {
                         isSelected = 'selected';
                      }
                      cz.append('<option value="'+value.id+'" '+isSelected+' >'+value.company_name+'</option>');
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
                //Job tittle 
                var cx = $('#job_title_id_edit');
                cx.empty();
                $.each(result.jobTitle, function (key , value) {
                      var isSelected = '';
                      if(result.job_title_id == value.id)
                      {
                         isSelected = 'selected';
                      }
                      cx.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
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
  //custom rule method
  $.validator.addMethod("greaterThan",

  function (value, element, param) {
    var $min = $(param);
    if (this.settings.onfocusout) {
      $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
        $(element).valid();
      });
    }
    return parseInt(value) > parseInt($min.val());
  }, "Max must be greater than min");

$("#frmAddModalVacancy").validate({
    rules: {
        maxSalary: {
            greaterThan: '#minSalary'
          },
        job_category_vacancy_id: {
            required: true,
        },
        employee_id: {
            required: true,
        },
        job_type_id : {
            required: true,
        },
        company_id : {
            required : true
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
        },package_id_payment : {
            required: true,
        }
    }, submitHandler: function (form) {
        // console.log($('#job_description').val());
    //    console.log('Hello World');
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
                "responsibilities" : $('#responsibilities').val(),
                "exp_level" : $('#exp_level').val(),
                "job_title_id" : $('#job_title_id').val(),
                "company_id": $('#company_id').val(),
                "employee_id": $('#employee_id').val(),
                "salary_cycle" : $('#salary_cycle').val(),
                "maxSalary" : $('#maxSalary').val(),
                "minSalary" : $('#minSalary').val(),
                "checkSalary" : $('#checkSalary').val(),
            },
            success: function (result) {
                // location.reload();
                // console.log(result);
                toastr.success('Success', 'item has been created !');
                $('#ModalAddVacacny').modal('hide');
                var vacancy = '<tr id="tr_vacancy' + result.id + '"> <th class="scope="row">' + result.id + '</th><td><strong><a href="/admin/vacancy/' + result.id + '/edit">' + result.vacancy_name + '</a></strong></td><td>' + result.employee.last_name + ' ' + result.employee.first_name + '</td><td>' + result.closingDate + '</td><td><b class="badge bg-success">' + result.status + '</a></td>';
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
                console.log(response);
                $('#frmDeleteVacancy').modal('hide');
                $('#tr_vacancy' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
});


    
    


// $('.job_description').summernote({
//       fontName : 'Montserrat',
//      height: 200,
//      fontSize: 12
// });
// $('.job_requirement_edit').summernote({
//     'fontName' : 'Montserrat',
//     height: 200
// });

// $('.responsibilities').summernote({

//     'fontName' : 'Montserrat',
//     height: 200
// });






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
                // console.log(data);
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
                "name": $('#name_job_title').val(),
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