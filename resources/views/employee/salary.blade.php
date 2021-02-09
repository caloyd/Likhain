@extends('employee.layout.layout')

@section('title', 'Salary Details')

@section('content_header')
    <h1>Salary Details</h1>
    <hr>
@stop
@section('content')

    <div class="col-md-6">
        <table id="salaryTable" class="table table-bordered table-hover">
            <thead class="bg-custom">
                <tr>
                    
                    <th class="align-middle">Date</th>
                    <th class="align-middle">Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salary as $salary_amount)
                <tr>
                    <td class="align-middle">{{\Carbon\Carbon::parse($salary_amount->updated_at)->format('F d, Y')}}</td>
                    <td class="align-middle">{{$salary_amount->name}}{{number_format($salary_amount->amount, 2)}}</td>
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
    <script src="{{asset('js/employee/salary.js')}}"></script>
@stop