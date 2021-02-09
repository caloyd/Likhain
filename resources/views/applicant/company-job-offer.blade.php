@extends('applicant.layout.layout')

@section('title', 'Job Offers')

@section('content_header')
    @foreach($company_name as $company)
        <h1>{{$company->company_name}} Job Offer</h1>
        <hr>
    @endforeach
@stop

@section('content')
    <div class="container-fluid bg-white p-4">
    <p>Hi <b>{{Auth::user()->first_name}}</b>,</p>
        <p>Congratulation for getting the job. We would like to here if you’re interested on working with us.</p>
        <p>Please come to the said location and don’t be late.</p>
    <p><b>{{$job_offer->job_offer_address}}<br>{{\Carbon\Carbon::parse($job_offer->job_offer_date)->format('F d, Y')}}, {{$job_offer->job_offer_time}}</b></p>
    <p>Contact Person: Mr./Ms. <b>{{$job_offer->contact_name}}</b>, Contact Number: <b>{{$job_offer->contact_number}}</b><br>If you have any concerns and questions please don’t hesitate to call.</p>
        <p>Thank You</p>
    <p><strong class="text-blue mr-1">Note:</strong>{{$job_offer->job_offer_note}}</p>
        <p class="mt-5"><strong class="text-blue">Attachment:</strong><em></em></p>
    </div>

    @if(is_null($job_offer->applicant_decision))
    <div class="modal-footer modal-footer-modified">
        <form action="/decision-accept/{{$job_offer->id}}"  id="jobOfferDecisionAccept" method="POST">
            @csrf
            {{method_field('PATCH')}}
            <input type="hidden" id="accept" name="accept" value="Accepted">
            <button type="submit" class="btn btn-success" id="acceptOffer">ACCEPT</button>
        </form>

        <form action="/decision-decline/{{$job_offer->id}}"  id="jobOfferDecisionDecline" method="POST">
            @csrf
            {{method_field('PATCH')}}
            <input type="hidden" id="denied" name="denied" value="Declined">  
            <button type="submit" class="btn btn-danger" id="declineOffer">DECLINE</button>
        </form>
    </div>
    @else
        <h5>You <b>{{$job_offer->applicant_decision}}</b> this job offer.</h5>
    @endif
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/applicant_dashboard.css')}}">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('js/applicant/company_job_offer.js')}}"></script>
@stop