@extends('main_landing.other')

@section('title')
    LIKHAIN - Job Posts
@endsection

{{-- CONTENT --}}
@section('content')
    {{-- SEARCHBAR --}}
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-4 offset-md-4">
                    <h3 class="text-center">FIND THE BEST JOBS HERE</h3>
                </div>
            </div>
            @include('include.jobpost-searchbar')
            {{-- JOB POSTS --}}
            @include('include.job-posts')
            {{-- end JOB POST --}}
        </div>
    {{-- end SEARCHBAR --}}
@endsection
{{-- end CONTENT --}}

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
    <script src="{{asset('js/job_post.js')}}"></script>
@endsection

