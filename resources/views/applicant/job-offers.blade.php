@extends('applicant.layout.layout')

@section('title', 'Job Offers')

@section('content_header')
    <h1>JOB OFFERS</h1>
    <hr>
@stop
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="col-md-3">
        <button class="btn btn-danger btn-sm mb-20 btnDeleteManyJobOffer" data-url="{{ url('multipleDeleteJobOffer') }}"><i class="fas fa-trash mr-2"></i>DELETE</button>
    </div>
    <div class="col-md-12">
        <table id="jobOffer" class="table table-bordered">
            <thead class="bg-success">
                <tr>
                    <th class="text-center">
                        <input type="checkbox" id="selectAll" class="align-middle">
                    </th>
                    <th class="align-middle">Company Name</th>
                    <th class="align-middle">Position</th>
                    <th class="align-middle">Date Received</th>
                    <th class="align-middle">Contact No.</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($job_offer as $job_offers)
                <tr id="tr_{{$job_offers->id}}" onmouseover="bigImg(this)" class="<?php echo $job_offers->views > 0 ? "bg-white" : "unviewed" ?>">
                    <td class="text-center">
                        <input type="checkbox" class="checkbox align-middle sub_chk" data-id="{{$job_offers->id}}">
                    </td>
                    <td class="align-middle">
                        <div style="color:red;font-size:10px;">
                            <?php echo $job_offers->views > 0 ? "" : "*Unviewed" ?>
                        </div>
                            {{$job_offers->company_name}}
                    </td>
                    <td class="align-middle">{{$job_offers->title}}</td>
                    <td class="align-middle">{{\Carbon\Carbon::parse($job_offers->created_at)->format('F d, Y')}}</td>
                    <td class="align-middle">{{$job_offers->contact_number}}</td>
                    <td>
                    <a href="company-job-offer/{{$job_offers->id}}" class="btn btn-primary"><i class="fas fa-eye mr-2"></i>View</a>
                         <form class="d-inline" action="/applicant/delete-job-offer/{{$job_offers->id}}" method="POST" id="deleteJobOfferForm{{$job_offers->id}}">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="button" class="btn btn-danger btnDelete" data-id="{{$job_offers->id}}">
                                <i class="fas fa-trash mr-2"></i>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/applicant_dashboard.css')}}">
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('js/applicant/job_offer.js')}}"></script>
@stop
