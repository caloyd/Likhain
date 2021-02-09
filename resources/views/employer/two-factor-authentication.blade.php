@extends('employer.layout.layout')

@section('title', ' 2 Factor Authentication')

@section('content_header')
    <h1>SETUP 2-FACTOR AUTHENTICATION</h1>
    <hr>
@stop
@section('content')
    <div class="col-md-12">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed fringilla nisl, et condimentum nulla. Nulla bibendum, turpis ut finibus feugiat,
        lorem magna maximus mauris, a porta felis elit sed nisl. Integer elementum tellus quis mauris elementum lacinia. Curabitur ut.</p>
    </div>

    <div class="col-md-12 text-center">
        <img src="{{asset('img/applicant_dashboard/qr-code.png')}}" class="two-factor" alt="">
        <h5 class="enter-code">Enter Code</h5>
        <input type="text" size="35">
    </div>

    <div class="col-md-12 text-center btn-2fa">
        <button type="button" class="btn btn-success">SUBMIT</button>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('css/two_factor.css')}}">
@stop

@section('js')
    <script>
        $('#accnt-sidebar').addClass('menu-open');
        $('#accnt-sett').addClass('active');
        $('#two-fa').addClass('active');
    </script>
@stop