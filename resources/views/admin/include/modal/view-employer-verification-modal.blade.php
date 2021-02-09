    {{-- ACCEPT REQUIREMENTS MODAL --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="acceptReqModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-royal">
                    <h5 class="modal-title">ACCEPT DOCUMENT</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Remarks:</label>
                        <textarea class="form-control resizable-none" name="" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnAcceptRequirement" data-dismiss="modal">ACCEPT</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end ACCEPT REQUIREMENTS MODAL --}}

    {{-- REJECT REQUIREMENTS MODAL --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="rejectReqModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-royal">
                    <h5 class="modal-title">REJECT DOCUMENT</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Remarks:</label>
                        <textarea class="form-control resizable-none" name="" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="btnRejectRequirement" data-dismiss="modal">REJECT</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end REJECT REQUIREMENTS MODAL --}}