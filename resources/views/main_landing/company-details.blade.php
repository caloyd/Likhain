@extends('main_landing.other')
@section('title')
    LIKHAIN - Web Developer Details
@endsection
{{-- CONTENT --}}
@section('content')
<div class="container-fluid my-5">
<div class="col-md-10 offset-md-1">
    <div class="row bg-white p-4 boxShadow">
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
            <br><center><h2 class="mt-3"><strong>ABOUT</strong></h2></center>
            <div class="about-details p-3">
                <p>{{$company->description}}
                </p><br><br>
            </div>
        </div>
    </div>
<h5 class="mt-6"><strong>Job Openings at {{$company->company_name}}</strong></h5>
    <hr>
</div>
<div class="col-md-10 offset-md-1">

    @foreach($company_job as $job)
    <div class="card boxShadow2" id="defaultSort">
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
                    {{-- <p class="mb-0">{{number_format($job->salary_range_minimum, 2)}} - {{number_format($job->salary_range_maximum, 2)}} {{$job->name}}/month</p> --}}
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
                <div class="modal-footer modified">
                    <a href="/view-job-post/{{$job->id}}" class="btn btn-primary">View Details</a>
                         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#applyModal">Apply</button>
                    </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="float-right">
        {{$company_job->links()}}
    </div>
</div>
</div>
@include('include.modals.landing-page-modal')
@endsection
{{-- end CONTENT --}}
