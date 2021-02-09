@extends('employee.layout.layout')

@section('title', 'Employee - Change Password')

@section('content_header')
    <h1 class="text-dark">CHANGE PASSWORD</h1>
    <hr>
@endsection

@section('content')
<div class="col-md-12">
 
</div>
    <div class="col-md-3 offset-md-4">
    <form id="updatePasswordForm" action="{{ route('employee.update.password', Auth::user()->id) }}" method="POST">
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
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('js/employee/change_password.js')}}"></script>
@endsection
