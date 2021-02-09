@extends('employee.layout.layout')

@section('title', 'Employee Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <hr>

@stop
@section('content')
    <div class="row">
         <div class="col-md-7" id="calendar">
        </div>
        <div class="card col-md-5 card-real-time">
            <div class="card-body">
                <div class=" time-frame float-left">       
                <!-- <div id='realTimeDate' class="real-time-date"></div><br> -->
                <div id='realTime' class="real-time"></div>

                <form action="{{route('employee.time.out', $attendance->id)}}" method="POST" id="clockOutForm">
                    @csrf
                    @method('PATCH')
                <button type="submit" class="btn btn-danger p-2" id="clockOut" >CLOCK OUT</button>
                </form>
            </div>
            <div class="float-right">
                <h4>Clock In Time:</h4><h3>{{$attendance->clock_in}}</h3><br>
                <h4>Clock Out Time</h4><h3 id="clockTimeOut" class="">{{$attendance->clock_out}}</h3>
            </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('css/employee_dashboard.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.0/dist/fullcalendar.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.0/dist/fullcalendar.min.js"></script>
    <script src="{{asset('js/employee/dashboard.js')}}"></script>
    <script>
    $('#dashboard').addClass('active');
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            themeSystem: 'bootstrap4',
            nowIndicator: true,
            header: {
                right: 'prev today next',
                left: 'title'
            },
            events: [
                @foreach($calendar as $calendars)
                {
                    id: '{{$calendars->id}}',
                    title: 'In',
                    start: "{{$calendars->clock_in}}",
                    end: "{{$calendars->clock_out}}"
                },
                @endforeach 
            ],
          
        });
    });
    </script>
@stop
