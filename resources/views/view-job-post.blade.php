@extends('main_landing.other')
@section('title')
    LIKHAIN - Web Developer Details
@endsection
{{-- CONTENT --}}
@section('content')
    {{-- SEARCHBAR --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 offset-md-4 mt-5">
                    <h3 class="text-center">FIND THE BEST JOBS HERE</h3>
                </div>
            </div>
            @include('include.jobpost-searchbar')
            {{-- JOB DETAILS --}}
            @include('include.job-details')
            {{-- end JOB DETAILS --}}
        </div>
    {{-- end SEARCHBAR --}}
@endsection
{{-- end CONTENT --}}
