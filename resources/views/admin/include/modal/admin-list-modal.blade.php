{{-- ADD ADMIN MODAL --}}
<div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-royal">
                <h5 class="modal-title">CREATE ADMIN ACCOUNT</h5>
                <button type="button" class="close btn-close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('admin.add.admin') }}" method="POST" id="addAdminForm">
                    @csrf
                    <div class="form row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="adminFirstName" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="adminLastName" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="contactNumber" id="contactNumber" placeholder="Contact Number" required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" name="userType" value=2>
                <button type="submit" class="btn btn-success" id="btnCreateAdmin">CONFIRM</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end ADD ADMIN MODAL --}}

{{-- VIEW ADMIN MODAL --}}
<div class="modal fade" id="viewAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-royal">
                <h5 class="modal-title" id="exampleModalLabel">ADMIN PROFILE</h5>
                <button type="button" class="close btn-close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{asset('img/employer_dashboard/user.png')}}" class="float-right" alt="">
                        <div class="mt-4">
                            {{-- <h5><b>Smith Hall</b></h5> --}}
                            <p class="mb-2"><strong><span id="firstName"></span> <span id="lastName"></span></strong></p>
                                <p id="email"></p>
                                <p id="contact"></p>
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
{{-- end VIEW ADMIN MODAL --}}