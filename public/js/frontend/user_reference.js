
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
               var reference = '<div  id="card_reference_edit'+result.id+'">'+
        '<div class="jobint user-delete-reference'+result.id+'">'+
        '<div class="row">'+
        '<div class="col-md-8 col-sm-8">'+
            '<h4><a href="#.">'+   result.name  +'</a></h4>'+
            '<div class="company"><a href="#.">'+ result.position+'</a></div>'+
            '<div class="jobloc"><label class="fulltime">' + result.phone +' - '+ result.email +'</label></div>'+
        '</div>'+
        '<div class="col-md-3 col-sm-3">'+
            '<a href="#." onclick="referenceEdit('+result.id+');" class="applybtn">Edit</a> <a href="#." onclick="referenceDelete('+result.id+');" class="applybtn">Delete</a>'+
        '</div>'+
        '</div>'+
    '</div>'+
    '<br/>';
            toastr.success('Success', 'item has been update !');
            $('#card_reference_edit'+result.id).replaceWith(reference);
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
                $('.user-delete-reference'+response.id).remove();
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
        user_name_reference : {
          required: true,
       },user_name_reference:{
        required: true,
       },
       user_phone_reference : {
        required: true,
       },
       user_position_reference : {
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
                "name" : $('#user_name_reference').val(),
                "email" : $('#user_name_reference').val(),
                "phone" : $('#user_phone_reference').val(),
                "position" : $('#user_position_reference').val(),
            },
            success: function(result)
            {
            //    console.log(result);
               $('#ModalUserReference').modal('hide');
    
        var reference = '<div  id="card_reference_edit'+result.id+'">'+
        '<div class="jobint user-delete-reference'+result.id+'">'+
        '<div class="row">'+
        '<div class="col-md-8 col-sm-8">'+
            '<h4><a href="#.">'+   result.name  +'</a></h4>'+
            '<div class="company"><a href="#.">'+ result.position+'</a></div>'+
            '<div class="jobloc"><label class="fulltime">' + result.phone +' - '+ result.email +'</label></div>'+
        '</div>'+
        '<div class="col-md-3 col-sm-3">'+
            '<a href="#." onclick="referenceEdit('+result.id+');" class="applybtn">Edit</a> <a href="#." onclick="referenceDelete('+result.id+');" class="applybtn">Delete</a>'+
        '</div>'+
        '</div>'+
    '</div>'+
    '<br/>';
            toastr.success('Success', 'item has been created !');
            $('#user-reference').append(reference);
            },error : function(err){

                console.log(err);
            }
        });
    }
});