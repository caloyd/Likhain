@extends('employer.layout.layout')

@section('title', 'Job Post')

@section('content_header')
    <h1>JOB POST</h1>
    <hr>
@stop

@section('content')
@include('employer.include.modal.employer-modal')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-md-12">
        @foreach($company as $company_desc)
        @if($company_desc->description === "")
        <span tabindex="0" data-toggle="tooltip" data-placement="top" title="Please complete company profile">
            <button class="btn btn-success" disabled> <i class="fas fa-plus mr-2"></i>Job Post</button>
        </span>
        @else 
            <a href="add-job-post">
                <button type="button" class="btn btn-success"> <i class="fas fa-plus mr-2"></i>Job Post</button>
            </a>
        @endif
            <button type="button" class="btn btn-danger mr-2 delete_all" data-url="{{ url('multiDeleteJobPost') }}"><i class="fas fa-minus mr-2"></i>Job Post</button>
            @endforeach
    </div>


<div class="col-md-12 mt-3">
    <table id="jobPost" class="table table-bordered" >
        <thead class="bg-info">
            <tr>
                <th class="text-center align-middle">
                    <input type="checkbox" name="" id="selectAll" >
                </th>
                <th>Job Title</th>
                <th>Date Posted</th>
                <th>Recruitment Period</th>
                <th>Posted by</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        {{-- Job Post Controller --}}   
            @foreach($user as $job_posts)
            <tr id="tr_{{$job_posts->id}}">
            <td class="text-center align-middle">
                <input class="checkbox sub_chk" type="checkbox" data-id="{{$job_posts->id}}">
            </td>
            <td class="align-middle">{{$job_posts->title}}</td>
            <td class="align-middle">
                {{\Carbon\Carbon::parse($job_posts->created_at)->format('F d, Y')}}
            </td>
            <td class="align-middle">{{$job_posts->recruitment_period}}</td>
            <td class="align-middle">{{$job_posts->first_name}} {{$job_posts->last_name}}</td>            
                <td>
                    <div class="buttons">
                        <button type="button" class="btn btn-info" data-toggle="modal" 
                        data-target="#viewJobPost"
                        data-jobposttitle="{{$job_posts->title}}"
                        data-emptype="{{$job_posts->employment_type}}"
                        data-poslevel="{{$job_posts->position_level}}"
                        data-jobspec="{{$job_posts->job_specialization}}"
                        data-joblocation="{{$job_posts->job_location}}"
                        data-educlevel="{{$job_posts->education_level}}"
                        data-yrsexp="{{$job_posts->years_experience}}"
                        data-skill="{{$job_posts->skill}}"
                        data-recperiod="{{$job_posts->recruitment_period}}"
                        data-salmin="{{number_format($job_posts->salary_range_minimum, 2)}}"
                        data-salmax="{{number_format($job_posts->salary_range_maximum, 2)}}"
                        data-desc="{{$job_posts->description}}">
                            <i class="fas fa-eye"></i>
                        </button>
                    <a href="view-applicants/{{$job_posts->id}}" class="btn btn-primary" role="button"><i class="fas fa-users"></i></a>
                    <form class="d-inline" action="/delete-job-post/{{$job_posts->id}}" id="deleteJobPost{{$job_posts->id}}" method="POST">       
                        @csrf            
                        {{method_field('DELETE')}}
                        <button type="button" class="btn btn-danger btnDeleteJobPost" data-id="{{$job_posts->id}}" data-title="{{$job_posts->title}}" data-toggle="modal">
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
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('css/employer_dashboard.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/employer/job_post.js')}}"></script>
@stop