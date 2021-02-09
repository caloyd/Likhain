$(document).ready(function() {
    $('#jobPost').DataTable(  
        {
           "fnDrawCallback": function(oSettings) {
            var totalPages = this.api().page.info().pages;
            if(totalPages <= 1){ 
                jQuery('.dataTables_paginate').hide(); 
            }
            else { 
                jQuery('.dataTables_paginate').show(); 
            }
            }  
        }
    )
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

// DELETE MODAL
$(".btnDeleteJobPost").click(function(event){
    var id = $(this).attr('data-id');
    var title = $(this).attr('data-title');
    event.preventDefault();
    Swal.fire({
        title: 'DELETE CONFIRMATION',
        text: 'You are about to delete a job post - ' + title,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'CONFIRM'
        }).then((result) => {
            if (result.value) {
            Swal.fire(
            'DELETED',
            'Job post deleted',
            'success'
            ).then((isOkay)=> {
                $('#deleteJobPost'+id).submit();
            })
        }
    })
});
// end DELETE MODAL

$('#job-post').addClass('active');

$('#viewJobPost').on('show.bs.modal',function(e){
let title = $(e.relatedTarget).data('jobposttitle');
$(this).find('.modal-body #job_title').val(title);
});

$('#viewJobPost').on('show.bs.modal',function(e){
let type = $(e.relatedTarget).data('emptype');
$(this).find('.modal-body #employment_type').val(type);
});

$('#viewJobPost').on('show.bs.modal',function(e){
let poslevel = $(e.relatedTarget).data('poslevel');
$(this).find('.modal-body #position_level').val(poslevel);
});

$('#viewJobPost').on('show.bs.modal',function(e){
let jobspec = $(e.relatedTarget).data('jobspec');
$(this).find('.modal-body #job_specialization').val(jobspec);
});

$('#viewJobPost').on('show.bs.modal',function(e){
let jobloc = $(e.relatedTarget).data('joblocation');
$(this).find('.modal-body #job_location').val(jobloc);
});

$('#viewJobPost').on('show.bs.modal',function(e){
let educlevel = $(e.relatedTarget).data('educlevel');
$(this).find('.modal-body #educ_level').val(educlevel);
}); 

$('#viewJobPost').on('show.bs.modal',function(e){
let yrsexp  = $(e.relatedTarget).data('yrsexp');
$(this).find('.modal-body #yrs_exp').val(yrsexp);
}); 

$('#viewJobPost').on('show.bs.modal',function(e){
let skill = $(e.relatedTarget).data('skill');
$(this).find('.modal-body #skill').val(skill);
}); 

$('#viewJobPost').on('show.bs.modal',function(e){
let recperiod = $(e.relatedTarget).data('recperiod');
$(this).find('.modal-body #rec_period').val(recperiod);
});

$('#viewJobPost').on('show.bs.modal',function(e){
let salmin = $(e.relatedTarget).data('salmin');
$(this).find('.modal-body #salmin').val(salmin);
});

$('#viewJobPost').on('show.bs.modal',function(e){
let salmax = $(e.relatedTarget).data('salmax');
$(this).find('.modal-body #salmax').val(salmax);
});

$('#viewJobPost').on('show.bs.modal',function(e){
    let desc = $(e.relatedTarget).data('desc');
    $(this).find('.modal-body #desc').val(desc);
});

$('#job_title').attr('disabled',true);
$('#employment_type').attr('disabled',true);
$('#position_level').attr('disabled',true);
$('#job_specialization').attr('disabled',true);
$('#job_location').attr('disabled',true);
$('#educ_level').attr('disabled',true);
$('#yrs_exp').attr('disabled',true);
$('#skill').attr('disabled',true);
$('#rec_period').attr('disabled',true);
$('#salmin').attr('disabled',true);
$('#salmax').attr('disabled',true);

$(document).ready(function () {

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
        "Please select Job Post", 
        "", 
        "error"
        )
    } else {  
        console.log(allVals);
        //var check = confirm("Are you sure you want to delete this row?"); 
        Swal.fire({
        title: 'DELETE CONFIRMATION',
        text: 'You are about to delete a job post/s',
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

