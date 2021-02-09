//SAVED JOBS
$('.btnRemoveSaved').click(function(event){
    var id = $(this).attr('data-id');
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to delete a saved job.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Delete'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Deleted!',
            'Saved job has been deleted.',
            'success'
            ).then((isOkay) => {
                $('#deleteJobForm'+id).submit()
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

$('#saved-jobs').addClass('active');