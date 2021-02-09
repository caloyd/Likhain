$(document).ready(function(){
    $('#contactNumber').mask('0000-000-0000',{'translation': {0: {pattern: /[0-9*]/}}});

    $('#accnt-sidebar').addClass('menu-open');
    $('#accnt-sett').addClass('active');
    $('#profile').addClass('active');

    $('#btnEdit').click(function(){
        $('#btnEdit').addClass('d-none');
        $('#viewProfile').addClass('d-none');
        $('#btnSave, #btnCancel').removeClass('d-none');
        $('#profilePic').removeClass('d-none');
        $('input[name=firstName],input[name=lastName],input[name=email],input[name=contactNumber]').removeAttr('disabled');
    });

    $('#btnCancel').click(function(){
        $('#btnEdit').removeClass('d-none');
        $('#btnSave, #btnCancel').addClass('d-none');
        $('#profilePic').addClass('d-none');
        $('#viewProfile').removeClass('d-none');
        $('input[name=firstName],input[name=lastName],input[name=email],input[name=contactNumber]').attr('disabled',true);
    });

    $('#btnSave').click(function(){
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to edit your profile",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#c2c2c2',
            confirmButtonText: 'CONFIRM'
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                'SUCCESS',
                'Your profile has been updated.',
                'success'
                ).then((isOkay)=>{
                    $('#profileForm').submit();
                });
            }
            $('#btnEdit').removeClass('d-none');
            $('#btnSave, #btnCancel').addClass('d-none');
            $('input[name=firstName],input[name=lastName],input[name=email],input[name=address],input[name=contactNumber]').attr('disabled',true);
        })
    });
    $(document).ready(function() {
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
});