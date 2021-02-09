// Profile Blade
// add skill
var counter = 0
$("#btnAddSkill").click(function(){
    if($('#skillName').val() == ''){
        Swal.fire(
            "Please input a skill", 
            "", 
            "error"
        )
    } else {
        counter++
        var years_exp = ['0 - 2', '2 - 3', '3 - 5', '5 - 8', '8 - 10']
        var skill = $("#skillName").val();
        var html = ''
        html += '<div class="row my-3 show" id="rmsk'+counter+'"><div class="col-md-3"><label id="sklnm'+counter+'" skill-id="'+counter+'">'+skill+'</label></div><div class="col-md-3 w-50"><select id="yearsExp'+counter+'" class="form-control">'
        for (let i = 0; i < years_exp.length; i++) {
            html += '<option value="'+years_exp[i]+'">'+years_exp[i]+' Years of Experience</option>'
        }
        html += '</select></div><div class="col-md-1 mt-1"><button type="button" class="btn btn-sm btn-danger rmSkill" data-id="rmsk'+counter+'"><i class="fas fa-times"></i></button></div></div>'
        
        $("#skill").append(html);
        $("#skillName").val("")
    }
});

// applicant preview template
$(document).ready(function(){
    $('.changeTemplate').click( function() {
        let id = $(this).data('id')
        $('.template').addClass('d-none')
        $('#'+id).removeClass('d-none')
    })
    $('#check1').click( function() {
        $('.gender').toggleClass('d-none')
    })
    $('#check2').click( function() {
        $('.birthdate').toggleClass('d-none')
    })
    $('#btnAddEduc').click(function(){
        $(this).addClass('d-none');
        $('.shw-education').addClass('d-none');
        $('#newEducation').removeClass('d-none');
    });

    $(document).on('click', '#btnAddSalary',function(){
        $(this).addClass('d-none');
        // $('.shw-salary').addClass('d-none');
        $('#newSalary').removeClass('d-none');
    });

    $('#btnAddWorkExp').click(function(){
        $(this).addClass('d-none');
        $('.shw-workexp').addClass('d-none');
        $('#newWorkExp').removeClass('d-none');
    });

    // SALARY REGEX
    function setInputFilter(textbox, inputFilter) {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
            textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
            });
        });
    }
    //end SALARY REGEX 
});

$(document).ready(function() {
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
        $('#btnSaveImage').removeClass('d-none');
    });

    $(".upload-button").on('click', function() {
        $(".file-upload").click();
    });
    
    // ADD EDUCATION DATE RANGE
    $('#startDate').datetimepicker({
        format: 'Y-m-d',
        timepicker: false,
        onShow: function(ct){
            this.setOptions({
                maxDate: $('#endDate').val()?jQuery('#endDate').val():false
            });
        }
    });

    $('#endDate').datetimepicker({
        format: 'Y-m-d',
        timepicker: false,
        onShow: function(ct){
            this.setOptions({
                minDate: $('#startDate').val()?jQuery('#startDate').val():false
            });
        }
    });
    // end ADD EDUCATION DATE RANGE

    // ADD WORK EXP DATE RANGE
    $('#workStartDate').datetimepicker({
        format: 'Y-m-d',
        timepicker: false,
        onShow: function(ct){
            this.setOptions({
                maxDate: $('#workEndDate').val()?jQuery('#workEndDate').val():false
            });
        }
    });

    $('#workEndDate').datetimepicker({
        format: 'Y-m-d',
        timepicker: false,
        onShow: function(ct){
            this.setOptions({
                minDate: $('#workStartDate').val()?jQuery('#workStartDate').val():false
            });
        }
    });
    // end ADD WORK EXP DATE RANGE

    // UPDATE EDUCATION DATE RANGE
    $('#date input').each(function(){
        var id = $(this).attr('data-id');
        $('input#newStartDate'+id).datetimepicker({
            format: 'Y/m/d',
            timepicker: false,
            onShow: function(ct){
                this.setOptions({
                    maxDate: $('#newEndDate'+id).val()?jQuery('#newEndDate'+id).val():false
                });
            }
        });

        $('input#newEndDate'+id).datetimepicker({
            format: 'Y/m/d',
            timepicker: false,
            onShow: function(ct){
                this.setOptions({
                    minDate: $('#newStartDate'+id).val()?jQuery('#newStartDate'+id).val():false
                });
            }
        });
    })
    // end UPDATE EDUCATION DATE RANGE

    // UPDATE WORK EXP DATE RANGE
    $('#workDate input').each(function(){
        var id = $(this).attr('data-id');
        $('input#workNewStartDate'+id).datetimepicker({
            format: 'Y/m/d',
            timepicker: false,
            onShow: function(ct){
                this.setOptions({
                    maxDate: $('#workNewEndDate'+id).val()?jQuery('#workNewEndDate'+id).val():false
                });
            }
        });

        $('input#workNewEndDate'+id).datetimepicker({
            format: 'Y-m-d',
            timepicker: false,
            onShow: function(ct){
                this.setOptions({
                    minDate: $('#workNewStartDate'+id).val()?jQuery('#workNewStartDate'+id).val():false
                });
            }
        });
    })
    // end UPDATE WORK EXP DATE RANGE
});


setTimeout(function() {
    $('#divUploaded').fadeOut('fast');
}, 5000);

$('#profile').addClass('active');

