@extends('employer.layout.layout')

@section('title', 'View Applicants')

@section('content_header')
    <h1>VIEW  APPLICANTS</h1>
    <hr>
@stop

@section('content')
@include('employer.include.modal.employer-set-interview-modal')

    <div class="col-md-12">
        <h5><b>{{$applicants->title}}</b></h5>
    </div>
    <div class="col-md-4">
        <table class="table border-bottom">
                <thead class="bg-info">
                    <tr>
                    <th>Profile</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- From JobPostCotroller --}}
                    @foreach ($user_applicant as $user_app) 
                    <tr>
                        <td>
                            @if(is_null($user_app->avatar_image_path))
                            <img src="{{asset('img/employer_dashboard/Applicant.png')}}" alt="" class="w-25">
                            @else
                            <img src="/profile/{{$user_app->avatar_image_path}}" class="w-25">
                            @endif
                            <p class="applicant-name"><b>{{$user_app->first_name}} {{$user_app->last_name}}</b><br>{{$user_app->email}}<br>
                            {{$user_app->contact_number}}
                            </p>
                        </td>
                        <td class="border-right">
                            <div class="mr-1">
                                <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#viewApplicant{{$user_app->app_id}}">
                                    <i class="fas fa-eye"></i>
                                </button>

                                <button type="submit" class="btn btn-success" data-target="#setInterview" 
                                data-toggle="modal"
                                data-applicantid="{{$user_app->app_id}}"
                                data-jobpostid="{{$applicants->id}}"
                                data-fname="{{$user_app->first_name}}"
                                data-lname="{{$user_app->last_name}}">
                                    <i class="fas fa-calendar-alt"></i>
                                </button>

                            <form class="d-inline" action="/delete-applicant/{{$user_app->job_app_id}}" id="deleteApplicant{{$user_app->job_app_id}}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                        <button type="button" class="btn btn-danger btnDelete" data-id="{{$user_app->job_app_id}}">
                                        <i class="fas fa-trash-alt"></i>
                                        </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                   
            </tbody>
        </table>
    </div>
    <div class="col-md-8" id="calendar">
    </div>

    @foreach($user_applicant as $user_app)
    <div class="modal fade" id="viewApplicant{{$user_app->app_id}}" tabindex="-1" role="dialog" aria-labelledby="applicantModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="applicantModalLabel">{{$user_app->first_name}}</h5>&nbsp;
                        <h5 class="modal-title" id="applicantModalLabel2">{{$user_app->last_name}}</h5>&nbsp;
                        <h5 class="modal-title">Profile</h5>
                        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 info">
                                <p class="font-italic mb-0">{{$user_app->job_pitch}}</p>
                                <p class="font-weight-bold mb-0" id="email">{{$user_app->email}}</p>
                                <p class="font-weight-bold mb-0" id="contact_no">{{$user_app->contact_number}}</p>
                                <p class="font-weight-bold mb-0" id="exp_salary">{{number_format($user_app->expected_salary, 2)}}</p>
                                
                                <h6 class="font-weight-bold mt-4">Skills - Years of Experience</h6>
                                <p id="skill">
                                @foreach ($applicant_skills as $skill)
                                    @if ($skill->id == $user_app->app_id)
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
                            @if(is_null($user_app->avatar_image_path))
                                <img src="{{asset('img/employer_dashboard/Applicant.png')}}" alt="" class="w-75">
                            @else
                            <img src="/profile/{{$user_app->avatar_image_path}}"  class="w-75">
                            @endif
                            </div>
                        </div> 
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h6 class="font-weight-bold">Education</h6>
                            </div>
                            <div class="col-md-6">
                                <p class="font-weight-bold" id="school">{{$user_app->school}}</p>
                            
                            </div>
                            <div class="col-md-6">
                                <p class="mb-0"><span id="dateFrom">{{$user_app->date_from}}</span> - <span id="dateTo">{{$user_app->date_to}}</span></p>
                                <p id="educ">{{$user_app->course_degree}}</p>
                            </div>   
                        </div>  
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h6 class="font-weight-bold">Work Experience</h6>
                            </div>
                            <div class="col-md-3">
                            @foreach ($applicant_work as $work)
                                @if($work->id == $user_app->app_id)
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.0/dist/fullcalendar.min.css">
@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.0/dist/fullcalendar.min.js"></script>
<script src="{{asset('js/employer/view_applicant.js')}}"></script>
<script>
    $(document).ready(function() {
    calendar = $('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
        nowIndicator: true,
        header: {
            right: 'prev today next',
            left: 'title'
        },
        events: [
                 @foreach($interview as $interviews)
                 {
                    title: '{{$interviews->first_name}} {{$interviews->last_name}}',
                    start: '{{$interviews->interview_date}}'
                 },
                 @endforeach
                 ],
                 timeformat: 'h(:mm)'
    });
});

</script>
@stop