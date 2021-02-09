@extends('employer.layout.layout')

@section('title', 'Employer Staff')

@section('content_header')
    <h1>EMPLOYER STAFF</h1>
    <hr>
@endsection

@section('content')
@include('employer.include.modal.employer-modal')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-md-12">
        <button type="button" class="btn btn-success btn-sm custom-btn" data-toggle="modal" data-target="#createStaff"
        data-id=""><i class="fas fa-plus mr-2"></i>CREATE STAFF</button>
        <button type="button" class="btn btn-danger btn-sm btnMassDelete" data-url="{{ url('multiDeleteStaff') }}"><i class="fas fa-minus mr-2"></i>DELETE STAFF</button>
    </div>
    <div class="col-md-12 employer-table">
            <table id="employerStaff" class="table table-bordered">
                <thead class="bg-info">
                    <tr>
                        <th class="text-center">  
                            <input type="checkbox" name="" id="selectAll" class="align-middle">
                        </th>
                        <th>Staff Name</th>
                        <th>Staff Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employer as $employers)
                    <tr id="tr_{{$employers->id}}">
                        <td class="text-center">         
                            <input type="checkbox" class="checkbox align-middle sub_chk" data-id="{{$employers->id}}">
                        </td>
                        <td class="align-middle">{{$employers->first_name}} {{$employers->last_name}}</td>
                        <td class="align-middle">{{$employers->email}}</td>
                        <td> 
                            <div class="buttons">
                                <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#viewProfileStaff"
                                data-fname="{{$employers->first_name}}"
                                data-mname="{{$employers->middle_name}}"
                                data-lname="{{$employers->last_name}}"
                                data-email="{{$employers->email}}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                {{-- <button type="submit" class="btn btn-success" data-toggle="modal" id="promoteStaff">
                                    <i class="fas fa-crown"></i> 
                                </button>                       --}}
                                <form class="d-inline" action="/delete-employer-staff/{{$employers->id}}" method="POST" id="deleteStaffForm{{$employers->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btnDeleteStaff" data-id="{{$employers->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/employer_dashboard.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/employer/employer_staff.js')}}"></script>
@stop
