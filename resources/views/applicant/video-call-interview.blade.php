@extends('applicant.layout.layout')

@section('title', 'Video Call Interview')

@section('content_header')
    <h1>VIDEO CALL INTERVIEW</h1>
@stop

@section('content')
        {{-- <div class="col-md-9 interviewer">
        </div>
        <div class="col-md-3 applicant">
            <div class="row">
                <div class="col-md-12 applicant"></div>
                <div class="col-md-12"></div>
            </div>
        </div> --}}
        <div style="height: 800px; width: 100%; ">
        <iframe width="100%" height="100%" allow="microphone; camera" src="/employer/videocallframe?open=false&sessionid={{$applicantInfo->id}}/{{$applicantInfo->user_id}}&publicRoomIdentifier=dashboard&userFullName={{$first_name}}" frameborder="0">
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/interview_page.css')}}">
@stop

@section('js')
   
@stop