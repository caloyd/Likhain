@extends('employer.layout.layout')

@section('title','Change password')

@section('content_header')
    <h1>CHANGE PASSWORD</h1>
    <hr>
@endsection

@section('content')
<div class="col-md-12">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed fringilla nisl, et condimentum nulla. Nulla bibendum, turpis ut finibus feugiat,
    lorem magna maximus mauris, a porta felis elit sed nisl. Integer elementum tellus quis mauris elementum lacinia. Curabitur ut.</p>
</div>
    <div class="col-md-3 offset-md-4">
    <form id="changePasswordForm" action="/change-password-employer/{{Auth::user()->id}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="currentPass">Current Password</label>
            <input type="password" class="form-control @error('currentPass') is-invalid @enderror" name="currentPass" id="currentPass" value="{{old('currentPass')}}" required>
            <span class="invalid-feedback" role="alert" id="currentPass"></span>
        </div>

        <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="password" class="form-control" name="newPassword" id="newPassword" value="{{old('newPassword')}}" required>
            <span class="invalid-feedback" role="alert" id="newPassword"></span>

        </div>

        <div class="form-group">
            <label for="newPasswordConfirm">Confirm New Password</label>
            <input type="password" class="form-control" id="newPassword_confirmation" name="newPassword_confirmation" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success btn-save" id="btnSavePass">SAVE</button>
            <button class="btn btn-secondary btn-cancel" id="btnCancelPass">CANCEL</button>
        </div>
        </form>
    </div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/changepass.css')}}">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/employer/change_password.js')}}"></script>
@endsection
