@extends('main_landing.otherNav')

@section('title')
    Login Admin
@endsection

{{-- CONTENT --}}
@section('content')
<div class="container" style="min-height: 100vh;">
    <div class="row d-flex justify-content-center">
    <div class="col-md-4">
        <div class="log-in">
            <form action="{{ route('login') }}" method="POST">
            @csrf
            <h3 class="text-center p-2"><strong>LOGIN ADMIN</strong></h3>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required autocomplete="email" value="{{ old('email') }}">
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
                    <i class="fa fa-eye show-pass-admin"></i>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old ('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="passwordCheck">Remember me</label>
                <div id="forgotPassword" class="text-right">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="btn-password fw-normal">Forgot Password</a>
                    @endif
                </div>
            </div>
            <div class="col text-center">
                <input type="hidden" name="userType" value="2">
                <input type="hidden" name="userTypeSuper" value="1">
                <button type="submit" class="btn btn-primary custom-btn">LOGIN</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection

{{-- end CONTENT --}}
