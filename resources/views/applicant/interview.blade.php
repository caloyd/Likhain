@extends('applicant.layout.layout')

@section('title', 'Interview')

@section('content_header')
    <h1>INTERVIEWS</h1>
    <hr>
@stop

@section('content')

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#upcoming" role="tab" aria-controls="upcoming" aria-selected="true">Upcoming Interviews</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending Interviews</a>
        </li>
    </ul>


    <div class="col-md-12 tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="profile-tab">

                @foreach ($interview as $interviews)
                @if(is_null($interviews->interview_applicant_decision))
            <div class="row bg-white m-2 p-4">
                <div class="col-md-2 text-center">
                    <div style="color:red;font-size:12px;" class="text-left">
                        <?php echo $interviews->views > 0 ? "" : "*New" ?>
                    </div>
                    <img src="/{{$interviews->company_logo_path}}" class="img-fluid"  alt="" width="200" height="200">
                    <p class="verified"><i class="fas fa-check-circle text-green"></i> Verified Company</p>
                </div>
                <div class="col-md-7">
                    <h5 class="interview-title"><b>{{$interviews->interview_type}}</b>
                        interview with <b>{{$interviews->company_name}} </b>for
                    <a href="/applicant/view-job-post/{{$interviews->job_post_id}}">
                        <strong class="highlight-text">{{$interviews->title}}</strong>
                    </a>
                    </h5>
                    <p><i class="fas fa-map-marker-alt location"></i> {{$interviews->interview_address}}</p>
                    <p>
                        <div id="readMore{{$interviews->id}}" class="collapse interview-desc">{{$interviews->interview_notes}}
                        </div>

                        <a href="#" data-target="#readMore{{$interviews->id}}" data-toggle="collapse" class="btnViewToggle" data-id="{{$interviews->id}}">
                            <p id="more{{$interviews->id}}"><small>Read more</small></p>
                            <p class="d-none" id="less{{$interviews->id}}"><small>Read less</small></p>
                        </a>
                    </p>
                </div>
                <div class="col-md-3">
                    <p class="text-right">Invited: {{\Carbon\Carbon::parse($interviews->created_at)->format('F d, Y')}}</p>
                    <p class="text-center"><strong>{{\Carbon\Carbon::parse($interviews->interview_date)->format('F d, Y')}} {{$interviews->start_time}}</strong></p>
                    <h6 class="contact-person text-center mb-0">{{$interviews->recruiter_name}} : {{$interviews->recruiter_contact}}</h6>
                    <p class="text-center"><small>Contact Person</small></p>

                        {{-- @if(is_null($interviews->interview_applicant_decision)) --}}
                            <div class="text-center">
                                <form class="d-inline" action="/applicant-interview-decision-accept/{{$interviews->id}}" id="interviewDecisionAccept{{$interviews->id}}" method="POST">
                                    @csrf
                                    {{method_field('PATCH')}}
                                    <input type="hidden" name="accept" value="Accept">
                                    <button type="button" class="btn btn-outline-success btn-sm acceptInterview" data-id="{{$interviews->id}}">ACCEPT</button>
                                </form>

                                <button type="button" class="btn btn-outline-primary btn-sm" data-target="#rescheduleModal{{$interviews->id}}" data-toggle="modal"
                                >RESCHEDULE</button>
                                <form class="d-inline" action="/applicant-interview-decision-decline/{{$interviews->id}}" id="interviewDecisionDecline{{$interviews->id}}" method="POST">
                                    @csrf
                                    {{method_field('PATCH')}}
                                    <input type="hidden" name="decline" value="Declined">
                                    <button type="button" class="btn btn-outline-danger btn-sm declineInterview" data-id="{{$interviews->id}}">DECLINE</button>
                                </form>
                            </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>


        <div class="tab-pane fade" id="upcoming" role="tabpanel" aria-labelledby="home-tab">
        {{-- id="pending" role="tabpanel" aria-labelledby="profile-tab" --}}

                @foreach ($interview as $interviews)
                @if(!is_null($interviews->interview_applicant_decision))

                <div class="row bg-white m-2 p-4">

                    <div class="col-md-2 text-center">
                        <img src="/{{$interviews->company_logo_path}}" class="img-fluid"  alt="" width="200" height="200">
                        <p class="verified"><i class="fas fa-check-circle text-green"></i> Verified Company</p>
                    </div>
                    <div class="col-md-7">
                        <h5 class="interview-title"><b>{{$interviews->interview_type}}</b>
                            interview with <b>{{$interviews->company_name}} </b>for
                        <a href="/applicant/view-job-post/{{$interviews->job_post_id}}">
                            <strong class="highlight-text">{{$interviews->title}}</strong>
                        </a>
                        </h5>
                        <p><i class="fas fa-map-marker-alt location"></i> {{$interviews->interview_address}}</p>
                        <p>
                            <div id="readMore{{$interviews->id}}" class="collapse interview-desc">{{$interviews->interview_notes}}
                            </div>

                            <a href="#" data-target="#readMore{{$interviews->id}}" data-toggle="collapse" class="btnViewToggle" data-id="{{$interviews->id}}">
                                <p id="more{{$interviews->id}}"><small>Read more</small></p>
                                <p class="d-none" id="less{{$interviews->id}}"><small>Read less</small></p>
                            </a>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="text-right">Invited: {{\Carbon\Carbon::parse($interviews->created_at)->format('F d, Y')}}</p>
                        <h5 class="text-center"><strong>{{\Carbon\Carbon::parse($interviews->interview_date)->format('F d, Y')}} {{$interviews->start_time}}</strong></h5>
                        <center> <a href="video-call-interview/{{$interviews->job_post_id}}/{{Auth::user()->first_name}}{{Auth::user()->last_name}}" class="btn btn-info" role="button"><i class="fas fa-video"></i></a></center><br>
                        <h6 class="contact-person text-center mb-0">{{$interviews->recruiter_name}} : {{$interviews->recruiter_contact}}</h6>
                        <p class="text-center"><small>Contact Person</small></p>

                            @if ($interviews->interview_applicant_decision === "Accept")
                                <p class="text-center">You
                                        <b class="text-primary">{{$interviews->interview_applicant_decision}}</b> this interview</p>
                            @elseif ($interviews->interview_applicant_decision === "Declined")
                                <p class="text-center">You
                                    <b class="text-danger">{{$interviews->interview_applicant_decision}}</b> this interview</p>
                            @else
                            <p class="text-center">Rescheduled:
                                    <b class="text-primary">{{$interviews->interview_applicant_decision}}</b></p>
                            @endif
                    </div>
                </div>
                @endif
                @endforeach
            </div>
    </div>
    @foreach ($interview as $interviews)
    <div class="modal fade" id="rescheduleModal{{$interviews->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Reschedule Interview - {{$interviews->title}}</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <form action="/applicant-interview-reschedule/{{$interviews->id}}" id="interviewReschedule{{$interviews->id}}" method="POST" class="interviewRescheduleValidate">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-row">

                        <div class="form-group col-md-6" id="date">
                            <input class="form-control datetimepicker-input @error('interviewDate') is-invalid @enderror" id="datetimepicker{{$interviews->id}}"  data-target="#datetimepicker{{$interviews->id}}" data-toggle="datetimepicker" name="interviewDate" type="text" data-id="{{$interviews->id}}" placeholder="Interview Date" value="{{ old('interviewDate') }}" required>
                                @error('interviewDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group col-md-6" id="time">
                                <input class="form-control @error('interviewStart') is-invalid @enderror" id="timepicker{{$interviews->id}}" data-target="#timepicker{{$interviews->id}}" data-toggle="datetimepicker" name="interviewStart" type="text" data-id="{{$interviews->id}}" placeholder="Interview Time" value="{{ old('interviewStart') }}" autocomplete="off" required>
                                    @error('interviewStart')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary saveInterview" data-id="{{$interviews->id}}">Reschedule</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>

                </div>
            </div>

            </div>
            @endforeach

@stop

@section('css')

    <link rel="stylesheet" href="{{asset('css/interview_page.css')}}">
    <link rel="stylesheet" href="{{asset('users/css/select2-bootstrap4.min.css')}}">

@stop

@section('js')
    <script src="{{asset('js/applicant/interview.js')}}"></script>
@stop
