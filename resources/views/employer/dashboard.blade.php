@extends('employer.layout.layout')

@section('title', 'Employer Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <hr>
@stop

@section('content')
    {{-- <div class="col-md-4">
        <!-- Employees -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>2743</h3>
                <p>Employees</p>
            </div>
            <div class="icon">
                <i class="fas fa-city text-white"></i>
            </div>
        </div>
        <!-- end Employees -->
    </div> --}}
    <div class="col-md-6">
        <!-- Applicants -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$count}}</h3>
                <p>Applicants</p>
            </div>
            <div class="icon">
                <i class="fas fa-users text-white"></i>
            </div>
        </div>
        <!-- end Applicants -->
    </div>
    <div class="col-md-6">
        <!-- Job Posting -->
        <div class="small-box bg-warning">
            <div class="inner text-white">
                <h3>{{$countJobPost}}</h3>
                <p>Job Posting</p>
            </div>
            <div class="icon">
                <i class="fas fa-paste text-white"></i>
            </div>
        </div>
        <!-- end Job Posting -->
    </div>
    
    <div class="col-md-12">
        <table id="jobTitle" class="table table-bordered bg-cyan-modified">
            <thead class="bg-info">
                <tr>
                    <th>Job Title</th>
                    <th>Date Posted</th>
                    <th>Recruitment Period</th>
                    <th>Posted by</th>
                </tr>
            </thead>
            <tbody>
                {{-- From EmployerController --}}
                @foreach($job_post as $jobs)
                <tr>
                <td class="align-middle">{{$jobs->title}}</td>
                <td class="align-middle">{{\Carbon\Carbon::parse($jobs->created_at)->format('F d, Y')}}</td>
                <td class="align-middle">{{$jobs->recruitment_period}}</td>
                <td class="align-middle">{{$jobs->first_name}} {{$jobs->last_name}}</td>    
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
<script src="{{asset('js/employer/dashboard.js')}}"></script>
@stop
