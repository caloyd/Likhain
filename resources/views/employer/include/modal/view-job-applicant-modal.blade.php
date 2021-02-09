 {{-- APPLICANT-INFO-MODAL --}}
 <div class="modal fade" id="viewApplicant" tabindex="-1" role="dialog" aria-labelledby="applicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="applicantModalLabelFirst"></h5>&nbsp;
                    <h5 class="modal-title" id="applicantModalLabelLast"></h5>&nbsp;
                    <h5 class="modal-title">PROFILE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 info">
                            <p class="font-italic mb-0" id="pitch"></p>
                            <br>
                            <p class="font-weight-bold mb-0" id="email"></p>
                            <p class="font-weight-bold mb-0" id="contact"></p>
                            <p class="font-weight-bold mb-0" id="expSalary"></p>
                            <p class="font-weight-bold mt-4 mb-0">Skills</p>
                                <p id="skill"></p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{asset('img/employer_dashboard/Applicant.png')}}" alt="" class="w-75">
                        </div>
                    </div> 
                    <div class="row education-row">
                        <div class="col-md-12">
                            <h6 class="font-weight-bold">Education</h6>
                        </div>
                        <div class="col-md-6">
                            <p class="font-weight-bold" id="school"></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-0" id="course"></p>
                            <p class="mb-0"><span id="dateFrom"></span> - <span id="dateTo"></span></p>
                            <p class="mb-0" id="educ"></p>
                        </div>   
                    </div>  
                    <div class="row mt-2 mb-3">
                        <div class="col-md-12">
                            <h6 class="font-weight-bold">Work Experience</h6>
                        </div>
                        <div class="col-md-6">
                            <p class="font-weight-bold" id="companyName"></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-0" id="jobTitle"></p>
                            <p class="mb-0"><span id="begin"></span> - <span id="end"></span></p>
                            <p class="mb-0" id="salary"></p>
                        </div>                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CLOSE</button>
                    </div>         
                </div>
            </div>
        </div>
    </div>