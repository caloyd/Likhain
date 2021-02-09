{{-- EMPLOYER STAFF - CREATE STAFF MODAL --}}
<div class="modal fade" id="createStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CREATE STAFF ACCOUNT</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form row">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="last Name">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Suffix">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="createdStaff">CONFIRM</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
            </div>
        </div>
    </div>
</div>
{{-- end EMPLOYER STAFF - CREATE STAFF MODAL --}}

{{-- EMPLOYER STAFF - VIEW STAFF PROFILE --}}
<div class="modal fade" id="viewProfileStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">STAFF PROFILE</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{asset('img/employer_dashboard/user.png')}}" class="float-right" alt="">
                        <div class="mt-4">
                            <h5><b>Smith Hall</b></h5>
                            <p>s.hall@engraphia.ph<br>134 Block 27 Lot, 404 City, Philippines<br>+54 9201 2345</p>
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