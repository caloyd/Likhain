{{-- JOB POST SEARCHBAR --}}
<div class="row mx-auto mb-40">
    <div class="col-md-10 offset-md-1">
        <form class="row mb-20" action="/searchJob" method="GET" id="searchJob">
            <div class="col-md-5">
                <label>what</label>
            </div>
            <div class="col-md-7">
                <label>where</label>
            </div>

            <div class="col-md-5">
                <input class="form-control" type="search" name="what" placeholder="job title, skills, company..." id="what" autocomplete="off">
            </div>
            <div class="col-md-5">
                <input class="form-control" type="search" name="where" placeholder="city, state, zip code..." id="where" autocomplete="off">
            </div>
            <div class="col-md-2 my-1">
                <button type="submit" class="btn btn-primary btn-block">Search<i class="fa fa-search ml-2"></i>
                </button>
            </div>
        </form>
        <div class="row">
            <div class="col-md-2 form-group">
                <select class="form-control filter" id="filterLocation" multiple="multiple" title="Location" data-selected-text-format="count > 0" data-live-search="true" data-style="btn-secondary-modified" data-size="10">
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
                <select class="form-control filter" multiple="multiple" id="filterJobLevel" title="Job Level" data-selected-text-format="count > 0" data-live-search="true" data-style="btn-secondary-modified" data-size="10">
                    <option value="Internship / OJT">Internship / OJT</option>
                    <option value="Fresh Grad / Entry Level">Fresh Grad / Entry Level</option>
                    <option value="Associate / Supervisor">Associate / Supervisor</option>
                    <option value="Mid-Senior Level / Manager">Mid-Senior Level / Manager</option>
                    <option value="Director / Executive">Director / Executive</option>
                </select>
            </div>
            <div class="col-md-2 form-group">
                <select class="form-control filter" multiple="multiple" id="filterEmploymentType" title="Employement Type" data-selected-text-format="count > 0" data-live-search="true" data-style="btn-secondary-modified" data-size="10">
                    <option value="Full time">Full time</option>
                    <option value="Fresh Grad / Entry Level">Fresh Grad / Entry Level</option>
                    <option value="Part time">Part time</option>
                    <option value="Freelance">Freelance</option>
                    <option value="Contractual">Contractual</option>
                </select>
            </div>
            <div class="col-md-2 form-group">
                <select class="form-control filter" multiple="multiple" id="filterJobFunction" title="Job Function" data-selected-text-format="count > 0" data-live-search="true" data-style="btn-secondary-modified" data-size="10">
                    <option value="Full time">Arts and Media</option>
                    <option value="Accounting and Finance">Accounting and Finance</option>
                    <option value="Customer Service">Customer Service Representative</option>
                    <option value="Human Resource">Human Resource</option>
                    <option value="Legal">Legal</option>
                    <option value="Legal">IT and Software</option>
                </select>
            </div>
            <div class="col-md-2 form-group">
                <select class="form-control filter" multiple="multiple" id="filterEducation" title="Education" data-selected-text-format="count > 0" data-live-search="true" data-style="btn-secondary-modified" data-size="10">
                    <option value="Less than high school">Less than high school</option>
                    <option value="High school undergraduate">Under high school</option>
                    <option value="High school graduate">High school graduate</option>
                    <option value="Vocational undergraduate">Vocational undergraduate</option>
                    <option value="Vocational graduate">Vocation graduate</option>
                    <option value="Bachelor undergraduate">Bachelor undergradte</option>
                    <option value="Bachelor graduate">Bachelor graduate</option>
                    <option value="Master's Studies">Master's Studies</option>
                    <option value="Master's degree">Master's Degree</option>
                    <option value="Doctorate studies">Doctorate Studies</option>
                    <option value="Doctorate degree">Doctorarate Deg</option>
                </select>
            </div>
            <div class="col-md-2 form-group">
                <select class="form-control filter" multiple="multiple" id="filterCompany" title="Company" data-selected-text-format="count > 0" data-live-search="true" data-style="btn-secondary-modified" data-size="10">
                    <option value="Verified">Verified</option>
                    <option value="Unverified">Unverified</option>
                </select>
            </div>
        </div>
        <div class="row" id="filterBadge">
        </div>
    </div>
</div>
{{-- end JOB POST SEARCHBAR --}}
