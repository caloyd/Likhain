$('#btnEdit').click(function(){
    $('#btnEdit').addClass('d-none');
    $('#viewProfile').addClass('d-none');
    $('#btnSave, #btnCancel').removeClass('d-none');
    $('#editProfile').removeClass('d-none');
    $('#profilePic').removeClass('d-none');
    $('input[name=firstName],input[name=middleName],input[name=lastName],input[name=email], input[name=employersContact], input[name=employersAddress]' ).removeAttr('disabled');
});
$('#btnCancel').click(function(){
    $('#btnSave, #btnCancel').addClass('d-none');
    $('#editProfile').addClass('d-none');
    $('#profilePic').addClass('d-none');
    $('#btnEdit').removeClass('d-none');
    $('#viewProfile').removeClass('d-none');
    $('input[name=firstName],input[name=middleName],input[name=lastName],input[name=email], input[name=employersContact]], input[name=employersAddress]').attr('disabled',true);
});

$('#accnt-sidebar').addClass('menu-open');
$('#accnt-sett').addClass('active');
$('#profile').addClass('active');
$(document).ready(function() {
    $('#employersContact').mask('0000-000-0000',{'translation': {0: {pattern: /[0-9*]/}}});

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
                
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload").on('change', function(){
        readURL(this);
        $('#btnSaveImage').removeClass('d-none');
    });
    $(".upload-button").on('click', function() {
        $(".file-upload").click();
    });
});