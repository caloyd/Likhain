{{-- SET INTERVIEW MODAL - EMPLOYER/VIEW-APPLICANTS EMPLOYERCONTROLLER--}}
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="setInterview" aria-hidden="true" id="setInterview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h5 class="modal-title">SET INTERVIEW FOR - </h5>&nbsp;
            <h5 class="modal-title" id="appFirstName"></h5>&nbsp;
            <h5 class="modal-title" id="appLastName"></h5>&nbsp;
                <button type="button" class="close btn-close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/set-interview" method="POST" id="setInterviewForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="applicantIdInt" id="applicant_id_int">
                                <input type="hidden" name="jobPostId" id="job_post_id">
                                <div class="input-group date" id="interviewDate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input @error('interviewDate') is-invalid @enderror" name="interviewDate" id="interviewDate" data-target="#interviewDate" value="{{ old('interviewDate') }}" placeholder="Interview Date" />
                                    <div class="input-group-append" data-target="#interviewDate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                    </div>
                                    @error('interviewDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group date" id="startTime" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input @error('startTime') is-invalid @enderror" id="startTime" name="startTime" data-target="#startTime" value="{{ old('startTime') }}" placeholder="Time"/>
                                    <div class="input-group-append" data-target="#startTime" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                    </div>
                                    @error('startTime')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="form-group col-md-4">
                                <div class="input-group date" id="endTime" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input @error('endTime') is-invalid @enderror" id="endTime" name="endTime" data-target="#endTime" value="{{ old('endTime') }}" placeholder="End Time"/>
                                    <div class="input-group-append" data-target="#endTime" data-toggle="datetimepicker">
                                    <div class="input-group-text">
                                        <i class="fas fa-clock"></i></div>
                                    </div>
                                    @error('endTime')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <select class="form-control" id="interviewType" name="interviewType">
                                    <option value="Video Call">Video Call</option>   
                                    <option value="Personal">Personal</option>
                                </select> 
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control  @error('interviewers') is-invalid @enderror" id="interviewers" name="interviewers" value="{{ old('interviewers')}}" placeholder="Interviewers">
                                @error('interviewers')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control @error('recruiterContact') is-invalid @enderror"
                                id="recruiterContact" name="recruiterContact" value="{{ old('recruiterContact')}}" placeholder="Recruiter Contact">
                                @error('recruiterContact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="text" class="form-control @error('interviewAddress') is-invalid @enderror" id="interviewAddress" name="interviewAddress" value="{{ old('interviewAddress') }}" placeholder="Interview Address">
                                @error('interviewAddress')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>    
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="mb-0 mt-3">Notes / Instructions</label>
                                <textarea class="form-control resizable-none" id="notes" name="notes" cols="106" rows="8" required></textarea>
                            </div>
                        </div>                       
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success" id="btnSetInterview">SET INTERVIEW</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CLOSE</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end SET INTERVIEW MODAL --}}