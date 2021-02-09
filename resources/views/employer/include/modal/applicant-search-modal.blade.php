    {{-- APPLICANT SEARCH SET INTERVIEW MODAL --}}
    <div class="modal fade" id="setInterviewApplicantSearch" tabindex="-1" role="dialog" aria-labelledby="setInterview" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title">SET INTERVIEW FOR - </h5>&nbsp;
                        <h5 class="modal-title" id="firstName"></h5>&nbsp;
                        <h5 class="modal-title" id="lastName"></h5>&nbsp;
                        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/set-interview" id="setInterviewForm" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="input-group date" id="interviewDate1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input @error('interviewDate') is-invalid @enderror" name="interviewDate" data-target="#interviewDate1" value="{{old('interviewDate')}}" placeholder="Interview Date"/>
                                        <div class="input-group-append" data-target="#interviewDate1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        @error('interviewDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="input-group date" id="startTime1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input @error('startTime') is-invalid @enderror" data-target="#startTime1" name="startTime" value="{{old('startTime')}}" placeholder="Start Time"/>
                                        <div class="input-group-append" data-target="#startTime1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                        </div>
                                        @error('startTime')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                                {{-- <div class="form-group col-md-4">
                                    <div class="input-group date" id="endTime1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input @error('endTime') is-invalid @enderror" data-target="#endTime1" name="endTime" value="{{old('endTime')}}" placeholder="End Time"/>

                                        <div class="input-group-append" data-target="#endTime1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                        </div>
                                        @error('endTime')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div> --}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="applicantIdInt" id="applicantId">
                                        <select class="form-control" name="jobPostId" id="jobPostId">
                                            @foreach($job_title as $job)
                                            <option value={{$job->id}}>
                                                {{$job->title}}
                                            </option>
                                            @endforeach
                                        </select>
                                </div>
                                    <div class="form-group col-md-6">
                                        <select name="interviewType" id="interviewType" class="form-control">
                                            <option value="Video call">Video Call</option>
                                            <option value="Personal">Personal</option>
                                        </select>
                                    </div>
                            </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control @error('interviewers') is-invalid @enderror" name="interviewers" value="{{old('interviewers')}}" placeholder="Interviewers">
                                        @error('interviewers')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control @error('recruiterContact') is-invalid @enderror" name="recruiterContact" id="recruiterContact" value="{{old('recruiterContact')}}" placeholder="Recruiter Contact">
                                        @error('recruiterContact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control @error('interviewAddress') is-invalid @enderror" name="interviewAddress" value="{{old('interviewAddress')}}" placeholder="Interview Address">
                                        @error('interviewAddress')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">   
                                    <div class="form-group col-md-12">
                                        <p class="font-weight-bold mb-0">Notes / Instructions</p>
                                        <textarea class="col-md-12 form-control @error('notes') is-invalid @enderror" cols="106" rows="8" name="notes">@error('notes'){{ $message }}@enderror</textarea>
                                    </div>
                                </div>    
                                        
                            <div class="set-del-close">
                                <button type="submit" class="btn btn-sm btn-success" id="btnSetInterview">SET INTERVIEW</button>
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CLOSE</button>
                            </div>    
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    {{-- end APPLICANT SEARCH SET INTERVIEW MODAL --}}