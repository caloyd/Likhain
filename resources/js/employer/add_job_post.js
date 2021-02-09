var prev_date = new Date();
        prev_date.setDate(prev_date.getDate()-1);
        $('input[name="recPeriod"]').daterangepicker({
            "minDate": prev_date
        });

        $(function () {
            $("#fullLocation").attr('readonly', 'readonly');
            $('#fullLocation').val($('#jobLocationCity option:selected').val() + ' ' + $('#jobLocation').val());
            $('#fullLocation').val($('#jobLocation option:selected').val() + ' ' + $('#jobLocationCity').val());
            $('#jobLocationCity, #jobLocation').bind('change keyup keydown', function () {
                $('#fullLocation').val($('#jobLocationCity option:selected').text() + ' , ' + $('#jobLocation').val());
            });
        });

        $(document).ready(function(){
            
            $('#jobDetailsForm').on('submit', function(event){
                event.preventDefault();
                var form = $(this)
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to save a Job Post",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#c2c2c2',
                    confirmButtonText: 'Yes'
                    }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: form.attr('action'),
                            data: form.serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success:function(response){
                                $('input[type="number"]').removeClass('is-invalid');
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
                 // FOR ECHO              
                var tato = $("#skills").val()
                console.warn(tato);
                var tatoes = tato.join(", ")
                console.info(tatoes);
                var tatos = $('#outputSkill').append(tatoes)
                // end FOR ECHO
            });

            $('#skills').select2({
                theme: 'bootstrap4',
                tags: true,
                // NEW TAG
                createTag: function (params) {
                    var term = $.trim(params.term);
                    if (term === '') {
                    return null;
                    }
                    return {
                    id: term,
                    text: term,
                    newTag: true // add additional parameters
                    }
                }
                // end NEW TAG
            });
        });

        $('#maximumSalary').keyup(function(){
            var max = parseInt($(this).val())
            var min = parseInt($('#minimumSalary').val())
            if (min > max) {
                $('#maxMsg').removeClass('d-none')
            }else{
                $('#maxMsg').addClass('d-none')
            }
        })