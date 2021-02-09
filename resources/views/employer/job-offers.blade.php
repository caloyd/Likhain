@extends('employer.layout.layout')

@section('title','Job Offers')

@section('content_header')
    <h1>JOB OFFERS</h1>
    <hr>
@stop

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="col-md-12 mb-20">
        <button class="btn btn-danger btn-sm btnMassDelete" data-url="{{ url('multiDeleteJobOffer') }}"><i class="fas fa-minus mr-2"></i>JOB OFFERS</button>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover" id="jobOffersTbl">
            <thead class="bg-info">
                <tr>
                    <th class="text-center">
                        <input type="checkbox" class="form-control align-middle" id="selectAll">
                    </th>
                    <th class="align-middle">Applicant Name</th>
                    <th class="align-middle">Job Position</th>
                    <th class="align-middle">Status</th>
                    <th class="align-middle">Appointment Date</th>
                    <th class="align-middle">Contact Person</th>
                    <th class="align-middle">Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- EmployerController --}}
                @if(isset($job_offer))
                    @foreach ($job_offer as $job_offers)
                <tr id="tr_{{$job_offers->id}}">
                    <td class="text-center">
                        <input type="checkbox" class="form-control align-middle sub_chk" data-id="{{$job_offers->id}}">
                    </td>
                    <td class="align-middle">{{$job_offers->first_name}} {{$job_offers->last_name}}</td>
                    <td class="align-middle">{{$job_offers->title}}</td>
                    @if(is_null($job_offers->applicant_decision))
                    <td class="align-middle text-muted">N/A</td>
                    @else
                    <td class="align-middle">{{$job_offers->applicant_decision}}</td>
                    @endif
                    <td class="align-middle">{{\Carbon\Carbon::parse($job_offers->job_offer_date)->format('F d, Y')}} - {{$job_offers->job_offer_time}}</td>
                    <td class="align-middle">{{$job_offers->contact_name}}</td>
                    <td class="align-middle">
                        <button class="btn btn-primary" type="button" data-toggle="modal" 
                        data-target="#viewApplicantProfile{{$job_offers->app_id}}">
                        <i class="fas fa-eye"></i></button>

                        <form class="d-inline" action="/delete-job-offer-emp/{{$job_offers->id}}" method="POST" id="cancelJobOfferForm{{$job_offers->id}}">
                            @csrf
                            {{method_field('DELETE')}}
                        <button class="btn btn-danger btnDelete" data-id="{{$job_offers->id}}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

{{-- APPLICANT SEARCH-INFO-MODAL --}}
@foreach ($job_offer as $job_offers)
<div class="modal fade" id="viewApplicantProfile{{$job_offers->app_id}}" tabindex="-1" role="dialog" aria-labelledby="applicantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applicantModalLabel">{{$job_offers->first_name}}</h5>&nbsp;
                <h5 class="modal-title" id="applicantModalLabelLast">{{$job_offers->last_name}}</h5>&nbsp;
                <h5 class="modal-title">Profile</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 info">
                        <h5 id="email">{{$job_offers->email}}</h5>
                        <h5 id="contactNo">{{$job_offers->contact_number}}</h5>
                        <h5 id="expSalary">{{number_format($job_offers->expected_salary, 2)}}</h5>
                        <h5 class="mt-4 font-weight-bold">Skills</h5>
                        <p id="skills">
                        @foreach ($applicant_skills as $skill)
                            @if ($skill->id == $job_offers->app_id)
                                <div class="row">
                                    <div class="col-6">
                                    {!!implode('<br>',$skill->skills()->get()->pluck('name')->toArray())!!}
                                    </div>
                                    <div class="col-6">
                                    {!!implode('<br>',$skill->applicantSkills()->get()->pluck('years_of_experience')->toArray())!!}
                                    </div>
                                    </div>
                            @endif
                        @endforeach
                        </p>
                    </div>
                    <div class="col-md-4">
                    @if(is_null($job_offers->avatar_image_path))
                        <img src="{{asset('img/employer_dashboard/Applicant.png')}}" alt="" class="w-75">
                    @else
                    <img src="/profile/{{$job_offers->avatar_image_path}}"  class="w-75">
                    @endif
                    </div>
                </div> 
                <div class="row mt-2">
                    <div class="col-md-4 mt-3">
                        <h5><b>Education</b></h5>
                        <h5 id="school">{{$job_offers->school}}</h5>
                        <p id="course">{{$job_offers->course_degree}}</p>
                    </div>
                    <div class="col-md-4 mt-5">
                        <h5><span id="dateFrom">{{$job_offers->date_begin}}</span> - <span id="dateTo">{{$job_offers->date_end}}</span></h5>
                        <p id="educ"></p>
                    </div>   
                </div>  
                <div class="row mt-2">
                    <div class="col-md-4 mt-3">
                            <h5><b>Work Experience</b></h5>
                            @foreach($applicant_work as $work)
                            @if($work->id == $job_offers->app_id)
                            <h5 id="companyName">{!!implode("<br>",$work->applicantWorkExperiences->pluck('company_name')->toArray())!!}
                            </h5>
                            <p id="salary">{!!implode("<br>",$work->applicantWorkExperiences->pluck('previous_salary')->toArray())!!}</p>
                    </div>
                    <div class="col-md-4 mt-5">
                            <span id="begin">{!!implode("<br>",$work->applicantWorkExperiences->pluck('date_from')->toArray())!!}</span> -
                            <span id="end"></span>{!!implode("<br>",$work->applicantWorkExperiences->pluck('date_to')->toArray())!!}</h5>
                          
                    </div>   
                    <div class="col-md-4 mt-5">
                            <p id="jobTitle"> {!!implode("<br>",$work->applicantWorkExperiences->pluck('job_title')->toArray())!!}</p>
                    </div>
                    @endif
                    @endforeach
                </div>     
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/employer_dashboard.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/employer/job_offer.js')}}"></script>
@endsection