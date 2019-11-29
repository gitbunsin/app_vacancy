function Edit(id){
    $('#id_edit').val(id);
    $.ajax({
            type: "GET",
            url: "/admin/company" + "/" + id + "/edit",
            success: function(data)
            {
               // console.log(data);
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
                $('#google_link_edit').val(data.google_link);
                $('#twitter_link_edit').val(data.twitter_link);
                $('#linkedIn_link_edit').val(data.linkedIn_link);
                $('#pinterest_link_edit').val(data.pinterest_link);
                $('#instagram_link_edit').val(data.instagram_link);
                
            },error : function(err){
                console.log(err)
            }
        });
}

 function Delete(id){
     $('#id').val(id);
     $('#Delete').modal('show');
 }

 $('#frmCompanyDelete').validate({

    submitHandler: function(form) 
        {
            var id = $('#id').val();
            jQuery.ajax({
                    url: "/admin/company" + '/' + id,
                    method: 'Delete',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id" : id
                    },success : function(response)
                    {
                        //console.log(response.id);
                       $('#Delete').modal('hide');
                       $('#tbl_company'+response.id).remove();
                       toastr.success('Success','Company has been deleted !');
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
            jQuery.ajax({
                    url: "/admin/company" + "/" + id,
                    method: 'PUT',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "company_name": $('#company_name_edit').val(),
                        "phone" : $('#phone_edit').val(),
                        "zip_code" : $('#zip_code_edit').val(),
                        "email" : $('#email_edit').val(),
                        'address' : $('#address_edit').val(),
                        'website_link' : $('#website_link_edit').val(),
                        'city_id' : $('#city_id_edit').val(),
                        'state' : $('#state_edit').val(),
                        'country_id' : $('#country_id_edit').val(),
                        'twitter_link' : $('#twitter_link_edit').val(),
                        'google_link' : $('#google_link_edit').val(),
                        'facebook_link' : $('#facebook_link_edit').val(),
                        'pinterest_link' : $('#pinterest_link_edit').val(),
                        'instagram_link' : $('#instagram_link_edit').val(),
                        'linkedIn_link' : $('#linkedIn_link_edit').val(),
                    },
                    success: function(result){
                    //    console.log(result);
$('#EditCompany').modal('hide');
var company = '<tr id="tbl_company' + result.id + '"><th class="scope="row">' + result.id + '</><td>' + result.company_name + '</td><td>' + result.phone + '</td><td>' + result.email + '</td>';
company += '<th><a onclick="Edit(' +  result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon-edit"></i></a>  <a onclick="Delete(' +  result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a></th></tr>';
$("#tbl_company" + result.id).replaceWith(company);
                        toastr.success('Success','Company has been updated !');
                    },error : function(err){
                        console.log(err);
                    }
                });
        }
    });

     $("#frmCompany").validate({
            rules: {
                company_name: {
                required: true,
            },
            email : {
                required : true
            }
        },submitHandler: function(form) 
        {
            jQuery.ajax({
                    url: "{{ url('admin/company')}}",
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "company_name": $('#company_name').val(),
                        "phone" : $('#phone').val(),
                        "zip_code" : $('#zip_code').val(),
                        "email" : $('#email').val(),
                        'address' : $('#address').val(),
                        'website_link' : $('#website_link').val(),
                        'city_id' : $('#city_id').val(),
                        'state' : $('#state').val(),
                        'country_id' : $('#country_id').val(),
                        'twitter_link' : $('#twitter_link').val(),
                        'google_link' : $('#google_link').val(),
                        'facebook_link' : $('#facebook_link').val(),
                        'pinterest_link' : $('#pinterest_link').val(),
                        'instagram_link' : $('#instagram_link').val(),
                        'linkedIn_link' : $('#linkedIn_link').val(),
                    },
                    success: function(result){
                       console.log(result);
                        $("#frmCompany").trigger('reset');
                        $('#AddCompany').modal('hide');
var user = '<tr id="tbl_company' + result.id + '"><th class="scope="row">' + result.id + '</><td>' + result.company_name + '</td><td>' + result.phone + '</td><td>' + result.email + '</td>';
user += '<th><a onclick="Edit(' +  result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Company"><i class="icon-edit"></i></a>  <a onclick="Delete(' +  result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-trash"></i></a></th></tr>';
$('#company_id').append(user);
                        toastr.success('Success','Company has been created !');
                    },error : function(err){
                        console.log(err);
                    }
                });
                }
            });