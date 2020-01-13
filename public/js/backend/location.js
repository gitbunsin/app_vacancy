function showSubUnit(id){
    $('#AddSubUnit').modal('show');

}
$('#frmAddSubUnit').validate({
    rules:{
        company_subUnit_name : {
            required : true
        },subUnit_head : {
            required : true
        }
    },
    submitHandler: function (form) {
     
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/subUnit",
            data: {
                'name' : $('#company_subUnit_name').val(),
                'parent_id' : $('#subUnit_head').val()
            },
            method: 'POST',
            success: function (response) {
                console.log(response);
                $('#AddSubUnit').modal('hide');
                toastr.success('Success' , 'item has been create !');
                var subUnit = '<tr id="subUnit_id' + response.id + '"><td>' + response.name + '</td><td>' + response.name + '</td>';
                subUnit += '<th><a onclick="EditSubUnit(' + response.id + ');" class="btn btn-primary"  title="License"><i class="icon-edit"></i></a>  <a onclick="DeleteSubUnit(' + response.id + ');" class="btn btn-danger" data-placement="top" title="License"><i class="ti-trash"></i></a></th></tr>';
                $('#company_list_graph').append(subUnit);
            }, error: function (err) {
                console.log(err);
            }
        });
    }

 });







function DeleteSubUnit(id){
    $('#company_subunit_id').val(id);
    $('#DeleteSubUnit').modal('show');
}

$('#frmDeleteSubUnit').validate({

    submitHandler: function (form) {
        var id = $('#company_subunit_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/subUnit" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#DeleteSubUnit').modal('hide');
                $('#subUnit_id' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }

 });






function EditLocation(xxx) {

    $('#edit_id').val(xxx);
    $('#showEditLocation').modal('show');
    let token = $("meta[name='csrf-token']").attr("content");
    let id = $('#edit_id').val();
    let no = $('#no').val();
    $.ajax(
        {
            url: "/admin/location/"  + id + "/edit",
            type: 'GET',
            data: {},
            success: function (data){

               console.log(data);

                 $('#name_edit').val(data.name);
               //  $('#province_code_edit').val(data.province_code.name);
               //   $('#city_code_edit').val(data.city_code.name);
               //   $('#country_code_edit').val(data.country_code.name);
                 $('#address_edit').val(data.address);
                 $('#zip_code_edit').val(data.zip_code);
                 $('#phone_edit').val(data.phone);
                 $('#fax_edit').val(data.fax);
                 $('#note_edit').val(data.note);

                //all province
                let item = $('#province_code_edit');
                item.empty();

                $.each(data.all_province, function (key, value) {

                    let selected = '';

                    if (value.id == data.province_code.id) {

                        selected = 'selected';
                    }
                    item.append("<option value='" + value.id + "'" + selected + ">" + value.name + "</option>");

                });
                // all city
                let item_city = $('#city_code_edit');
                item_city.empty();

                $.each(data.all_city, function (key, value) {

                    let selected = '';

                    if (value.id == data.city_code.id) {

                        selected = 'selected';
                    }
                    item_city.append("<option value='" + value.id + "'" + selected + ">" + value.name + "</option>");

                });
                //all country
                let item_country = $('#country_code_edit');
                item_country.empty();

                $.each(data.all_country , function (key, value) {


                    let selected = '';

                    if (value.id == data.country_code.id) {
                       // console.log(value.name);
                        selected = 'selected';
                    }
                    item_country.append("<option value='" + value.id + "'" + selected + ">" + value.name + "</option>");

                });
            },error:function(err){
                console.log(err);
            }
        });
}

$('#frmEditLocation').validate({ // initialize the plugin

    rules : {
        name_edit : {
            required : true,
        }
    },
    submitHandler: function (form) { // for demo

        let token = $("meta[name='csrf-token']").attr("content");
        let id = $('#edit_id').val();
        let no = $('#no').val();
        //console.log(no);

        $.ajax(
            {
                url: "/admin/location/" + id  ,
                type: 'PUT',
                data: {
                    "_token": token,
                    "id": id,
                    "name" : $('#name_edit').val(),
                    "country_code" : $('#country_code_edit').val(),
                    "province_code" : $('#province_code_edit').val(),
                    "city_code" : $('#city_code_edit').val(),
                    "address" : $('#address_edit').val(),
                    "zip_code" : $('#zip_code_edit').val(),
                    "phone" : $('#phone_edit').val(),
                    "fax" : $('#fax_edit').val(),
                    "note" : $('#note_edit').val(),
                },
                success: function (data){
                  // console.log(data);
                    let table = '<tr id="location_id'+ data.id + '">' +
                        '<th scope="row">' + data.id +  '</th>' +
                        '<td> ' + data.name + '</td>' +
                        '<td>' + data.city_code.name + '</td>' +
                        '<td>' + data.country_code.name + '</td>' +
                        '<td>' +  + '</td>' +
                        '<th>' +
                        '<a href="#" onclick="EditLocation('+ data.id+ ')"  class="btn btn-primary" data-placement="top" title="Edit"><i class="icon-edit"></i></a>' +
                        '<a href="#" onclick="DeleteLocation(' + data.id+ ')" class="btn btn-danger" data-placement="top" title="Delete"><i class="ti-trash"></i></a>' +
                        '</th>' +
                        '</tr>';
                    $('#location_id' + data.id).replaceWith(table);
                    $('#showEditLocation    ').modal('hide');
                    toastr.success('Location has been edit  success !.', 'Success ', {timeOut: 5000})

                },error: function (err) {

                    console.log(err);
                }
            });
    }
});

function showLocation()
{
    $('#showLocation').modal('show');
    $('#frmAddLocation').trigger("reset");
}

//Submit add job title
$('#frmAddLocation').validate({ // initialize the plugin
    rules : {
        name : {
            required : true,
        },province_code: {
            required : true
        },city_code: {
            required:true
        },country_code: {
            required:true
        }
    },
    submitHandler: function (form) { // for demo
        let token = $("meta[name='csrf-token']").attr("content");
        $.ajax(
            {
                url: "/admin/location" ,
                type: 'POST',
                data: {
                    "_token": token,
                    "name" : $('#name').val(),
                    "country_code" : $('#country_code').val(),
                    "province_code" : $('#province_code').val(),
                    "city_code" : $('#city_code').val(),
                    "address" : $('#address').val(),
                    "zip_code" : $('#zip_code').val(),
                    "phone" : $('#phone').val(),
                    "fax" : $('#fax').val(),
                    "note" : $('#note').val()
                },
                success: function (data){
                    // console.log(data.country_code.name);
                    let table = '<tr id="location_id'+ data.id + '">' +
                        '<th scope="row">' + data.id +  '</th>' +
                        '<td> ' + data.name + '</td>' +
                        '<td>' + data.city_code.name + '</td>' +
                        '<td>' + data.country_code.name + '</td>' +
                        '<td>' +  + '</td>' +
                        '<th>' +
                        '<a href="#" onclick="EditLocation(' + data.id+ ')"  class="btn btn-primary"  title="Edit"><i class="icon-edit"></i></a>' +
                        '<a href="#" onclick="DeleteLocation('+ data.id +')" class="btn btn-danger"  title="Delete"><i class="ti-trash"></i></a>' +
                        '</th>' +
                        '</tr>';
                    $('#location_list').append(table);
                    $('#showLocation').modal('hide');
                    toastr.success('Location has been added  success !.', 'Success ', {timeOut: 5000})

                },error: function (err) {

                    console.log(err);
                }
            });
    }
});

function DeleteLocation(id){

    $('#DeleteLocationModal').modal('show');
    $('#location_delete_id').val(id);
}
$(document).ready(function () {

    $('#frmDeleteLocation').validate({ // initialize the plugin

        submitHandler: function (form) { // for demo

            let token = $("meta[name='csrf-token']").attr("content");

            let id = $('#location_delete_id').val();

            $.ajax(
                {
                    url: "/admin/location/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (data){

                        $('#location_id'+data.id).remove();
                        $('#DeleteLocationModal').modal('hide');
                        toastr.success('Location has been deleted  successfully !.', 'Success ', {timeOut: 5000})

                    },error: function (err) {
                        console.log(err);
                    }
                });
        }
    });
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