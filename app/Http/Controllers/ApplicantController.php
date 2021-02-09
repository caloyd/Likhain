<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use App\User;
use App\Applicant;
use App\Skill;
use App\JobPost;
use App\JobApplication;
use App\Currency;
use App\ApplicantEducationBackground;
use App\ApplicantWorkExperience;
use App\Interview;
use App\JobOffer;
use App\Company;
use App\ApplicantFeedback;
use Session;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['applicant', 'preventbackhistory']);
    }

    public function index()
    {
        $id =  Auth::id();
        $applicant_data = User::find($id)->applicant;
        $applicant_education = User::find($id)->applicantEducationBackground;
        $applicant_work_exp = User::find($id)->applicantWorkExperience;
        $currency = Currency::all();
        $applicant_skill = Applicant::find($applicant_data->id)->skills;
        return view('applicant.profile', compact('applicant_data', 'applicant_education', 'applicant_work_exp', 'currency', 'applicant_skill'));
    }

    public function advanceSearch(Request $request)
    {
        $location = $request->location;
        $job_level = $request->jobLevel;
        $employment_type = $request->employmentType;
        $job_function = $request->jobFunction;
        $education = $request->education;
        $verified = $request->company;
        $sortBy = $request->filter;
        $asc = $request->asc;
        $search = $request->search;

        $job_post = DB::table('companies')
            ->join('employers', 'companies.id', '=', 'employers.company_id')
            ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
            ->select('companies.company_name', 'companies.id AS company_id', 'job_posts.title', 'job_posts.description', 'job_posts.id AS job_post_id', 'companies.company_logo_path', 'companies.company_status', 'companies.address', 'job_posts.created_at')
            ->when(
                $location,
                function ($query, $location) {
                    $query->whereIn('job_posts.job_location', $location);
                }
            )
        ->when(
            $job_level,
            function ($query, $job_level) {
                $query->whereIn('job_posts.position_level', $job_level);
            }
        )
        ->when(
            $employment_type,
            function ($query, $employment_type) {
                $query->whereIn('job_posts.employment_type', $employment_type);
            }
        )
        ->when(
            $job_function,
            function ($query, $job_function) {
                $query->whereIn('job_posts.job_specialization', $job_function);
            }
        )
        ->when(
            $education,
            function ($query, $education) {
                $query->whereIn('job_posts.education_level', $education);
            }
        )
        ->when(
            $verified,
            function ($query, $verified) {
                $query->whereIn('companies.company_status', $verified);
            }
        )
        ->when(
            $search,
            function ($query, $search) {
                $query->where(
                    function ($query) use ($search) {
                        $query->where('job_posts.title', 'like', '%'.$search.'%')
                            ->orWhere('companies.company_name', 'like', '%'.$search.'%')
                            ->orWhere('job_posts.description', 'like', '%'.$search.'%')
                            ->orWhere('job_posts.skill', 'like', '%'.$search.'%');
                    }
                );
            }
        )
        ->when(
            $sortBy,
            function ($query, $sortBy) use ($asc) {
                $query->when(
                    $asc,
                    function ($query, $asc) use ($sortBy) {
                        $query->orderBy($sortBy);
                    },
                    function ($query) use ($sortBy) {
                        $query->orderBy($sortBy, 'desc');
                    }
                );
            },
            function ($query) {
                $query->orderBy('job_posts.created_at', 'desc');
            }
        )
        ->get();
        return response()->json($job_post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $applicant_data = User::find(Auth::id())->applicant;
        if ($request->c_hidden_id == 2) {
            $validate_form = array(
                'inputEducation' => 'required',
                'inputCourse' => 'required|string|max:255',
                'startDate' => 'required|string|before:endDate',
                'endDate' => 'required|string|after:startDate',
                'inputSchool' => 'required',
                'educationAccomplishments' => 'nullable|string|max:255',
            );

            $messages = array(
                'startDate.before' => 'Start date must be less than the end date',
                'endDate.after' => 'End date must be greater than the start date',
                'startDate.required' => 'Start date is required',
                'endDate.required' => 'End date is required'
            );

            $error = Validator::make($request->all(), $validate_form, $messages);
            if ($error->fails()) {
                return response()->json(['errors'  => $error->messages()]);
            }


            $data_form = array(
                'applicant_id' => $applicant_data->id,
                'education_attainment' => $request->inputEducation,
                'course_degree' => $request->inputCourse,
                'school' => $request->inputSchool,
                'description' => $request->educationAccomplishments,
                'date_from' => $request->startDate,
                'date_to' => $request->endDate
            );

            ApplicantEducationBackground::create($data_form);

            return response()->json(['success'  => 'Education Successfully Saved!']);
        } elseif ($request->c_hidden_id == 3) {
            $validate_form = array(
                'expectedSalaryAmount' => 'required|numeric|',
            );

            $error = Validator::make($request->all(), $validate_form);
            if ($error->fails()) {
                return response()->json(['errors'  => $error->messages()]);
            }
            $data_form = array(
                'currency_id' => $request->expectedSalaryCurrency,
                'expected_salary' => $request->expectedSalaryAmount,
            );

            Applicant::where('user_id', Auth::id())->update($data_form);

            return response()->json(['success'  => 'Salary Successfully Saved!']);
        } elseif ($request->c_hidden_id == 4) {
            // return response()->json($request);
            $validate_form = array(
                'jobTitle' => 'required|string|max:255',
                'company' => 'required|string|max:255',
                'workStartDate' => 'required|string|before:workEndDate',
                'workEndDate' => 'required|string|after:workStartDate',
                'accomplishments' => 'nullable|string|max:255',
                'prevSalaryAmount' => 'required|numeric|min:1',
            );

            $messages = array(
                'company.required' => 'The company field is required.',
                'jobTitle.required' => 'The job title field is required.',
                'workStartDate.required' => 'The start date field is required.',
                'workEndDate.required' => 'The end date field is required.',
                'workStartDate.before' => 'The start date must be less than the end date.',
                'workEndDate.after' => 'The end date must be greater than the start date.',
                'prevSalaryAmount.required' => 'The previous salary field is required.'
            );

            $error = Validator::make($request->all(), $validate_form, $messages);
            if ($error->fails()) {
                return response()->json(['errors'  => $error->messages()]);
            }

            $data_form = array(
                'applicant_id' => $applicant_data->id,
                'currency_id' => $request->prevSalaryCurrency,
                'company_name' => $request->company,
                'job_title' => $request->jobTitle,
                'date_from' => $request->workStartDate,
                'date_to' => $request->workEndDate,
                'previous_salary' => $request->prevSalaryAmount,
                'description' => $request->accomplishments,
            );

            ApplicantWorkExperience::create($data_form);

            return response()->json(['success'  => 'Work Experience Successfully Saved!']);
        } elseif ($request->c_hidden_id == 5) {
            $skills_array = $request->skills;
            $skills_exp_array = $request->skills_exp;
            Applicant::find($applicant_data->id)->skills()->sync($skills_array);
            $object = json_decode(json_encode($skills_exp_array));
            if (isset($object)) {
                foreach ($object as $value) {
                    $result = Skill::create(['name' => $value->name]);
                    Applicant::find($applicant_data->id)->skills()->attach($result->id, ['years_of_experience' => $value->exp_yr]);
                }
            }

            return response()->json(['success'  => 'Skills Successfully Saved!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_data = User::find($id);
        $applicant_data = User::find($id)->applicant;
        $applicant_education = User::find($id)->applicantEducationBackground;
        $applicant_work_exp = User::find($id)->applicantWorkExperience;
        $currency = Currency::all();
        $applicant_skill = Applicant::find($applicant_data->id)->skills;
        return response()->json(
            [
            'user_data' => $user_data,
            'applicant_data' => $applicant_data,
            'education' => $applicant_education,
            'workexp' => $applicant_work_exp,
            'currency' => $currency,
            'skills' => $applicant_skill,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $applicant_data = User::find(Auth::id())->applicant;

        if ($request->ajax()) {
            if ($request->hidden_id == 1) {
                $validate_form = array(
                    'lastName' => 'required|alpha|max:255',
                    'firstName' => 'required|alpha|max:255',
                    'middleName' => 'nullable|alpha|max:255',
                    'email' => 'required|email|string|max:255',
                    'inputState' => 'required|string',
                    'inputCity' => 'required|string',
                    'inputStreet' => 'nullable|string|max:255',
                    'inputPhone' => 'required|string|size:11',
                    'inputGender' => 'required'
                );

                $error = Validator::make($request->all(), $validate_form);
                if ($error->fails()) {
                    return response()->json(['errors'  => $error->messages()]);
                }

                $data_form1 = array(
                    'first_name' => $request->firstName,
                    'last_name' => $request->lastName,
                    'middle_name' => $request->middleName,
                    'email' => $request->email
                );

                $data_form2 = array(
                    'gender' => $request->inputGender,
                    'birth_date' => $request->inputBirthdate,
                    'address' => $request->inputCountry.', '.$request->inputState.', '.$request->inputCity.', '.$request->inputStreet,
                    'contact_number' => $request->inputPhone,
                );

                User::where('id', $id)->update($data_form1);
                Applicant::where('user_id', $id)->update($data_form2);

                return response()->json(['success'  => 'Successfully updated']);
            } elseif ($request->hidden_id == 2) {
                // return response()->json(explode("-", $request->input('newStartDate'.$id)));
                $validate_form = array(
                    'inputCourse'.$id => 'required|string|max:255',
                    'inputSchool'.$id => 'required|string|max:255',
                    'newStartDate'.$id => 'required|string|before:newEndDate'.$id,
                    'newEndDate'.$id => 'required|string|after:newStartDate'.$id,
                    'educationAccomplishments'.$id => 'nullable|string|max:255',
                );

                $messages = array(
                    'newStartDate'.$id.'.before' => 'Start date must be less than end date.',
                    'newEndDate'.$id.'.after' => 'End date must be greater than start date.',
                    'newStartDate'.$id.'.required' => 'Start date is required',
                    'newEndDate'.$id.'.required' => 'End date is required',
                    'inputSchool'.$id.'.required' => 'The input school/university is required.',
                    'inputCourse'.$id.'.required' => 'The input course is required.'
                );

                $error = Validator::make($request->all(), $validate_form, $messages);
                if ($error->fails()) {
                    return response()->json(['errors'  => $error->messages()]);
                }

                $data_form = array(
                    'applicant_id' => $applicant_data->id,
                    'education_attainment' => $request->input('inputEducation'.$id),
                    'course_degree' => $request->input('inputCourse'.$id),
                    'school' => $request->input('inputSchool'.$id),
                    'description' => $request->input('educationAccomplishments'.$id),
                    'date_from' => $request->input('newStartDate'.$id),
                    'date_to' => $request->input('newEndDate'.$id)
                );

                ApplicantEducationBackground::where('applicant_id', $applicant_data->id)->where('id', $id)->update($data_form);

                return response()->json(['success'  => 'Successfully updated']);
            } elseif ($request->hidden_id == 3) {
                $validate_form = array(
                    'editSalaryAmount' => 'required|numeric|',
                );

                $error = Validator::make($request->all(), $validate_form);
                if ($error->fails()) {
                    return response()->json(['errors'  => $error->messages()]);
                }
                $data_form = array(
                    'currency_id' => $request->editSalaryCurrency,
                    'expected_salary' => $request->editSalaryAmount,
                );

                Applicant::where('user_id', $id)->update($data_form);
                return response()->json(['success'  => 'Salary Successfully Updated!']);
            } elseif ($request->hidden_id == 4) {
                $validate_form = array(
                    'company'.$id => 'required|string|max:255',
                    'jobTitle'.$id => 'required|string',
                    'workNewStartDate'.$id => 'required|string|before:workNewEndDate'.$id,
                    'workNewEndDate'.$id => 'required|string|after:workNewStartDate'.$id,
                    'accomplishments'.$id => 'nullable|string|max:255',
                    'prevSalaryAmount'.$id => 'required|numeric|'
                );

                $messages = array(
                    'company'.$id.'.required' => 'The company field is required.',
                    'jobTitle'.$id.'.required' => 'The job title field is required.',
                    'workNewStartDate'.$id.'.required' => 'The start date field is required.',
                    'workNewEndDate'.$id.'.required' => 'The end date field is required.',
                    'workNewStartDate'.$id.'.before' => 'The start date must be less than end date.',
                    'workNewEndDate'.$id.'.after' => 'The end date must be greater than start date.',
                    'prevSalaryAmount'.$id.'.required' => 'The previous salary field is required.',
                );

                $error = Validator::make($request->all(), $validate_form, $messages);
                if ($error->fails()) {
                    return response()->json(['errors'  => $error->messages()]);
                }

                $data_form = array(
                    'applicant_id' => $applicant_data->id,
                    'currency_id' => $request->input('prevSalaryCurrency'.$id),
                    'company_name' => $request->input('company'.$id),
                    'job_title' => $request->input('jobTitle'.$id),
                    'date_from' => $request->input('workNewStartDate'.$id),
                    'date_to' => $request->input('workNewEndDate'.$id),
                    'previous_salary' => $request->input('prevSalaryAmount'.$id),
                    'description' => $request->input('accomplishments'.$id),
                );

                ApplicantWorkExperience::where('applicant_id', $applicant_data->id)->where('id', $id)->update($data_form);

                return response()->json(['success'  => 'Successfully updated']);
            }
        }
    }

    public function removeApplicantEducation($id)
    {
        ApplicantEducationBackground::destroy($id);
        return response()->json(['success'  => 'Removed!']);
    }

    public function removeApplicantSalary($id)
    {
        Applicant::where('user_id', $id)->update(['expected_salary' => 0]);
        return response()->json(['success'  => 'Removed!']);
    }

    public function removeApplicantWorkExperience($id)
    {
        ApplicantWorkExperience::destroy($id);
        return response()->json(['success'  => 'Removed!']);
    }

    public function uploadProfilePicture($id, Request $request)
    {
        $file = Applicant::find($id);

        $request->validate(
            [
            'applicantPhoto' => 'required|image|mimes:jpeg,jpg,png|max:1024',
            ]
        );

        $image = $request->file('applicantPhoto');
        $image_name = Auth::user()->first_name.Auth::user()->last_name.' - image.' .$image->getClientOriginalExtension();
        $destination = "profile/";
        $image->move($destination, $image_name);
        $file->avatar_image_path = $image_name;
        $file->save();

        return redirect('/applicant/profile');
    }

    public function removeProfilePicture($id)
    {
        $image = Applicant::where('id', $id)->update(['avatar_image_path' => null]);
        return redirect('/applicant/profile');
    }

    // View job posts thru dashboard
    public function showApplicantDashboard()
    {
        $job_post = DB::table('companies')
            ->join('employers', 'companies.id', '=', 'employers.company_id')
            ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
            ->select('companies.company_name', 'companies.id AS company_id', 'job_posts.title', 'job_posts.description', 'job_posts.id AS job_post_id', 'companies.company_logo_path')
            ->orderBy('job_posts.created_at', 'desc')
            ->get();

        $job_post_atoz = DB::table('companies')
            ->join('employers', 'companies.id', '=', 'employers.company_id')
            ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
            ->select('companies.company_name', 'companies.id AS company_id', 'job_posts.title', 'job_posts.description', 'job_posts.id AS job_post_id', 'companies.company_logo_path')
            ->orderBy('job_posts.title', 'asc')
            ->get();

        $job_post_salary = DB::table('companies')
            ->join('employers', 'companies.id', '=', 'employers.company_id')
            ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
            ->select('companies.company_name', 'companies.id AS company_id', 'job_posts.title', 'job_posts.description', 'job_posts.id AS job_post_id', 'companies.company_logo_path')
            ->orderBy('job_posts.salary_range_maximum', 'desc')
            ->get();

        // $checkUser = Auth::user();
        // dd($checkUser);
        return view('applicant.dashboard', compact('job_post', 'job_post_atoz', 'job_post_salary'));
    }

    // Upload resume
    public function uploadResume(Request $request, $id)
    {
        $file = Applicant::find($id);

        $request->validate(
            [
            'applicantResume' => 'required|file|max:3072',
            ]
        );

        $resume = $request->file('applicantResume');
        File::delete('./resume/' . $file->resume_path);
        $resume_name = Auth::user()->first_name.Auth::user()->last_name.' - resume.' .$resume->getClientOriginalExtension();
        $destination = "resume/";
        $resume->move($destination, $resume_name);
        $file->resume_path = $resume_name;
        if ($file->created_at === null) {
            $file->created_at = Carbon::now();
        } else {
            $file->updated_at = Carbon::now();
        }
        $file->save();

        return back()
            ->with('updated', 'Uploaded Successfully');
    }

    public function showChangePasswordForm()
    {
        return view('applicant.changepass');
    }

    public function changePassword(Request $request, $id)
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

    public function showDeactivateAccountForm()
    {
        return view('applicant.deactivate');
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

    //view Job details
    public function viewJobDetailsApplicant($id)
    {
        $job_post_id = JobPost::find($id)->id;
        $idUser = Auth::id();

        $applicant_detail = User::find($idUser)->applicant;

        $applicant_educ = User::find($idUser)->applicantEducationBackground;

        $job_post_detail = DB::table('companies')
        ->join('employers','companies.id','=','employers.company_id')
        ->join('job_posts','employers.id','=','job_posts.employer_id')
        ->join('currencies','job_posts.currency_id','=','currencies.id')
        ->select('companies.id AS company_id','companies.company_name','job_posts.title','job_posts.job_specialization','job_posts.salary_range_minimum','job_posts.salary_range_maximum','currencies.name','job_posts.education_level','job_posts.position_level','job_posts.employment_type','job_posts.skill','job_posts.job_location','job_posts.id','job_posts.description','job_posts.created_at','job_posts.years_experience','companies.company_logo_path','companies.company_video_path')
        ->where('job_posts.id', $job_post_id)
        ->get();

        $recom_jobs = DB::table('companies')
            ->join('employers', 'companies.id', '=', 'employers.company_id')
            ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
            ->join('currencies', 'job_posts.currency_id', '=', 'currencies.id')
            ->select('companies.company_name', 'job_posts.title', 'job_posts.description', 'job_posts.id AS job_post_id', 'companies.company_logo_path', 'job_posts.created_at', 'job_posts.salary_range_minimum', 'job_posts.salary_range_maximum', 'currencies.name', 'job_posts.job_location', 'job_posts.id')
            ->inRandomOrder()
            ->limit(2)
            ->get();

         // $applicant_feedback = DB::table('users')
        // ->join('applicants', 'users.id', '=', 'applicants.user_id')
        // ->join('job_applications', 'job_applications.applicant_id', '=', 'applicants.id')
        // ->join('applicant_feedback', 'applicant_feedback.job_application_id', '=', 'job_applications.id')
        // ->select('users.first_name', 'users.last_name', 'applicant_feedback.description', 'applicant_feedback.created_at', 'applicants.avatar_image_path')
        // ->where('applicant_feedback.employer_feedback_decision', 'Approved')
        // ->where('applicant_feedback.job_post_id',$job_post_id)
        // ->get();

        return view('applicant.view-job-post', compact('job_post_detail', 'applicant_detail', 'applicant_educ', 'recom_jobs'));
    }

    //Submit job application with pitch
    public function submitJobApplication($id)
    {
        $idUser = Auth::id();
        $applicant_detail = User::find($idUser)->applicant;

        $job_post = JobPost::find($id)->id;

        $job_post_summary = DB::table('companies')
            ->join('employers', 'companies.id', '=', 'employers.company_id')
            ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
            ->join('currencies', 'job_posts.currency_id', '=', 'currencies.id')
            ->select('companies.company_name', 'job_posts.title', 'job_posts.job_specialization', 'job_posts.salary_range_minimum', 'job_posts.salary_range_maximum', 'currencies.name', 'companies.company_logo_path', 'job_posts.job_location', 'job_posts.id')
            ->where('job_posts.id', $job_post)
            ->get();

        return view('applicant.submit-job-application', compact('job_post_summary', 'applicant_detail'));
    }

    // apply to job post Add process
    public function applyJobSave(Request $request)
    {
        $job_post = JobPost::find($request->input('jobPostId'));

        $applicant_id = Auth::user()->id;
        $applicant_data = User::find($applicant_id)->applicant->id;

        $job_applicant = JobApplication::where('applicant_id', $applicant_data)
            ->where('job_post_id', $job_post->id)
            ->first();

        if ($job_applicant) {
            return redirect('applicant/dashboard');
        } else {
            $job_application = new JobApplication;
            $job_application->applicant_id = $applicant_data;
            $job_application->job_post_id = $request->jobPostId;
            $job_application->job_pitch = $request->jobPitch;
            $job_application->job_apply_status = $request->jobPostStatus;
            $job_application->save();

            return redirect('applicant/dashboard');
        }
    }

    // View list of job applications
    public function jobApplications()
    {
        $logged_id = Auth::user()->id;
        $job_applicant = User::find($logged_id)->applicant->id;

        $job_applied = DB::table('companies')
            ->join('employers', 'companies.id', '=', 'employers.company_id')
            ->join('job_posts', 'employers.id', '=', 'job_posts.employer_id')
            ->join('job_applications', 'job_posts.id', '=', 'job_applications.job_post_id')
            ->select('companies.company_name', 'job_posts.title', 'job_applications.created_at', 'job_applications.job_apply_status', 'job_applications.job_post_id', 'job_applications.id')
            ->where('job_applications.applicant_id', $job_applicant)
            ->get();

        return view('applicant.job-applications', compact('job_applied'));
    }

    // View company details by Applicant
    public function companyDetailsApplicant($id)
    {
        $company  = Company::find($id);
        $company_id  = Company::find($id)->id;

        $company_job = DB::table('job_posts')
        ->join('employers','job_posts.employer_id','=','employers.id')
        ->join('companies','employers.company_id','=','companies.id')
        ->join('currencies','job_posts.currency_id','=','currencies.id')
        ->select('job_posts.title','job_posts.salary_range_minimum','job_posts.salary_range_maximum','currencies.name','companies.company_name','job_posts.job_location','job_posts.description','job_posts.created_at','job_posts.id','companies.company_logo_path','companies.company_video_path')
        ->where('companies.id', $company_id)
        ->simplePaginate(3);

        // $applicant_feedback = DB::table('users')
        // ->join('applicants', 'users.id', '=', 'applicants.user_id')
        // ->join('job_applications', 'job_applications.applicant_id', '=', 'applicants.id')
        // ->join('applicant_feedback', 'applicant_feedback.job_application_id', '=', 'job_applications.id')
        // ->select('users.first_name', 'users.last_name', 'applicant_feedback.description', 'applicant_feedback.created_at', 'applicants.avatar_image_path')
        // ->where('applicant_feedback.employer_feedback_decision', 'Approved')
        // ->where('applicant_feedback.job_post_id',$job_post_id)
        // ->get();

        return view('applicant.company-details', compact('company', 'company_job'));
    }

    // Delete one specific job application
    public function deleteJobApplications($id)
    {
        $apply_delete = JobApplication::find($id);
        $apply_delete->delete();
        return redirect('applicant/job-applications');
    }

    public function multipleDeleteApplication(Request $request)
    {
        $ids = $request->ids;
        DB::table("job_applications")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success'=>"Job Application/s Deleted successfully."]);
    }


    public function updateView()
    {
        $logged_id = Auth::user()->id;
        $job_applied = User::find($logged_id)->applicant->id;

        $interview = Interview::findOrFail($job_applied)->update(['views'=>1]);
        // dd($job_applied);
    }
    // View List of Interview
    public function interviewInvite()
    {
        $logged_id = Auth::user()->id;
        $job_applied = User::find($logged_id)->applicant->id;
        //$id = Interview::find($job_applied)->get();

        $interview = DB::table('interviews')
            ->join('job_posts', 'interviews.job_post_id', '=', 'job_posts.id')
            ->join('employers', 'job_posts.employer_id', '=', 'employers.id')
            ->join('companies', 'employers.company_id', '=', 'companies.id')
            ->select('interviews.interview_type', 'interviews.interview_address', 'interviews.interview_notes', 'interviews.created_at', 'interviews.interview_date', 'interviews.start_time', 'interviews.recruiter_contact', 'interviews.recruiter_name', 'companies.company_name', 'companies.company_logo_path', 'job_posts.title', 'interviews.id', 'interviews.interview_applicant_decision', 'interviews.views', 'interviews.job_post_id')
            ->where('interviews.applicant_id', $job_applied)
            ->get();
        Interview::where('applicant_id', $job_applied)
        ->update([
            'views' => 1
        ]);
     
        return view('applicant.interview', compact('interview'));
    }

    public function interviewDecisionAccept($id, Request $request)
    {
        //dd($id);
        $interview_accept = Interview::find($id);

        $interview_accept->interview_applicant_decision = $request->accept;
        $interview_accept->save();
        return redirect('applicant/interview');
    }

    public function interviewDecisionDecline($id, Request $request)
    {
        //dd($id);
        $interview_decline = Interview::find($id);

        $interview_decline->interview_applicant_decision = $request->decline;
        $interview_decline->save();
        return redirect('applicant/interview');
    }

    public function interviewDecisionReschedule($id, Request $request)
    {
        //dd($id);
        $rules = array(
            "interviewDate" => "required",
            "interviewStart"=> "required"
        );
        $this->validate($request, $rules);

        $interview_reschedule = Interview::find($id);
        $interview_reschedule->interview_applicant_decision = $request->interviewDate.' - '.$request->interviewStart;
        $interview_reschedule->save();
        return redirect('applicant/interview');
    }

    // View List of Job Offer
    public function jobOffer()
    {
        $logged_id = Auth::user()->id;
        $job_offer_id = User::find($logged_id)->applicant->id;

        $job_offer = DB::table('companies')
            ->join('employers', 'companies.id', '=', 'employers.company_id')
            ->join('job_offers', 'employers.id', '=', 'job_offers.employer_id')
            ->join('job_posts', 'job_offers.job_post_id', '=', 'job_posts.id')
            ->select('companies.company_name', 'job_posts.title', 'job_offers.views', 'job_offers.created_at', 'job_offers.contact_number', 'job_offers.id')
            ->where('job_offers.applicant_id', $job_offer_id)
            ->get();
        return view('applicant/job-offers', compact('job_offer'));
    }

     // View Job Offer details
    public function viewJobOffer($id)
    {
        $logged_id = Auth::user()->id;
        $app = User::find($logged_id)->applicant->id;
        $job_offer = JobOffer::find($id);
        $jo = JobOffer::find($id)->id;

        JobOffer::findOrFail($jo)->update(['views'=>1]);

        $company_name = DB::table('companies')
            ->join('employers', 'companies.id', '=', 'employers.company_id')
            ->join('job_offers', 'employers.id', '=', 'job_offers.employer_id')
            ->select('companies.company_name')
            ->where('job_offers.id', $jo)
            ->get();

        return view('applicant.company-job-offer', compact('job_offer', 'company_name'));
    }

    // Delete Job Offer by ID
    public function deleteJobOffer($id)
    {
        // dd($id);
        $job_offer_delete = JobOffer::find($id);
        $job_offer_delete->delete();

        return redirect('applicant/job-offers');
    }

    public function multipleDeleteJobOffer(Request $request)
    {
        $ids = $request->ids;
        DB::table("job_offers")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success'=>"Job Offer/s Deleted successfully."]);
    }

    // Decision Job Offer update - Accept
    public function updateDecisionJobOfferAccept($id, Request $request)
    {
        $job_offer = JobOffer::find($id);

        $job_offer->applicant_decision = $request->accept;
        $job_offer->save();
        return redirect('applicant/job-offers');
    }

     // Decision Job Offer update - Decline
    public function updateDecisionJobOfferDecline($id, Request $request)
    {
        $job_offer = JobOffer::find($id);

        $job_offer->applicant_decision = $request->denied;
        $job_offer->save();
        return redirect('applicant/job-offers');
    }

    // JOB SORT
    public function jobSort(Request $request)
    {
        // ->header('Cache-Control', 'no-cache');
        $this->middleware(['applicant', 'cachecontrol']);

        return view('applicant.dashboard', compact('job_post_sort'));
    }
    
    public function addFeedback($id, Request $request)
    {
        $logged_id = Auth::user()->id;
        $company_id  = Company::find($id)->id;
        $applicantId = User::find($logged_id)->applicant->id;
        $feedback = new ApplicantFeedback;
        $feedback->company_id = $company_id;
        $feedback->description = $request->applicantFeedback;
        $feedback->applicant_id = $applicantId;

        $feedback->save();
        return redirect('applicant/dashboard');
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }

    //videocall Controller
    public function videocall($applicant_id, $first_name, $last_name)
    {
        $applicantInfo = Applicant::findOrFail($applicant_id);
        $first_name = $first_name;
        $last_name = $last_name;
        return view('applicant.video-call-interview', compact('applicantInfo', 'first_name', 'last_name'));
    }
}
