$('.saveJob').click(function(event){
    var id = $(this).attr('data-id');
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to save this job?",
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
            ).then((isOkay) => {
                $('#addSaveJob'+id).submit()
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

var maxLength = 500;
$('textarea').keydown(function() {
var textlen = maxLength - $(this).val().length;
$('#remainingChars').text(textlen);
});