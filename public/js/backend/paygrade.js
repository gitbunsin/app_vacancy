$.validator.addMethod("greaterThan",
function (value, element, param) {
  var $min = $(param);
  if (this.settings.onfocusout) {
    $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
      $(element).valid();
    });
  }
  return parseInt(value) > parseInt($min.val());
}, "Max must be greater than min");
$("#frmEditPayGrade").validate({
   rules: {
      pay_grade_name_edit: {
         required: true,
      },
      currency_id_edit : {
         required : true 
      },
      max_salary_edit : {
         greaterThan: '#min_salary_edit'
      },
      min_salary_edit : {
         required : true
      }
   }, submitHandler: function (form) {

      var id  = $('#id_pay_grade_edit').val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      jQuery.ajax({
          url: "/admin/paygrade" + '/' + id,
          method: 'PUT',
          data: {
             "name" : $('#pay_grade_name_edit').val(),
             "currency_id" : $('#currency_id_edit').val(),
             "max_salary" : $('#max_salary_edit').val(),
             "min_salary" : $('#min_salary_edit').val()
          },
          success: function (result) {
            //console.log(result);
            $('#ModalEditPayGrade').modal('hide');
            toastr.success('Success' ,'item has been edit !');
            var paygrade = '<tr id="tr_pay_grade' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td><td>' + result.currency.name + '</td><td>' + result.pivot.max_salary + '</td><td>' + result.pivot.min_salary + '</td>';
            paygrade += '<th><a onclick="EditPayGrade(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Company"><i class="icon-edit"></i></a>  <a onclick="DeletePayGrade(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-trash"></i></a></th></tr>';
            $("#tr_pay_grade" + result.id).replaceWith(paygrade);
          },error : function(err){

               console.log(err);
          }
         });
   }
});



//Edit PayGrade 
function EditPayGrade(id)
{
   $('#id_pay_grade_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/paygrade" + "/" + id + "/edit",
      success: function(result)
      {
        //console.log(result.currency);
         var payGrade = $('#currency_id_edit');
         payGrade.empty();
         $.each(result.all_currency, function (key , value) {
               var isSelected = '';
               if(result.currency.currency_id == value.id)
               {
                  isSelected = 'selected';
               }
               payGrade.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
        });
         $('#ModalEditPayGrade').modal('show');
         $('#pay_grade_name_edit').val(result.name);
         $('#max_salary_edit').val(result.currency.max_salary);
         $('#min_salary_edit').val(result.currency.min_salary);

      },error : function(err){
            console.log(err);
      }
  });
}

 //custom rule method
 $.validator.addMethod("greaterThan",
 function (value, element, param) {
   var $min = $(param);
   if (this.settings.onfocusout) {
     $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
       $(element).valid();
     });
   }
   return parseInt(value) > parseInt($min.val());
 }, "Max must be greater than min");
$("#frmAddPayGrade").validate({
   rules: {
      pay_grade_name: {
         required: true,
      },
      currency_id : {
         required : true 
      },
      max_salary : {
         greaterThan: '#min_salary'
      },
      min_salary : {
         required : true
      }
   }, submitHandler: function (form) {
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     jQuery.ajax({
         url: "/admin/paygrade",
         method: 'POST',
         data: {
             "name" : $('#pay_grade_name').val(),
             "currency_id" : $('#currency_id').val(),
             "max_salary" : $('#max_salary').val(),
             "min_salary" : $('#min_salary').val()
         },
         success: function(result)
         {
          //  console.log(result);
            $('#ModalPayGrade').modal('hide');
            toastr.success('Success' , 'item has been create !');
            var paygrade = '<tr id="tr_pay_grade' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td><td>' + result.currency[0].name + '</td><td>' + result.payGrade.currency[0].pivot.max_salary + '</td><td>' + result.payGrade.currency[0].pivot.min_salary + '</td>';
            paygrade += '<th><a onclick="EditPayGrade(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Company"><i class="icon-edit"></i></a>  <a onclick="DeletePayGrade(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-trash"></i></a></th></tr>';
            $('#tab_pay_grade').append(paygrade);
         },error: function(err){

            console.log(err);
         }
      });
   }
});
$('#frmPayGradeDelete').validate({
   submitHandler: function (form) {
       var id = $('#pay_grade_id').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/paygrade" + '/' + id,
           method: 'Delete',
           success: function (response) {
               $('#DeletePayGrade').modal('hide');
               $('#tr_pay_grade' + response.id).remove();
               toastr.success('Success', 'item has been deleted !');
           }, error: function (err) {
               console.log(err);
           }
       });
   }
});


function DeletePayGrade(id) {
   $('#DeletePayGrade').modal('show');
   $('#pay_grade_id').val(id);
}




function LoadModalPayGrade() {
  
   $('#ModalPayGrade').modal('show');
   $("#frmAddPayGrade").trigger('reset');

}









