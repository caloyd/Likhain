$(document).ready(function(){
    $('#requirementsTbl').DataTable({
        'fnDrawCallback': function(oSettings){
            var totalPages = this.api().page.info().pages;
            if (totalPages <= 1){
                jQuery('.dataTables_paginate').hide();
            }else{
                jQuery('.dataTables_paginate').show();
            }
        }
    });
});

    $('#employer-sidebar').addClass('menu-open');
    $('#employer').addClass('active');
    $('#employer-verification').addClass('active');

    $('.btnAcceptRequirement').click(function(e){
        var id = $(this).attr('data-id');
        e.preventDefault();
        Swal.fire(
        'ACCEPTED',
        'Document accepted',
        'success'
        ).then((isOkay)=>{
            $('#approveDocumentForm'+id).submit();
        });
    });

    $('.btnRejectRequirement').on('click', function(e){
        var id = $(this).attr('data-id');
        e.preventDefault();
        var checkEmptyInput = $('#rejectDocumentForm'+id).find("textarea:visible").filter(function() { if($(this).val()=="") return $(this); }).length;
        if(checkEmptyInput>0) {
        Swal.fire({
            title: 'Please put Remarks',
            icon: 'info'
        });
        $('#rejectDocumentForm'+id).find("textarea:visible").filter(function() { if($(this).val()=="") return $(this); })[0].focus();
        }
        else
        {
            Swal.fire(
            'REJECTED',
            'Document rejected',
            'success'
            ).then((isOkay)=>{
                $('#rejectDocumentForm'+id).submit();
            });
        }
    });
