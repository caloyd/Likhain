$(document).ready(function(){
    $('#jobOffersTbl').DataTable(
        {
           "fnDrawCallback": function(oSettings) {
            var totalPages = this.api().page.info().pages;
            if(totalPages <= 1){ 
                jQuery('.dataTables_paginate').hide(); 
            }
            else { 
                jQuery('.dataTables_paginate').show(); 
            }
            }  
        }
    );
    $('#job-offers').addClass('active');

    $('.btnDelete').click(function(event){
        var id = $(this).attr('data-id');
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to cancel Job offer.",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#c2c2c2',
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                'DELETED',
                'Job offer cancelled',
                'success'
                ).then((isOkay) =>{
                $('#cancelJobOfferForm'+id).submit();
            })
            }
        })
    });
    
    // $("#selectAll").change(function(){  
    //     $(".checkbox").prop('checked', $(this).prop("checked")); 
    // });
    // $('.checkbox').change(function(){ 
    //     if(false == $(this).prop("checked")){ 
    //         $("#selectAll").prop('checked', false); 
    //     }
    //     if ($('.checkbox:checked').length == $('.checkbox').length ){
    //         $("#selectAll").prop('checked', true);
    //     }
    // });

    $('#selectAll').on('click', function(e) {
        if($(this).is(':checked',true))  
        {
            $(".sub_chk").prop('checked', true);  
        } else {  
            $(".sub_chk").prop('checked',false);  
        }  
    });

    $('.btnMassDelete').on('click', function(e) {
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });  
    if(allVals.length <=0)  
    {  
        Swal.fire(
        "Please select an Applicant", 
        "", 
        "error"
        )
    } else {  
        console.log(allVals);
        //var check = confirm("Are you sure you want to delete this row?"); 
        Swal.fire({
        title: 'DELETE CONFIRMATION',
        text: 'You are about to delete an Applicant/s',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'CONFIRM'
        }).then((result) => {
            if (result.value) {
                var join_selected_values = allVals.join(",");
                $.ajax({
                url: $(this).data('url'),
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: 'ids='+join_selected_values,
                success: function (data) {
                    if (data['success']) {
                        $(".sub_chk:checked").each(function() {  
                            $(this).parents("tr").remove();
                        });
                        Swal.fire('', data['success'], 'success')
                        .then((isOkay) => {
                            location.reload()
                        });
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });
                $.each(allVals, function( index, value ) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                });
            }
        });
    }  
    });
});

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let appfnameLabel = $(e.relatedTarget).data('applicantfirstname');
$(this).find('.modal-header #applicantModalLabel').text(appfnameLabel);
});

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let applnameLabel = $(e.relatedTarget).data('applicantlastname');
$(this).find('.modal-header #applicantModalLabelLast').text(applnameLabel);
});

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let appemail = $(e.relatedTarget).data('applicantemail');
$(this).find('.modal-body #email').text(appemail);
});

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let appcontactno = $(e.relatedTarget).data('applicantcontactno');
$(this).find('.modal-body #contactNo').text(appcontactno);
});

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let appexpsal = $(e.relatedTarget).data('applicantexpsal');
$(this).find('.modal-body #expSalary').text(appexpsal);
});

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let appschool = $(e.relatedTarget).data('applicantschool');
$(this).find('.modal-body #school').text(appschool);
});

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let appdatefrom = $(e.relatedTarget).data('applicantdatefrom');
$(this).find('.modal-body #dateFrom').text(appdatefrom);
});

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let appdateto = $(e.relatedTarget).data('applicantdateto');
$(this).find('.modal-body #dateTo').text(appdateto);
});

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let course = $(e.relatedTarget).data('course');
$(this).find('.modal-body #course').text(course);
}); 

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let educ = $(e.relatedTarget).data('educationattainment');
$(this).find('.modal-body #educ').text(educ);
}); 

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let jobtitle = $(e.relatedTarget).data('jobtitle');
$(this).find('.modal-body #jobTitle').text(jobtitle);
}); 

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let company = $(e.relatedTarget).data('company');
$(this).find('.modal-body #companyName').text(company);
}); 

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let begin = $(e.relatedTarget).data('begin');
$(this).find('.modal-body #begin').text(begin);
}); 

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let end = $(e.relatedTarget).data('end');
$(this).find('.modal-body #end').text(end);
});

$('#viewApplicantProfile').on('show.bs.modal',function(e){
let salary = $(e.relatedTarget).data('salary');
$(this).find('.modal-body #salary').text(salary);
});

$('#viewApplicantProfile').on('show.bs.modal',function(e){
    let skill = $(e.relatedTarget).data('skills');
    $(this).find('.modal-body #skills').text(skill);
});
