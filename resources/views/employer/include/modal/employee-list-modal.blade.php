{{-- VIEW EMPLOYER MODAL --}}
<div class="modal fade" tabindex="-1" role="dialog" id="viewEmployeeModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">EMPLOYEE PROFILE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <p class="mb-2"><strong><span id="firstName"></span> <span id="lastName"></span> <span id="middleName"></span></strong></p>
                        <p id="jobPosition"></p>
                        <p id="hireDate"></p>
                        <p id="address"></p>
                        <p id="contactNumber"></p>
                        <p id="salaryAmount"></p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('img/dist/applicant.png')}}" alt="" class="img-fluid" height="200" width="200">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- end VIEW EMPLOYER MODAL --}}

{{-- ADD EMPLOYER MODAL --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalScrollableTitle">CREATE EMPLOYEE ACCOUNT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/add-employee" method="POST" id="addEmployeeForm">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                            <div class="input-group date" id="employmentDate" data-target-input="nearest">
                                <input type="text" class="form-control" name="employmentDate" id="employmentDate" placeholder="Employment Date" data-target="#employmentDate" autocomplete="off">
                                <div class="input-group-append" data-target="#employmentDate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="jobPosition" placeholder="Job Position" required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <select class="form-control" name="currencyId">
                                @foreach($currency as $currencies)
                                <option value="{{$currencies->id}}">
                                    {{$currencies->name}}
                                </option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="salaryAmount" placeholder="Amount" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="firstName" placeholder="First name" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="lastName" placeholder="Last name" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <input class="form-control" name="middleName" placeholder="Middle name (Optional)">
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
                <input type="hidden" name="userType" value="6">
                <button type="submit" class="btn btn-success" id="btnConfirmAddEmployee">CONFIRM</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
            </div>
        </form>
        </div>
    </div>
</div>
{{-- end ADD EMPLOYER MODAL --}}