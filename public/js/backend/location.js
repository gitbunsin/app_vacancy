function EditLocation(xxx) {

    $('#edit_id').val(xxx);
    $('#showEditLocation').modal('show');
    let token = $("meta[name='csrf-token']").attr("content");
    let id = $('#edit_id').val();
    let no = $('#no').val();
    $.ajax(
        {
            url: "{{url('admin/location')}}" + "/" + id + "/" + "edit",
            type: 'GET',
            data: {

                "id": id,
                "_token": token

            },
            success: function (data){

              //  console.log(data);

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
                url: "{{url('admin/location')}}" + "/" + id  ,
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
                        '<td>' + data.phone + '</td>' +
                        '<td>' +  + '</td>' +
                        '<td>' +
                        '<a href="#" onclick="EditLocation(' + data.id+ ')"  class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>' +
                        '<a href="#" onclick="DeleteLocation( ' + data.id+ ')" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-close"></i></a>' +
                        '</td>' +
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
                url: "{{url('admin/location')}}" ,
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
                        '<td>' + data.phone + '</td>' +
                        '<td>' +  + '</td>' +
                        '<td>' +
                        '<a href="#" onclick="EditLocation(' + data.id+ ')"  class="btn btn-gary manage-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>' +
                        '<a href="#" onclick="DeleteLocation( ' + data.id+ ')" class="btn btn-cancel manage-btn" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-close"></i></a>' +
                        '</td>' +
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

function DeleteLocation(xx){

    $('#DeleteCategory').modal('show');
    $('#jobCategory_id').val(xx);
}
$(document).ready(function () {

    $('#frmJobCategory').validate({ // initialize the plugin

        submitHandler: function (form) { // for demo

            let token = $("meta[name='csrf-token']").attr("content");

            let id = $('#jobCategory_id').val();

            $.ajax(
                {
                    url: "{{url('admin/location')}}" +"/"+ id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (data){

                        $('#location_id'+data.id).remove();
                        $('#DeleteCategory').modal('hide');
                        toastr.success('Location has been deleted  successfully !.', 'Success ', {timeOut: 5000})

                    },error: function (err) {
                        console.log(err);
                    }
                });
        }
    });
});