$(document).ready(function(){
    $('#employer-sidebar').addClass('menu-open');
    $('#employer').addClass('active');
    $('#employer-requirements').addClass('active');

    $('#requirementsTbl').DataTable({
        'fnDrawCallback': function(oSettings){
            var totalPages = this.api().page.info().pages;
            if(totalPages <= 1){
                jQuery('.dataTables_paginate').hide();
            }else{
                jQuery('.dataTables_paginate').show();
            }
        }
    });
    
    $('.btnRemoveReqs').click(function(e){
    var id = $(this).attr('data-id');
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to delete a requirement record.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'Delete'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'DELETED!',
            'Requirement records has been deleted.',
            'success'
            ).then((isOkay)=> {
                $('#deleteRequirementsForm'+id).submit();
            })
        }
    })
});

    $('.btnConfirmAddReq').click(function(){
    $(".addRequirementsForm").on('submit', function(e) {
            var checkEmptyInput = $(this).find("input[type=text]:visible").filter(function() { if($(this).val()=="") return $(this); }).length;
            if(checkEmptyInput>0) {
            e.preventDefault();
            $(this).find("input[type=text]:visible").filter(function() { if($(this).val()=="") return $(this); })[0].focus();
            return false;
            }
            else{
            Swal.fire({
                title: 'ADDED!',
                text: "Documents added to records",
                icon: 'success'
            })
            }
});
});

// Checkbox
 $("#selectAll").change(function(){ //"select all" change 
    $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status 
});
    $('.checkbox').change(function(){ //uncheck "select all", if one of the listed checkbox item is unchecked 
        if(false == $(this).prop("checked")){  //if this item is unchecked
            $("#selectAll").prop('checked', false);  //change "select all" checked status to false
        }
        if ($('.checkbox:checked').length == $('.checkbox').length ){ //check "select all" if all checkbox items are checked
            $("#selectAll").prop('checked', true);
        }
    });
$('#job-offers').addClass('active');
$("#checkItem").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
});
// end Checkbox

$('#selectAll').on('click', function(e) {
        if($(this).is(':checked',true))  
        {
            $(".sub_chk").prop('checked', true);  
        } else {  
            $(".sub_chk").prop('checked',false);  
        }  
});

$('.delete_all').on('click', function(e) {
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });  
    if(allVals.length <=0)  
    {  
        Swal.fire(
        "Please select Document", 
        "", 
        "error"
        )
    } else {  
        console.log(allVals);
        Swal.fire({
        title: 'DELETE CONFIRMATION',
        text: 'You are about to delete a document',
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