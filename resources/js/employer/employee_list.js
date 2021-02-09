$(document).ready(function() {
    $('#employeeListTbl').DataTable(
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

// SINGLE DELETE EMPLOYEE
$('.btnEmployeeDelete').click(function(e){
    var id = $(this).attr('data-id');
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to delete an employee.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Delete'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'DELETED!',
            'Employee records has been deleted.',
            'success'
            ).then((isOkay)=> {
                $('#deleteEmpForm'+id).submit();
            })
        }
    })
});
// end SINGLE DELETE EMPLOYEE 

// MULTIPLE DELETE EMPLOYEE
$(document).ready(function () {

$('#selectAll').on('click', function(e) {
    if($(this).is(':checked',true))  
    {
        $(".sub_chk").prop('checked', true);  
    } else {  
        $(".sub_chk").prop('checked',false);  
    }  
});

$('.btnEmployeeMultipleDelete').on('click', function(e) {
var allVals = [];  
$(".sub_chk:checked").each(function() {  
    allVals.push($(this).attr('data-id'));
});  
if(allVals.length <=0)  
{  
    Swal.fire(
    "Please select an Employee", 
    "", 
    "error"
    )
} else {  
    console.log(allVals);
    //var check = confirm("Are you sure you want to delete this row?"); 
    Swal.fire({
    title: 'DELETE CONFIRMATION',
    text: 'You are about to delete an Employee/s',
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

// end MULTIPLE DELETE EMPLOYEE

// CONFIRM ADD EMPLOYEE
$('#btnConfirmAddEmployee').on('click', function(e){
    e.preventDefault();                
        var checkEmptyInput1 = $('#addEmployeeForm').find("input[type=text]:visible,input[type=number]:visible,input[type=email]:visible,input[type=password]:visible").filter(function() { if($(this).val()=="") return $(this); }).length;
        if(checkEmptyInput1>0) {
            e.preventDefault();
            Swal.fire({
            title: 'Please complete the fields',
            icon: 'info'
            });
            $('#addEmployeeForm').find("input[type=text]:visible,input[type=number]:visible,input[type=email]:visible,input[type=password]:visible").filter(function() { if($(this).val()=="") return $(this); })[0].focus();
            }
            else{
            Swal.fire({
                title: 'ADDED!',
                text: "Employee added to records",
                icon: 'success'
            }).then((submit)=> {
                $('#addEmployeeForm').submit();
            })
            }

});

// end CONFIRM ADD EMPLOYEE

$('#menu-sidebar').addClass('menu-open');
$('#employee').addClass('active');
$('#employee-list').addClass('active');

$('#employmentDate').datetimepicker({
    format: 'L',
});

$('#viewEmployeeModal').on('show.bs.modal',function(e){
let fname  = $(e.relatedTarget).data('fname');
$(this).find('.modal-body #firstName').text(fname);
});

$('#viewEmployeeModal').on('show.bs.modal',function(e){
let mname  = $(e.relatedTarget).data('mname');
$(this).find('.modal-body #middleName').text(mname);
});

$('#viewEmployeeModal').on('show.bs.modal',function(e){
let lname = $(e.relatedTarget).data('lname');
$(this).find('.modal-body #lastName').text(lname);
});

$('#viewEmployeeModal').on('show.bs.modal',function(e){
let jobpos = $(e.relatedTarget).data('jobpos');
$(this).find('.modal-body #jobPosition').text(jobpos);
});

$('#viewEmployeeModal').on('show.bs.modal',function(e){
let empdate = $(e.relatedTarget).data('empdate');
$(this).find('.modal-body #hireDate').text(empdate);
});

$('#viewEmployeeModal').on('show.bs.modal',function(e){
let address = $(e.relatedTarget).data('address');
$(this).find('.modal-body #address').text(address);
});

$('#viewEmployeeModal').on('show.bs.modal',function(e){
let contact = $(e.relatedTarget).data('contactnumber');
$(this).find('.modal-body #contactNumber').text(contact);
});

$('#viewEmployeeModal').on('show.bs.modal',function(e){
let salary = $(e.relatedTarget).data('salary');
$(this).find('.modal-body #salaryAmount').text(salary);
});