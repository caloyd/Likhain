@extends('employee.layout.layout')

@section('title', 'Profile')

@section('content_header')
    <h1>PROFILE</h1>
    <hr>
@endsection

@section('content')
    @foreach($employee as $emp_info)
    <div class="col-md-10">
        <form action="{{route('employee.update.profile', $emp_info->id)}}" method="POST">
            @csrf
            @method('PATCH')
        <div class="row">
           
            <div class="col-md-4 form-group">
                <label>First Name</label>
                <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{$emp_info->first_name}}" disabled>
                <span class="text-danger">{{ $errors->first('firstName') }}</span>
            </div>
            <div class="col-md-4 form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{$emp_info->last_name}}" disabled>
                    <span class="text-danger">{{ $errors->first('lastName') }}</span>
            </div>
            <div class="col-md-4 form-group">
                    <label>Middle Name</label>
                    <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="middleName" value="{{$emp_info->middle_name}}" disabled>
            </div>
            <div class="col-md-6 form-group">
                <label>Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$emp_info->email}}" disabled>
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            <div class="col-md-6 form-group">
                <label>Contact Number</label>
                <input type="text" class="form-control" name="contactNumber" id="contactNumber" value="{{$emp_info->contact_number}}" disabled>
            </div>
            <div class="col-md-12 form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="{{$emp_info->address}}"disabled>
            </div>
        </div>
    </div>
</form>

<div class="col-md-2 text-center">
        <div class="d-none" id="profilePic">
            @if(is_null($emp_info->employee_picture_path))
            <form action="/upload-profile-picture-employee/{{$emp_info->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
                <input class="file-upload d-none" id="imageUpload" type="file" name="employeePhoto" placeholder="Photo" accept=".png,.jpg,.jpeg" capture novalidate/>
                <div class="col-md-8 mx-auto mt-3">
                    <img src="{{asset('img/dist/employer.png')}}" class="img-circle img-fluid profile-pic" alt="">
                </div>
                <p class="img-text upload-button text-center mt-2">CHOOSE PHOTO</p>
                <button type="submit" class="btn btn-block btn-success d-none mb-2" id="btnSaveImage">UPLOAD PHOTO</button>
            </form>
            @else
            <form class="d-inline" action="/upload-profile-picture-employee/{{$emp_info->id}}" method="POST" enctype="multipart/form-data">
                @csrf 
                {{method_field("PATCH")}}
                <input class="file-upload d-none" id="imageUpload" type="file" 
                name="employeePhoto" placeholder="Photo" accept=".png,.jpg,.jpeg" capture novalidate>
                <img src="/profile/{{$emp_info->employee_picture_path}}" class="img-circle img-fluid profile-pic" id="imgUpload">
                <p class="img-text upload-button text-center mt-2">CHOOSE PHOTO</p>
                <button type="submit" class="btn btn-block mb-2 btn-success d-none " id="btnSaveImage">CHANGE</button>
            </form>
            <form class="d-inline" action="/default-picture-employee/{{$emp_info->id}}" method="POST">
                @csrf
                {{method_field('PATCH')}}
                <button type="submit" class="btn btn-block btn-danger mb-2" id="btnRemoveImage">REMOVE</button>
            </form>
            @endif
        </div>
        <div id="viewProfile">
            @if(is_null($emp_info->employee_picture_path))
            <div class="col-md-8 mx-auto mt-3 mb-5">
                <img src="{{asset('img/dist/employer.png')}}" class="img-circle img-fluid profile-pic" alt="">
            </div>
            @else
            <div class="col-md-8 mx-auto mt-3 mb-5">
                <img src="/profile/{{$emp_info->employee_picture_path}}" class="img-circle img-fluid profile-pic " id="imgUpload">
            </div>
            @endif
        </div>
    
        <button class="btn btn-primary btn-block" id="btnEdit" type="button">EDIT</button>
        <button class="btn btn-success btn-block d-none" id="btnSave">SAVE</button>
        <button class="btn btn-danger btn-block d-none" id="btnCancel" type="button">CANCEL</button>
    @endforeach
@endsection

@section('css')
<link rel="stylesheet" href="/css/applicant_dashboard.css">

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="{{asset('js/employee/profile.js')}}"></script>
@endsection