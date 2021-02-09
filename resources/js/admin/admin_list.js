$(document).ready(function(){
    $('#contactNumber').mask('0000-000-0000',{'translation': {0: {pattern: /[0-9*]/}}});
    $('#admin-list').addClass('active');
    $('#adminList').DataTable({
        "fnDrawCallback": function(oSettings){
            var totalPages = this.api().page.info().pages;
            if(totalPages <= 1){
                jQuery('.dataTables_paginate').hide();
            }
            else
            {
                jQuery('.dataTables_paginate').show();
            }
        }
    });


    // $("#btnPromoteAdmin").click(function(){
    //     Swal.fire({
    //     title: 'PROMOTE',
    //     text: 'You are about to promote this admin.', 
    //     icon: 'info',
    //     showCancelButton: true,
    //     cancelButtonColor: '#d33'
    //     }).then((result) => {
    //         if (result.value) {
    //         Swal.fire(                      
    //             'PROMOTED',
    //             'Admin account promoted.',
    //             'success'                        
    //             )
    //         }
    //     })   
    // });

    $(".btnDeleteAdmin").click(function(e){
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        e.preventDefault();
        Swal.fire({
        title: 'DELETE ' + name + ' ACCOUNT',
        text: 'You are about to delete ' + name + ' this cannot be undone!', 
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33'
        }).then((result) => {
            if (result.value) {
            Swal.fire(                      
                'DELETED',
                'Admin account deleted',
                'success'                        
                ).then((submit) => {
                    $('#deleteAdminForm'+id).submit();
                })
            }
        })   
    });

    $("#btnCreateAdmin").on('click', function(e) {
            e.preventDefault();
            var checkEmptyInput = $('#addAdminForm').find("input[type=text]:visible,input[type=email]:visible,input[type=password]:visible").filter(function() { if($(this).val()=="") return $(this); }).length;
            if(checkEmptyInput > 0) {
                Swal.fire({
                    title: 'Please complete the fields',
                    icon: 'info'
                });
                $('#addAdminForm').find("input[type=text]:visible,input[type=email]:visible,input[type=password]:visible").filter(function() { if($(this).val()=="") return $(this); })[0].focus();
            }
            else
            {
                Swal.fire(
                    'SUCCESS!',
                    'Admin Created!',
                    'success')
                .then((isOkay) => {
                    $('#addAdminForm').submit();
                })
            }
        });


// Checkbox
 $("#selectAll").change(function(){ //"select all" change 
    $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status 
});
    $('.checkbox').change(function(){ //uncheck "select all", if one of the listed checkbox item is unchecked 
        if(false == $(this).prop("checked")){  //if this item is unchecked
            $("#selectAll").prop('checked', false);  //change "select all" checked status to false
        }
        if ($('.checkbox:checked').length == $('.checkbox').length ){ //check "select all" if all checkbox items are checked
            $("#selectAll").prop('checked', true);
        }
    });
$('#job-offers').addClass('active');
$("#checkItem").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
});
// end Checkbox

$('#viewAdminModal').on('show.bs.modal',function(e){
let fname = $(e.relatedTarget).data('fname');
$(this).find('.modal-body #firstName').text(fname);
});

$('#viewAdminModal').on('show.bs.modal',function(e){
let lname = $(e.relatedTarget).data('lname');
$(this).find('.modal-body #lastName').text(lname);
});

$('#viewAdminModal').on('show.bs.modal',function(e){
let email = $(e.relatedTarget).data('email');
$(this).find('.modal-body #email').text(email);
});

$('#viewAdminModal').on('show.bs.modal',function(e){
let contact = $(e.relatedTarget).data('contact');
$(this).find('.modal-body #contact').text(contact);
});

});