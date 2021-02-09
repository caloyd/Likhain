@extends('applicant.layout.layout')

@section('title', 'Saved Jobs')

@section('content_header')
    <h1>SAVED JOBS</h1>
    <hr>
@endsection

@section('content')
    <div class="col-md-12">
        {{-- JobPostController --}}
            @foreach($job as $jobs)
        <div class="card">

            <div class="card-body py-2">
                <p class="text-right mt-1">
                    <small>Saved {{\Carbon\Carbon::parse($jobs->created_at)->diffForHumans()}}</small>
                </p>
                <div class="row">
                    <div class="col-md-1">
                        @if(is_null($jobs->company_logo_path))
                        <img src="{{asset('img/companies/def-logo-company.png')}}" class="img-fluid" height="120px" width="120px">
                        @else
                        <a href="/applicant/company-details/{{$jobs->company_id}}" class="text-black mr-2"><img src="/{{$jobs->company_logo_path}}" class="img-fluid" height="120px" width="120px"></a>
                        @endif
                    </div>
                    <div class="col-md-11">
                    <a href="/applicant/view-job-post/{{$jobs->job_post_id}}">
                        <h5 class="mb-0 text-green"><strong>{{$jobs->title}}</strong></h5>
                    </a>
                    <p class="mb-0"><a href="/applicant/company-details/{{$jobs->company_id}}" class="text-black mr-2">{{$jobs->company_name}}</a><i class="fa fa-check-circle" title="Verified company"></i></p>
                    <p class="mb-0">{{number_format($jobs->salary_range_minimum,2)}} - {{number_format($jobs->salary_range_maximum,2)}} {{$jobs->currency_name}}/month</p>
                    <p class="mb-2">{{$jobs->job_location}}</p>
                        <div id="viewMore{{$jobs->job_post_id}}" class="collapse">{{$jobs->description}}
                        </div>
                        <a href="#" data-target="#viewMore{{$jobs->job_post_id}}" data-toggle="collapse" class="btnViewToggle" data-id="{{$jobs->job_post_id}}">
                            <p class="" id="more{{$jobs->job_post_id}}"><small>View more details</small><p>
                            <p class="d-none" id="less{{$jobs->job_post_id}}"><small>View less</small></p>
                        </a>
                    </div>
                </div>
                <div class="modal-footer modified py-1 px-0">
                        <form action="/applicant/delete-save-job/{{$jobs->save_job_id}}" method="POST" id="deleteJobForm{{$jobs->save_job_id}}">
                            @csrf
                            {{method_field('DELETE')}}

                                <input type="hidden" value="{{$jobs->job_post_id}}">
                                <button type="button" class="btn text-blue btnRemoveSaved" data-id="{{$jobs->save_job_id}}"><small>Remove from saved jobs</small></button>
                        </form>
                </div>
            </div>
        </div>
        @endforeach      
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/applicant_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/landing_page.css')}}">
@endsection

@section('js')
    <script src="{{asset('js/applicant/saved_job.js')}}"></script>
@endsection
