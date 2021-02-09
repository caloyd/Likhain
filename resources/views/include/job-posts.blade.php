<div class="row mx-auto pb-5">
    <div class="col-md-10 offset-1">
        <h4>JOB POST</h4>
        @foreach($job_post_all as $jobs)
        <div class="card my-3">
            <div class="card-body p-3">
                <div class="row py-3">
                    <div class="col-md-2 pl-4">
                        <a href="/company-details/{{$jobs->company_id}}"><img src="/{{$jobs->company_logo_path}}" class="img-fluid"></a>
                    </div>
                    <div class="col-md-10 pr-5">
                        <a href="/view-job-post/{{$jobs->job_post_id}}" style="color: black;"><h5 class="mb-0"><strong>{{$jobs->title}}</strong></h5></a>

                        <a href="/company-details/{{$jobs->company_id}}">
                        <p>{{$jobs->company_name}}
                        </a>
                        <i class="fa fa-check-circle" title="Verified company"></i></p>

                    <p class="card-text">{{$jobs->description}}</p>
                    </div>
                </div>
                <div class="modal-footer modified">
               <a href="/view-job-post/{{$jobs->job_post_id}}" class="btn btn-primary">View Details</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#applyModal">Apply</button>
                </div>
            </div>
        </div>
        @endforeach
        {{-- <div class="float-right">
                {{$job_post_all->links()}}
            </div> --}}
    </div>
</div>
@include('include.modals.landing-page-modal')


