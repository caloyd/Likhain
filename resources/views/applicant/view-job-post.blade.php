@extends('applicant.layout.layout')

@section('title', 'View Job Post')

@section('content_header')
    <h1>Job Board</h1>
    <hr>
@stop

@section('content')
    <div class="col-md-10 offset-md-1 bg-light b-1 mb-3">
        @foreach($job_post_detail as $job_post)
@if(is_null($job_post->company_video_path))
        
@else
        <div id="myModal" class="modal fade" id="addLeaveRequest" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="leaveRequestModal">COMPANY VIDEO</h5>
                    </div>
                <div class="modal-body">
                    <div class="col-md-12 text-center">
                        <video width="100%" src="/{{ $job_post->company_video_path }}" controls autoplay></video>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
@endif
        <p class="text-right text-muted"><small>Posted {{\Carbon\Carbon::parse($job_post->created_at)->diffForHumans()}}</small> </p>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-md-1 text-center">
                        <img src="/{{$job_post->company_logo_path}}" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h4 class="text-dark mb-0">{{$job_post->title}}</h4>
                        <a href="/applicant/company-details/{{$job_post->company_id}}">
                        <h6 class="text-green mb-1">{{$job_post->company_name}}</h6></a>
                        <small><p class="text-dark mb-0">{{$job_post->job_location}}</p></small>
                        <p class="text-dark mb-0">{{$job_post->job_specialization}}</p>
                        <p class="text-dark mb-0">{{number_format($job_post->salary_range_minimum, 2)}} - {{number_format($job_post->salary_range_maximum, 2)}} {{$job_post->name}}/month</p>

                    </div>
                    <div class="col-md-3 text-right">

                        @if(count($applicant_educ) == 0 || is_null($applicant_detail->expected_salary) || is_null($applicant_detail->gender) || is_null($applicant_detail->birth_date))
                            <span tabindex="0" data-toggle="tooltip" data-placement="top" title="Please complete Minimum Req. Profile to apply(Basic Profile, Education and Expected Salary)">
                            <button class="btn btn-block btn-primary disabled">APPLY<i class="fas fa-paper-plane ml-2" ></i></button>
                            </span>
                        @else
                        <a href="/applicant/submit-job-application/{{$job_post->id}}" class="btn btn-block btn-primary float-right w-75 mb-2">APPLY<i class="fas fa-paper-plane ml-2"></i></a>
                        @endif

                        <form action="/add-save-job-post" id="saveJobForm" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$job_post->id}}">
                            <button class="btn btn-block btn-success mt-2 float-right w-75 mb-2"  id="btnSaveJob">SAVE<i class="fas fa-bookmark ml-2"></i></button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3" style="width: 100%;">
                        <p><strong>Job Description</strong> </p>
                        <ul class="text-justify d-block">
                            <li>{{$job_post->description}}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <p><strong>Minimum Qualifications</strong></p>
                        <ul class="text-justify">
                        <li>{{$job_post->education_level}}</li>
                        <li>{{$job_post->years_experience}}</li>
                        <li>{{$job_post->position_level}}</li>
                        <li>{{$job_post->employment_type}}</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Required Skills</strong></p>
                        <ul class="text-justify">
                            <li>{{$job_post->skill}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
        {{-- Recommended Jobs --}}
        <div class="col-md-10 offset-md-1 mt-4">
            <h5 class="mx-0"><strong>Recommended Jobs</strong></h5>
            <hr>
        </div>
        @foreach($recom_jobs as $jobs)
        <div class="col-md-10 offset-1 card mt-4">
            <div class="card-body pb-0">
                <p class="text-right">
                    <small>Posted {{\Carbon\Carbon::parse($jobs->created_at)->diffForHumans()}}</small>
                </p>
                <div class="row">
                    <div class="col-md-1">
                        <img src="/{{$jobs->company_logo_path}}" class="img-fluid">
                    </div>
                    <div class="col-md-11">
                        <a href="/applicant/view-job-post/{{$jobs->id}}">
                            <h5 class="mb-0"><strong class="text-success">{{$jobs->title}}</strong></h5>
                        </a>
                        <p class="mb-0">{{$jobs->company_name}}<i class="fa fa-check-circle ml-2 text-green" title="Verified company"></i></p>
                        <p class="mb-0">{{number_format($jobs->salary_range_minimum, 2)}} - {{number_format($jobs->salary_range_maximum, 2)}} {{$jobs->name}}/month</p>
                        <p class="mb-0">{{$jobs->job_location}}</p>
                        <p id="viewMore{{$jobs->job_post_id}}" class="collapse">{{$jobs->description}}
                        </p>
                        <br>
                        <a href="#" data-target="#viewMore{{$jobs->job_post_id}}" data-toggle="collapse" class="btnViewToggle" data-id="{{$jobs->job_post_id}}">
                            <p class="" id="more{{$jobs->job_post_id}}"><small>View more details</small><p>
                            <p class="d-none" id="less{{$jobs->job_post_id}}"><small>View less</small></p>
                        </a>
                    </div>
                </div>
                <div class="modal-footer modified">
                    <form action="/add-save-job-post" id="addSaveJob{{$jobs->job_post_id}}" method="POST">
                            @csrf
                        <input type="hidden" name="post_id" value="{{$jobs->job_post_id}}">
                        <button type="submit" class="btn text-blue saveJob" data-id="{{$jobs->job_post_id}}">
                            <small>Save this Job to view later.</small>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        {{-- end Recommended Jobs --}}
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/applicant_dashboard.css')}}">
@stop

@section('js')
    <script src="{{asset('js/applicant/view_job_post.js')}}"></script>
@stop
