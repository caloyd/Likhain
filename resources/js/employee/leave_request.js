$('#leaveRequestPage').addClass('active');

$(document).ready(function() {
    $('#leaveRequest').DataTable(
        {
            'fnDrawCallback': function(oSettings){
                var totalPages = this.api().page.info().pages;
                if(totalPages <= 1){
                    jQuery('.dataTables_paginate').hide();
                }else{
                    jQuery('.dataTables_paginate').show();
                }
            }
        }
    );
});

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

$('.btnDeleteLeave').click(function(e){
    var id = $(this).attr('data-id');
    e.preventDefault();
    Swal.fire({
        title: 'LEAVE REQUEST',
        text: "Are you sure you want to delete leave request/s?",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#04C31A',
        cancelButtonColor: '#E52B2B ',
        confirmButtonText: 'CONFIRM'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'SUCCESSFULLY!',
            'Leave Request Deleted.',
            'success'
            ).then((submit) => {
                $('#deleteLeaveForm'+id).submit();
            })
        }
    })
});

$("#bntConfirmLeave").on('click', function(e) {
            e.preventDefault();
            var checkEmptyInput1 = $('#addLeaveForm').find("input[type=text]:visible,textarea:visible").filter(function() { if($(this).val()=="") return $(this); }).length;
            if(checkEmptyInput1>0) {
                Swal.fire({
                    title: 'Please complete fields',
                    icon: 'info'
                });
                $('#addLeaveForm').find("input[type=text]:visible,textarea:visible").filter(function() { if($(this).val()=="") return $(this); })[0].focus();
            }
            else
            {
                Swal.fire(
                    'SUCCESS!',
                    'Leave Submitted!',
                    'success')
                .then((isOkay) => {
                    $('#addLeaveForm').submit();
                })
            }
});

var dateToday = new Date();
$('#leaveStartDate').datetimepicker({
    format: 'L',
    minDate: dateToday.setDate(dateToday.getDate()+1)
});

$('#leaveEndDate').datetimepicker({
    format: 'L',
    minDate: dateToday
});

$('#leaveRequestView').on('show.bs.modal',function(e){
let type = $(e.relatedTarget).data('leavetype');
$(this).find('.modal-body #leaveType').text(type);
});

$('#leaveRequestView').on('show.bs.modal',function(e){
let start = $(e.relatedTarget).data('startdate');
$(this).find('.modal-body #startDate').text(start);
});

$('#leaveRequestView').on('show.bs.modal',function(e){
let end = $(e.relatedTarget).data('enddate');
$(this).find('.modal-body #endDate').text(end);
});

$('#leaveRequestView').on('show.bs.modal',function(e){
let reason = $(e.relatedTarget).data('reason');
$(this).find('.modal-body #leaveReason').text(reason);
});

$(document).ready(function () {

$('#selectAll').on('click', function(e) {
    if($(this).is(':checked',true))  
    {
        $(".sub_chk").prop('checked', true);  
    } else {  
        $(".sub_chk").prop('checked',false);  
    }  
});

$('.btnMultiDelete').on('click', function(e) {
var allVals = [];  
$(".sub_chk:checked").each(function() {  
    allVals.push($(this).attr('data-id'));
});  
if(allVals.length <=0)  
{  
    Swal.fire(
    "Please select Leaves", 
    "", 
    "error"
    )
} else {  
    console.log(allVals);
    Swal.fire({
    title: 'DELETE CONFIRMATION',
    text: 'You are about to delete leaves',
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