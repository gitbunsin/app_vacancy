$("#frmEditBasicSalary").validate({
    rules: {
        salary_component_edit: {
          required: true,
       },
       currency_id_edit : {
        required: true,
       },
       paygrade_id_edit : {
        required: true,
       }
    }, submitHandler: function (form) {
 
       var id  = $('#basic_employee_id_edit').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/basicSalary" + '/' + id,
           method: 'PUT',
           data: {
            "salary_component" : $('#salary_component_edit').val(),
            "amount" : $('#amount_edit').val(),
            "currency_id" : $('#currency_id_edit').val(),
            "paygrade_id" : $('#paygrade_id_edit').val(),
            "pay_periods_id" : $('#pay_periods_id_edit').val(),
            "comments" :  $('#comments_salary_edit').val() ,
            "employee_id" :$('#employee_id').val()
        },
           success: function (result) {
            //  console.log(result);
             $('#ShowEditBasicSalary').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var basicSalary = '<tr id="tr_basic_salary' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.salary_component + '</td><td>' + result.payPeriod.name + '</td><td>' + result.currency.name + '</td><td>' + result.basic_salary + '</td><td>' + result.comments + '</td>';
             basicSalary += '<th><a onclick="DeleteEditSalary(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Status"><i class="icon-edit"></i></a>  <a onclick="DeleteSalary(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Category"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_basic_salary" + result.id).replaceWith(basicSalary);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditSalary(id)
{
   $('#basic_employee_id_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/basicSalary" + "/" + id + "/edit",
      success: function(result)
      {
        //  console.log(result);
         $('#ShowEditBasicSalary').modal('show');
         $('#salary_component_edit').val(result.salary_component);
         $('#comments_edit').val(result.comments);
         $('#amount_edit').val(result.basic_salary);

        //Currency 
        var currency = $('#currency_id_edit');
        currency.empty();
        $.each(result.all_currency, function (key , value) {
              var isSelected = '';
              if(result.currency_id == value.id)
              {
                 isSelected = 'selected';
              }
              currency.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
       });
       //PayPeriods
     var payPeriod = $('#pay_periods_id_edit');
         payPeriod.empty();
        $.each(result.all_payperiod, function (key , value) {
              var isSelected = '';
              if(result.payperiod_id == value.id)
              {
                 isSelected = 'selected';
              }
              payPeriod.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
       });

       //PayGrade 
        var PayGrade = $('#paygrade_id_edit');
        PayGrade.empty();
        $.each(result.all_paygrade, function (key , value) {
            var isSelected = '';
            if(result.pay_grade_id == value.id)
            {
                isSelected = 'selected';
            }
            PayGrade.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
    });



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
                "comments" :  $('#comments_salary').val(),
                "employee_id" : $('#basic_salary_id_add').val(),
            },
            success: function(result)
            {
                console.log(result);
               $('#ShowBasicSalary').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var basicSalary = '<tr id="tr_basic_salary' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.salary_component + '</td><td>' + result.payPeriod.name + '</td><td>' + result.currency.name + '</td><td>' + result.basic_salary + '</td><td>' + result.comments + '</td>';
               basicSalary += '<th><a onclick="EditSalary(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Status"><i class="icon-edit"></i></a>  <a onclick="DeleteEditSalary(' + result.id + ');" data-toggle="modal" class="btn btn-danger"   title="Category"><i class="ti-trash"></i></a></th></tr>';
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