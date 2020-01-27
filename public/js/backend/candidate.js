

$("#frmEditCandidate").validate({
    rules: {
        first_name_edit: {
          required: true,
       },last_name_edit : {
           required : true
       },email_edit : {
           required : true
       },company_edit : {
           required : true
       },vacancy_edit : {
           required : true
       }
    }, submitHandler: function (form) {
        //Candidate ID
        var id = $('#candidate_id_edit').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                type: "POST",
                 url: "/admin/candidate/update/" + id,
                 data: {
                     'name' : $('#name').val(),
                     'first_name' : $('#first_name_edit').val(),
                     'last_name' : $('#last_name_edit').val(),
                     'middle_name' : $('#middle_name_edit').val(),
                     'email' : $('#email_edit').val(),
                     'company' : $('#company_edit').val(),
                     'vacancy_id': $('#vacancy_edit').val(),
                     'phone' : $('#phone_edit').val(),
                     'status' : $('#candidate_status').val(),
                     'date' : $('#date_application_edit').val(),
                    //  'interview_date' : $('#interview_date').val(),
                    //  'interview_time' : $('#interview_time').val(),
                    //  'interview_name' : $('#interview_name').val()
                 },
                success: function(result)
                {
                   console.log(result);
                   toastr.success('Success' , 'item has been updated !');
                //    location.reload();
                   $('#ModalEditCandidate').modal('hide');
                //    toastr.success('Success' , 'item has been updated !');
                   var canddate = '<tr id="tr_candidate' + result.id + '"> <th class="scope="row">' + result.id + '</th><td><strong><a href="/admin/candidate/' + result.id + '/edit">' + result.last_name + ' ' + result.first_name +  '</a></strong></td><td>' + result.vacancy.vacancy_name + '</td><td>' + result.candidate_vacancy.applied_date + '</td><td>' + result.candidate_vacancy.status + '</td>';
                   canddate += '<th><a onclick="Edit(this);" data-candidate_id="'+ result.id +'" data-vacancy_id="' + result.vacancy.id +'"  class="btn btn-primary"><i class="icon-edit"></i></a>  <a onclick="Delete(' + result.id + ');"  class="btn btn-danger"><i class="ti-trash"></i></a></th></tr>';
                   $('#tr_candidate'+result.id).replaceWith(canddate);
    
                },error : function(err){
    
                    console.log(err);
                }
            });

         }
});


//check Status == Interview
$('#div_name').hide();
$('#div_date').hide();
$('#div_time').hide();

    $('#candidate_status').on('change', function() {
        $status =  $('#candidate_status').val();
        if($status == "Interview"){
            $('#div_name').show();
            $('#div_date').show();
            $('#div_time').show();
        }else{
            $('#div_name').hide();
            $('#div_date').hide();
            $('#div_time').hide();
        }
    });

function Edit(x)
{

   var canddate_id = $(x).data("candidate_id");
   var vacancy_id = $(x).data("vacancy_id");
   $('#candidate_id_edit').val(canddate_id);

   $.ajax({
      type: "GET",
      url: "/admin/candidate_vacancy/edit/" + canddate_id +"/" + vacancy_id , 
      success: function(result)
      {
         console.log(result);
         $('#ModalEditCandidate').modal('show');
         $('#first_name_edit').val(result.first_name);
         $('#last_name_edit').val(result.last_name);
         $('#middle_name_edit').val(result.middle_name);
         $('#phone_edit').val(result.phone);
         $('#email_edit').val(result.email);
         $('#date_application_edit').val(result.candidate_vacancy.applied_date);
         $('#resume_edit').val(result.resume.file_name);
         $('#file_name_edit').val('');
     
        //  $('#date_application_edit').val(result.email);

         //Company
         var company = $('#company_edit');
         company.empty();
         $.each(result.all_company, function (key , value) {
               var isSelected = '';
               if(result.company_id == value.id)
               {
                  isSelected = 'selected';
               }
               company.append('<option value="'+value.id+'" '+isSelected+' >'+value.company_name+'</option>');
        });


         //Candidate Status 
         var status = $('#candidate_status');
         status.empty();
         var all_status = ['Application Initiated','Shortlist','Interview'];
         $.each(all_status, function (key , value) {
            //  console.log(value);
               var isSelected = '';
               if(result.candidate_vacancy.status == value)
               {
                  isSelected = 'selected';
               }
               if(result.candidate_vacancy.status == "Interview")
               {
                    $('#interview_name').val(result.interview.interview_name);
                    $('#interview_time').val(result.interview.interview_time);
                    $('#interview_date').val(result.interview.interview_date);
                    $('#div_name').show();
                    $('#div_date').show();
                    $('#div_time').show();
               }
               status.append('<option value="'+value + '" '+isSelected+' >'+value+'</option>');
        });


        //Vacancy 
        var vacancy = $('#vacancy_edit');
        vacancy.empty();
        $.each(result.all_vacancy, function (key , value) {
              var isSelected = '';
              if(result.candidate_vacancy.vacancy_id == value.id)
              {
                 isSelected = 'selected';
              }
              vacancy.append('<option value="'+value.id+'" '+isSelected+' >'+value.vacancy_name+'</option>');
       });

      },error : function(err){

            console.log(err);
      }
  });
}



//Addd Candidate
$("#frmAddCandidate").validate({
    rules: {
        first_name: {
          required: true,
       },last_name : {
           required : true
       },middle_name : {
           required : true
       },email : {
           required : true
       },company : {
           required : true
       },vacancy : {
           required : true
       },file: {
           required : true
       }
    }, submitHandler: function (form) {
        var extension = $('#file_name').val().split('.').pop().toLowerCase();
        // console.log(extension);
         if ($.inArray(extension, ['pdf', 'doc', 'xlsx']) == -1) {
            toastr.error('Please Select Valid File... !');
            //  $('#errormessage').html('Please Select Valid File... ');
         } else {

            var file_data = $('#file_name').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('name',$('#name').val());
            form_data.append('first_name',$('#first_name').val());
            form_data.append('last_name',$('#last_name').val());
            form_data.append('middle_name',$('#middle_name').val());
            form_data.append('email',$('#email').val());
            form_data.append('company',$('#company').val());
            form_data.append('vacancy_id',$('#vacancy').val());
            form_data.append('phone',$('#phone').val());
            form_data.append('status',$('#CandidateStatus').val());

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "/admin/candidate",
                data: form_data,
                 type: 'POST',
                 dataType:"json",
                 contentType: false, // The content type used when sending data to the server.
                 cache: false, // To unable request pages to be cached
                 processData: false,
                success: function(result)
                {
                   console.log(result);
                   $('#ModalAddCandidate').modal('hide');
                   toastr.success('Success' , 'item has been create !');
                   var canddate = '<tr id="tr_candidate' + result.id + '"> <th class="scope="row">' + result.id + '</th><td><a href="/admin/candidate/'+ result.id  +'/edit' +'"><strong>'+ result.first_name + ' ' + result.last_name +'</strong></a></td><td>' + result.vacancy.vacancy_name + '</td><td>' + result.candidate_vacancy.applied_date + '</td><td><b class="badge bg-success">' + result.candidate_vacancy.status + '</b></td>';
                   canddate += '<th><a onclick="Edit(this);" data-candidate_id="'+ result.id +'" data-vacancy_id="' + result.vacancy.id +'"  class="btn btn-primary"><i class="icon-edit"></i></a>  <a onclick="Delete(' + result.id + ');"  class="btn btn-danger"><i class="ti-trash"></i></a></th></tr>';
                   $('#tbl_canidate').append(canddate);
    
                },error : function(err){
    
                    console.log(err);
                }
            });

         }
    }
});

function AddCandidate()
{
    $('#ModalAddCandidate').modal('show');
    $('#frmAddCandidate').trigger('reset');
}




//function Delete Candidate
function Delete(xxx){
    $('#candidate_id').val(xxx);
    $('#DeleteCandidate').modal('show');
    
    }
    $('#frmDeleteCandidate').validate({
        submitHandler: function (form) {
            var id = $('#candidate_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "/admin/candidate" + '/' + id,
                method: 'Delete',
                success: function (response) {
                    $('#DeleteCandidate').modal('hide');
                    $('#tr_candidate' + response.id).remove();
                    toastr.success('Success', 'item has been deleted !');
                }, error: function (err) {
                    console.log(err);
                }
            });
        }
     });
    
   








$('.select2').select2();

$('#CandidateStatus').on('change',function () {

    let inter = $('#CandidateStatus').val();
    let canId = $('#candidateId').val();
    let jobId = $('#jobId').val();
    if(inter == "Interview"){

        $.ajax({

            type: "GET",
            url: '/admin/candidate/show/status/' + jobId + '/' + canId,
            cache: true,
            success: function (data) {

                var myArray4 =  data.candidate_interview ;

                if(myArray4 != null){

                    $('#date').val(data.candidate_interview.interview_date);
                    $('#time').val(data.candidate_interview.interview_time);
                    $('#note').val(data.candidate_interview.note);

                    var myArray5 =  data.candidate_interview.employee;

                    if (myArray5 && myArray5.length > 0 ) {


                        var arrayOfValues = data.candidate_interview.employee;

                        // Declare obj as array
                        var myObj = [];

                        $.each(arrayOfValues, function (i, value) {

                            // Push object to array
                            myObj.push(value.id);

                        });

                        $.each(data.all_employee, function (key, value) {

                            $("div select#employee ").val(myObj).change();

                        });

                    }else{

                        //console.log("null");
                        $("#employee").select2("val", "");
                    }

                }else{

                    console.log("null");
                    // console.log("is null");

                    $('#date').val("");
                    $('#time').val("");
                    $('#note').val("");
                    $('#employee').val('').trigger('change');
                    //Reset();
                    // $('#employee').empty().trigger("change");
                    // $("#employee").select2("val", "");
                }

                // console.log(data);

            }, error: function (err) {

                console.log(err);
            }
        });

    }
});
//update
function ShowCandidate(e) {

let job_id = $(e).data("job_id");
let candidate_id = $(e).data("candidate_id");

$.ajax({
    type: "GET",
    url: '/admin/candidate/show/status/' + job_id + '/' + candidate_id,
    cache: true,
    success: function (data) {

        if (data.selected_status.status == "Interview") {

            console.log('not null ');


            var myArray4 =  data.candidate_interview ;

            if(myArray4 != null){

                $('#date').val(data.candidate_interview.interview_date);
                $('#time').val(data.candidate_interview.interview_time);
                $('#note').val(data.candidate_interview.note);

                var myArray5 =  data.candidate_interview.employee;

                if (myArray5 && myArray5.length > 0 ) {


                    var arrayOfValues = data.candidate_interview.employee;

                    // Declare obj as array
                    var myObj = [];

                    $.each(arrayOfValues, function (i, value) {

                        // Push object to array
                        myObj.push(value.id);

                    });

                    $.each(data.all_employee, function (key, value) {

                        $("div select#employee ").val(myObj).change();

                    });

                }else{

                    //console.log("null");

                }

            }else{

                $('#date').val("");
                $('#time').val("");
                $('#note').val("");

                $("#employee").select2("val", "");
            }

            $('#Date').show();
            $('#Time').show();
            $('#Note').show();
            $('#employeeDiv').show();

        } else {

            // console.log("interview2");

            $('#Date').hide();
            $('#Time').hide();
            $('#Note').hide();
            $('#employeeDiv').hide();
        }

        //status
        let item = $('#CandidateStatus');
        item.empty();

        $.each(data.all_status, function (key, value) {

            let selected = '';

            if (value.name == data.selected_status.status) {

                selected = 'selected';
            }
            item.append("<option value='" + value.name + "'" + selected + ">" + value.name + "</option>");

        });

        $('#candidateId').val(data.selected_status.candidate_id);
        $('#jobId').val(data.selected_status.job_id);
        $('#CheckStatus').modal('show');

    },error: function (data) {

        console.log('Error:', data);
    }
});
}

//function reset button
function Reset(){

    $("select #employee").closest("form").on("reset",function(ev){
        var targetJQForm = $(ev.target);
        setTimeout((function(){
            this.find("select").trigger("change");
        }).bind(targetJQForm),0);
    });
}

// Create
$('#frmCandidate').validate({ // initialize the plugin

rules: {
    CandidateStatus : {
        required: true,
    },
    employee_id : {

        required : true,
    },
    employee : {

        required : true,
    },
    Date : {

        required : true,
    },Time : {

        required : true,
    }
},
submitHandler: function (ex) { // for demo

    let CandidateStatus = $('#CandidateStatus').val();
    let candidateId = $('#candidateId').val();
    let jobId = $('#jobId').val();
    let date = $('#date').val();
    let time = $('#time').val();
    let note = $('#note').val();
    let employee = $('#employee').val();

   //console.log(employee);

    $.ajax({

        type: "GET",
        url: '/admin/candidate/update/status/' + jobId + '/' + candidateId + '/' + CandidateStatus,
        data : {
            date : date ,
            time : time ,
            note : note,
            employee : employee
        },
        cache: true,
        success: function (data) {

           // console.log(data);

            if(data == "exist"){

                setTimeout(function(){
                    window.location.reload(1);
                }, 3000);

            }else {

                $('#assignStatus').html(data.pivot.status);
                $('#CheckStatus').modal('hide');
                $('#StatusMessage').modal('show');
                setTimeout(function(){
                    window.location.reload(1);
                }, 5000);
            }

        }, error: function (err) {

            console.log(err);
        }
    });
}
});


    













$('#Date').hide();
$('#Time').hide();
$('#Note').hide();
$('#employeeDiv').hide();
$('#CandidateStatus').change(function(){

$status =  $('#CandidateStatus').val();

if($status == "Interview"){

    $('#Date').show();
    $('#Time').show();
    $('#Note').show();
    $('#employeeDiv').show();

}else {

    $('#Date').hide();
    $('#Time').hide();
    $('#Note').hide();
    $('#employeeDiv').hide();
}
});


// submit form sending mail to candidates
function SendCandidateMail(x) {

let candidate_id = $(x).data("id");
$.ajax({

    type: "GET",
    url: 'candidate/send/mail/' + candidate_id,
    cache: true,
    success: function (data) {

        $('#email').val(data.email);
        $('#SendMessage').modal('show');

    }
});

}
// ---------------
// submit form sending mail to candidates
$('#frmSendCandidateMail').validate({ // initialize the plugin
rules: {
    subject : {
        required: true,
    }
},
submitHandler: function (form) { // for demo

   let message = $('#subject').val();
   let email = $('#email').val();

   // console.log(email);
    $.ajax({

        type: "GET",
        url: 'candidate/send/mail/' + email + '/' + message,
        cache: true,
        success: function (data) {

            if(data.success == "success")
            {
                $('#SendMessage').modal('hide');
                $('#SendingMessageSuccess').modal('show');
                $('#email_to').html(data.email);
            }

        },error : function (err) {

            console.log(err);
        }
    });
}
});






