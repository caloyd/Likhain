    {{-- APPLICANT-INFO-MODAL --}}
    <div class="modal fade" id="viewApplicant" tabindex="-1" role="dialog" aria-labelledby="applicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="applicantModalLabel">TIMOTHY DOE PROFILE</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 info">
                            <h5>Timothy Doe <br> doetimothy@gmail.com<br>0999 999 8234<br>Php 18,000 - 21,000</h5>
                            <h5 class="mt-4 font-weight-bold">Skills</h5><h5>HTML, CSS, Javascript, jQuery, Laravel, CodeIgniter, VueJS,
                                    Angular6, ReactJS, Bootstrap 4</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="{{asset('img/employer_dashboard/Applicant.png')}}" alt="" class="w-75">
                        </div>
                    </div> 
                    <div class="row education-row">
                        <div class="col-md-4 education">
                            <h5><b>Education</b></h5><h5>Great Era Elementary School</h5><h5>New Era High School</h5><h5>Great Age University</h5>
                        </div>
                        <div class="col-md-4 school-year">
                            <h5>2010-2014</h5><h5>2004-2010</h5><h5>1998-2004</h5>
                        </div>   
                    </div>  
                    <div class="row work-exp-row">
                        <div class="col-md-4 work-exp">
                            <h5><b>Work Experience</b></h5><h5>Feemo Global Solutions</h5><h5>Indra Philippines, Inc</h5><h5>Aster China Banks</h5>
                        </div>
                        <div class="col-md-4 exp-year">
                            <h5>2018-2019</h5><h5>2016-2018</h5><h5>2014-2016</h5>
                        </div>   
                        <div class="col-md-4 company">
                            <h5>Frontend Developer</h5><h5>UI/UX Designer</h5><h5>Jr. Web Developer</h5>
                        </div>                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#setInterview" data-dismiss="modal">SET INTERVIEW</button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" id="confirmDeleteModal" data-dismiss="modal">DELETE</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CLOSE</button>
                    </div>         
                </div>
            </div>
        </div>
    </div>
    {{-- end APPLICANT-INFO-MODAL --}}

    {{-- SET INTERVIEW MODAL --}}
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="setInterview" aria-hidden="true" id="setInterview">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title">SET INTERVIEW FOR TIMOTHY DOE PROFILE</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <div class="input-group date" id="interviewDate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#interviewDate" placeholder="Interview Date"/>
                                        <div class="input-group-append" data-target="#interviewDate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">                              
                                    <input type="text" class="form-control" placeholder="Interview Address">
                                </div>
                                <div class="form-group col-md-3">                   
                                    <input type="text" class="form-control" placeholder="Recruiter Contact">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <div class="input-group date" id="startTime" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#startTime" placeholder="Start Time"/>
                                        <div class="input-group-append" data-target="#startTime" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">                           <div class="input-group date" id="endTime" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#endTime" placeholder="End Time"/>
                                        <div class="input-group-append" data-target="#endTime" data-toggle="datetimepicker">
                                        <div class="input-group-text">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group col-md-6">                   
                                    <input type="text" class="form-control" placeholder="Interviewers">
                                </div>
                                <div class="form-group col-md-12">
                                    <p>Notes / Instructions</p>
                                    <textarea cols="106" rows="8"></textarea>
                                </div>  
                            </div>                         
                        </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-success" id="setInterviewBtn" data-dismiss="modal">SET INTERVIEW</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CLOSE</button>
                    </div>         
                </div>
            </div>
        </div>
    </div>
    {{-- end SET INTERVIEW MODAL --}}