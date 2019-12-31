function Edit(id){
    $('#id_edit').val(id);
    $.ajax({
            type: "GET",
            url: "/admin/company" + "/" + id + "/edit",
            success: function(data)
            {
            //    console.log(data);
                $('#EditCompany').modal('show');
                $('#company_name_edit').val(data.company_name);
                $('#phone_edit').val(data.phone);
                $('#email_edit').val(data.email);
                $('#address_edit').val(data.address);
                $('#zip_code_edit').val(data.zip_code);
                $('#state_edit').val(data.state);
                $('#phone_edit').val(data.phone);
                $('#website_link_edit').val(data.website_link);
                $('#facebook_link_edit').val(data.facebook_link);
                $('#linkedIn_link_edit').val(data.linkedIn_link);
                $('#company_profile_edit').val(data.company_profile);
                $('#logo_edit').attr('src','/uploads/UserCv/' + data.company_logo);
                $("logo_edit").attr("width", "100");

            },error : function(err){
                console.log(err)
            }
        });
}

 function Delete(id){
     $('#company_id').val(id);
     $('#DeleteCompany').modal('show');
 }

 $('#frmDeleteCompany').validate({

    submitHandler: function(form) 
        {
            var id = $('#company_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                    url: "/admin/company" + '/' + id,
                    method: 'Delete',
                    data: {
                        "id" : id
                    },success : function(response)
                    {
                        //console.log(response.id);
                       $('#DeleteCompany').modal('hide');
                       $('#tbl_company'+response.id).remove();
                       toastr.success('Success','Company has been deleted !');
                    },error : function(err){

                        console.log(err);
                    }
                });
        }
 });
 function myfunc() {
    $("#frmCompany").trigger("reset");
           // $(this).find('form')[0].reset();
            $('#AddCompany').modal('show');
            $("#frmCompany").trigger('reset');
    }

   //Edit Company 
    $("#frmCompanyEdit").validate({
            rules: {
                company_name_edit: {
                required: true,
            },
            email_edit : {
                required : true
            }
        },submitHandler: function(form) 
        {
            var id = $('#id_edit').val();
            var extension = $('#company_logo_edit').val().split('.').pop().toLowerCase();
            // console.log(extension);
            if ($.inArray(extension, ['png','docx','rtf','odt']) == -1) {
               toastr.error('Please Select Valid File... !');
               //  $('#errormessage').html('Please Select Valid File... ');
            } else {
        
                var file_data = $('#company_logo_edit').prop('files')[0];
                // console.log(file_data);
                var form_data_edit = new FormData();
                form_data_edit.append('file', file_data);
                form_data_edit.append('company_name', $('#company_name_edit').val());
                form_data_edit.append('phone', $('#phone_edit').val());
                form_data_edit.append('zip_code', $('#zip_code_edit').val());
                form_data_edit.append('address', $('#address_edit').val());
                form_data_edit.append('email', $('#email_edit').val());
                form_data_edit.append('website_link' , $('#website_link_edit').val());
                form_data_edit.append('city_id' , $('#city_id_edit').val());
                form_data_edit.append('state' , $('#state_edit').val());
                form_data_edit.append('country_id' , $('#country_id_edit').val());
                form_data_edit.append('facebook_link' , $('#facebook_link_edit').val());
                form_data_edit.append('linkedIn_link' , $('#linkedIn_link_edit').val());
                form_data_edit.append('company_profile' , $('#company_profile').val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "/admin/company-update/" + id , // point to server-side PHP script
                    data: form_data_edit,
                    type: 'POST',
                    dataType:"json",
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false,
                    success: function(result){
                       console.log(result);
$('#EditCompany').modal('hide');
var user = '<tr id="tbl_company' + result.id + '"><th class="scope="row">' + result.id + '</th><td><a href="/admin/company/ ' + result.id  + ' "  ><strong>' + result.company_name + '</strong></a></td><td>' + result.phone + '</td><td>' + result.email + '</td>';
user += '<th><a onclick="Edit(' +  result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Company"><i class="icon-edit"></i></a>  <a onclick="Delete(' +  result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-trash"></i></a></th></tr>';
$("#tbl_company" + result.id).replaceWith(user);
                        toastr.success('Success','Company has been updated !');
                    },error : function(err){
                        console.log(err);
                    }
                });
        }
    }
    });

     $("#frmCompany").validate({
            rules: {
                job_category_vacancy_id: {
                required: true,
            },
            email : {
                required : true
            }
        },submitHandler: function(form) 
        {
            var extension = $('#company_logo').val().split('.').pop().toLowerCase();
            console.log(extension);
            if ($.inArray(extension, ['png','docx','rtf','odt']) == -1) {
               toastr.error('Please Select Valid File... !');
               //  $('#errormessage').html('Please Select Valid File... ');
            } else {
        
                var file_data = $('#company_logo').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);
                form_data.append('company_name', $('#company_name').val());
                form_data.append('phone', $('#phone').val());
                form_data.append('zip_code', $('#zip_code').val());
                form_data.append('address', $('#address').val());
                form_data.append('email', $('#email').val());
                form_data.append('website_link' , $('#website_link').val());
                form_data.append('city_id' , $('#city_id').val());
                form_data.append('state' , $('#state').val());
                form_data.append('country_id' , $('#country_id').val());
                form_data.append('facebook_link' , $('#facebook_link').val());
                form_data.append('linkedIn_link' , $('#linkedIn_link').val());
                form_data.append('company_profile' , $('#company_profile').val());

                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
               });
           
            jQuery.ajax({
                    url: "/admin/company", // point to server-side PHP script
                    data: form_data,
                    type: 'POST',
                    dataType:"json",
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false,
                    success: function(result){
                       console.log(result);
                        $("#frmCompany").trigger('reset');
                        $('#AddCompany').modal('hide');
var user = '<tr id="tbl_company' + result.id + '"><th class="scope="row">' + result.id + '</th><td><a href="/admin/company/ ' + result.id  + ' "  ><strong>' + result.company_name + '</strong></a></td><td>' + result.phone + '</td><td>' + result.email + '</td>';
user += '<th><a onclick="Edit(' +  result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Company"><i class="icon-edit"></i></a>  <a onclick="Delete(' +  result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-trash"></i></a></th></tr>';
$('#company_id').append(user);
                        toastr.success('Success','Company has been created !');
                    },error : function(err){
                        console.log(err);
                    }
                });
            }
        }
     });








       