@extends('applicant.layout.layout')

@section('title', 'Edit Profile')

@section('content_header')
    <h1>My Profile</h1>
    <hr>
@stop

@section('content')
<div class="container">
  <nav>
    <div class="nav nav-tabs nav" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active profile-text" id="nav-basic-info-tab" data-toggle="tab" href="#nav-basic-info" role="tab" aria-controls="nav-basic-info" aria-selected="false">Basic Info</a>
      <a class="nav-item nav-link" id="nav-education-tab" data-toggle="tab" href="#nav-education" role="tab" aria-controls="nav-education" aria-selected="false">Educational Background</a>
      <a class="nav-item nav-link" id="nav-skills-tab" data-toggle="tab" href="#nav-skills" role="tab" aria-controls="nav-skills" aria-selected="false">Skills</a>
      <a class="nav-item nav-link" id="nav-work-exp-tab" data-toggle="tab" href="#nav-work-exp" role="tab" aria-controls="nav-work-exp" aria-selected="false">Work Experience</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-resume" role="tab" aria-controls="nav-resume" aria-selected="false">Resume</a>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
      {{-- Basic Info --}}
    <div class="tab-pane fade show active" id="nav-basic-info" role="tabpanel" aria-labelledby="nav-basic-info-tab">  
      <div class="mt-3">
        <div class="card text-center edit-photo" style="width: 18rem;">
          <div class="card-body">
            <img src="{{asset('img/applicant_dashboard/User.png')}}" class="edit-icon" alt="">
            <a href="#" class="btn btn-primary btn-sm btn-icon btn-block">Edit Photo</a>
          </div>
        </div>
        <form method="POST" action="{{ route('applicant.profile.update', Auth::user()->id) }}">
          {{ method_field('PUT') }}
          @csrf
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputLastname">Last name</label>
              <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName" name="lastName" value="{{ $errors->any()?old('lastName'):Auth::user()->last_name }}" placeholder="Lastname">

              @error('lastName')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="inputFirstname">First name</label>
              <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName" name="firstName" value="{{ $errors->any()?old('firstName'):Auth::user()->first_name }}" placeholder="Firstname">

              @error('firstName')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="inputMiddlename">Middle name (Optional)</label>
              <input type="text" class="form-control @error('middleName') is-invalid @enderror" id="middleName" name="middleName" value="{{ $errors->any()?old('middle_name'):Auth::user()->middle_name }}" placeholder="Middlename">

              @error('middleName')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $errors->any()?old('email'):Auth::user()->email }}" placeholder="Email">

            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="div form-row">
            <div class="form-group col-md-4">
              <label for="inputState">Region / Province / State</label>
              @php
                $region = [
                  'Metro Manila',
                  'Central Visayas',
                  'Eastern Visayas',
                  'Western Visayas',
                  'Ilocos Region',
                  'Zamboanga Peninsula',
                  'Northen Mindanao',
                  'Caraga',
                  'NCR',
                  'ARMM',
                  'Cordillera Administrative Region',
                  'Central Luzon',
                  'Davao Region',
                  'MIMAROPA',
                  'SOCCSKSARGEN',
                  'CALABARZON',
                  'Bicol Region',
                  'Cagayan Valley'
                ]
              @endphp
              <select id="inputState" name="inputState[]" class="form-control" readonly>
                @for ($i = 0; $i < count($region); $i++)
                  <option value="{{ $region[$i] }}">{{ $region[$i] }}</option>
                @endfor
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">City</label>
              @php
                $city = [
                  'Caloocan',
                  'Las Pinas',
                  'Makati',
                  'Malabon',
                  'Mandaluyong',
                  'Manila',
                  'Marikina',
                  'Muntinlupa',
                  'Navotas',
                  'Paranaque',
                  'Pasay',
                  'Pasig',
                  'Pateros',
                  'Quezon City',
                  'San Juan',
                  'Taguig',
                  'Valenzuela',
                ]
              @endphp
              <select id="inputCity" name="inputCity[]" class="form-control">
                @for ($i = 0; $i < count($city); $i++)
                  <option value="{{ $city[$i] }}">{{ $city[$i] }}</option>
                @endfor
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputCountry">Country</label>
              <select id="inputCountry" name="inputCountry[]" class="form-control" readonly>
                <option value="Philippines" selected>Philippines</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputStreet">Street Address</label>
            <input type="text" class="form-control" id="inputSreet" name="inputStreet">
          </div>
          <div class="div form-row">
            <div class="form-group col-md-4">
              <label for="inputDay">Day</label>
              <select id="inputDay" name="inputDay[]" class="form-control">
                <option value="" disabled selected>Day</option>
                @for ($i = 1; $i <= 31; $i++)
                  @if (isset($applicant_data->birth_date) && date('j', strtotime($applicant_data->birth_date)) == $i)
                    @if ($i < 9)
                      <option value="{{ '0'.strval($i) }}" selected>{{ $i }}</option>    
                    @else
                      <option value="{{ $i }}" selected>{{ $i }}</option>    
                    @endif
                  @else
                    @if ($i < 9)
                      <option value="{{ '0'.strval($i) }}">{{ $i }}</option>    
                    @else
                      <option value="{{ $i }}">{{ $i }}</option>    
                    @endif
                  @endif
                @endfor
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="">Month</label>
              @php
                $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
              @endphp
              <select id="inputMonth" name="inputMonth[]" class="form-control">
                <option value="" disabled selected>Month</option>
                @for ($i = 0; $i <= 11; $i++)
                  @if (isset($applicant_data->birth_date) && date('F', strtotime($applicant_data->birth_date)) == $months[$i])
                    @if ($i < 9)
                      <option value="{{ '0'.strval($i+1) }}" selected>{{ $months[$i] }}</option>    
                    @else
                      <option value="{{ $i+1 }}" selected>{{ $months[$i] }}</option>    
                    @endif
                  @else
                    @if ($i < 9)
                      <option value="{{ '0'.strval($i+1) }}">{{ $months[$i] }}</option>    
                    @else
                      <option value="{{ $i+1 }}">{{ $months[$i] }}</option>    
                    @endif
                  @endif
                @endfor
              </select>
            </div>
            <div class="form-group col-md-4">
                <label for="">Year</label>
              <select id="inputYear" name="inputYear[]" class="form-control">
                <option value="" disabled selected>Year</option>
                @for ($i = 2020; $i >= 1930; $i--)
                  @if (isset($applicant_data->birth_date) && date('Y', strtotime($applicant_data->birth_date)) == $i)
                    <option value="{{ $i }}" selected>{{ $i }}</option>
                  @else
                    <option value="{{ $i }}">{{ $i }}</option>
                  @endif
                @endfor
              </select>
            </div>
          </div> 
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputGender">Gender</label>
              @php
                $gender = ['MALE', 'FEMALE', 'OTHER']
              @endphp
              <select id="inputGender" name="inputGender[]" class="form-control">
                <option value="" disabled selected>Select your gender</option>
                @for ($i = 0; $i <= 2; $i++)
                  @if (strtoupper($applicant_data->gender) == $gender[$i])
                    <option value="{{ $gender[$i] }}" selected>{{ $gender[$i] }}</option>
                  @else
                  <option value="{{ $gender[$i] }}">{{ $gender[$i] }}</option>
                  @endif
                @endfor
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputPhone">Phone</label>
              <input type="text" class="form-control @error('inputPhone') is-invalid @enderror" id="inputPhone" name="inputPhone" value="{{ $errors->any()?old('inputPhone'):$applicant_data->contact_number }}">

              @error('inputPhone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>                                                           
            <div class="form-group col-md-4">
              <label for="expectedSalaryCurrency">Expected Salary (Optional)</label>
              <div class="input-group">
                <select id="expectedSalaryCurrency" name="expectedSalaryCurrency[]" class="w-25">
                  @foreach ($currency as $curr)
                    @if ($curr->id == $applicant_data->currency_id)
                      <option value="{{ $curr->id }}" selected>{{ $curr->name }}</option>
                    @else
                      <option value="{{ $curr->id }}">{{ $curr->name }}</option>
                    @endif
                  @endforeach
                </select>
                <input type="text" class="form-control @error('expectedSalaryAmount') is-invalid @enderror" id="expectedSalaryAmount" name="expectedSalaryAmount" value="{{ isset($applicant_data->expected_salary)?$applicant_data->expected_salary:'' }}" placeholder="per month">

                @error('expectedSalaryAmount')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row modal-footer modified">
            <input type="hidden" name="hidden_id" id="hidden_id" value="1">
            <button type="button" class="btn btn-outline-primary float-right btn-save" id="btnCancelInfo">CANCEL</button>
            <button type="submit" class="btn btn-primary float-right btn-cancel" id="btnSaveInfo">SAVE</button>
          </div>        
        </form>
      </div>
    </div>
        {{-- end Basic Info --}}
                          
      {{-- Education Background --}}
    <div class="tab-pane fade mt-3" id="nav-education" role="tabpanel" aria-labelledby="nav-education-tab">
      <div>
        <form method="POST" action="{{ route('applicant.profile.update', Auth::user()->id) }}">
          {{ method_field('PUT') }}
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEducation">Educational attainment</label>
              @php
                $educ = [
                  'High School',
                  'Vocational Graduate',
                  'Associate\'s Degree Graduate',
                  'Bachelor\'s Degree Graduate',
                  'Master\'s Degree Graduate',
                  'Post Graduate Studies',
                  'Doctoral Degree Graduate'
                ]
              @endphp
              <select id="inputEducation" name="inputEducation" class="form-control">
                <option value="" disabled selected>Choose...</option>
                @for ($i = 0; $i < count($educ); $i++)
                  @if (isset($applicant_education->education_attainment) && $applicant_education->education_attainment == $educ[$i])
                    <option value="{{ $educ[$i] }}" selected>{{ $educ[$i] }}</option>
                  @else
                    <option value="{{ $educ[$i] }}">{{ $educ[$i] }}</option>
                  @endif
                @endfor
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="inputCourse">Course Degree</label>
              <input type="text" class="form-control @error('inputCourse') is-invalid @enderror" id="inputCourse" name="inputCourse" value="{{ $errors->any()?old('inputCourse'):(isset($applicant_education)?$applicant_education->course_degree:'') }}">

              @error('inputCourse')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="inputSchool">School University</label>
              @php
                $school = [
                  'University of Perpetual Help System',
                  'Polytechnic University of the Philippines',
                  'Technological University of Philippines',
                  'University of the Philippines',
                ]
              @endphp
              <select id="inputSchool" name="inputSchool" class="form-control">
                <option value="" disabled selected>Choose...</option>
                @for ($i = 0; $i < count($school); $i++)
                  @if (isset($applicant_education->school) && $applicant_education->school == $school[$i])
                    <option value="{{ $school[$i] }}" selected>{{ $school[$i] }}</option>
                  @else
                    <option value="{{ $school[$i] }}">{{ $school[$i] }}</option>
                  @endif
                @endfor
              </select>
            </div>
          </div>
          <div class="div form-row">
            <div class="form-group col-md-3">
              <label for="inputStart">Start Date</label>
              @php
                $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
              @endphp
              <select id="inputStartMonth" name="inputStartMonth" class="form-control">
                <option value="" disabled selected>Month</option>
                @for ($i = 0; $i <= 11; $i++)
                  @if (isset($applicant_education->date_from) && date('F', strtotime($applicant_education->date_from)) == $months[$i])
                    @if ($i < 9)
                      <option value="{{ '0'.strval($i+1) }}" selected>{{ $months[$i] }}</option>    
                    @else
                      <option value="{{ $i+1 }}" selected>{{ $months[$i] }}</option>    
                    @endif
                  @else
                    @if ($i < 9)
                      <option value="{{ '0'.strval($i+1) }}">{{ $months[$i] }}</option>    
                    @else
                      <option value="{{ $i+1 }}">{{ $months[$i] }}</option>    
                    @endif
                  @endif
                @endfor
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputYear">Year</label>
              <input type="number" class="form-control @error('inputYearStart') is-invalid @enderror" id="inputYearStart" name="inputYearStart" value="{{ $errors->any()?old('inputYearStart'):(isset($applicant_education->date_from)?date('Y', strtotime($applicant_education->date_from)):'') }}">

              @error('inputYearStart')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group col-md-3">
              <label for="endDate">End date </label>
              @php
                $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
              @endphp
              <select id="inputEndMonth" name="inputEndMonth" class="form-control">
                <option value="" disabled selected>Month</option>
                @for ($i = 0; $i <= 11; $i++)
                  @if (isset($applicant_education->date_to) && date('F', strtotime($applicant_education->date_to)) == $months[$i])
                    @if ($i < 9)
                      <option value="{{ '0'.strval($i+1) }}" selected>{{ $months[$i] }}</option>    
                    @else
                      <option value="{{ $i+1 }}" selected>{{ $months[$i] }}</option>    
                    @endif
                  @else
                    @if ($i < 9)
                      <option value="{{ '0'.strval($i+1) }}">{{ $months[$i] }}</option>    
                    @else
                      <option value="{{ $i+1 }}">{{ $months[$i] }}</option>    
                    @endif
                  @endif
                @endfor
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputYear">Year</label>
              <input type="number" class="form-control @error('inputYearEnd') is-invalid @enderror" id="inputYearEnd" name="inputYearEnd" value="{{ $errors->any()?old('inputYearStart'):(isset($applicant_education->date_to)?date('Y', strtotime($applicant_education->date_to)):'') }}">
              
              @error('inputYearEnd')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="Accomplishments">Accomplishments or descriptions (optional) </label>
                <textarea class="form-control resizable-none" id="educationAccomplishments" name="educationAccomplishments" rows="7">{{ isset($applicant_education->description)?$applicant_education->description:'' }}</textarea>
              </div>
            </div>
            <input type="hidden" name="hidden_id" id="hidden_id" value="2">
            <button type="submit" class="btn btn-primary float-right btn-cancel" id="btnSaveEducation">SAVE</button>
            <button type="button" class="btn btn-outline-primary float-right btn-save" id="btnCancelEducation">CANCEL</button>
        </form>
        </div> 
    </div>
    {{-- end Education Background --}}
    {{-- Skills --}}
    <div class="tab-pane fade mt-3" id="nav-skills" role="tabpanel" aria-labelledby="nav-skills-tab">
      <form method="POST" action="{{ route('applicant.profile.update', Auth::user()->id) }}">
        {{ method_field('PUT') }}
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="addSkills">Add Skills</label>
            <input type="text" class="form-control" id="addSkill" name="addskill"> 
          </div>
          <div class="form-group add-btn col-md-6">
            <button type="button" class="btn btn-primary" id="btnSkill"><i class="fas fa-plus"></i></button>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row" id="skill">
              @php
                $exp = ['0 - 2', '2 - 3', '3 - 5', '5 - 8', '8 - 10']
              @endphp
              @foreach ($applicant_skill as $skill)
                <label for="colFormLabel" class="col-sm-5 col-form-label skills-title">{{ $skill->name }}</label>
                <div class="col-md-7 form-exp">
                  <select id="yearExp" class="form-control">
                    @for ($i = 0; $i < count($exp); $i++)
                      @if ($exp[$i] == $skill->pivot->years_of_experience)
                        <option value="{{ $exp[$i] }}" selected>{{ $exp[$i] }} Years of Experience</option>
                      @else
                        <option value="{{ $exp[$i] }}">{{ $exp[$i] }} Years of Experience</option>
                      @endif
                    @endfor
                  </select>
                </div>
              @endforeach
            </div>
            <input type="hidden" name="hidden_id" id="hidden_id" value="3">
            <button type="submit" class="btn btn-primary float-right btn-cancel" id="btnSaveSkill">SAVE</button>
            <button type="button" class="btn btn-outline-primary float-right btn-save" id="btnCancelSkill">CANCEL</button>
          </div>
        </div>
      </form>
    </div>
      {{-- end Skills --}}

      {{-- Work Experience --}}
    <div class="tab-pane fade mt-3" id="nav-work-exp" role="tabpanel" aria-labelledby="nav-work-exp-tab">
      <form method="POST" action="{{ route('applicant.profile.update', Auth::user()->id) }}">
        {{ method_field('PUT') }}
        @csrf
        <div class="form-row ">
          <div class="form-group col-md-6">
            <label for="JobTitle">Job Title</label>
          <input type="text" class="form-control @error('jobTitle') is-invalid @enderror" id="jobTitle" name="jobTitle" value="{{ $errors->any()?old('jobTitle'):(isset($applicant_work_exp)?$applicant_work_exp->job_title:'') }}">

          @error('jobTitle')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="Company">Company</label>
            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ $errors->any()?old('company'):(isset($applicant_work_exp)?$applicant_work_exp->company_name:'') }}">
            
            @error('company')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="div form-row">
          <div class="form-group col-md-2">
            <label for="startMonth">From</label>
            @php
              $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
            @endphp
            <select id="startMonth" name="startMonth" class="form-control">
              <option value="" disabled selected>Month</option>
              @for ($i = 0; $i <= 11; $i++)
                @if (isset($applicant_work_exp->date_from) && date('F', strtotime($applicant_work_exp->date_from)) == $months[$i])
                  @if ($i < 9)
                    <option value="{{ '0'.strval($i+1) }}" selected>{{ $months[$i] }}</option>    
                  @else
                    <option value="{{ $i+1 }}" selected>{{ $months[$i] }}</option>    
                  @endif
                @else
                  @if ($i < 9)
                    <option value="{{ '0'.strval($i+1) }}">{{ $months[$i] }}</option>    
                  @else
                    <option value="{{ $i+1 }}">{{ $months[$i] }}</option>    
                  @endif
                @endif
              @endfor
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="startYear">Year</label>
            <input type="number" class="form-control @error('startYear') is-invalid @enderror" id="startYear" name="startYear" value="{{ $errors->any()?old('endYear'):(isset($applicant_work_exp->date_from)?date('Y', strtotime($applicant_work_exp->date_from)):'') }}">

            @error('startYear')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group col-md-2">
            <label for="endMonth">To</label>
            @php
              $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
            @endphp
            <select id="endMonth" name="endMonth" class="form-control">
              <option value="" disabled selected>Month</option>
              @for ($i = 0; $i <= 11; $i++)
                @if (isset($applicant_work_exp->date_to) && date('F', strtotime($applicant_work_exp->date_to)) == $months[$i])
                  @if ($i < 9)
                    <option value="{{ '0'.strval($i+1) }}" selected>{{ $months[$i] }}</option>    
                  @else
                    <option value="{{ $i+1 }}" selected>{{ $months[$i] }}</option>    
                  @endif
                @else
                  @if ($i < 9)
                    <option value="{{ '0'.strval($i+1) }}">{{ $months[$i] }}</option>    
                  @else
                    <option value="{{ $i+1 }}">{{ $months[$i] }}</option>    
                  @endif
                @endif
              @endfor
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="endYear">Year</label>
            <input type="number" class="form-control" id="endYear" name="endYear" value="{{ $errors->any()?old('endYear'):(isset($applicant_work_exp->date_from)?date('Y', strtotime($applicant_work_exp->date_from)):'') }}">

            @error('endYear')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="expectedSalaryCurrency">Previous Salary (Optional)</label>
            <div class="input-group">
              <select id="prevSalaryCurrency" name="prevSalaryCurrency" class="w-25">
                @foreach ($currency as $curr)
                  @if (isset($applicant_work_exp->currency_id) && ($curr->id == $applicant_work_exp->currency_id))
                    <option value="{{ $curr->id }}" selected>{{ $curr->name }}</option>
                  @else
                    <option value="{{ $curr->id }}">{{ $curr->name }}</option>
                  @endif
                @endforeach
              </select>
              <input type="number" class="form-control @error('prevSalaryAmount') is-invalid @enderror" id="prevSalaryAmount" name="prevSalaryAmount" value="{{ isset($applicant_work_exp->previous_salary)?$applicant_work_exp->previous_salary:'' }}" placeholder="per month">

              @error('prevSalaryAmount')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="Accomplishments">Accomplishments or descriptions (optional) </label>
            <textarea class="form-control resizable-none" id="accomplishments" name="accomplishments" rows="7">{{ isset($applicant_work_exp->description)?$applicant_work_exp->description:'' }}</textarea>
          </div>
        </div>
        <input type="hidden" name="hidden_id" id="hidden_id" value="4">
        <button type="submit" class="btn btn-primary float-right btn-cancel" id="btnSaveWork">SAVE</button>
        <button type="button" class="btn btn-outline-primary float-right btn-save" id="btnCancelWork">CANCEL</button>
      </form>
    </div>
          {{-- end Work Experience --}}
          {{-- Resume --}}
        <div class="tab-pane fade" id="nav-resume" role="tabpanel" aria-labelledby="nav-resume-tab">
            <div class="row justify-content-center resume-desc">
                <div class="col-md-6 ">
                  <p>File upload widget with drag & drop support. You 
                      Can drag & drop files from your desktop on this webpage.</p>
                      <form action="/applicant/resume_upload" method="POST" enctype="multipart/form-data">
                        @csrf
                      <input type="file" id="resume" name="resume" class="btn btn-success btn-lg btn-block" accept=".pdf, .doc, .docx, .txt">
                      <div class="or">
                        <h5>OR</h5>
                        <h5 class="drag-drop">Drag & drop files here</h5>
                        <p>maximum file size: 3mb (.pdf, .doc, docx, .txt)</p>
                      </div>
                      
                      <button type="submit" class="btn btn-primary float-right btn-cancel" id="btnSaveResume">SAVE</button>
                      <button type="reset" class="btn btn-outline-primary float-right btn-save" id="btnCancelResume">CANCEL</button>
                    </form>
                </div>             
            </div>             
        </div>
        {{-- end Resume --}}
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/applicant_dashboard.css')}}">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

  <script> 
    $(function(){
      $("#btnSkill").click(function(){
        var skill = $("#addSkill").val();
          $("#skill").append("<label for='colFormLabel' class='col-sm-4 col-form-label skills-title'>"+skill+"</label><div class='col-md-7 form-exp'><select id='yearExp' class='form-control'> <option selected>Select Year of Experience...</option><option>...</option><option>0-2 Years of Experience</option><option>2-3 Years of Experience</option><option>3-5 Years of Experience</'option><option>5-8 Years of Experience</option><option>8-10 Years of Experience</option></select></div><div class='col-sm-1 mt-3'><button type='button' class='btn btn-sm btn-danger' id='removeSkill'><i class='fas fa-times'></i></button></div>");
      });



      $("#removeSkill").click(function() {
        $(".delete-skill").remove();
      });

    

  //     $(document).ready(function(){
  //       $("#removeSkill").click(function(){
  //     $("#skillDelete").remove();
  //     });
  // });
      $('#btnSaveInfo').on('click', function(event){
        event.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
          title: 'Are you sure',
          text: "You want to save your Profile?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((isConfirm) => {
          if (isConfirm.value) {
            // console.log(form);
            form.submit()
            
          }
        })
      });

      $("#btnSaveEducation").on('click', function(event){
        event.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
          title: 'Are you sure',
          text: "You want to save this form?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Saved',
              'Profile Successfully Saved!.',
              'success'
            ).then((isOkay) => {
              form.submit();
            })
          }
        })
      });

      $("#btnSaveWork").on('click', function(event){
        event.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
          title: 'Are you sure',
          text: "You want to save this form?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
            // console.log(form);
            Swal.fire(
              'Saved',
              'Profile Successfully Saved!.',
              'success'
            ).then((isOkay) => {
              form.submit();
            })
          }
        })
      });

      $("#btnSaveSkill").on('click', function(event){
        event.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
          title: 'Are you sure',
          text: "You want to save this form?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
            // console.log(form);
            Swal.fire(
              'Saved',
              'Profile Successfully Saved!.',
              'success'
            ).then((isOkay) => {
              form.submit();
            })
          }
        })
      });

    });
  </script>
<script>
    $("#btnSaveForm,#btnSaveResume,#btnSave").click(function(){
        Swal.fire({
          title: 'Are you sure',
          text: "You want to save this form?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Saved',
              'Profile Successfully Saved!.',
              'success'
            )
          }
        })
    });
  </script>
  <script>
    $('#profile').addClass('active');
    $("#btnCancelForm,#btnCancelResume,#btnCancelWork,#btnCancelSkill,#btnCancelInfo,#btnCancel,#btnCancelEducation").click(function(){
        Swal.fire({
          title: 'Are you sure',
          text: "You want to discard changes?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Saved',
              '',
              'success'
            )
          }
        })
    });
    
    $(document).ready(function(){
      $('#lastName').mask('S', {'translation': {
          S: {pattern: /[áéíóúñüàèA-Za-z ]/ ,recursive: true}
        }
      });

      $('#inputPhone').mask('0#');
    });
  </script>
@stop

