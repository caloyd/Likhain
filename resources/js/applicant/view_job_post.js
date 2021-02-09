$('.saveJob').click(function(){
    var id = $(this).attr('data-id');
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to save this job post.",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Yes'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Saved!',
            'Job post has been saved.',
            'success'
            ).then((toApply) => {
                $('#addSaveJob'+ id).submit();
            })
        }
    })
});

$('#btnSaveJob').click(function(){
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to save this job post.",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Yes'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Saved!',
            'Job post has been saved.',
            'success'
            ).then((toApply) => {
                $('#saveJobForm').submit();
            })
        }
    })
});

$(document).ready(function(){
    $('.btnViewToggle').click(function(){
        var id = $(this).attr('data-id')
        $('#more'+id).toggleClass('d-none');
        $('#less'+id).toggleClass('d-none');
    });
});

$('#btnSubmitJobApp').click(function(){
    event.preventDefault();
    Swal.fire({
        title: 'Applying for a Job',
        text: "You want to apply for this job?",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Yes'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Applied!',
            'Successfully applied for job post.',
            'success'
            ).then((toSubmit)=>{
                $('#submitApplication').submit();
            })
        }
    })
});