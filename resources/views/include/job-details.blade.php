<div class="row mx-auto mb-40">
    <div class="col-md-8 offset-md-2 px-0 pb-4  ">
            @foreach ($job_post_detail as $job_detail)
            <div class="row">
                <div class="col-md-2 text-center">
                    <img src="/{{$job_detail->company_logo_path}}" class="img-fluid">
                </div>
            <div class="col-md-8 mt-4">
            <h4 class="mb-0 mt-4"><strong>{{$job_detail->title}}</strong></h4>
                <p class="mb-0 text-success">{{$job_detail->company_name}} <i class="fa fa-check-circle"></i></p>
            <p class="mb-0">{{$job_detail->job_location}}</p>
            </div>
        </div>

        <div class="mx-auto">
            <div class="col-md-12 mt-3" style="width: 100%;">
                <h5 class="mb-3"><strong>Job Detail</strong> </h5>
                <ul class="text-justify d-block">
                    <li>{{$job_detail->description}}
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <h5 class="mb-3"><strong>Required Skills</strong></h5>
                <ul class="text-justify">
                    <li>{{$job_detail->skill}}</li>
                </ul>
            </div>
        </div>
        @endforeach
        <div class="modal-footer modified px-0">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#applyModal">Apply</button>
        </div>
    </div>
</div>

@include('include.modals.landing-page-modal')
