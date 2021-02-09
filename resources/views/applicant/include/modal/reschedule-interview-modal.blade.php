<div class="modal fade" id="rescheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLabel">Reschedule Interview</h5>
          <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      
          <form action="/applicant-interview-reschedule/{{$interviews->id}}" id="interviewReschedule" method="POST">
              @csrf
              {{method_field('PATCH')}}
              <div class="form-row">
            
            <div class="form-group col-md-6">
                <div class="input-group date" id="rescheduleInterviewDate" data-target-input="nearest">

                    <input type="hidden" id="interviewId">
                    <input type="text" class="form-control datetimepicker-input" data-target="#rescheduleInterviewDate" id="interviewDate" name="interviewDate" placeholder="Interview Date" />

                    <div class="input-group-append" data-target="#rescheduleInterviewDate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="input-group date" id="rescheduleStartTime" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#rescheduleStartTime" id="interviewStart" name="interviewStart" placeholder="Start Time" />
                    <div class="input-group-append" data-target="#rescheduleStartTime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                    </div>
                </div>
            </div>
            
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Reschedule</button>
        </div>
      </form>
    
      </div>
    </div>
  </div>
