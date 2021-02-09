$('.btnApprove').click(function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to approve a feedback",
        icon: 'info',
        showCancelButton: true,
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Approve'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'APPROVED',
            'Applicant feedback approved. It will show on company\'s profile.',
            'success'
            ).then((isOkay)=> {
                $('#approveForm' + id).submit();
            })
        }
    })
});

$('.btnReject').click(function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to reject a feedback",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Reject'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'REJECTED',
            'Applicant feedback rejected.',
            'success'
            ).then((isOkay) =>{
                $('#rejectForm' + id).submit();
            })
        }
    })
});

$('#sortValue').on('submit', function(data){
    var form = $(this)
    console.log(form.serialize());
    $.ajax({
        type: 'GET',
        data: form.serialize(),
        url: form.attr('action'),
        success:function(data){

        }
    })
})

$("#sortBy").change(function(){
    var sortVal = $(this).val();

    $('.defaultSort').addClass('d-none');
    $('.defaultOld').addClass('d-none');

    if(sortVal == 'Freshness'){
        $('.defaultSort').removeClass('d-none');
    }

    if(sortVal == 'Oldness'){
        $('.defaultOld').removeClass('d-none');
    }
})
$('#app-feedback').addClass('active');