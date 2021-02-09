{{-- VIEW LEAVE REQUEST --}}
<div class="modal" tabindex="-1" role="dialog" id="viewLeaveRequest">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">LEAVE REQUEST - </h5>&nbsp;
                <h5 class="modal-title" id="firstName"></h5>&nbsp;
                <h5 class="modal-title" id="lastName"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Type of Leave</label>
                        <input type="text" class="form-control" id="leaveType">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Start Date</label>
                        <input type="text" class="form-control" id="startDate">
                    </div>
                    <div class="form-group col-md-4">
                        <label>End Date</label>
                        <input type="text" class="form-control" id="endDate">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlTextarea1">Reason</label>
                        <textarea class="form-control resizable-none" rows="7" id="leaveReason"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                @foreach($employee_leave as $leaves)
                <form action="/leave-approve/{{$leaves->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="approved" value="Approved">
                    <button class="btn btn-success btnApproveLeaveModal">APPROVE</button>
                </form>
                <form action="/leave-deny/{{$leaves->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="denied" value="Denied">
                    <button class="btn btn-danger btnDenyLeaveModal">DENY</button>
                </form>
                <form>
                    <button class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </form> 
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- end VIEW LEAVE REQUEST --}}