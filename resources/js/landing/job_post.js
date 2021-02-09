
        $(document).ready(function () {

        $("#filterLocation, #filterJobLevel, #filterEmploymentType, #filterJobFunction, #filterEducation, #filterCompany").selectpicker({
            multiple:true,
            actionsBox: true
        });

        $('#filterLocation, #filterJobLevel, #filterEmploymentType, #filterJobFunction, #filterEducation, #filterCompany').change(function(){
            $('#filterBadge').html('');

            var values = $('#filterLocation').val();
            var valuesJobLevel = $('#filterJobLevel').val();
            var valuesEmploymentType = $('#filterEmploymentType').val();
            var valuesJobFunction = $('#filterJobFunction').val();
            var valuesEducation = $('#filterEducation').val();
            var valuesCompany = $('#filterCompany').val();

            for(var i = 0; i < values.length; i += 1) {
                $('#filterBadge').append("<p class='removeable bg-tags align-middle p-2 rounded m-2'><span class='text-primary'>LOCATION: </span><span class='location'>" + values[i] + "</span> <i class='fas fa-times pointer'> </i> </p>")
            }
            for(var j = 0; j < valuesJobLevel.length; j += 1) {
                $('#filterBadge').append("<p class='job-level bg-tags align-middle p-2 rounded m-2'><span class='text-primary'>JOB POSITION: </span> <span class='jobLevel'>" + valuesJobLevel[j] + "</span> <i class='fas fa-times pointer'> </i> </p>")
            }
            for(var k = 0; k < valuesEmploymentType.length; k += 1) {
                $('#filterBadge').append("<p class='employment-type bg-tags align-middle p-2 rounded m-2'><span class='text-primary'>EMPLOYMENT TYPE: </span> <span class='employmentType'>" + valuesEmploymentType[k] + "</span> <i class='fas fa-times pointer'> </i> </p>")
            }
            for(var l = 0; l < valuesJobFunction.length; l += 1) {
                $('#filterBadge').append("<p class='job-function bg-tags align-middle p-2 rounded m-2'><span class='text-primary'>JOB FUNCTION: </span> <span class='jobFunction'>" + valuesJobFunction[l] + "</span> <i class='fas fa-times pointer'> </i> </p>")
            }
            for(var m = 0; m < valuesEducation.length; m += 1) {
                $('#filterBadge').append("<p class='education bg-tags align-middle p-2 rounded m-2'><span class='text-primary'>EDUCATION: </span> <span class='educationFilter'>" + valuesEducation[m] + "</span> <i class='fas fa-times pointer'> </i> </p>")
            }
            for(var n = 0; n < valuesCompany.length; n += 1) {
                $('#filterBadge').append("<p class='company bg-tags align-middle p-2 rounded m-2'><span class='text-primary'>COMPANY: </span> <span class='companyFilter'>" + valuesCompany[n] + "</span> <i class='fas fa-times pointer'> </i> </p>")
            }
        });

        // REMOVE LOCATION
        $("#filterBadge").on('click','.removeable',function(){
            $(this).remove(); //this removes the item from the screen
            var foo = $(this);
            $('#filterLocation').find('[value="'+foo.find('.location').html()+'"]').prop('selected', false);
            $values = $('#filterLocation').val();
            $('#filterLocation').selectpicker('deselectAll');
            $('#filterLocation').selectpicker('val', $values);
        });
            // end REMOVE LOCATION

            // REMOVE JOB LEVEL
            $("#filterBadge").on('click','.job-level',function(){
                $(this).remove(); //this removes the item from the screen
                var foo = $(this);
                $('#filterJobLevel').find('[value="'+foo.find('.jobLevel').html()+'"]').prop('selected', false);
                $values = $('#filterJobLevel').val();
                $('#filterJobLevel').selectpicker('deselectAll');
                $('#filterJobLevel').selectpicker('val', $values);
            });
            // end REMOVE JOB LEVEL

            // REMOVE EMPLOYMENT TYPE
            $("#filterBadge").on('click','.employment-type',function(){
                $(this).remove(); //this removes the item from the screen
                var foo = $(this);
                $('#filterEmploymentType').find('[value="'+foo.find('.employmentType').html()+'"]').prop('selected', false);
                $values = $('#filterEmploymentType').val();
                $('#filterEmploymentType').selectpicker('deselectAll');
                $('#filterEmploymentType').selectpicker('val', $values);
            });
            // end REMOVE EMPLOYMENT TYPE

            // REMOVE JOB FUNCTION
            $("#filterBadge").on('click','.job-function',function(){
                $(this).remove(); //this removes the item from the screen
                var foo = $(this);
                $('#filterJobFunction').find('[value="'+foo.find('.jobFunction').html()+'"]').prop('selected', false);
                $values = $('#filterJobFunction').val();
                $('#filterJobFunction').selectpicker('deselectAll');
                $('#filterJobFunction').selectpicker('val', $values);
            });
            // end REMOVE JOB FUNCTION

            // REMOVE EDUCATION
            $("#filterBadge").on('click','.education',function(){
                $(this).remove(); //this removes the item from the screen
                var foo = $(this);
                $('#filterEducation').find('[value="'+foo.find('.educationFilter').html()+'"]').prop('selected', false);
                $values = $('#filterEducation').val();
                $('#filterEducation').selectpicker('deselectAll');
                $('#filterEducation').selectpicker('val', $values);
            });
            // end REMOVE EDUCATION

            // REMOVE COMPANY
            $("#filterBadge").on('click','.company',function(){
                $(this).remove(); //this removes the item from the screen
                var foo = $(this);
                $('#filterCompany').find('[value="'+foo.find('.companyFilter').html()+'"]').prop('selected', false);
                $values = $('#filterCompany').val();
                $('#filterCompany').selectpicker('deselectAll');
                $('#filterCompany').selectpicker('val', $values);
            });
            // end REMOVE COMPANY
        });
