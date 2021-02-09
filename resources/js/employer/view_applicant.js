$('#recruiterContact').mask('00000000000',{'translation': {0: {pattern: /[0-9*]/}}});
    
$(".btnDelete").click(function(event){
    var id = $(this).attr('data-id');
    event.preventDefault();
    Swal.fire({
        title: 'DELETE CONFIRMATION',
        text: 'Are you sure you want to delete Applicant?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'CONFIRM'
    }).then((result) => {
        if (result.value) {
        Swal.fire(
        'DELETED',
        'Applicant deleted',
        'success'
        ).then((isOkay) => {
            $('#deleteApplicant'+id).submit();
        })
        }
    })
});

$("#btnSetInterview").on('click', function(e) {
        e.preventDefault();
        var checkEmptyInput1 = $('#setInterviewForm').find("input[type=text]:visible,textarea:visible").filter(function() { if($(this).val()=="") return $(this); }).length;
        if(checkEmptyInput1>0) {
            Swal.fire({
                title: 'Please complete the fields',
                icon: 'info'
            });
            $('#setInterviewForm').find("input[type=text]:visible,textarea:visible").filter(function() { if($(this).val()=="") return $(this); })[0].focus();
            // return false;
        }
        else
        {
            Swal.fire(
                'SUCCESS!',
                'Interview Set!',
                'success')
            .then((isOkay) => {
                $('#setInterviewForm').submit();
            })
        }
    });

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

var dateToday = new Date();
$('#interviewDate').datetimepicker({
format: 'L',
minDate: dateToday.setDate(dateToday.getDate()+1)
});

$('#startTime, #endTime').datetimepicker({
format: 'hh:mm A'
});

$('#setInterview').on('show.bs.modal',function(e){
    let app = $(e.relatedTarget).data('applicantid');
    $(this).find('.modal-body #applicant_id_int').val(app);
});

$('#setInterview').on('show.bs.modal',function(e){
    let jbid = $(e.relatedTarget).data('jobpostid');
    $(this).find('.modal-body #job_post_id').val(jbid);
});

$('#setInterview').on('show.bs.modal',function(e){
    let fname = $(e.relatedTarget).data('fname');
    $(this).find('.modal-header #appFirstName').text(fname);
});

$('#setInterview').on('show.bs.modal',function(e){
    let lname = $(e.relatedTarget).data('lname');
    $(this).find('.modal-header #appLastName').text(lname);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let appfname = $(e.relatedTarget).data('appfname');
    $(this).find('.modal-header #applicantModalLabelFirst').text(appfname);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let applname = $(e.relatedTarget).data('applname');
    $(this).find('.modal-header #applicantModalLabelLast').text(applname);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let email = $(e.relatedTarget).data('email');
    $(this).find('.modal-body #email').text(email);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let contact = $(e.relatedTarget).data('contact');
    $(this).find('.modal-body #contact').text(contact);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let expsalary = $(e.relatedTarget).data('expsalary');
    $(this).find('.modal-body #expSalary').text(expsalary);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let school = $(e.relatedTarget).data('school');
    $(this).find('.modal-body #school').text(school);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let course = $(e.relatedTarget).data('course');
    $(this).find('.modal-body #course').text(course);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let datefrom = $(e.relatedTarget).data('datefrom');
    $(this).find('.modal-body #dateFrom').text(datefrom);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let dateto = $(e.relatedTarget).data('dateto');
    $(this).find('.modal-body #dateTo').text(dateto);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let educattainment = $(e.relatedTarget).data('educattainment');
    $(this).find('.modal-body #educ').text(educattainment);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let jobtitle = $(e.relatedTarget).data('jobtitle');
    $(this).find('.modal-body #jobTitle').text(jobtitle);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let companyName = $(e.relatedTarget).data('company');
    $(this).find('.modal-body #companyName').text(companyName);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let datebegin = $(e.relatedTarget).data('begin');
    $(this).find('.modal-body #begin').text(datebegin);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let dateend = $(e.relatedTarget).data('end');
    $(this).find('.modal-body #end').text(dateend);
});

$('#viewApplicant').on('show.bs.modal',function(e){
    let salary = $(e.relatedTarget).data('salary');
    $(this).find('.modal-body #salary').text(salary);
});

$('#viewApplicant').on('show.bs.modal',function(e){
let skill = $(e.relatedTarget).data('skills');
$(this).find('.modal-body #skill').text(skill);
});

$('#viewApplicant').on('show.bs.modal',function(e){
let pitch = $(e.relatedTarget).data('pitch');
$(this).find('.modal-body #pitch').text(pitch);
});

$('#job-post').addClass('active');