
$("#frmEmployeeJobDetails").validate({
    rules: {
        employee_job_title_id : {
          required: true,
       },
       employee_status_id : {
        required: true,
       },
       employee_job_category_id : {
        required: true,
       }
    }, submitHandler: function (form) {

       var id  = $('#employee_id_job').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/employee/job-details/" + id,
           method: 'POST',
           data: 
           {
            "job_title_id" : $('#employee_job_title_id').val(),
            "status_id"  : $('#employee_status_id').val(),
            "category_id" : $('#employee_job_category_id').val(),
            "join_date" : $('#join_date').val(),
            "location_id" : $('#location_id').val(),
            "sub_unit_id" : $('#sub_unit_id').val(),
           },
           success: function (result) {
             console.log(result);
             toastr.success('Success' , 'item has been updated !');
            //  if(result == "error"){
            //     toastr.warning('Success' , 'Plase login  !');
            //  }else{
               
            //     toastr.success('Success' , 'item has been updated !');
            //     $('#frmContactUs').trigger('reset');
            //  }
           },error : function(err){
                console.log(err);
           }
          });
    }
 });



// $('#job_title_id').prop( "disabled", true );
// $('#status_id').prop('disabled', true);
// $('#job_category_id').prop('disabled', true); 
// $('#join_date').prop('disabled',true);
// $('#sub_unit_id').prop('disabled',true);
// $('#sub_unit_id').prop('disabled',true);
// $('#location_id').prop('disabled',true);
   //change UserProfile
 function changeProfile() {
    $('#image').click();
}
$('#image').change(function () {
    var imgPath = this.value;
    var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
        readURL(this);
    else
        // alert("Please select image file (jpg, jpeg, png).")
        toastr.error('Success', 'Please select image file (jpg, jpeg, png).');
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
//              $("#remove").val(0);
        };
    }
}
function removeImage() {
    $('#preview').attr('src', 'images/noimage.jpg');
//      $("#remove").val(1);
}
   
   
   // Edit Emergency Contact
   function EditEmergencyContact(id) {

    $('#EditEmergencyContacts').modal('show');
    $('#emergency_contacts_edit').val(id);
    let token = $("meta[name='csrf-token']").attr("content");
    $.ajax(
        {
            url: "/admin/employee/show/emergency/contact/" + id,
            type: 'GET',
            data: {

                "id": id,
                "_token": token
            },
            success: function (data){

                $('#name_edit').val(data.name);
                $('#relationship_edit').val(data.relationship);
                $('#work_telephone_edit').val(data.work_telephone);
                $('#home_telephone_edit').val(data.home_telephone);
                $('#mobile_edit').val(data.mobile);

            }
        });
}

// Edit
$('#frmEditEmergencyContacts').validate({ // initialize the plugin
    rules:{
        name_edit : {
            required : true
        },
        relationship_edit : {

            required : true
        }
    },
    submitHandler: function (form) { // for demo

        let token = $("meta[name='csrf-token']").attr("content");

        let id = $('#emergency_contacts_edit').val();
       

        $.ajax(
            {
                url: "/admin/employee/update/emergency/contact/" +  id ,
                type: 'POST',
                data: {

                    "id": id,
                    "employee_id": $('#employee_id').val(),
                    "name" : $('#name_edit').val(),
                    "relationship" : $('#relationship_edit').val(),
                    "mobile" : $('#mobile_edit').val(),
                    "work_telephone" : $('#work_telephone_edit').val(),
                    "home_telephone" : $('#home_telephone_edit').val(),
                    "_token": token

                },
                success: function (data){

                    let ul =
                    '<div id="ul_emergency_contact" class="ul_id'+ data.id+' list" >' + 
                    '<li class="manage-list-row clearfix"> ' + 
                           ' <div class="job-info"> ' +
                                   ' <div class="job-details"> ' +
                                       ' <small class="job-company"><i class="ti-time"></i><b>Name</b> : <a href="">' + data.name + '</a> </small>'+
                                       ' <small class="job-company"><i class="ti-location-pin"></i><b>Relationship </b>:' + data.relationship+ '</small> ' +        
                                       ' <small class="job-company"><i class="ti-file"></i><b>Mobile</b>: ' + data.mobile  + '</small> ' +                                                                
                                    '</div>'+
                                '</div>';
                            ul += 
                                '<div class="job-buttons">' + 
                                   '<a onclick="EditEmergencyContact(' + data.id + ');" class="btn btn-primary"><i class="icon-edit"></i></a> '+
                                   '<a onclick="DeleteEmergencyContact(' + data.id + ');" class="btn btn-danger"><i class="ti-trash"></i></a> '+ 
                                   '</div></li></div>';

                    $('#ul_emergency_contact').replaceWith(ul);
                    $('#EditEmergencyContacts').modal('hide');
                    toastr.success('Emergency Contacts has been edit  success !.', 'Success ', {timeOut: 5000})

                },error:function (err) {

                   console.log(err);
                }
            });
    }
});



//Emergency Contact
function ShowEmergencyContacts(m) {

    $('#frmShowEmergencyContacts').trigger("reset");
    let id = $(m).data("id");
    $('#ShowEmergencyContacts').modal('show');
    $('#employee_assign_emergency_contacts').val(id);

}

function DeleteEmergencyContact(id)
{
    // let id = $(mm).data("id");
    $('#DeleteEmergencyContact').modal('show');
    $('#emergency_contact_id').val(id);
}


//Deleted Emergency Contact
$('#frmDeleteEmergencyContact').validate({ // initialize the plugin
    submitHandler: function (form) { // for demo

        let token = $("meta[name='csrf-token']").attr("content");

        let id = $('#emergency_contact_id').val();

        console.log(id);

        $.ajax(
            {
                url: "/admin/employee/delete/emergency/contact/" + id,
                type: 'DELETE',
                data: {

                    "id": id,
                    "_token": token
                },
                success: function (data){

                    $('.ul_id'+data.id).remove();
                    $('#DeleteEmergencyContact').modal('hide');
                    toastr.success('Emergency Contacts has been deleted  successfully !.', 'Success ', {timeOut: 5000})

                }
            });
    }
});

// Add
$('#frmShowEmergencyContacts').validate({ // initialize the plugin
    rules:{
        name : {
            required : true
        },
        relationship : {

            required : true
        }
    },
    submitHandler: function (form) { // for demo

        let token = $("meta[name='csrf-token']").attr("content");

        let id = $('#employee_assign_emergency_contacts').val();

        $.ajax(
            {
                url: "/admin/employee/add/emergency/contact" ,
                type: 'POST',
                data: {

                    "id": id,
                    "name" : $('#name').val(),
                    "relationship" : $('#relationship').val(),
                    "mobile" : $('#relationship').val(),
                    "work_telephone" : $('#work_telephone').val(),
                    "home_telephone" : $('#home_telephone').val(),
                    "_token": token

                },
                success: function (data){
                    let ul =
                    '<div id="ul_emergency_contact" class="ul_id'+ data.id+' list" >' + 
                    '<li class="manage-list-row clearfix"> ' + 
                           ' <div class="job-info"> ' +
                                   ' <div class="job-details"> ' +
                                       ' <small class="job-company"><i class="ti-time"></i><b>Name</b> : <a href="">' + data.name + '</a> </small>'+
                                       ' <small class="job-company"><i class="ti-location-pin"></i><b>Relationship </b>:' + data.relationship+ '</small> ' +        
                                       ' <small class="job-company"><i class="ti-file"></i><b>Mobile</b>: ' + data.mobile  + '</small> ' +                                                                
                                    '</div>'+
                                '</div>';
                            ul += 
                                '<div class="job-buttons">' + 
                                   '<a onclick="EditEmergencyContact(' + data.id + ');" class="btn btn-primary"><i class="icon-edit"></i></a> '+
                                   '<a onclick="DeleteEmergencyContact(' + data.id + ');" class="btn btn-danger"><i class="ti-trash"></i></a> '+ 
                                   '</div></li></div>';
                    $('#body_emergency').append(ul);
                    $('#ShowEmergencyContacts').modal('hide');

                    toastr.success('Emergency Contacts has been added  success !.', 'Success ', {timeOut: 5000})
                },error : function(err){
                    console.log(err);
                }
            });
    }
});
































//show
function  ShowEmployeeAttachment(id){

    // let id = $(xx).data("id");
    $('#AddJobAttachment').modal('show');
    $('#employee_attachment_id').val(id);


}

//delete
function DeleteVacancyAttachment(id)
{
    $('#Delete').modal('show');
    $('#attachment_id').val(id);
}

$(document).ready(function () {

    $('#frmDeleteJobAttachment').validate({ // initialize the plugin

        submitHandler: function (form) { // for demo

            let token = $("meta[name='csrf-token']").attr("content");

            let id = $('#attachment_id').val();

            $.ajax(
                {
                    url: "/admin/employee/delete/attachment/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (data){

                        let concatId = 'tbl_attachment'+id;
                        concatId = concatId.replace(/\s/g, '');
                        document.getElementById(concatId).remove();

                        $('#Delete').modal('hide');
                        toastr.success('Attachment Delete success !.', 'Success ', {timeOut: 5000});

                    },error : function(err){
                        console.log(err);
                    }
                });
        }
    });



    $('#frmJobAttachment').validate({ // initialize the plugin
        rules: {
            file : {
                required : true
            }
        },
        submitHandler: function (form) { // for demo

            let id = $('#employee_attachment_id').val();
            let file_data = $('#file').prop('files')[0];
            let form_data = new FormData();
            form_data.append('file', file_data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                url: "/admin/employee/add/attachment/" + id,
                data: form_data,
                type: 'POST',
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false,

                success: function (data){
                    // console.log(data);
                    $('#AddJobAttachment').modal('hide');


                    let ul =
                    '<div id="tbl_attachment'+ data.id+'" class="ul_id_'+ data.id+' list" >' + 
                    '<li class="manage-list-row clearfix"> ' + 
                           ' <div class="job-info"> ' +
                                   ' <div class="job-details"> ' +
                                       ' <small class="job-company"><i class="ti-time"></i><b>File Name</b> : <a href="">' + data.file_name + '</a> </small>'+
                                       ' <small class="job-company"><i class="ti-location-pin"></i><b>Attachment Type </b>:' + data.attachment_type+ '</small> ' +        
                                       ' <small class="job-company"><i class="ti-file"></i><b>File Size</b>: ' + data.file_size  + '</small> ' +                                                                
                                    '</div>'+
                                '</div>';
                            ul += 
                                '<div class="job-buttons">' + 
                                   '<a onclick="DeleteVacancyAttachment(' + data.id + ');" class="btn btn-danger"><i class="ti-trash"></i></a> '+ 
                                   '</div></li></div>';
                    $('#tbl_employee_attachment').append(ul);

                    toastr.success('Attachment uploaded success  !.', 'Success ', {timeOut: 5000})
                
                },error : function (err) {

                    console.log(err);

                }
            });
        }
    });

    // update contact details
    $('#frmContactDetails').validate({ // initialize the plugin
        rules : {
            mobile : {
                required : true
            },
            work_email :
                {
                    required: true
                },
            street1 : {
                required: true
            }
        },
        submitHandler: function (form) { // for demo

            let id = $('#employee_id').val();
            let token = $("meta[name='csrf-token']").attr("content");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax(
                {
                    url: "/admin/employee/update/contact" +"/"+ id,
                    type:"POST",
                    data: {
                        "id": id,
                        "_token": token,
                        "mobile" : $('#mobile').val(),
                        "work_email" : $('#work_email').val(),
                        "street1" : $('#street1').val(),
                        "street2" : $('#street2').val(),
                        "city_code" : $('#city_code').val(),
                        "country_code" : $('#country_code').val(),
                        "province_code" : $('#province_code').val(),
                        "zip_code" : $('#zip_code').val(),
                        "telephone" : $('#telephone').val(),
                        "work_telephone" : $('#work_telephone').val(),
                        "other_email" : $('#other_email').val(),
                    },
                    success: function (data){

                        // console.log(data);
                        toastr.success('Employee update success !.', 'Success ', {timeOut: 5000})

                    },error : function (err) {

                        console.log(err);
                    }
                });
        }
    });


    //update Employee Details
    $('#frmEmployeeDetails').validate({ // initialize the plugin
        rules : {
            gender : {
                required : true
            },
            marital_status :
                {
                required: true
                },
            first_name : {
                required : true
            },
            last_name : {
                required : true
            }
        },
        submitHandler: function (form) { // for demo
            let id = $('#employee_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var file_data = $('#image').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('first_name',$('#first_name').val());
            form_data.append('last_name',$('#last_name').val());
            form_data.append('gender',$('#gender').val());
            form_data.append('birthday_id',$('#birthday_id').val());
            form_data.append('marital_status',$('#marital_status').val());
            form_data.append('nationality_id',$('#nationality_id').val());
            form_data.append('other_id',$('#other_id').val());
            form_data.append('city',$('#city').val());
            form_data.append('gender',$('#gender').val());
            $.ajax(
                {
                url: "/admin/employee/update/" + id,
                method: 'POST',
                data : form_data,
                type: 'POST',
                dataType:"json",
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false,
                success: function (data)
                {
                    console.log(data);
                    toastr.success('Employee update success !.', 'Success ', {timeOut: 5000})

                },error : function (err) {

                    console.log(err);
                }
                });
        }
    });


    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });

});
