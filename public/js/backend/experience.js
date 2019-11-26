
$("#frmEditCategory").validate({
    rules: {
        category_name_edit: {
          required: true,
       },
    }, submitHandler: function (form) {
 
       var id  = $('#category_edit_id').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/jobCategory" + '/' + id,
           method: 'PUT',
           data: {
              "name" : $('#category_name_edit').val(),
           },
           success: function (result) {
             //console.log(result);
             $('#ModalEditJobCategory').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var category = '<tr id="tr_category' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td>';
             category += '<th><a onclick="Editcategory(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Status"><i class="icon-edit"></i></a>  <a onclick="Deletecategory(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Category"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_category" + result.id).replaceWith(category);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function Editcategory(id)
{
   $('#category_edit_id').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/jobCategory" + "/" + id + "/edit",
      success: function(result)
      {
         $('#ModalEditJobCategory').modal('show');
         $('#category_name_edit').val(result.name);
      },error : function(err){

            console.log(err);
      }
  });
}

function Deletecategory(id)
{
    $('#DeleteJobCategory').modal('show');
    $('#category_id').val(id);
}

$('#frmJobCategoryDelete').validate({
    submitHandler: function (form) {
        var id = $('#category_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/jobCategory" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#DeleteJobCategory').modal('hide');
                $('#tr_category' + response.id).remove();
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
            //    console.log(result);
               $('#ShowModalWorkExperience').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var experience = '<tr id="tr_work_experience' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.company_name + '</td>';
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