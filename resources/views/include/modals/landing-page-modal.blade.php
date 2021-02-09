{{-- APPLY MODAL --}}
<div class="modal" id="applyModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue text-white">
                <h5 class="modal-title">Create an account</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mb-20">You must sign in to view full details</h4>

                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <a class="btn btn-success btb-lg btn-block" data-toggle="modal" data-target="#loginApplicantModal" href="" data-dismiss="modal">Sign in</a>
                            <a class="btn btn-primary btb-lg btn-block" href="/applicant/register">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- end APPLY MODAL --}}

{{-- LOGIN MODAL --}}
<div class="modal fade" id="loginApplicantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title mh-modified" >Sign in to Likhain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-11">
                            <div class="login-modal">
                                    {{-- @if (Session::has('message'))
                                        <div class="mb-2 alert alert-danger">{{Session::get('message')}}</div>
                                    @endif --}}
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" required>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group pass">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                            </div>

                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="applicantInputPassword" name="password" autocomplete="off" required>
                                            <span data-toggle="#applicantInputPasswords" class="fa fa-eye show-pass toggle-password"></span>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label fw-normal">Remember me</label>
                                        <div id="forgotPassword">
                                            @if (Route::has('password.request'))
                                            <a class="btn-password fw-normal" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col text-center">
                                        <input type="hidden" name="userType" value="5">
                                        <button type="submit" class="btn btn-primary custom-btn ">LOGIN</button>
                                    </div>

                                    <div class="orhr">
                                        <hr class="omb_hrOr">
                                        <span class="omb_spanOr">or</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <a href="{{ url('/oauth/redirect') }}" class="btn btn-md btn-facebook btn-block text-uppercase"><i class="fab fa-facebook-f mr-2"></i>Sign in with Facebook</a>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('users/js/jquery.min.js')}}"></script>
@if (count($errors) > 0)
    <script>
        $( document ).ready(function() {
            $('#loginApplicantModal').modal('show');
        });
    </script>
@endif
