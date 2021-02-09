@extends('applicant.layout.layout')

@section('title', 'Company Details')

@section('content_header')
    {{-- ApplicantController --}}
    <h1>Company Details</h1>
    <hr>
@stop

@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row bg-white p-4">
            <div class="col-md-2 text-center">
                @if(is_null($company->company_logo_path))
                <img src="{{asset('img/companies/def-logo-company.png')}}" class="img-fluid" width="150" height="150">
                @else
                <img src="/{{$company->company_logo_path}}" class="img-fluid mt-4" width="150" height="150">
                @endif
            </div>
            <div class="col-md-5">
            <h5 class="mt-4 ml-3"><strong>{{$company->company_name}}</strong></h5>
            <p class="ml-3">Website:<a href="#" class="ml-1">{{$company->website}}</a></p>
                <div class="row mt-1 ml-2">
                    <div class="col-md-9">
                    <p><i class="fas fa-map-marker-alt location"></i><strong class="ml-1">Address</strong><br>{{$company->address}}</p>
                    </div>
                    <div class="col-md-9">
                    <p><i class="far fa-envelope"></i><strong class="ml-1">Email</strong><br>{{$company->company_email}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
            <p class="mt-4"><strong class="mr-1">Company Size:</strong>{{$company->number_of_employees}}</p>
            <p><strong>Office hours</strong><br>{{$company->working_hours}}</p>
            <p><strong class="mr-1">Dress Code:</strong>{{$company->dress_code}}</p>
            <p><strong class="mr-1">Spoken language:</strong>{{$company->language}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5 class="mt-3"><strong>ABOUT</strong></h5>
                <div class="about-details p-3 text-justify">
                    <p>{{$company->description}}
                    </p>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-10 offset-md-1 mt-4">
        <h5><strong>Applicant's Feedback</strong></h5>
        <hr>
    </div>
    <div class="col-md-10 offset-1 mt-3">
        <div class="row">
                @foreach($applicant_feedback as $feedbacks)
                <div class="col-md-2 text-center">
                    @if(is_null($feedbacks->avatar_image_path))
                    <img src="{{asset('img/dist/applicant.png')}}" alt="" class="img-fluid" width="100" height="100">
                    @else
                    <img src="/profile/{{$feedbacks->avatar_image_path}}" alt="" class="img-fluid" width="100" height="100">
                    @endif
                </div>
                <div class="col-md-10">
                    <p class="my-0"><strong>{{$feedbacks->first_name}} {{$feedbacks->last_name}}</strong></p>
                    <p class="mt-0"><small>{{\Carbon\Carbon::parse($feedbacks->created_at)->format('F d,Y')}}</small></p>
                    <p class="text-justify">{{$feedbacks->description}}</p>
                </div>
                @endforeach
        </div>
    </div> --}}
    <div class="col-md-10 offset-md-1 feedback mb-5">
        <form action="{{route('applicant.add.feedback', $company->id )}}" method="POST">
            @csrf
            <div class="col-md-12">
                <small><span id="remainingChars">500</span> Character(s) Remaining</small>
                <textarea class="form-control resizable-none" maxlength="500" cols="158" rows="5" class="resizable-none" name="applicantFeedback" placeholder="Leave a feedback…" required></textarea>
            </div>
            <div class="mt-3 col-md-12">
                <button type="submit" class="btn btn-success float-right px-4">SUBMIT</button>
            </div>
        </form>
    </div>
    <h5 class="mt-6"><strong>Job Openings at {{$company->company_name}}</strong></h5>
        <hr>
    </div>
    <div class="col-md-10 offset-md-1">

        @foreach($company_job as $job)
        <div class="card" id="defaultSort">
            @if(is_null($job->company_video_path))
        
@else
        <div id="myModal" class="modal fade" id="addLeaveRequest" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="leaveRequestModal">COMPANY VIDEO</h5>
                    </div>
                <div class="modal-body">
                    <div class="col-md-12 text-center">
                        <video width="100%" src="/{{ $job->company_video_path }}" controls autoplay></video>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
@endif
            <div class="card-body pb-0">
                <p class="text-right">
                    <small>Posted {{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</small>
                </p>
                <div class="row">
                    <div class="col-md-1">
                        @if(is_null($job->company_logo_path))
                        <img src="{{asset('img/companies/def-logo-company.png')}}" class="img-fluid">
                        @else
                        <img src="/{{$job->company_logo_path}}" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-11">
                        <a href="/applicant/view-job-post/{{$job->id}}">
                            <h5 class="mb-0"><strong class="text-success">{{$job->title}}</strong></h5>
                        </a>
                        <p class="mb-0">{{$job->company_name}}<i class="fa fa-check-circle ml-2 text-green" title="Verified company"></i></p>
                        <p class="mb-0">{{number_format($job->salary_range_minimum, 2)}} - {{number_format($job->salary_range_maximum, 2)}} {{$job->name}}/month</p>
                        <p class="mb-0">{{$job->job_location}}</p>

                        <p id="viewMore{{$job->id}}" class="collapse">{{$job->description}}</p>
                            <a href="#" data-target="#viewMore{{$job->id}}" data-toggle="collapse" class="btnViewToggle"
                                data-id="{{$job->id}}">
                                <p class="" id="more{{$job->id}}"><small>View more details</small><p>
                                <p class="d-none" id="less{{$job->id}}"><small>View less</small></p>
                            </a>
                    </div>
                </div>
                <div class="modal-footer modified">
                    <form action="/add-save-job-post" id="addSaveJob{{$job->id}}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$job->id}}">
                        <button type="submit" class="btn text-blue saveJob" data-id="{{$job->id}}">
                            <small>Save this Job to view later.</small>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <div class="float-right">
            {{$company_job->links()}}
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script src="{{asset('js/applicant/company_detail.js')}}"></script>
@stop
