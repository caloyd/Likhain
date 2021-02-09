@extends('employer.layout.layout')

@section('title', 'Leave Request')

@section('content_header')
    <h1>LEAVE REQUEST</h1>
    <hr>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="col-md-12 mb-20">
        <button class="btn btn-success btn-sm btnMultipleApproveLeave" data-url="{{ url('multipleApproveLeave') }}"><i class="fas fa-check mr-2"></i> APPROVE</button>
        <button class="btn btn-danger btn-sm btnMultipleDenyLeave" data-url="{{ url('multipleDenyLeave') }}"><i class="fas fa-times mr-2"></i> DENY</button>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered table-hover table-striped" id="leaveRequestTbl">
            <thead class="bg-info">
                <tr>
                    <th class="text-center align-middle">
                        <input type="checkbox" class="align-middle" id="selectAll">
                    </th>
                    <th class="align-middle">Employee Names</th>
                    <th class="align-middle">Leave Type</th>
                    <th class="align-middle">Start Date</th>
                    <th class="align-middle">End Date</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee_leave as $leaves)
                <tr id="tr_{{$leaves->id}}">
                    <td class="text-center align-middle">
                        <input type="checkbox" class="checkbox sub_chk" data-id="{{$leaves->id}}">
                    </td>
                    <td class="align-middle">{{$leaves->first_name}} {{$leaves->last_name}}</td>
                    <td class="align-middle">{{$leaves->leave_type}}</td>
                    <td class="align-middle">{{$leaves->start_date}}</td>
                    <td class="align-middle">{{$leaves->end_date}}</td>
                    <td class="align-middle">
                        <button class="btn btn-primary" data-toggle="modal" 
                        data-target="#viewLeaveRequest{{$leaves->id}}"
                        data-leavetype="{{$leaves->leave_type}}"
                        data-startdate="{{$leaves->start_date}}"
                        data-enddate="{{$leaves->end_date}}"
                        data-reason="{{$leaves->leave_reason}}"
                        data-fname="{{$leaves->first_name}}"
                        data-lname="{{$leaves->last_name}}">
                            <i class="fas fa-eye"></i>
                        </button>
                        <form class="d-inline" action="/leave-approve/{{$leaves->id}}" method="POST" id="approveForm{{$leaves->id}}">
                            @csrf
                            @method('PATCH')
                        <input type="hidden" name="approved" value="Approved">
                        <button class="btn btn-success btnApproveLeave" data-id="{{$leaves->id}}"><i class="fas fa-check"></i></button>
                        </form>
                        <form class="d-inline" action="/leave-deny/{{$leaves->id}}" method="POST" id="denyForm{{$leaves->id}}">
                            @csrf
                            @method('PATCH')
                        <input type="hidden" name="denied" value="Denied">
                        <button class="btn btn-danger btnDenyLeave" data-id="{{$leaves->id}}"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach($employee_leave as $leaves)
    <div class="modal" tabindex="-1" role="dialog" id="viewLeaveRequest{{$leaves->id}}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title">LEAVE REQUEST - {{$leaves->first_name}} {{$leaves->last_name}}</h5>
                    
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Type of Leave</label>
                                <input type="text" class="form-control leaveType" value="{{$leaves->leave_type}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Start Date</label>
                                <input type="text" class="form-control startDate" value="{{$leaves->start_date}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>End Date</label>
                                <input type="text" class="form-control endDate" value="{{$leaves->end_date}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">Reason</label>
                                <textarea class="form-control resizable-none leaveReason" rows="7">{{$leaves->leave_reason}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
            
                        <form action="/leave-approve/{{$leaves->id}}" method="POST" id="approveFormModal{{$leaves->id}}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="approved" value="Approved">
                            <button class="btn btn-success btnApproveLeaveModal" data-id="{{$leaves->id}}">APPROVE</button>
                        </form>
                        <form action="/leave-deny/{{$leaves->id}}" method="POST" id="denyFormModal{{$leaves->id}}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="denied" value="Denied">
                            <button class="btn btn-danger btnDenyLeaveModal" data-id="{{$leaves->id}}">DENY</button>
                        </form>
                        <form>
                            <button class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        @endforeach
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/employer_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/landing_page.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/employer/leave_request.js')}}"></script>
@endsection