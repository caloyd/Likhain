{{-- APPLICANT-INTERVIEW-UPDATE-INFO-MODAL --}}
<div class="modal fade" id="updateApplicantInterview" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">INTERVIEW UPDATE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <select class="custom-select" id="interviewStat">
                                    <option selected disabled hidden>Status</option>
                                    <option value="pass">PASS</option>
                                    <option value="fail">FAIL</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                {{-- <input type="text" class="form-control @error ('typeOfInterview') is-invalid @enderror" placeholder="Type of Interview" id="typeOfInterview" name="typeOfInterview" disabled> --}}
                                <select class="custom-select" name="interviewType" id="interviewType" disabled>
                                    <option selected disabled>Interview Type</option>
                                    <option value="Initial">Initial</option>
                                    <option value="Technical">Technical</option>
                                    <option value="Final">Final</option>
                                </select>
                                @error('typeOfInterview')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="input-group date" id="updateInterviewDate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input @error('updateInterviewDate') is-invalid @enderror" data-target="#updateInterviewDate" placeholder="Interview Date" id="updateInterview" name="updateInterview" disabled/>

                                    <div class="input-group-append" data-target="#updateInterviewDate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                    </div>
                                    @error('updateInterviewDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="input-group date" id="updateStartTime" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#updateStartTime" placeholder="Start Time" id="updateTimeStart" disabled/>
                                    <div class="input-group-append" data-target="#updateStartTime" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="input-group date" id="updateEndTime" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#updateEndTime" placeholder="End Time" id="updateTimeEnd" disabled/>
                                    <div class="input-group-append" data-target="#updateEndTime" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" placeholder="Address" id="updateAddress" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" placeholder="Interviewee" id="updateInterviewee" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" placeholder="Contact Number" id="updateContactNo" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <p>Notes / Instructions</p>
                                <textarea class="col-md-12 resizable-none"  rows="8" id="updateNotes" disabled></textarea>
                            </div>      
                        </div>                         
                    </form>
                <div class="set-del-close">
                    <button type="button" class="btn btn-sm btn-success" id="btnConfirmUpdateInterview" data-dismiss="modal">CONFIRM</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>         
            </div>
        </div>
    </div>
</div>
{{-- end APPLICANT-INTERVIEW-UPDATE-INFO-MODAL --}}

    {{-- APPLICANT-INTERVIEW-INFO-MODAL
    <div class="modal fade" id="viewApplicantInterview" tabindex="-1" role="dialog" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title">INTERVIEW FOR TANJIRO</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-3"> 
                                    <input type="text" class="form-control" placeholder="Interview Date">                            
                                </div>
                                <div class="form-group col-md-6"> 
                                    <input type="text" class="form-control" placeholder="Interview Location">
                                </div>
                                <div class="form-group col-md-3">  
                                    <input type="text" class="form-control" placeholder="Recruiter Method">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">                                                                           
                                    <input type="text" class="form-control" placeholder="Start Time">                            
                                </div>
                                <div class="form-group col-md-2">                              
                                    <input type="text" class="form-control" placeholder="End Time">
                                </div>
                                <div class="form-group col-md-5">                   
                                        <input type="text" class="form-control" placeholder="Contact Person">
                                    </div>
                                <div class="form-group col-md-3">                              
                                        <input type="text" class="form-control" placeholder="End Time">
                                    </div>
                                <div class="form-group col-md-12">
                                    <p>Notes / Instructions</p>
                                    <textarea cols="106" rows="8"></textarea>
                                </div>  
                            </div>                         
                        </form>
                    <div class="set-del-close">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CLOSE</button>
                    </div>         
                </div>
            </div>
        </div>
    </div> --}}
{{-- end APPLICANT-INTERVIEW-INFO-MODAL --}}

 {{-- SET JOB OFFER MODAL --}}
 {{-- <div class="modal fade" id="setJobOffer1" tabindex="-1" role="dialog" aria-labelledby="setInterview" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title">SET JOB OFFER</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-3">                                                                           
                                <input type="text" class="form-control" placeholder="Date">                            
                            </div>
                            <div class="form-group col-md-6">                              
                                <input type="text" class="form-control" placeholder="Address">
                            </div>
                            <div class="form-group col-md-3">                   
                                <input type="text" class="form-control" placeholder="Contact No.">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">                                                                           
                                <input type="text" class="form-control" placeholder="Time">                            
                            </div>
                            <div class="form-group col-md-6">                              
                                <input type="text" class="form-control" placeholder="Contact Person">
                            </div>
                            <div class="form-group col-md-4">                   
                                <input type="text" class="form-control" placeholder="Attachment Letter">
                            </div>
                            <div class="form-group col-md-12">
                                <p>Notes / Instructions</p>
                                <textarea name="" id="" cols="106" rows="8"></textarea>
                            </div>  
                        </div>                         
                    </form>
                <div class="set-del-close">
                    <button type="button" class="btn btn-sm btn-success" id="setJobOffer2" data-dismiss="modal">SET</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>         
            </div>
        </div>
    </div>
</div> --}}
{{-- end SET JOB OFFER MODAL --}}