@extends('main_landing.other')

@section('title')
    Sign Up Employer
@endsection
{{-- CONTENT --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-3 left-form-employer">
                            <h5 class="likhainText">Lorem ipsum dolor sito amet, consectetur adipiscing elitsed </h5>
                        </div>
                        <div class="col-md-9 mt-5 pd-2" >
                            <div class="container">
                                <p class="text-form mb-4">This Registration Form is exclusively for Employers who wants to post a job and hire people </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="mb-0">Company Name</label>
                                                <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Full Company Name"  class="form-control @error('companyName') is-invalid @enderror" required autocomplete="companyName">
                                                @error('companyName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-0">Company Email</label>
                                                <input type="email" class="form-control" id="companyEmail" name="companyEmail" placeholder="Company Email"
                                                class="form-control @error('companyEmail') is-invalid @enderror" required autocomplete="companyEmail">
                                                @error('companyEmail')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-0">Employer First Name</label>
                                                <input type="text" class="form-control" id="employerFirstname" name="employerFirstname" placeholder="Employer First name" class="form-control @error('employerFirstname') is-invalid @enderror" required autocomplete="employerFirstname">
                                                @error('employerFirstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-0">Employer Email</label>

                                                <input type="email" class="form-control" id="email" name="email" placeholder="Employer Email
                                                " class="form-control @error('email') is-invalid @enderror" required autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="mb-0">Company Registration No.</label>
                                                <input type="hidden" id="userType" name="userType" value="3">
                                                <input type="text" class="form-control" id="companyRegiNo" name="companyRegiNo" placeholder="Company Registration No.
                                                " class="form-control" required>

                                            </div>
                                            <div class="form-group">
                                                <label class="mb-0">Company Contact No.</label>
                                                <input type="number" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" id="companyNumber" name="companyNumber" placeholder="Company Contact Number"
                                                class="form-control @error('companyNumber') is-invalid @enderror" required autocomplete="companyNumber">
                                                @error('companyNumber')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-0">Employer Last Name</label>
                                                <input type="text" class="form-control" id="employerLastname" name="employerLastname" placeholder="Employer Last name"
                                                class="form-control @error('employerLastname') is-invalid @enderror" required autocomplete="employerLastname">
                                                @error('employerLastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-0">Employer Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                                                class="form-control @error('password') is-invalid @enderror" required autocomplete="password">
                                            @if($errors->has('password'))
                                            <div class="text-danger">{{ $errors->first('password') }}</div>
                                            @endif
                                                <p id="passwordHelpBlock" class="form-text text-muted">
                                                    Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.
                                                </p>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col text-center mt-3">
                                            <button type="submit" class="btn btn-primary custom-btn "><strong>CREATE ACCOUNT</strong></button>
                                            <p class="mt-3 mb-3">Already have an account? <a href="/login_employer"class="loginEmployer">Login</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- end CONTENT --}}
