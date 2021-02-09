@extends('employer.layout.layout')

@section('title', 'Applicant Interview')

@section('content_header')
    <h1>APPLICANT INTERVIEW</h1>
    <hr>
@stop
@section('content')
@include('employer.include.modal.employer-set-job-offer-modal')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="col-md-12">
        <button type="button" class="btn btn-danger btnMassDelete" data-url="{{ url('multiDeleteInterview') }}"><i class="fas fa-trash mr-2"></i>DELETE</button>
    </div>
    <div class="col-md-12 employer-table">
        <table id="interviewList" class="table table-bordered">
            <thead class="bg-info">
                <tr>
                    <th class="text-center">
                        <input type="checkbox" name="" id="selectAll" class="align-middle">
                    </th>
                    <th>Applicant Name</th>
                    <th>Interview Date & Time</th>
                    <th>Job Post</th>
                    <th>Applicant Decision</th>
                    <th>Interviewer</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- EmployerController --}}
                @foreach($applicant as $applicants)
                <tr id="tr_{{$applicants->id}}">
                    <td class="text-center">
                        <input type="checkbox" class="checkbox align-middle sub_chk" data-id="{{$applicants->id}}">
                    </td>
                <td class="align-middle">{{$applicants->first_name}} {{$applicants->last_name}}</td>
                <td class="align-middle">{{\Carbon\Carbon::parse($applicants->interview_date)->format('F d, Y')}} {{$applicants->start_time}}</td>
                <td class="align-middle">{{$applicants->title}}</td>
                @if(is_null($applicants->interview_applicant_decision))
                <td class="align-middle text-muted">N/A</td>
                @else
                <td class="align-middle">{{$applicants->interview_applicant_decision}}</td>
                @endif
                <td class="align-middle">{{$applicants->recruiter_name}}</td>
                <td class="align-middle">{{$applicants->interview_type}}</td>
                    <td>
                        <div class="buttons">
                            <button type="submit" class="btn btn-info" data-toggle="modal"
                            data-target="#viewInterviewProfile{{$applicants->id}}">
                                <i class="fas fa-eye"></i>
                            </button>

                            <button type="submit" class="btn btn-warning"
                            data-toggle="modal"
                            data-target="#setJobOffer1"
                            data-applicantid="{{$applicants->applicant_id}}"
                            data-interviewid="{{$applicants->id}}"
                            data-jobpostid="{{$applicants->job_post_id}}"
                            data-fname="{{$applicants->first_name}}"
                            data-lname="{{$applicants->last_name}}"
                            data-placement="top" title="Set Job Offer">
                                <i class="fas fa-envelope text-white"></i>
                            </button>
                            <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#updateApplicantInterview{{$applicants->id}}"
                            data-placement="top" title="Set Interview Update">
                                <i class="fas fa-sync"></i>
                            </button>
                            <a href="video-call-interview/{{$applicants->applicant_id}}/{{$applicants->first_name}}{{$applicants->last_name}}" class="btn btn-info" role="button"><i class="fas fa-video"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        @foreach($applicant as $applicants)
        <div class="modal fade" id="updateApplicantInterview{{$applicants->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title">INTERVIEW UPDATE - {{$applicants->title}} for {{$applicants->first_name}} {{$applicants->last_name}}</h5>
                        <button type="button" class="close btn-close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <form action="update-interview/{{$applicants->id}}" id="updateInterviewForm{{$applicants->id}}" class="updateInterviewForm" method="POST">
                                @csrf
                                {{method_field('PATCH')}}
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <select class="custom-select interviewResult" name="interviewResult" id="interviewStat{{$applicants->id}}">
                                            <option selected disabled hidden>Status</option>
                                            <option value="Pass">PASS</option>
                                            <option value="Fail">FAIL</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">

                                        <select class="custom-select interviewStatus" name="interviewStatus" id="interviewStatus{{$applicants->id}}" disabled>
                                            <option selected disabled>Interview Status</option>
                                            <option value="Initial">Initial</option>
                                            <option value="Technical">Technical</option>
                                            <option value="Final">Final</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select class="form-control interviewType" id="interviewType{{$applicants->id}}" name="interviewType" disabled>
                                            <option selected disabled>Interview Type</option>
                                            <option value="Video Call">Video Call</option>
                                            <option value="Personal">Personal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6" id="dateOnly">
                                        <input type="text" class="form-control datetimepicker-input updateInterview" data-target="#updateInterview{{$applicants->id}}" data-toggle="datetimepicker" placeholder="Interview Date" id="updateInterview{{$applicants->id}}" data-id="{{$applicants->id}}" name="updateInterview" autocomplete="off" disabled/>
                                    </div>
                                    <div class="form-group col-md-6" id="startTime">
                                        <input type="text" class="form-control datetimepicker-input updateTimeStart @error('updateTimeStart') is-invalid @enderror" data-target="#updateTimeStart{{$applicants->id}}" data-toggle="datetimepicker" placeholder="Start Time" id="updateTimeStart{{$applicants->id}}" data-id="{{$applicants->id}}" name="updateTimeStart" autocomplete="off" disabled/>
                                        @error('updateTimeStart')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control updateAddress @error('updateAddress') is-invalid @enderror" placeholder="Address" name="updateAddress" id="updateAddress{{$applicants->id}}" value="{{ old('updateAddress') }}" disabled>
                                        @error('updateAddress')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control updateInterviewee @error('updateInterviewee') is-invalid @enderror" placeholder="Interviewee" name="updateInterviewee" id="updateInterviewee{{$applicants->id}}" value="{{ old('updateInterviewee') }}" disabled>
                                        @error('updateInterviewee')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control updateContactNumber @error('updateContactNumber') is-invalid @enderror" placeholder="Contact Number" name="updateContactNumber" id="updateContactNumber{{$applicants->id}}" value="{{ old('updateContactNumber') }}" disabled>
                                        @error('updateContactNumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <p>Notes / Instructions</p>
                                        <textarea class="form-control resizable-none updateNotes @error('updateNotes') is-invalid @enderror"  rows="8" name="updateNotes" id="updateNotes{{$applicants->id}}" disabled>@error('updateNotes') {{$message}}@enderror</textarea>
                                    </div>
                                </div>
                            <div class="set-del-close">
                                <button type="button" class="btn btn-sm btn-success btnConfirmUpdateInterview" data-id="{{$applicants->id}}">CONFIRM</button>
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
{{-- APPLICANT INTERVIEW PROFILE -MODAL --}}
<div class="modal fade" id="viewInterviewProfile{{$applicants->id}}" tabindex="-1" role="dialog" aria-labelledby="applicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="applicantModalLabel">
                    {{$applicants->first_name}}</h5>&nbsp;
                    <h5 class="modal-title" id="applicantModalLabelLast">
                    {{$applicants->last_name}}</h5>&nbsp;
                    <h5 class="modal-title">PROFILE</h5>
                    <button type="button" class="close btn-close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="font-weight-bold mb-0" id="email">{{$applicants->email}}</p>
                            <p class="font-weight-bold mb-0" id="contact_no">{{$applicants->contact_number}}</p>
                            <p class="font-weight-bold mb-0" id="expected_salary">{{number_format($applicants->expected_salary, 2)}}</p>
                            <h6 class="font-weight-bold mt-3">Skills - Years of Experience</h6>
                            <p id="skills">
                            @foreach ($applicant_skills as $skill)
                                    @if ($skill->id == $applicants->app_id)
                                        <div class="row">
                                        <div class="col-6">
                                        {!!implode('<br>',$skill->skills()->get()->pluck('name')->toArray())!!}
                                        </div>
                                        <div class="col-6">
                                        {!!implode('<br>',$skill->applicantSkills()->get()->pluck('years_of_experience')->toArray())!!}
                                        </div>
                                        </div>
                                    @endif
                                @endforeach
                            </p>
                        </div>                     
                        <div class="col-md-4">
                        @if(is_null($applicants->avatar_image_path))
                            <img src="{{asset('img/employer_dashboard/Applicant.png')}}" alt="" class="w-75">
                        @else
                        <img src="/profile/{{$applicants->avatar_image_path}}"  class="w-75">
                        @endif
                        </div>
                    </div> 
                    <div class="row accordion" id="accordionEducation">
                        <div class="col-md-12">                 
                            <div class="card-header px-0 pb-0" id="headingEducation">
                                <button class="btn float-right collapsed" type="button" data-toggle="collapse" data-target="#collapseEducation" aria-expanded="false" aria-controls="collapseEducation">
                                    <i class="fas fa-caret-down drp-down"></i>   
                                </button>
                                <p class="font-weight-bold mb-0">Education</p>
                            </div>
                            <div id="collapseEducation" class="collapse" aria-labelledby="headingEducation" data-parent="#accordionEducation">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="font-weight-bold" id="school">{{$applicants->school}}
                                            </p>
                                        </div>
                                        <div class="col-md-6">  
                                            <p>
                                                <span id="dateFrom">{{$applicants->date_begin}}</span> - <span  id="dateTo">{{$applicants->date_end}}</span>
                                            </p>
                                        </div>   
                                    </div>  
                                </div>
                            </div>          
                        </div>
                    </div>
                    <div class="row accordion" id="accordionWorkExp">
                            <div class="col-md-12">                 
                                <div class="card-header px-0 pb-0" id="headingWorkExp">
                                    <button class="btn float-right collapsed" type="button" data-toggle="collapse" data-target="#collapseWorkExp" aria-expanded="false" aria-controls="collapseWorkExp">
                                        <i class="fas fa-caret-down drp-down"></i>   
                                    </button>
                                    <p class="font-weight-bold mb-0">Work Experience</p>
                                </div>
                                <div id="collapseWorkExp" class="collapse" aria-labelledby="headingWorkExp" data-parent="#accordionWorkExp">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                            @foreach($applicant_work as $work)
                                                @if($work->id == $applicants->app_id)
                                                <p class="font-weight-bold mb-0" id="company">
                                                {!!implode("<br>",$work->applicantWorkExperiences->pluck('company_name')->toArray())!!}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="font-weight-bold mb-0" id="jobTitle"> {!!implode("<br>",$work->applicantWorkExperiences->pluck('job_title')->toArray())!!}
                                                </p>
                                                <p class="mb-0"><span id="datebegin">
                                                {!!implode("<br>",$work->applicantWorkExperiences->pluck('date_from')->toArray())!!}</span> - <span id="dateend"> {!!implode("<br>",$work->applicantWorkExperiences->pluck('date_to')->toArray())!!}</span></p>
                                                <p id="salary">{!!implode("<br>",$work->applicantWorkExperiences->pluck('previous_salary')->toArray())!!}
                                                </p>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>          
                            </div>
                        </div>                     
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <p class="font-weight-bold">Interview Status & Result</p>
                            </div>
                            <div class="col-md-5 mt-2">
                                <h5 id="interviewStatus"></h5>
                            </div>
                            <div class="col-md-7 mt-2">
                                <p class="text-green"><strong id="interviewResult"></strong></p>
                            </div>
                        </div>
                    <div class="set-del-close">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CLOSE</button>
                    </div>     
                
                </div>
            </div>
        </div>
    </div>
    @endforeach
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/employer_dashboard.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('js/employer/applicant_interview.js')}}"></script>
@stop   
