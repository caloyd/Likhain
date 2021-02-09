$(document).ready(function() {
    $('#requirementsTbl').DataTable({
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
    }
    );
});

$('#btnConfirmReq').on('click', function(event){
    event.preventDefault();
    var checkEmptyInput = $('#uploadForm').find("input[type=file]:visible").filter(function() { 
        if($(this).val()=="") return $(this); }).length;
        if(checkEmptyInput>0) {
            Swal.fire(
            'No file attached',
            );
        $('#uploadForm').find("input[type=file]:visible").filter(function() { if($(this).val()=="") return $(this); })[0].focus();
        }
        else 
        {
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to upload document.",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#c2c2c2',
                confirmButtonText: 'Upload'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                    'Saved!',
                    'Document Added.',
                    'success'
                    ).then((isOkay) => {
                        $('#uploadForm').submit()
                    })
                }
            })
        }            
});

$('#accnt-sidebar').addClass('menu-open');
$('#accnt-sett').addClass('active');
$('#company-verification').addClass('active');