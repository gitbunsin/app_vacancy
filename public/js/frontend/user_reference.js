
$("#frmUserReferenceEdit").validate({
    rules: {
        user_name_edit : {
          required: true,
       },user_email_edit :{
        required: true,
       },
       user_phone_edit : {
        required: true,
       },
       user_position_edit : {
        required: true,
       }
    }, submitHandler: function (form) {
        var id = $('#user_reference_id_edit').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/reference/" + id ,
            method: 'PUT',
            data: {
                "name" : $('#user_name_edit').val(),
                "email" : $('#user_email_edit').val(),
                "phone" : $('#user_phone_reference_edit').val(),
                "position" : $('#user_position_edit').val(),
            },
            success: function(result)
            {
               $('#ModalUserReferenceEdit').modal('hide');
               var reference = '<div class="card" id="card_user_reference'+ result.id +'">' +
               '<div class="card-body">' +
                   '<p class="card-text">' + 
                       '<strong>Name :</strong>' +
                             result.name +
                       '<strong> Position : </strong> '+
                            result.position + ',' +
                     '<strong> Phone : </strong> '+
                            result.phone + ',' +
                        '<strong> Email : </strong> '+
                        result.email + ',' +
                           '<a href="#" onclick="referenceDelete('+ result.id + ');"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp'+
                           '<a href="#" onclick="referenceSkillEdit('+ result.id +');"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>' + 
                       '</p>'+
               '</div>'+
           '</div>'+
           '<br/>';
            toastr.success('Success', 'item has been update !');
            $('#card_user_reference' + result.id).replaceWith(reference);
            },error : function(err)
            {
                console.log(err);
            }
        });
    }
});


function referenceEdit(id){
    // console.log(id);
    $('#user_reference_id_edit').val(id);
    $.ajax({
        type: "GET",
        url: "/user/reference/" + id + "/edit",
        success: function(result)
        {
            console.log(result);  

            $('#user_name_edit').val(result.name);     
            $('#user_position_edit').val(result.position);  
            $('#user_phone_reference_edit').val(result.phone);  
            $('#user_email_edit').val(result.email);  
            $('#ModalUserReferenceEdit').modal('show');

        },error : function(err){
  
              console.log(err);
        }
    });
  
}

function referenceDelete(id)
{
    $('#user_reference_id').val(id);
    $('#ModalReferenceDelete').modal('show');
}
$('#frmReferenceDelete').validate({
    submitHandler: function (form) {
        var id = $('#user_reference_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/reference" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#ModalReferenceDelete').modal('hide');
                $('#card_user_reference'+response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });






function loadReference(){

    $('#ModalUserReference').modal('show');
}
$("#frmUserReference").validate({
    rules: {
        user_name : {
          required: true,
       },user_email:{
        required: true,
       },
       user_phone : {
        required: true,
       },
       user_position : {
        required: true,
       }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/user/reference",
            method: 'POST',
            data: {
                "name" : $('#user_name').val(),
                "email" : $('#user_email').val(),
                "phone" : $('#user_phone_reference').val(),
                "position" : $('#user_position').val(),
            },
            success: function(result)
            {
            //    console.log(result);
               $('#ModalUserReference').modal('hide');
               var reference = '<div class="card" id="card_user_reference'+ result.id +'">' +
               '<div class="card-body">' +
                   '<p class="card-text">' + 
                       '<strong>Name :</strong>' +
                             result.name +
                       '<strong> Position : </strong> '+
                            result.position + ',' +
                     '<strong> Phone : </strong> '+
                            result.phone + ',' +
                        '<strong> Email : </strong> '+
                        result.email + ',' +
                           '<a href="#" onclick="referenceDelete('+ result.id + ');"><i style="color:red;" class="fa fa-1x fa-trash-o"></i></a>&nbsp'+
                           '<a href="#" onclick="referenceEdit('+ result.id +');"><i style="color:#008def;" class="fa fa-1x fa-edit"></i></a></strong>' + 
                       '</p>'+
               '</div>'+
           '</div>'+
           '<br/>';
            toastr.success('Success', 'item has been created !');
            $('#div_card_user_reference').append(reference);
            },error : function(err){

                console.log(err);
            }
        });
    }
});