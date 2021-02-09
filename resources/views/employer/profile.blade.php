@extends('employer.layout.layout')

@section('title', 'Profile')

@section('content_header')
    <h1>PROFILE</h1>
    <hr>
@endsection

@section('content')
<div class="row">

<div class="card col-md-8 ">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <h1 class="card-title mt-1"><b>Company Details</b></h1>
            </div>
        </div>
        @foreach($companies as $company_profile)
        @if(is_null($company_profile->company_logo_path))
        <div class="col-md-3 mx-auto">
        <img src="{{asset('img/companies/def-logo-company.png')}}" class="img-circle col-md-12" alt="">
        </div>
        @else
        <div class="col-md-3 mx-auto">
            <img src="/{{$company_profile->company_logo_path}}" class="img-fluid col-md-12">
        </div>
        @endif
            <div class="row">
                <div class="col-md-12 mt-2 row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class = "card-header mb-2">Company Details</h5>
                            <div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Company Name: </b> {{$company_profile->company_name}}</li> 
                                    <li class="list-group-item"><b>Industry: </b> {{$company_profile->industry}}</li>    
                                    <li class="list-group-item"><b>Company Website: </b> {{$company_profile->website}}</li>                  
                                    <li class="list-group-item"><b>Company Address: </b> {{$company_profile->address}}</li>
                                    <li class="list-group-item"><b>Company Contact Number: </b> {{$company_profile->contact_number}}</li>
                                    </ul>
                            </div>
                        </div>
                        </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class = "card-header mb-2">Other Details</h5>
                            <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Working Hours: </b> {{$company_profile->working_hours}}</li> 
                                <li class="list-group-item"><b>Language: </b> {{$company_profile->language}}</li> 
                                <li class="list-group-item"><b>Company Size: </b> {{$company_profile->number_of_employees}}</li>
                                <li class="list-group-item"><b>Benefits: </b> {{$company_profile->benefits}}</li> 
                                <li class="list-group-item"><b>Postal Code: </b> {{$company_profile->postal_code}}</li> 
                            </ul>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-12  mx-auto">
                                <div class="card-body text-center">
                                <h5 class = "card-header mb-2">Company Description</h5>
                                <div>
                                <p class="card-text mb-5">{{$company_profile->description}}</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="card col-md-4">
    
    @foreach($users as $user)
    <div class="d-none" id="profilePic">
        @if(is_null($user->avatar_image_path))
        <form action="/upload-profile-picture-employer/{{$user->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <input class="file-upload d-none" id="imageUpload" type="file" 
            name="employerPhoto" placeholder="Photo" accept=".png,.jpg,.jpeg" capture novalidate/>
            <div class="col-md-8 mx-auto mt-3">
            <img src="{{asset('img/dist/employer.png')}}" class="img-circle img-fluid profile-pic" alt="">
            </div>
            <p class="img-text upload-button text-center mt-2">CHOOSE PHOTO</p>
            <button type="submit" class="btn btn-block btn-success d-none mb-2" id="btnSaveImage">UPLOAD PHOTO</button>
        </form>
        @else
        <form class="d-inline" action="/upload-profile-picture-employer/{{$user->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            
            <input class="file-upload d-none" id="imageUpload" type="file" 
            name="employerPhoto" placeholder="Photo" accept=".png,.jpg,.jpeg" capture novalidate>
            <img src="/profile/{{$user->avatar_image_path}}" class="img-circle img-fluid profile-pic" id="imgUpload">
            <p class="img-text upload-button text-center mt-2">CHOOSE PHOTO</p>
            <button type="submit" class="btn btn-block mb-2 btn-success d-none " id="btnSaveImage">CHANGE</button>
        </form>
        <form class="d-inline" action="/default-picture-employer/{{$user->id}}" method="POST">
            @csrf
            {{method_field('PATCH')}}
            <button type="submit" class="btn btn-block btn-danger mb-2" id="btnRemoveImage">REMOVE</button>
        </form>
        @endif
    </div>


        <div id="viewProfile">
            @if(is_null($user->avatar_image_path))
            <div class="col-md-8 mx-auto mt-3 mb-5">
                <img src="{{asset('img/dist/employer.png')}}" class="img-circle img-fluid profile-pic" alt="">
            </div>
            @else
            <div class="col-md-8 mx-auto mt-3 mb-5">
                <img src="/profile/{{$user->avatar_image_path}}" class="img-circle img-fluid profile-pic " id="imgUpload">
            </div>
            @endif

            <ul class="list-group-flush">
                <li class="list-group-item"><span class="fa-li"><i class="fas fa-user"></i></span>{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</li>
                <li class="list-group-item"><span class="fa-li"><i class="fas fa-envelope"></i></span>{{$user->email}}</li>
                <li class="list-group-item"><span class="fa-li"><i class="fas fa-phone"></i></span>{{$user->employers_contact}}</li>
                <li class="list-group-item"><span class="fa-li"><i class="fas fa-home"></i></span>{{$user->employers_address}}</li>
            </ul>
        </div>
        <button class="btn btn-primary btn-block" id="btnEdit" type="button">EDIT</button>



<div class="d-none" id="editProfile">
        <form action="/profile-update/{{$user->id}}" method="POST">
            @csrf
            {{method_field('PATCH')}}  
                <div class="column ml-3 mt-4 mr-3" id="basicForm">
                    <div class="col-md-12 form-group">
                        <label class="ml-2">First name</label>
                        <input type="text" class="ml-2 form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{$user->first_name}}" disabled>
                        <span class="text-danger">{{ $errors->first('firstName') }}</span>
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="ml-2">Middle name <small>(optional)</small></label>
                        <input type="text" class="ml-2 form-control @error('middleName') is-invalid @enderror" name="middleName" value="{{$user->middle_name}}" disabled>
                        <span class="text-danger">{{ $errors->first('middleName') }}</span>
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="ml-2">Last name</label>
                        <input type="text" class="ml-2 form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{$user->last_name}}" disabled>
                        <span class="text-danger">{{ $errors->first('lastName') }}</span>
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="ml-2">Email</label>
                        <input type="email" class="ml-2 form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" disabled>
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="ml-2">Contact Number</label>
                        <input type="text" class="ml-2 form-control @error('employers_contact') is-invalid @enderror" name="employersContact" id="employersContact" value="{{$user->employers_contact}}" disabled>
                        <span class="text-danger">{{ $errors->first('employers_contact') }}</span>
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="ml-2">Address</label>
                        <input type="text" class="ml-2 form-control @error('employers_address') is-invalid @enderror" name="employersAddress" value="{{$user->employers_address}}" disabled>
                        <span class="text-danger">{{ $errors->first('employers_address') }}</span>
                    </div>
                </div>
            <button type="submit" class="btn btn-success btn-block d-none" id="btnSave">SAVE</button>
            <button class="btn btn-danger btn-block d-none mb-2" id="btnCancel" type="button">CANCEL</button>
        </form>
</div>
@endforeach
    </div>
</div>

@endsection

@section('css')
<link rel="stylesheet" href="/css/applicant_dashboard.css">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="{{asset('js/employer/profile.js')}}"></script>
@endsection