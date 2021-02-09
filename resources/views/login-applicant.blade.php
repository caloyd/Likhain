@extends('main_landing.other')

@section('title', 'LOGIN')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-4">
        <div class="log-in">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <h3 class="login-text"><strong>APPLICANT</strong></h3>
              <div class="form-group">
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" required>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div> 
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-text"><i class="fa fa-lock"></i></div>
                  <input type="password" class="form-control  @error('password') is-invalid @enderror" id="applicantInputPassword" name="password" required>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="passwordCheck">Remember me</label>
                  <div id="forgotPassword" class="text-right">
                    @if (Route::has('password.request'))
                      <a class="btn-password fw-normal" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                    @endif
                </div>
              </div>
              <div class="col text-center">
                <button type="submit" class="btn btn-primary custom-btn ">LOGIN</button>
              </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection