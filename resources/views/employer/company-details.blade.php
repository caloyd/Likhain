@extends('employer.layout.layout')

@section('title','Company Details')

@section('content_header')
    <h1>COMPANY DETAILS</h1>
    <hr>
@endsection

@section('content')

@foreach($company as $company_profile)
    <div class="col-md-8 offset-md-1 mb-4">
            <form action="/company-update/{{$company_profile->id}}" id="companyDetailsForm" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}        
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('companyName') is-invalid @enderror" name="companyName" value="{{$company_profile->company_name}}" required>
                        @error('companyName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Industry</label>
            <div class="col-sm-10">
                <select class="form-control" id="industry" name="companyIndustry" required>
                    <option selected>{{$company_profile->industry}}</option>
                    <option>Accounting/Audit/Tax Services</option>
                    <option>Advertising/Marketing/Promotion/PR</option>
                    <option>Aerospace/Aviation/Airline</option>
                    <option>Agricultural/Plantation/Poultry/Fisheries</option>
                    <option>Apparel</option>
                    <option>Architectural Services/Interior Designing</option>
                    <option>Arts/Design/Fashion</option>
                    <option>Automobile/Automotive Ancillary/Vehicle</option>
                    <option>Banking/Financial Services</option>
                    <option>BioTechnology/Pharmaceutical/Clinical research</option>
                    <option>Call Center/IT-Enabled Services/BPO</option>
                    <option>Chemical/Fertilizers/Pesticides</option>
                    <option>Computer/Information Technology (Hardware)</option>
                    <option>Computer/Information Technology (Software)</option>
                    <option>Construction/Building/Engineering</option>
                    <option>Consulting (Business &amp; Management)</option>
                    <option>Consulting (IT, Science, Engineering &amp; Technical)</option>
                    <option>Consumer Products/FMCG</option>
                    <option>Education</option>
                    <option>Electrical &amp; Electronics</option>
                    <option>Entertainment/Media</option>
                    <option>Environment/Health/Safety</option>
                    <option>Exhibitions/Event management/MICE</option>
                    <option>Food &amp; Beverage/Catering/Restaurant</option>
                    <option>Gems/Jewellery</option>
                    <option>General &amp; Wholesale Trading</option>
                    <option>Government/Defence</option>
                    <option>Grooming/Beauty/Fitness</option>
                    <option>Healthcare/Medical</option>
                    <option>Heavy Industrial/Machinery/Equipment</option>
                    <option>Hotel/Hospitality</option>
                    <option>Human Resources Management/Consulting</option>
                    <option>Insurance</option>
                    <option>Journalism</option>
                    <option>Law/Legal</option>
                    <option>Library/Museum</option>
                    <option>Manufacturing/Production</option>
                    <option>Marine/Aquaculture</option>
                    <option>Mining</option>
                    <option>Non-Profit Organisation/Social Services/NGO</option>
                    <option>Oil/Gas/Petroleum</option>
                    <option>Others</option>
                    <option>Polymer/Plastic/Rubber/Tyres</option>
                    <option>Printing/Publishing</option>
                    <option>Property/Real Estate</option>
                    <option>R&amp;D</option>
                    <option>Repair &amp; Maintenance Services</option>
                    <option>Retail/Merchandise</option>
                    <option>Science &amp; Technology</option>
                    <option>Security/Law Enforcement</option>
                    <option>Semiconductor/Wafer Fabrication</option>
                    <option>Sports</option>
                    <option>Stockbroking/Securities</option>
                    <option>Telecommunication</option>
                    <option>Textiles/Garment</option>
                    <option>Tobacco</option>
                    <option>Transportation/Logistics</option>
                    <option>Travel/Tourism</option>
                    <option>Utilities/Power</option>
                    <option>Wood/Fibre/Paper</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Bldg. Name/No./Blk No.</label>
            <div class="col-sm-10">
            <input class="form-control" name="companySpecificAddress">
            </div>
        </div>

        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
                <select class="form-control" id="companyCity" name="companyCity">
                    <option value="Makati City">Makati City</option>   
                    <option value="Taguig City">Taguig City</option> 
                </select>
            </div>    
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
                <select class="form-control" id="companyCountry" name="companyCountry">
                    <option selected value="Philippines">Philippines</option> 
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Business Address</label>
            <div class="col-sm-10">
            <input class="form-control" value="{{$company_profile->address}}" disabled>
            </div>
        </div>
        <div class="form-row">
                <div class="input-group mb-3 col-md-9 offset-md-3">
                    <input type=hidden name="fullLocation" class="form-control" id="fullLocation" value=""> 
                </div>
        </div>
        <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Postal Code</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="companyPostalCode" id="companyPostalCode" value="{{$company_profile->postal_code}}" required>
                </div>
                <span class="invalid-feedback" role="alert" id="companyPostalCode"></span>
            </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Company Size</label>
            <div class="col-sm-5">

                <select name="companySize" id="companySize" class="form-control" required>
                    <option>{{$company_profile->number_of_employees}}</option>
                    <option>1-50</option>
                    <option>51-200</option>
                    <option>201-500</option>
                    <option>501-1000</option>
                    <option>1001-2000</option>
                    <option>2001-5000</option>
                    <option>More than 5000 </option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Company Description</label>
            <div class="col-md-10">
                <textarea name="companyDescription" cols="30" rows="15" class="col-md-12 resizable-none form-control" required>{{$company_profile->description}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Contact Number</label>
            <div class="col-md-10">
            <input type="text" class="form-control @error('contactNumber') is-invalid @enderror" name="contactNumber" id="contactNumber" value="{{$company_profile->contact_number}}" required>

                @error('contactNumber')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Website</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="companyWebsite" value="{{$company_profile->website}}" required autocomplete="companyWebsite">
                <span class="invalid-feedback" role="alert" id="companyWebsite"></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Working Hours</label>
            <div class="col-md-10">
                <select name="workingHours" id="workingHours" class="form-control" required>
                    <option>{{$company_profile->working_hours}}</option>
                    <option>Regular hours, Mondays - Fridays</option>
                    <option>Saturdays or Shifts required</option>
                    <option>Long hours</option>
                    <option value="Others">Others (specify)</option>
                </select>
                <input type="text" class="form-control mt-3 d-none" id="txtWorkHours" name="otherWorkingHours" placeholder="e.g Tue - Sat 9AM - 6PM">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Dress code</label>
            <div class="col-md-10">
                <select name="dressCode" id="dressCode" class="form-control" required>
                <option>{{$company_profile->dress_code}}</option>
                    <option value="Casual">Casual</option>
                    <option value="Formal">Formal</option>
                    <option value="Smart Casual">Smart Casual</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Benefits</label>
            <div class="col-md-10">
                <select class="form-control" name="companyBenefits" id="benefits" multiple="multiple" required>
                    <option selected>{{$company_profile->benefits}}</option>
                    <option value="SSS">SSS</option>
                    <option value="Free Parking">Free Parking</option>
                    <option value="Free Lunch">Free Lunch</option>
                    <option value="Friday Lunch out">Friday Lunch-out</option>
                </select>
            </div>
        </div>
        <textarea name="outputBenefits" id="outputBenefits" style="display:none;"></textarea>

        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Spoken Language</label>
            <div class="col-md-10">
                <select class="form-control" name="companyLanguage" id="spoken-language" multiple="multiple" required>
                <option selected>{{$company_profile->language}}</option>
                    <option value="Afrikanns">Afrikanns</option>
                    <option value="Albanian">Albanian</option>
                    <option value="Arabic">Arabic</option>
                    <option value="Armenian">Armenian</option>
                    <option value="Basque">Basque</option>
                    <option value="Bengali">Bengali</option>
                    <option value="Bulgarian">Bulgarian</option>
                    <option value="Catalan">Catalan</option>
                    <option value="Cambodian">Cambodian</option>
                    <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                    <option value="Croation">Croation</option>
                    <option value="Czech">Czech</option>
                    <option value="Danish">Danish</option>
                    <option value="Dutch">Dutch</option>
                    <option value="English">English</option>
                    <option value="Estonian">Estonian</option>
                    <option value="Filipino">Filipino</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finnish">Finnish</option>
                    <option value="French">French</option>
                    <option value="Georgian">Georgian</option>
                    <option value="German">German</option>
                    <option value="Greek">Greek</option>
                    <option value="Gujarati">Gujarati</option>
                    <option value="Hebrew">Hebrew</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Hungarian">Hungarian</option>
                    <option value="Icelandic">Icelandic</option>
                    <option value="Indonesian">Indonesian</option>
                    <option value="Irish">Irish</option>
                    <option value="Italian">Italian</option>
                    <option value="Japanese">Japanese</option>
                    <option value="Javanese">Javanese</option>
                    <option value="Korean">Korean</option>
                    <option value="Latin">Latin</option>
                    <option value="Latvian">Latvian</option>
                    <option value="Lithuanian">Lithuanian</option>
                    <option value="Macedonian">Macedonian</option>
                    <option value="Malay">Malay</option>
                    <option value="Malayalam">Malayalam</option>
                    <option value="Maltese">Maltese</option>
                    <option value="Maori">Maori</option>
                    <option value="Marathi">Marathi</option>
                    <option value="Mongolian">Mongolian</option>
                    <option value="Nepali">Nepali</option>
                    <option value="Norwegian">Norwegian</option>
                    <option value="Persian">Persian</option>
                    <option value="Polish">Polish</option>
                    <option value="Portuguese">Portuguese</option>
                    <option value="Punjabi">Punjabi</option>
                    <option value="Quechua">Quechua</option>
                    <option value="Romanian">Romanian</option>
                    <option value="Russian">Russian</option>
                    <option value="Samoan">Samoan</option>
                    <option value="Serbian">Serbian</option>
                    <option value="Slovak">Slovak</option>
                    <option value="Slovenian">Slovenian</option>
                    <option value="Spanish">Spanish</option>
                    <option value="Swahili">Swahili</option>
                    <option value="Swedish ">Swedish </option>
                    <option value="Tamil">Tamil</option>
                    <option value="Tatar">Tatar</option>
                    <option value="Telugu">Telugu</option>
                    <option value="Thai">Thai</option>
                    <option value="Tibetan">Tibetan</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Turkish">Turkish</option>
                    <option value="Ukranian">Ukranian</option>
                    <option value="Urdu">Urdu</option>
                    <option value="Uzbek">Uzbek</option>
                    <option value="Vietnamese">Vietnamese</option>
                    <option value="Welsh">Welsh</option>
                    <option value="Xhosa">Xhosa</option>
                </select>
            </div>
        </div>
        <textarea name="outputLanguage" id="outputLanguage" style="display:none;"></textarea>
        <div class="text-right">
                <button type="button" class="btn btn-success" id="btnSaveCompanyDetails">SAVE</button>
                <button type="reset" class="btn btn-primary" id="btnCancelCompanyDetails">CANCEL</button>
            
        </div>
    </div>
    <div class="col-md-2">
        @if(is_null($company_profile->company_logo_path))
        <img src="{{asset('img/companies/def-logo-company.png')}}" class="img-fluid profile-pic">
        @else
        <img src="/{{$company_profile->company_logo_path}}" class="img-fluid profile-pic">
        @endif
            Logo Here
            <div class="mx-auto mb-5">
                <input type="file" class="file-upload form-control-file" name="companyLogo" accept=".jpg, .jpeg, .png" capture>
            </div>

        @if(is_null($company_profile->company_video_path))
        <video class="col-md-12 video" src="" controls autoplay></video>
        @else
        <video class="col-md-12 video" src="/{{ $company_profile->company_video_path }}" controls autoplay></video>
        @endif
            Video Here
            <div class="mx-auto">
                <input type="file" class="video-upload form-control-file" accept=".mpeg,.ogg,.mp4,.webm,.3gp,.mov,.flv,.avi,.wmv,.ts" name="videoClip" capture>
            </div>
    </div>
</form>
    @endforeach
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('users/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('users/css/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/employer_dashboard.css')}}">
    
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="{{asset('users/js/select2.full.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/employer/company_detail.js')}}"></script>
@endsection