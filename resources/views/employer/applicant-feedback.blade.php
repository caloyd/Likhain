@extends('employer.layout.layout')

@section('title', 'Applicant Feedback')

@section('content_header')
    <h1>APPLICANT FEEDBACK</h1>
    <hr>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="col-md-3 mb-40">
            <form method="POST" action="{{ url('/employer/applicant-feedback') }}" id="sortVal">
                @csrf
                <select id="sortBy" name="sortBy" class="form-control">
                    <option value="Freshness" selected>Freshness - Newest to oldest</option>
                    <option value="Oldness">Freshness - Oldest to newest</option>
                </select>
            </form>
        </div>

        @if(isset($feedback_fresh))
            @foreach ($feedback_fresh as $feedbacks)
                <div class="card p-3 defaultSort">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="font-weight-bolder">Applied for Position - {{$feedbacks->title}}</h5>
                                <p class="mb-0"><strong>{{$feedbacks->email}}</strong></p>
                                <small>{{\Carbon\Carbon::parse($feedbacks->created_at)->format('F d, Y')}}</small>
                                <p>{{$feedbacks->description}}</p>
                            </div>

                            <div class="col-md-2 mt-5">
                                <form class="d-inline" action="/feedback-approve/{{$feedbacks->id}}" method="POST" id="approveForm{{$feedbacks->id}}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="approve" value="Approved">
                                    <button class="btn btn-primary btnApprove" data-id="{{$feedbacks->id}}">APPROVE</button>
                                </form>
                                <form class="d-inline" action="/feedback-reject/{{$feedbacks->id}}" method="POST" id="rejectForm{{$feedbacks->id}}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="reject" value="Reject">
                                    <button class="btn btn-danger btnReject" data-id="{{$feedbacks->id}}">REJECT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        @if(isset($feedback_old))
            @foreach ($feedback_old as $feedbacks)
                <div class="card p-3 defaultOld d-none">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="font-weight-bolder">Applied for Position - {{$feedbacks->title}}</h5>
                                <p class="mb-0"><strong>{{$feedbacks->email}}</strong></p>
                                <small>{{\Carbon\Carbon::parse($feedbacks->created_at)->format('F d, Y')}}</small>
                                <p>{{$feedbacks->description}}</p>
                            </div>

                            <div class="col-md-2 mt-5">
                                <form class="d-inline" action="/feedback-approve/{{$feedbacks->id}}" method="POST" id="approveForm{{$feedbacks->id}}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="approve" value="Approved">
                                    <button class="btn btn-primary btnApprove" data-id="{{$feedbacks->id}}">APPROVE</button>
                                </form>
                                <form class="d-inline" action="/feedback-reject/{{$feedbacks->id}}" method="POST" id="rejectForm{{$feedbacks->id}}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="reject" value="Reject">
                                    <button class="btn btn-danger btnReject" data-id="{{$feedbacks->id}}">REJECT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/applicant_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/landing_page.css')}}">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/employer/applicant_feedback.js')}}"></script>
@endsection