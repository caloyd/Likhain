<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Company;
use App\User;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employeradmin', 'preventbackhistory']);
    }

    // View Company details - Employer
    public function companyDetails()
    {
        $logged_id = Auth::user()->id;
        $emp = User::find($logged_id)->employer->id;

        $company = DB::table('companies')
        ->join('employers','companies.id','=','employers.company_id')
        ->select('companies.company_name','companies.address','companies.postal_code','companies.number_of_employees','companies.description','companies.contact_number','companies.website','companies.working_hours','companies.dress_code','companies.benefits','companies.language','companies.id','companies.industry','companies.company_logo_path','companies.company_video_path')
        ->where('employers.id',$emp)
        ->get();

        return view('employer.company-details', compact('company'));
    }
    
    // Update Company details - Employer
    public function updateCompanyDetails($id, Request $request)
    {
        $company_detail = Company::find($id);

        $rules = array(
            "companyName" => "required",
            "contactNumber" => "required",
            "companySize" => "required",
            "companyDescription" => "required",
            "companyWebsite" => "required",
            "workingHours" => "required",
            "dressCode" => "required",
            "outputBenefits" => "required",
            "outputLanguage" => "required",
            "companyPostalCode" => "required",
            "companyIndustry" => "required",
            "companyLogo" => "image|mimes:jpg,jpeg,png|max:1024",
            "videoClip"=>"mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts"

        );

        $this->validate($request, $rules);
        // $error = Validator::make($request->all(), $rules);
        // if ($error->fails()) {
        //     return response()->json(['errors'  => $error->messages()]);
        // }

        $company_detail->company_name = $request->companyName;
        $company_detail->contact_number = $request->contactNumber;
        $company_detail->address = $request->companySpecificAddress.' , '.$request->fullLocation;
        $company_detail->postal_code = $request->companyPostalCode;
        $company_detail->number_of_employees = $request->companySize;
        $company_detail->description = $request->companyDescription;
        $company_detail->website = $request->companyWebsite;
        $company_detail->working_hours = $request->workingHours;
        
        if ($request->workingHours === "Others") {
            $company_detail->working_hours = $request->otherWorkingHours;
        }

        $company_detail->dress_code = $request->dressCode;
        $company_detail->benefits = $request->outputBenefits;
        $company_detail->language = $request->outputLanguage;
        $company_detail->industry = $request->companyIndustry;

        if ($request->file('companyLogo') != null) {
            $logo = $request->file('companyLogo');
            $originalName = $logo->getClientOriginalName();
            $logo_path = $originalName. '.' .$logo->getClientOriginalExtension();
            $destination = "img/companies/";
            $logo->move($destination, $logo_path);
            $company_detail->company_logo_path = $destination.$logo_path;
        }

        if($request->file('videoClip') != null)
        {
            $clip = $request->file('videoClip');
            $originalName = $clip->getClientOriginalName();
            $video_path = $originalName. '.' .$clip->getClientOriginalExtension();
            $destination = "videos/";
            $clip->move($destination, $video_path);
            $company_detail->company_video_path = $destination.$video_path;

        }

        $company_detail->save();
        return redirect('employer/company-details');
        //return response()->json(['success'  => 'Company details saved successfully!']);
    }
}
