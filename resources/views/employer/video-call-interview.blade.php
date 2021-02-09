@extends('employer.layout.layout')

@section('title', 'Video Call Interview')
@section('css')
    <link rel="stylesheet" href="{{asset('css/employer_dashboard.css')}}">
    <script src="https://rtcmulticonnection.herokuapp.com/dist/RTCMultiConnection.min.js"></script>
@stop
@section('content_header')
<h1>APPLICANT VIDEO CALL INTERVIEW</h1>

@stop
@section('content')
<div style="height: 800px; width: 100%; ">
<iframe width="100%" height="100%" allow="microphone; camera" src="/employer/videocallframe?open=true&sessionid={{$applicantInfo->id}}/{{$applicantInfo->user_id}}&publicRoomIdentifier=dashboard&userFullName={{$first_name}}" frameborder="0">
</div>    
@endsection
@section('container')
<div id="videos-container" style="margin: 20px 0;"></div>
@endsection
