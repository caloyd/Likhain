$('#acceptOffer').click(function(){
    event.preventDefault();
        Swal.fire({
            title: 'You’re about to accept a Job Offer',
            text: "This can’t be undone!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#28A745',
            cancelButtonColor: '#c2c2c2',
            confirmButtonText: 'Confirm'
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Job Offer Accepted ',
                'Thank You For Applying!',
                'success'
                ).then((isOkay) => { 
                    $('#jobOfferDecisionAccept').submit();
                })
            }
        })
        console.log($('#accept').val());
    });

    $('#declineOffer').click(function(){
        event.preventDefault();
        Swal.fire({
            title: 'You’re about to decline a Job Offer',
            text: "This can’t be undone!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#28A745',
            cancelButtonColor: '#c2c2c2',
            confirmButtonText: 'Confirm'
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Job Offer Declined ',
                'Thank You For Applying!',
                'success'
                ).then((isOkay) => {
                    $('#jobOfferDecisionDecline').submit();
                })
            }
        })
        console.log($('#denied').val());
    });
    $('#job-offers').addClass('active');