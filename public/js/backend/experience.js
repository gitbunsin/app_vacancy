
$("#frmEditWorkExperience").validate({
    rules: {
        company_name_edit: {
          required: true,
       },job_title_id_edit: {
           required : true
       }
    }, submitHandler: function (form) {
 
       var id  = $('#work_experience_id_edit').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/workexperience" + '/' + id,
           method: 'PUT',
           data: {
            "company_name" : $('#company_name_edit').val(),
            "job_title_id" : $('#job_title_id_edit').val(),
            "from_date" : $('#from_date_edit').val(),
            "to_date" : $('#to_date_edit').val(),
            "comments" : $('#comments_edit').val(),
            "employee_id" : $('#employee_id_edit').val()
            },
           success: function (result) {
             console.log(result);
             $('#EditModalWorkExperience').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var experience = '<tr id="tr_work_experience' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.company_name + '</td><td>' + result.jobTtitle.name + '</td><td>' + result.from + '</td><td>' + result.to + '</td><td>' + result.comments + '</td>';
             experience += '<th><a onclick="EditExperience(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Status"><i class="icon-edit"></i></a>  <a onclick="DeleteExperience(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Category"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_work_experience" + result.id).replaceWith(experience);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditExperience(id)
{
   $('#work_experience_id_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/workexperience" + "/" + id + "/edit",
      success: function(result)
      {
         $('#EditModalWorkExperience').modal('show');
         $('#company_name_edit').val(result.company_name);
         $('#from_date_edit').val(result.from);
         $('#to_date_edit').val(result.to);
         $('#comments_edit').val(result.comments);

         //Job Title 
         var j = $('#job_title_id_edit');
         j.empty();
         $.each(result.all_job_title, function (key , value) {
               var isSelected = '';
               if(result.job_title_id == value.id)
               {
                  isSelected = 'selected';
               }
               j.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
        });
      },error : function(err){

            console.log(err);
      }
  });
}

function DeleteExperience(id)
{
    $('#ModalDeleteExperience').modal('show');
    $('#work_experience_id').val(id);
}

$('#frmDeleteExperience').validate({
    submitHandler: function (form) {
        var id = $('#work_experience_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/workexperience" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteExperience').modal('hide');
                $('#tr_work_experience' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmShowWorkExperience").validate({
    rules: {
        company_name: {
          required: true,
       },job_title_id : {
           required : true
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/workexperience",
            method: 'POST',
            data: {
                "company_name" : $('#company_name').val(),
                "job_title_id" : $('#job_title_id').val(),
                "from_date" : $('#from_date').val(),
                "to_date" : $('#to_date').val(),
                "comments" : $('#comments').val(),
                "employee_id" : $('#employee_id').val()
            },
            success: function(result)
            {
               console.log(result);
               $('#ShowModalWorkExperience').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var experience = '<tr id="tr_work_experience' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.company_name + '</td><td>' + result.jobTtitle.name + '</td><td>' + result.from + '</td><td>' + result.to + '</td><td>' + result.comments + '</td>';
               experience += '<th><a onclick="EditExperience(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Status"><i class="icon-edit"></i></a>  <a onclick="DeleteExperience(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Category"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_work_experience').append(experience);

            },error : function(err){

                console.log(err);
            }
        });
    }
});

function ShowModalExpericen() {
    $('#ShowModalWorkExperience').modal('show');
    $("#frmShowWorkExperience").trigger('reset');
 }