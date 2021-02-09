@extends('applicant.layout.layout')

@section('title', 'Change Password')

@section('content_header')
    <h1>CHANGE PASSWORD</h1>
    <hr>
@stop

@section('content')
<div class="col-md-12">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed fringilla nisl, et condimentum nulla. Nulla bibendum, turpis ut finibus feugiat,
    lorem magna maximus mauris, a porta felis elit sed nisl. Integer elementum tellus quis mauris elementum lacinia. Curabitur ut.</p>
</div>
    <div class="col-md-3 offset-md-4">
        <form id="resetPasswordForm" method="POST" action="{{ route('applicant.update.password', Auth::user()->id) }}">
            @csrf
            <div class="form-group">
                <label for="currentPass">Current Password</label>
                <input type="password" class="form-control" id="currentPass" name="currentPass" value="{{ old('currentPass') }}" required>
                <span class="invalid-feedback" role="alert" id="currentPass"></span>
            </div>
            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" value="{{ old('newPassword') }}" required>
                <span class="invalid-feedback" role="alert" id="newPassword"></span>
            </div>
            <div class="form-group">
                <label for="newPassword_confirmation">Confirm New Password</label>
                <input type="password" class="form-control" id="newPassword_confirmation" name="newPassword_confirmation" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-save">SAVE</button>
                <button type="button" id="cancelReset" class="btn btn-outline-success btn-cancel">CANCEL</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/changepass.css')}}">
@stop

@section('js')
    <script src="{{asset('js/applicant/change_password.js')}}"></script>
@stop
