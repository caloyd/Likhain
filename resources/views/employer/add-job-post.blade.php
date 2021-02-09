@extends('employer.layout.layout')

@section('title', 'Add Job Post')

@section('content_header')
    <h1>Job Post</h1>
    <hr>
@stop

@section('content')
    <div class="div col-md-6 offset-md-3">
        <h5 class="job-details">JOB DETAILS</h5>
        <form action="/save-add-job-post" id="jobDetailsForm" class="job-post" method="POST">
            @csrf
                <div class="input-group mb-3">
                    <label class="col-sm-3 col-form-label">Position Title *</label>
                    <input type="text" class="form-control" id="positionTitle" name=positionTitle value="{{old('positionTitle')}}" required>
                    {{-- <span class="invalid-feedback" role="alert" id="positionTitle"></span> --}}
                </div>
                <div class="input-group mb-3">
                    <label class="col-sm-3 col-form-label">Employment type</label>
                    <select class="form-control" id="employmentType" name="employmentType">
                        <option>Internship / OJT</option>
                        <option>Full-time</option>
                        <option>Part-time</option>
                        <option>Freelance</option>
                    </select> 
                </div>
                <div class="input-group mb-3">
                    <label class="col-sm-3 col-form-label">Position level *</label>
                    <select class="form-control" id="positionLevel" name="positionLevel">   
                        <option value="Internship / OJT">Internship / OJT</option>
                        <option value="Fresh Grad / Entry Level">Fresh Grad / Entry Level</option>
                        <option value="Associate / Supervisor">Associate / Supervisor</option>
                    </select> 
                </div>
                <div class="input-group mb-3">
                    <label class="col-sm-3 col-form-label">Job Specialization *</label>
                    <select class="form-control" id="jobSpecialization" name="jobSpecialization">
                        <option value="IT and Software">IT and Software</option>
                        <option value="Arts and Sports">Arts and Sports</option>
                        <option value="Accounting and Finance">Accounting and Finance</option>
                    </select> 
                </div>    
                <div class="div form-row">
                    <div class="input-group mb-3 col-md-6">
                            <label class="col-sm-6 col-form-label">Job Location *</label>
                        <select class="form-control" id="jobLocation" name="jobLocation">
                            
                            <option value="Philippines">Philippines</option>                       
                        </select> 
                    </div> 
                    <div class="input-group mb-3 col-md-6">
                        <select class="form-control" id="jobLocationCity" name="jobLocationCity">
                            
                            <option value="Makati City">Makati City</option>   
                            <option value="Taguig City">Taguig City</option> 
                            <option value="Tokyo City">Tokyo City</option>   
                        </select> 
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group mb-3 col-md-9 offset-md-3">
                        <input type=hidden name="fullLocation" class="form-control" id="fullLocation" value=""> 
                    </div>
                </div>     
                <div class="div form-row">
                    <div class="input-group mb-3 col-md-6">
                        <label class="col-sm-6 col-form-label">Monthly Salary</label>
                        <select class="form-control" id="currencyId" name="currencyId">
                            @foreach(\App\Currency::all() as $currency)
                            <option value={{$currency->id}}>
                                {{$currency->name}}
                            </option>              
                            @endforeach          
                        </select> 
                    </div> 
                    
                    <div class="col-md-3">
                        <input type="number" class="form-control" id="minimumSalary" name="minimumSalary" min="1" placeholder="Minimum" required>
                        <span class="invalid-feedback" role="alert" id="minimumSalary"></span>
                    </div> 
                    <div class="form-group mb-3 col-md-3">
                        <input type="number" class="form-control" id="maximumSalary" name="maximumSalary" placeholder="Maximum" required> 
                        <span class="invalid-feedback" role="alert" id="maximumSalary"></span>
                        <span class="d-none text-danger salary-invalid" role="alert" id="maxMsg">*Invalid Input</span>
                    </div>
                </div>
            
                <div class="input-group mb-3">
                    <label class="col-sm-3 col-form-label">Education Level *</label>
                    <select class="form-control" id="educLevel" name="educLevel">
                            <option value="Less than high school">High school undergraduate</option>
                            <option value="High school graduate">High school graduate</option>
                            <option value="Vocational graduate">Vocational graduate</option>
                            <option value="Bachelor undergraduate">College undergraduate</option>
                            <option value="Bachelor graduate">Bachelor's Degree</option>
                            <option value="Master's Studies">Master's Studies</option>
                            <option value="Master's degree">Master's Degree</option>
                            <option value="Doctorate studies">Doctorate Studies</option>
                            <option value="Doctorate degree">Doctorarate Degree</option>
                    </select>
                </div>
                <div class="input-group mb-3 drpdown">
                    <label class="col-sm-3 col-form-label">Years of Experience</label>
                    <select class="form-control" id="yrsExp" name="yrsExp">
                        <option>0-1 Year</option>
                        <option>2-4 Years</option>
                        <option>5-7 Years</option>
                    </select> 
                </div>
                <div class="row mb-3 drpdown">
                    <div class="col-md-3 col-form-label">
                        <label for="">Skills</label>
                    </div>

                    <div class="col-md-9">
                        <select class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills" multiple="multiple" data-placeholder="Select Skill" required autocomplete="skills">
                            <option value="PHP">PHP</option>
                            <option value="HTML5">HTML5</option>
                            <option value="CSS3">CSS3</option>
                            <option value="Javascript">Javascript</option>
                            <option value="jQuery">jQuery</option>
                            <option value="Angular">Angular</option>
                        </select>
                        @error('skills')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <label class="col-sm-3 col-form-label">Skills</label>
                    <select class="col-sm-9 form-control @error('skills') is-invalid @enderror" id="skills" name="skills" multiple="multiple" data-placeholder="Select Skill" required autocomplete="skills">
                        <option value="PHP">PHP</option>
                        <option value="HTML5">HTML5</option>
                        <option value="CSS3">CSS3</option>
                        <option value="Javascript">Javascript</option>
                        <option value="jQuery">jQuery</option>
                        <option value="Angular">Angular</option>
                    </select>
                    @error('skills')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror --}}
                </div>
                
                <div class="form-row">
                    <div class="input-group mb-3 col-md-9 offset-md-3">
                        <textarea name="outputSkill" id="outputSkill" style="display:none;"></textarea>
                        
                    </div>
                </div>
                <div class="input-group mb-3 drpdown">
                    <label class="col-sm-3 col-form-label">Recruitment Period</label>
                    <input type="text" class="form-control datetimepicker-input" name="recPeriod">
                </div>

                <h5 class="job-desc">JOB DESCRIPTION</h5>
                <div class="">
                    <fieldset>
                        <label for="">POLICIES AND PRACTICES</label>
                        
                        <textarea class="col-md-12 resizable-none form-control" rows="8" name="jobDescription" required autocomplete="off"></textarea>  
                    </fieldset>
                </div>
                
                <div class="row modal-footer modified">
                    <button type="submit" class="btn btn-success">SAVE</button>
                    <button type="reset" class="btn btn-danger" id="">CANCEL</button>   
                </div>
            </div>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/employer_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('users/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('users/css/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@stop

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('users/js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/employer/add_job_post.js')}}"></script>
@stop