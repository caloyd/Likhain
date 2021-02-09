
    {{-- ADD REQUIREMENT MODAL --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="addRequirementModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-royal">
                    <h5 class="modal-title">REQUIREMENTS DOCUMENT</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="{{ route('admin.add.requirements') }}" class="addRequirementsForm" id="addRequirementsForm" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label">Requirement Name:</label>
                        <input type="text" class="form-control" name="employersRequirement" id="employersRequirement" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btnConfirmAddReq">ADD</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end ADD REQUIREMENT MODAL --}}