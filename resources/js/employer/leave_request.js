$(document).ready(function() {
    $('#leaveRequestTbl').DataTable(
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

// APPROVE LEAVE
$('.btnApproveLeave').click(function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to approve a leave request",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'CONFIRM'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'APPROVED!',
            'Employees leave request approved.',
            'success'
            ).then((isOkay) =>{
                $('#approveForm' + id).submit();
            })
        }
    })
});

$('.btnApproveLeaveModal').click(function(e){
    var id = $(this).attr('data-id');
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to approve a leave request",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'CONFIRM'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'APPROVED!',
            'Employees leave request approved.',
            'success'
            ).then((isOkay) => {
                $('#approveFormModal'+ id).submit();
            })
        }
    })
});
// end APPROVE LEAVE

// DENY LEAVE
$('.btnDenyLeave').click(function(e){
    var id = $(this).attr('data-id');
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to deny leave request",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Deny'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'DENIED!',
            'Employee leave request has been denied.',
            'success'
            ).then((isOkay) => {
                $('#denyForm' + id).submit();
            })
        }
    })
});

$('.btnDenyLeaveModal').click(function(e){
    var id = $(this).attr('data-id');
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to deny leave request",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'DENY'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'DENIED!',
            'Employee leave request has been denied.',
            'success'
            ).then((isOkay) => {
                $('#denyFormModal' + id).submit();
            })
        }
    })
});
// end DENY LEAVE

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
$('#menu-sidebar').addClass('menu-open');
$('#employee').addClass('active');
$('#leave-req').addClass('active');

$('.leaveType').attr('disabled',true);
$('.startDate').attr('disabled',true);
$('.endDate').attr('disabled',true);
$('.leaveReason').attr('disabled',true);

$(document).ready(function () {

    $('#selectAll').on('click', function(e) {
        if($(this).is(':checked',true))  
        {
            $(".sub_chk").prop('checked', true);  
        } else {  
            $(".sub_chk").prop('checked',false);  
        }  
    });

    $('.btnMultipleApproveLeave').on('click', function(e) {
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });  
    if(allVals.length <=0)  
    {  
        Swal.fire(
        "Please select Leave to approve", 
        "", 
        "error"
        )
    } else {  
        console.log(allVals);
        Swal.fire({
        title: 'Multiple Approve Request',
        text: 'You are about to approve leave request/s',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'CONFIRM'
        }).then((result) => {
            if (result.value) {
                var join_selected_values = allVals.join(",");
                $.ajax({
                url: $(this).data('url'),
                type: 'PATCH',
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

    $('.btnMultipleDenyLeave').on('click', function(e) {
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });  
    if(allVals.length <=0)  
    {  
        Swal.fire(
        "Please select Leave to deny", 
        "", 
        "error"
        )
    } else {  
        console.log(allVals);
        Swal.fire({
        title: 'Multiple Deny Request',
        text: 'You are about to Deny leave request/s',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'CONFIRM'
        }).then((result) => {
            if (result.value) {
                var join_selected_values = allVals.join(",");
                $.ajax({
                url: $(this).data('url'),
                type: 'PATCH',
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