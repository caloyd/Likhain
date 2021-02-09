$(document).ready(function() {
    $('#companyPostalCode').mask('0000',{'translation': {0: {pattern: /[0-9*]/}}});
    $('#contactNumber').mask('0000-000-0000',{'translation': {0: {pattern: /[0-9*]/}}});
    var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.profile-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
    }
    $(".file-upload").on('change', function(){
            readURL(this);
        });

    $('#industry').select2({
        theme: 'bootstrap4',
        placeholder: "Select industry"
    })

    $('#companyCity').select2({
        theme: 'bootstrap4',
        placeholder: "Select City"
    })

    $('#companyCountry').select2({
        theme: 'bootstrap4',
        placeholder: "Select Country"
    })

    $('#country').select2({
        theme: 'bootstrap4'
    })

    $('#dressCode').select2({
        theme: 'bootstrap4',
        placeholder: "Dress code"
    })

    $('#companySize').select2({
        theme: 'bootstrap4',
        placeholder: "Company Size"
    })

    $('#workingHours').select2({
        theme: 'bootstrap4',
        placeholder: "Working Hours"
    })

    $('#workingHours').change(function(){
        var workHours = $('#workingHours').val();
        console.log(workHours);

        if(workHours == 'Others'){
            $('#txtWorkHours').removeClass('d-none');
        }else{
            $('#txtWorkHours').addClass('d-none');
        }
    });


    $('#benefits').select2({
        theme: 'bootstrap4',
        placeholder: "Benefits"
    })

    $('#benefits').select2({
        theme: 'bootstrap4',
        placeholder: "Benefits",
        tags: true,
        createTag: function (params) {
            var term = $.trim(params.term);
            if (term === ''){
            return null;
            }
            return {
            id: term,
            text: term,
            newTag: true // add additional parameters
            }
        }
    })
    
    $('#spoken-language').select2({
        theme: 'bootstrap4',
        placeholder: "Spoken Language"
    })      
           
    $('#btnCancelCompanyDetails').click(function(){
        $('.form-control').val("");
    });

    $('#accnt-sidebar').addClass('menu-open');
    $('#accnt-sett').addClass('active');
    $('#company-details').addClass('active');
});

$(function () {
    $("#fullLocation").attr('readonly', 'readonly');

    $('#fullLocation').val($('#companyCity option:selected').val() + ' ' + $('#companyCountry').val());
    $('#fullLocation').val($('#companyCity option:selected').val() + ' ' + $('#companyCountry').val());

    $('#companyCity, #companyCountry').bind('change keyup keydown', function () {
        $('#fullLocation').val($('#companyCity option:selected').text() + ',' + $('#companyCountry').val());
    });
});

$("#btnSaveCompanyDetails").on('click', function(e) {
    e.preventDefault();
    var checkEmptyInput = $('#companyDetailsForm').find("input[type=text]:visible,textarea:visible").filter(function() { if($(this).val()=="") return $(this); }).length;
    if(checkEmptyInput>0) {
        Swal.fire({
            title: 'Please complete the fields',
            icon: 'info'
        });
        $('#companyDetailsForm').find("input[type=text]:visible,textarea:visible").filter(function() { if($(this).val()=="") return $(this); })[0].focus();
    }
    else {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to save changes of company details",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#c2c2c2',
            confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                'SAVED!',
                'Successfully saved changes',
                'success'
                ).then((isOkay) => {
                    $('#companyDetailsForm').submit();
                })
            }
            })

            var tato = $("#benefits").val()
            console.warn(tato);
            var tatoes = tato.join(", ")
            console.info(tatoes);
            var tatos = $('#outputBenefits').append(tatoes)
            console.log(tatos);
            var lang= $('#spoken-language').val()
            console.log(lang);
            var langs = lang.join(", ")
            console.log(langs);
            var language = $('#outputLanguage').append(langs);
    }
});