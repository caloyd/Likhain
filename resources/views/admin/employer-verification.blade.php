@extends('admin.layout.layout')

@section('title', 'ADMIN - Employer Verification')

@section('content_header')
    <h1 class="text-dark">EMPLOYER VERIFICATION</h1>
    <hr>
@endsection

@section('content')
    <div class="col-md-12">
        <table class="table table-bordered table-hover table-striped" id="employerTbl">
            <thead class="text-white bg-royal">
                <tr>
                    <th class="align-middle">Company Name</th>
                    <th class="align-middle">Company Address</th>
                    <th class="align-middle">Company Size</th>
                    <th class="align-middle">Industry</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employer as $employers)
                <tr>
                    <td class="align-middle">{{$employers->company_name}}</td>
                    <td class="align-middle">{{$employers->address}}</td>
                    <td class="align-middle">{{$employers->number_of_employees}}</td>
                    <td class="align-middle">{{$employers->industry}}</td>
                    <td class="align-middle">
                        <a href="/admin/view-employer-verification/{{$employers->id}}" class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                        </a>
                        @if($employers->company_status == 1)
                        <form class="d-inline" action="/verify-employer/{{$employers->id}}" id="verifyEmployerForm{{$employers->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="verifiedEmployer" value=0>
                            <button class="btn btn-success btnAcceptReqs" data-id="{{$employers->id}}" data-name="{{$employers->company_name}}"><i class="fas fa-check"></i></button>
                        </form>
                        @else
                        <p class="d-inline text-success">Verified</p>
                        @endif
                    </td>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/admin/employer_verification.js')}}"></script>
@endsection