$('#accnt-sidebar').addClass('menu-open');
$('#accnt-sett').addClass('active');
$('#change-pass').addClass('active');

$(function(){
    $('#cancelReset').on('click', function(){
        // alert('something');
        $("#resetPasswordForm")[0].reset()
        $('input[type="password"]').removeClass('is-invalid');
        $('span.invalid-feedback').html('')
    })

    $('#resetPasswordForm').on('submit', function(event){
        event.preventDefault()
        var form = $(this)
        Swal.fire({
            title: 'Are you sure',
            text: "You want to change your password?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: form.attr('action'),
                    data: form.serialize(),
                    type: 'POST',
                    dataType: 'json',
                    success:function(response){
                        $('input[type="password"]').removeClass('is-invalid');
                        $('span.invalid-feedback').html('')
                        if(response.errors){
                            var err = Object.entries(response.errors)
                            err.forEach(element => {
                                $('#'+element[0]).addClass('is-invalid')
                                var html = '<strong>'+element[1][0]+'</strong>'
                                $('span#'+element[0]).html(html)
                            })
                        }
                        if(response.success){
                            Swal.fire(
                                '',
                                response.success,
                                'success'
                            ).then((isOkay) => {
                                location.reload()
                            })
                        }
                    }
                })
            }
        })
    })
})