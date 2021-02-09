@extends('employee.layout.layout')

@section('title', 'Leave Request')

@section('content_header')
    <h1>Leave Request</h1>
    <hr>
@stop
@section('content')
@include('employee.include.modal.leave-request-modal')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-md-12">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addLeaveRequest"><i class="fas fa-plus"></i> LEAVE REQUEST</button> 
        <button type="button" class="btn btn-danger btnMultiDelete" data-url="{{ url('multipleDeleteLeave')}}"><i class="fas fa-minus"></i> LEAVE REQUEST</button> 
    </div>
        <div class="col-md-12 mt-3">
            <table id="leaveRequest" class="table table-bordered">
                <thead class="bg-custom">
                    <tr>
                        <th class="text-center">
                            <input type="checkbox" name="" id="selectAll" class="align-middle">
                        </th>
                        <th>Type of Leave</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leave as $leaves)
                    <tr id="tr_{{$leaves->id}}">
                        <td class="text-center">
                            <input type="checkbox" class="checkbox align-middle sub_chk" data-id="{{$leaves->id}}">
                        </td>
                        <td class="align-middle">{{$leaves->leave_type}}</td>
                        <td class="align-middle">{{$leaves->updated_at}}</td>
                        @if($leaves->employer_decision == null)
                        <td class="align-middle">Pending</td>
                        @else
                        <td class="align-middle">{{$leaves->employer_decision}}</td>
                        @endif
                        <td>
                            <div class="buttons">
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#leaveRequestView"
                                data-leavetype="{{$leaves->leave_type}}"
                                data-startdate="{{$leaves->start_date}}"
                                data-enddate="{{$leaves->end_date}}"
                                data-reason="{{$leaves->leave_reason}}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @if($leaves->employer_decision == null)
                                <button type="submit" class="btn btn-info" data-toggle="modal" 
                                data-target="#leaveRequestEdit{{$leaves->id}}">
                                    <i class="far fa-edit"></i>
                                </button>
                                @endif
                                <form class="d-inline" action="{{route('employee.delete.leave', $leaves->id)}}" method="POST" id="deleteLeaveForm{{$leaves->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btnDeleteLeave" data-toggle="modal" data-id="{{$leaves->id}}">
                                    <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    {{-- Leave Request Edit --}}
    @foreach($leave as $leaves)
    <div class="modal fade" id="leaveRequestEdit{{$leaves->id}}" tabindex="-1" role="dialog" aria-labelledby="leaveRequestModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="leaveRequestModal">EDIT LEAVE REQUEST</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employee.edit.leave', $leaves->id) }}" method="POST" id="editLeaveForm{{$leaves->id}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-row">
                        <div class="form-group col-md-4"> 
                        <label for="">Type of Leave</label>                                                            
                            <input type="text" class="form-control" id="leaveType{{$leaves->id}}" name="leaveType" value="{{$leaves->leave_type}}">                            
                        </div>
                        <div class="form-group col-md-4"> 
                        <label for="">Start Date</label>                                                                      
                            <input type="text" class="form-control" id="startDate{{$leaves->id}}" name="leaveStartDate" value="{{$leaves->start_date}}">                            
                        </div>
                        <div class="form-group col-md-4"> 
                        <label for="">End Date</label>                                                      
                            <input type="text" class="form-control" id="endDate{{$leaves->id}}" name="leaveEndDate" value="{{$leaves->end_date}}">                            
                        </div>
                        </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Reason</label>    
                            <textarea class="resizable-none" cols="63" rows="8" id="leaveReason{{$leaves->id}}" name="leaveReason">{{$leaves->leave_reason}}</textarea>
                        </div>
                    </div>
                    
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success btnConfirm" data-id="{{$leaves->id}}">CONFIRM</button>
                        <button type="button" class="btn btn-sm btn-danger"data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </form>
            </div>
    </div>
    @endforeach
    {{-- end Leave Request Edit --}}
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/employee_dashboard.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('js/employee/leave_request.js')}}"></script>
@stop