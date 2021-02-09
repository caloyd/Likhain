@extends('employer.layout.layout')

@section('title', 'Deactivate')

@section('content_header')
    <h1>DEACTIVATE</h1>
    <hr>
@endsection

@section('content')
    <div class="col-md-12">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed fringilla nisl, et condimentum nulla. Nulla bibendum, turpis ut finibus feugiat,
        lorem magna maximus mauris, a porta felis elit sed nisl. Integer elementum tellus quis mauris elementum lacinia. Curabitur ut.</p>
    </div>
    <div class="col-md-3 offset-md-4">
        <form method="POST" action="{{ URL('employer/deactivate/'.Auth::user()->id) }}" id="formDeactivate">
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
                <button type="submit" class="btn btn-danger btn-save" id="btnDeactivate">DEACTIVATE </button>
            </div>
        </form>
    </div> 
@endsection

@section('css')
    
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/employer/deactivate.js')}}"></script>
@endsection