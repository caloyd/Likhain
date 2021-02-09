@extends('main_landing.otherNav')

@section('title')
Login Employer
@endsection

{{-- CONTENT --}}
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
        <div class="log-in">
            <form action="{{ route('login') }}" method="POST">
            @csrf
            <h3 class="login-text text-center p-2"><strong>LOGIN EMPLOYER</strong></h3>
                    {{-- @if (Session::has('message'))
                    <div class="mt-2 mb-2 alert alert-danger">{{Session::get('message')}}
                    </div>
                    @endif --}}
                <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autocomplete="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    </div>
                    <i class="fa fa-eye show-pass-employer"></i>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old ('remember') ? 'checked' : '' }}>
                <label class="form-check-label">Remember me</label>
                <div id="forgotPassword" class="text-right">
                    @if (Route::has('password.request'))
                        <a class="btn-password fw-normal" href="{{ route('password.request') }}" >Forgot Password</a>
                    @endif
                </div>
            </div>
            <div class="col text-center">
                <input type="hidden" name="userType" value="3">
                <input type="hidden" name="userTypeStaff" value="4">
                <button type="submit" class="btn btn-primary custom-btn">LOGIN</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection

{{-- end CONTENT --}}
