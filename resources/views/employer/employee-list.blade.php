@extends('employer.layout.layout')

@section('title', 'Employee List')

@section('content_header')
    <h1>EMPLOYEE LIST</h1>
    <hr>
@endsection

@section('content')
@include('employer.include.modal.employee-list-modal')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="col-md-12 mb-20">
        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addEmployeeModal"><i class="fas fa-plus mr-2"></i>EMPLOYEE</button>
        <button class="btn btn-danger btn-sm btnEmployeeMultipleDelete" data-url="{{ url('multiDeleteEmployee') }}"><i class="fas fa-minus mr-2"></i>EMPLOYEE</button>
    </div>

    <div class="col-md-12">
        <table id="employeeListTbl" class="table table-bordered table-striped table-hover">
            <thead class="bg-info">
                <tr>
                    <th class="text-center">
                        <input type="checkbox" class="align-middle" id="selectAll">
                    </th>
                    <th class="align-middle">Employee Names</th>
                    <th class="align-middle">Employee Email</th>
                    <th class="align-middle">Start Date</th>
                    <th class="align-middle">Job Title</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee as $employees)
                <tr id="tr_{{$employees->id}}">
                    <td class="text-center">
                        <input type="checkbox" class="checkbox align-middle sub_chk" data-id="{{$employees->id}}">
                    </td>
                    <td class="align-middle">{{$employees->first_name}} {{$employees->last_name}}</td>
                    <td class="align-middle">{{$employees->email}}</td>
                    <td class="align-middle">{{\Carbon\Carbon::parse($employees->employment_date)->format('F d, Y')}}</td>
                    <td class="align-middle">{{$employees->job_position}}</td>
                    <td class="align-middle">
                        <button class="btn btn-primary" data-toggle="modal" 
                        data-target="#viewEmployeeModal"
                        data-fname="{{$employees->first_name}}"
                        data-lname="{{$employees->last_name}}"
                        data-mname="{{$employees->middle_name}}"
                        data-empdate="{{\Carbon\Carbon::parse($employees->employment_date)->format('F d, Y')}}"
                        data-jobpos="{{$employees->job_position}}"
                        data-address="{{$employees->address}}"
                        data-contactnumber="{{$employees->contact_number}}"
                        data-salary="{{$employees->name}}{{number_format($employees->amount, 2)}}">
                        <i class="fas fa-eye"></i>
                        </button>
                        <form action="/delete-employee/{{$employees->id}}" class="d-inline" method="POST" id="deleteEmpForm{{$employees->id}}">
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-danger btnEmployeeDelete" data-id="{{$employees->id}}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/employer_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/landing_page.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/employer/employee_list.js')}}"></script>
@endsection