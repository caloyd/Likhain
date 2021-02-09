$(document).ready(function(){
    $('#dashboard').addClass('active');
    $('#employerTbl').DataTable(
        {
            'fnDrawCallback': function(oSettings){
                var totalPages = this.api().page.info().pages;
                if(totalPages <= 1){
                    jQuery('.dataTables_paginate').hide();
                }else{
                    jQuery('.dataTables_paginate').show()
                }
            }
        }
    );
});