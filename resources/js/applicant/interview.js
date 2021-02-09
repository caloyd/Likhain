$(document).ready(function(){
    $('.btnViewToggle').click(function(){
        var id = $(this).attr('data-id')
        $('#more'+id).toggleClass('d-none');
        $('#less'+id).toggleClass('d-none');
    });

    $('#date input').each(function(){
        var dateToday = new Date();
        var id = $(this).attr('data-id');
        $('input#datetimepicker'+id).datetimepicker({
            format: 'L',
            minDate: dateToday.setDate(dateToday.getDate()+1)
        });

    });
    // $(window).bind('beforeunload', function(){

    //     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    //     $.ajax({
    //         url: $(this).data('url'),
    //         type: 'POST',
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         data: 'ids='+join_selected_values,
    //         success: function (data) {
    //             console.log("update")
    //         },
    //             error: function (data) {
    //                 alert(data.responseText);
    //             }
    //     });
    // });
    $('#time input').each(function(){
        var id = $(this).attr('data-id');
        $('input#timepicker'+id).datetimepicker({
            format: 'LT'
        })
    });
});

$('#interviews').addClass('active');

$('.acceptInterview').click(function(){
    var id = $(this).attr('data-id');
    event.preventDefault();
    Swal.fire({
        title: "You're about to accept this Job Interview, This can’t be undone!",
        text: "",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Confirm'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Job Interview accepted!',
            '',
            'success'
            ).then((isAccept) => {
                $('#interviewDecisionAccept'+id).submit();
            })
        }
    })
});

$('.declineInterview').click(function(){
    var id = $(this).attr('data-id');
    event.preventDefault();
    Swal.fire({
        title: "You're about to decline this Job Interview, This can’t be undone!",
        text: "",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Confirm'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Job Interview declined!',
            '',
            'success'
            ).then((isDeclined) => {
                $('#interviewDecisionDecline'+id).submit();
            })
        }
    })
});

$(".saveInterview").click(function() {
    $(".interviewRescheduleValidate").on('submit', function(e) {
        var id = $(this).attr('data-id');
        var checkEmptyInput1 = $(this).find("input[type=text]:visible").filter(function() { if($(this).val()=="") return $(this); }).length;
            if(checkEmptyInput1>0) {
            e.preventDefault();
            Swal.fire({
            title: 'Please complete the fields',
            icon: 'info'
            });
            $(this).find("input[type=text]:visible").filter(function() { if($(this).val()=="") return $(this); })[0].focus();
            return false;
            }
            else{
            Swal.fire(
                'SUCCESS!',
                'Job Interview rescheduled!',
                'success'
            ).then((isOkay) => {
                $('#interviewReschedule'+id).submit();
            })
            }
    });
});