


$("#frmEditSkill").validate({
    rules: {
        skill_name_edit: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#skill_id_edit').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/skill" + '/' + id,
           method: 'PUT',
           data: {
              "name" : $('#skill_name_edit').val(),
              "description" : $('#description_edit').val()
           },
           success: function (result) {
             //console.log(result);
             $('#ModalEditSkill').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var skill = '<tr id="tr_skill' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td><td>' + result.description + '</td>';
             skill += '<th><a onclick="EditSkill(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Skill"><i class="icon-edit"></i></a>  <a onclick="DeleteSkill(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Skill"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_skill" + result.id).replaceWith(skill);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditSkill(id)
{
   $('#skill_id_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/skill" + "/" + id + "/edit",
      success: function(result)
      {
         $('#ModalEditSkill').modal('show');
         $('#skill_name_edit').val(result.name);
         $('#description_edit').val(result.description);
      },error : function(err){

            console.log(err);
      }
  });
}

function DeleteSkill(id)
{
    $('#ModalDeleteSkill').modal('show');
    $('#skill_id').val(id);
}

$('#frmDeleteSkill').validate({
    submitHandler: function (form) {
        var id = $('#skill_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/skill" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteSkill').modal('hide');
                $('#tr_skill' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddSkill").validate({
    rules: {
        skill_name: {
          required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/skill",
            method: 'POST',
            data: {
                "name" : $('#skill_name').val(),
                "description" : $('#description').val()
            },
            success: function(result)
            {
               //console.log(result);
               $('#ModalAddSkill').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var skill = '<tr id="tr_skill' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td><td>' + result.description + '</td>';
               skill += '<th><a onclick="EditSkill(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Skill"><i class="icon-edit"></i></a>  <a onclick="DeleteSkill(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Skill"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_skill').append(skill);

            },error : function(err){

                console.log(err);
            }
        });
    }
});

function LoadSkill() {

    $('#ModalAddSkill').modal('show');
    $("#frmAddSkill").trigger('reset');

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