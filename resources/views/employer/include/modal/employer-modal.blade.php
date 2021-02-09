{{-- JOB POST MODAL --}}
    <div class="modal fade" id="viewJobPost" tabindex="-1" role="dialog" aria-labelledby="viewJobModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="viewJobModalLabel">JOB POST</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">                                                                           
                            <input type="text" class="form-control" id="job_title">                            
                            </div>
                            <div class="form-group col-md-4">                              
                                <input type="text" class="form-control" id="employment_type">
                            </div>
                            <div class="form-group col-md-4">                   
                                <input type="text" class="form-control" id="position_level">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">                              
                                <input type="text" class="form-control" id="job_specialization">
                            </div>
                            <div class="form-group col-md-6">                              
                                <input type="text" class="form-control" id="job_location">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">                              
                                <input type="text" class="form-control" id="educ_level">
                            </div>
                            <div class="form-group col-md-6">                              
                                <input type="text" class="form-control" id="yrs_exp">
                            </div>                 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">                              
                                <input type="text" class="form-control" id="skill">
                            </div>
                        </div>
                        <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="rec_period">    
                                </div>      
                                <div class="form-group col-md-4">                   
                                    <input type="text" class="form-control" id="salmin">
                                </div>         
                                <div class="form-group col-md-4">                   
                                    <input type="text" class="form-control" id="salmax">
                                </div>       
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <legend>Job Description <legend>
                                <textarea class="form-control resizable-none" rows="10" id="desc" disabled></textarea>
                            </div>
                        </div>   
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- JOB POST MODAL --}}

    
{{-- EMPLOYER STAFF - CREATE STAFF MODAL --}}
    <div class="modal fade" id="createStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">CREATE STAFF ACCOUNT</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/add-employer" method="POST" id="createStaffForm">
                        @csrf
                        <div class="row">
                            <input type="hidden" id="userType" name="userType" value="4">
                            @foreach ($company as $id)
                                <input type="hidden" name="companyId" value="{{$id->id}}"> 
                            @endforeach

                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="employerStaffFirst" placeholder="First name">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="employerStaffLast" placeholder="Last name">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" name="employerStaffMiddle" placeholder="Middle name (Optional)">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="createdStaffBtn">CONFIRM</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                </div>
            </form>
            </div>
        </div>
    </div>
{{-- end EMPLOYER STAFF - CREATE STAFF MODAL --}}
    
{{-- EMPLOYER STAFF - VIEW STAFF PROFILE --}}
    <div class="modal fade" id="viewProfileStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">STAFF PROFILE</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{asset('img/employer_dashboard/user.png')}}" class="float-right" alt="">
                            <div class="mt-4">
                                <p class="mb-2"><strong><span id="firstName"></span> <span id="middleName"></span> <span id="lastName"></span></strong></p>
                                <p id="email"></p>
                                {{-- <p>s.hall@engraphia.ph<br>134 Block 27 Lot, 404 City, Philippines<br>+54 9201 2345</p> --}}
                            </div>                     
                        </div>                   
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
{{-- end EMPLOYER STAFF - VIEW STAFF PROFILE --}}

        
