 

$("#frmEditEmployeeMembership").validate({
    rules: {
        membership_id_edit: {
        required: true,
     },
     membership_paid_by_edit : {
      required: true,
     },
     currency_member_id_edit : {
      required: true,
     }
  }, submitHandler: function (form) {
 
       var id  = $('#employee_membership_id_edit').val();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       jQuery.ajax({
           url: "/admin/employeeMembership" + '/' + id,
           method: 'PUT',
           data: {
            "employee_id" : $('#employee_id').val(),
            "membership_id" : $('#membership_id_edit').val(),
            "currency_id" : $('#currency_member_id_edit').val(),
            "membership_paid_by" : $('#membership_paid_by_edit').val(),
            "subscription_amount" : $('#subscription_amount_edit').val(),
            "commence_date" : $('#commence_date_edit').val(),
            "renewal_date" : $('#renewal_date_edit').val(),
        },
           success: function (result) {
             //console.log(result);
             $('#ModalEditEmployeeMembership').modal('hide');
             toastr.success('Success' , 'item has been updated !');
             var membership = '<tr id="tr_membership' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.membership.name + '</td><td>' + result.paid_by + '</td><td>' + result.amount + '</td><td>' + result.currency.name + '</td><td>' + result.commence_date + '</td><td>' + result.renewal_date + '</td>';
               membership += '<th><a onclick="EditMembership(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Membership"><i class="icon-edit"></i></a>  <a onclick="DeleteMembership(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Membership"><i class="ti-trash"></i></a></th></tr>';
             $("#tr_membership" + result.id).replaceWith(membership);
           },error : function(err){
                console.log(err);
           }
          });
    }
 });

function EditMembership(id)
{
   $('#employee_membership_id_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/employeeMembership" + "/" + id + "/edit",
      success: function(result)
      {
         $('#ModalEditEmployeeMembership').modal('show');
         $('#subscription_amount_edit').val(result.amount),
         $('#commence_date_edit').val(result.commence_date),
         $('#renewal_date_edit').val(result.renewal_date)


         var jx = $('#membership_id_edit');
         jx.empty();
         $.each(result.all_membership, function (key , value) {
               var isSelected = '';
               if(result.membership_id == value.id)
               {
                  isSelected = 'selected';
               }
               jx.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
        });


        //currency 
        var jxx = $('#currency_member_id_edit');
        jxx.empty();
        $.each(result.all_currency, function (key , value) {
              var isSelected = '';
              if(result.currency_id == value.id)
              {
                 isSelected = 'selected';
              }
              jxx.append('<option value="'+value.id+'" '+isSelected+' >'+value.name+'</option>');
       });

        // Paid By
         //currency 
         var jxx = $('#membership_paid_by_edit');
         jxx.empty();
         var array = ["company" ,"individaul"];
         $.each(array, function (key , value) {
               var isSelected = '';
               if(result.currency_id == value)
               {
                  isSelected = 'selected';
               }
               jxx.append('<option value="'+value+'" '+isSelected+' >'+value+'</option>');
        });




      },error : function(err){

            console.log(err);
      }
  });
}

function DeleteMembership(id)
{
    $('#ModalDeleteMembership').modal('show');
    $('#employee_membership_id').val(id);
}

$('#frmEmployeeMembership').validate({
    submitHandler: function (form) {
        var id = $('#employee_membership_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employeeMembership" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalDeleteMembership').modal('hide');
                $('#tr_membership' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });

$("#frmAddEmployeeMembership").validate({
    rules: {
          membership_id: {
          required: true,
       },
       membership_paid_by : {
        required: true,
       },
       currency_member_id : {
        required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/employeeMembership",
            method: 'POST',
            data: {
                "employee_id" : $('#employee_id').val(),
                "membership_id" : $('#membership_id').val(),
                "currency_id" : $('#currency_member_id').val(),
                "membership_paid_by" : $('#membership_paid_by').val(),
                "subscription_amount" : $('#subscription_amount').val(),
                "commence_date" : $('#commence_date').val(),
                "renewal_date" : $('#renewal_date').val(),
            },
            success: function(result)
            {
            //    console.log(result);
               $('#ShowModalEditEmployeeMembership').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var membership = '<tr id="tr_membership' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.membership.name + '</td><td>' + result.paid_by + '</td><td>' + result.amount + '</td><td>' + result.currency.name + '</td><td>' + result.commence_date + '</td><td>' + result.renewal_date + '</td>';
               membership += '<th><a onclick="EditMembership(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Membership"><i class="icon-edit"></i></a>  <a onclick="DeleteMembership(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Membership"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_assigned_membership').append(membership);

            },error : function(err){

                console.log(err);
            }
        });
    }
});
 
 function ShowModalMembership()
 {
     $('#ShowModalEditEmployeeMembership').modal('show');
     $("#frmEditEmployeeMembership").trigger('reset');
 }