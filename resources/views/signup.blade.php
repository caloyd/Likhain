@extends('main_landing.other')

@section('title', 'SIGN UP')

{{-- CONTENT --}}
@section('content')
    <div class="container">
        <div class="row mt-40">
            <div class="col-md-5 ">
                <div class="card applicant">
                    <div class="card-body">
                        <h5 class="card-title">Im looking for Work</h5>
                        <h5>Create an <strong><em>applicant</em></strong> account</h5>
                    <a href="{{ route('applicant.signup') }}" class="btn btn-primary cstm-btn"><strong>SIGN UP NOW!</strong></a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <img src="{{asset('img/sign_up/OR-middle.svg')}}" class="or-middle" alt="">
            </div>
            <div class="col-md-5 ">
                <div class="card employer">
                    <div class="card-body">
                        <h5 class="card-title">Im looking for Applicants</h5>
                        <h5>Create an <strong><em>employer</em></strong> account</h5>
                        <a href="{{ route('employer.signup') }}" class="btn btn-primary cstm-btn-applicants"><strong>SIGN UP NOW!<strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
{{-- end CONTENT --}}

