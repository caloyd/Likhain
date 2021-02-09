
    $(document).ready(function() {
        $('#myTable').DataTable({
            'fnDrawCallback': function(oSettings){
                var totalPages = this.api().page.info().pages;
                if(totalPages <= 1){
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

    $('.btnDeleteJobApplication').click(function(event){
        var id = $(this).attr('data-id');
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
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
                'Job application has been deleted.',
                'success'
                ).then((isOkay) => {
                    $('#deleteJobApplication'+id).submit();
                })
            }
        })
    });
    $('#btnDeleteMany').click(function(){
        Swal.fire({
            title: 'Deleting 3 job applications',
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
                'Job application/s has been deleted.',
                'success'
                )
            }
        })
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

        $('.btnDeleteMany').on('click', function(e) {
        var allVals = [];  
        $(".sub_chk:checked").each(function() {  
            allVals.push($(this).attr('data-id'));
        });  
        if(allVals.length <=0)  
        {  
            Swal.fire(
            "Please select Job application", 
            "", 
            "error"
            )
        } else {  
            console.log(allVals);
            //var check = confirm("Are you sure you want to delete this row?"); 
            Swal.fire({
            title: 'DELETE CONFIRMATION',
            text: 'You are about to delete a job application/s',
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

    $('#job-applications').addClass('active');
