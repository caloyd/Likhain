@extends('applicant.layout.layout')

@section('title', 'APPLICANT - Dashboard')

@section('content_header')
    <h1>Job Board</h1>
    <hr>
@endsection

@section('content')
    {{-- SEARCHBAR --}}
        <div class="col-md-10 offset-md-1 mb-40">
            <form action="/search" method="get" id="searchForm">
                <div class="input-group">
                    <input type="search" name="search_text" id="search_text" class="form-control" placeholder="Search for job title, keywords, or company..." autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            {{-- BADGE FILTERS --}}
            <div class="row mt-3 bg-none">
                <div class="col-md-2 form-group">
                    <select class="form-control filter" id="filterLocation" multiple="multiple" title="Location" data-selected-text-format="count > 0" data-live-search="true" data-style="btn-success" data-size="10">
                        <option value="Caloocan City">Caloocan City</option>
                        <option value="Las Piñas City">Las Piñas City</option>
                        <option value="Makati City">Makati City</option>
                        <option value="Malabon City">Malabon City</option>
                        <option value="Mandaluyong City">Mandaluyong City</option>
                        <option value="Manila City">Manila City</option>
                        <option value="Marikina City">Marikina City</option>
                        <option value="Muntinlupa City">Muntinlupa City</option>
                        <option value="Navotas City">Navotas City</option>
                        <option value="Parañaque City">Parañaque City</option>
                        <option value="Pasay City">Pasay City</option>
                        <option value="Pasig City">Pasig City</option>
                        <option value="Quezon City">Quezon City</option>
                        <option value="San Juan City">San Juan City</option>
                        <option value="Taguig City">Taguig City</option>
                        <option value="Valenzuela City">Valenzuela City</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <select class="form-control filter" multiple="multiple" id="filterJobLevel" title="Job Level" data-selected-text-format="count > 0" data-live-search="true" data-style="btn-success" data-size="10">
                        <option value="Internship / OJT">Internship / OJT</option>
                        <option value="Fresh Grad / Entry Level">Fresh Grad / Entry Level</option>
                        <option value="Associate / Supervisor">Associate / Supervisor</option>
                        <option value="Mid-Senior Level / Manager">Mid-Senior Level / Manager</option>
                        <option value="Director / Executive">Director / Executive</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <select class="form-control filter" multiple="multiple" id="filterEmploymentType" title="Employment Type" data-selected-text-format="count > 0" data-live-search="true" data-style="btn-success" data-size="10">
                        <option value="Full-time">Full time</option>
                        <option value="Part-time">Part time</option>
                        <option value="Freelance">Freelance</option>
                        <option value="Contractual">Contractual</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <select class="form-control filter" multiple="multiple" id="filterJobFunction" title="Job Function" data-selected-text-format="count > 0" data-live-search="true" data-style="btn-success" data-size="10">
                        <option value="Arts and Media">Arts and Media</option>
                        <option value="Accounting and Finance">Accounting and Finance</option>
                        <option value="Administration and Coordination">Administration and Coordination</option>
                        <option value="Architecture and Engineering">Architecture and Engineering</option>
                        <option value="Arts and Sports">Arts and Sports</option>
                        <option value="Customer Service Representative">Customer Service Representative</option>
                        <option value="Education and Training">Education and Training</option>
                        <option value="General Services">General Services</option>
                        <option value="Health and Medical">Health and Medical</option>
                        <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="IT and Software">IT and Software</option>
                        <option value="Legal">Legal</option>
                        <option value="Management and Consultancy">Management and Consultancy</option>
                        <option value="Manufacturing and Production">Manufacturing and Production</option>
                        <option value="Media and Creatives">Media and Creatives</option>
                        <option value="Public Service and NGOs">Public Service and NGOs</option>
                        <option value="Safety and Security">Safety and Security</option>
                        <option value="Sales and Marketing">Sales and Marketing</option>
                        <option value="Sciences">Sciences</option>
                        <option value="Supply Chain">Supply Chain</option>
                        <option value="Writing and Content">Writing and Content</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <select class="form-control filter" multiple="multiple" id="filterEducation" title="Education" data-selected-text-format="count > 0" data-live-search="true" data-style="btn-success" data-size="10">
                        <option value="High school undergraduate">High school undergraduate</option>
                        <option value="High school graduate">High school graduate</option>
                        <option value="Vocational undergraduate">Vocational undergraduate</option>
                        <option value="Vocation graduate">Vocation graduate</option>
                        <option value="Bachelor undergraduate">Bachelor undergraduate</option>
                        <option value="Bachelor graduate">Bachelor graduate</option>
                        <option value="Master's Studies">Master's Studies</option>
                        <option value="Master's Degree">Master's Degree</option>
                        <option value="Doctorate Studies">Doctorate Studies</option>
                        <option value="Doctorate Degree">Doctorate Degree</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <select class="form-control filter" multiple="multiple" id="filterCompany" title="Company" data-selected-text-format="count > 0" data-live-search="true" data-style="btn-success" data-size="10">
                        <option value="0">Verified</option>
                        <option value="1">Unverified</option>
                    </select>
                </div>
            </div>

        <div class="row mb-3" id="filterBadge">
            <p class="pointer d-none" id="clear"><span class="fas fa-times mr-2"></span>CLEAR</p>
        </div>
    {{-- end SEARCHBAR --}}

    {{-- SORT BY --}}
    <div class="form-group col-md-3 offset-md-9 px-0">
        <form action="{{url ('/applicant/dashboard')}}" id="sort" method="POST">
            @csrf
            <select name="sortBy" id="sortBy" class="form-control" data-role="sort">

                <option value="Freshness" selected>Freshness - Newest to oldest</option>
                <option value="AtoZ">Alphabetical - A to Z</option>
                <option value="Salary">Salary - Highest to lowest</option>
            </select>
        </form>
    </div>
    {{-- end SORT BY --}}

    {{-- JOB POSTS --}}
    {{-- From  ApplicantController --}}
    <div id="posts">

    </div>

    {{-- end JOB POSTS --}}
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/applicant_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/landing_page.css')}}">
@endsection

@section('js')
    <script>
        $('#dashboard').addClass('active');
        $(document).ready(function () {
            var searchJSON = {}
            fetchJobPosts(searchJSON)

            $(".filter").selectpicker({
                multiple:true,
                actionsBox: true
            });
            // #filterLocation, #filterJobLevel, #filterEmploymentType, #filterJobFunction, #filterEducation, #filterCompany
            $('.filter').change(function(){
                $('#filterBadge').html('');

                var values = $('#filterLocation').val();
                var valuesJobLevel = $('#filterJobLevel').val();
                var valuesEmploymentType = $('#filterEmploymentType').val();
                var valuesJobFunction = $('#filterJobFunction').val();
                var valuesEducation = $('#filterEducation').val();
                var valuesCompany = $('#filterCompany').val();

                for(var i = 0; i < values.length; i += 1) {
                    $('#filterBadge').append("<p class='removeable bg-tags align-middle p-2 rounded m-2 pointer'><span class='text-primary'>LOCATION: </span><span class='location'>" + values[i] + "</span> <i class='fas fa-times pointer'> </i> </p>")
                }
                for(var j = 0; j < valuesJobLevel.length; j += 1) {
                    $('#filterBadge').append("<p class='job-level bg-tags align-middle p-2 rounded m-2 pointer'><span class='text-primary'>JOB POSITION: </span> <span class='jobLevel'>" + valuesJobLevel[j] + "</span> <i class='fas fa-times pointer'> </i> </p>")
                }
                for(var k = 0; k < valuesEmploymentType.length; k += 1) {
                    $('#filterBadge').append("<p class='employment-type bg-tags align-middle p-2 rounded m-2 pointer'><span class='text-primary'>EMPLOYMENT TYPE: </span> <span class='employmentType'>" + valuesEmploymentType[k] + "</span> <i class='fas fa-times pointer'> </i> </p>")
                }
                for(var l = 0; l < valuesJobFunction.length; l += 1) {
                    $('#filterBadge').append("<p class='job-function bg-tags align-middle p-2 rounded m-2 pointer'><span class='text-primary'>JOB FUNCTION: </span> <span class='jobFunction'>" + valuesJobFunction[l] + "</span> <i class='fas fa-times pointer'> </i> </p>")
                }
                for(var m = 0; m < valuesEducation.length; m += 1) {
                    $('#filterBadge').append("<p class='education bg-tags align-middle p-2 rounded m-2 pointer'><span class='text-primary'>EDUCATION: </span> <span class='educationFilter'>" + valuesEducation[m] + "</span> <i class='fas fa-times pointer'> </i> </p>")
                }
                for(var n = 0; n < valuesCompany.length; n += 1) {
                    var text = valuesCompany[n] == '0'? 'Verified': 'Unverified'
                    $('#filterBadge').append("<p class='company bg-tags align-middle p-2 rounded m-2 pointer'><span class='text-primary'>COMPANY: </span> <span class='companyFilter'>" + text + "</span> <i class='fas fa-times pointer'> </i> </p>")
                }
                ////////////////////////
                // VALUES FOR FILTER //
                //////////////////////

                searchJSON.location = values;
                searchJSON.jobLevel = valuesJobLevel;
                searchJSON.employmentType = valuesEmploymentType;
                searchJSON.jobFunction = valuesJobFunction;
                searchJSON.education = valuesEducation;
                searchJSON.company = valuesCompany;
                console.log(searchJSON);
                fetchJobPosts(searchJSON)

            });

            $(document).on('click', '.saveJobs', function(){
                var post_id = $(this).attr('id')
                Swal.fire({
                    title: 'Are you sure',
                    text: "You want to save this job?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#c2c2c2',
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '{{ URL("/add-save-job") }}/',
                            data: {_token: '{{csrf_token()}}', post_id: post_id},
                            type: 'POST',
                            dataType: 'json',
                            success:function(response){
                                console.log(response)
                                fetchJobPosts(searchJSON)
                                if (response.saved) {
                                    Swal.fire({
                                        text: response.saved,
                                        icon: 'info',
                                    })
                                }
                                if (response.success) {
                                    Swal.fire(
                                        'Saved!',
                                        response.success,
                                        'success',
                                    )
                                }
                            }
                        })
                    }
                })
            })

            function fetchJobPosts(search_data){
                $.ajax({
                    url: '{{ url("/advance-search") }}',
                    data: search_data,
                    type: 'GET',
                    dataType: 'json',
                    success:function(data) {
                        var html = ''
                        data.forEach(item => {
                            html += '<div class="card my-20"><div class="card-body"><div class="row"><div class="col-md-2 text-center">'
                            if(item.company_logo_path){
                                html += '<a href="/applicant/company-details/'+item.company_id+'"><img src="/'+item.company_logo_path+'" class="img-fluid" width="200" height="200"></a></div>'
                            }else{
                                html += '<img src="{{asset("img/companies/def-logo-company.png")}}" class="img-fluid" width="200" height="200"></div>'
                            }
                            html += '<div class="col-md-10"><strong class="col-md-6"><h5 class="mb-0 searchKey row"><a href="/applicant/view-job-post/'+item.job_post_id+'" style="color: black;">'+item.title+'</strong></a> <small class="col-md-6" style="justify-content: flex-end; display: flex;"> Posted ' +  moment(item.created_at).format("MMMM Do, YYYY") + '</small></h5><a href="/applicant/company-details/'+item.company_id+'"><p class="searchKey">'+item.company_name+'</a>'
                            if(item.company_status == '0')
                            {
                                html += '<i class="fa fa-check-circle ml-2 text-success" title="Verified company"></i></p>'
                            }
                            else{
                                html += '<br>'+item.address+'</p>'
                            }
                            html += '<p class="card-text searchKey">'+item.description+'</p></div></div><div class="modal-footer modified"><a href="/applicant/view-job-post/'+item.job_post_id+'" class="btn btn-primary"><i class="fas fa-eye mr-2"></i>View Details</a><button type="button" class="btn btn-info saveJobs" id="'+item.job_post_id+'"><i class="fas fa-bookmark mr-2"></i>Save</button></div></div></div>'
                        })
                        $('#posts').html(html)
                    },
                    error:function(error) {
                        console.log(error)
                    }
                })
            }

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

            $("#sortBy").change(function(){
                var sortVal = $(this).val();
                searchJSON.asc = null;
                if (sortVal == 'AtoZ') {
                    searchJSON.filter = 'job_posts.title';
                    searchJSON.asc = 'asc'
                }
                if (sortVal == 'Salary') {
                    searchJSON.filter = 'job_posts.salary_range_maximum';
                }
                if (sortVal == 'Freshness') {
                    searchJSON.filter = 'job_posts.created_at';
                }
                fetchJobPosts(searchJSON)
            });

            $('#searchForm').submit( function(e){
                e.preventDefault();
                var searchKeyword = $('#search_text').val()
                searchJSON.search = searchKeyword
                fetchJobPosts(searchJSON)
            })

            $('#search_text').keyup( function(e){
                e.preventDefault();
                searchJSON.search = $(this).val();
                fetchJobPosts(searchJSON)
            })
        });
    </script>
@endsection
