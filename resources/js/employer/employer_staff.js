$(document).ready(function() {
    $('#employerStaff').DataTable( {
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

$("#createdStaffBtn").click(function(e){
            e.preventDefault();
            var checkEmptyInput1 = $('#createStaffForm').find("input[type=text]:visible,input[type=email]:visible,input[type=password]:visible").filter(function() { if($(this).val()=="") return $(this); }).length;
            if(checkEmptyInput1>0) {
            e.preventDefault();
            Swal.fire({
            title: 'Please complete the fields',
            icon: 'info'
            });
            $('#createStaffForm').find("input[type=text]:visible,input[type=email]:visible,input[type=password]:visible").filter(function() { if($(this).val()=="") return $(this); })[0].focus();
            // return false;
            }
            else{
            Swal.fire({
                title: 'SUCCESS',
                text: "Staff added to records",
                icon: 'success'
            }).then((okay) => {
                $('#createStaffForm').submit();
            })
            }
});
// Modal
    $(".btnDeleteStaff").click(function(e){
    var id = $(this).attr('data-id');
    e.preventDefault();
    Swal.fire({
    title: 'DELETE STAFF ACCOUNT',
    text: 'Are you sure you want to delete staff account/s?', 
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#28A745',
    cancelButtonColor: '#d33',  
    confirmButtonText: 'CONFIRM'
    }).then((result) => {
        if (result.value) {
        Swal.fire(                      
            'DELETED',
            'Applicant deleted',
            'success'                        
        ).then((isOkay)=>{
            $('#deleteStaffForm'+id).submit();
        })
        }
        });   
    });

    $("#promoteStaff,#promoteStaff2").click(function(){
    Swal.fire({
        title: 'PROMOTE STAFF ACCOUNT',
        text: 'Do you really want to promote this staff account/s?', 
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',  
    confirmButtonText: 'CONFIRM'
    }).then((result) => {
        if (result.value) {
        Swal.fire(                      
            'SUCCESS',
            'Staff promoted to Admin',
            'success'                        
        )
        }
    })   
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

    $('.btnMassDelete').on('click', function(e) {
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });  
    if(allVals.length <=0)  
    {  
        Swal.fire(
        "Please select Staff", 
        "", 
        "error"
        )
    } else {  
        console.log(allVals);
        Swal.fire({
        title: 'DELETE CONFIRMATION',
        text: 'You are about to delete a Staff/s',
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

// end Modal

$('#employer-list').addClass('active');

$('#viewProfileStaff').on('show.bs.modal',function(e){
let fname  = $(e.relatedTarget).data('fname');
$(this).find('.modal-body #firstName').text(fname);
});

$('#viewProfileStaff').on('show.bs.modal',function(e){
let mname  = $(e.relatedTarget).data('mname');
$(this).find('.modal-body #middleName').text(mname);
});

$('#viewProfileStaff').on('show.bs.modal',function(e){
let lname = $(e.relatedTarget).data('lname');
$(this).find('.modal-body #lastName').text(lname);
});

$('#viewProfileStaff').on('show.bs.modal',function(e){
let email = $(e.relatedTarget).data('email');
$(this).find('.modal-body #email').text(email);
});