@extends('main_landing.other')

@section('title')
   Sign Up Applicant
@endsection
{{-- CONTENT --}}
@section('content')
<img src="{{asset('img/landing_page/circle2.svg')}}" class="circleSignup2"alt="">
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <div class="card mb-3">
                    <div class="row no-gutters">         
                        <div class="col-md-4 left-form-applicant">
                            {{-- <h5 class="likhainText">Lorem ipsum dolor sit amet, consectetur adipiscing elitsed </h5> --}}
                        </div>
                        <div class="col-md-8 p-4" >
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <h2 class="text-center"><strong>{{ __('Sign Up') }}</strong></h2>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">                             
                                                    <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName" name="firstName" value="{{ old('firstName') }}" placeholder="First Name" required>
                                                    @error('firstName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control @error('middleName') is-invalid @enderror" id="middleName" name="middleName" value="{{ old('middleName') }}" placeholder="Middle Name(Optional)">                                       
                                                    @error('middleName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">                                 
                                                    <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName" name="lastName" value="{{ old('lastName') }}" placeholder="Last Name" required>
                                                    @error('lastName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('applicantPassword') is-invalid @enderror" id="applicantPassword" name="applicantPassword" placeholder="Password" required>
                                                @if($errors->has('password'))
                                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                                @endif
                                                @error('applicantPassword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="applicantPassword_confirmation" name="applicantPassword_confirmation" placeholder="Confirm Password" required>
                                            <p id="passwordHelpBlock" class="form-text text-muted">
                                                Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.
                                            </p>
                                        </div>
                                        <div class="col text-center">
                                            <input type="hidden" name="userType" value="5">
                                            <button type="submit" class="btn btn-primary custom-btn ">{{ __('Register') }}</button>
                                        </div>
                                </form>
                                <div class="mt-2 w-100 text-center">
                                    <a href="{{ url('/oauth/redirect') }}" target="_top" class="btn btn-md btn-facebook text-uppercase"><i class="fab fa-facebook-f mr-2"></i>Sign in with Facebook</a>
                                </div>   
                            {{-- <a class="text-center mt-3">Already have an account? <a href="{{route('login')}}" class="loginApplicant">Login</a></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<img src="{{asset('img/landing_page/circle1.svg')}}" class="circleSignup"alt="">
@endsection
{{-- end CONTENT --}}