    function AddVacancy(){
        $('#ModalAddVacacny').modal('show');
    }


//job title

//update 
$("#frmJobTitleEdit").validate({
    rules: {
        name_edit: {
            required: true,
        }
    }, submitHandler: function (form) {
        var id  = $('#job_tittle_edit').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/jobTitle" + '/' + id,
            method: 'PUT',
            data: {
                "name": $('#name_edit').val(),
                "description": $('#description_edit').val()
            },
            success: function (result) {
                
                $('#jobTitleEdit').modal('hide');
                toastr.success('Success', 'item has updated created !');
                var job_title = '<tr id="tr_job_title' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td><td>' + result.description + '</td>';
                job_title += '<th><a onclick="EditJobTitle(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Company"><i class="icon-edit"></i></a>  <a onclick="DeleteJobTitle(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-trash"></i></a></th></tr>';
                $("#tr_job_title" + result.id).replaceWith(job_title);

            },error : function(err){
                console.log(err);
            }
        });
    }
});
// EditJobTitle
function EditJobTitle(id){
    
    $('#job_tittle_edit').val(id);
    $.ajax({
            type: "GET",
            url: "/admin/jobTitle" + "/" + id + "/edit",
            success: function(data)
            {
                //console.log(data);
                $('#jobTitleEdit').modal('show');
                $('#name_edit').val(data.name);
                $('#description_edit').val(data.description);
            },error : function(err){

            }
        });
}
//Delete
function DeleteJobTitle(id) {
    $('#DeleteJobTtile').modal('show');
    $('#id_jobTitle').val(id);
}

$('#frmJobTitleDelete').validate({
    submitHandler: function (form) {
        var id = $('#id_jobTitle').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/jobTitle" + '/' + id,
            method: 'Delete',
            success: function (response) {
                $('#DeleteJobTtile').modal('hide');
                $('#tr_job_title' + response.id).remove();
                toastr.success('Success', 'item has been deleted !');
            }, error: function (err) {
                console.log(err);
            }
        });
    }
});

//Add
$("#frmJobTitle").validate({
    rules: {
        name: {
            required: true,
        }
    }, submitHandler: function (form) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/admin/jobTitle",
            method: 'POST',
            data: {
                "name": $('#name').val(),
                "description": $('#description').val()
            },
            success: function (result) {
                // console.log(result);
                toastr.success('Success', 'item has been created !');
                $('#exampleModal').modal('hide');
                var user = '<tr id="tr_job_title' + result.id + '"> <th class="scope="row">' + result.id + '</><td>' + result.name + '</td><td>' + result.description + '</td>';
                user += '<th><a onclick="EditJobTitle(' + result.id + ');"  data-toggle="modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Company"><i class="icon-edit"></i></a>  <a onclick="DeleteJobTitle(' + result.id + ');" data-toggle="modal" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Company"><i class="ti-trash"></i></a></th></tr>';
                $('#tbl_job_title').append(user);


            }, error: function (err) {

                console.log(err);
            }
        });
    }
});



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