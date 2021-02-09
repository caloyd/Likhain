@extends('applicant.layout.layout')
@section('title', 'Applicant Profile')
@section('content_header')
    <h1>My Profile</h1>
    <hr>
@stop
@section('content')
    <div class="col-md-8">
        @php
            $educ = ['High School', 'Vocational Graduate', 'Associate\'s Degree Graduate', 'Bachelor\'s Degree Graduate', 'Master\'s Degree Graduate', 'Post Graduate Studies', 'Doctoral Degree Graduate'];
            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            $school = ['University of Perpetual Help System', 'Polytechnic University of the Philippines', 'Technological University of Philippines', 'University of the Philippines']
        @endphp
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="card-title mt-1"><b>Education</b></h1>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-sm btn-flat btn-success rounded float-right" id="btnAddEduc"><i class="fas fa-plus mr-2"></i>Add Education</button>
                    </div>
                </div>
                <form method="POST" action="{{ route('applicant.profile.store') }}" id="educationForm">
                    @csrf
                    <div class="row d-none" id="newEducation">
                        <div class="col-md-3 mt-2">
                            <select id="inputEducation" name="inputEducation" class="form-control" title="Education Attainment" placeholder="Choose Education">
                                <option value="" selected disabled>Choose Education</option>
                                @for ($i = 0; $i < count($educ); $i++)
                                    <option value="{{ $educ[$i] }}">{{ $educ[$i] }}</option>
                                @endfor
                            </select>
                            <span class="invalid-feedback" role="alert" id="inputEducation"></span>
                        </div>
                        <div class="col-md-9 mt-2">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" name="startDate" id="startDate" placeholder="Start Date" autocomplete="off">
                                    <span class="invalid-feedback" role="alert" id="startDate"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" name="endDate" id="endDate" placeholder="End Date" autocomplete="off">
                                    <span class="invalid-feedback" role="alert" id="endDate"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="School/University" name="inputSchool" id="inputSchool" autocomplete="off">
                                <span class="invalid-feedback" role="alert" id="inputSchool"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputCourse" name="inputCourse" value="" placeholder="Course Title" autocomplete="off">
                                <span class="invalid-feedback" role="alert" id="inputCourse"></span>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control resizable-none" id="educationAccomplishments" name="educationAccomplishments" rows="7" placeholder="Honors, Awards and Accomplishments (optional)"></textarea>
                                <span class="invalid-feedback" role="alert" id="educationAccomplishments"></span>
                            </div>
                            <div class="text-right">
                                <input type="hidden" name="c_hidden_id" value="2">
                                <button type="submit" class="btn btn-sm btn-flat btn-success rounded">Save</button>
                                <button type="button" class="btn btn-sm btn-flat btn-danger rounded ml-1" id="cancelNewEduc">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="shw-education"></div>
                @if (isset($applicant_education))
                    @foreach ($applicant_education as $education)
                        <!-- {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}} -->
                        <form method="POST" action="{{ route('applicant.profile.update', $education->id) }}" id="educationForm{{ $education->id }}">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="row d-none" form-id="ed{{ $education->id }}">
                                <div class="col-md-3 mt-2">
                                    <select id="inputEducation{{ $education->id }}" name="inputEducation{{ $education->id }}" class="form-control">
                                        <option value="" disabled selected>Choose...</option>
                                        @for ($i = 0; $i < count($educ); $i++)
                                            @if ($education->education_attainment == $educ[$i])
                                                <option value="{{ $educ[$i] }}" selected>{{ $educ[$i] }}</option>
                                            @else
                                                <option value="{{ $educ[$i] }}">{{ $educ[$i] }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-9 mt-2">
                                    <div class="row" id="date">
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" id="newStartDate{{$education->id}}" name="newStartDate{{$education->id}}" placeholder="Start Date" data-id="{{$education->id}}" value="{{$education->date_from}}">
                                            <span class="invalid-feedback" role="alert" id="newStartDate{{$education->id}}"></span>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" id="newEndDate{{$education->id}}"
                                            name="newEndDate{{$education->id}}" placeholder="End Date" data-id="{{$education->id}}" value="{{$education->date_to}}">
                                            <span class="invalid-feedback" role="alert" id="newEndDate{{$education->id}}"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputSchool{{ $education->id }}" name="inputSchool{{ $education->id }}" value="{{$education->school}}">
                                        <span class="invalid-feedback" role="alert" id="inputSchool{{ $education->id }}"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputCourse{{ $education->id }}" name="inputCourse{{ $education->id }}" value="{{ $education->course_degree }}">
                                        <span class="invalid-feedback" role="alert" id="inputCourse{{ $education->id }}"></span>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control resizable-none" id="educationAccomplishments{{ $education->id }}" name="educationAccomplishments{{ $education->id }}" rows="7">{{ $education->description }}</textarea>

                                        <span class="invalid-feedback" role="alert" id="educationAccomplishments{{ $education->id }}"></span>
                                    </div>
                                    <div class="text-right">
                                        <input type="hidden" name="hidden_id" value="2">
                                        <button type="submit" class="btn btn-sm btn-flat btn-success rounded">Save</button>
                                        <button type="button" class="btn btn-sm btn-flat btn-danger rounded ml-1 btnCancelEducation" data-id="{{ $education->id }}">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="card-title mt-1"><b>Salary Expectation</b></h1>
                    </div>
                    <div class="col-md-4" id="newSal"></div>
                </div>
                <form method="POST" action="{{ route('applicant.profile.store')}}" id="salaryForm">
                    @csrf
                    <div class="row d-none" id="newSalary">
                        <div class="form-group col-md-9 mt-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <select id="expectedSalaryCurrency" name="expectedSalaryCurrency" class="form-control">
                                        @foreach ($currency as $curr)
                                            <option value="{{ $curr->id }}">{{ $curr->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" id="expectedSalaryAmount" name="expectedSalaryAmount" value="" placeholder="per month">
                                    <span class="invalid-feedback" role="alert" id="expectedSalaryAmount"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="text-right">
                                <input type="hidden" name="c_hidden_id" value="3">
                                <button type="submit" class="btn btn-sm btn-flat btn-success rounded" id="saveNewSalary">Save</button>
                                <button type="button" class="btn btn-sm btn-flat btn-danger rounded ml-1" id="btnCancelSalary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            <div class="shw-salary"></div>
                @if(isset($applicant_data->expected_salary))
                    <form method="POST" action="{{ route('applicant.profile.update', Auth::id())}}" id="editSalaryForm">
                        @csrf
                        <div class="row d-none" form-id="newSalari">
                            <div class="form-group col-md-9 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select id="editSalaryCurrency" name="editSalaryCurrency" class="form-control">
                                            @foreach ($currency as $curr)
                                                @if ($curr->id == $applicant_data->currency_id)
                                                    <option value="{{ $curr->id }}" selected>{{ $curr->name }}</option>
                                                @else
                                                    <option value="{{ $curr->id }}">{{ $curr->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" id="editSalaryAmount" name="editSalaryAmount" value="{{ $applicant_data->expected_salary }}" placeholder="per month" min="1">
                                        <span class="invalid-feedback" role="alert" id="editSalaryAmount"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <div class="text-right">
                                    <input type="hidden" name="hidden_id" value="3">
                                    <button type="submit" class="btn btn-sm btn-flat btn-success rounded">Save</button>
                                    <button type="button" class="btn btn-sm btn-flat btn-danger rounded ml-1" id="cancelSalary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="card-title mt-1"><b>Work Experience</b></h1>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-sm btn-flat btn-success rounded float-right" id="btnAddWorkExp"><i class="fas fa-plus mr-2"></i>Add Work Experience</button>
                    </div>
                </div>
                <form method="POST" action="{{ route('applicant.profile.store') }}" id="workExpForm">
                    @csrf
                    <div class="row d-none" id="newWorkExp">
                        <div class="form-group col-md-3 mt-2">
                            <input type="text" class="form-control" id="company" name="company" value="" placeholder="Company name">
                            <span class="invalid-feedback" role="alert" id="company"></span>
                        </div>
                        <div class="col-md-9 mt-2">
                            <div class="form-group">
                                <input type="text" class="form-control" id="jobTitle" name="jobTitle" value="" placeholder="Job title" autocomplete="off">
                                <span class="invalid-feedback" role="alert" id="jobTitle"></span>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" id="workStartDate" name="workStartDate" placeholder="Start Date" autocomplete="off">
                                    <span class="invalid-feedback" role="alert" id="workStartDate"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" id="workEndDate" name="workEndDate" placeholder="End Date" autocomplete="off">
                                    <span class="invalid-feedback" role="alert" id="workEndDate"></span>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select id="prevSalaryCurrency" name="prevSalaryCurrency" class="form-control" autocomplete="off">
                                            @foreach ($currency as $curr)
                                                <option value="{{ $curr->id }}">{{ $curr->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" id="prevSalaryAmount" name="prevSalaryAmount" value="" placeholder="per month" autocomplete="off" min="1">
                                        <span class="invalid-feedback" role="alert" id="prevSalaryAmount"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control resizable-none" id="accomplishments" name="accomplishments" rows="7" placeholder="Job Description"></textarea>
                                <span class="invalid-feedback" role="alert" id="accomplishments"></span>
                            </div>
                            <div class="text-right">
                                <input type="hidden" name="c_hidden_id" value="4">
                                <button type="submit" class="btn btn-sm btn-flat btn-success rounded" id="saveNewWork">Save</button>
                                <button type="button" class="btn btn-sm btn-flat btn-danger rounded ml-1" id="btnCancelWork">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="shw-workexp"></div>
                @if(isset($applicant_work_exp))
                    @foreach($applicant_work_exp as $work_exp)
                        <form method="POST" action="{{ route('applicant.profile.update', $work_exp->id) }}" id="workExpForm{{ $work_exp->id }}">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="row d-none" form-id="we{{ $work_exp->id }}">
                                <div class="form-group col-md-3 mt-2">
                                    <input type="text" class="form-control" id="company{{ $work_exp->id }}" name="company{{ $work_exp->id }}" value="{{ $work_exp->company_name }}">
                                    <span class="invalid-feedback" role="alert" id="company{{ $work_exp->id }}"></span>
                                </div>
                                <div class="col-md-9 mt-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="jobTitle{{ $work_exp->id }}" name="jobTitle{{ $work_exp->id }}" value="{{ $work_exp->job_title }}" autocomplete="off">
                                        <span class="invalid-feedback" role="alert" id="jobTitle{{ $work_exp->id }}"></span>
                                    </div>
                                    <div class="row" id="workDate">
                                        <div class="form-group col-md-6">
                                            <input type="date" class="form-control" id="workNewStartDate{{$work_exp->id}}" name="workNewStartDate{{$work_exp->id}}" data-id="{{$work_exp->id}}" value="{{$work_exp->date_from}}" autocomplete="off">
                                            <span class="invalid-feedback" role="alert" id="workNewStartDate{{$work_exp->id}}"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="date" class="form-control" id="workNewEndDate{{$work_exp->id}}"  name="workNewEndDate{{$work_exp->id}}" data-id="{{$work_exp->id}}" value="{{$work_exp->date_to}}" autocomplete="off">
                                            <span class="invalid-feedback" role="alert" id="workNewEndDate{{$work_exp->id}}"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select id="prevSalaryCurrency{{ $work_exp->id }}" name="prevSalaryCurrency{{ $work_exp->id }}" class="form-control">
                                                    @foreach ($currency as $curr)
                                                        @if ($curr->id == $work_exp->currency_id)
                                                            <option value="{{ $curr->id }}" selected>{{ $curr->name }}</option>
                                                        @else
                                                            <option value="{{ $curr->id }}">{{ $curr->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control" id="prevSalaryAmount{{ $work_exp->id }}" name="prevSalaryAmount{{ $work_exp->id }}" value="{{ $work_exp->previous_salary }}" placeholder="per month" min="1">
                                                <span class="invalid-feedback" role="alert" id="prevSalaryAmount{{ $work_exp->id }}"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control resizable-none" id="accomplishments{{ $work_exp->id }}" name="accomplishments{{ $work_exp->id }}" rows="7">{{ $work_exp->description }}</textarea>
                                        <span class="invalid-feedback" role="alert" id="accomplishments{{ $work_exp->id }}"></span>
                                    </div>
                                    <div class="text-right">
                                        <input type="hidden" name="hidden_id" value="4">
                                        <button type="submit" class="btn btn-sm btn-flat btn-success rounded">Save</button>
                                        <button type="button" class="btn btn-sm btn-flat btn-danger rounded ml-1 btnCancelWork" data-id="{{ $work_exp->id }}">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="card-title mt-1 mb-3"><b>Skills</b></h1>
                    </div>
                    <div class="col-md-4" id="addSkill"></div>
                </div>
                <div class="row" id="shw-skill">
                    <div class="col-md-4" id="skill_name"></div>
                    <div class="col-md-8" id="skill_exp"></div>
                </div>
                <div class="d-none" id="editSkills">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="skillName" name="skillName" placeholder="Please enter your skills (e.g. HTML, CSS, Javascript)">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-info" id="btnAddSkill"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <form id="skillForm" method="POST" action="{{ route('applicant.profile.store') }}">
                        @csrf
                        <div id="skill"></div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-sm btn-flat btn-success rounded">Save</button>
                            <button type="button" class="btn btn-sm btn-flat btn-danger rounded ml-1" id="cancelEditSkill">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" id="divInfo">
            <div class="card-body" id="showBasicInfo"></div>
        </div>
        {{-- Edit Basic info --}}
        <div class="card d-none" id="editBasicInfo">
            <div class="card-body" >
                @php
                    $region = ['Metro Manila','Central Visayas','Eastern Visayas','Western Visayas', 'Ilocos Region','Zamboanga Peninsula','Northen Mindanao','Caraga','NCR','ARMM', 'Cordillera Administrative Region','Central Luzon','Davao Region','MIMAROPA','SOCCSKSARGEN','CALABARZON','Bicol Region','Cagayan Valley'];
                    $city = ['Caloocan', 'Las Pinas', 'Makati', 'Malabon', 'Mandaluyong', 'Manila', 'Marikina', 'Muntinlupa', 'Navotas', 'Paranaque', 'Pasay', 'Pasig', 'Pateros', 'Quezon City', 'San Juan', 'Taguig', 'Valenzuela'];
                    $gender = ['Male', 'Female']
                @endphp

                    <div class="col-md-12 text-center mb-4" id="img">
                        <div class="col-md-6 offset-md-3">
                            <div id="imgHover">
                                @if(is_null($applicant_data->avatar_image_path))
                                <form action="/upload-profile-picture-applicant/{{$applicant_data->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{method_field('PATCH')}}
                                    <input class="file-upload d-none" id="imageUpload" type="file"
                                    name="applicantPhoto" placeholder="Photo" accept=".png,.jpg,.jpeg" capture novalidate>
                                    <img src="{{asset('img/dist/applicant.png')}}" class="img-circle img-fluid profile-pic" alt="">
                                    <p class="img-text upload-button">UPLOAD PHOTO</p>
                                    <button type="submit" class="btn btn-sm btn-success d-none" id="btnSaveImage">UPLOAD PHOTO</button>
                                </form>
                                @else
                                <form class="d-inline" action="/upload-profile-picture-applicant/{{$applicant_data->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{method_field('PATCH')}}
                                    <input class="file-upload d-none" id="imageUpload" type="file"
                                    name="applicantPhoto" placeholder="Photo" accept=".png,.jpg,.jpeg" capture novalidate>
                                    <img src="/profile/{{$applicant_data->avatar_image_path}}" class="profile-pic hover img-fluid upload-button" id="imgUpload">
                                    <p class="img-text upload-button">UPLOAD PHOTO</p>
                                    <button type="submit" class="btn btn-sm btn-success d-none" id="btnSaveImage">CHANGE</button>
                                </form>
                                <form class="d-inline" action="/default-picture-applicant/{{$applicant_data->id}}" method="POST">
                                    @csrf
                                    {{method_field('PATCH')}}
                                    <button type="submit" class="btn btn-sm btn-danger" id="btnRemoveImage">REMOVE</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>


                <form action="{{ route('applicant.profile.update', Auth::id()) }}" method="post" id="applicantDataForm">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="row mt-2">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name" value="{{ Auth::user()->last_name }}">
                            <span class="invalid-feedback" role="alert" id="lastName"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name" value="{{ Auth::user()->first_name }}">
                            <span class="invalid-feedback" role="alert" id="firstName"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Middle name (opt)" value="{{ Auth::user()->middle_name }}">
                            <span class="invalid-feedback" role="alert" id="middleName"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Email">
                            <span class="invalid-feedback" role="alert" id="email"></span>
                        </div>
                        <div class="form-group group col-md-6">
                            <label class="">Gender</label>
                            <select id="inputGender" name="inputGender" class="form-control">
                                <option value="" disabled selected>Select your gender</option>
                                @for ($i = 0; $i <= 1; $i++)
                                    @if (ucfirst($applicant_data->gender) == $gender[$i])
                                        <option value="{{ $gender[$i] }}" selected>{{ $gender[$i] }}</option>
                                    @else
                                        <option value="{{ $gender[$i] }}">{{ $gender[$i] }}</option>
                                    @endif
                                @endfor
                            </select>
                            <span class="invalid-feedback" role="alert" id="inputGender"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="">Contact Number</label>
                            <input type="number" type="number" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" id="inputPhone" name="inputPhone" placeholder="Contact Number" value="{{ $applicant_data->contact_number }}">
                            <span class="invalid-feedback" role="alert" id="inputPhone"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Date of birth</label>
                            <input class="form-control" type="date" id="inputBirthdate" name="inputBirthdate" value="{{ $applicant_data->birth_date }}">
                            <span class="invalid-feedback" role="alert" id="inputBirthdate"></span>
                        </div>
                        @php
                            $address = ['','','',''];
                            if (isset($applicant_data->address)) {
                                $addr = explode(", ",$applicant_data->address);
                                $address = array_replace($address,$addr);
                                $street = array_slice($addr,3);
                            }else{
                                $street = '';
                            }
                        @endphp
                        <div class="form-group col-md-12">
                            <label class="lbl-font">Region / Province / State</label>
                            <select id="inputState" name="inputState" class="form-control" readonly>
                                <option value="" selected disabled>Choose...</option>
                                @for ($i = 0; $i < count($region); $i++)
                                    @if ($region[$i] == $address[1])
                                        <option value="{{ $region[$i] }}" selected>{{ $region[$i] }}</option>
                                    @else
                                        <option value="{{ $region[$i] }}">{{ $region[$i] }}</option>
                                    @endif
                                @endfor
                            </select>
                            <span class="invalid-feedback" role="alert" id="inputState"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="lbl-font">City</label>
                            <select id="inputCity" name="inputCity" class="form-control">
                                <option value="" selected disabled>Choose...</option>
                                @for ($i = 0; $i < count($city); $i++)
                                    @if ($city[$i] == $address[2])
                                        <option value="{{ $city[$i] }}" selected>{{ $city[$i] }}</option>
                                    @else
                                        <option value="{{ $city[$i] }}">{{ $city[$i] }}</option>
                                    @endif
                                @endfor
                            </select>
                            <span class="invalid-feedback" role="alert" id="inputCity"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="lbl-font">Country</label>
                            <select id="inputCountry" name="inputCountry" class="form-control" readonly>
                                <option value="Philippines" selected>Philippines</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 mb-2">
                            <label>Street Address</label>
                        <input type="text" class="form-control" id="inputSreet" name="inputStreet" placeholder="Optional" value="{{ isset($applicant_data->address)?implode(", ",$street):$street }}">
                            <span class="invalid-feedback" role="alert" id="inputSreet"></span>
                        </div>
                    </div>
                    <div class="text-right mt-2">
                        <input type="hidden" name="hidden_id" value="1">
                        <button type="submit" class="btn btn-sm btn-flat btn-success rounded">Save</button>
                        <button type="button" class="btn btn-sm btn-flat btn-danger rounded" id="cancelEditData">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- end Edit Basic info --}}

        <label class="">Likhain Resume Templates (Default)</label>
        @if ($applicant_work_exp->isNotEmpty() && $applicant_education->isNotEmpty())
            <div class="">
                <button type="button" class="btn btn-sm btn-success" id="previewTemplate" data-toggle="modal" data-target="#modal-xl" data-backdrop="false">PREVIEW</button>
                <button type="submit" class="btn btn-sm btn-success float-left mr-2" id="downloadFile">DOWNLOAD</button>
            </div>
        @else
            <div class="">
                <p class="small">Complete your profile to preview templates</p>
            </div>
        @endif


        {{-- Resume Upload --}}
        <form action="/resume-upload/{{$applicant_data->id}}" method="POST" enctype="multipart/form-data" class="mt-0">
            @csrf
            {{ method_field('PATCH') }}
            <label class="mt-3" for="applicantResume">Upload Resume (Optional)</label>
            <input type="file" class="form-control-file @error('applicantResume') is-invalid @enderror" name="applicantResume" accept=".pdf, .doc, .docx">
            @error('applicantResume')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div id="divUploaded">
                @if ($message = Session::get('updated'))
                        <span class="text-success" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @endif
            </div>
            <small><p class="text-black-50 mb-0">Maximum file size: 3MB (.pdf, .doc, .docx)</p></small>
            <p class="mb-0">
                {{$applicant_data->resume_path}}
            </p>
            @if (!is_null($applicant_data->created_at))
                <p class="font-italic text-success">
                    @if ($applicant_data->updated_at == null)
                    (<strong>Uploaded:</strong> {{\Carbon\Carbon::parse($applicant_data->created_at)->diffForHumans()}})
                    @else
                    (<strong>Updated:</strong> {{\Carbon\Carbon::parse($applicant_data->updated_at)->diffForHumans()}})
                    @endif
                <p>
            @endif

            @if(is_null($applicant_data->resume_path))
                <button type="submit" class="btn btn-sm btn-success float-left mr-2" id="btnSaveResume">UPLOAD</button>
            @else
                <button type="submit" class="btn btn-sm btn-success float-left mr-2" id="btnSaveResume">CHANGE</button>
            @endif
                <button type="reset" class="btn btn-sm btn-outline-secondary float-left" id="btnCancelResume">CANCEL</button>
        </form>
        <div class="modal fade" id="modal-xl" role="dialog" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Resume Templates</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="card p-2">
                                <button type="button" class="btn btn-success mb-2 changeTemplate" data-id="defaultTemplate">Default Template</button>
                                <button type="button" class="btn btn-success mb-2 changeTemplate" data-id="template1">Template 1</button>
                                {{-- <button type="button" class="btn btn-success mb-4">Template 2</button> --}}
                                <label class="mb-1">Includes:</label>
                                <div class="icheck-success">
                                    <input type="checkbox" value="" id="check1" checked>
                                    <label for="check1">Gender</label>
                                </div>
                                <div class="icheck-success">
                                    <input type="checkbox" value="" id="check2" checked>
                                    <label for="check2">Birthdate</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="card p-3 template" id="defaultTemplate">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="text-center"><img src="{{asset('img/dist/applicant.png')}}" class="img-circle img-fluid profile-pic text-center" alt="user-photo" width="128" height="128"></div>
                                        <ul class="ml-4 mb-0 mt-3 fa-ul text-muted" style="font-size:12px">
                                            @if (!empty($applicant_data->gender))
                                                @if (strtolower($applicant_data->gender) == 'male')
                                                    <li class="mb-2 gender"><span class="fa-li"><i class="fas fa-mars"></i></span> {{ $applicant_data->gender }}</li>
                                                @else
                                                    <li class="mb-2 gender"><span class="fa-li"><i class="fas fa-venus"></i></span> {{ $applicant_data->gender }}</li>
                                                @endif
                                            @endif
                                            <li class="mb-2"><span class="fa-li"><i class="fas fa-envelope"></i></span> {{ Auth::user()->email }}</li>
                                            @if (!empty($applicant_data->contact_number))
                                                <li class="mb-2"><span class="fa-li"><i class="fas fa-phone-alt"></i></span> {{ $applicant_data->contact_number }}</li>
                                            @endif
                                            @if (!empty($applicant_data->address))
                                                <li class="mb-2"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span> {{ $applicant_data->address }}</li>
                                            @endif
                                            @if ($applicant_data->birth_date != null)
                                                <li class="mb-2 birthdate"><span class="fa-li"><i class="fas fa-birthday-cake"></i></span> {{ date("F j, Y", strtotime($applicant_data->birth_date)) }}</li>
                                            @endif
                                        </ul>
                                        <hr>
                                        <strong class="pl-1"><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                                        <ul class="pl-4" style="font-size:14px">
                                            @foreach ($applicant_skill as $skill)
                                                <li><span class="">{{ $skill->name }}</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-9">
                                        <h3 class="profile-username">{{ strtoupper(Auth::user()->first_name) }} {{ strtoupper(Auth::user()->last_name) }}</h3>
                                        <hr>
                                        <strong><i class="fas fa-briefcase mr-1"></i> WORK EXPERIENCE</strong>
                                        <div style="font-size:14px">
                                            @foreach ($applicant_work_exp as $work)
                                                <p class="text-muted mb-0">{{ strtoupper($work->job_title) }}</p>
                                                <p class="text-muted mb-0">{{ $work->company_name }} {{ date("M j, Y", strtotime($work->date_from)) }} - {{ date("M j, Y", strtotime($work->date_to)) }}</p>
                                                <strong><p class="text-muted mb-0">Job Description:</p></strong>
                                                <p class="text-muted">{{ $work->description }}</p>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <strong><i class="fas fa-book mr-1"></i> EDUCATION</strong>
                                        <div style="font-size:14px">
                                            @foreach ($applicant_education as $educ)
                                                <p class="text-muted mb-0">{{ strtoupper($educ->education_attainment) }} from the {{ $educ->school }}</p>
                                                <p class="text-muted mb-0">{{ $educ->course_degree }} {{ date("M j, Y", strtotime($educ->date_from)) }} - {{ date("M j, Y", strtotime($educ->date_to)) }}</p>
                                                <strong><p class="text-muted mb-0">Achievements/Description:</p></strong>
                                                <p class="text-muted">{{ $educ->description }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card p-3 d-none template" id="template1">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="profile-username">{{ strtoupper(Auth::user()->first_name) }} {{ strtoupper(Auth::user()->last_name) }}</h3>

                                            <dl class="dl-horizontal" style="font-size:12px">
                                                @if (!empty($applicant_data->gender))
                                                    @if (strtolower($applicant_data->gender) == 'male')
                                                        <dd class="gender"><i class="fas fa-mars"></i> {{ $applicant_data->gender }}</dd>
                                                    @else
                                                        <dd class="gender"><i class="fas fa-venus"></i> {{ $applicant_data->gender }}</dd>
                                                    @endif
                                                @endif

                                                <dd><i class="fas fa-envelope"></i> {{ Auth::user()->email }}</dd>
                                                @if (!empty($applicant_data->contact_number))
                                                    <dd><i class="fas fa-phone-alt "></i> {{ $applicant_data->contact_number }}</dd>
                                                @endif
                                                @if (!empty($applicant_data->address))
                                                    <dd><i class="fas fa-map-marker-alt"></i> {{ $applicant_data->address }}</dd>
                                                @endif
                                                @if ($applicant_data->birth_date != null)
                                                <dd class="birthdate"><i class="fas fa-birthday-cake"></i> {{ date("F j, Y", strtotime($applicant_data->birth_date)) }}</dd>
                                                @endif
                                            </dl>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-right"><img src="{{asset('img/dist/applicant.png')}}" class="img-circle img-fluid profile-pic text-center" alt="user-photo" width="128" height="128"></div>
                                        </div>
                                    </div>
                                    <strong class="pl-1"><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                                    <p class="text-muted">
                                        @foreach ($applicant_skill as $skill)
                                            <span class="badge badge-success">{{ $skill->name }}</span>
                                        @endforeach
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-briefcase mr-1"></i> WORK EXPERIENCE</strong>
                                        <div style="font-size:14px">
                                            @foreach ($applicant_work_exp as $work)
                                                <p class="text-muted mb-0">{{ strtoupper($work->job_title) }}</p>
                                                <p class="text-muted mb-0">{{ $work->company_name }} {{ date("M j, Y", strtotime($work->date_from)) }} - {{ date("M j, Y", strtotime($work->date_to)) }}</p>
                                                <strong><p class="text-muted mb-0">Job Description:</p></strong>
                                                <p class="text-muted">{{ $work->description }}</p>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <strong><i class="fas fa-book mr-1"></i> EDUCATION</strong>
                                        <div style="font-size:14px">
                                            @foreach ($applicant_education as $educ)
                                                <p class="text-muted mb-0">{{ strtoupper($educ->education_attainment) }} from the {{ $educ->school }}</p>
                                                <p class="text-muted mb-0">{{ $educ->course_degree }} {{ date("M j, Y", strtotime($educ->date_from)) }} - {{ date("M j, Y", strtotime($educ->date_to)) }}</p>
                                                <strong><p class="text-muted mb-0">Achievements/Description:</p></strong>
                                                <p class="text-muted">{{ $educ->description }}</p>
                                            @endforeach
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/css/applicant_dashboard.css">
    <link rel="stylesheet" href="{{asset('users/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('users/css/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
@stop
@section('js')    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script src="{{asset('js/applicant/profile.js')}}"></script>
@stop
