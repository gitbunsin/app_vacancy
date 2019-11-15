


$("#frmEditEducation").validate({
    rules: {
        education_name_edit: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#education_edit_id').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/education" + '/' + id,
           method: 'PUT',
           data: {
              "name" : $('#education_name_edit').val(),
           },
           success: function (result) {
             //console.log(result);
             $('#ModalEditEducation').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var education = '<tr id="tr_education' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
             education += '<th><a onclick="EditEducation(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Education"><i class="icon-edit"></i></a>  <a onclick="DeleteEducation(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Education"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_education" + result.id).replaceWith(education);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditEducation(id)
{
   $('#education_edit_id').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/education" + "/" + id + "/edit",
      success: function(result)
      {
         $('#ModalEditEducation').modal('show');
         $('#education_name_edit').val(result.name);
      },error : function(err){

            console.log(err);
      }
  });
}

function DeleteEducation(id)
{
    $('#ModalDeleteEducation').modal('show');
    $('#education_id').val(id);
}

$('#frmDeleteEducation').validate({
    submitHandler: function (form) {
        var id = $('#education_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/education" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteEducation').modal('hide');
                $('#tr_education' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddEducation").validate({
    rules: {
        education_name: {
          required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/education",
            method: 'POST',
            data: {
                "name" : $('#education_name').val(),
            },
            success: function(result)
            {
               //console.log(result);
               $('#ModalEducationAdd').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var education = '<tr id="tr_education' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</<td>';
               education += '<th><a onclick="EditEducation(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title"Education"><i class="icon-edit"></i></a>  <a onclick="DeleteSkill(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Education"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_education').append(education);

            },error : function(err){

                console.log(err);
            }
        });
    }
});

function LoadModalEducation() {

    $('#ModalEducationAdd').modal('show');
    $("#frmAddEducation").trigger('reset');

 }


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