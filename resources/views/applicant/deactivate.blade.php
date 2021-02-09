@extends('applicant.layout.layout')

@section('title', 'Deactivate Account')

@section('content_header')
    <h1>DEACTIVATE ACCOUNT</h1>
    <hr>
@stop

@section('content')
    <div class="col-md-12">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed fringilla nisl, et condimentum nulla. Nulla bibendum, turpis ut finibus feugiat,
        lorem magna maximus mauris, a porta felis elit sed nisl. Integer elementum tellus quis mauris elementum lacinia. Curabitur ut.</p>
    </div>

    <div class="col-md-3 offset-md-4">
        <form method="POST" action="{{ route('applicant.deactivate.account', Auth::user()->id) }}">
            @csrf
            <div class="form-group">
                <label for="currentPassword">Password</label>
                <input type="password" class="form-control @error('currentPassword') is-invalid @enderror" id="currentPassword" name="currentPassword" value="{{ old('currentPassword') }}" required>
                @error('currentPassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="currentPassword_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="currentPassword_confirmation" name="currentPassword_confirmation" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger btn-save">DEACTIVATE </button>
            </div>
        </form>
    </div> 
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/changepass.css')}}">
@stop

@section('js')
    <script>
        $('#accnt-sidebar').addClass('menu-open');
        $('#accnt-sett').addClass('active');
        $('#deact').addClass('active');
    </script>
@stop