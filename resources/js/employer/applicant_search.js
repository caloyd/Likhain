$('#recruiterContact').mask('00000000000',{'translation': {0: {pattern: /[0-9*]/}}});

// DataTable
$(document).ready(function() {
    $('#applicantSearch').DataTable(
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
});
// end DataTable

 // Checkbox
$("#selectAll").change(function(){  
    $(".checkbox").prop('checked', $(this).prop("checked")); 
});
    $('.checkbox').change(function(){ 
        if(false == $(this).prop("checked")){ 
            $("#selectAll").prop('checked', false); 
        }
        if ($('.checkbox:checked').length == $('.checkbox').length ){
            $("#selectAll").prop('checked', true);
        }
    });
  // end Checkbox

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            theme: 'bootstrap4'
        });
    });

    $("#btnSetInterview").on('click', function(e) {
            e.preventDefault();
            var checkEmptyInput1 = $('#setInterviewForm').find("input[type=text]:visible,textarea:visible").filter(function() { if($(this).val()=="") return $(this); }).length;
            if(checkEmptyInput1>0) {
                Swal.fire({
                    title: 'Please complete the fields',
                    icon: 'info'
                });
                $('#setInterviewForm').find("input[type=text]:visible,textarea:visible").filter(function() { if($(this).val()=="") return $(this); })[0].focus();
            }
            else
            {
                Swal.fire(
                    'SUCCESS!',
                    'Interview Set!',
                    'success')
                .then((isOkay) => {
                    $('#setInterviewForm').submit();
                })
            }
        });
    
$('#app-search').addClass('active');

$('#setInterviewApplicantSearch').on('show.bs.modal',function(e){
let appid = $(e.relatedTarget).data('appid');
$(this).find('.modal-body #applicantId').val(appid);
});

$('#setInterviewApplicantSearch').on('show.bs.modal',function(e){
let fname = $(e.relatedTarget).data('appfirstname');
$(this).find('.modal-header #firstName').text(fname);
});

$('#setInterviewApplicantSearch').on('show.bs.modal',function(e){
let lname = $(e.relatedTarget).data('applastname');
$(this).find('.modal-header #lastName').text(lname);
});

var dateToday = new Date();
$('#interviewDate1').datetimepicker({
    format: 'L',
    minDate: dateToday.setDate(dateToday.getDate()+1)
});

$('#startTime1, #endTime1').datetimepicker({
    format: 'LT'
});