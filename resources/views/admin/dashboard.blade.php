@extends('admin.layout.layout')

@section('title', 'ADMIN - Dashboard')

@section('content_header')
    <h1 class="text-dark">DASHBOARD</h1>
    <hr>
@endsection

@section('content')
    <div class="col-md-4">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$countEmp}}</h3>
                <p>EMPLOYERS</p>
            </div>
            <div class="icon">
                <i class="fas fa-city text-white"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$countApp}}</h3>
                <p>Applicants</p>
            </div>
            <div class="icon">
                <i class="fas fa-users text-white"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="small-box bg-warning">
            <div class="inner text-white">
                <h3>{{$countJob}}</h3>
                <p>Job Postings</p>
            </div>
            <div class="icon">
                <i class="fas fa-paste text-white"></i>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <table class="table table-bordered table-hover" id="employerTbl">
            <thead class="tex-white bg-royal">
    
                <tr>
                    <th>Company Name</th>
                    <th>Company Address</th>
                    <th>Company Size</th>
                    <th>Industry</th>
                    <th>Verification Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($company as $companies)
                <tr>
                    <td>{{$companies->company_name}}</td>
                    <td>{{$companies->address}}</td>
                    <td>{{$companies->number_of_employees}}</td>
                    <td>{{$companies->industry}}</td>
                    @if($companies->company_status == 1)
                    <td class="text-warning">Unverified</td>
                    @else
                    <td class="text-success">Verified</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_dashboard.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('js/admin/dashboard.js')}}"></script>
@endsection