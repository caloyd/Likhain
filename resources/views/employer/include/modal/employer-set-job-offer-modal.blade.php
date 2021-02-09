{{-- SET JOB OFFER MODAL / EMPLOYER CONTROLLER--}}
<div class="modal fade" id="setJobOffer1" tabindex="-1" role="dialog" aria-labelledby="setInterview" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">SET JOB OFFER FOR - </h5>&nbsp;
                    <h5 class="modal-title" id="firstName"></h5>&nbsp;
                    <h5 class="modal-title" id="lastName"></h5>&nbsp;
                    
                    <button type="button" class="close btn-close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <form action="/set-job-offer" id="setJobOfferForm" method="POST">
                            @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6"> 
        
                            <input type="hidden" name="applicantId" id="applicantId">
                            <input type="hidden" name="interviewId" id="interviewId">
                            <input type="hidden" name="jobPostId" id="jobPostId">

                                <div class="input-group date" data-target-input="nearest" id="jobOfferDate">   
                                <input type="text" class="form-control datetimepicker-input @error('jobOfferDate') is-invalid @enderror" name="jobOfferDate" data-target="#jobOfferDate" placeholder="Date" autocomplete="off">
                                <div class="input-group-append" data-toggle="datetimepicker" data-target="#jobOfferDate">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                @error('jobOfferDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
                            </div>                   
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group date" id="updateTime" data-target-input="nearest">     
                                <input type="text" class="form-control datetimepicker-input @error('jobOfferTime') is-invalid @enderror" placeholder="Time" name="jobOfferTime" data-target="#updateTime">  
                                <div class="input-group-append" data-target="#updateTime" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                </div>
                                @error('jobOfferTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror   
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control @error('contactPerson') is-invalid @enderror" placeholder="Contact Person" id="contactPerson" name="contactPerson" value="{{ old('contactPerson') }}" autocomplete="off">
                            @error('contactPerson')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror 
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control @error('contactNumber') is-invalid @enderror" placeholder="Contact No." name="contactNumber" id="contactNumber" value="{{ old('contactNumber') }}" required>
                            @error('contactNumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror 
                        </div>
                        <div class="form-group col-md-12">                              
                            <input type="text" class="form-control @error('jobOfferAddress') is-invalid @enderror" placeholder="Address" name="jobOfferAddress" id="jobOfferAddress" value="{{ old('jobOfferAddress') }}">
                            @error('jobOfferAddress')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror 
                        </div>
                        <div class="form-group col-md-12">
                            <p class="font-weight-bold mb-0">Notes / Instructions</p>
                            <textarea class="form-control" name="jobOfferNote" id="jobOfferNote" cols="106" rows="8" required></textarea>
                        </div>  
                    </div>                         
                    <div class="set-del-close">
                        <button type="button" class="btn btn-sm btn-success" id="btnSetJobOffer">SET JOB OFFER</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CLOSE</button>
                    </form>
                    </div>         
                </div>
            </div>
        </div>
    </div>
{{-- end SET JOB OFFER MODAL --}}

