<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\JobPost;
use App\Applicant;
use App\Employer;
use App\Company;
use App\CompanyDocument;
use App\CompanySubmitDoc;
use App\Admin;
use Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin', 'preventbackhistory']);
    }

    public function showAdminDashboard()
    {
        $countEmp = Company::all()->count();
        $countApp = Applicant::all()->count();
        $countJob = JobPost::all()->count();

        $company = Company::all();
        return view('admin.dashboard', compact('countEmp', 'countApp', 'countJob', 'company'));
    }

    public function viewEmployerRequirements()
    {
        $requirement = CompanyDocument::all();
        return view('admin.employer-requirements', compact('requirement'));
    }

    public function addEmployerRequirements(Request $request)
    {
        $rule = array(
            'employersRequirement' => 'required',
        );
            
        $target = DB:: table('company_documents')
        ->where('file_name', $request->employersRequirement)
        ->get()->first();

        if ($target === null) {
            $this->validate($request, $rule);
            $add_requirements = new CompanyDocument;
            $add_requirements->file_name = $request->employersRequirement;
            $add_requirements->save();
            return redirect('admin/employer-requirements');
        } else {
            return redirect('admin/employer-requirements')->with('alert', 'Data Already Exist!');
        }
    }
    public function deleteEmployerRequirements($id)
    {
        //dd($id);
        $delete_requirements = CompanyDocument::find($id);
        $delete_requirements->delete();
        return redirect('admin/employer-requirements');
    }


    public function employerVerification()
    {
        $employer = DB::table('company_submit_docs')
        ->join('companies', 'company_submit_docs.company_id', '=', 'companies.id')
        ->select('companies.*')
        ->groupBy('company_submit_docs.company_id')
        ->get();
        return view('admin.employer-verification', compact('employer'));
    }
    public function viewEmployerVerification($id)
    {
        //dd($id);
        $comp = Company::find($id);
        $company_id = Company::find($id)->id;
        $document = DB::table('company_documents')
        ->join('company_submit_docs', 'company_documents.id', '=', 'company_submit_docs.company_documents_id')
        ->join('companies', 'company_submit_docs.company_id', '=', 'companies.id')
        ->select('companies.*', 'company_documents.file_name', 'company_submit_docs.*')
        ->where('company_submit_docs.company_id', $company_id)
        ->get();
        
        return view('admin.view-employer-verification', compact('document', 'comp'));
    }

    public function acceptDocument($id, Request $request)
    {
        //dd($id);
        $document = CompanySubmitDoc::find($id);
        $document->status = $request->updateStatusApprove;
        $document->remarks = $request->documentRemarksApprove;
        $document->save();
        return redirect()->back();
    }

    public function rejectDocument($id, Request $request)
    {
        //dd($id);
        $rule = array(
            'documentRemarksReject' => 'required',
        );
        $this->validate($request, $rule);
        $document = CompanySubmitDoc::find($id);
        $document->status = $request->updateStatusReject;
        $document->remarks = $request->documentRemarksReject;
        $document->save();
        return redirect()->back();
    }

    public function verifyEmployer($id, Request $request)
    {
        //dd($id);
        $employer = Company::find($id);
        $employer->company_status = $request->verifiedEmployer;
        $employer->save();
        return redirect()->back();
    }

    public function viewProfile()
    {
        $logged_id = Auth::user()->id;
        
        $admin = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->select('users.*', 'admins.contact_number', 'admins.avatar_image_path')
        ->where('users.id', $logged_id)
        ->get();

        return view('admin.profile', compact('admin'));
    }
    public function editProfile($id, Request $request)
    {
        $profile = User::find($id);
        $adminId = User::find($id)->admin->id;
        $admin_info = Admin::find($adminId);
        
        $rules = array(
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required'
        );
    
        $this->validate($request, $rules);
        $profile->first_name = $request->firstName;
        $profile->middle_name = $request->middleName;
        $profile->last_name = $request->lastName;
        $profile->email = $request->email;
        $profile->save();

        $admin_info->contact_number = $request->contactNumber;
        $admin_info->save();

        return redirect('admin/profile');
    }
    /////Upload profile picture
    public function uploadProfilePicture($id, Request $request)
    {
        $admin_profile = User::find($id);
        $file = Admin::find($admin_profile->admin->id);
        $request->validate([
            'adminPhoto' => 'required|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        $image = $request->file('adminPhoto');
        $image_name = Auth::user()->first_name.Auth::user()->last_name.' - image.' .$image->getClientOriginalExtension();
        $destination = "profile/";
        $image->move($destination, $image_name);
        $file->avatar_image_path = $image_name;
        $file->save();

        return redirect('/admin/profile');
    }

    public function removeProfilePicture($id)
    {
        $admin_profile = User::find($id);
        $image = Admin::where('id', $admin_profile->admin->id)->update(['avatar_image_path' => null]);
        return redirect('/admin/profile');
    }
    ///////////////end
    public function showChangePasswordForm()
    {
        return view('admin.change-password-admin');
    }

    public function changePasswordAdmin($id, Request $request)
    {
        $validate_form = array(
            'currentPass' => 'bail|required|password|string|min:8',
            'newPassword' => 'bail|required|string|min:8|confirmed',
        );

        $error = Validator::make($request->all(), $validate_form);
        if ($error->fails()) {
            return response()->json(['errors'  => $error->messages()]);
        }

        $data_form = array(
            'password' => Hash::make($request->newPassword),
        );

        User::where('id', $id)->update($data_form);

        return response()->json(['success'  => 'Password changed successfully']);
    }

    public function viewAdminList()
    {
        $admin = DB::table('users')
        ->join('admins', 'users.id', '=', 'admins.user_id')
        ->select('users.*', 'admins.contact_number')
        ->whereNull('deactivated_at')
        ->where('user_type_id', 2)
        ->get();
        return view('admin.admin-list', compact('admin'));
    }

    public function addAdmin(Request $request)
    {
        $rules = array(
            "adminFirstName" => "required",
            "adminLastName" => "required",
            "contactNumber" => "required",
            "email" => "required|max:255|unique:users",
            "password" => "required|min:8",
        );

        $this->validate($request, $rules);

        $add_admin = new User;
        $add_admin->user_type_id = $request->userType;
        $add_admin->first_name = $request->adminFirstName;
        $add_admin->last_name = $request->adminLastName;
        $add_admin->email = $request->email;
        $add_admin->password = Hash::make($request->password);
        $add_admin->save();

        $admin_profile = new Admin;
        $admin_profile->user_id = $add_admin->id;
        $admin_profile->contact_number = $request->contactNumber;
        $admin_profile->save();
        
        return redirect('admin/admin-list');
    }
   
    public function deleteAdmin($id)
    {
        //dd($id);
        User::destroy($id);
        return redirect('admin/admin-list');
    }

    public function multipledeleteAdmin(Request $request)
    {
        //
    }

    public function multipleDeleteEmployerRequirement(Request $request)
    {
        $ids = $request->ids;
        DB::table("company_documents")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success'=>"Documents Deleted successfully."]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/login_admin');
    }
}
