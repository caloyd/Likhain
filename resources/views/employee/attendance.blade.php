@extends('employee.layout.layout')

@section('title', 'Attendance')

@section('content_header')
    <h1>Employee Attendance</h1>
    <hr>

@stop
@section('content')
<div class="col-md-6">
        <table id="attendanceTable" class="table table-bordered table-hover">
            <thead class="bg-custom">
                <tr>   
                    <th class="align-middle">Time In</th>
                    <th class="align-middle">Time Out</th>
                </tr>
            </thead>
            <tbody>
            @foreach($attendances as $attendance)
              <tr>
                <td>{{\Carbon\Carbon::parse($attendance->clock_in)->format('m/d/Y g:i a')}}</td>
                <td>{{\Carbon\Carbon::parse($attendance->clock_out)->format('m/d/Y g:i a')}}</td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/employee_dashboard.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('js/employee/attendance.js')}}"></script>
@stop