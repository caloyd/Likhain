 //Real time Clock
 var interval = setInterval(function() {
    var momentNow = moment();
    // $('#dateTime').html(momentNow.format('dddd').toUpperCase() + ' '
    //     + "<br>" + momentNow.format('MMMM DD YYYY'));
    $('#realTimeDate').html(momentNow.format('YYYY-MM-DD HH:mm'));               
        $('#realTime').html(momentNow.format('hh:mm:ss A') + "<br>" + ' GMT' + momentNow.format('Z'));
    }, 100);
    
    $('#stop-interval').on('click', function() {
        clearInterval(interval);
    });

        $('#clockOut').click(function(e){
            //var getClockOut = $('#realTime').text();
            e.preventDefault();
            //alert(getClockOut);
            Swal.fire({
                title: 'CLOCK OUT',
                text: "Are you sure you want to clock out?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#04C31A',
                cancelButtonColor: '#c2c2c2',
                confirmButtonText: 'CONFIRM'
                }).then((result) => {
                if (result.value) {
                    Swal.fire(
                    'SUCCESSFULLY!',
                    'Clocked out Successfully.',
                    'success'
                    ).then((submit) =>
                    {
                        $('#clockOutForm').submit();
                    })
                }
            })
        });

