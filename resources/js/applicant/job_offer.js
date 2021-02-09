$(document).ready(function() {
    $('#jobOffer').DataTable({
        'fnDrawCallback': function(oSettings){
            var totalPages = this.api().page.info().pages;
            if (totalPages >= 1){
                jQuery('.dataTables_paginate').hide();
            }else{
                jQuery('.dataTables_paginate').show();
            }
        }
    });
});
 // Checkbox
 $("#selectAll").change(function(){
    $(".checkbox").prop('checked', $(this).prop("checked"));
});
    $('.checkbox').change(function(){
        if(false == $(this).prop("checked")){
            $("#selectAll").prop('checked', false);
        }
        if ($('.checkbox:checked').length == $('.checkbox').length ){
            $("#selectAll").prop('checked', true);
        }
    });
  // end Checkbox

$('#btnDeclined').click(function(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to decline a Job Offer, This can't be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Confirm'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Job Offer Declined Thank You For Applying!',
            '',
            'success'
            )
        }
    })
});

$('#btnAccept').click(function(){
    Swal.fire({
        title: 'You’re about to accept a Job Offer, This can’t be undone!',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Confirm'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Job Offer Accepted Thank You For Applying!',
            '',
            'success'
            )
        }
    })
});

$('.btnDelete').click(function(event){
    var id = $(this).attr('data-id');
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure you want to delete Job Offer?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Delete it'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Deleted!',
            'Job offer has been deleted.',
            'success'
            ).then((isOkay) =>{
                $('#deleteJobOfferForm'+id).submit();
            })
        }
    })
});

$("#jobOffer #tr_1 #btn_view").click(function(){
    $('#jobOffer').find('#tr_1').removeClass('gray_bg');
    // $('#jobOffer').find('tr').removeClass('gray_bg');
    // $(this).parent('#jobOffer tr').addClass('clicked_white');
});
$("#jobOffer #tr_4 #btn_view").click(function(){
    $('#jobOffer').find('#tr_4').removeClass('gray_bg');
    // $('#jobOffer').find('tr').removeClass('gray_bg');
    // $(this).parent('#jobOffer tr').addClass('clicked_white');
});

$(document).ready(function () {
    $('#selectAll').on('click', function(e) {
        if($(this).is(':checked',true))
        {
            $(".sub_chk").prop('checked', true);
        } else {
            $(".sub_chk").prop('checked',false);
        }
    });

    $('.btnDeleteManyJobOffer').on('click', function(e) {
    var allVals = [];
    $(".sub_chk:checked").each(function() {
        allVals.push($(this).attr('data-id'));
    });
    if(allVals.length <=0)
    {
        Swal.fire(
        "Please select Job Offer",
        "",
        "error"
        )
    } else {
        console.log(allVals);
        //var check = confirm("Are you sure you want to delete this row?");
        Swal.fire({
        title: 'DELETE CONFIRMATION',
        text: 'You are about to delete a job offer/s',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'CONFIRM'
        }).then((result) => {
            if (result.value) {
                var join_selected_values = allVals.join(",");
                $.ajax({
                url: $(this).data('url'),
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: 'ids='+join_selected_values,
                success: function (data) {
                    if (data['success']) {
                        $(".sub_chk:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        Swal.fire('', data['success'], 'success')
                        .then((isOkay) => {
                            location.reload()
                        });
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });
                $.each(allVals, function( index, value ) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                });
            }
        });
    }
    });
});

$('#job-offers').addClass('active');