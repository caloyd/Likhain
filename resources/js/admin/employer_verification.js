$(document).ready(function(){
    $('#employerTbl').DataTable({
        'fnDrawCallback': function(oSettings){
            var totalPages = this.api().page.info().pages;
            if (totalPages <= 1){
                jQuery('.dataTables_paginate').hide();
            }else{
                jQuery('.dataTables_paginate').show();
            }
        }
    });
    $('#employer-sidebar').addClass('menu-open');
    $('#employer').addClass('active');
    $('#employer-verification').addClass('active');

    $('.btnAcceptReqs').click(function(e){
        var id = $(this).attr('data-id');
        var title = $(this).attr('data-name');
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to verify " + title,
            icon: 'info',
            showCancelButton: true,
            cancelButtonColor: '#c2c2c2',
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                'VERIFIED',
                title +' has been verified',
                'success'
                ).then((isOkay) => {
                    $('#verifyEmployerForm'+id).submit();
                });
            }
        })
    });
});