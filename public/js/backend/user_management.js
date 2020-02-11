$("#frmUserloginEdit").validate({
        rules: {
            username_edit:{
               required : true
           },
           employee_id_edit : {
                required : true
           },role_id_edit : {
                required : true
           },
           email_edit : {
               required : true
           },password_edit : {
               required : true,
               minlength : 6
           }, confirm_password_edit : {
                minlength : 6,
                equalTo : "#password_edit"
           }
        }, submitHandler: function (form) {
            var id = $('#id_user_edit').val();
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           jQuery.ajax({
               url: "/admin/user/" + id,
               method: 'PUT',
               data: {
                    "username" : $('#username_edit').val(),
                    "email" : $('#email_edit').val(),
                    "password" : $('#password_edit').val(),
                    "role_id" : $('#role_id_edit').val(),
                    "employee_id" : $('#employee_id_edit').val()
               },
            //    beforeSend:function(){
            //     $.LoadingOverlay("show");
            //    },
               success: function (result) {
                toastr.success('Success' , 'user has been updated !');
                $('#EditUser').modal('hide');
                var user = '<tr id="tbl_user' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.username + '</td><td>' + result.email + '</td><td>' + result.deleted_at + '</td>';
                     user += '<th><a onclick="EditUser(' + result.id + ');"  data-toggle="modal" class="btn btn-primary"  title="Skill"><i class="icon-edit"></i></a>  <a onclick="DeleteUser(' + result.id + ');" data-toggle="modal" class="btn btn-danger"   title="Skill"><i class="ti-trash"></i></a></th></tr>';
                 $("#tbl_user" + result.id).replaceWith(user);
                   },error : function(err){
        
                        console.log(err);
                   }
                  });
        }
     });

function EditUser(id)
{
   $('#id_user_edit').val(id);
   $.ajax({
      type: "GET",
      url: "/admin/user/" + id + "/edit",
      success: function(result)
      {
          console.log(result);
         $('#EditUser').modal('show');
         $('#username_edit').val(result.username);
         $('#email_edit').val(result.email);

            var jx = $('#employee_id_edit');
                jx.empty();
                $.each(result.all_employee, function (key , value) {
                      var isSelected = '';
                      if(result.employee_id == value.id)
                      {
                         isSelected = 'selected';
                      }
                      jx.append('<option value="'+value.id+'" '+isSelected+' >'+value.last_name + ' ' +  value.first_name +'</option>');
             });
       
             var rx = $('#role_id_edit');
                rx.empty();
                $.each(result.all_role, function (key , value) {
                      var isSelected = '';
                      if(result.role_id == value.id)
                      {
                         isSelected = 'selected';
                      }
                      rx.append('<option value="'+value.id+'" '+isSelected+' >'+value.name +'</option>');
             });


        //  $('#description_edit').val(result.description);
      },error : function(err){

            console.log(err);
      }
  });
}

function DeleteUser(id)
{
    $('#Delete').modal('show');
    $('#user_id').val(id);
}

$('#frmUserDelete').validate({
    submitHandler: function (form) {
        var id = $('#user_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/user/" + id,
            method: 'Delete',
            success: function (response) {
                $('#Delete').modal('hide');
                $('#tbl_user' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
 });


//Admin Register
$("#frmUserlogin").validate({
        rules: {
            username:{
               required : true
           },
           employee_id : {
                required : true
           },role_id : {
                required : true
           },
           email : {
               required : true
           },password : {
               required : true,
               minlength : 6
           }, confirm_password : {
                minlength : 6,
                equalTo : "#password"
           }
        }, submitHandler: function (form) {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           jQuery.ajax({
               url: "/admin/user",
               method: 'POST',
               data: {
                    "username" : $('#username').val(),
                    "email" : $('#email').val(),
                    "password" : $('#password').val(),
                    "role_id" : $('#role_id').val(),
                    "employee_id" : $('#employee_id').val()
               },
            //    beforeSend:function(){
            //     $.LoadingOverlay("show");
            //    },
               success: function (result) {
                console.log(result);
                toastr.success('Success' , 'user has been created !');
                $('#addUser').modal('hide');
                var user = '<tr id="tr_skill' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.username + '</td><td>' + result.email + '</td><td>' + result.deleted_at + '</td>';
                     user += '<th><a onclick="EditUser(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Skill"><i class="icon-edit"></i></a>  <a onclick="DeleteUser(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Skill"><i class="ti-trash"></i></a></th></tr>';
                $("#user_tbl_id").append(user);
                
                   },error : function(err){
        
                        console.log(err);
                   }
                  });
        }
     });
    
    
    

function myfunc() 
{
    $('#addUser').modal('show');
    $("#frmUser").trigger('reset');
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