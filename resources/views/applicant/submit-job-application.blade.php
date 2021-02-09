@extends('applicant.layout.layout')

@section('title', 'Submit Job Application')

@section('content_header')
    <h1>Submit Job Application</h1>
    <hr>
@stop

@section('content')
    <div class="col-md-4 p-2-5 bg-light">
        <div class="row">
            @foreach ($job_post_summary as $job_post)
            
            <div class="col-md-4">
                <img src="/{{$job_post->company_logo_path}}" class="img-fluid">
            </div>
            <div class="col-md-8">
            <h5><strong>{{$job_post->title}}</strong></h5>
                {{$job_post->company_name}}
            </div>
        </div>
        <div class="row">
        <p>{{$job_post->name}} {{ number_format($job_post->salary_range_minimum, 2) }} - {{number_format($job_post->salary_range_maximum, 2)}}</p>
        </div>
        <div class="row">
        <p><i class="fas fa-map-marker-alt mr-2"></i>{{$job_post->job_location}}</p>  
        
        </div>         
    </div>
    <div class="col-md-7 ml-4 p-2-5 bg-light">
    <h5><strong>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</strong></h5>
        <div class="row">
            <div class="mr-5 ml-1">
            <p><i class="fas fa-envelope mr-2"></i>{{Auth::user()->email}}</p>
            </div>
            <div class="mr-5">
                <p><i class="fas fa-phone-alt mr-2"></i>{{$applicant_detail->contact_number}}</p>
            </div>
            <div>
                <p>{{$job_post->name}}{{number_format($applicant_detail->expected_salary, 2)}}/month</p>
            </div>
        </div>
        
        <form action="/save-job-applied" id="submitApplication" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    
                    <input type="hidden" name="jobPostId" value="{{$job_post->id}}">
                    <input type="hidden" name="jobPostStatus" value="In Queue">
                        <label>Make your pitch (Recommended)</label>
                        <textarea class="form-control resizable-none" name="jobPitch" rows="7"></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer modified p-0">
                <button type="submit" class="btn btn-primary" id="btnSubmitJobApp">SUBMIT APPLICATION</button>
            </div>
        </form>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/applicant_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/landing_page.css')}}">
@stop

@section('js')
<script src="{{asset('js/applicant/view_job_post.js')}}"></script>
@stop