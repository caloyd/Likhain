<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\JobPost;
use App\Applicant;
use App\Interview;
use App\User;
use App\Employer;
use App\Company;
use App\JobApplication;
use App\JobOffer;
use App\ApplicantWorkExperience;
use App\ApplicantEducationBackground;
use App\ApplicantSkill;
use App\ApplicantFeedback;
use App\Employee;
use App\EmployeeLeave;
use App\EmployeeSalary;
use App\Currency;
use Session;

class EmployerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employeradmin', 'preventbackhistory']);
    }

    public function deactivateAccount(Request $request, $id)
    {
        $validate_form = array(
            'currentPassword' => 'bail|required|password|string|min:8|confirmed',
        );

        Validator::make($request->all(), $validate_form)->validate();

        User::destroy($id);
        
        Auth::guard()->logout();
        session()->flush();
        return redirect('/login');
    }


    // View all Job Post - Employer
    public function index()
    {
        $logged_id = Auth::user()->id;
        $emp = User::find($logged_id)->employer->id;
        $comp = User::find($logged_id)->employer->company_id;
        
        $job_post = DB::table('users')
        ->join('employers', 'users.id', '=', 'employers.user_id')
        ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
        ->select('users.first_name', 'users.last_name', 'job_posts.title', 'job_posts.created_at', 'job_posts.id', 'job_posts.recruitment_period')
        ->where('employers.company_id', $comp)
        ->get();

        $count = Applicant::where('expected_salary', '!=', null)->count();
        $countJobPost = JobPost::where('employer_id', '=', $comp)->count();
        return view('employer.dashboard', compact('job_post', 'count', 'countJobPost'));
    }

    // View all applicants - Employer
    public function applicantSearch()
    {
         $logged_id = Auth::user()->id;
         $comp = User::find($logged_id)->employer->company_id;

        $applicant_skills = Applicant::all();
        $applicant_work = Applicant::all();

        $job_title = DB::table('job_posts')
        ->join('employers', 'job_posts.employer_id', '=', 'employers.id')
        ->where('employers.company_id', $comp)
        ->select('job_posts.title', 'job_posts.id')->get();

        $app_profile = DB::table('users')
        ->join('applicants', 'users.id', '=', 'applicants.user_id')
        ->join('applicant_education_backgrounds', 'applicants.id', '=', 'applicant_education_backgrounds.applicant_id')
        ->leftJoin('applicant_work_experiences', 'applicants.id', '=', 'applicant_work_experiences.applicant_id')
        ->select('applicants.contact_number', 'applicants.expected_salary', 'applicants.id AS app_id', 'users.first_name', 'users.last_name', 'users.email', 'applicant_education_backgrounds.school', 'applicant_education_backgrounds.course_degree', 'applicant_education_backgrounds.education_attainment', 'applicant_education_backgrounds.date_from AS date_begin', 'applicant_education_backgrounds.date_to AS date_end', 'applicants.avatar_image_path', 'applicant_work_experiences.company_name', 'applicant_work_experiences.job_title', 'applicant_work_experiences.date_from', 'applicant_work_experiences.date_to', 'applicant_work_experiences.date_to', 'applicant_work_experiences.previous_salary')
        ->groupBy('applicants.id')
        ->get();
        
        return view('employer.applicant-search', compact('job_title', 'app_profile', 'applicant_skills', 'applicant_work'));
    }

    // Interview ADD process - Employer
    public function setInterview(Request $request)
    {
        $rules = array(
            "interviewDate" => "required",
            "startTime" => "required",
            "interviewAddress" => "required",
            "recruiterContact" => "required",
            "interviewers" => "required",
            "interviewType" => "required",
            "notes" => "required"
        );
        $this->validate($request, $rules);

        $employer_id = Auth::user()->id;
        $employer_data = User::find($employer_id)->employer;

        $set_interview = new Interview;
        $set_interview->interview_date = $request->interviewDate;
        $set_interview->start_time = $request->startTime;
        $set_interview->interview_address = $request->interviewAddress;
        $set_interview->recruiter_contact = $request->recruiterContact;
        $set_interview->recruiter_name = $request->interviewers;
        $set_interview->applicant_id = $request->applicantIdInt;
        $set_interview->job_post_id = $request->jobPostId;
        $set_interview->employer_id = $employer_data->id;
        $set_interview->interview_notes = $request->notes;
        $set_interview->interview_type = $request->interviewType;
        $set_interview->save();

        return redirect('employer/applicant-interview');
    }

    // View Applicant interview
    public function applicantInterview()
    {
        $logged_id = Auth::user()->id;
        $emp = User::find($logged_id)->employer->id;
        $applicant_skills = Applicant::all();
        $applicant_work = Applicant::all();

        $applicant = DB::table('interviews')
        ->join('applicants','interviews.applicant_id','=','applicants.id')
        ->join('users','applicants.user_id','=','users.id')
        ->join('job_posts','interviews.job_post_id','=','job_posts.id')
        ->join('applicant_education_backgrounds','applicants.id','=','applicant_education_backgrounds.applicant_id')
        ->leftJoin('applicant_work_experiences','applicants.id','=','applicant_work_experiences.applicant_id')
        ->select('users.first_name','users.last_name','interviews.interview_date','interviews.start_time','interviews.recruiter_name','interviews.applicant_id','interviews.employer_id','interviews.id','interviews.job_post_id','interviews.interview_applicant_decision','job_posts.title','users.email','applicants.contact_number','applicants.expected_salary','applicant_education_backgrounds.school','applicant_education_backgrounds.course_degree','applicant_education_backgrounds.education_attainment','applicant_education_backgrounds.date_from AS date_begin','applicant_education_backgrounds.date_to AS date_end','interviews.interview_type','interviews.interview_status','interview_result','applicants.id as app_id','applicants.avatar_image_path',
        'applicant_work_experiences.company_name','applicant_work_experiences.job_title','applicant_work_experiences.date_from','applicant_work_experiences.date_to','applicant_work_experiences.previous_salary')
        ->where('interviews.employer_id',$emp)
        ->groupBy('interviews.id')
        ->get();

        return view('employer.applicant-interview', compact('applicant','applicant_skills','applicant_work'));
    }
    
    public function updateInterview($id, Request $request)
    {
        //dd($id);
        $validate = array(
            "interviewResult" => "required",
            "updateInterview" => "required",
            "updateTimeStart" => "required",
            "updateAddress" => "required",
            "updateInterviewee" => "required",
            "updateContactNumber" => "required",
            "updateNotes" => "required"
        );

        $this->validate($request, $validate);
        $update_interview = Interview::find($id);

        $update_interview->interview_type = $request->interviewType;
        $update_interview->interview_result = $request->interviewResult;
        $update_interview->interview_status = $request->interviewStatus;
        $update_interview->interview_date = $request->updateInterview;
        $update_interview->start_time = $request->updateTimeStart;
        $update_interview->interview_address = $request->updateAddress;
        $update_interview->recruiter_name = $request->updateInterviewee;
        $update_interview->recruiter_contact = $request->updateContactNumber;
        $update_interview->interview_notes = $request->updateNotes;
        $update_interview->save();

        return redirect('employer/applicant-interview');
    }

    public function multiUpdateInterview(Request $request)
    {
        $ids = $request->ids;
        $status = $request->massInterviewStatus;
        $type =  $request->massInterviewType;
        $date = $request->massUpdateInterview;
        $time = $request->massUpdateTimeStart;
        $address = $request->massUpdateAddress;
        $interviewee = $request->massUpdateInterviewee;
        $contact = $request->massUpdateContactNumber;
        $notes = $request->massUpdateNotes;
        $to_get = explode(', ', $ids);

        return response()->json(['success'=>"Interview Update Saved"]);
    }

    public function multiDeleteInterview(Request $request)
    {
        $ids = $request->ids;
        DB::table("interviews")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success'=>"Applicant Interview Deleted successfully."]);
    }

    //Set Job Offer -ADD- to applicant - EMPLOYER
    public function setJobOffer(Request $request)
    {
        $rules = array(
            "jobOfferDate" => "required",
            "jobOfferTime" => "required",
            "jobOfferAddress" => "required",
            "contactNumber" => "required",
            "contactPerson" => "required",
            "jobOfferNote" => "required"
        );
        $this->validate($request, $rules);

        $employer_id = Auth::user()->id;
        $employer_data = User::find($employer_id)->employer;

        $set_job_offer = new JobOffer;
        $set_job_offer->job_offer_date = $request->jobOfferDate;
        $set_job_offer->job_offer_time = $request->jobOfferTime;
        $set_job_offer->job_offer_address = $request->jobOfferAddress;
        $set_job_offer->contact_number = $request->contactNumber;
        $set_job_offer->contact_name = $request->contactPerson;
        $set_job_offer->job_offer_note = $request->jobOfferNote;
        $set_job_offer->employer_id = $employer_data->id;
        $set_job_offer->applicant_id = $request->applicantId;
        $set_job_offer->job_post_id = $request->jobPostId;
        $set_job_offer->interview_id = $request->interviewId;
        
        $set_job_offer->save();
        return redirect('employer/job-offers');
    }
    // View Job Offers set by Employer - Employer
    public function viewJobOffers()
    {
        $logged_id = Auth::user()->id;
        $emp = User::find($logged_id)->employer->id;
        $applicant_skills = Applicant::all();
        $applicant_work = Applicant::all();

        $job_offer = DB::table('job_offers')
        ->join('applicants','job_offers.applicant_id','=','applicants.id')
        ->join('users','applicants.user_id','=','users.id')
        ->join('job_posts','job_offers.job_post_id','=','job_posts.id')
        ->join('applicant_education_backgrounds','applicants.id','=','applicant_education_backgrounds.applicant_id')
        ->leftJoin('applicant_work_experiences','applicants.id','=','applicant_work_experiences.applicant_id')
        ->select('users.first_name','users.last_name','job_offers.id','job_offers.applicant_decision','job_offers.job_offer_date','job_offers.job_offer_time','job_offers.contact_name','job_posts.title','users.email','applicants.contact_number','applicants.expected_salary','applicant_education_backgrounds.school','applicant_education_backgrounds.date_from AS date_begin','applicant_education_backgrounds.date_to AS date_end','applicant_education_backgrounds.course_degree','applicant_education_backgrounds.education_attainment','applicants.id AS app_id',
        'applicants.avatar_image_path', 'applicant_work_experiences.company_name','applicant_work_experiences.job_title','applicant_work_experiences.date_from','applicant_work_experiences.date_to','applicant_work_experiences.previous_salary')
        ->where('job_offers.employer_id',$emp)
        ->groupBy('job_offers.id')
        ->get();

        return view('employer.job-offers',compact('job_offer','applicant_skills','applicant_work'));
    }

    // Delete Job Offer by ID - Employer
    public function deleteJobOffersEmployer($id)
    {
        //dd($id);
        $job_offer_delete = JobOffer::find($id);
        $job_offer_delete->delete();
        
        return redirect('employer/job-offers');
    }

    public function multiDeleteJobOffer(Request $request)
    {
        $ids = $request->ids;
        DB::table("job_offers")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success'=>"Job Offer Deleted successfully."]);
    }

    //Edit Employer Profile Form
    public function profile()
    {
        $logged_id = Auth::user()->id;
        $emp = User::find($logged_id)->employer->id;

        $users = DB::table('users')
        ->join('employers', 'users.id', '=', 'employers.user_id')
        ->select('users.first_name', 'users.middle_name', 'users.last_name', 'users.email', 'users.id', 'users.created_at', 'employers.employers_address', 'employers.employers_contact', 'employers.avatar_image_path')
        ->where('employers.id', $emp)
        ->get();

        $companies = DB::table('companies')
        ->join('employers', 'companies.id', '=', 'employers.company_id')
        ->select('companies.company_name', 'companies.address', 'companies.postal_code', 'companies.number_of_employees', 'companies.description', 'companies.contact_number', 'companies.website', 'companies.working_hours', 'companies.dress_code', 'companies.benefits', 'companies.language', 'companies.id', 'companies.industry', 'companies.company_logo_path')
        ->where('employers.id', $emp)
        ->get();
        return view('employer.profile', compact('users', 'companies'));
    }
    

 /////Upload profile picture
    public function uploadProfilePicture($id, Request $request)
    {
        $emp_profile = User::find($id);
        //dd($emp_profile);
        $file = Employer::find($emp_profile->employer->id);
        $request->validate([
            'employerPhoto' => 'required|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        $image = $request->file('employerPhoto');
        $image_name = Auth::user()->first_name.Auth::user()->last_name.' - image.' .$image->getClientOriginalExtension();
        $destination = "profile/";
        $image->move($destination, $image_name);
        $file->avatar_image_path = $image_name;
        $file->save();

        return redirect('/employer/profile');
    }

    public function removeProfilePicture($id)
    {
        $emp_profile = User::find($id);
        $image = Employer::where('id', $emp_profile->employer->id)->update(['avatar_image_path' => null]);
        return redirect('/employer/profile');
    }

/////////end
    
     // Edit Employer Profile validation
    public function profilePost($id, Request $request)
    {
        $emp_profile = User::find($id);
        $emp = Employer::find($emp_profile->employer->id);
        $rules = array(
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required'
        );

        $this->validate($request, $rules);

        $emp_profile->first_name = $request->firstName;
        $emp_profile->middle_name = $request->middleName;
        $emp_profile->last_name = $request->lastName;
        $emp_profile->email = $request->email;
        $emp_profile->save();
        $emp->employers_address = $request->employersAddress;
        $emp->employers_contact = $request->employersContact;
        $emp->save();
        
        return redirect('employer/profile');
    }

    //show password form
    public function showChangePasswordFormEmployer()
    {
        return view('employer.change-password');
    }

    //change password process
    public function changePasswordEmployer(Request $request, $id)
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

    public function viewApplicantFeedback()
    {
        $logged_id = Auth::user()->id;
        $emp = User::find($logged_id)->employer->id;
        $company = User::find($logged_id)->employer->company_id;
        $feedback = DB::table('applicant_feedback')
        ->join('applicants', 'applicant_feedback.applicant_id', '=', 'applicants.id')
        ->join('companies', 'companies.id', '=', 'applicant_feedback.company_id')
        ->join('users', 'users.id', '=', 'applicants.user_id')
        ->select('users.email', 'applicant_feedback.created_at', 'applicant_feedback.description', 'applicant_feedback.id')
        ->where('companies.id', $company)
        ->where('applicant_feedback.employer_feedback_decision', '')
        ->orderBy('applicant_feedback.created_at', 'desc')
        ->get();
        //dd($feedback);

        $feedback_fresh = DB::table('applicant_feedback')
        ->join('applicants', 'applicant_feedback.applicant_id', '=', 'applicants.id')
        ->join('employers', 'applicant_feedback.employer_id', '=', 'employers.id')
        ->join('job_posts', 'applicant_feedback.job_post_id', '=', 'job_posts.id')
        ->join('users', 'users.id', '=', 'applicants.user_id')
        ->select('users.email', 'applicant_feedback.created_at', 'applicant_feedback.description', 'job_posts.title', 'applicant_feedback.id')
        ->where('employers.id', $emp)
        ->where('applicant_feedback.employer_feedback_decision', '')
        ->orderBy('applicant_feedback.created_at', 'desc')
        ->get();

        $feedback_old = DB::table('applicant_feedback')
        ->join('applicants', 'applicant_feedback.applicant_id', '=', 'applicants.id')
        ->join('employers', 'applicant_feedback.employer_id', '=', 'employers.id')
        ->join('job_posts', 'applicant_feedback.job_post_id', '=', 'job_posts.id')
        ->join('users', 'users.id', '=', 'applicants.user_id')
        ->select('users.email', 'applicant_feedback.created_at', 'applicant_feedback.description', 'job_posts.title', 'applicant_feedback.id')
        ->where('employers.id', $emp)
        ->where('applicant_feedback.employer_feedback_decision', '')
        ->orderBy('applicant_feedback.created_at', 'asc')
        ->get();

        return view('employer.applicant-feedback', compact('feedback_fresh', 'feedback_old'));
    }

    public function approveFeedback($id, Request $request)
    {
        //dd($id);
        $approve = ApplicantFeedback::find($id);
        $approve->employer_feedback_decision = $request->approve;
        $approve->save();
        return redirect('employer/applicant-feedback');
    }

    public function rejectFeedback($id, Request $request)
    {
        //dd($id);
        $reject = ApplicantFeedback::find($id);
        $reject->employer_feedback_decision = $request->reject;
        $reject->save();
        return redirect('employer/applicant-feedback');
    }
    
    public function addEmployerStaffView()
    {
        $logged_id = Auth::user()->id;
        $emp = User::find($logged_id)->employer->id;
        $comp = User::find($logged_id)->employer->company_id;

        $company = DB::table('companies')
        ->join('employers', 'companies.id', '=', 'employers.company_id')
        ->select('companies.id')
        ->where('employers.id', $emp)
        ->get();

        $employer = DB::table('users')
        ->join('employers', 'users.id', '=', 'employers.user_id')
        ->join('companies', 'companies.id', '=', 'employers.company_id')
        ->select('users.first_name', 'users.last_name', 'users.email', 'users.middle_name', 'employers.id')
        ->where('users.user_type_id', 4)
        ->where('employers.company_id', $comp)
        ->get();
        
        return view('employer.employer-staff', compact('company', 'employer'));
    }

    public function addEmployerStaff(Request $request)
    {
        $rules = array(
            "employerStaffFirst" => "required",
            "employerStaffLast" => "required",
            "email" => "required|max:255|unique:users",
            "password"=> "required|min:8"
        );
        $this->validate($request, $rules);

        $employer_staff = new User;
        $employer_staff->user_type_id = $request->userType;
        $employer_staff->first_name = $request->employerStaffFirst;
        $employer_staff->middle_name = $request->employerStaffMiddle;
        $employer_staff->last_name = $request->employerStaffLast;
        $employer_staff->email = $request->email;
        $employer_staff->password = Hash::make($request->password);
        $employer_staff->save();

        $employer_detail = new Employer;
        $employer_detail->user_id = $employer_staff->id;
        $employer_detail->company_id = $request->companyId;
        $employer_detail->save();

        return redirect('employer/employer-staff');
    }

    public function deleteEmployerStaff($id)
    {
        //dd($id);
        $deleteStaff = Employer::find($id);
        $deleteUser= User::find($id);
        $deleteStaff->delete();
        //$deleteUser->delete();
        return redirect('employer/employer-staff');
    }
    
    public function multiDeleteStaff(Request $request)
    {
        $ids = $request->ids;
        DB::table("employers")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success'=>"Staff Deleted successfully."]);
    }

    public function viewEmployee()
    {
        $id = Auth::user()->id;
        $employer_id = User::find($id)->employer->id;
        
        $employee = DB::table('users')
        ->join('employees', 'employees.user_id', '=', 'users.id')
        ->join('employee_salaries', 'employees.id', '=', 'employee_salaries.employee_id')
        ->join('currencies', 'employee_salaries.currency_id', 'currencies.id')
        ->select('users.first_name', 'users.last_name', 'users.middle_name', 'users.email', 'employees.address', 'employees.id', 'employees.contact_number', 'employees.job_position', 'employees.employment_date', 'employee_salaries.amount', 'currencies.name')
        ->where('employees.employer_id', $employer_id)
        ->get();

        $currency = Currency::all();

        return view('employer.employee-list', compact('employee', 'currency'));
    }

    public function addEmployee(Request $request)
    {
        $rules = array(
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required|max:255|unique:users",
            "password" => "required|min:8",
            "jobPosition" => "required",
            "employmentDate" => "required"
        );
        $this->validate($request, $rules);

        $employer_id = Auth::user()->id;
        $employer_data = User::find($employer_id)->employer;

        $employee = new User;
        $employee->user_type_id = $request->userType;
        $employee->first_name = $request->firstName;
        $employee->middle_name = $request->middleName;
        $employee->last_name = $request->lastName;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->save();

        $add_employee = new Employee;
        $add_employee->user_id = $employee->id;
        $add_employee->employer_id = $employer_data->id;
        $add_employee->job_position = $request->jobPosition;
        $add_employee->employment_date = $request->employmentDate;
        $add_employee->save();

        $add_salary = new EmployeeSalary;
        $add_salary->employee_id = $add_employee->id;
        $add_salary->employer_id = $employer_data->id;
        $add_salary->currency_id = $request->currencyId;
        $add_salary->amount = $request->salaryAmount;
        $add_salary->save();

        return redirect('employer/employee-list');
    }

    public function deleteEmployee($id)
    {
        //dd($id);
        $deleteEmployee = Employee::find($id);
        $deleteEmployee->delete();

        return redirect('employer/employee-list');
    }

    public function multiDeleteEmployee(Request $request)
    {
        $ids = $request->ids;
        DB::table("employees")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success'=>"Employee/s Deleted successfully."]);
    }

    public function employeeLeaveView()
    {
        $id = Auth::user()->id;
        $employer_id = User::find($id)->employer->id;
        //dd($employer_id);
        $employee_leave = DB::table('employees')
        ->join('users', 'employees.user_id', '=', 'users.id')
        ->join('employee_leaves', 'employees.id', '=', 'employee_leaves.employee_id')
        ->select('users.first_name', 'users.last_name', 'employee_leaves.leave_type', 'employee_leaves.leave_reason', 'employee_leaves.start_date', 'employee_leaves.end_date', 'employee_leaves.id')
        ->where('employee_leaves.employer_id', $employer_id)
        ->where('employee_leaves.employer_decision', null)
        ->get();

        return view('employer.leave-request', compact('employee_leave'));
    }

    public function approveLeave($id, Request $request)
    {
        //dd($id);
        $approve_leave = EmployeeLeave::find($id);
        $approve_leave->employer_decision = $request->approved;
        $approve_leave->save();
        return redirect('employer/leave-request');
    }

    public function denyLeave($id, Request $request)
    {
        //dd($id);
        $approve_deny = EmployeeLeave::find($id);
        $approve_deny->employer_decision = $request->denied;
        $approve_deny->save();
        return redirect('employer/leave-request');
    }

    public function multipleApproveLeave(Request $request)
    {
        $ids = $request->ids;
        $to_get = explode(', ', $ids);
        DB::table("employee_leaves")
        ->whereIn('id', $to_get)
        ->update(['employer_decision' => 'Approved']);

        return response()->json(['success'=>"Leave Approved!"]);
    }

    public function multipleDenyLeave(Request $request)
    {
        $ids = $request->ids;
        $to_get = explode(', ', $ids);
        DB::table("employee_leaves")
        ->whereIn('id', $to_get)
        ->update(['employer_decision' => 'Denied']);
        
        return response()->json(['success'=>"Leave Denied!"]);
    }
    
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/login_employer');
    }


//videocall Controller
    public function videocall($applicant_id, $first_name, $last_name)
    {
        $applicantInfo = Applicant::findOrFail($applicant_id);
        $first_name = $first_name;
        $last_name = $last_name;
        // dd($last_name);
        return view('employer.video-call-interview', compact('applicantInfo', 'first_name', 'last_name'));
    }
}
