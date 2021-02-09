    {{-- Leave Request View --}}
    <div class="modal fade" id="leaveRequestView" tabindex="-1" role="dialog" aria-labelledby="leaveRequestModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="leaveRequestModal">LEAVE REQUEST</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-row">
                <div class="form-group col-md-4"> 
                    <label for="">Type of Leave</label>
                    
                    <p id="leaveType"></p>                                           
                    {{-- <input type="text" class="form-control">--}}

                </div>
                <div class="form-group col-md-4"> 
                    <label for="">Start Date</label>  
                    <p id="startDate"></p>                                             
                        {{-- <input type="text" class="form-control">--}}
                </div>
                <div class="form-group col-md-4"> 
                <label for="">End Date</label>  
                <p id="endDate"></p>                                                    
                    {{-- <input type="text" class="form-control">--}}
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Reason</label>    
                    <p id="leaveReason"></p>
                        {{-- <textarea class="resizable-none" cols="63" rows="8"></textarea> --}}
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    {{-- end Leave Request View --}}

    {{-- Add Leave Request --}}
    <div class="modal fade" id="addLeaveRequest" tabindex="-1" role="dialog" aria-labelledby="leaveRequestModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="leaveRequestModal">ADD LEAVE REQUEST</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
                </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('employee.add.leave') }}" method="POST" id="addLeaveForm">
                @csrf
                <div class="form-row">
                <div class="form-group col-md-4"> 
                <label for="">Type of Leave</label>                                                      
                    <select class="form-control" name="leaveType">
                        <option>Vacation</option>
                        <option>Sick</option>
                    </select>
                </div>
                <div class="form-group col-md-4"> 
                    <label for="">Start Date</label>
                    <div class="input-group date" id="leaveStartDate" data-target-input="nearest">
                        <input type="text" name="leaveStartDate" data-target="#leaveStartDate" class="form-control datetimepicker-input">
                    <div class="input-group-append" data-target="#leaveStartDate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>                           
                    </div> 
                </div>
                <div class="form-group col-md-4"> 
                    <label for="">End Date</label>
                    <div class="input-group date" id="leaveEndDate" data-target-input="nearest">
                        <input type="text" name="leaveEndDate" class="form-control datetimepicker-input" data-target="#leaveEndDate">
                    <div class="input-group-append" data-target="#leaveEndDate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>                            
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Reason</label>    
                    <textarea class="resizable-none" name="leaveReason" cols="63" rows="8"></textarea>
                </div>
                </div>
            
        </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success" id="bntConfirmLeave">CONFIRM</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">CANCEL</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
    {{-- end Add Leave Request Edit --}}


    