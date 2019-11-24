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

function DeleteEditSalary(id)
{
    $('#ModalDeleteBasicSalary').modal('show');
    $('#basic_salary_id').val(id);
}

$('#frmDeleteBasicSalary').validate({
    submitHandler: function (form) {
        var id = $('#basic_salary_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/basicSalary" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteBasicSalary').modal('hide');
                $('#tr_basic_salary' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmShowBasicSalary").validate({
    rules: {
        salary_component: {
          required: true,
       },
       currency_id : {
        required: true,
       },
       paygrade_id : {
        required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/basicSalary",
            method: 'POST',
            data: {
                "salary_component" : $('#salary_component').val(),
                "amount" : $('#amount').val(),
                "currency_id" : $('#currency_id').val(),
                "paygrade_id" : $('#paygrade_id').val(),
                "pay_periods_id" : $('#pay_periods_id').val(),
                "comments" :  $('#comments').val()
            },
            success: function(result)
            {
                console.log(result);
               $('#ShowBasicSalary').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var basicSalary = '<tr id="tr_basic_salary' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.salary_component + '</td><td>' + result.payPeriod.name + '</td><td>' + result.currency.name + '</td><td>' + result.basic_salary + '</td><td>' + result.comments + '</td>';
               basicSalary += '<th><a onclick="EditSalary(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Status"><i class="icon-edit"></i></a>  <a onclick="DeleteSalary(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Category"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_basic_salary').append(basicSalary);

            },error : function(err){

                console.log(err);
            }
        });
    }
});



function ShowModalBasicSalary(){
    $('#ShowBasicSalary').modal('show');
    $("#frmShowBasicSalary").trigger('reset');
}