@extends('employer.layout.layout')

@section('title', 'Applicant Search')

@section('content_header')
    <h1>APPLICANT SEARCH</h1>
    <hr>
@stop
@section('content')

@include('employer.include.modal.applicant-search-modal')
    <div class="col-md-12">
            <table id="applicantSearch" class="table">
                <thead class="bg-info">
                    <tr>
                        <th>Profile</th>
                        <th>Work Experience</th>
                        <th>Skills</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- EmployerController --}}
                    @foreach ($app_profile as $profile)
                    <tr>
                        <td> 
                            <div class="profile-info"> 
                                    <div class="profile-name-number">
                                    <h5><b>{{$profile->first_name}} {{$profile->last_name}}</b></h5>
                                    <h6>{{$profile->contact_number}}</h6>
                                    <p>{{$profile->email}}</p>        
                                    </div>
                                @if(is_null($profile->avatar_image_path))
                                <img src="{{asset('img/employer_dashboard/Applicant.png')}}" class="applicantPic" alt="" width="100" height="100">
                                @else
                                <img src="/profile/{{$profile->avatar_image_path}}" class="img-fluid" width="100" height="100" alt="">
                                @endif                             
                            </div>                                                            
                        </td>
                    <td>
                        <div class="profile-work mt-2">
                            @foreach ($applicant_work as $work)
                                @if($work->id == $profile->app_id)
                                <div class="row">
                                <div class="col-6">
                                {!!implode("<br>",$work->applicantWorkExperiences->pluck('job_title')->toArray())!!}
                                </div>
                                <div class="col-6">
                                  <p class="font-weight-bold">
                                 {!!implode("<br>",$work->applicantWorkExperiences->pluck('company_name')->toArray())!!}</p>
                                 </div>
                                 </div>
                        </div>
                    </td>
                        @foreach ($applicant_skills as $skill)
                            @if ($skill->id == $profile->app_id)
                            <td>{!!implode("<br>",$skill->skills->pluck('name')->toArray())!!} 
                            </td>
                        <td>
                            <div class="buttons">
                                <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#viewApplicantSearchProfile{{$profile->app_id}}">
                                <i class="fas fa-eye"></i>
                                </button>
                                
                                <button type="submit" class="btn btn-success" data-toggle="modal" 
                                data-target="#setInterviewApplicantSearch" 
                                data-appid="{{$profile->app_id}}"
                                data-appfirstname="{{$profile->first_name}}"
                                data-applastname="{{$profile->last_name}}">
                                    <i class="fas fa-calendar-alt"></i>
                                </button>                   
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @endforeach
                    
                </tbody>
            </table>
    
        </div>
        @foreach ($app_profile as $profile)
        <div class="modal fade" id="viewApplicantSearchProfile{{$profile->app_id}}" tabindex="-1" role="dialog" aria-labelledby="applicantModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="applicantModalLabel">{{$profile->first_name}}</h5>&nbsp;
                        <h5 class="modal-title" id="applicantModalLabel2">{{$profile->last_name}}</h5>&nbsp;
                        <h5 class="modal-title">Profile</h5>
                        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 info">
                                <p class="font-weight-bold mb-0" id="email">{{$profile->email}}</p>
                                <p class="font-weight-bold mb-0" id="contact_no">{{$profile->contact_number}}</p>
                                <p class="font-weight-bold mb-0" id="exp_salary">{{number_format($profile->expected_salary, 2)}}</p>
                                
                                <h6 class="font-weight-bold mt-4">Skills - Years of Experience</h6>
                                <p id="skill">
                                @foreach ($applicant_skills as $skill)
                                    @if ($skill->id == $profile->app_id)
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
                            @if(is_null($profile->avatar_image_path))
                                <img src="{{asset('img/employer_dashboard/Applicant.png')}}" alt="" class="w-75">
                                @else
                                <img src="/profile/{{$profile->avatar_image_path}}"  class="w-75">
                                @endif
                            </div>
                        </div> 
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h6 class="font-weight-bold">Education</h6>
                            </div>
                            <div class="col-md-6">
                                <p class="font-weight-bold" id="school">{{$profile->school}}</p>
                                <!-- <p>{{$profile->education_attainment}}</p> -->
                                
                            </div>
                            <div class="col-md-6">
                                <p class="mb-0"><span id="dateFrom">{{$profile->date_begin}}</span> - <span id="dateTo">{{$profile->date_end}}</span></p>
                                <p id="educ">{{$profile->course_degree}}</p>
                            </div>   
                        </div>  
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h6 class="font-weight-bold">Work Experience</h6>
                            </div>
                            <div class="col-md-3">
                            @foreach ($applicant_work as $work)
                                @if($work->id == $profile->app_id)
                                <p class="mb-0" id="companyName">
                                {!!implode("<br>",$work->applicantWorkExperiences->pluck('company_name')->toArray())!!}
                                </p>
                                
                            </div>
                            <div class="col-md-3">
                                <p class="font-weight-bold mb-0" id="jobTitle">
                                {!!implode("<br>",$work->applicantWorkExperiences->pluck('job_title')->toArray())!!}
                                </p>
                            
                            </div>
                            <div class="col-md-3">
                            <p><span id="begin"> {!!implode("<br>",$work->applicantWorkExperiences->pluck('date_from')->toArray())!!}</span><span id="end"> {!!implode("<br>",$work->applicantWorkExperiences->pluck('date_to')->toArray())!!}</span>
                            </p>
                            </div>
                            <div class="col-md-3">
                            <p>
                            {!!implode("<br>",$work->applicantWorkExperiences->pluck('previous_salary')->toArray())!!}
                            </p>
                            </div> 
                            @endif
                            @endforeach
                            <div class="col-md-4 mt-5">
                                
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
    <link rel="stylesheet" href="{{asset('users/css/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('users/css/select2.min.css')}}">
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('users/js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/employer/applicant_search.js')}}"></script>
@stop   