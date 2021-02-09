@extends('applicant.layout.layout')

@section('title', 'Job Applications')

@section('content_header')
    {{-- ApplicantController --}}
    <h1>JOB APPLICATIONS</h1>
    <hr>
@stop

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="col-md-3">
        <button class="btn btn-danger btn-sm mb-20 btnDeleteMany" data-url="{{ url('multipleDeleteApplication') }}"><i class="fas fa-trash mr-2"></i>DELETE</button>
    </div>
    <div class="col-md-12">
        <table id="myTable" class="table table-bordered table-hover">
            <thead class="bg-success">
                <tr>
                    <th class="text-center">
                        <input type="checkbox" id="selectAll" class="" checked-id="primary">
                    </th>
                    <th class="align-middle">Company Name</th>
                    <th class="align-middle">Position Applied</th>
                    <th class="align-middle">Date Applied</th>
                    <th class="align-middle">Status</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($job_applied as $jobs)
                <tr id="tr_{{$jobs->id}}">
                    <td class="text-center">
                        <input type="checkbox" class="checkbox align-middle sub_chk" data-id="{{$jobs->id}}">
                    </td>

                    <td class="align-middle">{{$jobs->company_name}}</td>

                    <td class="align-middle">{{$jobs->title}}</td>
                    <td class="align-middle">{{\Carbon\Carbon::parse($jobs->created_at)->format('F d, Y')}}</td>
                    <td class="align-middle">{{$jobs->job_apply_status}}</td>
                    <td>
                        <a href="/applicant/view-job-post/{{$jobs->job_post_id}}" class="btn btn-primary">
                           <i class="fas fa-eye mr-2"></i>View
                        </a>

                    <form class="d-inline" action="/applicant/delete-job-app/{{$jobs->id}}" id="deleteJobApplication{{$jobs->id}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="button" class="btn btn-danger btnDeleteJobApplication" data-id="{{$jobs->id}}">
                                <i class="fas fa-trash mr-2"></i>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/applicant_dashboard.css')}}">
@stop
@section('js')
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="{{asset('js/applicant/job_application.js')}}"></script>
@stop
