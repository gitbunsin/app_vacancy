function loadPayment(){
    $('#LoadModalPaymentModule').modal('show');
} 
$("#frmAddPayment").validate({
    rules: {
        package_id: {
          required: true,
       },account_number : {
        required: true,
       },
       swift_code : {
        required: true,
       },account_name : {
        required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/payment",
            method: 'POST',
            data: {
                "package_id" : $('#package_id').val(),
                "account_number" : $('#account_number').val(),
                "swift_code" : $('#swift_code').val(),
                "branch_name" : $('#branch_name').val(),
                "branch_address" : $('#branch_address').val(),
                "account_name" : $('#account_name').val(),
                "account_name" : $('#account_name').val(),
            },
            success: function(result)
            {
               console.log(result);
               $('#LoadModalPaymentModule').modal('hide');
               toastr.success('Success' , 'item has been create !');
               var payment = '<tr id="tr_payment' + result.id + '"> <th class="scope="row">' + result.id + '</><td><a href="/admin/payment/' + result.id + '/edit"><strong>' + result.name + '</td><td>' + result.email + '</strong></a></td><td>' + result.amount + '</td><td>' + result.created_at + '</td><td><strong class="badge bg-success">' + result.status + '</strong></td>';
               payment += '<th><a onclick="DeletePayment(' + result.id + ');" class="btn btn-danger"  title="Payment"><i class="ti-trash"></i></a></th></tr>';
               $('#tbl_payment').append(payment);

            },error : function(err){

                console.log(err);
            }
        });
    }
});



function DeletePayment(id){

    $('#Delete').modal('show');
    $('#payment_id').val(id);
}

$('#frmDeletePayment').validate({
    submitHandler: function (form) {
        var id = $('#payment_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/payment/" + id,
            method: 'Delete',
            success: function (response) {
                $('#Delete').modal('hide');
                $('#tr_payment' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });